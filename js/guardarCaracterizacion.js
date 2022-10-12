var db = firebase.firestore();

//validamos de que si seleccionan el campo otro habilite y deshabilite los otros
function validarDocumento() {
    if (document.getElementById("tipo_identificacion").value == "Otro") {
        document.getElementById("otro_tipo_de_identificacion").disabled = false;
        document.getElementById("otro_tipo_de_identificacion").value = "";
    } else {
        document.getElementById("otro_tipo_de_identificacion").disabled = false;
        document.getElementById("otro_tipo_de_identificacion").value = "No Aplica";
    }
}

//validamos si municipios o corregimientos es igual a otros 
function validarMunicipiosCorregimientosotros() {
    if (document.getElementById("comuna_o_corregimiento_del_estudiante").value == "Otros - para municipios no Medellín") {
        document.getElementById("otros_comuna_o_corregimiento_del_estudiante").disabled = false;
        document.getElementById("otros_comuna_o_corregimiento_del_estudiante").value = "";
    } else {
        document.getElementById("otros_comuna_o_corregimiento_del_estudiante").disabled = true;
        document.getElementById("otros_comuna_o_corregimiento_del_estudiante").value = "No Aplica";
    }
}
//mostramos nombres y credenciales del padrino
/*function facultad() {
    //campo seleccionar
    if (document.getElementById("institucion_universitaria_del_estudiante").value == "") {
        document.getElementById("facultad_del_estudiante").value = "Seleccionar";
        document.getElementById("programa_academico_del_estudiante").value = "Seleccionar";
        document.getElementById("facultad_del_estudiante").innerHTML = "Seleccionar";
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
    }
    //facultades del colmayor
    if (document.getElementById("institucion_universitaria_del_estudiante").value == "I. U. Colegio Mayor de Antioquia") {
        var array = ["Seleccionar", "Facultad de Administración", "Facultad de Arquitectura e Ingeniería", "Facultad de Ciencias de la Salud", "Facultad Ciencias Sociales"];
        document.getElementById("facultad_del_estudiante").innerHTML = "Seleccionar";
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("facultad_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //facultades del pascual bravo
    if (document.getElementById("institucion_universitaria_del_estudiante").value == "I. U. Pascual Bravo") {
        var array = ["Seleccionar", "Facultad de Ingeniería", "Facultad de Producción y Diseño"];
        document.getElementById("facultad_del_estudiante").innerHTML = "Seleccionar";
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("facultad_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //facultades del ITM
    if (document.getElementById("institucion_universitaria_del_estudiante").value == "ITM") {
        var array = ["Seleccionar", "Facultad Artes y Humanidades", "Facultad Ciencias Económicas y Administrativas", "Facultad de Ciencias Exactas y Aplicadas", "Facultad de Ingenierías"];
        document.getElementById("facultad_del_estudiante").innerHTML = "Seleccionar";
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("facultad_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    validarInstitucion();
}
*/
/*function verProgramaPorFacultad() {
    //campo seleccionar
    if (document.getElementById("facultad_del_estudiante").value == "Seleccionar") {
        document.getElementById("programa_academico_del_estudiante").value = "Seleccionar";
    }
    //Facultades del colmayor
    //administracion
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Administración") {
        var array = ["Seleccionar", "Administración de Empresas Turísticas", "Tecnología en Gestión de Servicios Gastronómicos", "Tecnología en Gestión Turística", "Ingeniería Comercial", "Gastronomía y Culinaria"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //ingnieria
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Arquitectura e Ingeniería") {
        var array = ["Seleccionar", "Tecnología en Delineante de Arquitectura e Ingeniería", "Tecnología en Gestión Catastral", "Tecnología en Gestión Ambiental (virtual)", "Arquitectura", "Construcciones Civiles", "Ingeniería Ambiental"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //salud
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Ciencias de la Salud") {
        var array = ["Seleccionar", "Bacteriología y Laboratorio Clínico", "Tecnología en Seguridad y Salud en el Trabajo", "Biotecnología"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultad Ciencias Sociales
    if (document.getElementById("facultad_del_estudiante").value == "Facultad Ciencias Sociales") {
        var array = ["Seleccionar", "Tecnología en Gestión Comunitaria", "Planeación y Desarrollo Social"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultades del pascual bravo
    //Facultad de Ingeniería
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Ingeniería") {
        var array = ["Seleccionar", "Ingeniería de Software", "Ingeniería Eléctrica", "Ingeniería Mecánica", "Tecnología en Desarrollo de Software", "Tecnología Eléctrica", "Tecnología en Gestión del Mantenimiento Aeronáutico", "Tecnología en Operación Integral del Transporte", "Tecnología en Mecánica Automotriz", "Tecnología en Sistemas Electromecánicos", "Tecnología en Sistemas Mecatrónicos", "Tecnología en Mecánica Industrial", "Tecnología Electrónica"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultad de Producción y Diseño
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Producción y Diseño") {
        var array = ["Seleccionar", "Ingeniería Administrativa", "Ingeniería Industrial", "Ingeniería en Logística", "Profesional en Diseño de Vestuario", "Profesional en Gestión del Diseño", "Profesional en Diseño Gráfico", "Tecnología en Animación Digital", "Tecnología en Gestión del Diseño Gráfico", "Tecnología en Gestión del Diseño Textil y de Moda", "Tecnología en Producción Industrial"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultades itm
    //Facultad Artes y Humanidades
    if (document.getElementById("facultad_del_estudiante").value == "Facultad Artes y Humanidades") {
        var array = ["Seleccionar", "Cine", "Tecnología en Diseño Industrial", "Ingeniería en Diseño Industrial", "Tecnología en Informática Musical", "Artes de la Grabación y Producción Musical", "Artes Visuales"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultad Ciencias Económicas y Administrativas
    if (document.getElementById("facultad_del_estudiante").value == "Facultad Ciencias Económicas y Administrativas") {
        var array = ["Seleccionar", "Tecnología en Análisis de Costos y Presupuestos (Virtual)", "Contaduría Pública", "Ingeniería de la Calidad", "Tecnología en Gestión Administrativa (Virtual)", "Tecnología en Análisis de Costos y Presupuestos", "Ingeniería Financiera", "Tecnología en Control de la Calidad", "Tecnología en Gestión Administrativa", "Tecnología en Sistemas de Producción", "Ingeniería de Producción", "Administración Tecnológica"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultad de Ciencias Exactas y Aplicadas
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Ciencias Exactas y Aplicadas") {
        var array = ["Seleccionar", "Ciencias Ambientales", "Tecnología en Construcción de Acabados Arquitectónicos", "Tecnología en Mantenimiento Equipo Biomédico", "Ingeniería Biomédica", "Química Industrial"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
    //Facultad de Ingenierías
    if (document.getElementById("facultad_del_estudiante").value == "Facultad de Ingenierías") {
        var array = ["Seleccionar", "Tecnología en Desarrollo de Aplicaciones para Dispositivos Móviles", "Tecnología en Diseño y Programación de Soluciones de Software como Servicio", "Tecnología en Automatización Electrónica", "Ingeniería Electrónica", "Tecnología en Gestión de Redes de Telecomunicaciones", "Ingeniería de Telecomunicaciones", "Tecnología en Sistemas Electromecánicos", "Ingeniería Electromecánica", "Ingeniería Mecatrónica", "Tecnología en Desarrollo de Software", "Ingeniería de Sistemas"];
        document.getElementById("programa_academico_del_estudiante").innerHTML = "Seleccionar";
        for (var i in array) {
            document.getElementById("programa_academico_del_estudiante").innerHTML += "<option value='" + array[i] + "'>" + array[i] + "</option>";

        }
    }
}
*/


