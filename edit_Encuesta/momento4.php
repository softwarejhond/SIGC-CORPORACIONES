<h4><b>4. Víctima del Conflicto Armado Interno</b></h4>
<div class="row">
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante se
                reconoce como víctima del Conflicto Armado
                Interno de Colombia?</label>
            <select class="form-control" name="victimaArmada" id="victima_conflicto_armado_estudiante" >
                <option value="<?php echo $row['victimaArmada']; ?>"><?php echo $row['victimaArmada']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante o
                su familia ha realizado algún trámite para
                reconocimiento como víctima Conflicto Armado
                Interno de Colombia?</label>
            <select class="form-control" name="familiaVictimaArmada" id="tramite_para_victima_conflicto_armado_estudiante" >
                <option value="<?php echo $row['familiaVictimaArmada']; ?>"><?php echo $row['familiaVictimaArmada']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante o
                su familia obtuvo reconocimiento como Víctima
                Conflicto Armado Interno de Colombia?</label>
            <select class="form-control" name="reconocimientoVictimaArmada" id="reconocimiento_victima_conflicto_armado_estudiante" >
                <option value="<?php echo $row['reconocimientoVictimaArmada']; ?>"><?php echo $row['reconocimientoVictimaArmada']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <a href="#cinco"  data-toggle="pill" aria-controls="v-pills-cinco" aria-selected="true"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>