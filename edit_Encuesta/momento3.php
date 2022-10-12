<h4><b>3. Caracterización del estudiante</b></h4>
<div class="row">
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el sexo
                del estudiante?</label>
            <select class="form-control" name="sexo" selected="<?php echo $row['sexo']; ?>" id="sexo_del_estudiante" onchange="validarEmbarazo()" >
                <option value="<?php echo $row['sexo']; ?>"><?php echo $row['sexo']; ?></option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la Raza
                con la que se identifica el estudiante?</label>
            <select class="form-control" name="raza" id="grupo_poblacional_del_estudiante" >
                <option value="<?php echo $row['raza']; ?>"><?php echo $row['raza']; ?></option>
                <option value="Indígena">Indígena</option>
                <option value="Gitano - Rom">Gitano - Rom</option>
                <option value="Raizal del archipiélago de San Andrés y Providencia">Raizal del archipiélago de San Andrés yProvidencia</option>
                <option value="Palenquero o descendiente">Palenquero o descendiente</option>
                <option value="Negro(a). Mulato(a). Afrocolombiano(a) o Afrodescendiente">Negro(a). Mulato(a). Afrocolombiano(a) o Afrodescendiente</option>
                <option value="Ninguno de los anteriores (Mestizo, blanco,etc)">Ninguno de los anteriores (Mestizo, blanco,etc)</option>
           
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                pertenece a la población LGTBI?</label>
            <select class="form-control" name="lgtbi" id="estudiante_pertenece_lgtbi" >
                <option value="<?php echo $row['lgtbi']; ?>"><?php echo $row['lgtbi']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>

            </select>
        </div>
    </div>
  