function validarInstitucion() { //donde dice solo ciertas instituciones
    if (document.getElementById("institucion_universitaria_del_estudiante").value == "I. U. Colegio Mayor de Antioquia" || document.getElementById("institucion_universitaria_del_estudiante").value == "ITM") {
        document.getElementById("estudiante_beneficiado_por_modem_de_las_ies").disabled = false;
        document.getElementById("recibio_beneficio_electronico_por_covid_estudiante").disabled = false;
        document.getElementById("beneficiario_por_prestamo_de_computador_estudiante").disabled = false;
        document.getElementById("estudiante_beneficiado_por_modem_de_las_ies").value = "";
        document.getElementById("recibio_beneficio_electronico_por_covid_estudiante").value = "";
        document.getElementById("beneficiario_por_prestamo_de_computador_estudiante").value = "";
    } else {
        document.getElementById("estudiante_beneficiado_por_modem_de_las_ies").disabled = true;
        document.getElementById("recibio_beneficio_electronico_por_covid_estudiante").disabled = true;
        document.getElementById("beneficiario_por_prestamo_de_computador_estudiante").disabled = true;
        document.getElementById("estudiante_beneficiado_por_modem_de_las_ies").value = "No";
        document.getElementById("recibio_beneficio_electronico_por_covid_estudiante").value = "No";
        document.getElementById("beneficiario_por_prestamo_de_computador_estudiante").value = "No";
    }
}

