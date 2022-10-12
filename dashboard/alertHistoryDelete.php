<?php
if (isset($_GET['aksiHistory']) == 'deleteHistory') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $codigo = mysqli_real_escape_string($con, (strip_tags($_GET["codigo"], ENT_QUOTES)));
    $cek = mysqli_query($con, "SELECT * FROM history WHERE codigo='$codigo'");
    if (mysqli_num_rows($cek) == 0) {
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $deleteHistorys = mysqli_query($con, "DELETE FROM history WHERE codigo='$codigo'");
        if ($deleteHistorys) {
                echo '
                <div class="toastHistory" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                    <div class="toast-header ">
                        <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                style=color:green></i> Notificación</strong>
                      
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body alert-danger">
                        <h5> <b>Historia Clínica Eliminada Correctamente</b></h5>
                   
                    </div>
                </div>
           '; } else {
            echo '
            <div class="toastHistory" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                <div class="toast-header  ">
                    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                  
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body alert-danger">
                    <h5> <b>Hubo problemas al eliminar la Historia Clínica</b></h5>
               
                </div>
            </div>
       '; }
    }
}
?>