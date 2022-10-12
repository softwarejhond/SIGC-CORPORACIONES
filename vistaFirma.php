<?php 
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();  
include('conexion.php');?>
<?php
if(!empty($_GET['id'])){
    $usaurio= htmlspecialchars($_SESSION["username"]);
    //Extraer imagen de la BD mediante GET
    $resultFirma = $con->query("SELECT id,firma FROM users WHERE username like '%$usaurio%'");
    if($resultFirma->num_rows > 0){
        $imgFirma = $resultFirma->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgFirma['firma']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>
<img src="<?php echo $imgFirma['id']; ?>" alt='Firma' class="rounded-circle" width="50 px" height="50px" />  