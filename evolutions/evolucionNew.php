<? 
session_start(); 
  include "conexion.php";
  ?>
<?php if(isset($_SESSION['loggedin'])):?>
<?php 
    $title ="Dashboard - "; 

    $cantidadAhijados=mysqli_query($con, "select * from investigacion");
?>

<div class="card-body">
    <h4><b>Evolución Nueva</b></h4>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Descripción</label>
                    <textarea type="text" class="form-control" name="descripcion"
                        class="form-control" rows="10" cols="10" required="true" ></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif; ?>