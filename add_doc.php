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
                        <div class="container">
                            <br>
                            <?php
// Include config file
require_once "conexion.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$nombre="";
$dependencia="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
					$nombre = trim($_POST["nombre"]);
					$dependencia = trim($_POST["dependencia"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    $dataTime = date("Y-m-d H:i:s");
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false){
		$image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,nombre,dependencia,url_image,fechaCreacionUser) VALUES (?, ?,'$nombre','$dependencia','$imgContent','$dataTime')";
         
		  }
		    if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				echo '
                <div class="toast" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                    <div class="toast-header ">
                        <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                style=color:green></i> Notificación</strong>
                      
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body alert-success">
                        <h5> <b>Usuario Registrado Correctamente</b></h5>
                   
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
                        <h5> <b>Hubo problemas en el registro intenta nuevamente</b></h5>
                   
                    </div>
                </div>
           ';
				
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>
                            <h2>Añadir nuevo usuario</h2>
                            <p>Complete este formulario para registrar un nuevo usuario.</p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                        enctype="multipart/form-data" class="was-validated">
                                        <div
                                            class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                            <label style="color:#000">Usuario</label>
                                            <input type="number" name="username" class="form-control"
                                                placeholder="Documento de identidad" value="<?php echo $username; ?>"
                                                required="true">
                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                        </div>
                                        <div
                                            class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                            <label style="color:#000">Contraseña</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Contraseña" value="<?php echo $password; ?>"
                                                required="true">
                                            <span class="help-block alert-danger"><?php echo $password_err; ?></span>
                                        </div>
                                        <div
                                            class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                            <label style="color:#000">Confirmar Contraseña</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                style="text-transform: capitalize;" placeholder="Repetir contraseña"
                                                value="<?php echo $confirm_password; ?>" required="true">
                                            <span
                                                class="help-block alert-danger"><?php echo $confirm_password_err; ?></span>
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Nombre completo</label>
                                            <input type="text" name="nombre" style="text-transform: capitalize;"
                                                placeholder="Nombre completo" class="form-control" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Dependencia</label>
                                            <select class="form-control" name="dependencia" required="true">
                                                <option value="">DEPENDENCIA</option>
                                                <option value="Ingeniero">INGENIERO</option>
                                                <option value="Representante Legal">REPRESENTANTE LEGAL</option>
                                                <option value="Auxiliar">AUXILIAR</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Seleccione su foto de perfil</label>
                                            <input type="file" name="image" class="btn btn-warning" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-success" value="Registrar">
                                            <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                        </div>

                                    </form>
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
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>

    </section>
</body>
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
    $(".toast").toast('show');
});
</script>

</html>