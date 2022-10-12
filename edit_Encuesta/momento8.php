<h4><b>8. Caracterización académica del estudiante</b></h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿En cuál
                Institución Educativa Media se graduó el
                estudiante?/Indique el nombre oficial de la
                Institución Educativa, donde obtuvo su título
                como bachiller.</label>
            <input type="text" name="colegio" value="<?php echo $row['colegio']; ?>" id="institucion_donde_se_graduo_de_bachiller_estudiante" class="form-control" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Qué tipo de
                Institución Educativa Media se graduó el
                estudiante?</label>
            <select class="form-control" name="tipoColegio" id="tipo_de_institucion_donde_se_graduo_de_bachiller_estudiante" >
            <option value="<?php echo $row['tipoColegio']; ?>"><?php echo $row['tipoColegio']; ?></option>
                <option value="Privado">Privado</option>
                <option value="Público">Público</option>
                <option value="Cobertura">Cobertura</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿En qué año se
                graduó de la Institución Educativa Media el
                estudiante?</label>
                <input type="number" name="fechaGraduado" value="<?php echo $row['fechaGraduado']; ?>" id="institucion_donde_se_graduo_de_bachiller_estudiante" class="form-control" >
       
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cual es número de
                semestre/nivel de semestre vigente en el que se
                encuentra inscrito el estudiante?</label>
            <select class="form-control" name="semestreVigente" id="semestre_inscrito_en_el_sistema_acedemico_estudiante" >
            <option value="<?php echo $row['semestreVigente']; ?>"><?php echo $row['semestreVigente']; ?></option>
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
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el
                promedio académico actual del estudiante? / Solo
                se permiten números y punto Ejemplo: 3.7; 5.0;
                2.5</label>
            <input type="number" name="promedio" value="<?php echo $row['promedio']; ?>" id="promedio_actual_del_estudiante" class="form-control" min="0" max="5" step="0.1"
                >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                cantidad de materias que el estudiante matriculó
                al inicio del semestre actual?</label>
            <select class="form-control" name="materiasMatriculadas" id="cantidad_de_materias_inscritas_estudiante" >
            <option value="<?php echo $row['materiasMatriculadas']; ?>"><?php echo $row['materiasMatriculadas']; ?></option>
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

            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                cantidad de créditos que el estudiante matriculó
                al inicio del semestre actual?</label>
            <select class="form-control" name="creditos" id="creditos_matriculados_actualmente_estudiante" >
            <option value="<?php echo $row['creditos']; ?>"><?php echo $row['creditos']; ?></option>
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
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante ha
                cancelado materias después del inicio del
                semestre?</label>
            <select class="form-control" name="canceloMaterias" id="cancelo_materias_despues_de_inicar_semestre_estudiante"
                onchange="materiasCanceladas()" >
                <option value="<?php echo $row['canceloMaterias']; ?>"><?php echo $row['canceloMaterias']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                cantidad de materias activas después de la
                posible cancelación?</label>
            <select class="form-control" name="cmac" id="cantidad_de_materias_despues_de_cancelar_estudiante"  >
            <option value="<?php echo $row['cmac']; ?>"><?php echo $row['cmac']; ?></option>
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

            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                cantidad de créditos después de la
                cancelación?</label>
            <select class="form-control" name="ccc" id="cantidad_de_creditos_despues_de_cancelar_estudiante"  >
            <option value="<?php echo $row['ccc']; ?>"><?php echo $row['ccc']; ?></option>
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
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante se
                encuentra repitiendo materias del programa en
                curso?</label>
            <select class="form-control" name="repiteMaterias" id="repitiendo_materias_estudiante" >
            <option value="<?php echo $row['repiteMaterias']; ?>"><?php echo $row['repiteMaterias']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuántos días días
                a la semana el estudiante tiene clase?</label>
            <select class="form-control" name="diasClase" id="dias_a_la_semana_con_clase_estudiante" >
            <option value="<?php echo $row['diasClase']; ?>"><?php echo $row['diasClase']; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el nivel
                de satisfacción del estudiante con el programa
                cursado?</label>
            <select class="form-control" name="nsp" id="nivel_satisfaccion_ppr_programa_estudiante" >
            <option value="<?php echo $row['nsp']; ?>"><?php echo $row['nsp']; ?></option>
                <option value="1 - Muy insatisfecho">1 - Muy
                    insatisfecho</option>
                <option value="2 - Insatisfecho">2 -
                    Insatisfecho</option>
                <option value="3 - Ni satisfecho ni insatisfecho">3
                    - Ni satisfecho ni insatisfecho</option>
                <option value="4 - Satisfecho">4 - Satisfecho
                </option>
                <option value="5 - Muy satisfecho">5 - Muy
                    satisfecho</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">¿Ha considerado
                cancelar o suspender sus estudios
                académicos?</label>
            <select class="form-control" name="abandonoEstudios" id="ha_considerado_cancelar_estudiante" onchange="validarSicancela()" >
            <option value="<?php echo $row['abandonoEstudios']; ?>"><?php echo $row['abandonoEstudios']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <label class="bmd-label-floating">En caso de ser
            afirmativo su respuesta anterior, indique cuáles
            pueden ser los motivos personales</label><br>
        <div class="form-group input-group">

            <select class="form-control" id="seleccionar_motivos_de_cancelar_estudiante" onchange="motivoDeAbandono()"
                >
                <option value="#">Seleccionar</option>
                <option value="Académicos">Académicos</option>
                <option value="Económicos">Económicos</option>
                <option value="Familiares">Familiares</option>
                <option value="Personales">Personales</option>
                <option value="Otros">Otros</option>
                <option value="No aplica, no ha pensado cancelar" disabled>
                    No aplica, no ha pensado cancelar
                </option>
                <option value="Ha seleccionado otros motivos diferentes a otro" disabled>Ha seleccionado otros motivos
                    diferentes a otro</option>
            </select>
            <div class="input-group-append">
                <a class="btn btn-danger pull-right btn-sm input-group-text"
                    onclick="borrarseleccionesMotivos()" style="color: white;" tittle="Borrar selecciones">
                   <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Motivos
            seleccionados</label><br>
        <input type="text" class="form-control" name="mppa" value="<?php echo $row['mppa']; ?>" id="motivosSeleccionados"  >

    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">¿Si su respuesta
            anterior incluye otros, indique cuales?</label>
        <input type="text" class="form-control" name="otroMppa" value="<?php echo $row['otroMppa']; ?>"id="otro_tipo_de_abandono_estudiante"  >

    </div>

    <div class="col-md-12 col-auto">
        <div class="form-group float-right">
            <a href="#nueve" role="tab" data-toggle="pill" aria-controls="v-pills-nueve" aria-selected="false"><button
                    type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i>
                    Siguiente</button></a>

        </div>
    </div>
</div>