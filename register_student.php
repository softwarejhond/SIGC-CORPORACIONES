<?php
require_once "conexion.php";

$form = array(
    "tipoIdentificacion" => "",
    "numeroIdentificacion" => "",
    "lugarExpedicionDoc" => "",
    "nombre" => "",
    "apellidos" => "",
    "fechaNacimiento" => "1994-01-01",
    "edad" => "",
    "genero" => "",
    "direccion" => "",
    "telefono" => "",
    "email" => "",
    "actividades" => ""
);

$errors = array();
$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addEstudiante"])) {
    foreach ($form as $key => $defaultValue) {
        $form[$key] = trim($_POST[$key] ?? "");
    }

    $requiredFields = array(
        "tipoIdentificacion", "numeroIdentificacion", "lugarExpedicionDoc", "nombre", "apellidos",
        "fechaNacimiento", "edad", "genero", "direccion", "telefono", "email", "actividades"
    );

    foreach ($requiredFields as $field) {
        if ($form[$field] === "") {
            $errors[] = "Todos los campos obligatorios deben completarse.";
            break;
        }
    }

    if (!filter_var($form["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electronico no es valido.";
    }

    if (!ctype_digit($form["numeroIdentificacion"])) {
        $errors[] = "El numero de identificacion debe contener solo numeros.";
    }

    if (!ctype_digit($form["edad"])) {
        $errors[] = "La edad debe contener solo numeros.";
    }

    if (empty($errors)) {
        $stmtCheck = mysqli_prepare($con, "SELECT id FROM estudents WHERE numeroIdentificacion = ? LIMIT 1");
        if ($stmtCheck) {
            mysqli_stmt_bind_param($stmtCheck, "s", $form["numeroIdentificacion"]);
            mysqli_stmt_execute($stmtCheck);
            mysqli_stmt_store_result($stmtCheck);
            if (mysqli_stmt_num_rows($stmtCheck) > 0) {
                $errors[] = "Error. El estudiante ya existe.";
            }
            mysqli_stmt_close($stmtCheck);
        } else {
            $errors[] = "No fue posible validar el estudiante.";
        }
    }

    if (empty($errors)) {
        $dataTime = date("Y-m-d H:i:s");
        $sqlInsert = "INSERT INTO estudents (tipoIdentificacion, numeroIdentificacion, lugarExpedicionDoc, nombre, apellidos, fechaNacimiento, edad, genero, direccion, telefono, email, actividades, fechaCreacionEst) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = mysqli_prepare($con, $sqlInsert);

        if ($stmtInsert) {
            mysqli_stmt_bind_param(
                $stmtInsert,
                "sssssssssssss",
                $form["tipoIdentificacion"],
                $form["numeroIdentificacion"],
                $form["lugarExpedicionDoc"],
                $form["nombre"],
                $form["apellidos"],
                $form["fechaNacimiento"],
                $form["edad"],
                $form["genero"],
                $form["direccion"],
                $form["telefono"],
                $form["email"],
                $form["actividades"],
                $dataTime
            );

            if (mysqli_stmt_execute($stmtInsert)) {
                $success_msg = "Estudiante registrado correctamente.";
                foreach ($form as $key => $defaultValue) {
                    $form[$key] = $key === "fechaNacimiento" ? "1994-01-01" : "";
                }
            } else {
                $errors[] = "Hubo problemas en el registro del estudiante. Intenta nuevamente.";
            }

            mysqli_stmt_close($stmtInsert);
        } else {
            $errors[] = "No fue posible registrar el estudiante.";
        }
    }
}

$activities = array();
$queryActivities = mysqli_query($con, "SELECT actividad FROM activities ORDER BY actividad ASC");
if ($queryActivities) {
    while ($row = mysqli_fetch_assoc($queryActivities)) {
        $activities[] = $row["actividad"];
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <div class="login-container container">
        <div class="form-login">
      

<<<<<<< HEAD
            <form method="post" class="was-validated" id="form">
                <h2 style="color:#fff">REGISTRO DE INFORMACIÓN PARA EL SERVICIO SOCIAL</h2>
                <b style="color:yellow">Tenga en cuenta que todos los campos son obligatorios y serán utilizados
                    exclusivamente para agilizar el proceso de tu servicio social dentro de la Junta de Acción Comunal Marco Fidel Suárez</b>
                <br><br>
=======
            <?php if (!empty($success_msg)) { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: '<?php echo htmlspecialchars($success_msg, ENT_QUOTES, "UTF-8"); ?>',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#28a745'
                    });
                });
            </script>
            <?php } ?>

            <?php if (!empty($errors)) { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: '<?php echo htmlspecialchars($errors[0], ENT_QUOTES, "UTF-8"); ?>',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#dc3545'
                    });
                });
            </script>
            <?php } ?>

            <form method="post" id="form">
                <h1 class="title-main text-center">Registro De Informacion Para El Servicio Social</h1>
                   <h1 class="title-main text-center">Junta de Accion Comunal Marco Fidel Suarez</h1>
                <br>
                <p class="subtitle-main">
                    Todos los campos son obligatorios y seran utilizados exclusivamente para agilizar
                    el proceso del servicio social dentro de la Junta de Accion Comunal Marco Fidel Suarez.
                </p>
