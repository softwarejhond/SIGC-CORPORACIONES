<!-- Footer -->
<footer class="text-center text-lg-start text-light" style="color: #ffffff; background: #009BFF;">
    <!-- Copyright -->
    <div class="text-center p-3" >
        SISTEMA INTEGRAL DE GESTIÓN COMUNAL <br>
        Todos los derechos reservados para:<br> 
        <?php
        $queryCompany = isset($con) ? mysqli_query($con, "SELECT nombre, nit FROM company LIMIT 1") : false;
        if ($queryCompany && ($empresaLog = mysqli_fetch_assoc($queryCompany))) {
            echo '<label class="card-text">' . htmlspecialchars($empresaLog['nombre']) . '</label>';
            echo '<br>';
            echo '<label class="card-text">NIT: ' . htmlspecialchars($empresaLog['nit']) . '</label>';
        }
        ?>
        <br>
        SIGC &copy; Copyright <?php echo date("Y");?>
        <a class="text-light" href="https://agenciaeaglesoftware.com/" style="font-family: 'Sparose', sans-serif;">Eagle Software</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
