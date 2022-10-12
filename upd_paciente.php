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
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include( 'head.php' );
?>
</head>
<?php include( 'nav2.php' );
?>

<body>
    <section class='home-section'>
        <?php include( 'nav.php' );
?>
        <div class='container-fluid rounded'>
            <div class='row'>
                <div class='col-lg-9 col-md-12 col-sm-12 px-2 mt-1'>
                    <div class='card border-info shadow p-3 mb-5 bg-white rounded'>
                        <?php //muy importante
                         include( 'txtBanner.php' );
?>
                        <div class='container'>
                            <br>
                            <h2>Actualizar información del paciente</h2>
                            <p>Complete este formulario para registrar un nuevo paciente. <br>
                                <b style='color:red'>Todos los datos con * son obligatorios</b>
                            </p>
                            <?php
// escaping, additionally removing everything that could be ( html/javascript- ) code
$nik = mysqli_real_escape_string( $con, ( strip_tags( $_GET['nik'], ENT_QUOTES ) ) );
$sql = mysqli_query( $con, "SELECT * FROM patient WHERE numeroIdentificacion='$nik'" );
if ( mysqli_num_rows( $sql ) == 0 ) {
    header( 'Location: index.php' );
} else {
    $row = mysqli_fetch_assoc( $sql );
}
?>
                            <?php
