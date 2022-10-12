<h4><b>7. Acceso a servicios públicos y acceso a tecnologías deinformación y comunicación</b></h4>
<div class="row">
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante en su hogar cuenta con acceso a internet?</label>
            <select class="form-control" name="internet" id="internet" name="internet">
            <option value="<?php echo $row['internet']; ?>"><?php echo $row['internet']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha sido beneficiado, especificamente en el año 2021, por préstamo de módem de alguna de las IES?</label>
            <select class="form-control" id="beneficiadoModem" name="internetCOVID" >
            <option value="<?php echo $row['internetCOVID']; ?>"><?php echo $row['internetCOVID']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
  
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿En su hogar
                cuentan con los servicios de acceso a gas
                natural conectado a red pública?</label>
            <select class="form-control" name="gas" id="hogar_con_gas_natural_estudiante" >
            <option value="<?php echo $row['gas']; ?>"><?php echo $row['gas']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿En hogar cuentan
                con conexión a energía (con contador)? / Indique
                si en su hogar cuentan con electricidad las 24
                horas al día, 7 días a la semana</label>
            <select class="form-control" name="energia" id="hogar_con_energia_estudiante" >
            <option value="<?php echo $row['energia']; ?>"><?php echo $row['energia']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuentan en su
                hogar con energía prepago? / Indique si en su
                hogar el servicio de energia es de modalidad
                prepago</label>
            <select class="form-control" name="energiaP" id="hogar_con_energia_prepago_estudiante" >
            <option value="<?php echo $row['energiaP']; ?>"><?php echo $row['energiaP']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿En su hogar
                cuentan con agua potable (con contador)?</label>
            <select class="form-control" name="agua" id="hogar_con_agua_potable_estudiante" >
            <option value="<?php echo $row['agua']; ?>"><?php echo $row['agua']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuenta en su
                hogar con agua potable prepago?</label>
            <select class="form-control" name="aguaP" id="hogar_con_agua_potable_prepago_estudiante" onchange="aguaPrepago()"
                >
                <option value="<?php echo $row['aguaP']; ?>"><?php echo $row['aguaP']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">De ser afirmativa
                la pregunta anterior, ¿cada cuanto realizan una
                recarga de agua?</label>
            <select class="form-control" name="periodoPagoAgua" id="cada_cuanto_se_hace_la_recarga_de_agua_estudiante"  >
            <option value="<?php echo $row['periodoPagoAgua']; ?>"><?php echo $row['periodoPagoAgua']; ?></option>
                <option value="Diario">Diario</option>
                <option value="Entre 3 y 4 dias (aproximadamente)">
                    Entre 3 y 4 dias (aproximadamente)</option>
                <option value="2 veces por semana)">2 veces por
                    semana)</option>
                <option value="Semanal">Semanal</option>
                <option value="Quincenal">Quincenal</option>
                <option value="Mensual">Mensual</option>
                <option value="No aplica" >No aplica
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante cuenta con acceso a telefonía fija?</label>
            <select class="form-control" name="telefono" id="telefono_fijo_antes_del_covid_estudiante" >
            <option value="<?php echo $row['telefono']; ?>"><?php echo $row['telefono']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con acceso a saneamiento básico (manejo
                de aguas residuales)?</label>
            <select class="form-control" name="saneamiento" id="acceso_a_saneamiento_basicop_estudiante" onchange="saneamientos()" >
            <option value="<?php echo $row['saneamiento']; ?>"><?php echo $row['saneamiento']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">Si tiene
                saneamiento básico, indique el tipo de
                saneamiento básico (¿cúal?)</label>
            <select class="form-control" name="tipoSaneamiento" id="tipo_de_saneamiento_basicop_estudiante" >
            <option value="<?php echo $row['tipoSaneamiento']; ?>"><?php echo $row['tipoSaneamiento']; ?></option>
                <option value="Si - Alcantarillado" id="respuestaSi" disabled>Si -
                    Alcantarillado</option>
                <option value="Si - Pozo séptico" id="respuestaSii" disabled>Si - Pozo séptico
                </option>
                <option value="No - Disposición en suelo (aire libre)" id="respuestaNo" disabled>No - Disposición
                    en suelo (aire libre)</option>
                <option value="No - Letrina (hueco en el suelo)" id="respuestaNoo" disabled>No - Letrina
                    (hueco en el suelo)</option>
                <option value="No - Disposición en suelo (aire libre)" id="respuestaNooo" disabled>No - Fuente o
                    corriente de agua (lago, quebrada)</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el manejo
                de los residuos sólidos (basuras) en su
                hogar?</label>
            <select class="form-control" name="recogeResiduos" id="cual_es_el_manejo_de_residuos_estudiante" >
            <option value="<?php echo $row['recogeResiduos']; ?>"><?php echo $row['recogeResiduos']; ?></option>
                <option value="Recogida por carro recolector de basuras">
                    Recogida por carro recolector de basuras
                </option>
                <option value="Disposición en suelo (enterramiento)">
                    Disposición en suelo (enterramiento)
                </option>
                <option value="Incineración de residuos">
                    Incineración de residuos</option>
                <option value="Disposición en fuentes de agua">
                    Disposición en fuentes de agua</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con acceso a televisión (televisor y
                acceso al servicio)?</label>
            <select class="form-control" name="televisor" id="acceso_a_television_estudiante" >
            <option value="<?php echo $row['televisor']; ?>"><?php echo $row['televisor']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con acceso a celular personal durante
                la contingencia por el COVID-19?</label>
            <select class="form-control" name="celular" id="acceso_a_celular_antes_del_covid_estudiante" >
            <option value="<?php echo $row['celular']; ?>"><?php echo $row['celular']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante cuenta con acceso a computador familiar?</label>
            <select class="form-control" name="computadorF" id="acceso_a_computador_antes_del_covid_estudiante" >
            <option value="<?php echo $row['computadorF']; ?>"><?php echo $row['computadorF']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante cuenta con acceso a computador personal?</label>
            <select class="form-control" name="computadorP" id="acceso_a_computador_personalq_antes_del_covid_estudiante" >
            <option value="<?php echo $row['computadorP']; ?>"><?php echo $row['computadorP']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante especificamente en el año 2021 ha sido beneficiado por préstamo de computador por su IES?</label>
            <select class="form-control" name="computadorIES" id="beneficiario_por_prestamo_de_computador_estudiante" >
            <option value="<?php echo $row['computadorIES']; ?>"><?php echo $row['computadorIES']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante cuenta con acceso a tabletas electrónicas?</label>
            <select class="form-control" name="tablets" id="acceso_a_tablets_antes_del_covid_estudiante" >
            <option value="<?php echo $row['tablets']; ?>"><?php echo $row['tablets']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
        <a href="#ocho" data-toggle="pill" aria-controls="v-pills-ocho" aria-selected="false"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>