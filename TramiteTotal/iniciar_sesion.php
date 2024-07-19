<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - TrámiteTotal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <?php 
    session_start();
    include 'header.php'; ?>
    <main class="py-5">
        <div class="container">
            <section id="login" class="mb-5">
                <h2 class="text-center">Iniciar sesión</h2>
                <?php
                    // Aquí puedes agregar la lógica para mostrar mensajes de error y éxito
                ?>
                <form id="login-form" action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
                <p class="text-center">¿No tienes una cuenta? <a href="registrarse.php">Regístrate aquí</a></p>
            </section>
        </div>
    </main>
   
    <!-- Bootstrap JS y otros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
