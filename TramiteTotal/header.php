<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu página</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" href="master.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container d-flex justify-content-between">
        <div>
            <a class="navbar-brand" href="index.php">TrámiteTotal</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item" style="background-color: rgba(0, 0, 0, 0.1); margin-right: 10px;">
                        <a class="nav-link" href="mis_tramites.php" onclick="toggleOpciones();">Mis trámites</a>
                    </li>
                    <?php if (isset($_SESSION['en_mis_tramites']) && $_SESSION['en_mis_tramites']) { ?>
                        <li class="nav-item agregar-tramites" style="background: rgba(40, 167, 69, 0.2); margin-right: 10px;">
                            <a class="nav-link" href="agregar_tramites.php" style="color: white;">Agregar Trámites</a>
                        </li>
                        <li class="nav-item eliminar-tramites" style="background: rgba(220, 53, 69, 0.2); margin-right: 10px;">
                            <a class="nav-link" href="eliminar_tramites.php" style="color: white;">Eliminar Trámites</a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bienvenido, <?php echo explode(' ', trim($_SESSION['username']))[0]; ?></a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="iniciar_sesion.php">Iniciar sesión</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>

<!-- Bootstrap JS y otros scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Tu script personalizado -->
<script src="scripts.js"></script>

<!-- Estilos CSS adicionales -->
<style>
    .navbar-nav li.nav-item.agregar-tramites:hover a.nav-link {
        color: red !important;
    }
    
    .navbar-nav li.nav-item.eliminar-tramites:hover a.nav-link {
        color: green !important;
    }
</style>

</body>
</html>
