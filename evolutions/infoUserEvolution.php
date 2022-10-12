<div class="card-body">
    <h4><b>Información del paciente</b></h4>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
            <form action="" method="post">
            <div class="form-group">
                    <label style="color:#000">Código único e irrepetible *</label>
                    <input type="text" name="codigo" class="form-control"
                        placeholder="Código único e irrepetible " value="<?php echo $row['codigo']; ?>"
                        required="true" id="codigo">
                </div>
                <div class="form-group">
                    <label style="color:#000">Tipo de identificación *</label>
                    <select class="form-control" name="tipoIdentificacion" required="true">
                        <option value="<?php echo $row['tipoIdentificacion']; ?>">
                            <?php echo $row['tipoIdentificacion']; ?></option>
                        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                        <option value="Registro civil">Registro civil</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="color:#000">Número de identificación *</label>
                    <input type="number" name="numeroIdentificacion" class="form-control"
                        placeholder="Numero de identificación" value="<?php echo $row['numeroIdentificacion']; ?>"
                        required="true">
                    <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                </div>

                <div class="form-group">
                    <label style="color:#000">Nombre *</label>
                    <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;"
                        placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required="true">
                </div>
                <div class="form-group ">
                    <label style="color:#000">Apellidos *</label>
                    <input type="text" name="apellidos" style="text-transform: capitalize;" placeholder="Apellidos"
                        class="form-control" value="<?php echo $row['apellidos']; ?>" required="true">
                </div>
                <div class="form-group ">
                    <label style="color:#000">Fecha de nacimiento *</label>
                    <input type="date" name="fechaNacimiento" placeholder="Apellidos" class="form-control"
                        value="<?php echo $row['fechaNacimiento']; ?>" required="true">
                </div>
                <div class="form-group ">
                    <label style="color:#000">Edad *</label>
                    <input type="number" name="edad" placeholder="Edad" class="form-control" min="0" max="100"
                        value="<?php echo $row['edad']; ?>" required="true">
                </div>
                <div class="form-group">
                    <label style="color:#000">Estado civil *</label>
                    <select class="form-control" name="estadoCivil" required="true">
                        <option value="<?php echo $row['estadoCivil']; ?>"><?php echo $row['estadoCivil']; ?></option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Unión libre">Unión libre</option>
                        <option value="Viudo">Viudo</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="color:#000">Género *</label>
                    <select class="form-control" name="genero" required="true">
                        <option value="<?php echo $row['genero']; ?>"><?php echo $row['genero']; ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="color:#000">RH *</label>
                    <select class="form-control" name="rh" required="true">
                        <option value="<?php echo $row['rh']; ?>"><?php echo $row['rh']; ?></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">

            <div class="form-group ">
                <label style="color:#000">Departamento *</label>
                <input type="text" name="departamento" placeholder="Departamento" style="text-transform: capitalize;"
                    class="form-control" min="0" max="100" value="<?php echo $row['departamento']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Ciudad *</label>
                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control"
                    style="text-transform: capitalize;" min="0" max="100" value="<?php echo $row['ciudad']; ?>"
                    required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Dirección *</label>
                <input type="text" name="direccion" placeholder="Dirección" class="form-control"
                    style="text-transform: capitalize;" min="0" max="100" value="<?php echo $row['direccion']; ?>"
                    required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Teléfono fijo *</label>
                <input type="text" name="telefonoFijo" placeholder="Teléfono fijo" class="form-control" min="0"
                    max="100" value="<?php echo $row['telefonoFijo']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Teléfono celular *</label>
                <input type="text" name="telefonoCelular" placeholder="Teléfono celular" class="form-control" min="0"
                    max="100" value="<?php echo $row['telefonoCelular']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Correo electrónico *</label>
                <input type="email" name="email" placeholder="Correo electrónico" class="form-control" min="0" max="100"
                    value="<?php echo $row['email']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">EPS *</label>
                <input type="text" name="eps" placeholder="EPS" class="form-control" min="0"
                    style="text-transform: capitalize;" max="100" value="<?php echo $row['eps']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">IPS *</label>
                <input type="text" name="ips" placeholder="IPS" class="form-control" min="0"
                    style="text-transform: capitalize;" max="100" value="<?php echo $row['ips']; ?>" required="true">
            </div>
            <div class="form-group ">
                <label style="color:#000">Ocupación *</label>
                <input type="text" name="ocupacion" placeholder="Ocupación" class="form-control" min="0" max="100"
                    value="<?php echo $row['ocupacion']; ?>" required="true">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
            <h4><b>Datos acudiente o acompañante</b></h4>
            <div class="form-group ">
                <label style="color:#000">Nombre acudiente</label>
                <input type="text" name="nombreAcudiente" placeholder="Nombre acudiente"
                    style="text-transform: capitalize;" class="form-control" min="0" max="100"
                    value="<?php echo $row['nombreAcudiente']; ?>">
            </div>
            <div class="form-group ">
                <label style="color:#000">Apellidos acudiente</label>
                <input type="text" name="apellidoAcudiente" placeholder="Apellidos acudiente"
                    style="text-transform: capitalize;" class="form-control" min="0" max="100"
                    value="<?php echo $row['apellidoAcudiente']; ?>">
            </div>
            <div class="form-group ">
                <label style="color:#000">Número identificacion acudiente</label>
                <input type="number" name="numeroIdentificacionAcudiente" placeholder="Número identificacion acudiente"
                    class="form-control" min="0" max="100" value="<?php echo $row['numeroIdentificacionAcudiente']; ?>">
            </div>
            <div class="form-group ">
                <label style="color:#000">Teléfono acudiente</label>
                <input type="text" name="telefonoAcudiente" placeholder="Teléfono acudiente" class="form-control"
                    min="0" max="100" value="<?php echo $row['telefonoAcudiente']; ?>">
            </div>
            <div class="form-group ">
                <label style="color:#000">Doctor asignado</label>
                <select class="form-control" name="doctorAsignado" required="true">
                    <?php
                               $usaurio= htmlspecialchars($_SESSION["username"]);
                               $query = mysqli_query($con,"SELECT nombre FROM users WHERE username like '%$usaurio%' AND dependencia='Especialista'");
                               while ($userLog = mysqli_fetch_array($query)) {
                                echo ' <option value="'.$userLog[nombre].'">'.$userLog[nombre].'</option>';
                                }
                                ?>

                </select>
            </div>
            <div class="form-group">
                <label style="color:#000">Identificación doctor</label>
                <?php
                               $usaurioDoc= htmlspecialchars($_SESSION["username"]);
                               $queryId = mysqli_query($con,"SELECT username FROM users WHERE username like '%$usaurioDoc%' AND dependencia='Especialista'");
                               while ($docLog = mysqli_fetch_array($queryId)) {
                                echo '   <input type="text" name="identificacionDoctor" placeholder="Identifación del doctor" class="form-control"
                                min="0" max="100" value="'.$docLog['username'].'">';
                                }
                                ?>
            </div>

        </div>
    </div>
</div>
<script>   
function rand_code(chars, lon) {
                            code = "";
                            for (x = 0; x < lon; x++) {
                                rand = Math.floor(Math.random() * chars.length);
                                code += chars.substr(rand, 1);
                            }
                            return code;
                        }
                        caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.";
                        longitud = 8;
document.getElementById('codigo').value = rand_code(caracteres, longitud);
                       
</script>