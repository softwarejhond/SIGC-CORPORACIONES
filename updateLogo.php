<?php include('conexion.php');?>
<?php
if(isset($_POST["submitLogo"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgLogo = addslashes(file_get_contents($image));

        $usaurio= htmlspecialchars($_SESSION["username"]);
        //Insert image content into database
         $insert = $con->query("UPDATE company SET logo = '$imgLogo'");
        if($insert){
            header('Location:company.php');
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hubo problemas en la actualización intenta nuevamente</div>';

           
        } 
    }else{
        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No se ha seleccionado ningún archivo</div>';

           
    }
}
?>
