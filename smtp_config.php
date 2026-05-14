<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

require_once 'includes/smtp_settings.php';

$settings = smtp_load_settings();
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings['enabled'] = isset($_POST['enabled']);
    $settings['host'] = trim($_POST['host'] ?? '');
    $settings['port'] = (int)($_POST['port'] ?? 587);
    $settings['encryption'] = trim($_POST['encryption'] ?? 'tls');
    $settings['username'] = trim($_POST['username'] ?? '');
    $settings['password'] = trim($_POST['password'] ?? '');
    $settings['from_email'] = trim($_POST['from_email'] ?? '');
    $settings['from_name'] = trim($_POST['from_name'] ?? 'SIGC');
    $settings['notify_email'] = trim($_POST['notify_email'] ?? '');

    if ($settings['enabled']) {
        if ($settings['host'] === '' || $settings['username'] === '' || $settings['password'] === '' || $settings['from_email'] === '' || $settings['notify_email'] === '') {
            $error = 'Completa todos los campos obligatorios para habilitar SMTP.';
        }
    }

    if ($error === '') {
        if (smtp_save_settings($settings)) {
            $success = 'Configuracion SMTP guardada correctamente.';
        } else {
            $error = 'No fue posible guardar la configuracion SMTP.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'head.php'; ?>
</head>
<?php include 'nav2.php'; ?>
<body>
<section class="home-section">
    <?php include 'nav.php'; ?>
    <div class="container-fluid py-3">
        <div class="card p-3">
            <h3 class="mb-3">Configuracion SMTP</h3>
            <?php if ($success !== '') { ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php } ?>
            <?php if ($error !== '') { ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php } ?>

            <form method="post" class="row">
                <div class="col-md-12 mb-3">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="enabled" name="enabled" <?php echo !empty($settings['enabled']) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="enabled">Habilitar envio SMTP</label>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Servidor SMTP</label>
                    <input type="text" class="form-control" name="host" value="<?php echo htmlspecialchars($settings['host']); ?>" placeholder="smtp.tudominio.com">
                </div>
                <div class="col-md-3 form-group">
                    <label>Puerto</label>
                    <input type="number" class="form-control" name="port" value="<?php echo htmlspecialchars((string)$settings['port']); ?>">
                </div>
                <div class="col-md-3 form-group">
                    <label>Cifrado</label>
                    <select class="form-control" name="encryption">
                        <option value="tls" <?php echo $settings['encryption'] === 'tls' ? 'selected' : ''; ?>>TLS</option>
                        <option value="ssl" <?php echo $settings['encryption'] === 'ssl' ? 'selected' : ''; ?>>SSL</option>
                        <option value="none" <?php echo $settings['encryption'] === 'none' ? 'selected' : ''; ?>>Sin cifrado</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Usuario SMTP</label>
                    <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($settings['username']); ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Contrasena SMTP</label>
                    <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($settings['password']); ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Correo remitente</label>
                    <input type="email" class="form-control" name="from_email" value="<?php echo htmlspecialchars($settings['from_email']); ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Nombre remitente</label>
                    <input type="text" class="form-control" name="from_name" value="<?php echo htmlspecialchars($settings['from_name']); ?>">
                </div>
                <div class="col-md-12 form-group">
                    <label>Correo para notificaciones de PDF</label>
                    <input type="email" class="form-control" name="notify_email" value="<?php echo htmlspecialchars($settings['notify_email']); ?>">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar configuracion</button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</section>
</body>
</html>
