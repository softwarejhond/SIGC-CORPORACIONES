<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

require_once 'conexion.php';
require_once 'includes/smtp_settings.php';
require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$settings = smtp_load_settings();
if (empty($settings['enabled'])) {
    $_SESSION['bulk_pdf_status'] = array('type' => 'danger', 'message' => 'SMTP no esta habilitado. Configuralo primero.');
    header('Location: main.php');
    exit;
}

$required = array('host', 'port', 'username', 'password', 'from_email', 'notify_email');
foreach ($required as $field) {
    if (empty($settings[$field])) {
        $_SESSION['bulk_pdf_status'] = array('type' => 'danger', 'message' => 'Faltan datos SMTP obligatorios. Revisa la configuracion.');
        header('Location: main.php');
        exit;
    }
}

$students = array();
$query = mysqli_query($con, "SELECT numeroIdentificacion, nombre, apellidos, telefono, email, actividades, fechaCreacionEst FROM estudents ORDER BY id DESC");
if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
        $students[] = $row;
    }
}

if (count($students) === 0) {
    $_SESSION['bulk_pdf_status'] = array('type' => 'warning', 'message' => 'No hay estudiantes para generar PDF.');
    header('Location: main.php');
    exit;
}

$htmlRows = '';
foreach ($students as $index => $row) {
    $htmlRows .= '<tr>'
        . '<td>' . ($index + 1) . '</td>'
        . '<td>' . htmlspecialchars($row['numeroIdentificacion']) . '</td>'
        . '<td>' . htmlspecialchars($row['nombre'] . ' ' . $row['apellidos']) . '</td>'
        . '<td>' . htmlspecialchars($row['telefono']) . '</td>'
        . '<td>' . htmlspecialchars($row['email']) . '</td>'
        . '<td>' . htmlspecialchars($row['actividades']) . '</td>'
        . '<td>' . htmlspecialchars($row['fechaCreacionEst']) . '</td>'
        . '</tr>';
}

$html = '<html><head><meta charset="utf-8"><style>'
    . 'body{font-family: DejaVu Sans, sans-serif; font-size: 11px; color:#1f2a36;}'
    . 'h1{font-size:20px; color:#0f8ecf; margin-bottom: 6px;}'
    . 'p{margin-top:0; color:#526677;}'
    . 'table{width:100%; border-collapse:collapse; margin-top:10px;}'
    . 'th,td{border:1px solid #ced7df; padding:6px; text-align:left;}'
    . 'th{background:#e8f3fa;}'
    . '</style></head><body>'
    . '<h1>Reporte General de Estudiantes</h1>'
    . '<p>Generado: ' . date('Y-m-d H:i:s') . '</p>'
    . '<table><thead><tr><th>#</th><th>Documento</th><th>Nombre</th><th>Telefono</th><th>Email</th><th>Actividad</th><th>Fecha Registro</th></tr></thead><tbody>'
    . $htmlRows
    . '</tbody></table></body></html>';

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdfOutput = $dompdf->output();

$reportsDir = __DIR__ . '/storage/reports';
if (!is_dir($reportsDir)) {
    mkdir($reportsDir, 0755, true);
}
$pdfName = 'reporte_estudiantes_' . date('Ymd_His') . '.pdf';
$pdfPath = $reportsDir . '/' . $pdfName;
file_put_contents($pdfPath, $pdfOutput);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = $settings['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $settings['username'];
    $mail->Password = $settings['password'];
    if ($settings['encryption'] === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($settings['encryption'] === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    }
    $mail->Port = (int)$settings['port'];

    $mail->setFrom($settings['from_email'], $settings['from_name'] ?: 'SIGC');
    $mail->addAddress($settings['notify_email']);
    $mail->Subject = 'SIGC - Reporte PDF masivo de estudiantes';
    $mail->Body = "Se adjunta el reporte PDF generado desde el dashboard con " . count($students) . " estudiantes.";
    $mail->addAttachment($pdfPath, $pdfName);
    $mail->send();

    $_SESSION['bulk_pdf_status'] = array('type' => 'success', 'message' => 'PDF generado y enviado por correo correctamente.');
} catch (Exception $e) {
    $_SESSION['bulk_pdf_status'] = array('type' => 'danger', 'message' => 'PDF generado, pero el correo fallo: ' . $mail->ErrorInfo);
}

header('Location: main.php');
exit;