<br>
>>>>>>> 09c99c9 (public)
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                        <div class="form-group">
                            <label>Tipo de identificacion *</label>
                            <select class="form-control" name="tipoIdentificacion" required>
                                <option value="">Seleccionar</option>
                                <option value="Cedula de ciudadania" <?php echo $form["tipoIdentificacion"] === "Cedula de ciudadania" ? "selected" : ""; ?>>Cedula de ciudadania</option>
                                <option value="Tarjeta de identidad" <?php echo $form["tipoIdentificacion"] === "Tarjeta de identidad" ? "selected" : ""; ?>>Tarjeta de identidad</option>
                                <option value="Registro civil" <?php echo $form["tipoIdentificacion"] === "Registro civil" ? "selected" : ""; ?>>Registro civil</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Numero de identificacion *</label>
                            <input type="number" name="numeroIdentificacion" class="form-control"
                                placeholder="Numero de identificacion" value="<?php echo htmlspecialchars($form["numeroIdentificacion"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Lugar de expedicion del documento *</label>
                            <input type="hidden" name="lugarExpedicionDoc" id="lugarExpedicionDoc"
                                value="<?php echo htmlspecialchars($form["lugarExpedicionDoc"], ENT_QUOTES, "UTF-8"); ?>" required>

                            <select class="form-control mb-2" id="departamentoSelect" required>
                                <option value="">Seleccionar departamento</option>
                            </select>

                            <select class="form-control" id="municipioSelect" required disabled>
                                <option value="">Seleccionar municipio</option>
                            </select>

                            <small id="divipolaStatus" class="text-muted d-block mt-1">Cargando departamentos y municipios desde DIVIPOLA...</small>

                            <noscript>
                                <input type="text" class="form-control mt-2" style="text-transform: capitalize;"
                                    placeholder="Ejemplo: Medellin - Antioquia" name="lugarExpedicionDoc" required>
                            </noscript>
                        </div>

                        <div class="form-group">
                            <label>Nombre *</label>
                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;"
                                placeholder="Nombre" value="<?php echo htmlspecialchars($form["nombre"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Apellidos *</label>
                            <input type="text" name="apellidos" style="text-transform: capitalize;"
                                placeholder="Apellidos" class="form-control"
                                value="<?php echo htmlspecialchars($form["apellidos"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Fecha de nacimiento *</label>
                            <input type="date" name="fechaNacimiento" class="form-control"
                                value="<?php echo htmlspecialchars($form["fechaNacimiento"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                        <div class="form-group">
                            <label>Edad *</label>
                            <input type="number" name="edad" placeholder="Edad" class="form-control" min="0" max="100"
                                value="<?php echo htmlspecialchars($form["edad"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Sexo *</label>
                            <select class="form-control" name="genero" required>
                                <option value="">Seleccionar</option>
                                <option value="Masculino" <?php echo $form["genero"] === "Masculino" ? "selected" : ""; ?>>Masculino</option>
                                <option value="Femenino" <?php echo $form["genero"] === "Femenino" ? "selected" : ""; ?>>Femenino</option>
                                <option value="Trans" <?php echo $form["genero"] === "Trans" ? "selected" : ""; ?>>Trans</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Direccion *</label>
                            <input type="text" name="direccion" placeholder="Direccion" class="form-control"
                                value="<?php echo htmlspecialchars($form["direccion"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Telefono fijo o celular *</label>
                            <input type="number" name="telefono" placeholder="Telefono fijo o celular"
                                class="form-control" value="<?php echo htmlspecialchars($form["telefono"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Correo electronico *</label>
                            <input type="email" name="email" placeholder="Correo electronico" class="form-control"
                                value="<?php echo htmlspecialchars($form["email"], ENT_QUOTES, "UTF-8"); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Actividad realizada *</label>
                            <select class="form-control" name="actividades" required>
                                <option value="">Seleccionar</option>
                                <?php foreach ($activities as $actividad) { ?>
                                <option value="<?php echo htmlspecialchars($actividad, ENT_QUOTES, "UTF-8"); ?>" <?php echo $form["actividades"] === $actividad ? "selected" : ""; ?>>
                                    <?php echo htmlspecialchars($actividad, ENT_QUOTES, "UTF-8"); ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="myCheck" required>
                            <label class="form-check-label" for="myCheck">Acepto que la informacion enviada es correcta y deseo una copia en mi correo. *</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3 text-center">
                    <input type="submit" name="addEstudiante" class="btn btn-success" value="Registrar estudiante">
                    <input type="reset" class="btn btn-danger" value="Cancelar">
                </div>
            </form>
        </div>

        <div class="legal-box">
            Informacion protegida bajo la
            <a href="https://www.mintic.gov.co/arquitecturati/630/articles-9011_documento.pdf" target="_blank" rel="noopener noreferrer">
                Ley de Habeas Data 1581 de 2012
            </a>
        </div>

        <a href="https://agenciaeaglesoftware.com/" target="_blank" rel="noopener noreferrer" class="login__forgot">
            SIGC - El software para las Juntas de Acción Comunal &copy; Copyright <?php echo date("Y"); ?>
            <br>Made by <span style="font-family: 'Sparose', sans-serif;">Agencia Eagle Software</span>
        </a>
    </div>

<script>
(function () {
    var divipolaUrl = 'https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=departamento,municipio&$where=departamento IS NOT NULL AND municipio IS NOT NULL&$order=departamento,municipio&$limit=1200';
    var apiColombiaDepartmentsUrl = 'https://api-colombia.com/api/v1/Department';
    var deptSelect = document.getElementById('departamentoSelect');
    var muniSelect = document.getElementById('municipioSelect');
    var hiddenLugar = document.getElementById('lugarExpedicionDoc');
    var statusText = document.getElementById('divipolaStatus');

    if (!deptSelect || !muniSelect || !hiddenLugar) {
        return;
    }

    var sourceType = 'none';
    var departmentsMap = {};
    var departmentIdByName = {};

    function resetMunicipios() {
        muniSelect.innerHTML = '<option value="">Seleccionar municipio</option>';
        muniSelect.disabled = true;
    }

    function updateHiddenField() {
        var dept = deptSelect.value;
        var muni = muniSelect.value;
        hiddenLugar.value = (dept && muni) ? (muni + ' ' + dept) : '';
    }

    function enableManualFallback(message) {
        deptSelect.required = false;
        muniSelect.required = false;
        deptSelect.disabled = true;
        muniSelect.disabled = true;

        if (!document.getElementById('manualLugarInput')) {
            var manualInput = document.createElement('input');
            manualInput.id = 'manualLugarInput';
            manualInput.type = 'text';
            manualInput.className = 'form-control mt-2';
            manualInput.placeholder = 'Ejemplo: Medellin - Antioquia';
            manualInput.style.textTransform = 'capitalize';
            manualInput.value = hiddenLugar.value || '';
            manualInput.addEventListener('input', function () {
                hiddenLugar.value = manualInput.value.trim();
            });
            muniSelect.insertAdjacentElement('afterend', manualInput);
        }

        if (statusText) {
            statusText.classList.remove('text-muted');
            statusText.classList.add('text-danger');
            statusText.textContent = message || 'No fue posible cargar departamentos y municipios. Ingresa el lugar manualmente.';
        }
    }

    function fillMunicipiosFromMap(deptName) {
        resetMunicipios();
        if (!deptName || !departmentsMap[deptName]) {
            updateHiddenField();
            return;
        }

        var municipios = Array.from(departmentsMap[deptName]).sort(function (a, b) {
            return a.localeCompare(b, 'es', { sensitivity: 'base' });
        });

        municipios.forEach(function (municipio) {
            var option = document.createElement('option');
            option.value = municipio;
            option.textContent = municipio;
            muniSelect.appendChild(option);
        });

        muniSelect.disabled = false;
        updateHiddenField();
    }

    function fillDepartamentos(names) {
        names.forEach(function (departamento) {
            var option = document.createElement('option');
            option.value = departamento;
            option.textContent = departamento;
            deptSelect.appendChild(option);
        });
    }

    function preloadExistingValue() {
        var current = (hiddenLugar.value || '').trim();
        if (!current) {
            return Promise.resolve();
        }

        var municipio, departamento;
        
        // Intenta formato antiguo "Municipio - Departamento"
        if (current.indexOf(' - ') !== -1) {
            var parts = current.split(' - ');
            municipio = (parts[0] || '').trim();
            departamento = (parts.slice(1).join(' - ') || '').trim();
        } 
        // Intenta formato nuevo "Municipio Departamento"
        else if (current.indexOf(' ') !== -1) {
            var parts = current.split(' ');
            municipio = parts[0];
            departamento = parts.slice(1).join(' ');
        } 
        else {
            return Promise.resolve();
        }

        if (!departamento || !municipio) {
            return Promise.resolve();
        }

        deptSelect.value = departamento;

        if (sourceType === 'divipola') {
            fillMunicipiosFromMap(departamento);
            if (Array.from(muniSelect.options).some(function (opt) { return opt.value === municipio; })) {
                muniSelect.value = municipio;
                updateHiddenField();
            }
            return Promise.resolve();
        }

        if (sourceType === 'api-colombia') {
            return loadMunicipiosApiColombia(departamento).then(function () {
                if (Array.from(muniSelect.options).some(function (opt) { return opt.value === municipio; })) {
                    muniSelect.value = municipio;
                    updateHiddenField();
                }
            });
        }

        return Promise.resolve();
    }

    function loadMunicipiosApiColombia(deptName) {
        resetMunicipios();
        var deptId = departmentIdByName[deptName];
        if (!deptId) {
            updateHiddenField();
            return Promise.resolve();
        }

        if (statusText) {
            statusText.classList.add('text-muted');
            statusText.classList.remove('text-danger');
            statusText.textContent = 'Cargando municipios...';
        }

        return fetch('https://api-colombia.com/api/v1/Department/' + encodeURIComponent(deptId) + '/cities')
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('No se pudieron cargar municipios');
                }
                return response.json();
            })
            .then(function (rows) {
                rows.sort(function (a, b) {
                    return (a.name || '').localeCompare((b.name || ''), 'es', { sensitivity: 'base' });
                }).forEach(function (city) {
                    var municipio = (city.name || '').trim();
                    if (!municipio) {
                        return;
                    }
                    var option = document.createElement('option');
                    option.value = municipio;
                    option.textContent = municipio;
                    muniSelect.appendChild(option);
                });

                muniSelect.disabled = false;
                updateHiddenField();
                if (statusText) {
                    statusText.textContent = 'Selecciona departamento y municipio.';
                }
            })
            .catch(function () {
                enableManualFallback('No fue posible cargar municipios desde la fuente de respaldo. Ingresa el lugar manualmente.');
            });
    }

    deptSelect.addEventListener('change', function () {
        if (sourceType === 'divipola') {
            fillMunicipiosFromMap(deptSelect.value);
        } else if (sourceType === 'api-colombia') {
            loadMunicipiosApiColombia(deptSelect.value);
        }
    });

    muniSelect.addEventListener('change', updateHiddenField);

    fetch(divipolaUrl)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('No se pudo consultar DIVIPOLA');
            }
            return response.json();
        })
        .then(function (rows) {
            rows.forEach(function (row) {
                var departamento = (row.departamento || '').trim();
                var municipio = (row.municipio || '').trim();
                if (!departamento || !municipio) {
                    return;
                }
                if (!departmentsMap[departamento]) {
                    departmentsMap[departamento] = new Set();
                }
                departmentsMap[departamento].add(municipio);
            });

            var departamentos = Object.keys(departmentsMap).sort(function (a, b) {
                return a.localeCompare(b, 'es', { sensitivity: 'base' });
            });

            if (departamentos.length === 0) {
                throw new Error('DIVIPOLA sin resultados');
            }

            sourceType = 'divipola';
            fillDepartamentos(departamentos);
            return preloadExistingValue();
        })
        .then(function () {
            if (statusText) {
                statusText.classList.add('text-muted');
                statusText.classList.remove('text-danger');
                statusText.textContent = 'Fuente: DIVIPOLA.';
            }
        })
        .catch(function () {
            fetch(apiColombiaDepartmentsUrl)
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('No se pudo consultar fuente de respaldo');
                    }
                    return response.json();
                })
                .then(function (rows) {
                    var departamentos = [];
                    rows.forEach(function (row) {
                        var deptName = (row.name || '').trim();
                        var deptId = row.id;
                        if (!deptName || !deptId) {
                            return;
                        }
                        departmentIdByName[deptName] = deptId;
                        departamentos.push(deptName);
                    });

                    departamentos.sort(function (a, b) {
                        return a.localeCompare(b, 'es', { sensitivity: 'base' });
                    });

                    if (departamentos.length === 0) {
                        throw new Error('Sin departamentos en respaldo');
                    }

                    sourceType = 'api-colombia';
                    fillDepartamentos(departamentos);
                    return preloadExistingValue();
                })
                .then(function () {
                    if (statusText) {
                        statusText.classList.add('text-muted');
                        statusText.classList.remove('text-danger');
                        statusText.textContent = 'Fuente de respaldo activa: API Colombia (DIVIPOLA no disponible).';
                    }
                })
                .catch(function () {
                    enableManualFallback('No fue posible cargar DIVIPOLA ni la fuente de respaldo. Ingresa el lugar manualmente.');
                });
        });
})();
</script>
</body>

