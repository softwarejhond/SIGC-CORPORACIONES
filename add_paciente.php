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
            header("location: main.php");
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
    <?php include('head.php');?>
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');?>
        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                    include("txtBanner.php");
                    ?>
                        <?php
			if(isset($_POST['addEstudiante'])){
                $tipoIdentificacion = mysqli_real_escape_string($con,(strip_tags($_POST["tipoIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
                $numeroIdentificacion = mysqli_real_escape_string($con,(strip_tags($_POST["numeroIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
                $lugarExpedicionDoc = mysqli_real_escape_string($con,(strip_tags($_POST["lugarExpedicionDoc"],ENT_QUOTES)));//Escanpando caracteres 
                $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                $apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));//Escanpando caracteres 
                $fechaNacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["fechaNacimiento"],ENT_QUOTES)));//Escanpando caracteres 
                $edad = mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));//Escanpando caracteres 
                $genero = mysqli_real_escape_string($con,(strip_tags($_POST["genero"],ENT_QUOTES)));//Escanpando caracteres
                $direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
                $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
                $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
                $actividades = mysqli_real_escape_string($con,(strip_tags($_POST["actividades"],ENT_QUOTES)));//Escanpando caracteres 
                $dataTime = date("Y-m-d H:i:s");
				$cek = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion='$numeroIdentificacion'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO estudents(tipoIdentificacion,numeroIdentificacion,lugarExpedicionDoc,nombre,apellidos,fechaNacimiento,edad,genero,direccion,telefono,email,actividades,fechaCreacionEst) VALUES ('$tipoIdentificacion','$numeroIdentificacion','$lugarExpedicionDoc','$nombre','$apellidos','$fechaNacimiento','$edad','$genero','$direccion','$telefono','$email','$actividades','$dataTime')");
						if($insert){
                            echo '
                            <div class="toastEstudiante" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastEstudiante-body alert-success">
                                    <h5> <b>Estudiante Registrado Correctamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                        } else{
                            echo '
                            <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header  ">
                                    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body alert-danger">
                                    <h5> <b>Hubo problemas en el registro del estudiante intenta nuevamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                            
                        }
					 
				}else{
					echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Paciente ya existe!</div>';
				}
			}
			?>
                        <div class="container">
                            <br>
                            <h2>Añadir nuevo estudiante</h2>
                            <p>Complete este formulario para registrar un nuevo estudiante. <br>
                                <b style="color:red">Todos los datos con * son obligatorios</b>
                            </p>

                            <form method="post" class="was-validated">

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                                        <div class="form-group">
                                            <label style="color:#000">Tipo de identificación *</label>
                                            <select class="form-control" name="tipoIdentificacion" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                                <option value="Registro civil">Registro civil</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Número de identificación *</label>
                                            <input type="number" name="numeroIdentificacion" class="form-control"
                                                placeholder="Numero de identificación" value="<?php echo $username; ?>"
                                                required="true">
                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#000">Lugar de expedición del documento <strong
                                                    style="color:red">Ejemplo: Medellín-Antioquia</strong> *</label>

                                            <input type="text" name="lugarExpedicionDoc" class="form-control"
                                                style="text-transform: capitalize;"
                                                placeholder="Lugar de expedición del documento " required="true">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Nombre *</label>
                                            <input type="text" name="nombre" class="form-control"
                                                style="text-transform: capitalize;" placeholder="Nombre"
                                                required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Apellidos *</label>
                                            <input type="text" name="apellidos" style="text-transform: capitalize;"
                                                placeholder="Apellidos" class="form-control" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Fecha de nacimiento *</label>
                                            <input type="date" name="fechaNacimiento" placeholder="Apellidos"
                                                class="form-control" value="1994-01-01" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                                        <div class="form-group ">
                                            <label style="color:#000">Edad *</label>
                                            <input type="number" name="edad" placeholder="Edad" class="form-control"
                                                min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Sexo *</label>
                                            <select class="form-control" name="genero" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Trans">Trans</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Dirección *</label>
                                            <input type="text" name="direccion" placeholder="Dirección"
                                                class="form-control" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Teléfono fijo o celular *</label>
                                            <input type="number" name="telefono" placeholder="Teléfono fijo o celular "
                                                class="form-control" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Correo electrónico *</label>
                                            <input type="email" name="email" placeholder="Correo electrónico"
                                                class="form-control" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Actividad realizada *</label>

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal" data-whatever="@mdo"
                                                tittle="Agregar nuevas actividades"><i
                                                    class="fas fa-briefcase"></i></button>

                                            <select class="form-control" name="actividades" required="true">
                                                <option value="">Seleccionar</option>
                                                <?php
                                                    $query = mysqli_query ($con, "SELECT * FROM activities");
                                                    while ($consulta = mysqli_fetch_array($query)) {
                                                     echo '<option value="'.$consulta[actividad].'">'.$consulta[actividad].'</option>';
                                                        }
                                                ?>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="addEstudiante" class="btn btn-outline-success"
                                            value="Registrar estudiante" require>
                                        <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                    </div>

                            </form>
                            <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">


                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                <div class="card shadow p-2 mb-1 bg-white rounded">
                    <?php include('reloj.php');
                        ?>
                </div>
                <div class="card shadow p-2 mb-1 bg-white rounded">
                    <?php include('calendar.php');
                        ?>
                </div>
                <div class="card shadow p-2 mb-1 bg-white rounded">
                    <?php include('soporte.php');?>
                </div>
            </div>
        </div>

        </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>

    </section>
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nueva actividad a la base de datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
			if(isset($_POST['addActivities'])){
                $actividadnueva = mysqli_real_escape_string($con,(strip_tags($_POST["addActividad"],ENT_QUOTES)));//Escanpando caracteres 
             $newactivities = mysqli_query($con, "SELECT * FROM activities WHERE numeroIdentificacion='$numeroIdentificacion'");
				if(mysqli_num_rows($newactivities) == 0){
						$insertActivities = mysqli_query($con, "INSERT INTO activities(actividad) VALUES ('$actividadnueva')");
						if($insertActivities){
                            echo '
                            <div class="toastActividad" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastActividad-body alert-success">
                                    <h5> <b>Actividad Registrada Correctamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                        } else{
                            echo '
                            <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header  ">
                                    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body alert-danger">
                                    <h5> <b>Hubo problemas en el registro de la actividad intenta nuevamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                            
                        }
					 
				}else{
					echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Paciente ya existe!</div>';
				}
			}
			?>
                <form action="" method="post" class="was-validated">

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Actividad:</label>
                        <textarea class="form-control" name="addActividad" required="true"></textarea>
                    </div>
                    <div class="modal-footer">
                <input type="submit" name="addActivities" class="btn btn-outline-success" value="Registrar actividad"
                    require>
                <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                </div>
            </div>
                </form>
            </div>
           
        </div>
    </div>
    <style>
    .container-fluid {
        margin-top: 1em;
    }


    .login__label {
        display: block;
        padding-left: 1rem;
    }

    .login__label,
    .login__label--checkbox {
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-size: .75rem;
        margin-bottom: 1rem;
    }

    .login__label--checkbox {
        display: inline-block;
        position: relative;
        padding-left: 1.5rem;
        margin-top: 2rem;
        margin-left: 1rem;
        color: #ffffff;
        font-size: .75rem;
        text-transform: inherit;
    }

    .login__input {
        color: white;
        font-size: 1.15rem;
        width: 100%;
        padding: .5rem 1rem;
        border: 2px solid transparent;
        outline: none;
        border-radius: 1.5rem;
        background-color: rgba(255, 255, 255, 0.25);
        letter-spacing: 1px;
    }

    .login__input:hover,
    .login__input:focus {
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background-color: transparent;
    }

    .login__input+.login__label {
        margin-top: 1.5rem;
    }

    .login__input--checkbox {
        position: absolute;
        top: .1rem;
        left: 0;
        margin: 0;
    }

    .login__submit {
        color: #ffffff;
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 1rem;
        padding: .75rem;
        border-radius: 2rem;
        display: block;
        width: 100%;
        background-color: rgba(17, 97, 237, .75);
        border: none;
        cursor: pointer;
    }

    .login__submit:hover {
        background-color: rgba(17, 97, 237, 1);
    }

    .login__forgot {
        display: block;
        margin-top: 3rem;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
        font-size: .75rem;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }

    .login__forgot:hover {
        color: rgb(17, 97, 237);
    }
    </style>
    <script>
    $(document).ready(function() {
        $(".toastEstudiante").toast('show');
    });
    </script>

<script>
    $(document).ready(function() {
        $(".toastActividad").toast('show');
    });
    </script>
</html>