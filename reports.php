<?php
include("conexion.php");
?>
<? 
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start(); ?>
<?php if(isset($_SESSION['loggedin'])):?>
<?php 
$filtro= htmlspecialchars($_SESSION["username"]);
    $title ="Dashboard - "; 
    $cantidadAhijados=mysqli_query($con, "select * from investigacion");
    $activos=mysqli_query($con, "SELECT * FROM investigacion WHERE estadoIES='ACTIVO'");
    $materiasCanceladas=mysqli_query($con, "SELECT * FROM investigacion WHERE estadoIES='ACTIVO CON MATERIAS CANCELADAS'");
    $suspendidos=mysqli_query($con, "SELECT * FROM investigacion WHERE estadoIES='SUSPENDIDO'");
    $retiroDefinitivo=mysqli_query($con, "SELECT * FROM investigacion WHERE estadoIES='RETIRO DEFINITIVO'");
    $graduados=mysqli_query($con, "SELECT * FROM investigacion WHERE estadoIES='GRADUADO'");
    $caracterizados=mysqli_query($con, "SELECT * FROM investigacion");
    $rol=mysqli_query($con, "SELECT * FROM users WHERE username like '%$filtro%'");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php');?>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDvc9IsEBOT0xYhJKb6fGhrS6gCB5kdycM",
        authDomain: "investigacion-759a1.firebaseapp.com",
        databaseURL: "https://investigacion-759a1.firebaseio.com",
        projectId: "investigacion-759a1",
        storageBucket: "investigacion-759a1.appspot.com",
        messagingSenderId: "897079378283",
        appId: "1:897079378283:web:5ed4686315b58097a74c2e",
        measurementId: "G-GRH2B3BVJR"
    };
    firebase.initializeApp(config);
    </script>
</head>
<?php include('nav.php');?>
<input type="text" id="nombre_completo_padrino" style="display:none">
<input type="text" id="numero_identificacion_padrino" style="display:none">