<style>
body {
    background: radial-gradient(circle at 20% 10%, rgba(15, 142, 207, 0.16), transparent 35%), radial-gradient(circle at 85% 15%, rgba(18, 184, 134, 0.2), transparent 30%), #f2f7fb;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    line-height: 1.4;
    letter-spacing: 1px;
    overflow: hidden;
}

* {
    box-sizing: border-box;
    transition: .25s all ease;
}

.login-container {
    display: block;
    position: relative;
    z-index: 0;
    margin: .45rem auto 0;
    padding: 1.35rem 1.8rem 0.55rem 1.8rem;
    width: 100%;
    max-width: 1200px;
    min-height: 0;
    height: calc(100vh - 0.9rem);
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 20px;
}

.login-container:after {
    content: '';
    display: inline-block;
    position: absolute;
    z-index: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(120deg, rgba(15, 142, 207, 0.06), rgba(18, 184, 134, 0.04));
    border-radius: 20px;
}

.form-login {
    position: relative;
    z-index: 1;
    padding-bottom: 0.95rem;
    border-bottom: 1px solid rgba(15, 93, 135, 0.2);
}

#form .row {
    row-gap: 0.55rem;
}

#form .form-group {
    margin-bottom: 0.55rem;
}

#form label,
#form .form-check-label {
    display: inline-block;
    margin-bottom: 0.4rem;
    line-height: 1.35;
}

