<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/conexion.php';
require_once __DIR__ . '/includes/smtp_settings.php';
require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function json_or_redirect($ok, $message, $redirect = 'main.php') {
    if (isset($_GET['format']) && $_GET['format'] === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('ok' => $ok, 'message' => $message));
        exit;
    }

    $_SESSION['bulk_pdf_status'] = array(
        'type' => $ok ? 'success' : 'danger',
        'message' => $message
    );
    header('Location: ' . $redirect);
    exit;
}

function fetch_company_info($con) {
    $company = array(
        'nombre' => 'SIGC',
        'nit' => '',
        'direccion' => '',
        'telefono' => '',
        'email' => ''
    );

    $result = mysqli_query($con, 'SELECT nombre, nit, direccion, telefono, email FROM company LIMIT 1');
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $company = array_merge($company, $row);
    }

    return $company;
}

function fetch_representante($con) {
    $rep = array(
        'nombre' => 'Representante Legal',
        'dependencia' => '',
        'telefono' => ''
    );

    $stmt = mysqli_prepare($con, "SELECT nombre, dependencia, telefono FROM users WHERE dependencia = 'Representante Legal' LIMIT 1");
    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre, $dependencia, $telefono);
        if (mysqli_stmt_fetch($stmt)) {
            $rep = array(
                'nombre' => $nombre,
                'dependencia' => $dependencia,
                'telefono' => $telefono
            );
        }
        mysqli_stmt_close($stmt);
    }

    return $rep;
}

function build_certificate_html($student, $company, $rep) {
    $fullName = trim(($student['nombre'] ?? '') . ' ' . ($student['apellidos'] ?? ''));
    $today = date('Y-m-d');
    $activities = $student['actividades'] ?? 'Actividades de servicio social';

    return '<html><head><meta charset="utf-8"><style>'
        . 'body{font-family: DejaVu Sans, sans-serif; color:#1f2a36; line-height:1.45;}'
        . 'h1,h2,h3{text-align:center; margin:0;}'
        . '.top{margin-bottom:26px;}'
        . '.box{border:1px solid #d3dde6; border-radius:10px; padding:16px; margin-top:18px;}'
        . '.firma{margin-top:42px;}'
        . '.small{font-size:12px; color:#556979;}'
        . '</style></head><body>'
        . '<div class="top">'
        . '<h2>' . htmlspecialchars($company['nombre']) . '</h2>'
        . '<h3>NIT: ' . htmlspecialchars($company['nit']) . '</h3>'
        . '<p class="small" style="text-align:center;">Fecha de emision: ' . htmlspecialchars($today) . '</p>'
        . '</div>'
        . '<h1>CERTIFICADO DE SERVICIO SOCIAL</h1>'
        . '<div class="box">'
        . '<p>Se certifica que <strong>' . htmlspecialchars($fullName) . '</strong>, identificado con <strong>'
        . htmlspecialchars($student['tipoIdentificacion'] ?? '') . '</strong> numero <strong>'
        . htmlspecialchars($student['numeroIdentificacion'] ?? '') . '</strong>,'
        . ' cumplio satisfactoriamente con 80 horas de servicio social en la Junta de Accion Comunal Marco Fidel Suarez.</p>'
        . '<p>Actividad registrada:</p>'
        . '<p><strong>' . htmlspecialchars($activities) . '</strong></p>'
        . '</div>'
        . '<div class="firma">'
        . '<p><strong>' . htmlspecialchars($rep['nombre']) . '</strong></p>'
        . '<p>' . htmlspecialchars($rep['dependencia']) . '</p>'
        . '<p>Telefono: ' . htmlspecialchars($rep['telefono']) . '</p>'
        . '<p class="small">' . htmlspecialchars($company['direccion']) . ' | ' . htmlspecialchars($company['telefono']) . ' | ' . htmlspecialchars($company['email']) . '</p>'
        . '</div>'
        . '</body></html>';
}

function create_certificate_pdf($html) {
    $options = new Options();
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html, 'UTF-8');
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    return $dompdf->output();
}

function send_mail_with_attachment($smtp, $toEmail, $toName, $subject, $body, $attachmentBytes, $attachmentName) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['username'];
    $mail->Password = $smtp['password'];
    $mail->Port = (int)$smtp['port'];

    if ($smtp['encryption'] === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($smtp['encryption'] === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    }

    $mail->CharSet = 'UTF-8';
    $mail->setFrom($smtp['from_email'], $smtp['from_name'] ?: 'SIGC');
    $mail->addAddress($toEmail, $toName);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->addStringAttachment($attachmentBytes, $attachmentName, 'base64', 'application/pdf');

    $mail->send();
}

$smtp = smtp_load_settings();
if (empty($smtp['enabled'])) {
    json_or_redirect(false, 'SMTP esta deshabilitado. Configuralo en SMTP primero.');
}

$requiredFields = array('host', 'port', 'username', 'password', 'from_email');
foreach ($requiredFields as $field) {
    if (empty($smtp[$field])) {
        json_or_redirect(false, 'La configuracion SMTP esta incompleta.');
    }
}

$company = fetch_company_info($con);
$representante = fetch_representante($con);

$students = array();

if (!empty($_GET['nik'])) {
    $nik = trim($_GET['nik']);
    $stmt = mysqli_prepare($con, 'SELECT tipoIdentificacion, numeroIdentificacion, nombre, apellidos, email, actividades FROM estudents WHERE numeroIdentificacion = ? LIMIT 1');
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $nik);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
} else {
    $result = mysqli_query($con, "SELECT tipoIdentificacion, numeroIdentificacion, nombre, apellidos, email, actividades FROM estudents WHERE email IS NOT NULL AND email <> ''");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }
}

if (count($students) === 0) {
    json_or_redirect(false, 'No hay estudiantes con correo para enviar certificado.');
}

$sent = 0;
$failed = 0;

foreach ($students as $student) {
    $email = trim($student['email'] ?? '');
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $failed++;
        continue;
    }

    $html = build_certificate_html($student, $company, $representante);
    $pdf = create_certificate_pdf($html);

    $fullName = trim(($student['nombre'] ?? '') . ' ' . ($student['apellidos'] ?? ''));
    $doc = $student['numeroIdentificacion'] ?? 'sin_documento';

    try {
        send_mail_with_attachment(
            $smtp,
            $email,
            $fullName,
            'SIGC - Certificado de servicio social',
            "Hola " . $fullName . ",\n\nAdjuntamos tu certificado de servicio social generado desde SIGC.\n\nSaludos,\n" . ($smtp['from_name'] ?: 'SIGC'),
            $pdf,
            'certificado_' . $doc . '.pdf'
        );
        $sent++;
    } catch (Exception $e) {
        $failed++;
    }
}

json_or_redirect(true, 'Proceso completado. Enviados: ' . $sent . ' | Fallidos: ' . $failed);