$usaurio = htmlspecialchars($_SESSION['username'] );
if ( isset( $_POST['updPaciente'] ) ) {
    $tipoIdentificacion = mysqli_real_escape_string( $con, ( strip_tags( $_POST['tipoIdentificacion'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $numeroIdentificacion = mysqli_real_escape_string( $con, ( strip_tags( $_POST['numeroIdentificacion'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $nombre = mysqli_real_escape_string( $con, ( strip_tags( $_POST['nombre'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $apellidos = mysqli_real_escape_string( $con, ( strip_tags( $_POST['apellidos'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $fechaNacimiento = mysqli_real_escape_string( $con, ( strip_tags( $_POST['fechaNacimiento'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $edad = mysqli_real_escape_string( $con, ( strip_tags( $_POST['edad'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $estadoCivil = mysqli_real_escape_string( $con, ( strip_tags( $_POST['estadoCivil'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $genero = mysqli_real_escape_string( $con, ( strip_tags( $_POST['genero'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $departamento = mysqli_real_escape_string( $con, ( strip_tags( $_POST['departamento'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $ciudad = mysqli_real_escape_string( $con, ( strip_tags( $_POST['ciudad'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $direccion = mysqli_real_escape_string( $con, ( strip_tags( $_POST['direccion'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $telefonoFijo = mysqli_real_escape_string( $con, ( strip_tags( $_POST['telefonoFijo'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $telefonoCelular = mysqli_real_escape_string( $con, ( strip_tags( $_POST['telefonoCelular'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $email = mysqli_real_escape_string( $con, ( strip_tags( $_POST['email'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $eps = mysqli_real_escape_string( $con, ( strip_tags( $_POST['eps'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $ips = mysqli_real_escape_string( $con, ( strip_tags( $_POST['ips'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $ocupacion = mysqli_real_escape_string( $con, ( strip_tags( $_POST['ocupacion'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $nombreAcudiente = mysqli_real_escape_string( $con, ( strip_tags( $_POST['nombreAcudiente'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $apellidoAcudiente = mysqli_real_escape_string( $con, ( strip_tags( $_POST['apellidoAcudiente'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $numeroIdentificacionAcudiente = mysqli_real_escape_string( $con, ( strip_tags( $_POST['numeroIdentificacionAcudiente'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $telefonoAcudiente = mysqli_real_escape_string( $con, ( strip_tags( $_POST['telefonoAcudiente'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $doctorAsignado = mysqli_real_escape_string( $con, ( strip_tags( $_POST['doctorAsignado'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $rh = mysqli_real_escape_string( $con, ( strip_tags( $_POST['rh'], ENT_QUOTES ) ) );
    //Escanpando caracteres
    $dataTime = date( 'Y-m-d H:i:s' );
    $update = mysqli_query($con, "UPDATE patient SET 
                        tipoIdentificacion='$tipoIdentificacion', 
                        numeroIdentificacion='$numeroIdentificacion',
                        nombre='$nombre',
                        apellidos='$apellidos',
                        fechaNacimiento='$fechaNacimiento',
                        edad='$edad',
                        estadoCivil='$estadoCivil',
                        genero='$genero',
                        departamento='$departamento',
                        ciudad='$ciudad',
                        direccion='$direccion',
                        telefonoFijo='$telefonoFijo',
                        telefonoCelular='$telefonoCelular',
                        email='$email',
                        eps='$eps',
                        ips='$ips',
                        ocupacion='$ocupacion',
                        nombreAcudiente='$nombreAcudiente',
                        apellidoAcudiente='$apellidoAcudiente',
                        numeroIdentificacionAcudiente='$numeroIdentificacionAcudiente',
                        telefonoAcudiente='$telefonoAcudiente',
                        doctorAsignado='$doctorAsignado',
                        rh='$rh',
                        fechaCreacionPatient='$dataTime' WHERE numeroIdentificacion=$nik");
    if ($update) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido actualizado con éxito.</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
    }

}
?>
                            <form method='POST' class='was-validated'>
                                <div class='row'>
                                    <div class='col-lg-6 col-md-12 col-sm-12 px-2 mt-1'>
                                        <div class='form-group'>
                                            <label style='color:#000'>Tipo de identificación *</label>
                                            <select class='form-control' name='tipoIdentificacion' required='true'>
                                                <option value="<?php echo $row['tipoIdentificacion']; ?>">
                                                    <?php echo $row['tipoIdentificacion'];?></option>
                                                <option value='Cédula de ciudadanía'>Cédula de ciudadanía</option>
                                                <option value='Tarjeta de identidad'>Tarjeta de identidad</option>
                                                <option value='Registro civil'>Registro civil</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label style='color:#000'>Número de identificación *</label>
                                            <input type='number' name='numeroIdentificacion' class='form-control'
                                                placeholder='Numero de identificación'
                                                value="<?php echo $row['numeroIdentificacion']; ?>" required='true'>
                                            <span class='help-block alert-danger'><?php echo $username_err;?></span>
                                        </div>

                                        <div class='form-group'>
                                            <label style='color:#000'>Nombre *</label>
                                            <input type='text' name='nombre' class='form-control'
                                                style='text-transform: capitalize;' placeholder='Nombre'
                                                value="<?php echo $row['nombre']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Apellidos *</label>
                                            <input type='text' name='apellidos' style='text-transform: capitalize;'
                                                placeholder='Apellidos' class='form-control'
                                                value="<?php echo $row['apellidos']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Fecha de nacimiento *</label>
                                            <input type='date' name='fechaNacimiento' placeholder='Apellidos'
                                                class='form-control' value="<?php echo $row['fechaNacimiento']; ?>"
                                                required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Edad *</label>
                                            <input type='number' name='edad' placeholder='Edad' class='form-control'
                                                min='0' max='100' value="<?php echo $row['edad']; ?>" required='true'>
                                        </div>
                                        <div class='form-group'>
                                            <label style='color:#000'>Estado civil *</label>
                                            <select class='form-control' name='estadoCivil' required='true'>
                                                <option value="<?php echo $row['estadoCivil']; ?>">
                                                    <?php echo $row['estadoCivil'];?></option>
                                                <option value='Soltero'>Soltero</option>
                                                <option value='Casado'>Casado</option>
                                                <option value='Unión libre'>Unión libre</option>
                                                <option value='Viudo'>Viudo</option>
                                                <option value='Divorciado'>Divorciado</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label style='color:#000'>Género *</label>
                                            <select class='form-control' name='genero' required='true'>
                                                <option value="<?php echo $row['genero']; ?>">
                                                    <?php echo $row['genero'];?></option>
                                                <option value='Masculino'>Masculino</option>
                                                <option value='Femenino'>Femenino</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label style='color:#000'>RH *</label>
                                            <select class='form-control' name='rh' required='true'>
                                                <option value="<?php echo $row['rh']; ?>"><?php echo $row['rh'];?>
                                                </option>
                                                <option value='A+'>A+</option>
                                                <option value='A-'>A-</option>
                                                <option value='B+'>B+</option>
                                                <option value='B-'>B-</option>
                                                <option value='AB+'>AB+</option>
                                                <option value='AB-'>AB-</option>
                                                <option value='O+'>O+</option>
                                                <option value='O-'>O-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='col-lg-6 col-md-12 col-sm-12 px-2 mt-1'>

                                        <div class='form-group '>
                                            <label style='color:#000'>Departamento *</label>
                                            <input type='text' name='departamento' placeholder='Departamento'
                                                style='text-transform: capitalize;' class='form-control' min='0'
                                                max='100' value="<?php echo $row['departamento']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Ciudad *</label>
                                            <input type='text' name='ciudad' placeholder='Ciudad' class='form-control'
                                                style='text-transform: capitalize;' min='0' max='100'
                                                value="<?php echo $row['ciudad']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Dirección *</label>
                                            <input type='text' name='direccion' placeholder='Dirección'
                                                class='form-control' style='text-transform: capitalize;' min='0'
                                                max='100' value="<?php echo $row['direccion']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Teléfono fijo *</label>
                                            <input type='text' name='telefonoFijo' placeholder='Teléfono fijo'
                                                class='form-control' min='0' max='100'
                                                value="<?php echo $row['telefonoFijo']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Teléfono celular *</label>
                                            <input type='text' name='telefonoCelular' placeholder='Teléfono celular'
                                                class='form-control' min='0' max='100'
                                                value="<?php echo $row['telefonoCelular']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Correo electrónico *</label>
                                            <input type='email' name='email' placeholder='Correo electrónico'
                                                class='form-control' min='0' max='100'
                                                value="<?php echo $row['email']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>EPS *</label>
                                            <input type='text' name='eps' placeholder='EPS' class='form-control' min='0'
                                                style='text-transform: capitalize;' max='100'
                                                value="<?php echo $row['eps']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>IPS *</label>
                                            <input type='text' name='ips' placeholder='IPS' class='form-control' min='0'
                                                style='text-transform: capitalize;' max='100'
                                                value="<?php echo $row['ips']; ?>" required='true'>
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Ocupación *</label>
                                            <input type='text' name='ocupacion' placeholder='Ocupación'
                                                class='form-control' min='0' max='100'
                                                value="<?php echo $row['ocupacion']; ?>" required='true'>
                                        </div>
                                    </div>
                                    <div class='col-lg-12 col-md-12 col-sm-12 px-2 mt-1'>
                                        <h4><b>Datos acudiente o acompañante</b></h4>
                                        <div class='form-group '>
                                            <label style='color:#000'>Nombre acudiente</label>
                                            <input type='text' name='nombreAcudiente' placeholder='Nombre acudiente'
                                                style='text-transform: capitalize;' class='form-control' min='0'
                                                max='100' value="<?php echo $row['nombreAcudiente']; ?>">
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Apellidos acudiente</label>
                                            <input type='text' name='apellidoAcudiente'
                                                placeholder='Apellidos acudiente' style='text-transform: capitalize;'
                                                class='form-control' min='0' max='100'
                                                value="<?php echo $row['apellidoAcudiente']; ?>">
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Número identificacion acudiente</label>
                                            <input type='number' name='numeroIdentificacionAcudiente'
                                                placeholder='Número identificacion acudiente' class='form-control'
                                                value="<?php echo $row['numeroIdentificacionAcudiente']; ?>">
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Teléfono acudiente</label>
                                            <input type='text' name='telefonoAcudiente' placeholder='Teléfono acudiente'
                                                class='form-control' value="<?php echo $row['telefonoAcudiente']; ?>">
                                        </div>
                                        <div class='form-group '>
                                            <label style='color:#000'>Doctor asignado</label>
                                            <select class='form-control' name='doctorAsignado' required='true'>
                                                <?php
$usaurio = htmlspecialchars( $_SESSION['username'] );
$query = mysqli_query( $con, "SELECT nombre FROM users WHERE username like '%$usaurio%' AND dependencia='Especialista'" );
while ( $userLog = mysqli_fetch_array( $query ) ) {
    echo ' <option value="'.$userLog[nombre].'">'.$userLog[nombre].'</option>';
}
?>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label style='color:#000'>Identificación doctor</label>
                                            <?php
$usaurioDoc = htmlspecialchars( $_SESSION['username'] );
$queryId = mysqli_query( $con, "SELECT username FROM users WHERE username like '%$usaurioDoc%' AND dependencia='Especialista'" );
while ( $docLog = mysqli_fetch_array( $queryId ) ) {
    echo '   <input type="text" name="identificacionDoctor" placeholder="Identifación del doctor" class="form-control"
                                min="0" max="100" value="'.$docLog['username'].'">';
}
?>
                                        </div>
                                        <div class='form-group'>
                                            <input type='submit' name='updPaciente' class='btn btn-outline-success'
                                                value='Actualizar paciente' require>
                                            <input type='reset' class='btn btn-outline-danger' value='Cancelar'>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class='col-lg-3 col-md-12 col-sm-12 px-2 mt-1'>
                <div class='card shadow p-2 mb-1 bg-white rounded'>
                    <?php include( 'reloj.php' );?>
                </div>
                <div class='card shadow p-2 mb-1 bg-white rounded'>
                    <?php include( 'calendar.php' );?>
                </div>
            </div>
        </div>
        </div>

        </div>
        </div>
        <footer class='footer'>
            <?php include( 'footer.php' );
            ?>
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

</html>