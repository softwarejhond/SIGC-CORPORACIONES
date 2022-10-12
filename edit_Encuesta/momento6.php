<h4><b>6. Estado actual del estudiante frente a la educación superior</b></h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿En qué estado se
                encuentra el estudiante actualmente en
                admisiones y registro de su IES?</label>
            <select class="form-control" name="estadoIES" id="estado_del_estudiante_en_las_ies" >
            <option value="<?php echo $row['estadoIES']; ?>"><?php echo $row['estadoIES']; ?></option>
                <option value="ACTIVO">Activo</option>
                <option value="ACTIVO CON MATERIAS CANCELADAS">
                    Activo con materias canceladas</option>
                <option value="SUSPENDIDO">Suspendido</option>
                <option value="CANCELADO">Cancelado</option>
                <option value="RETIRO DEFINITIVO">Retiro
                    definitivo</option>
                <option value="CANCELADO EN CAMBIO DE PROGRAMA/INSTITUCIÓN">
                    Cancelado en cambio de programa/institución
                </option>
                <option value="NO RESPONDE/NO INFORMACIÓN">No
                    responde/no información</option>
                <option value="GRADUADO">Graduado</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">En caso de haber
                cancelado o suspendido el semestre, ¿fue por
                causas del COVID-19?</label>
            <select class="form-control" name="cancelaFormal" id="semestre_cancelado_por_covid_estudiante" >
            <option value="<?php echo $row['cancelaFormal']; ?>"><?php echo $row['cancelaFormal']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <a href="#siete"  data-toggle="pill" aria-controls="v-pills-siete" aria-selected="true"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>