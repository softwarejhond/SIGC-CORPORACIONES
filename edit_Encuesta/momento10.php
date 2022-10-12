<h4><b>10. Caracterización en salud</b></h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha
                sido diagnosticado positivo para
                COVID-19?</label><br>
            <select class="form-control" name="covid19" id="estudiante_Diagnosticado_positivo_COVID_19" 
                onchange="activarCOVID()">
                <option value="<?php echo $row['covid19']; ?>"><?php echo $row['covid19']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Si la respuesta
                anterior fue afirmativa, indique acorde a su
                presentación la gravedad de la sintomatología
            </label><br>
            <select class="form-control" name="sintomas" id="gravedad_COVID_19" >
            <option value="<?php echo $row['sintomas']; ?>"><?php echo $row['sintomas']; ?></option>
                <option value="Asintomático">Asintomático
                </option>
                <option value="Sintomatología leve">
                    Sintomatología leve</option>
                <option value="Sintomatología moderada">
                    Sintomatología moderada</option>
                <option value="Sintomatología severa">
                    Sintomatología severa</option>
                <option value="No aplica">No aplica</option>

            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha
                consumido bebidas alcohólicas en el último
                mes?</label><br>
            <select class="form-control" name="alcohol" id="estudiante_consumio_alcohol" onchange="validarConsumeAlcohol()" >
            <option value="<?php echo $row['alcohol']; ?>"><?php echo $row['alcohol']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Si su respuesta
                anterior fue afirmativa, indique con qué
                frecuencia /Indique la frecuencia con que
                ingiere bebidas embriagantes (por lo menos una
                cerveza o copa de vino).</label><br>
            <select class="form-control" name="fcAlcohol" id="estudiante_frecuenia_de_consumo_alcohol"  >
            <option value="<?php echo $row['fcAlcohol']; ?>"><?php echo $row['fcAlcohol']; ?></option>
                <option value="Diario">Diario</option>
                <option value="Dos veces por semana">Dos veces
                    por semana</option>
                <option value="Semanal">Semanal</option>
                <option value="Quincenal">Quincenal</option>
                <option value="Mensual">Mensual</option>
                <option value="No aplica" >No aplica
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha
                consumido sustancias psicoactivas en el último
                mes?</label><br>
            <select class="form-control" name="sustancias" id="estudiante_consumio_sustancias" onchange="validarSustancias()" >
            <option value="<?php echo $row['sustancias']; ?>"><?php echo $row['sustancias']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Si su respuesta
                anterior fue afirmativa, indique con qué
                frecuencia / Indique la frecuencia del consumo,
                sin importar la dosis.</label><br>
            <select class="form-control" name="fcSustancias" id="estudiante_frecuenia_de_consumo_sustancias"  >
            <option value="<?php echo $row['fcSustancias']; ?>"><?php echo $row['fcSustancias']; ?></option>
                <option value="Diario">Diario</option>
                <option value="Dos veces por semana">Dos veces
                    por semana</option>
                <option value="Semanal">Semanal</option>
                <option value="Quincenal">Quincenal</option>
                <option value="Mensual">Mensual</option>
                <option value="No aplica" >No aplica
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿La estudiante se
                encuentra en embarazo?</label><br>
            <select class="form-control" name="embarazo" id="estudiante_en_embarazo" >
            <option value="<?php echo $row['embarazo']; ?>"><?php echo $row['embarazo']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
                <option value="No aplica - es hombre" >
                    No aplica - es hombre</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Si es mujer: ¿La
                estudiante ha dado a luz en los últimos 6
                meses?</label><br>
            <select class="form-control" name="parto" id="estudiante_dado_a_luz" >
            <option value="<?php echo $row['parto']; ?>"><?php echo $row['parto']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
                <option value="No aplica - es hombre" >
                    No aplica - es hombre</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Hace deporte? (30
                o más minutos caminando)</label><br>
            <select class="form-control" name="deporte" id="estudiante_hace_deporte" >
            <option value="<?php echo $row['deporte']; ?>"><?php echo $row['deporte']; ?></option>
                <option value="Ningún día a la semana">Ningún
                    día a la semana</option>
                <option value="Menos de 3 días a la semana">
                    Menos de 3 días a la semana</option>
                <option value="Entre 3 y 4 días a la semana">
                    Entre 3 y 4 días a la semana</option>
                <option value="Más de 4 días a la semana">Más de
                    4 días a la semana</option>
            </select>
        </div>
    </div>
  
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Al estudiante le
                han diagnosticado alguna enfermedad de vía
                respiratoria superior?</label><br>
            <select class="form-control" name="eRespiratoria" id="estudiante_enfermedad_respiratoria" >
            <option value="<?php echo $row['eRespiratoria']; ?>"><?php echo $row['eRespiratoria']; ?></option>
            <option value="Si (Gripa, Faringoamigdalitis, Sinusitis, Otitis, Laringitis)">Si (Gripa, Faringoamigdalitis, Sinusitis, Otitis, Laringitis)</option>
            <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Sufre de
                enfermedad ácido-péptica
                (gastritis)?</label><br>
            <select class="form-control" name="gastritis" id="estudiante_gastritis" >
            <option value="<?php echo $row['gastritis']; ?>"><?php echo $row['gastritis']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha
                tenido gastroenteritis (diarrea y/o vómito) en
                los últimos 6 meses?</label><br>
            <select class="form-control" name="gastroenteritis" id="estudiante_gastroenteritis" >
            <option value="<?php echo $row['gastroenteritis']; ?>"><?php echo $row['gastroenteritis']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuenta el
                estudiante con fracturas o accidentes
                traumáticos?</label><br>
            <select class="form-control" name="fracturas" id="estudiante_fracturas" >
            <option value="<?php echo $row['fracturas']; ?>"><?php echo $row['fracturas']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                padece de migrañas?</label><br>
            <select class="form-control" name="migrana" id="estudiante_migraña" >
            <option value="<?php echo $row['migrana']; ?>"><?php echo $row['migrana']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con un diagnóstico de trastornos del
                aprendizaje?</label><br>
            <select class="form-control" name="ta" id="estudiante_transtornos_aprendizaje" >
            <option value="<?php echo $row['ta']; ?>"><?php echo $row['ta']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con un diagnóstico de enfermedad
                mental?</label><br>
            <select class="form-control" name="dem" id="estudiante_enfermedad_mental" >
            <option value="<?php echo $row['dem']; ?>"><?php echo $row['dem']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con un diagnóstico de trastorno de
                personalidad?</label><br>
            <select class="form-control" name="dtp" id="estudiante_transtorno_personalidad" >
            <option value="<?php echo $row['dtp']; ?>"><?php echo $row['dtp']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                posee algún tipo de discapacidad?</label><br>
            <select class="form-control" name="discapacidad" id="estudiante_posee_discapacidad" onchange="validarDiscapacidad()" >
            <option value="<?php echo $row['discapacidad']; ?>"><?php echo $row['discapacidad']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">En caso de poseer
                algún tipo de discapacidad, indique el
                tipo</label><br>
            <select class="form-control" name="tipoDiscapacidad" id="estudiante_tipo_discapacidad" >
            <option value="<?php echo $row['tipoDiscapacidad']; ?>"><?php echo $row['tipoDiscapacidad']; ?></option>
                <option value="Mental">Mental</option>
                <option value="Motor">Motor</option>
                <option value="Visual">Visual</option>
                <option value="Auditivo">Auditivo</option>
                <option value="Otro">Otro</option>
                <option value="No Aplica" >No Aplica
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                cantidad aproximada de días incapacitado en los
                últimos 6 meses? / Si no tuvo incapacidades
                ingrese 0</label><br>
            <input type="number" class="form-control" value="<?php echo $row['incapacidad']; ?>" name="incapacidad" id="estudiante_dias_incapacitado"  min="0" max="180">

        </div>
    </div>
   
  
</div>

