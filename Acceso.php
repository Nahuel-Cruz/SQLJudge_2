<?php
session_start();
// Se comprueba si ya se habia iniciado la sesion y en ese caso le redirigimos a la pagina de inicio
if (isset($_SESSION['id'])) {
    header("Location: php/listaProblemas.php");
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLJudge - Login</title>
    <link rel="shortcut icon" href="img/favicon2.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../SQLJudge/css/style-main.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" id="logo">
                    <i class="fas fa-terminal" style="color: #0247fe;"></i> SQL Code Judge</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!--  <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Ayuda</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container d-flex flex-row justify-content-center">

        <div class="dark-container-login">
            <form action="data/login.php" class="py-4 px-4 d-flex align-items-center needs-validation" method="POST" novalidate>
                <div class="row g-3 px-1">
                    <div class="col-12">
                        <h5 class="text-center text-white">??Ya tienes una cuenta?</h5>
                        <h1 class="text-center text-white">
                            <i class="fas fa-sign-in-alt" style="color: #3366FF;"></i>
                            <strong> Inicia sesi??n aqu??</strong>
                        </h1>
                    </div>

                    <?php
                    if (!empty($_GET['error'])) {
                    ?>
                        <strong style="color: #dc3545;">Usuario o contrase??a no v??lidos, por favor intenta de nuevo.</strong>
                    <?php } ?>
                    <div class="col-12">
                        <input type="email" class="form-control" id="txtUsuario" name="correo" placeholder="Correo" maxlength="80" required>
                        <div class="valid-feedback">
                            Luce bien!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingresa un correo v??lido.
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control" id="txtContrasenia" name="contrasenia" placeholder="Contrase??a" maxlength="20" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa tu contrase??a.
                        </div>
                    </div>
                    <div class="col-12">
                        <select id="selectUser" name="tipoUser" class="form-select" required>
                            <option selected disabled value="">??Tipo de usuario?...</option>
                            <option value="alumno">Alumno</option>
                            <option value="docente">Docente</option>
                        </select>
                        <div class="valid-feedback">
                            Luce bien!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, elige un tipo de usuario.
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <a href="Recuperar.html" id="olvidasteContrase??a">??Olvidaste tu contrase??a?</a>
                    </div>
                    <div class="col-12 pb-3">
                        <button class="button-access" type="submit" id="btnIniciarSesion">Iniciar Sesi??n</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="dark-container-sign">
            <form action="php/RegistroUsuario.php" class="py-4 px-4" method="POST">
                <div class="row g-3 px-1">
                    <div class="col-12">
                        <h5 class="text-center text-white">??A??n no tienes cuenta?</h5>
                        <h1 class="text-center text-white">
                            <i class="fas fa-user-plus" style="color: #3366FF;"></i>
                            <strong> Registrate ahora</strong>
                        </h1>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="txtNombreR" name="nombreR" placeholder="Nombre" required>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="txtApellidoR" name="ApellidoR" placeholder="Apellido" required>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="txtUsuarioR" name="UsuarioR" placeholder="Usuario" required>
                    </div>
                    <div class="col-12">
                        <input type="email" class="form-control" id="txtCorreoR" name="correoR" placeholder="Correo" required>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control" id="txtContraseniaR" name="contraseniaR" placeholder="Contrase??a" minlength="8" maxlength="20" required>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control" id="txtConfirmarContraseniaR" name="confcontraseniaR" placeholder="Confirmar Contrase??a" required>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="txtCodigoR" name="codigoR" placeholder="Codigo Del Grupo" required>
                    </div>
                    <?php
                    if (!empty($_SESSION['errorCodigo'])) {
                        echo $_SESSION['errorCodigo'];
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['errorContra'])) {
                        echo $_SESSION['errorContra'];
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['errorUsuario'])) {
                        echo $_SESSION['errorUsuario'];
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['errorRegistroErroneo'])) {
                        echo $_SESSION['errorRegistroErroneo'];
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['errorRegistroCorrecto'])) {
                        echo $_SESSION['errorRegistroCorrecto'];
                    }
                    ?>
                    <div class="col-12 pb-3">
                        <button class="button-access" id="btnRegistrar">Registrate</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
<footer class="footer-color d-flex flex-wrap justify-content-between align-items-center py-3 mt-5">
        <p class="col-md-4 mb-0 text-light">&copy; 2021 M??quina del Mal, Inc</p>

        <a href="../index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <h4><i class="fas fa-terminal" style="color: #0247fe;"></i></h4>
        </a>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="../index.php" class="nav-link px-2 text-muted">Inicio</a></li>
            <li class="nav-item"><a href="http://www.itsur.edu.mx/ing_sistemas.php" class="nav-link px-2 text-muted">Acerca de</a></li>
            <li class="nav-item">
                <a href="https://www.facebook.com/ITSURGTO" class="nav-link px-2 text-muted">
                    <i class="h4 fab fa-facebook-square" style="color: rgb(255, 255, 255);"></i></a>
            </li>
        </ul>
</footer>
<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script defer src="js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>