#form .form-control,
#form select.form-control {
    min-height: 37px;
    padding: 0.4rem 0.65rem;
    line-height: 1.35;
    background: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    color: #0e5f89;
    transition: all 0.3s ease;
}

#form .form-control:focus,
#form select.form-control:focus {
    background: rgba(255, 255, 255, 0.7);
    border-color: rgba(15, 142, 207, 0.5);
    box-shadow: 0 0 15px rgba(15, 142, 207, 0.2);
    outline: none;
}

#form .form-check {
    padding-top: 0.4rem;
}

#form .btn {
    min-width: 130px;
    margin-right: 0.5rem;
    margin-bottom: 0.2rem;
    padding: 0.35rem 0.65rem;
}

.login-nav {
    position: relative;
    padding: 0;
    margin: 0 0 1rem 0.35rem;
}

.login-nav__item {
    list-style: none;
    display: inline-block;
}

.login-nav__item + .login-nav__item {
    margin-left: 2rem;
}

.login-nav__item a {
    position: relative;
    color: rgba(16, 68, 98, 0.55);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 1rem;
    padding-bottom: .5rem;
}

.login-nav__item.active a,
.login-nav__item a:hover {
    color: #0f6c9e;
}

.login-nav__item a:after {
    content: '';
    display: inline-block;
    height: 2px;
    background-color: rgb(15, 142, 207);
    position: absolute;
    right: 100%;
    bottom: -1px;
    left: 0;
    transition: .2s all ease;
}

