<?php
include "conexion.php";
?>
<?php
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();?>
<?php if (isset($_SESSION['loggedin'])): ?>
<?php
$filtro = htmlspecialchars($_SESSION["username"]);
$query = mysqli_prepare($con, "SELECT nombre FROM users WHERE username = ? LIMIT 1");
$pacient = "";
if ($query) {
    mysqli_stmt_bind_param($query, "s", $filtro);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $nombreUsuario);
    if (mysqli_stmt_fetch($query)) {
        $pacient = $nombreUsuario;
    }
    mysqli_stmt_close($query);
}
$generoFemenino = mysqli_query($con, "SELECT * FROM estudents WHERE genero='Femenino'");
$totalEstudiantes = 0;
$totalUsuarios = 0;
$totalHistorias = 0;

function safeCountRows($con, $tableName) {
    try {
        $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM `" . $tableName . "`");
        if ($result && $rowMetric = mysqli_fetch_assoc($result)) {
            return (int)$rowMetric['total'];
        }
    } catch (Throwable $e) {
        return 0;
    }
    return 0;
}

$totalEstudiantes = safeCountRows($con, 'estudents');
$totalUsuarios = safeCountRows($con, 'users');
$totalHistorias = safeCountRows($con, 'history');

$bulkStatus = $_SESSION['bulk_pdf_status'] ?? null;
unset($_SESSION['bulk_pdf_status']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'head.php';?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
    th {
        width: 100px;
    }
    </style>
    <script type="text/javascript" charset="utf8" src="js/dataTables.min.js">
    </script>
</head>
<?php include 'nav2.php';?>

<body>
    <section class="home-section">
        <?php include 'nav.php';?>
        <h4 id="datos"></h4>
        <div class="container-fluid rounded">
            <?php if ($bulkStatus) { ?>
            <div class="alert alert-<?php echo htmlspecialchars($bulkStatus['type']); ?> mt-2">
                <?php echo htmlspecialchars($bulkStatus['message']); ?>
            </div>
            <?php } ?>

            <div class="row mt-2 mb-2">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card p-3">
                        <small class="text-muted">Estudiantes registrados</small>
                        <h3 class="mb-0"><?php echo $totalEstudiantes; ?></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card p-3">
                        <small class="text-muted">Usuarios del sistema</small>
                        <h3 class="mb-0"><?php echo $totalUsuarios; ?></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card p-3">
                        <small class="text-muted">Historias clinicas</small>
                        <h3 class="mb-0"><?php echo $totalHistorias; ?></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card p-3">
                        <small class="text-muted">Accion rapida</small>
                        <form action="bulk_generate_pdfs.php" method="post" class="mt-2">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">
                                <i class="fa fa-file-pdf"></i> Generar y enviar PDF masivo
                            </button>
                        </form>
                        <a href="smtp_config.php" class="btn btn-outline-secondary btn-sm btn-block mt-2">
                            <i class="fa fa-cog"></i> Configurar SMTP
                        </a>
                    </div>
                </div>
            </div>
           
            <div class="row">
                
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    
                    <div class="card">
                        <?php //muy importante
                         include "txtBanner.php";
                        ?>
                      
                        <!--MENSAJES DE ELIMINAR EN CADA TABLA-->
                        <?php include './dashboard/alertEvolucionDelete.php';?>                       
                        <?php include './dashboard/alertHistoryDelete.php';?>                       
                        <?php include './dashboard/alertPatientDelete.php';?>                       
                        
                        <br>
                        <div class="container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Estudiantes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                     <a class="nav-link" href="#" onclick="tableToExcel(document.getElementById('myTable'), 'Lista de estudiantes'); return false;" role="tab"
                                         aria-selected="false" title="Exportar tabla a excel"><i class="fa fa-file-excel text-success"></i> Exportar tabla</a>
                                </li>
                               <!-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Certificados emitidos</a>
                                </li>-->
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <?php include './dashboard/listEstudents.php';?>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <?php include './dashboard/listCertificate.php';?>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include 'reloj.php';?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include 'calendar.php';?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                    <?php include('soporte.php');?>
                    
                    </div>
                </div>
            </div>
        </div>

      
        <br><br>
        <?php include 'footer.php';
?>
    </section>
    <!-- MENSAJE DE BIENVENIDA TOAST-->

</body>

<!-- Codigo para exportar tablas a excel -->
<script type="text/javascript">
var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template =
        '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        },
        format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        }
    return function(table, name) {
        if (!table.nodeType) table = document.getElementById('myTable')
        if (!table) {
            return;
        }
        var ctx = {
            worksheet: name || 'Lista de estudiantes',
            table: table.innerHTML
        }
        window.location.href = uri + base64(format(template, ctx))
    }
})()
</script>

<?php else: ?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif; ?>

<script>
$(document).ready(function() {
    if ($.fn.DataTable) {
        if ($('#myTable').length) {
            $('#myTable').DataTable();
        }

        if ($('table.display').length) {
            $('table.display').DataTable();
        }
    }
});
</script>

</html>