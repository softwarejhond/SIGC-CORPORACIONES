<?php include('conexion.php');?>
<?php
if(!empty($_GET['id'])){

    //Extraer imagen de la BD mediante GET
    $result = $con->query("SELECT url_image FROM users WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['url_image']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>