<body>
    <br>
    <br>
    <br>
    <h4 id="datos"></h4>
    <div class="container-fluid rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php //muy importante
                    include("txtBanner.php");
                    ?>
                    <div class="card-body">

                        <?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM investigacion WHERE numeroIdentificacion='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM investigacion WHERE numeroIdentificacion='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
            <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                    <div class="card-header">Estudiantes Activos</div>
                                    <div class="card-body">

                                        <h5 class="card-title"><?php echo mysqli_num_rows($activos) ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-warning mb-3" style="max-width: 100%">
                                    <div class="card-header">Activo con materias canceladas</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo mysqli_num_rows($materiasCanceladas) ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-info mb-3" style="max-width: 100%">
                                    <div class="card-header">Estudiantes suspendidos</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo mysqli_num_rows($suspendidos) ?></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-danger mb-3" style="max-width: 100%">
                                    <div class="card-header">Retiro definitivo</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo mysqli_num_rows($retiroDefinitivo) ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-primary mb-3" style="max-width: 100%">
                                    <div class="card-header">Estudiantes graduados</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo mysqli_num_rows($graduados) ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="card text-white bg-dark mb-3" style="max-width: 100%">
                                    <div class="card-header">Estudiantes caracterizados</div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo mysqli_num_rows($caracterizados) ?></h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <a href="#" class="btn btn-success" onclick="tableToExcel('testTable', 'Caracterizacion Estudiante')"><i class="fa fa-file-excel"></i> Exportar a Excel</a> </div>
                           
                        <table class="table table-hover table-bordered table-lg table-responsive" id="testTable" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <thead class="thead-dark">
                                <th>#</th>
                                <th>Tipo de identificación</th>
                                <th>Otro tipo de id</th>
                                <th>Número de identificación</th>
                                <th>Nombre completo</th>
                                <th>Identificación padrino</th>
                                <th>Nombre padrino</th>
                                <th>Sexo</th>
                                <th>Raza</th>
                                <th>Pertenencia a población LGTBI</th>
                                <th>Nacionalidad</th>
                                <th>Edad</th>
                                <th>Estado civil</th>
                                <th>Municipio</th>
                                <th>Comuna</th>
                                <th>Barrio</th>
                                <th>Estrato socioeconómico de la vivienda</th>
                                <th>Institución universitaria en la que estudia actualmente</th>
                                <th>Facultad</th>
                                <th>Programa académico</th>
                                <th>Segunda lengua</th>
                                <th>Autoreconocimiento como víctima del conflicto armado en Colombia</th>
                                <th>Inicio de proceso para el reconocimiento</th>
                                <th>Reconocimiento y registro en bases legales</th>
                                <th>Auxilio económico</th>
                                <th>Auxilio en especie</th>
                                <th>Beneficiario de elementos virtuales durante el COVID-19</th>
                                <th>Acompañamiento psicológico</th>
                                <th>Acompañamiento trabajo socials</th>
                                <th>Estado administrativo del estudiante</th>
                                <th>Cancelación formal del semestre</th>
                                <th>Acceso a Internet</th>
                                <th>Acceso modem internet COVID-19</th>
                                <th>Acceso a gas natural conectado a red pública</th>
                                <th>Acceso a energía</th>
                                <th>Energía prepago</th>
                                <th>Acceso a agua potable</th>
                                <th>Población con agua potable prepago</th>
                                <th>Periodicidad de pago de agua potable prepago</th>
                                <th>Acceso a telefonía fija</th>
                                <th>Acceso a saneamiento básico (manejo de aguas residuales)</th>
                                <th>Tipo de saneamiento (depende de acceso a saneamiento)</th>
                                <th>Acceso a recogida de residuos sólidos</th>
                                <th>Acceso a televisión (televisor y acceso al servicio)</th>
                                <th>Acceso a celular personal</th>
                                <th>Acceso a computador familiar</th>
                                <th>Acceso a computador personal</th>
                                <th>Acceso a computador por IES COVID-19</th>
                                <th>Acceso a tabletas electrónicas</th>
                                <th>Institución educativa media donde se graduó (colegio)</th>
                                <th>Tipo de colegio</th>
                                <th>Año de graduación educación media</th>
                                <th>Número de semestre vigente (en sistema académico)</th>
                                <th>Promedio académico actual</th>
                                <th>Cantidad de materias matriculados al inicio del semestre actual</th>
                                <th>Cantidad de créditos matriculados al inicio del semestre actual</th>
                                <th>Cancelación de materias</th>
                                <th>Cantidad de materias activas después de la cancelación</th>
                                <th>Cantidad de créditos después de la cancelación</th>
                                <th>Repitencia de materias</th>
                                <th>Cantidad de días a la semana con clases</th>
                                <th>Nivel de satisfacción con el programa cursado</th>
                                <th>Abandono de estudios académicos</th>
                                <th>Motivo principal de posibilidad de abandono</th>
                                <th>Otro Motivo principal de posibilidad de abandono</th>
                                <th>Alfabetismo materno</th>
                                <th>Grado máximo de escolaridad alcanzado por la madre</th>
                                <th>Alfabetismo paterno</th>
                                <th>Grado máximo de escolaridad alcanzado por el padre</th>
                                <th>Forma de ocupación de vivienda del estudiante</th>
                                <th>Cantidad de personas que habitan la vivienda</th>
                                <th>Cantidad de personas que laboran actualmente</th>
                                <th>Cantidad de cuartos con los que cuenta la vivienda</th>
                                <th>Percepción de espacio suficiente en vivienda</th>
                                <th>Cantidad de hermanos que tiene el estudiante</th>
                                <th>Jefe de hogar durante el COVID-19</th>
                                <th>Ingresos aproximados del hogar</th>
                                <th>Percepción del ingreso familiar</th>
                                <th>Percepción del ingreso familiar para cobertura de estudios</th>
                                <th>Actividades laborales</th>
                                <th>Transporte particular propio</th>
                                <th>Estudiante con hijos</th>
                                <th>Dependencia económica de padres o familiares</th>
                                <th>Cantidad de personas actualmente a cargo</th>
                                <th>Percepción de apoyo familiar</th>
                                <th>Orientación Vocacional</th>
                                <th>COVID-19</th>
                                <th>Sintomatología COVID-19</th>
                                <th>Consumo de alcohol</th>
                                <th>Frecuencia consumo de alcohol</th>
                                <th>Consumo de sustancias psicoactivas</th>
                                <th>Frecuencia consumo de sustancias psicoactivas</th>
                                <th>Embarazo</th>
                                <th>Parto en los últimos 6 meses</th>
                                <th>Deporte</th>
                                <th>Enfermedad respiratoria</th>
                                <th>Enfermedad ácido-péptica (gastritis)</th>
                                <th>Gastroenteritis</th>
                                <th>Accidentes traumáticos o fracturas</th>
                                <th>Migraña</th>
                                <th>Trastorno del aprendizaje</th>
                                <th>Diagnóstico de enfermedad mental</th>
                                <th>Diagnóstico de trastorno de personalidad</th>
                                <th>Diagnóstico de discapacidad</th>
                                <th>Tipo de discapacidad</th>
                                <th>Periodicidad de incapacidad en los últimos 6 meses</th>
                                <th>Estado</th>
                              
                            </thead>

                            <?php
					
				$buscar = $_POST["buscador"];
                $usaurio= htmlspecialchars($_SESSION["username"]);
             
			if($filter){
					$sql = mysqli_query($con, "SELECT * FROM investigacion WHERE numeroIdentificacion like '%$buscar%' ORDER BY nombre ASC");
				}else{
					$sql = mysqli_query($con, "SELECT * FROM investigacion ORDER BY emailPadrino ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
						    <td>'.$no.'</td>
                            <td>'.$row['tipoIdentificacion'].'</td>
                            <td>'.$row['otroTipoId'].'</td>
                            <td>'.$row['numeroIdentificacion'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['padrinoEducativo'].'</td>
                            <td>'.$row['emailPadrino'].'</td>
                            <td>'.$row['sexo'].'</td>
                            <td>'.$row['raza'].'</td>
                            <td>'.$row['lgtbi'].'</td>
                            <td>'.$row['nacionalidad'].'</td>
                            <td>'.$row['edad'].'</td>
                            <td>'.$row['estadoCivil'].'</td>
                            <td>'.$row['municipio'].'</td>
                            <td>'.$row['comuna'].'</td>
                            <td>'.$row['barrio'].'</td>
                            <td>'.$row['estrato'].'</td>
                            <td>'.$row['universidad'].'</td>
                            <td>'.$row['facultad'].'</td>
                            <td>'.$row['programa'].'</td>
                            <td>'.$row['bilingue'].'</td>
                            <td>'.$row['victimaArmada'].'</td>
                            <td>'.$row['familiaVictimaArmada'].'</td>
                            <td>'.$row['reconocimientoVictimaArmada'].'</td>
                            <td>'.$row['auxEconomico'].'</td>
                            <td>'.$row['auxEspecie'].'</td>
                            <td>'.$row['auxVirtuales'].'</td>
                            <td>'.$row['acomPsicologo'].'</td>
                            <td>'.$row['acompTSocial'].'</td>
                            <td>'.$row['estadoIES'].'</td>
                            <td>'.$row['cancelaFormal'].'</td>
                            <td>'.$row['internet'].'</td>
                            <td>'.$row['internetCOVID'].'</td>
                            <td>'.$row['gas'].'</td>
                            <td>'.$row['energia'].'</td>
                            <td>'.$row['energiaP'].'</td>
                            <td>'.$row['agua'].'</td>
                            <td>'.$row['aguaP'].'</td>
                            <td>'.$row['periodoPagoAgua'].'</td>
                            <td>'.$row['telefono'].'</td>
                            <td>'.$row['saneamiento'].'</td>
                            <td>'.$row['tipoSaneamiento'].'</td>
                            <td>'.$row['recogeResiduos'].'</td>
                            <td>'.$row['televisor'].'</td>
                            <td>'.$row['celular'].'</td>
                            <td>'.$row['computadorF'].'</td>
                            <td>'.$row['computadorP'].'</td>
                            <td>'.$row['computadorIES'].'</td>
                            <td>'.$row['tablets'].'</td>
                            <td>'.$row['colegio'].'</td>
                            <td>'.$row['tipoColegio'].'</td>
                            <td>'.$row['fechaGraduado'].'</td>
                            <td>'.$row['semestreVigente'].'</td>
                            <td>'.$row['promedio'].'</td>
                            <td>'.$row['materiasMatriculadas'].'</td>
                            <td>'.$row['creditos'].'</td>
                            <td>'.$row['canceloMaterias'].'</td>
                            <td>'.$row['cmac'].'</td>
                            <td>'.$row['ccc'].'</td>
                            <td>'.$row['repiteMaterias'].'</td>
                            <td>'.$row['diasClase'].'</td>
                            <td>'.$row['nsp'].'</td>
                            <td>'.$row['abandonoEstudios'].'</td>
                            <td>'.$row['mppa'].'</td>
                            <td>'.$row['otroMppa'].'</td>
                            <td>'.$row['alfMaterno'].'</td>
                            <td>'.$row['gmem'].'</td>
                            <td>'.$row['alfPaterno'].'</td>
                            <td>'.$row['gmep'].'</td>
                            <td>'.$row['tipoVivienda'].'</td>
                            <td>'.$row['cphv'].'</td>
                            <td>'.$row['cpla'].'</td>
                            <td>'.$row['cuartosVivienda'].'</td>
                            <td>'.$row['comodidadVivienda'].'</td>
                            <td>'.$row['ch'].'</td>
                            <td>'.$row['jhcovid'].'</td>
                            <td>'.$row['iah'].'</td>
                            <td>'.$row['pif'].'</td>
                            <td>'.$row['pifce'].'</td>
                            <td>'.$row['estudianteLabora'].'</td>
                            <td>'.$row['tpp'].'</td>
                            <td>'.$row['estudianteHijos'].'</td>
                            <td>'.$row['depf'].'</td>
                            <td>'.$row['cpac'].'</td>
                            <td>'.$row['paf'].'</td>
                            <td>'.$row['ov'].'</td>
                            <td>'.$row['covid19'].'</td>
                            <td>'.$row['sintomas'].'</td>
                            <td>'.$row['alcohol'].'</td>
                            <td>'.$row['fcAlcohol'].'</td>
                            <td>'.$row['sustancias'].'</td>
                            <td>'.$row['fcSustancias'].'</td>
                            <td>'.$row['embarazo'].'</td>
                            <td>'.$row['parto'].'</td>
                            <td>'.$row['deporte'].'</td>
                            <td>'.$row['eRespiratoria'].'</td>
                            <td>'.$row['gastritis'].'</td>
                            <td>'.$row['gastroenteritis'].'</td>
                            <td>'.$row['fracturas'].'</td>
                            <td>'.$row['migrana'].'</td>
                            <td>'.$row['ta'].'</td>
                            <td>'.$row['dem'].'</td>
                            <td>'.$row['dtp'].'</td>
                            <td>'.$row['discapacidad'].'</td>
                            <td>'.$row['tipoDiscapacidad'].'</td>
                            <td>'.$row['incapacidad'].'</td>
                   
							
							<td>';
							if($row['estadoIES'] == 'ACTIVO'){
								echo '<span class="alert alert-success">Activo</span>';
							}
                            else if ($row['estadoIES'] == 'ACTIVO CON MATERIAS CANCELADAS' ){
								echo '<span class="alert alert-warning">Act Mat Canceladas</span>';
							}
                            else if ($row['estadoIES'] == 'RETIRO DEFINITIVO' ){
								echo '<span class="alert alert-danger">Retiro definitivo</span>';
							}
                            else if ($row['estadoIES'] == 'GRADUADO' ){
								echo '<span class="alert alert-info">Graduado</span>';
							}
                            else if ($row['estadoIES'] == 'SUSPENDIDO' ){
								echo '<span class="alert alert-danger">Suspendido</span>';
							}
                            else if ($row['estadoIES'] == 'NO RESPONDE/NO INFORMACIÓN' ){
								echo '<span class="alert alert-light">No responde</span>';
							}
                            else if ($row['estadoIES'] == 'CANCELADO EN CAMBIO DE PROGRAMA/INSTITUCIÓN' ){
								echo '<span class="alert alert-light">Cambio</span>';
							}
						echo '
							</td>
              <td><a href="profile.php?nik='.$row['numeroIdentificacion'].'" title="Ver estudiante" class="btn btn-warning btn-sm"><span class="fa fa-eye" aria-hidden="true"></span></a></td>
              <td><a href="edit.php?nik='.$row['numeroIdentificacion'].'" title="Editar estudiante" class="btn btn-primary btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
              <td><a href="main.php?aksi=delete&nik='.$row['numeroIdentificacion'].'" title="Eliminar estudiante" onclick="return confirm(\'Esta seguro de borrar los datos de '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
						
             
					
						';
						$no++;
					}
				}
				?>
                        </table>
                        <?php include('pagination.php');?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    </div>

    <br><br>

    <?php include('footer.php');?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script language="javascript">
function doSearch() {
    var tableReg = document.getElementById('testTable');
    var searchText = document.getElementById('myInput').value.toLowerCase();
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}
</script>
<!-- Codigo para exportar tablas a excel -->
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<?php else: ?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif; ?>

</html>