.login-nav__item.active a:after,
.login-nav__item a:hover:after {
    right: 0;
}

label,
.form-check-label,
.title-main {
    color: #0e5f89;
}

.title-main {
    font-size: 1.22rem;
    margin-bottom: .35rem;
    font-weight: 700;
}

.subtitle-main {
    color: #39566a;
    margin-bottom: 0.65rem;
    line-height: 1.42;
    font-size: 0.9rem;
}

.legal-box {
    position: relative;
    z-index: 1;
    text-align: center;
    color: #355a73;
    margin-top: 0.4rem;
    line-height: 1.35;
    font-size: 0.8rem;
}

.legal-box a {
    color: #0f6c9e;
    font-weight: 600;
}

.login__forgot {
    display: block;
    margin-top: .35rem;
    text-align: center;
    color: rgba(11, 74, 108, 0.72);
    font-size: .72rem;
    text-decoration: none;
    position: relative;
    z-index: 1;
}

.login__forgot:hover {
    color: rgb(15, 142, 207);
}

@media (max-width: 768px) {
    .login-container {
        padding: 1rem 0.85rem 0 0.85rem;
        height: auto;
        overflow: auto;
    }

    .title-main {
        font-size: 1.05rem;
    }

    #form .btn {
        width: 100%;
        margin-right: 0;
    }
}
</style>

</html>
