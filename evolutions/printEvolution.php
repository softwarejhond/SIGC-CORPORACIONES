<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: main.php");
    exit;
}
 
// Include config file
require_once "conexion.php";
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');
    ?>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    #areaImprimir {
        background-image: url('./images/back.png');
        background-origin: content-box;
        background-size: 100% 50%;
    }
    </style>
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                    include("txtBanner.php");?>
                        <div class="card-body">

                            <!--ACTUALIZAR DATOS USUARIO-->
                            <h2>Historia clínica</h2>
                            <?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            $code = mysqli_real_escape_string($con,(strip_tags($_GET["code"],ENT_QUOTES)));
           
            $sqlPaciente = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion='$nik'");//muy importante el CROSS JOIN
			if(mysqli_num_rows($sqlPaciente) == 0){
				header("Location: index.php");
			}else{
				$rowPaciente = mysqli_fetch_assoc($sqlPaciente);
                header("./vistaFirmaHistoria.php?proceso=$nik");
			}

			$sqlHisotria = mysqli_query($con, "SELECT * FROM history WHERE numeroIdentificacion='$rowPaciente[numeroIdentificacion]' AND codigo='$code'");
			if(mysqli_num_rows($sqlHisotria) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sqlHisotria);
                $var= $row['doctorCreator'];
			}
			?>       
            <button id="send">firmar</button>

            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark"
                                    id="areaImprimir">
                                    <div style="text-align: center;">
                                        <?php
                              $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p class="text-right" style="font-size:12px">'.$empresaLog[nombre].'</p>';
                               }
                               ?>
                                        <div class="row">
                                            <div class="text-left col-6"><b>Fecha de impresión:</b>
                                                <?php echo date('d-m-Y');?></div>
                                            <div class="text-right col-6"><b>Historia clinica #:</b>
                                                <?php echo $rowPaciente['id'];?></div>
                                        </div>

                                        <img src="vistaLogo.php?id=1" alt='Logo' width="200px">
                                        <br>
                                        <?php
                              
                              $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<h3  class="card-text">'.$empresaLog[nombre].'</h3>';
                               echo '<h4  class="card-text">NIT: '.$empresaLog[nit].'</h4>';
                               }
                               ?>
                                    </div>
                                    <!--separador inicio-->
                                    <hr style="border-color:black;">
                                    <u>
                                        <h3 style="text-align: center;">HISTORIA CLÍNICA</h3>
                                    </u>
                                    <u>
                                        <h5 style="color: black;">DATOS PERSONALES:</h5>
                                    </u>
                                    <table class="border border-dark" style="width: 100%;border: 1px solid black;"
                                        id="print">
                                        <tr>
                                            <th class="historiaClinica">FECHA Y HORA DE LA VALORACIÓN:</th>
                                            <td class="historiaClinica"><?php echo $row['fechaCreacion'];?></label>
                                            </td>
                                            <th class="historiaClinica">IDENTIFICACIÓN:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['numeroIdentificacion'];?>
                                            </td>
                                            <th class="historiaClinica">NOMBRE Y APELLIDOS:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['nombre'];echo " "; echo $rowPaciente['apellidos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">FECHA DE NACIMIENTO:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['fechaNacimiento'];?>
                                            </td>
                                            <th class="historiaClinica">EDAD:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['edad'];?>
                                            </td>
                                            <th class="historiaClinica">SEXO:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['genero'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="historiaClinica">ESTADO CIVIL:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['estadoCivil'];?>
                                            </td>
                                            <th class="historiaClinica">OCUPACIÓN:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['ocupacion'];?>
                                            </td>
                                            <th class="historiaClinica">DIRECCIÓN:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['direccion'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">TELÉFONO:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['telefonoFijo'];?>
                                            </td>
                                            <th class="historiaClinica">CELULAR:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['telefonoCelular'];?>
                                            </td>
                                            <th class="historiaClinica">E-MAIL:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['email'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="historiaClinica">EPS:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['eps'];?>
                                            </td>
                                            <th class="historiaClinica">IPS:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['ips'];?>
                                            </td>
                                            <th class="historiaClinica">ESPECIALISTA:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['doctorAsignado'];?>
                                            </td>
                                        </tr>

                                        <!------------------------------------------>
                                        <tr>
                                            <th class="historiaClinica">NOMBRE Y APELLIDOS ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['nombreAcudiente'];echo " "; echo $rowPaciente['apellidoAcudiente'];?>
                                            </td>
                                            <th class="historiaClinica">IDENTIFICACIÓN ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['numeroIdentificacionAcudiente'];?> </td>
                                            <th class="historiaClinica">TELÉFONO ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['telefonoAcudiente'];?>
                                            </td>
                                        </tr>
                                        <!------------------------------------------>
                                    </table>
                                    <br>
                                    <u>
                                        <h5 style="color: black;">ANTECEDENTES PERSONALES:</h5>
                                    </u>
                                    <table style="width: 100%;border: 1px solid black;" id="print">
                                        <tr>
                                            <th class="historiaClinica">QUIRÚRGICOS:</th>
                                            <td class="historiaClinica" style="width: 100%;">
                                                <?php echo $row['quirurgicos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">TRAUMÁTICOS:</th>
                                            <td class="historiaClinica" style="width: 100%;">
                                                <?php echo $row['traumaticos'];?>
                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">GINECOBSTÉTRICOS:</th>
                                            <td class="historiaClinica">
                                                <?php echo $row['ginecobstetricos'];?> </td>
                                        <tr>
                                            <th class="historiaClinica">PATOLÓGICOS:</th>
                                            <td class="historiaClinica"><?php echo $row['patologicos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">ALÉRGICOS Y TOXICOS:</th>
                                            <td class="historiaClinica"><?php echo $row['alergicos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">TERAPÉUTICOS:</th>
                                            <td class="historiaClinica"><?php echo $row['terapeuticos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">FARMACOLÓGICOS:</th>
                                            <td class="historiaClinica"><?php echo $row['farmacologicos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">ACTIVIDAD DEPORTIVA:</th>
                                            <td class="historiaClinica"><?php echo $row['actividad_deportiva'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">FAMILIARES:</th>
                                            <td class="historiaClinica"><?php echo $row['familiares'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">DIAGNÓSTICO CLÍNICO:</th>
                                            <td class="historiaClinica"><?php echo $row['diagnostico_clinico'];?>
                                            </td>
                                        </tr>

                                        <!------------------------------------------>
                                    </table>
                                    <br>
                                    <!------------------------------------------>
                                    <u>
                                        <h5 style="color: black;">EVALUACIÓN FISIOTERAPÉUTICA:</h5>
                                    </u>
                                    <table style="width: 100%;border: 1px solid black;" id="print">
                                        <u>
                                            <h6 style="color: black;">SIGNOS VITALES:</h6>
                                        </u>
                                        <tr>
                                            <th class="historiaClinica">TENSIÓN ARTERIAL:</th>
                                            <td class="historiaClinica"><?php echo $row['tensionArterial'];?>
                                            </td>
                                            <th class="historiaClinica">FRECUENCIA CARDÍACA:</th>
                                            <td class="historiaClinica"><?php echo $row['frecuenciaCardiaca'];?>
                                            </td>
                                            <th class="historiaClinica">FRECUENCIA RESPIRATORIA:</th>
                                            <td class="historiaClinica"><?php echo $row['frecuenciaRespiratoria'];?>
                                            </td>
                                        </tr>
                                    </table>
                                    <table style="width: 100%;border: 1px solid black;" id="print">
                                        <table style="width: 100%;border: 1px solid black;" id="print">
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">TIPO DE TÓRAX:</h6>
                                            </u>
                                            <table style="width: 100%;border: 1px solid black;" id="print">
                                                <th class="historiaClinica">TORNO TÓRAX:</th>
                                                <td class="historiaClinica"><?php echo $row['torno'];?>
                                                </td>
                                                <th class="historiaClinica">TONEL:</th>
                                                <td class="historiaClinica"><?php echo $row['tonel'];?>
                                                </td>
                                                <th class="historiaClinica">EXCAVATUM:</th>
                                                <td class="historiaClinica"><?php echo $row['excavatum'];?>
                                                </td>
                                                <th class="historiaClinica">QUILLA:</th>
                                                <td class="historiaClinica"><?php echo $row['quilla'];?>
                                                </td>
                                                </tr>

                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">PATRÓN RESPIRATORIO:</h6>
                                            </u>
                                            <table style="width: 100%;border: 1px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">TÓRAX SIMÉTRICO:</th>
                                                    <td class="historiaClinica"><?php echo $row['toraxSimetrico'];?>
                                                    </td>
                                                    <th class="historiaClinica">TÓRAX ASIMÉTRICO:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['toraxAsimetrico'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">SIGNO DE DIFICULTAD RESPIRATORIA
                                                    </th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['dificultadRespiratoria'];?>
                                                    </td>
                                                    <th class="historiaClinica">INSPECCIÓN-OBSERVACIÓN:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['inspeccionObservacion'];?>
                                                    </td>
                                                    <th class="historiaClinica">ESTADO DE LA PIEL</th>
                                                    <td class="historiaClinica"><?php echo $row['estadoPiel'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">LENGUAJE</th>
                                                    <td class="historiaClinica"><?php echo $row['lenguaje'];?>
                                                    </td>
                                                    <th class="historiaClinica">EDEMA:</th>
                                                    <td class="historiaClinica"><?php echo $row['edema'];?>
                                                    </td>
                                                    <th class="historiaClinica">PALPACIÓN:</th>
                                                    <td class="historiaClinica"><?php echo $row['palpacion'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">OBSERVACIONES</th>
                                                    <td class="historiaClinica"><?php echo $row['observaciones'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">SENSIBILIDAD:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">SUPERFICIAL:</th>
                                                    <td class="historiaClinica"><?php echo $row['superficial'];?>
                                                    </td>
                                                    <th class="historiaClinica">PROFUNDA:</th>
                                                    <td class="historiaClinica"><?php echo $row['profunda'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">DOLOR AL MOVIMIENTO ACTIVO Y PASIVO:
                                                    </th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['dolorMovimiento'];?>
                                                    </td>
                                                    <th class="historiaClinica">PRUEBAS SEMIOLOGICAS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['pruebaSemiologica'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!------------------------------------------>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">REACCIONES ASOCIADAS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['reaccionesAsociadas'];?>
                                                    </td>
                                                    <th class="historiaClinica">SINERGIAS:</th>
                                                    <td class="historiaClinica"><?php echo $row['sinergias'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!------------------------------------------>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">CONTROL POSTURAL:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['controlPostural'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">TEST DE MOVILIDAD MUSCULAR:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">TONO MUSCULAR:</th>
                                                    <td class="historiaClinica"><?php echo $row['tonoMuscular'];?>
                                                    </td>
                                                    <th class="historiaClinica">OBSERVACION:</th>
                                                    <td class="historiaClinica"><?php echo $row['observacion'];?>
                                                    </td>
                                                    <th class="historiaClinica">MANIPULACIÓN PASIVA:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['manipulacionPasiva'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">PALPACIÓN:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['palpacionMovilidad'];?>
                                                    </td>
                                                    <th class="historiaClinica">RETRACCIONES MUSCULARES:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['retraccionesMusculares'];?>
                                                    </td>
                                                    <th class="historiaClinica">EXAMEN MUSCULAR O VALORACIÓN
                                                        FUNCIONAL:</th>
                                                    <td class="historiaClinica"><?php echo $row['examenMuscular'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!------------------------------------------>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">TROFISMO MUSCULAR:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['trofismoMuscular'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">MEDIDAS LONGITUDINALES:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">MEDIDAS REALES:</th>
                                                    <td class="historiaClinica"><?php echo $row['medidasReales'];?>
                                                    </td>
                                                    <th class="historiaClinica">APARENTES:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['medidasAparentes'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">REFLEJOS OSTEOTENDINOSOS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['reflejosOsteotendinosos'];?>
                                                    </td>
                                                    <th class="historiaClinica">REFLEJOS PATOLÓGICOS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['reflejosPatologicos'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">COORDINACIÓN:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">OCULO-MANUAL:</th>
                                                    <td class="historiaClinica"><?php echo $row['oculo_manual'];?>
                                                    </td>
                                                    <th class="historiaClinica">OCULO PEDICA:</th>
                                                    <td class="historiaClinica"><?php echo $row['oculo_pedica'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">MOTRICIDAD:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">MOTRICIDAD FINA:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['motricidad_fina'];?>
                                                    </td>
                                                    <th class="historiaClinica">MOTRICIDAD GRUESA:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['motricidad_gruesa'];?>
                                                    </td>
                                                    <th class="historiaClinica">MARCHA:</th>
                                                    <td class="historiaClinica"><?php echo $row['marcha'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">AYUDAS EXTERNAS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['ayudas_externas'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <!------------------------------------------>
                                            <u>
                                                <h6 style="color: black;">POSTURA:</h6>
                                            </u>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">ANTERIOR:</th>
                                                    <td class="historiaClinica"><?php echo $row['anterior'];?>
                                                    </td>
                                                    <th class="historiaClinica">POSTERIOR:</th>
                                                    <td class="historiaClinica"><?php echo $row['posterior'];?>
                                                    </td>
                                                    <th class="historiaClinica">LATERAL:</th>
                                                    <td class="historiaClinica"><?php echo $row['lateral'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">EQUILIBRIO:</th>
                                                    <td class="historiaClinica"><?php echo $row['equilibrio'];?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table style="width: 100%;border: 0px solid black;" id="print">
                                                <tr>
                                                    <th class="historiaClinica">ACTIVIDADES BÁSICAS COTIDIANAS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['actividadesBasicas'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">ACTIVIDADES DE LA VIDA DIARIA:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['actividadesVidaDiaria'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">OTRAS OBSERVACIONES:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['otrasObservaciones'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">DIAGNÓSTICO FISIOTERAPÉUTICO:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['diagnosticoFisioterapeutico'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">AYUDAS DIAGNÓSTICAS:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['ayudasDiagnosticas'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">REMISIÓN DEL SERVICIO:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['remisionServicio'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">LISTA DE SERVICIOS:</th>
                                                    <td class="historiaClinica"><?php echo $row['listaServicios'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="historiaClinica">OBSERVACIÓN:</th>
                                                    <td class="historiaClinica">
                                                        <?php echo $row['observaciones_muscular'];?>
                                                    </td>
                                                </tr>

                                            </table>
                                            <br>
                                            <div class="form-group">
                                                <h5 style="color:#000"><b>Firma del especialista:</b></h5>
                                                <br>
                                                <img src="vistaFirmaHistoria.php?id='<?php echo '9'?>'" alt='Perfil'
                                                    class="rounded p-1" width="300px" />
                                            </div>

                                            <?php
                              
                              $queryCompany = mysqli_query($con,"SELECT * FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p  class="text-center">'.$empresaLog[nombre].'</p>';
                               echo '<p class="text-center">NIT: '.$empresaLog[nit].' Teléfono: '.$empresaLog[telefono].'</p>';
                              echo '<p class="text-center"><b>SIGC © Copyright '.date("Y").'</b></p>';
                             }
                               ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h6 class="text-center"><b> Información protegida por la Ley
                                                                2015 31 ENE 2020
                                                                HISTORIA ClíNICA ELECTRÓNICA</b></h6>

                                                        "La presente ley tiene por objeto regular la
                                                        Interoperabilidad
                                                        de la Historia Clínica Electrónica - IHCE, a través de la
                                                        cual
                                                        se intercambiarán los elementos de datos clínicos
                                                        relevantes,
                                                        así como los documentos y expedientes clínicos del curso de
                                                        vida
                                                        de cada persona.
                                                        A través de la Historia Clínica Electrónica se facilitará,
                                                        agilizará y garantizará el acceso y ejercicio de los
                                                        derechos a
                                                        la salud y a la información de las personas, respetando el
                                                        Hábeas Data y la reserva de la misma."<sub>Ley 2015 31 ENE
                                                            2020</sub>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <p class="text-center">
                                                Reporte generado y soportado por Sistema Integral de Gestión Clínica
                                                <br>By Agencia de Desarrollo Eagle Software<br>

                                                <?php echo 'Todos los derechos reservados © Copyright '.date("Y")?>
                                            </p>
                                            <?php
                              $queryCompany = mysqli_query($con,"SELECT * FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p class="text-right" style="font-size:12px">'.$empresaLog[direccion].'</p>';
                               }
                               ?>
                                </div>
                            </div>

                            <br>
                            <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info"
                                style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                            <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i
                                    class="fa fa-sync"></i> CANCELAR</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('reloj.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('calendar.php');?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>
    </section>
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->

    <script>

    </script>

</body>
</html>