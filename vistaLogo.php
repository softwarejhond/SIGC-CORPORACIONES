<?php 
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();  
include('conexion.php');?>
<?php
if(!empty($_GET['id'])){
    //Extraer imagen de la BD mediante GET
    $result = $con->query("SELECT id,logo FROM company WHERE id='1'");
    
    if($result->num_rows > 0){
        $imgLogo = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/png"); 
        echo $imgLogo['logo']; //importante cambiar logo por el nombre de la columna en la bd
    }else{
        echo 'Imagen no existe...';
    }
}
?>
<img src="<?php echo $imgLogo['id']; ?>" alt='Logo' width="50 px" height="50px"/>  