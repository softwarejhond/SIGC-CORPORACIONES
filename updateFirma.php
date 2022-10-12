<?php include('conexion.php');?>
<?php
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();


if(isset($_POST["submitFirma"])){
    $checkFirma = getimagesize($_FILES["image"]["tmp_name"]);
    if($checkFirma !== false){
        $imageFirma = $_FILES['image']['tmp_name'];
        $imgContentFirma = addslashes(file_get_contents($imageFirma));
        $dataTime = date("Y-m-d H:i:s");
        $usaurio= htmlspecialchars($_SESSION["username"]);
        //Insert image content into database
         $insertar = $con->query("UPDATE users SET firma = \"$imgContentFirma\" WHERE username like '%$usaurio%'");
        if($insertar){
            header('Location:perfil.php');
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hubo problemas en la actualización intenta nuevamente</div>';
        } 
    }else{
        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No se ha seleccionado ningún archivo</div>';   
    }
}
?>
