<?php
// Initialize the session
session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 86400;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            header("location: index.php");
            exit;
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
// Include config file
require_once "conexion.php";
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');
    ?>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    #areaImprimir {
        background-image: url('./images/back.png');
        background-origin: content-box;
        background-size: 100% 100%;
    }
    </style>
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                        include("txtBanner.php");?>
                        <div class="card-body">

                            <!--ACTUALIZAR DATOS USUARIO-->
                            <h2>Certificado generado</h2>
                            <?php
			            // escaping, additionally removing everything that could be (html/javascript-) code
			         $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                     $code = mysqli_real_escape_string($con,(strip_tags($_GET["code"],ENT_QUOTES)));
                     $idDoct = mysqli_real_escape_string($con,(strip_tags($_GET["idDoct"],ENT_QUOTES)));
                     $sqlPaciente = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion='$nik'");//muy importante el CROSS JOIN
			         if(mysqli_num_rows($sqlPaciente) == 0){
				     header("Location: index.php");
			         }else{
			    	    $rowPaciente = mysqli_fetch_assoc($sqlPaciente);
                      header("./vistaFirmaHistoria.php?proceso=$nik");
			           }

			            $sqlHisotria = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion='$rowPaciente[numeroIdentificacion]'");
			             if(mysqli_num_rows($sqlHisotria) == 0){
			    	    header("Location: index.php");
			            }else{
			    	    $row = mysqli_fetch_assoc($sqlHisotria);
                       $var= $row['doctorCreator'];
			            }
			            ?>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark"
                                    id="areaImprimir">
                                    <div style="text-align: center;">
                                        <?php
                                            $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                                             while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                echo '<p class="text-right" style="font-size:12px">'.$empresaLog['nombre'].'</p>';
                                                }
                                        ?>
                                        <div class="row">
                                            <div class="text-left col-6"><b>Fecha de impresión:</b>
                                                <?php echo date('d-m-Y');?></div>
                                        </div>

                                        <img src="images/logo.jpeg" alt='Logo' width="150px">
                                        <br>
                                        <br>
                                        <h3 style="text-align: center;">CERTIFICADO AL CUMPLIMIENTO DEL SERVICIO SOCIAL</h3>
                                        <br>
                                        <?php
                              
                                            $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                                            while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                             echo '<h3  class="card-text">'.$empresaLog['nombre'].'</h3>';
                                             echo '<h4  class="card-text">NIT: '.$empresaLog['nit'].'</h4>';
                                             }
                                             ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <h3 style="text-align: center;">CERTIFICA QUE:</h3>
                                    <br>
                                    <div style="padding:10px">
                                        <p style="font-size:22px"> <b style="text-transform: capitalize;"><?php echo $row['nombre'];?>
                                                <?php echo $row['apellidos'];?></b> identificado con
                                            <b><?php echo $row['tipoIdentificacion'];?></b> número
                                            <b><?php echo $row['numeroIdentificacion'];?></b> de <b
                                                style="text-transform: capitalize;"><?php echo $row['lugarExpedicionDoc'];?></b>,
                                            cumplió satisfactoriamente con 80 horas de servicio social, requeridas por
                                            el “Fondo Comuna Uno” o “Becas de Convenio Directo del Presupuesto Participativo”, el cual hizo las
                                            siguientes funciones, actividades y tareas:
                                        </p>
                                        <br>
                                        <br>
                                        <b>
                                            <p style="font-size:25px"><?php echo $row['actividades'];?></p>
                                        </b>
                                        <br>
                                        <br>
                                        <p style="font-size:22px">Para constancia se firma en la ciudad de Medellín a
                                            los <?php echo date("d"); ?> días del mes de
                                            <?php setlocale(LC_ALL,"es_ES"); echo strftime("%B");; ?> de
                                            <?php echo date("Y"); ?>.</p>
                                    </div>
                                    <br>


                                    <div style="padding:10px">
                                        <div class="form-group">

                                            <img src="vistaFirmaHistoria.php?id='<?php echo '9'?>'" alt='Perfil'
                                                class="rounded p-1" width="300px" />

                                            <?php
                                             $queryPresident = mysqli_query($con,"SELECT nombre,dependencia,telefono FROM users WHERE dependencia='Representante Legal'");
                                            while ($presidenteFirma = mysqli_fetch_array($queryPresident)) {
                                             echo '<h4 class="text-left"">'.$presidenteFirma['nombre'].'</h4>
                                                <h4 class="text-left"">'.$presidenteFirma['dependencia'].'</h4>
                                                 <h4 class="text-left"">'.$presidenteFirma['telefono'].'</h4>
                                                ';
                                                }
                                             ?>
                                            <?php
                                                $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                                                while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                  echo ' <h4 class="text-left"">'.$empresaLog['nombre'].'</h4>';
                                                 }
                                                ?>

                                        </div>
                                        <br><br>
                                        <?php
                              
                                            $queryCompany = mysqli_query($con,"SELECT * FROM company");
                                             while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                              echo '<p  class="text-center">'.$empresaLog['direccion'].' - '.$empresaLog['nombre'].'<br>'.' Teléfono '.$empresaLog['telefono'].' E-Mail: '.$empresaLog['email'].'</p>';
                                             }
                                          ?>
                                    </div>
                                </div>

                                <br>
                                <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info"
                                    style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                                <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i
                                        class="fa fa-sync"></i> CANCELAR</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('reloj.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('calendar.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('soporte.php');?>
                    </div>
                </div>

            </div>
            <footer class="footer">
                <?php include('footer.php');?>
            </footer>
    </section>
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->

    <script>

    </script>

</body>

</html>