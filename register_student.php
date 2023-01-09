<?php
// Include config file
require_once "conexion.php";

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
                    <a href="register_student.php">Registrarme</a>
                </li>
            </ul>
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
					echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Estudiante ya existe!</div>';
				}
			}
			?>

            <form method="post" class="was-validated" id="form">
                <h2 style="color:#fff">REGISTRO DE INFORMACIÓN PARA EL SERVICIO SOCIAL.</h2>
                <b style="color:yellow">Tenga en cuenta que todos los campos son obligatorios y serán utilizados
                    exclusivamente para agilizar el proceso de tu servicio social dentro de la Junta de Acción Comunal Marco Fidel Suárez</b>
                <br><br>
                <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                        <div class="form-group">
                            <label style="color:#fff">Tipo de identificación *</label>
                            <select class="form-control" name="tipoIdentificacion" required="true">
                                <option value="">Seleccionar</option>
                                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="Registro civil">Registro civil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="color:#fff">Número de identificación *</label>
                            <input type="number" name="numeroIdentificacion" class="form-control"
                                placeholder="Numero de identificación" value="<?php echo $username; ?>" required="true">
                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:#fff">Lugar de expedición del documento <br><strong
                                    style="color:yellow">Ejemplo: Medellín-Antioquia</strong> *</label>

                            <input type="text" name="lugarExpedicionDoc" class="form-control"
                                style="text-transform: capitalize;" placeholder="Lugar de expedición del documento "
                                required="true">
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="color:#fff">Nombre *</label>
                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;"
                                placeholder="Nombre" required="true">
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Apellidos *</label>
                            <input type="text" name="apellidos" style="text-transform: capitalize;"
                                placeholder="Apellidos" class="form-control" required="true">
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Fecha de nacimiento *</label>
                            <input type="date" name="fechaNacimiento" placeholder="Apellidos" class="form-control"
                                value="1994-01-01" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                        <div class="form-group ">
                            <label style="color:#fff">Edad *</label>
                            <input type="number" name="edad" placeholder="Edad" class="form-control" min="0" max="100"
                                required="true">
                        </div>
                        <div class="form-group">
                            <label style="color:#fff">Sexo *</label>
                            <select class="form-control" name="genero" required="true">
                                <option value="">Seleccionar</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Trans">Trans</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Dirección *</label>
                            <input type="text" name="direccion" placeholder="Dirección" class="form-control"
                                required="true">
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Teléfono fijo o celular *</label>
                            <input type="number" name="telefono" placeholder="Teléfono fijo o celular "
                                class="form-control" required="true">
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Correo electrónico *</label>
                            <input type="email" name="email" placeholder="Correo electrónico" class="form-control"
                                required="true">
                        </div>
                        <div class="form-group ">
                            <label style="color:#fff">Actividad realizada *</label>

                            <select class="form-control" name="actividades" required="true">
                                <option value="">Seleccionar</option>
                                <?php
                    $query = mysqli_query ($con, "SELECT * FROM activities");
                    while ($consulta = mysqli_fetch_array($query)) {
                     echo '<option value="'.$consulta['actividad'].'">'.$consulta['actividad'].'</option>';
                        }
                ?>
                            </select>
                        </div>

                        <div class="form-group ">
                            
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="myCheck" onclick="enviar()" required="true">
                                <label class="form-check-label" for="exampleCheck1" style="color:#fff">Acepto que la información enviada es correcta y deseo una copia en
                                mi correo. *</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="addEstudiante" class="btn btn-success" value="Registrar estudiante"
                            require>
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                    </div>
            </form>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
            </script>
            <script type="text/javascript">
            emailjs.init('vqMJawKvtp94pyo-r')
            </script>
        </div>
        <div style="text-aling:center"><b style="color:yellow;text-aling:center">Información protegida bajo la <a
                    href="https://www.mintic.gov.co/arquitecturati/630/articles-9011_documento.pdf" target="_blank"
                    style="color:#fff">ley de Habeas Data 1581 de 2012</a> </b></div>

        <a href="https://agenciaeaglesoftware.com/" target="_blank" class="login__forgot">SIGC &copy; Copyright
            <?php echo date("Y");?> <br>Made by Agencia de Desarrollo
            Eagle Software</a>
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" class="login__forgot"><img
                alt="Licencia Creative Commons" style="border-width:0"
                src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />Esta obra está bajo una <a
            rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" style="color:#ffffff">Licencia
            Creative Commons Atribución-NoComercial-SinDerivadas 4.0 Internacional</a>.
    </div>
