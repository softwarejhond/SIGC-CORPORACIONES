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
    <?php include('head.php');
    ?>
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
                            <?php
                              // Define variables and initialize with empty values
                              $new_password = $confirm_password = "";
                              $new_password_err = $confirm_password_err = "";
                              // Processing form data when form is submitted
                              if($_SERVER["REQUEST_METHOD"] == "POST"){

                                 // Validate new password
                                  if(empty(trim($_POST["new_password"]))){
                                      $new_password_err = "Por favor ingrese la nueva contraseña";     
                                   } elseif(strlen(trim($_POST["new_password"])) < 8){
                                  $new_password_err = "La contraseña al menos debe tener 8 caracteres.";
                                } else{
                                   $new_password = trim($_POST["new_password"]);
                               }

                               // Validate confirm password
                                if(empty(trim($_POST["confirm_password"]))){
                                 $confirm_password_err = "Por favor confirme la contraseña.";
                                 } else{
                                 $confirm_password = trim($_POST["confirm_password"]);
                                if(empty($new_password_err) && ($new_password != $confirm_password)){
                                 $confirm_password_err = "Las contraseñas no coinciden.";
                              }
                           }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               
                // Password updated successfully. Destroy the session, and redirect to login page
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Contraseña actualizada con éxito el sistema se ha cerrado para validar tu nueva contraseña.</div>';
                header("location: login.php");
                session_destroy();
                exit();
                
            } else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error al actualizar, intenta nuevamente.</div>';
				               
            }
        }
    }
    
   
}
?>
<!--ACTUALIZAR DATOS USUARIO-->
<?php
          $usaurio= htmlspecialchars($_SESSION["username"]);
			if(isset($_POST['actualizarUsuario'])){
				              $updName= mysqli_real_escape_string($con,(strip_tags($_POST["updName"],ENT_QUOTES)));//Escanpando caracteres 
				              $updPhone= mysqli_real_escape_string($con,(strip_tags($_POST["updPhone"],ENT_QUOTES)));//Escanpando caracteres 
				              $updEmail= mysqli_real_escape_string($con,(strip_tags($_POST["updEmail"],ENT_QUOTES)));//Escanpando caracteres 
				              $updYear= mysqli_real_escape_string($con,(strip_tags($_POST["updYear"],ENT_QUOTES)));//Escanpando caracteres 
				              $updAdress= mysqli_real_escape_string($con,(strip_tags($_POST["updAdress"],ENT_QUOTES)));//Escanpando caracteres 
				              $updGenero= mysqli_real_escape_string($con,(strip_tags($_POST["updGenero"],ENT_QUOTES)));//Escanpando caracteres 
                              $updDepartmen= mysqli_real_escape_string($con,(strip_tags($_POST["updDepartmen"],ENT_QUOTES)));//Escanpando caracteres 
				              
                              $update = mysqli_query($con, "UPDATE users SET nombre='$updName',
                               telefono='$updPhone', email='$updEmail', edad='$updYear', direccion='$updAdress',
                               genero='$updGenero', dependencia='$updDepartmen' WHERE username like '%$usaurio%'");
                              if ($update) {
                                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos se han actualizado y guardados con éxito.</div>';
                          
                              } else {
                                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                              }
                      }
			                ?>

                            <h2>Actualiza tu perfil</h2>
                            <p>Complete este formulario para actualizar su información.</p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 px-2 mt-1">
                                        <h4>Actualizar foto</h4>
                                            <img src="vista.php?id='<?php echo'9'?>'" alt='Perfil' class="rounded p-1"
                                                width="100%" />
                                            <br>
                                            <form action="updatePictureProfile.php" method="POST"
                                                enctype="multipart/form-data">
                                                Selecciona una imagen para subir
                                                <input type="file" name="image" style="cursor: pointer" tittle="Seleccionar una imagen"/>
                                                <br> <br>
                                                <input type="submit" name="submit" class="btn btn-outline-success W-100"
                                                    value="ACTUALIZAR FOTO" style="width:100%"/>
                                            </form>
                                            <h4>Actualizar firma</h4>
                                            <img src="vistaFirma.php?id='<?php echo'9'?>'" alt='Firma' class="rounded p-1"
                                                width="100%" />
                                            <br>
                                            <form action="updateFirma.php" method="POST"
                                                enctype="multipart/form-data">
                                                Selecciona una imagen para subir
                                                <input type="file" name="image" style="cursor: pointer" tittle="Seleccionar una imagen"/>
                                                <br> <br>
                                                <input type="submit" name="submitFirma" class="btn btn-outline-warning W-100"
                                                    value="AÑADIR FIRMA" style="width:100%"/>
                                            </form>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 px-2 mt-1">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                            method="POST">
                                                <h4>Actualizar contraseña</h4>
                                                <div
                                                    class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                                    <label>Nueva contraseña</label>
                                                    <input type="password" name="new_password" class="form-control"
                                                        value="<?php echo $new_password; ?>">
                                                    <span class="help-block"><?php echo $new_password_err; ?></span>
                                                </div>
                                                <div
                                                    class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                    <label>Confirmar contraseña</label>
                                                    <input type="password" name="confirm_password" class="form-control">
                                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-warning"
                                                        value="Actualizar">
                                                    <a class="btn btn-outline-danger" href="main.php">Cancelar</a>
                                                </div>
                                            </form>
                                            <!--Actualizar datos usuario-->
                                            <?php
                               $usaurio= htmlspecialchars($_SESSION["username"]);
                               $query = mysqli_query($con,"SELECT * FROM users WHERE username like '%$usaurio%'");
                               while ($userLog = mysqli_fetch_array($query)) {
                                $name= $userLog[nombre];
                                $phone= $userLog[telefono];
                                $email= $userLog[email];
                                $year= $userLog[edad];
                                $genero= $userLog[genero];
                                $department= $userLog[dependencia];
                                $direccion= $userLog[direccion];
                                }

                        
                                ?>
                                            <form action="" method="POST">
                                                <h4>Actualizar información personal</h4>
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="updName" class="form-control"
                                                        value="<?php echo $name; ?>" require>
                                                </div>
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="updPhone" class="form-control"
                                                        value="<?php echo $phone; ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="updEmail" class="form-control"
                                                        value="<?php echo $email; ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Edad</label>
                                                    <input type="number" name="updYear" class="form-control"
                                                        value="<?php echo $year; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" name="updAdress" class="form-control"
                                                        value="<?php echo $direccion; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Género</label>
                                                    <select class="form-control" name="updGenero">
                                                        <option value="<?php echo $genero; ?>"><?php echo $genero; ?>
                                                        </option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Dependencia</label>
                                                    <select class="form-control" name="updDepartmen">
                                                        <option value="<?php echo $department; ?>">
                                                            <?php echo $department; ?></option>
                                                        <option value="Ingeniero">Ingeniero</option>
                                                        <option value="Representante Legal">Representante Legal</option>
                                                        <option value="Auxiliar">Auxiliar</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-success"
                                                        value="Actualizar datos" name="actualizarUsuario" >
                                                    <a class="btn btn-outline-danger" href="main.php">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>
    </section>
</body>

</html>