</div>
<div class="row">

    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                nacionalidad del estudiante?</label>
            <select class="form-control aler" name="nacionalidad" id="nacionalidad_del_estudiante" >
            <option value="<?php echo $row['nacionalidad']; ?>"><?php echo $row['nacionalidad']; ?></option>
                <?php
                    $nacionalidad=$_POST['nacionalidad'];
                    $query = mysqli_query($con,"SELECT * FROM countries");
                    while ($nacionalidad = mysqli_fetch_array($query)) {
                    echo '
                    <option value="'.$nacionalidad[nationality].'">'.$nacionalidad[nationality].'</option>';
                     }
                ?>

            </select>
        </div>
    </div>
    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la edad
                del estudiante?</label>
            <input type="number" name ="edad" id="edad_del_estudiante" value="<?php echo $row['edad']; ?>" class="form-control" min="1" max="70">
        </div>
    </div>
    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el estado
                civil del estudiante?</label>
            <select class="form-control" name="estadoCivil" id="estado_civil_del_estudiante" >
                <option value="<?php echo $row['estadoCivil']; ?>"><?php echo $row['estadoCivil']; ?></option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="En unión libre">En unión libre</option>
                <option value="Viudo">Viudo</option>
                <option value="Divorciado">Divorciado</option>
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el
                municipio donde reside el estudiante? /
                (Ejemplo: Medellín, Envigado, Bello,
                etc)</label>
           
            <select class="form-control" name="municipio" id="municipio" >
            <option value="<?php echo $row['municipio']; ?>"><?php echo $row['municipio']; ?></option>
                <?php
                    
                    $query = mysqli_query($con,"SELECT * FROM municipios WHERE departamento_id = 5");
                    while ($municipio = mysqli_fetch_array($query)) {
                    echo '<option value="'.$municipio[municipio].'">'.$municipio[municipio].'</option>';
                     }
                ?>

            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-auto">
        <div class="form-group">

            <label class="bmd-label-floating">¿En qué comuna o
                corregimiento reside el estudiante?</label>
            <select class="form-control" name="comuna" id="comuna_o_corregimiento_del_estudiante"
                 >
                <option value="<?php echo $row['comuna']; ?>"><?php echo $row['comuna']; ?></option>
                <option value="Comuna 1 - Popular">Comuna 1 -
                    Popular</option>
                <option value="Comuna 2 - Santa Cruz">Comuna 2 -
                    Santa Cruz</option>
                <option value="Comuna 3 - Manrique">Comuna 3 -
                    Manrique</option>
                <option value="Comuna 4 - Aranjuez">Comuna 4 -
                    Aranjuez</option>
                <option value="Comuna 5 - Castilla">Comuna 5 -
                    Castilla</option>
                <option value="Comuna 6 - 12 de Octubre">Comuna
                    6 - 12 de Octubre</option>
                <option value="Comuna 7 - Robledo">Comuna 7 -
                    Robledo</option>
                <option value="Comuna 8 - Villa Hermosa">Comuna
                    8 - Villa Hermosa</option>
                <option value="Comuna 9 - Buenos Aires">Comuna 9
                    - Buenos Aires</option>
                <option value="Comuna 10 - La Candelaria">Comuna
                    10 - La Candelaria</option>
                <option value="Comuna 11 - Laureles - Estadio">
                    Comuna 11 - Laureles - Estadio</option>
                <option value="Comuna 12 - La América">Comuna 12
                    - La América</option>
                <option value="Comuna 13 - San Javier">Comuna 13
                    - San Javier</option>
                <option value="Comuna 14 - Poblado">Comuna 14 -
                    Poblado</option>
                <option value="Comuna 15 - Guayabal">Comuna 15 -
                    Guayabal</option>
                <option value="Comuna 16 - Belén">Comuna 16 -
                    Belén</option>
                <option value="Corregimiento Altavista">
                    Corregimiento Altavista</option>
                <option value="Corregimiento San Antonio de Prado">
                    Corregimiento San Antonio de Prado</option>
                <option value="Corregimiento San Cristobal">
                    Corregimiento San Cristobal</option>
                <option value="Corregimiento San Sebastían de Palmitas">
                    Corregimiento San Sebastían de Palmitas
                </option>
                <option value="Corregimiento Santa Elena">
                    Corregimiento Santa Elena</option>
                <option value="Otros - para municipios no Medellín">
                    Otros - para municipios no Medellín</option>
            </select>
        </div>
    </div>
   
    <div class="col-md-6 col-auto">
        <label class="bmd-label-floating">¿En qué barrio reside
            el estudiante?</label>
        <div class="form-group">
            <input type="text" name="barrio" value="<?php echo $row['barrio']; ?>" id="barrio_del_estudiante" placeholder="¿En qué barrio reside el estudiante?"
                class="form-control" >
        </div>
    </div>
    <div class="col-md-6 col-auto">
        <label class="bmd-label-floating">¿Cuál es el estrato
            socioeconómico del estudiante?</label>
        <div class="form-group">
            <select class="form-control" name="estrato" id="estrato_socio_economico_del_estudiante" >
                <option value="<?php echo $row['estrato']; ?>"><?php echo $row['estrato']; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
    </div>


    <div class="col-md-6 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿En cuál
                Institución de Educación Superior (IES) estudia
                actualmente el estudiante?</label>
                <select class="form-control" name="universidad" id="universidad" >
                <option value="<?php echo $row['universidad']; ?>"><?php echo $row['universidad']; ?></option>
    <?php
        
        $queryUniversidad = mysqli_query($con,"SELECT * FROM universidad");
        while ($universidad = mysqli_fetch_array($queryUniversidad)) {
        echo '<option value="'.$universidad[nombre].'">'.$universidad[nombre].'</option>';
         }
    ?>

