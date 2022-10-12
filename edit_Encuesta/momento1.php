
<h4><b>1. Identificación del estudiante</b></h4>
<div class="row">
<div class="col-md-12 col-auto">
        <div class="form-group">
        <label class="bmd-label-floating">Indique tipo de identificación</label>
            <select class="form-control" selected="<?php echo $row['tipoIdentificacion'];?>" name="tipoIdentificacion" onchange="validarDocumento()"
                id="tipo_identificacion" require>
                <option value="<?php echo $row['tipoIdentificacion']; ?>"><?php echo $row['tipoIdentificacion']; ?></option>
                <option value="Cédula de Ciudadanía">Cédula
                    de Ciudadanía</option>
                <option value="Tarjeta de identidad">Tarjeta
                    de identidad</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
    </div>
    
    <div class="col-md-12 col-auto">
    <label class="bmd-label-floating">Indique que otro de identificación</label>
        <div class="form-group">
            <input type="text" name="otroTipoId" class="form-control" id="otro_tipo_de_identificacion"
                placeholder="Indique cuál es el tipo de documento" value="<?php echo $row['otroTipoId']; ?>"  require>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el
                número identificación del
                estudiante?</label>
            <input type="text" name="numeroIdentificacion" id="numero_de_identificacion_estudiante"
                class="form-control" value="<?php echo $row['numeroIdentificacion']; ?>" require>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el
                nombre completo del estudiante?</label>
            <input type="text" name="nombre" id="nombre_completo_estudiante" value="<?php echo $row['nombre']; ?>" class="form-control" require>
        </div>
    </div>
  
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
        <a href="#dos"  data-toggle="pill" aria-controls="v-pills-dos" aria-selected="true"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                 </div>                          
        </div>
    </div>
</div>