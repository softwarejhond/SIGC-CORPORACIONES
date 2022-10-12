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
  include "conexion.php";
  ?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: #009BFF;">
    <a class="navbar-brand" href="main.php"><img src="images/logoo.png" width="50px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="main.php"><i class="fa fa-home"></i> Inicio <span
                        class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="perfil.php"><i class="fa fa-user"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="company.php"><i class="fa fa-building"></i> Institución</a>
            </li>
          
        </ul>

     
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img src="vista.php?id='<?php echo'9'?>'" alt='Perfil' class="rounded-circle p-1" width="50 px"
                    height="50px" />
                    <?php
                               $usaurio= htmlspecialchars($_SESSION["username"]);
                               $query = mysqli_query($con,"SELECT nombre FROM users WHERE username like '%$usaurio%'");
                               while ($userLog = mysqli_fetch_array($query)) {
                                echo '<span  class="card-text px-2 mt-1">'.$userLog[nombre].'</span>';
                                }
                                ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="company.php">Institución</a>
                    <a class="dropdown-item" href="perfil.php">Perfil</a>
                    <a class="dropdown-item" href="logout.php">Cerrar</a>
            </div>
        </div>
    </div>


</nav>