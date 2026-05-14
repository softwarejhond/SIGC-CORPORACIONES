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
include_once __DIR__ . "/conexion.php";
?>
<div class="card bg-dark text-white">
    <img src="images/top.png" class="card-img" alt="encabezado" height="180px">
    <div class="container">
        <div class="card-img-overlay ">
                <img src="vista.php?id=9" alt="Perfil" class="rounded mr-1"
               style="float:left; padding:10px; width:100px" />
            <?php
            $usuario = $_SESSION['username'] ?? '';
            $nombre = 'Usuario';
            $dependencia = '';
            if (!empty($usuario)) {
                $query = mysqli_prepare($con, "SELECT nombre, dependencia FROM users WHERE username = ? LIMIT 1");
                if ($query) {
                    mysqli_stmt_bind_param($query, "s", $usuario);
                    mysqli_stmt_execute($query);
                    mysqli_stmt_bind_result($query, $nombreResult, $dependenciaResult);
                    if (mysqli_stmt_fetch($query)) {
                        $nombre = $nombreResult ?: $nombre;
                        $dependencia = $dependenciaResult ?: '';
                    }
                    mysqli_stmt_close($query);
                }
            }
            ?>
            <h5 class="card-text px-2 mt-1"><?php echo htmlspecialchars($nombre); ?></h5>
            <?php if (!empty($dependencia)) { ?>
            <h5 class="card-text px-2"><?php echo htmlspecialchars($dependencia); ?></h5>
            <?php } ?>
     
            <h6 id="Identificacion" class="ccard-text">
                <?php echo htmlspecialchars($_SESSION["username"] ?? ''); ?></h6>
        </div>
    </div>
</div>