</body>

<style>
body {
    background-image: url("/images/background.png");
    background-repeat: no-repeat;
    background-size: cover;
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
    color: #ffffff;
}

.login-container {
    display: block;
    position: relative;
    z-index: 0;
    margin: 4rem auto 0;
    padding: 5rem 4rem 0 4rem;
    width: 100%;
    max-width: 1200px;
    min-height: 680px;
    background-image: url("https://scontent.feoh1-1.fna.fbcdn.net/v/t39.30808-6/279351412_1052144518715824_2904256349837715103_n.jpg?_nc_cat=108&ccb=1-6&_nc_sid=8bfeb9&_nc_eui2=AeFrWJxB-4yXdSc7eFGkMWjHorzthx8QOHWivO2HHxA4dZm-uu-B_Q_OYoIjWc5yoW3wSc9jUoP5nQ68tto5cmOv&_nc_ohc=zaZtIG3sza0AX-U9Xdc&_nc_ht=scontent.feoh1-1.fna&oh=00_AT-zwTSOKnjkTdBNpo99Cc3aUGZ1ulKRsKzGF_qpskjmpw&oe=627E6AC9");
    box-shadow: 0 50px 70px -20px rgba(0, 0, 0, 0.85);
    background-size: cover;
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
    background-image: radial-gradient(ellipse at left bottom, rgba(1, 184, 253) 0%, rgba(38, 20, 72, .9) 59%, rgba(1, 184, 253) 100%);
    box-shadow: 0 -20px 150px -20px rgba(0, 0, 0, 0.5);
}

.form-login {
    position: relative;
    z-index: 1;
    padding-bottom: 4.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

.login-nav {
    position: relative;
    padding: 0;
    margin: 0 0 6em 1rem;
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
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 1.25rem;
    padding-bottom: .5rem;
    transition: .20s all ease;
}

.login-nav__item.active a,
.login-nav__item a:hover {
    color: #ffffff;
    transition: .15s all ease;
}

.login-nav__item a:after {
    content: '';
    display: inline-block;
    height: 10px;
    background-color: rgb(255, 255, 255);
    position: absolute;
    right: 100%;
    bottom: -1px;
    left: 0;
    border-radius: 50%;
    transition: .15s all ease;
}

.login-nav__item a:hover:after,
.login-nav__item.active a:after {
    background-color: rgb(17, 97, 237);
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
function enviar() {
    var checkBox = document.getElementById("myCheck");
    var templateParams = {
    name: 'James',
    notes: 'Check this out!'
};
    if (checkBox.checked == true) {
        emailjs.send('default_service', 'template_tbtr69r', templateParams)
            .then(function(response) {
                console.log('SUCCESS!', response.status, response.text);
            }, function(error) {
                console.log('FAILED...', error);
            });
    } else {

    }

}
</script>

<script>
    var xhr = new XMLHttpRequest(),
body = JSON.stringify(
    {
        "messages": [
            {
                "channel": "whatsapp",
                "to": "14752661178",
                "content": "Test WhatsApp Message Text"
            },
            {
                "channel": "sms",
                "to": "14752661178",
                "content": "Test SMS Message Text"
            }
        ]
    }
);
xhr.open('POST', 'https://platform.clickatell.com/v1/message', true);
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.setRequestHeader('Authorization', 'SyRXtu8OQC6FzkMhn7kxSg==');
xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        console.log('success');
    }
};

xhr.send(body);
</script>

</html>