//validar si agua prepago es si o no
function aguaPrepago() {
    if (document.getElementById("hogar_con_agua_potable_prepago_estudiante").value == "Sí") {
        document.getElementById("cada_cuanto_se_hace_la_recarga_de_agua_estudiante").disabled = false;
        document.getElementById("cada_cuanto_se_hace_la_recarga_de_agua_estudiante").value = "";
    } else {
        document.getElementById("cada_cuanto_se_hace_la_recarga_de_agua_estudiante").disabled = false;
        document.getElementById("cada_cuanto_se_hace_la_recarga_de_agua_estudiante").value = "No aplica";
    }
}
//validar si tiene sanameanto o no
function saneamientos() {
    if (document.getElementById("acceso_a_saneamiento_basicop_estudiante").value == "Sí") {
        document.getElementById("tipo_de_saneamiento_basicop_estudiante").disabled = false;
        document.getElementById("respuestaSi").disabled = false;
        document.getElementById("respuestaSii").disabled = false;
        document.getElementById("respuestaNo").disabled = true;
        document.getElementById("respuestaNoo").disabled = true;
        document.getElementById("respuestaNooo").disabled = true;
    } else {
        document.getElementById("tipo_de_saneamiento_basicop_estudiante").disabled = false;
        document.getElementById("respuestaSi").disabled = true;
        document.getElementById("respuestaSii").disabled = true;
        document.getElementById("respuestaNo").disabled = false;
        document.getElementById("respuestaNoo").disabled = false;
        document.getElementById("respuestaNooo").disabled = false;
    }
}
//ponemos años estandares para su filtro
function Years() {
    var n = (new Date()).getFullYear()
    var select = document.getElementById("year_de_graduacion_de_bachiller_estudiante");
    for (var i = n; i >= 1900; i--) select.options.add(new Option(i, i));
};
window.onload = Years;
//funcion para validar materias canceladas
function materiasCanceladas() {
    if (document.getElementById("cancelo_materias_despues_de_inicar_semestre_estudiante").value == "Sí") {
        document.getElementById("cantidad_de_materias_despues_de_cancelar_estudiante").disabled = false;
        document.getElementById("cantidad_de_creditos_despues_de_cancelar_estudiante").disabled = false;
        document.getElementById("cantidad_de_materias_despues_de_cancelar_estudiante").value = "";
        document.getElementById("cantidad_de_creditos_despues_de_cancelar_estudiante").value = "";
    } else {
        document.getElementById("cantidad_de_materias_despues_de_cancelar_estudiante").disabled = false;
        document.getElementById("cantidad_de_creditos_despues_de_cancelar_estudiante").disabled = false;
        document.getElementById("cantidad_de_materias_despues_de_cancelar_estudiante").value = document.getElementById("cantidad_de_materias_inscritas_estudiante").value;
        document.getElementById("cantidad_de_creditos_despues_de_cancelar_estudiante").value = document.getElementById("creditos_matriculados_actualmente_estudiante").value;
    }
}

