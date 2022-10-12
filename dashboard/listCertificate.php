<div class="card text-center">
    <div class="card-header "style="background-color:#FFD500">
        <i class="fa fa-laptop-medical"></i> LISTA DE HISTORIAS CLÍNICAS <i class="fa fa-laptop-medical"></i>
    </div>
    <div class="card-body">
        <table id="example" class="display table table-hover table-bordered table-lg table-responsive">

            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Documento</th>
                    <th class="w-25">Nombre</th>
                    <th class="w-25">Apellidos</th>
                    <th class="w-10">fecha creación</th>
                    <th class="w-50">Doctor</th>
                    <th class="w-50"> </th>
                    <th class="w-50"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
$usaurio = htmlspecialchars($_SESSION["numeroIdentificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM history, patient WHERE history.numeroIdentificacion = patient.numeroIdentificacion;");
} else {
    $sql = mysqli_query($con, "SELECT * FROM history, patient WHERE history.numeroIdentificacion = patient.numeroIdentificacion;");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {

       
        echo '
						<tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $row['numeroIdentificacion'] . '</td>
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['apellidos'] . '</td>
                            <td>' . $row['fechaCreacion'] . '</td>
                            <td>' . $row['doctorCreator'] . '</td>

                           <td><a href="printHistory.php?nik=' . $row['numeroIdentificacion'] . '&code=' . $row['codigo'] . '&idDoct=' . $row['doctorCreator'] . '"id="send" title="Imprimir historia clínica" class="btn btn-outline-primary btn-sm"><span class="fa fa-print" aria-hidden="true"></span></a></td>
                           <td><a href="main.php?aksiHistory=deleteHistory&codigo=' . $row['codigo'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar la historia clinica: ' . $row['codigo'] . ' correspondiente al paciente ' . $row['nombre'] . " " . $row['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

                           
                        </tr>

						';
        $no++;
    }
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Documento</th>
                    <th class="w-25">Nombre</th>
                    <th class="w-25">Apellidos</th>
                    <th class="w-10">fecha creación</th>
                    <th class="w-50">Doctor</th>
                    <th class="w-50"> </th>
                    <th class="w-50"> </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer "style="background-color:#FFD500">
        <i class="fas fa-clock"></i>
        <?php
                                        $DateAndTime = date('m-d-Y h:i:s a', time());
                                        echo "Actualizado $DateAndTime.";
                                    ?>
    </div>
</div>
<script>
        $(document).ready(function() {
            $(".toastHistory").toast('show');
        });
</script>