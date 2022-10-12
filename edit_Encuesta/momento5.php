<h4><b>5. Condición especifica COVID-19</b></h4>
<div class="row">
<div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante en algún momento de la pandemia del COVID-19, especificamente en el año 2021, ha requerido de acompañamiento de un trabajador social?</label>
            <select class="form-control" name="auxEconomico" id="recibio_auxilio_economico_por_covid_estudiante" >
            <option value="<?php echo $row['auxEconomico']; ?>"><?php echo $row['auxEconomico']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante en algún momento de la pandemia del COVID-19, especificamente en el año 2021, ha requerido de acompañamiento psicológico?</label>
            <select class="form-control" name="auxEspecie" id="recibio_auxilio_economico_por_covid_en_especie_estudiante" >
            <option value="<?php echo $row['auxEspecie']; ?>"><?php echo $row['auxEspecie']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">El estudiante ha sido beneficiado de alguno de los elementos electronicos y de TIC que prestaron algunas de las IES durante el COVID 19?</label>
            <select class="form-control" name="auxVirtuales" id="recibio_beneficio_electronico_por_covid_estudiante" >
            <option value="<?php echo $row['auxVirtuales']; ?>"><?php echo $row['auxVirtuales']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
 
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante en algún momento de la pandemia del COVID-19, especificamente en el año 2021, ha requerido de acompañamiento psicológico?</label>
            <select class="form-control" name="acomPsicologo" id="requirio_ayuda_psicologica_por_covid_estudiante" >
            <option value="<?php echo $row['acomPsicologo']; ?>"><?php echo $row['acomPsicologo']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante en algún momento de la pandemia del COVID-19, especificamente en el año 2021, ha requerido de acompañamiento de un trabajador social?</label>
            <select class="form-control" name="acompTSocial" id="requirio_ayuda_trabajo_social_por_covid_estudiante" >
            <option value="<?php echo $row['acompTSocial']; ?>"><?php echo $row['acompTSocial']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <a href="#seis"  data-toggle="pill" aria-controls="v-pills-seis" aria-selected="true"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>