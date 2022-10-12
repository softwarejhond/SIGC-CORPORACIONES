<!DOCTYPE html>
<?php include('conexion.php');?>
<? 
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
session_start(); ?>
<?php if(isset($_SESSION['loggedin'])):?>
<?php 
    $title ="Dashboard - "; 

    $cantidadAhijados=mysqli_query($con, "select * from investigacion");
 
?>
<html lang="en">
<!--
Project      : Observatorio Comuna Uno
Author		 : Jhon Darwin Acevedo
Phone        : 3015606006
Email	 	 : softwarejhond@gmail.com
-->

<body>

    <head>
  <?php include('head.php');?>

    </head>
    <?php include('nav.php');?>

    <body class="">    
    <br>
    <br>
    <br>
    
        <h4 id="datos"></h4>
    
        <!-- CARACTERIZACION -->


        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <?php //muy importante
                    include("txtBanner.php");
                    ?>

                        <div class="card-body">
                            <label class="bmd-label-floating">
                                Todos los campos son obligatorios, en caso de ingresar
                                erroneamente un dato usted podrá actualizar
                                la información y eliminarla, esta información cuenta con
                                politicas de calidad en resguardo de información
                                y certificados SSL intalados en los servidores donde se
                                encuentra alojada dicha información.
                            </label>
                            <?php
                            	// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM investigacion WHERE numeroIdentificacion='$nik'");
			if (mysqli_num_rows($sql) == 0) {
				header("Location: main.php");
			} else {
				$row = mysqli_fetch_assoc($sql);
			}
			                 if(isset($_POST['actualziarEstudiante'])){
				              $tipoIdentificacion= mysqli_real_escape_string($con,(strip_tags($_POST["tipoIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
				              $otroTipoId= mysqli_real_escape_string($con,(strip_tags($_POST["otroTipoId"],ENT_QUOTES)));//Escanpando caracteres 
				              $numeroIdentificacion= mysqli_real_escape_string($con,(strip_tags($_POST["numeroIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
				              $nombre= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				              $padrinoEducativo= mysqli_real_escape_string($con,(strip_tags($_POST["padrinoEducativo"],ENT_QUOTES)));//Escanpando caracteres 
                              $emailPadrino= mysqli_real_escape_string($con,(strip_tags($_POST["emailPadrino"],ENT_QUOTES)));//Escanpando caracteres 
				              $sexo= mysqli_real_escape_string($con,(strip_tags($_POST["sexo"],ENT_QUOTES)));//Escanpando caracteres 
				              $raza= mysqli_real_escape_string($con,(strip_tags($_POST["raza"],ENT_QUOTES)));//Escanpando caracteres 
				              $lgtbi= mysqli_real_escape_string($con,(strip_tags($_POST["lgtbi"],ENT_QUOTES)));//Escanpando caracteres 
				              $nacionalidad= mysqli_real_escape_string($con,(strip_tags($_POST["nacionalidad"],ENT_QUOTES)));//Escanpando caracteres 
                              $edad=mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));//Escanpando caracteres 
				              $estadoCivil= mysqli_real_escape_string($con,(strip_tags($_POST["estadoCivil"],ENT_QUOTES)));//Escanpando caracteres 
				              $municipio= mysqli_real_escape_string($con,(strip_tags($_POST["municipio"],ENT_QUOTES)));//Escanpando caracteres 
				              $comuna= mysqli_real_escape_string($con,(strip_tags($_POST["comuna"],ENT_QUOTES)));//Escanpando caracteres 
				              $barrio= mysqli_real_escape_string($con,(strip_tags($_POST["barrio"],ENT_QUOTES)));//Escanpando caracteres 
                              $estrato= mysqli_real_escape_string($con,(strip_tags($_POST["estrato"],ENT_QUOTES)));//Escanpando caracteres 
				              $universidad= mysqli_real_escape_string($con,(strip_tags($_POST["universidad"],ENT_QUOTES)));//Escanpando caracteres 
				              $facultad= mysqli_real_escape_string($con,(strip_tags($_POST["facultad"],ENT_QUOTES)));//Escanpando caracteres 
				              $programa= mysqli_real_escape_string($con,(strip_tags($_POST["programa"],ENT_QUOTES)));//Escanpando caracteres 
				              $bilingue= mysqli_real_escape_string($con,(strip_tags($_POST["bilingue	"],ENT_QUOTES)));//Escanpando caracteres 
                              $victimaArmada= mysqli_real_escape_string($con,(strip_tags($_POST["victimaArmada"],ENT_QUOTES)));//Escanpando caracteres 
				              $familiaVictimaArmada= mysqli_real_escape_string($con,(strip_tags($_POST["familiaVictimaArmada"],ENT_QUOTES)));//Escanpando caracteres 
				              $reconocimientoVictimaArmada= mysqli_real_escape_string($con,(strip_tags($_POST["reconocimientoVictimaArmada"],ENT_QUOTES)));//Escanpando caracteres 
				              $auxEconomico= mysqli_real_escape_string($con,(strip_tags($_POST["auxEconomico"],ENT_QUOTES)));//Escanpando caracteres 
				              $auxEspecie= mysqli_real_escape_string($con,(strip_tags($_POST["auxEspecie"],ENT_QUOTES)));//Escanpando caracteres 
                              $auxVirtuales= mysqli_real_escape_string($con,(strip_tags($_POST["auxVirtuales"],ENT_QUOTES)));//Escanpando caracteres 
				              $acomPsicologo= mysqli_real_escape_string($con,(strip_tags($_POST["acomPsicologo"],ENT_QUOTES)));//Escanpando caracteres 
				              $acompTSocial= mysqli_real_escape_string($con,(strip_tags($_POST["acompTSocial"],ENT_QUOTES)));//Escanpando caracteres 
				              $estadoIES= mysqli_real_escape_string($con,(strip_tags($_POST["estadoIES"],ENT_QUOTES)));//Escanpando caracteres 
				              $cancelaFormal= mysqli_real_escape_string($con,(strip_tags($_POST["cancelaFormal"],ENT_QUOTES)));//Escanpando caracteres 
                              $internet= mysqli_real_escape_string($con,(strip_tags($_POST["internet"],ENT_QUOTES)));//Escanpando caracteres 
				              $internetCOVID= mysqli_real_escape_string($con,(strip_tags($_POST["internetCOVID"],ENT_QUOTES)));//Escanpando caracteres 
				              $gas= mysqli_real_escape_string($con,(strip_tags($_POST["gas"],ENT_QUOTES)));//Escanpando caracteres 
				              $energia= mysqli_real_escape_string($con,(strip_tags($_POST["energia"],ENT_QUOTES)));//Escanpando caracteres 
				              $energiaP= mysqli_real_escape_string($con,(strip_tags($_POST["energiaP"],ENT_QUOTES)));//Escanpando caracteres 
                              $agua= mysqli_real_escape_string($con,(strip_tags($_POST["agua"],ENT_QUOTES)));//Escanpando caracteres 
				              $aguaP= mysqli_real_escape_string($con,(strip_tags($_POST["aguaP"],ENT_QUOTES)));//Escanpando caracteres 
				              $periodoPagoAgua= mysqli_real_escape_string($con,(strip_tags($_POST["periodoPagoAgua"],ENT_QUOTES)));//Escanpando caracteres 
				              $telefono= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
				              $saneamiento= mysqli_real_escape_string($con,(strip_tags($_POST["saneamiento"],ENT_QUOTES)));//Escanpando caracteres 
                              $tipoSaneamiento= mysqli_real_escape_string($con,(strip_tags($_POST["tipoSaneamiento"],ENT_QUOTES)));//Escanpando caracteres 
				              $recogeResiduos= mysqli_real_escape_string($con,(strip_tags($_POST["recogeResiduos"],ENT_QUOTES)));//Escanpando caracteres 
				              $televisor= mysqli_real_escape_string($con,(strip_tags($_POST["televisor"],ENT_QUOTES)));//Escanpando caracteres 
				              $celular= mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));//Escanpando caracteres 
				              $computadorF= mysqli_real_escape_string($con,(strip_tags($_POST["computadorF"],ENT_QUOTES)));//Escanpando caracteres 
                              $computadorP= mysqli_real_escape_string($con,(strip_tags($_POST["computadorP"],ENT_QUOTES)));//Escanpando caracteres 
				              $computadorIES= mysqli_real_escape_string($con,(strip_tags($_POST["computadorIES"],ENT_QUOTES)));//Escanpando caracteres 
				              $tablets= mysqli_real_escape_string($con,(strip_tags($_POST["tablets"],ENT_QUOTES)));//Escanpando caracteres 
				              $colegio= mysqli_real_escape_string($con,(strip_tags($_POST["colegio"],ENT_QUOTES)));//Escanpando caracteres 
				              $tipoColegio= mysqli_real_escape_string($con,(strip_tags($_POST["tipoColegio"],ENT_QUOTES)));//Escanpando caracteres 
                              $fechaGraduado= mysqli_real_escape_string($con,(strip_tags($_POST["fechaGraduado"],ENT_QUOTES)));//Escanpando caracteres 
				              $semestreVigente= mysqli_real_escape_string($con,(strip_tags($_POST["semestreVigente"],ENT_QUOTES)));//Escanpando caracteres 
				              $promedio= mysqli_real_escape_string($con,(strip_tags($_POST["promedio"],ENT_QUOTES)));//Escanpando caracteres 
				              $materiasMatriculadas= mysqli_real_escape_string($con,(strip_tags($_POST["materiasMatriculadas"],ENT_QUOTES)));//Escanpando caracteres 
                              $creditos= mysqli_real_escape_string($con,(strip_tags($_POST["creditos"],ENT_QUOTES)));//Escanpando caracteres 
				              $canceloMaterias= mysqli_real_escape_string($con,(strip_tags($_POST["canceloMaterias"],ENT_QUOTES)));//Escanpando caracteres 
				              $cmac= mysqli_real_escape_string($con,(strip_tags($_POST["cmac"],ENT_QUOTES)));//Escanpando caracteres 
				              $ccc= mysqli_real_escape_string($con,(strip_tags($_POST["ccc"],ENT_QUOTES)));//Escanpando caracteres 
				              $repiteMaterias= mysqli_real_escape_string($con,(strip_tags($_POST["repiteMaterias"],ENT_QUOTES)));//Escanpando caracteres 
                              $diasClase= mysqli_real_escape_string($con,(strip_tags($_POST["diasClase"],ENT_QUOTES)));//Escanpando caracteres 
				              $nsp= mysqli_real_escape_string($con,(strip_tags($_POST["nsp"],ENT_QUOTES)));//Escanpando caracteres 
				              $abandonoEstudios= mysqli_real_escape_string($con,(strip_tags($_POST["abandonoEstudios"],ENT_QUOTES)));//Escanpando caracteres 
				              $mppa= mysqli_real_escape_string($con,(strip_tags($_POST["mppa"],ENT_QUOTES)));//Escanpando caracteres 
				              $otroMppa	= mysqli_real_escape_string($con,(strip_tags($_POST["otroMppa"],ENT_QUOTES)));//Escanpando caracteres 
                              $alfMaterno= mysqli_real_escape_string($con,(strip_tags($_POST["alfMaterno"],ENT_QUOTES)));//Escanpando caracteres 
				              $gmem= mysqli_real_escape_string($con,(strip_tags($_POST["gmem"],ENT_QUOTES)));//Escanpando caracteres 
				              $alfPaterno= mysqli_real_escape_string($con,(strip_tags($_POST["alfPaterno"],ENT_QUOTES)));//Escanpando caracteres 
				              $gmep= mysqli_real_escape_string($con,(strip_tags($_POST["gmep"],ENT_QUOTES)));//Escanpando caracteres 
				              $tipoVivienda= mysqli_real_escape_string($con,(strip_tags($_POST["tipoVivienda"],ENT_QUOTES)));//Escanpando caracteres 
                              $cphv= mysqli_real_escape_string($con,(strip_tags($_POST["cphv"],ENT_QUOTES)));//Escanpando caracteres 
				              $cpla= mysqli_real_escape_string($con,(strip_tags($_POST["cpla"],ENT_QUOTES)));//Escanpando caracteres 
				              $cuartosVivienda= mysqli_real_escape_string($con,(strip_tags($_POST["cuartosVivienda"],ENT_QUOTES)));//Escanpando caracteres 
				              $comodidadVivienda= mysqli_real_escape_string($con,(strip_tags($_POST["comodidadVivienda"],ENT_QUOTES)));//Escanpando caracteres comodidad habitantes
				              $ch= mysqli_real_escape_string($con,(strip_tags($_POST["ch"],ENT_QUOTES)));//Escanpando caracteres 
                              $jhcovid= mysqli_real_escape_string($con,(strip_tags($_POST["jhcovid"],ENT_QUOTES)));//Escanpando caracteres 
				              $iah= mysqli_real_escape_string($con,(strip_tags($_POST["iah"],ENT_QUOTES)));//Escanpando caracteres 
				              $pif= mysqli_real_escape_string($con,(strip_tags($_POST["pif"],ENT_QUOTES)));//Escanpando caracteres 
				              $pifce= mysqli_real_escape_string($con,(strip_tags($_POST["pifce"],ENT_QUOTES)));//Escanpando caracteres 
                              $estudianteLabora= mysqli_real_escape_string($con,(strip_tags($_POST["estudianteLabora"],ENT_QUOTES)));//Escanpando caracteres 
				              $tpp= mysqli_real_escape_string($con,(strip_tags($_POST["tpp"],ENT_QUOTES)));//Escanpando caracteres 
				              $estudianteHijos= mysqli_real_escape_string($con,(strip_tags($_POST["estudianteHijos"],ENT_QUOTES)));//Escanpando caracteres 
				              $depf= mysqli_real_escape_string($con,(strip_tags($_POST["depf"],ENT_QUOTES)));//Escanpando caracteres 
				              $cpac= mysqli_real_escape_string($con,(strip_tags($_POST["cpac"],ENT_QUOTES)));//Escanpando caracteres 
                              $paf= mysqli_real_escape_string($con,(strip_tags($_POST["paf"],ENT_QUOTES)));//Escanpando caracteres 
				              $ov= mysqli_real_escape_string($con,(strip_tags($_POST["ov"],ENT_QUOTES)));//Escanpando caracteres 
				              $covid19= mysqli_real_escape_string($con,(strip_tags($_POST["covid19"],ENT_QUOTES)));//Escanpando caracteres 
				              $sintomas= mysqli_real_escape_string($con,(strip_tags($_POST["sintomas"],ENT_QUOTES)));//Escanpando caracteres 
				              $alcohol= mysqli_real_escape_string($con,(strip_tags($_POST["alcohol"],ENT_QUOTES)));//Escanpando caracteres 
                              $fcAlcohol= mysqli_real_escape_string($con,(strip_tags($_POST["fcAlcohol"],ENT_QUOTES)));//Escanpando caracteres 
				              $sustancias= mysqli_real_escape_string($con,(strip_tags($_POST["sustancias"],ENT_QUOTES)));//Escanpando caracteres 
				              $fcSustancias= mysqli_real_escape_string($con,(strip_tags($_POST["fcSustancias"],ENT_QUOTES)));//Escanpando caracteres 
				              $embarazo= mysqli_real_escape_string($con,(strip_tags($_POST["embarazo"],ENT_QUOTES)));//Escanpando caracteres 
				              $parto= mysqli_real_escape_string($con,(strip_tags($_POST["parto"],ENT_QUOTES)));//Escanpando caracteres 
                              $deporte= mysqli_real_escape_string($con,(strip_tags($_POST["deporte"],ENT_QUOTES)));//Escanpando caracteres 
				              $eRespiratoria= mysqli_real_escape_string($con,(strip_tags($_POST["eRespiratoria"],ENT_QUOTES)));//Escanpando caracteres 
				              $gastritis= mysqli_real_escape_string($con,(strip_tags($_POST["gastritis"],ENT_QUOTES)));//Escanpando caracteres 
				              $gastroenteritis= mysqli_real_escape_string($con,(strip_tags($_POST["gastroenteritis"],ENT_QUOTES)));//Escanpando caracteres 
				              $fracturas= mysqli_real_escape_string($con,(strip_tags($_POST["fracturas"],ENT_QUOTES)));//Escanpando caracteres 
                              $migrana= mysqli_real_escape_string($con,(strip_tags($_POST["migrana"],ENT_QUOTES)));//Escanpando caracteres 
				              $ta= mysqli_real_escape_string($con,(strip_tags($_POST["ta"],ENT_QUOTES)));//Escanpando caracteres 
                              $dem= mysqli_real_escape_string($con,(strip_tags($_POST["dem"],ENT_QUOTES)));//Escanpando caracteres 
				              $dtp= mysqli_real_escape_string($con,(strip_tags($_POST["dtp"],ENT_QUOTES)));//Escanpando caracteres 
				              $discapacidad= mysqli_real_escape_string($con,(strip_tags($_POST["discapacidad"],ENT_QUOTES)));//Escanpando caracteres 
                              $tipoDiscapacidad= mysqli_real_escape_string($con,(strip_tags($_POST["tipoDiscapacidad"],ENT_QUOTES)));//Escanpando caracteres 
				              $incapacidad= mysqli_real_escape_string($con,(strip_tags($_POST["incapacidad"],ENT_QUOTES)));//Escanpando caracteres 
			
			
                              $update = mysqli_query($con, "UPDATE investigacion SET tipoIdentificacion='$tipoIdentificacion',
                               otroTipoId='$otroTipoId', numeroIdentificacion='$numeroIdentificacion', nombre='$nombre', 
                               padrinoEducativo='$padrinoEducativo',emailPadrino='$emailPadrino', sexo='$sexo', 
                               raza='$raza', lgtbi='$lgtbi',nacionalidad='$nacionalidad',edad='$edad', estadoCivil='$estadoCivil',
                               municipio='$municipio', comuna='$comuna',barrio='$barrio',estrato='$estrato', 
                               universidad='$universidad', facultad='$facultad', programa='$programa',bilingue='$bilingue',
                               victimaArmada='$victimaArmada', familiaVictimaArmada='$familiaVictimaArmada', 
                               reconocimientoVictimaArmada='$reconocimientoVictimaArmada', auxEconomico='$auxEconomico',
                               auxEspecie='$auxEspecie',auxVirtuales='$auxVirtuales', acomPsicologo='$acomPsicologo',acompTSocial='$acompTSocial', 
                               estadoIES='$estadoIES', cancelaFormal='$cancelaFormal',internet='$internet',
                               internetCOVID='$internetCOVID', gas='$gas', energia='$energia', 
                               energiaP='$energiaP',agua='$agua', aguaP='$aguaP', 
                               periodoPagoAgua='$periodoPagoAgua', telefono='$telefono',saneamiento='$saneamiento',tipoSaneamiento='$tipoSaneamiento', recogeResiduos='$recogeResiduos',
                               televisor='$televisor', celular='$celular',computadorF='$computadorF',computadorP='$computadorP', 
                               computadorIES='$computadorIES', tablets='$tablets', colegio='$colegio',tipoColegio='$tipoColegio',
                               fechaGraduado='$fechaGraduado', semestreVigente='$semestreVigente', 
                               promedio='$promedio', materiasMatriculadas='$materiasMatriculadas',
                               creditos='$creditos',canceloMaterias='$canceloMaterias', cmac='$cmac',ccc='$ccc', 
                               repiteMaterias='$repiteMaterias', diasClase='$diasClase', nsp='$nsp', 
                               abandonoEstudios='$abandonoEstudios', mppa='$mppa',
                               otroMppa='$otroMppa',alfMaterno='$alfMaterno', gmem='$gmem',alfPaterno='$alfPaterno', 
                               gmep='$gmep', tipoVivienda='$tipoVivienda',cphv='$cphv',
                               cpla='$cpla', cuartosVivienda='$cuartosVivienda', comodidadVivienda='$comodidadVivienda', 
                               ch='$ch',jhcovid='$jhcovid', iah='$iah', pif='$pif', pifce='$pifce',estudianteLabora='$estudianteLabora',tipoSaneamiento='$tipoSaneamiento', recogeResiduos='$recogeResiduos',
                               tpp='$tpp', estudianteHijos='$estudianteHijos',depf='$depf',cpac='$cpac', 
                               paf='$paf', ov='$ov', covid19='$covid19',sintomas='$sintomas',
                               alcohol='$alcohol', fcAlcohol='$fcAlcohol', 
                               sustancias='$sustancias', fcSustancias='$fcSustancias',
                               embarazo='$embarazo',parto='$parto', deporte='$deporte',eRespiratoria='$eRespiratoria', 
                               gastritis='$gastritis', gastroenteritis='$gastroenteritis', 
                               fracturas='$fracturas', migrana='$migrana',
                               ta='$ta',dem='$dem', dtp='$dtp',discapacidad='$discapacidad', 
                               tipoDiscapacidad='$tipoDiscapacidad', incapacidad='$incapacidad' WHERE numeroIdentificacion='$nik'");
                              if ($update) {
                                  header("Location: edit.php?nik=" . $nik . "&pesan=sukses");
                                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos se han actualizado y guardados con éxito.</div>';
                          
                              } else {
                                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                              }
                          
              
                          if (isset($_GET['pesan']) == 'sukses') {
                              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos se han actualizado y guardados con éxito.</div>';
                          }
                      }
			                ?>

                            <form class="form-horizontal" action="" method="POST">
                                <div class="row">
                                    <div class="col col-md-3 col-auto shadow p-3 mb-5 bg-white rounded ">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-uno-tab" data-toggle="pill"
                                                href="#uno" role="tab" aria-controls="v-pills-uno"
                                                aria-selected="true">1. Identificación del estudiante</a>
                                            <a class="nav-link" id="v-pills-dos-tab" data-toggle="pill" href="#dos"
                                                role="tab" aria-controls="v-pills-dos" aria-selected="false">2.
                                                Identificación del padrino</a>
                                            <a class="nav-link" id="v-pills-tres-tab" data-toggle="pill" href="#tres"
                                                role="tab" aria-controls="v-pills-tres" aria-selected="false">3.
                                                Caracterización del estudiante</a>
                                            <a class="nav-link" id="v-pills-cuatro-tab" data-toggle="pill"
                                                href="#cuatro" role="tab" aria-controls="v-pills-cuatro"
                                                aria-selected="false">4. Víctima del Conflicto Armado Interno</a>
                                            <a class="nav-link" id="v-pills-cinco-tab" data-toggle="pill" href="#cinco"
                                                role="tab" aria-controls="v-pills-cinco" aria-selected="true">5.
                                                Condición especifica COVID-19</a>
                                            <a class="nav-link" id="v-pills-seis-tab" data-toggle="pill" href="#seis"
                                                role="tab" aria-controls="v-pills-seis" aria-selected="false">6. Estado
                                                actual del estudiante frente a la educación superior</a>
                                            <a class="nav-link" id="v-pills-siete-tab" data-toggle="pill" href="#siete"
                                                role="tab" aria-controls="v-pills-siete" aria-selected="false">7. Acceso
                                                a servicios públicos y acceso a tecnologías deinformación y
                                                comunicación</a>
                                            <a class="nav-link" id="v-pills-ocho-tab" data-toggle="pill" href="#ocho"
                                                role="tab" aria-controls="v-pills-ocho" aria-selected="false">8.
                                                Caracterización académica del estudiante</a>
                                            <a class="nav-link" id="v-pills-nueve-tab" data-toggle="pill" href="#nueve"
                                                role="tab" aria-controls="v-pills-nueve" aria-selected="false">9.
                                                Caracterización socioeconómica y familiar</a>
                                            <a class="nav-link" id="v-pills-diez-tab" data-toggle="pill" href="#diez"
                                                role="tab" aria-controls="v-pills-diez" aria-selected="false">10.
                                                Caracterización en salud</a>
                                        </div>
                                    </div>
                                    <div class="col col-md-9 col-auto shadow p-3 mb-5 bg-white rounded">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="uno" role="tabpanel"
                                                aria-labelledby="v-pills-uno-tab">
                                                <?php include('edit_Encuesta/momento1.php');?></div>
                                            <div class="tab-pane fade" id="dos" role="tabpanel"
                                                aria-labelledby="v-pills-dos-tab">
                                                <?php include('edit_Encuesta/momento2.php');?></div>
                                            <div class="tab-pane fade" id="tres" role="tabpanel"
                                                aria-labelledby="v-pills-tres-tab">
                                                <?php include('edit_Encuesta/momento3.php');?></div>
                                            <div class="tab-pane fade" id="cuatro" role="tabpanel"
                                                aria-labelledby="v-pills-cuatro-tab">
                                                <?php include('edit_Encuesta/momento4.php');?></div>
                                            <div class="tab-pane fade" id="cinco" role="tabpanel"
                                                aria-labelledby="v-pills-cinco-tab">
                                                <?php include('edit_Encuesta/momento5.php');?></div>
                                            <div class="tab-pane fade" id="seis" role="tabpanel"
                                                aria-labelledby="v-pills-seis-tab">
                                                <?php include('edit_Encuesta/momento6.php');?></div>
                                            <div class="tab-pane fade" id="siete" role="tabpanel"
                                                aria-labelledby="v-pills-siete-tab">
                                                <?php include('edit_Encuesta/momento7.php');?></div>
                                            <div class="tab-pane fade" id="ocho" role="tabpanel"
                                                aria-labelledby="v-pills-ocho-tab">
                                                <?php include('edit_Encuesta/momento8.php');?></div>
                                            <div class="tab-pane fade" id="nueve" role="tabpanel"
                                                aria-labelledby="v-pills-nueve-tab">
                                                <?php include('edit_Encuesta/momento9.php');?></div>
                                            <div class="tab-pane fade" id="diez" role="tabpanel"
                                                aria-labelledby="v-pills-diez-tab">
                                                <?php include('edit_Encuesta/momento10.php');?></div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-sm-3 control-label">&nbsp;</label>
                                            <div class="col-md-12 justify-content-center">
                                            <input type="submit" name="actualziarEstudiante" class="btn btn-lg btn-success" value="Guardar">
                                                    <a href="main.php" class="btn btn-lg btn-danger">Cancelar</a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>

        </div>
    </body>

    <script src="js/guardarCaracterizacion.js?v=0.0.0.4"></script>
    <?php else: ?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif; ?>
</html>