</select>
        </div>
    </div>
    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es la
                Facultad del estudiante?</label>

            <select class="form-control" name="facultad" id="facultad_del_estudiante" >
                <option value="<?php echo $row['facultad']; ?>"><?php echo $row['facultad']; ?></option>
                <option value="Facultad de Administración">
                    Facultad de Administración</option>
                <option value="Facultad de Arquitectura e Ingeniería">
                    Facultad de Arquitectura e Ingeniería
                </option>
                <option value="Facultad de Ciencias de la Salud">
                    Facultad de Ciencias de la Salud</option>
                <option value="Facultad Ciencias Sociales">
                    Facultad Ciencias Sociales</option>
                <option value="Facultad de Ingeniería">Facultad
                    de Ingeniería</option>
                <option value="Facultad de Producción y Diseño">
                    Facultad de Producción y Diseño</option>
                <option value="Facultad Artes y Humanidades">
                    Facultad Artes y Humanidades</option>
                <option value="Facultad de Ciencias Exactas y Aplicadas">
                    Facultad de Ciencias Exactas y Aplicadas
                </option>
                <option value="Facultad de Ingenierías">Facultad
                    de Ingenierías</option>
                <option value="Facultad Artes y Humanidades">
                    Facultad Artes y Humanidades</option>
                <option value="Facultad Ciencias Económicas y Administrativas">
                    Facultad Ciencias Económicas y
                    Administrativas</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿Cuál es el
                programa académico que cursa el
                estudiante?</label>
            <select class="form-control" name="programa" id="programa_academico_del_estudiante" >
                <option value="<?php echo $row['programa']; ?>"><?php echo $row['programa']; ?></option>
                <option value="Administración de Empresas Turísticas">
                    Administración de Empresas Turísticas
                </option>
                <option value="Tecnología en Gestión de Servicios Gastronómicos">
                    Tecnología en Gestión de Servicios
                    Gastronómicos</option>
                <option value="Tecnología en Gestión Turística">
                    Tecnología en Gestión Turística</option>
                <option value="Ingeniería Comercial">Ingeniería
                    Comercial</option>
                <option value="Gastronomía y Culinaria">
                    Gastronomía y Culinaria</option>
                <option value="Tecnología en Delineante de Arquitectura e Ingeniería">
                    Tecnología en Delineante de Arquitectura e
                    Ingeniería</option>
                <option value="Tecnología en Gestión Catastral">
                    Tecnología en Gestión Catastral</option>
                <option value="Tecnología en Gestión Ambiental (virtual)">
                    Tecnología en Gestión Ambiental (virtual)
                </option>
                <option value="Arquitectura">Arquitectura
                </option>
                <option value="Construcciones Civiles">
                    Construcciones Civiles</option>
                <option value="Ingeniería Ambiental">Ingeniería
                    Ambiental</option>
                <option value="Bacteriología y Laboratorio Clínico">
                    Bacteriología y Laboratorio Clínico</option>
                <option value="Tecnología en Seguridad y Salud en el Trabajo">
                    Tecnología en Seguridad y Salud en el
                    Trabajo</option>
                <option value="Biotecnología">Biotecnología
                </option>
                <option value="Tecnología en Gestión Comunitaria">
                    Tecnología en Gestión Comunitaria</option>
                <option value="Planeación y Desarrollo Social">
                    Planeación y Desarrollo Social</option>
                <option value="Ingeniería de Software">
                    Ingeniería de Software</option>
                <option value="Ingeniería Eléctrica">Ingeniería
                    Eléctrica</option>
                <option value="Ingeniería Mecánica">Ingeniería
                    Mecánica</option>
                <option value="Tecnología en Desarrollo de Softwar">
                    Tecnología en Desarrollo de Softwar</option>
                <option value="Tecnología Eléctrica">Tecnología
                    Eléctrica</option>
                <option value="Tecnología en Gestión del Mantenimiento Aeronáutico">
                    Tecnología en Gestión del Mantenimiento
                    Aeronáutico</option>
                <option value="Tecnología en Operación Integral del Transporte">
                    Tecnología en Operación Integral del
                    Transporte</option>
                <option value="Tecnología en Mecánica Automotriz">
                    Tecnología en Mecánica Automotriz</option>
                <option value="Tecnología en Sistemas Electromecánicos">
                    Tecnología en Sistemas Electromecánicos
                </option>
                <option value="Tecnología en Sistemas Mecatrónicos">
                    Tecnología en Sistemas Mecatrónicos</option>
                <option value="Tecnología en Mecánica Industrial">
                    Tecnología en Mecánica Industrial</option>
                <option value="Tecnología Electrónica">
                    Tecnología Electrónica</option>
                <option value="Ingeniería Administrativa">
                    Ingeniería Administrativa</option>
                <option value="Ingeniería Industrial">Ingeniería
                    Industrial</option>
                <option value="Ingeniería en Logística">
                    Ingeniería en Logística</option>
                <option value="Profesional en Diseño de Vestuario">
                    Profesional en Diseño de Vestuario</option>
                <option value="Profesional en Gestión del Diseño">
                    Profesional en Gestión del Diseño</option>
                <option value="Profesional en Diseño Gráfico">
                    Profesional en Diseño Gráfico</option>
                <option value="Tecnología en Animación Digital">
                    Tecnología en Animación Digital</option>
                <option value="Tecnología en Gestión del Diseño Gráfico">
                    Tecnología en Gestión del Diseño Gráfico
                </option>
                <option value="Tecnología en Gestión del Diseño Textil y de Moda">
                    Tecnología en Gestión del Diseño Textil y de
                    Moda</option>
                <option value="Tecnología en Producción Industrial">
                    Tecnología en Producción Industrial</option>
                <option value="Cine">Cine</option>
                <option value="Tecnología en Diseño Industrial">
                    Tecnología en Diseño Industrial</option>
                <option value="Ingeniería en Diseño Industrial">
                    Ingeniería en Diseño Industrial</option>
                <option value="Tecnología en Informática Musical">
                    Tecnología en Informática Musical</option>
                <option value="Artes de la Grabación y Producción Musical">
                    Artes de la Grabación y Producción Musical
                </option>
                <option value="Artes Visuales">Artes Visuales
                </option>
                <option value="Tecnología en Análisis de Costos y Presupuestos (Virtual)">
                    Tecnología en Análisis de Costos y
                    Presupuestos (Virtual)</option>
                <option value="Contaduría Pública">Contaduría
                    Pública</option>
                <option value="Ingeniería de la Calidad">
                    Ingeniería de la Calidad</option>
                <option value="Tecnología en Gestión Administrativa (Virtual)">
                    Tecnología en Gestión Administrativa
                    (Virtual)</option>
                <option value="Tecnología en Análisis de Costos y Presupuestos">
                    Tecnología en Análisis de Costos y
                    Presupuestos</option>
                <option value="Ingeniería Financiera">Ingeniería
                    Financiera</option>
                <option value="Tecnología en Control de la Calidad">
                    Tecnología en Control de la Calidad</option>
                <option value="Tecnología en Gestión Administrativa">
                    Tecnología en Gestión Administrativa
                </option>
                <option value="Tecnología en Sistemas de Producción">
                    Tecnología en Sistemas de Producción
                </option>
                <option value="Ingeniería de Producción">
                    Ingeniería de Producción</option>
                <option value="Administración Tecnológica">
                    Administración Tecnológica</option>
                <option value="Ciencias Ambientales">Ciencias
                    Ambientales</option>
                <option value="Tecnología en Construcción de Acabados Arquitectónicos">
                    Tecnología en Construcción de Acabados
                    Arquitectónicos</option>
                <option value="Tecnología en Mantenimiento Equipo Biomédico">
                    Tecnología en Mantenimiento Equipo Biomédico
                </option>
                <option value="Ingeniería Biomédica">Ingeniería
                    Biomédica</option>
                <option value="Química Industrial">Química
                    Industrial</option>
                <option value="Tecnología en Desarrollo de Aplicaciones para Dispositivos Móviles">
                    Tecnología en Desarrollo de Aplicaciones
                    para Dispositivos Móviles</option>
                <option value="Tecnología en Diseño y Programación de Soluciones de Software como Servicio">
                    Tecnología en Diseño y Programación de
                    Soluciones de Software como Servicio
                </option>
                <option value="Tecnología en Automatización Electrónica">
                    Tecnología en Automatización Electrónica
                </option>
                <option value="Ingeniería Electrónica">
                    Ingeniería Electrónica</option>
                <option value="Tecnología en Gestión de Redes de Telecomunicaciones">
                    Tecnología en Gestión de Redes de
                    Telecomunicaciones</option>
                <option value="Ingeniería de Telecomunicaciones">
                    Ingeniería de Telecomunicaciones</option>
                <option value="Tecnología en Sistemas Electromecánicos">
                    Tecnología en Sistemas Electromecánicos
                </option>
                <option value="Ingeniería Electromecánica">
                    Ingeniería Electromecánica</option>
                <option value="Ingeniería Mecatrónica">
                    Ingeniería Mecatrónica</option>
                <option value="Tecnología en Desarrollo de Software">
                    Tecnología en Desarrollo de Software
                </option>
                <option value="Ingeniería de Sistemas">
                    Ingeniería de Sistemas</option>
            </select>
        </div>
    </div>

    <div class="col-md-4 col-auto">
        <div class="form-group">
            <label class="bmd-label-floating">¿El estudiante
                habla otro idioma diferente al español?</label>
            <select class="form-control" name="bilingue	" id="habla_otro_idioma_estudiante" >
                <option value="<?php echo $row['bilingue']; ?>"><?php echo $row['bilingue']; ?></option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 col-auto">
        <div class="form-group float-right">
            <a href="#cuatro" data-toggle="pill" aria-controls="v-pills-cuatro" aria-selected="true"><button
                    type="button" class="btn btn-lg btn-warning" stlye="float:rigth"><i class="fas fa-arrow-right"></i>
                    Siguiente</button></a>

        </div>
    </div>
</div>