<?php
// Include config file
require_once "conexion.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$nombre = "";
$dependencia = "";
$image_err = "";
$success_msg = "";
$general_err = "";

$dependenciasPermitidas = array("Ingeniero", "Representante Legal", "Auxiliar");
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$nombre = trim($_POST["nombre"] ?? "");
	$dependencia = trim($_POST["dependencia"] ?? "");
	
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

    if (empty($nombre)) {
        $general_err = "Por favor ingresa el nombre completo.";
    }

    if (!in_array($dependencia, $dependenciasPermitidas, true)) {
        $general_err = "Selecciona una dependencia valida.";
    }

    $imgContent = null;
    if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] !== '') {
        $check = @getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $imgContent = file_get_contents($_FILES['image']['tmp_name']);
        } else {
            $image_err = "El archivo de perfil debe ser una imagen valida.";
        }
    }

    $dataTime = date("Y-m-d H:i:s");
	
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($image_err) && empty($general_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, nombre, dependencia, url_image, fechaCreacion) VALUES (?, ?, ?, ?, ?, ?)";

		if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_nombre, $param_dependencia, $param_img_content, $param_data_time);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_nombre = $nombre;
            $param_dependencia = $dependencia;
            $param_img_content = $imgContent;
            $param_data_time = $dataTime;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $success_msg = "Usuario registrado satisfactoriamente.";
                $username = $password = $confirm_password = "";
                $nombre = $dependencia = "";
            } else{
                $general_err = "Hubo problemas en el registro. Intenta nuevamente.";

            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');?>

</head>

<body>
    <div class="login-container container">
        <div class="form-login">
            <ul class="login-nav">
                <li class="login-nav__item ">
                    <a href="index.php">Iniciar sesión</a>
                </li>
                <li class="login-nav__item active">
                    <a href="register.php">Registrarme</a>
                </li>
            </ul>
            <?php if (!empty($success_msg)) { ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($success_msg); ?></div>
            <?php } ?>
            <?php if (!empty($general_err)) { ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($general_err); ?></div>
            <?php } ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#0e5f89">Usuario</label>
                    <input type="number" name="username" class="form-control" placeholder="Documento de identidad"
                        value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#0e5f89">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña"
                        value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#0e5f89">Confirmar Contraseña</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Repetir contraseña"
                        value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group ">
                    <label style="color:#0e5f89">Nombre completo</label>
                    <input type="text" name="nombre" style="text-transform: capitalize;" placeholder="Nombre completo"
                        class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" required>
                </div>
                <div class="form-group">
                    <label style="color:#0e5f89">Dependencia</label>
                    <select class="form-control" name="dependencia" required>
                        <option value="">DEPENDENCIA</option>
                        <option value="Ingeniero" <?php echo $dependencia === 'Ingeniero' ? 'selected' : ''; ?>>INGENIERO</option>
                        <option value="Representante Legal" <?php echo $dependencia === 'Representante Legal' ? 'selected' : ''; ?>>REPRESENTANTE LEGAL</option>
                        <option value="Auxiliar" <?php echo $dependencia === 'Auxiliar' ? 'selected' : ''; ?>>AUXILIAR</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label style="color:#0e5f89">Seleccione su foto de perfil</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*" />
                    <span class="help-block"><?php echo $image_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Registrarme">
                    <input type="reset" class="btn btn-danger" value="Borrar">
                </div>

            </form>
        </div>

    </div>
</body>
<style>
body {
    background: radial-gradient(circle at 20% 10%, rgba(15, 142, 207, 0.16), transparent 35%), radial-gradient(circle at 85% 15%, rgba(18, 184, 134, 0.2), transparent 30%), #f2f7fb;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    line-height: 1.25;
    letter-spacing: 1px;
}

* {
    box-sizing: border-box;
    transition: .25s all ease;
}

.help-block {
    color: #a0142e;
}

.login-container {
    display: block;
    position: relative;
    z-index: 0;
    margin: 1rem auto 0;
    padding: 5rem 4rem 0 4rem;
    width: 100%;
    max-width: 525px;
    min-height: 680px;
    background: rgba(255, 255, 255, 0.92);
    box-shadow: 0 30px 70px -28px rgba(20, 56, 82, 0.45);
    border: 1px solid rgba(21, 74, 104, 0.14);
    border-radius: 20px;
}

.login-container:after {
    content: '';
    display: inline-block;
    position: absolute;
    z-index: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(120deg, rgba(15, 142, 207, 0.08), rgba(18, 184, 134, 0.04));
    box-shadow: none;
    border-radius: 20px;
}

.form-login {
    position: relative;
    z-index: 1;
    padding-bottom: 4.5rem;
    border-bottom: 1px solid rgba(15, 93, 135, 0.2);
}

.login-nav {
    position: relative;
    padding: 0;
    margin: 0 0 3em 1rem;
}

.login-nav__item {
    list-style: none;
    display: inline-block;
}

.login-nav__item+.login-nav__item {
    margin-left: 2.25rem;
}

.login-nav__item a {
    position: relative;
    color: rgba(16, 68, 98, 0.55);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 1.25rem;
    padding-bottom: .5rem;
    transition: .20s all ease;
}

.login-nav__item.active a,
.login-nav__item a:hover {
    color: #0f6c9e;
    transition: .15s all ease;
}

.login-nav__item a:after {
    content: '';
    display: inline-block;
    height: 10px;
    background-color: rgba(15, 108, 158, 0.25);
    position: absolute;
    right: 100%;
    bottom: -1px;
    left: 0;
    border-radius: 50%;
    transition: .15s all ease;
}

.login-nav__item a:hover:after,
.login-nav__item.active a:after {
    background-color: rgb(15, 142, 207);
    height: 2px;
    right: 0;
    bottom: 2px;
    border-radius: 0;
    transition: .20s all ease;
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
    color: rgba(11, 74, 108, 0.72);
    font-size: .75rem;
    text-decoration: none;
    position: relative;
    z-index: 1;
}

.login__forgot:hover {
    color: rgb(17, 97, 237);
}
</style>

<script src="js/login.js?v=0.0.0.4"></script>

</html>