function validarSicancela() {
    if (document.getElementById("ha_considerado_cancelar_estudiante").value == "Sí") {
        document.getElementById("motivosSeleccionados").disabled = false;
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").disabled = false;
        document.getElementById("motivosSeleccionados").value = "";
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value = "";
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "";
    } else {
        document.getElementById("motivosSeleccionados").disabled = false;
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").disabled = false;
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value = "No aplica, no ha pensado cancelar";
        document.getElementById("motivosSeleccionados").value = "No aplica, no ha pensado cancelar";
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "No aplica, no ha pensado cancelar";
    }
}
//funcion para validar materias canceladas
function motivoDeAbandono() {
    var valoresSeleccionados = "";
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "") {
        document.getElementById("motivosSeleccionados").disabled = trufalsee;
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").disabled = false;
        document.getElementById("motivosSeleccionados").value = "";
        document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value = "";
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "";
    }
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "Académicos") {
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        valoresSeleccionados = valoresSeleccionados + "Académicos";
        document.getElementById("motivosSeleccionados").value = document.getElementById("motivosSeleccionados").value + " " + valoresSeleccionados;
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "Ha seleccionado otros motivos diferentes a otro";
    }
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "Económicos") {
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        valoresSeleccionados = valoresSeleccionados + "Económicos";
        document.getElementById("motivosSeleccionados").value = document.getElementById("motivosSeleccionados").value + " " + valoresSeleccionados;
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "Ha seleccionado otros motivos diferentes a otro";
    }
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "Familiares") {
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        valoresSeleccionados = valoresSeleccionados + "Familiares";
        document.getElementById("motivosSeleccionados").value = document.getElementById("motivosSeleccionados").value + " " + valoresSeleccionados;
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "Ha seleccionado otros motivos diferentes a otro";
    }
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "Personales") {
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        valoresSeleccionados = valoresSeleccionados + "Personales";
        document.getElementById("motivosSeleccionados").value = document.getElementById("motivosSeleccionados").value + " " + valoresSeleccionados;
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "Ha seleccionado otros motivos diferentes a otro";
    }
    if (document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value == "Otros") {
        document.getElementById("otro_tipo_de_abandono_estudiante").disabled = false;
        document.getElementById("motivosSeleccionados").disabled = false;
        document.getElementById("motivosSeleccionados").value = "";
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "";
        valoresSeleccionados = valoresSeleccionados + "Otros";
        document.getElementById("motivosSeleccionados").value = document.getElementById("motivosSeleccionados").value + " " + valoresSeleccionados;
    }
}

