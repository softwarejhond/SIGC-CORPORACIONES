<div class="card text-center">
     <div class="card-header" style="background-color:#009BFF; color:#ffffff">
         <i class="fas fa-user-graduate"></i> LISTA DE ESTUDIANTES REGISTRADOS <i class="fas fa-user-graduate"></i>
     </div>
     <div class="card-body">
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr>
                     <th>#</th>
                     <th>Documento</th>
                     <th class="w-25">Nombre</th>
                     <th class="w-25">Apellidos</th>
                     <th class="w-10">Teléfono</th>
                     <th class="w-50">Email</th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                 </tr>
             </thead>
             <tbody>
                 <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["numeroIdentificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion like '%$buscar%' ORDER BY id ASC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion like '%$buscar%' ORDER BY id ASC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '

						  <tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['numeroIdentificacion'] . '</td>
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['apellidos'] . '</td>
                            <td>' . $row['telefono'] . '</td>
                            <td>' . $row['email'] . '</td>

                            <td><a href="printCertificaties.php?nik=' .$row['numeroIdentificacion'].'"id="send" title="Imprimir certificado" class="btn btn-outline-success btn-sm"><span class="fa fa-print" aria-hidden="true"></span></a></td>
                          <td><a href="#" title="Actualizar estudiante" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            <td><a href="main.php?aksi=delete&nik=' . $row['numeroIdentificacion'] . '" title="Eliminar estudiante" onclick="return confirm(\'Esta seguro de borrar al Estudiante ' . $row['nombre'] . " " . $row['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

                          </tr>


						';
        $no++;
    }
}
?>
             </tbody>
         </table>
     </div>
     <div class="card-footer "style="background-color:#009BFF; color:#ffffff">
         <i class="fas fa-clock"></i>
         <?php
                                        $DateAndTime = date('m-d-Y h:i:s a', time());
                                        echo "Actualizado $DateAndTime.";
                                    ?>
     </div>

 </div>
 <script>
        $(document).ready(function() {
            $(".toastPatient").toast('show');
        });
</script>