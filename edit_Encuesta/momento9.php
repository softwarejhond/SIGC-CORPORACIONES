<h4><b>9. Caracterización socioeconómica y familiar</b></h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿La madre del
                estudiante sabe leer y escribir?</label><br>
            <select class="form-control" name="alfMaterno" id="madre_sabe_leer_y_escribir_estudiante" >
            <option value="<?php echo $row['alfMaterno']; ?>"><?php echo $row['alfMaterno']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
                <option value="No sabe/ No responde">No sabe/ No
                    responde</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál fue el grado
                máximo de escolaridad alcanzado por la madre del
                estudiante?</label><br>
            <select class="form-control" name="gmem" id="gmem" >
            <option value="<?php echo $row['gmem']; ?>"><?php echo $row['gmem']; ?></option>
                <option value="Inferior a primaria">Inferior a
                    primaria</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Media">Media</option>
                <option value="Técnica">Técnica</option>
                <option value="Tecnológica">Tecnológica</option>
                <option value="Profesional">Profesional</option>
                <option value="Posgrado">Posgrado</option>
                <option value="Ninguno">Ninguno</option>
                <option value="No sabe/ No responde">No sabe/ No
                    responde</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El padre del
                estudiante sabe leer y escribir?</label><br>
            <select class="form-control" name="alfPaterno" id="padre_sabe_leer_y_escribir_estudiante" >
            <option value="<?php echo $row['alfPaterno']; ?>"><?php echo $row['alfPaterno']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
                <option value="No sabe/ No responde">No sabe/ No
                    responde</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál fue el grado
                máximo de escolaridad alcanzado por el padre del
                estudiante?</label><br>
            <select class="form-control" name="gmep" id="grado_maximo_escolaridad_padre_estudiante" >
            <option value="<?php echo $row['gmep']; ?>"><?php echo $row['gmep']; ?></option>
                <option value="Inferior a primaria">Inferior a
                    primaria</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Media">Media</option>
                <option value="Técnica">Técnica</option>
                <option value="Tecnológica">Tecnológica</option>
                <option value="Profesional">Profesional</option>
                <option value="Posgrado">Posgrado</option>
                <option value="Ninguno">Ninguno</option>
                <option value="No sabe/ No responde">No sabe/ No
                    responde</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Qué tipo de
                ocupación de vivienda tiene el
                estudiante?</label><br>
            <select class="form-control" name="tipoVivienda" id="tipo_vivienda_estudiante" >
            <option value="<?php echo $row['tipoVivienda']; ?>"><?php echo $row['tipoVivienda']; ?></option>
                <option value="Arrendada">Arrendada</option>
                <option value="Familiar">Familiar</option>
                <option value="Inquilino en cuarto">Inquilino en
                    cuarto</option>
                <option value="Propia">Propia</option>
                <option value="En comodato">En comodato</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuántas personas
                habitan la vivienda del estudiante?</label>
            <select class="form-control" name="cphv" id="cuantas_personas_habitan_vivienda_estudiante" >
            <option value="<?php echo $row['cphv']; ?>"><?php echo $row['cphv']; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuántas personas laboran actualmente en el hogar del estudiante?</label>
            <select class="form-control" name="cpla" id="personas_trabajaban_anes_del_covid_estudiante" >
            <option value="<?php echo $row['cpla']; ?>"><?php echo $row['cpla']; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
            </select>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Con cuantos
                cuartos cuenta la vivienda en la que reside el
                estudiante?</label>
            <select class="form-control"name="cuartosVivienda" id="cuartosVivienda" >
            <option value="<?php echo $row['cuartosVivienda']; ?>"><?php echo $row['cuartosVivienda']; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Considera que en
                su vivienda hay suficiente espacio para cada uno
                de los habitantes en términos de comodidad y
                privacidad?</label><br>
            <select class="form-control" name="comodidadVivienda" id="vivienda_suficiente_espacio_estudiante" >
            <option value="<?php echo $row['comodidadVivienda']; ?>"><?php echo $row['comodidadVivienda']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuántos hermanos
                que tiene el estudiante?.</label>
            <select class="form-control" name="ch" id="cuantos_hermanos_estudiante">
            <option value="<?php echo $row['ch']; ?>"><?php echo $row['ch']; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
            </select>
        </div>
    </div>
  
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Quien es el jefe de hogar actualmente?</label><br>
            <select class="form-control" name="jhcovid" id="jefe_hogar_durante_el_covid_estudiante" >
            <option value="<?php echo $row['jhcovid']; ?>"><?php echo $row['jhcovid']; ?></option>
                <option value="Mamá y Papá">Mamá y Papá</option>
                <option value="Mamá">Mamá</option>
                <option value="Papá">Papá</option>
                <option value="Hermano(a)">Hermano(a)</option>
                <option value="Abuelo(a)">Abuelo(a)</option>
                <option value="Otro">Otro</option>
                <option value="El estudiante">El estudiante
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cual es el
                Ingreso aproximado del hogar por mes? / Indique
                la cantidad de los ingresos totales del hogar
                por mes.</label><br>
                <select class="form-control" name="iah" id="ingresoMensual" >
                <option value="<?php echo $row['iah']; ?>"><?php echo $row['iah']; ?></option>
                <option value="Entre 1 y 2 SMMLV">Entre 1 y 2 SMMLV</option>
                <option value="Entre 2 y 3 SMMLV">Entre 2 y 3 SMMLV</option>
                <option value="Entre 3 y 4 SMMLV">Entre 3 y 4 SMMLV</option>
                <option value="Entre 4 y 5 SMMLV">Entre 4 y 5 SMMLV</option>
                <option value="Entre 5 y 6 SMMLV">Entre 5 y 6 SMMLV</option>
                <option value="Más de 6 SMMLV">Más de 6 SMMLV</option>
            </select> </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">El estudiante
                considera que el ingreso total de su familia es:
                / Percepción del ingreso familiar</label><br>
            <select class="form-control" name="pif" id="considera_ingresos_estudiante" >
            <option value="<?php echo $row['pif']; ?>"><?php echo $row['pif']; ?></option>
                <option value="Más que suficiente para cubrir los gastos">
                    Más que suficiente para cubrir los gastos
                </option>
                <option value="Apenas suficiente">Apenas
                    suficiente</option>
                <option value="Insuficiente">Insuficiente
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">El estudiante
                considera que el ingreso total de su familia es:
                / Percepción del ingreso familiar para cobertura
                de estudios</label><br>
            <select class="form-control" name="pifce" id="considera_ingresos_para_estudio_estudiante" >
            <option value="<?php echo $row['pifce']; ?>"><?php echo $row['pifce']; ?></option>
                <option value="Más que suficientes para cubrir sus gastos educativos">
                    Más que suficientes para cubrir sus gastos
                    educativos</option>
                <option value="Apenas suficientes para cubrir sus gastos educativos">
                    Apenas suficientes para cubrir sus gastos
                    educativos</option>
                <option value="Insuficientes para cubrir sus gastos educativos">
                    Insuficientes para cubrir sus gastos
                    educativos</option>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante labora actualmente?</label><br>
            <select class="form-control" name="estudianteLabora" id="estudiante_trabaja" >
            <option value="<?php echo $row['estudianteLabora']; ?>"><?php echo $row['estudianteLabora']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                cuenta con algún medio de transporte particular
                propio?</label><br>
            <select class="form-control" name="tpp" id="estudiante_con_medio_de_transporte" >
            <option value="<?php echo $row['tpp']; ?>"><?php echo $row['tpp']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                tiene hijos actualmente?</label><br>
            <select class="form-control" name="estudianteHijos" id="estudiante_tiene_hijos" >
            <option value="<?php echo $row['estudianteHijos']; ?>"><?php echo $row['estudianteHijos']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                depende económicamente de padres u otro familiar
                al momento de la encuesta?</label><br>
            <select class="form-control" name="depf" id="estudiante_depende_economicamente_de_padres_o_familiar" >
            <option value="<?php echo $row['depf']; ?>"><?php echo $row['depf']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuántas personas
                tiene actualmente el estudiante a su cargo
                (dependencia económica)?</label>
            <select class="form-control" name="cpac" id="personas_a_cardo_economicamente_del_estudiante" >
            <option value="<?php echo $row['cpac']; ?>"><?php echo $row['cpac']; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                recibe apoyo económico familiar al proceso de
                estudio?</label><br>
            <select class="form-control" name="paf" id="estudiante_recibe_apoyo_economico_familiar" >
            <option value="<?php echo $row['paf']; ?>"><?php echo $row['paf']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                tuvo algún tipo de orientación vocacional previa
                al ingreso a la educación superior?</label><br>
            <select class="form-control" name="ov" id="estudiante_tuvo_orientacion_vocacional"  s>
            <option value="<?php echo $row['ov']; ?>"><?php echo $row['ov']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
  
    <div class="col-md-12 col-auto">
        <div class="form-group float-right" >
       <a href="#diez"  role="tab" data-toggle="pill" aria-controls="v-pills-diez" aria-selected="false"><button type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i> Siguiente</button></a>
                                           
        </div>
    </div>
</div>