function borrarseleccionesMotivos() {
    document.getElementById("motivosSeleccionados").value = "";
    document.getElementById("seleccionar_motivos_de_cancelar_estudiante").value = "";
    document.getElementById("otro_tipo_de_abandono_estudiante").value = "";
}
//seleccionar familia
function conQuienViveEstudiante() {
    var familiaresSeleccionados = "";
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Mamá") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Mamá";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Papá") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Papá";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Hermanos(as)") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Hermanos(as)";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Abuelos(as)") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Abuelos(as)";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Tios(as)") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Tios(as)";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Conyuge") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Conyuge";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "hijos") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "hijos";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Compañeros de estudios") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Compañeros de estudios";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Amigos") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Amigos";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Vive solo") {
        document.getElementById("familiaresSeleccionados").disabled = false;
        familiaresSeleccionados = familiaresSeleccionados + "Vive solo";
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
        document.getElementById("otroFamiliaresSeleccionados").value = "No aplica se ha seleccionado otra opción diferente a otro";
    }
    if (document.getElementById("seleccionar_con_quien_vive_estudiante").value == "Otros") {
        document.getElementById("otroFamiliaresSeleccionados").disabled = false;
        document.getElementById("familiaresSeleccionados").disabled = false;
        document.getElementById("familiaresSeleccionados").value="";
        familiaresSeleccionados = familiaresSeleccionados + "Otros";
        document.getElementById("otro_tipo_de_abandono_estudiante").value = "";
        document.getElementById("otroFamiliaresSeleccionados").value = "";
       
        document.getElementById("familiaresSeleccionados").value = document.getElementById("familiaresSeleccionados").value + " " + familiaresSeleccionados;
    }
}
function borrarseleccionesFamiliares() {
    document.getElementById("familiaresSeleccionados").value = "";
    document.getElementById("seleccionar_con_quien_vive_estudiante").value = "";
    document.getElementById("otroFamiliaresSeleccionados").value = "";
}
function validarHermanos(){
    if(document.getElementById("cuantos_hermanos_estudiante").value =="0"){
        document.getElementById("posicion_entre_hermanos_estudiante").value="1";
    }else{
        document.getElementById("posicion_entre_hermanos_estudiante").value="";
        document.getElementById("posicion_entre_hermanos_estudiante").disabled = false;
    }
    
}
function validarConsumeAlcohol(){
    if(document.getElementById("estudiante_consumio_alcohol").value =="Sí"){
        document.getElementById("estudiante_frecuenia_de_consumo_alcohol").disabled = false;
        document.getElementById("estudiante_frecuenia_de_consumo_alcohol").value="";
    }else{
        document.getElementById("estudiante_frecuenia_de_consumo_alcohol").disabled = false;
        document.getElementById("estudiante_frecuenia_de_consumo_alcohol").value="No aplica";
    }
    
}
function validarSustancias(){
    if(document.getElementById("estudiante_consumio_sustancias").value =="Sí"){
        document.getElementById("estudiante_frecuenia_de_consumo_sustancias").disabled = false;
        document.getElementById("estudiante_frecuenia_de_consumo_sustancias").value="";
    }else{
        document.getElementById("estudiante_frecuenia_de_consumo_sustancias").disabled = false;
        document.getElementById("estudiante_frecuenia_de_consumo_sustancias").value="No aplica";
    }
    
}
function validarEmbarazo(){
    if(document.getElementById("sexo_del_estudiante").value =="Hombre"){
        document.getElementById("estudiante_en_embarazo").disabled = false;
        document.getElementById("estudiante_dado_a_luz").disabled = false;
        document.getElementById("estudiante_en_embarazo").value="No aplica - es hombre";
        document.getElementById("estudiante_dado_a_luz").value="No aplica - es hombre";
    }else{
        document.getElementById("estudiante_en_embarazo").disabled = false;
        document.getElementById("estudiante_dado_a_luz").disabled = false;
        document.getElementById("estudiante_en_embarazo").value="";
        document.getElementById("estudiante_dado_a_luz").value="";
    }
    
}
function validarDiscapacidad(){
    if(document.getElementById("estudiante_posee_discapacidad").value =="Sí"){
        document.getElementById("estudiante_tipo_discapacidad").disabled = false;
        document.getElementById("estudiante_tipo_discapacidad").value="";
    }else{
        document.getElementById("estudiante_tipo_discapacidad").disabled = false;
        document.getElementById("estudiante_tipo_discapacidad").value="No Aplica";
    }
    
}
function validarAlteracionPsicologicas(){
    if(document.getElementById("estudiante_alteraciones_psicologicas").value =="Otro"){
        document.getElementById("estudiante_cual_alteracion").disabled = false;
        document.getElementById("estudiante_cual_alteracion").value="";
    }else{
        document.getElementById("estudiante_cual_alteracion").disabled = false;
        document.getElementById("estudiante_cual_alteracion").value="No Aplica";
    }
    
}

function activarCOVID(){
    if(document.getElementById("estudiante_Diagnosticado_positivo_COVID_19").value =="Sí"){
        document.getElementById("gravedad_COVID_19").disabled = false;
        document.getElementById("gravedad_COVID_19").value="";
    }else{
        document.getElementById("gravedad_COVID_19").disabled = false;
        document.getElementById("gravedad_COVID_19").value="No aplica";
    }
}
