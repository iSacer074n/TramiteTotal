<?php
session_start();
$_SESSION['en_mis_tramites'] = true;
include 'conexion.php';

// Verificar si hay una sesión de usuario activa
if (!isset($_SESSION['user_id'])) {
    header('Location: iniciar_sesion.php');
    exit;
}

// Obtener el ID de usuario de la sesión actual
$user_id = $_SESSION['user_id'];

// Preparar la consulta SQL para obtener los trámites favoritos del usuario actual
$sql = "SELECT id, nombre_tramite, img_url, url_tramite FROM tramites_favoritos WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Trámites - TrámiteTotal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
<?php include 'header.php'; 

?>
<main class="py-5">
    <div class="container">
        <h2>Mis Trámites</h2>
        <!-- Verificar si hay trámites favoritos -->
        <?php if ($result->num_rows > 0) : ?>
            <!-- Abrir el formulario -->
            <form id="formEliminarTramites" method="POST" action="eliminar_tramite.php">
                <div class="row">
                    <!-- Mostrar las tarjetas de los trámites favoritos -->
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nombre_tramite']; ?></h5>
                                    <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="Imagen Trámite">
                                    <!-- Enlace al trámite -->
                                    <a href="<?php echo $row['url_tramite']; ?>" class="btn btn-primary">Ir al trámite</a>
                                    <!-- Checkbox para eliminar -->
                                    <?php if (isset($_POST['eliminar_tramites'])) : ?>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="tramites[]" value="<?php echo $row['id']; ?>" id="tramite-<?php echo $row['id']; ?>">
                                            <label class="form-check-label" for="tramite-<?php echo $row['id']; ?>">Eliminar</label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                
        <?php endif; ?>
    </div>
</main>
<?php include 'footer.php'; ?>
<!-- Bootstrap JS y otros scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts.js"></script>
<?php

unset($_SESSION['en_mis_tramites']);
?>

</body>
</html>
