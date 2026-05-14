<?php
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
  include "conexion.php";
  ?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: #009BFF;">
    <a class="navbar-brand" href="main.php"><img src="images/logoo.png" width="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item active">
                <a class="nav-link" href="main.php"><i class="fa fa-home"></i> Inicio <span
                        class="visually-hidden">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="perfil.php"><i class="fa fa-user"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="company.php"><i class="fa fa-building"></i> Institución</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="smtp_config.php"><i class="fa fa-envelope"></i> SMTP</a>
            </li>
          
        </ul>

     
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">

                <img src="vista.php?id=9" alt="Perfil" class="rounded-circle p-1" width="50"
                    height="50px" />
                <?php
                $usuario = $_SESSION['username'] ?? '';
                $nombreUsuario = 'Usuario';
                if ($usuario !== '') {
                    $query = mysqli_prepare($con, 'SELECT nombre FROM users WHERE username = ? LIMIT 1');
                    if ($query) {
                        mysqli_stmt_bind_param($query, 's', $usuario);
                        mysqli_stmt_execute($query);
                        mysqli_stmt_bind_result($query, $nombreResult);
                        if (mysqli_stmt_fetch($query) && !empty($nombreResult)) {
                            $nombreUsuario = $nombreResult;
                        }
                        mysqli_stmt_close($query);
                    }
                }
                ?>
                <span class="card-text px-2 mt-1"><?php echo htmlspecialchars($nombreUsuario); ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="company.php">Institución</a>
                    <a class="dropdown-item" href="perfil.php">Perfil</a>
                    <a class="dropdown-item" href="logout.php">Cerrar</a>
            </div>
        </div>
        <a href="logout.php" class="btn btn-danger btn-sm ms-2" style="min-width:130px; font-weight:600;">
            <i class="fa fa-sign-out-alt"></i> Cerrar sesion
        </a>
    </div>


</nav>