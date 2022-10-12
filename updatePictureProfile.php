<?php include('conexion.php');?>
<?php
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();


if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $dataTime = date("Y-m-d H:i:s");
        $usaurio= htmlspecialchars($_SESSION["username"]);
        //Insert image content into database
         $insert = $con->query("UPDATE users SET url_image = \"$imgContent\" WHERE username like '%$usaurio%'");
        if($insert){
            header('Location:perfil.php');
        }else{
            print '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hubo problemas en la actualización intenta nuevamente</div>';  
        } 
    }else{
        print '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No se ha seleccionado ningún archivo</div>';
    }
}
?>
