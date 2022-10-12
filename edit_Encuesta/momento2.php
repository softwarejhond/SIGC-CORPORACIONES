<? 
session_start(); 
  include "conexion.php";
  ?>
  <?php if(isset($_SESSION['loggedin'])):?>
	<?php 
    $title ="Dashboard - "; 

    $cantidadAhijados=mysqli_query($con, "select * from investigacion");
 
?>
<h4><b>2. Identificación del padrino</b></h4>
<div class="row">
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">Nombre del padrino
                educativo</label>
                <?php
                    $usaurio= htmlspecialchars($_SESSION["username"]);
                    $query = mysqli_query($con,"SELECT nombre FROM users WHERE username like '%$usaurio%'");
                    while ($nomprePadrino = mysqli_fetch_array($query)) {
                        echo '<input type="text" name="emailPadrino" class="form-control alert-success" require value="'.$nomprePadrino[nombre].'">';
                         }
                ?>
         </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">Identificación del padrino
                educativo</label>
             
            <input type="text" name="padrinoEducativo" id="numero_identificacion_padrino" value=" <?php echo htmlspecialchars($_SESSION["username"]); ?>" class="form-control alert-success"  require>
          
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <a href="#tres"  data-toggle="pill" aria-controls="v-pills-tres" aria-selected="true"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>
<?php else: ?>
<script LANGUAGE="javascript">location.href = "index.php";   </script>
<?php endif; ?>