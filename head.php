<?php
$appBasePath = '/';
if (!empty($_SERVER['DOCUMENT_ROOT'])) {
    $relativeRoot = str_replace('\\', '/', str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__));
    $relativeRoot = '/' . trim($relativeRoot, '/');
    $appBasePath = rtrim($relativeRoot, '/') . '/';
    if ($appBasePath === '//') {
        $appBasePath = '/';
    }
}
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGC</title>
    <base href="<?php echo htmlspecialchars($appBasePath); ?>">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app-modern.css?v=1.0.0">

    <style>
        @font-face {
            font-family: 'Sparose';
            src: url('<?php echo htmlspecialchars($appBasePath); ?>fonts/fonnts.com-Sparose.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJ+Y3VSWQv8L6YewsGQKzB204MSmc5QwDFi1w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="js/app-global.js?v=1.0.0" defer></script>

    <style>
    .content {
        margin-top: 88px;
    }
    </style>
     