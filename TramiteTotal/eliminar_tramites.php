<?php
session_start();
include 'conexion.php';

// Verificar si hay una sesión de usuario activa
if (!isset($_SESSION['user_id'])) {
    header('Location: iniciar_sesion.php');
    exit;
}

// Obtener el ID de usuario de la sesión actual
$user_id = $_SESSION['user_id'];

// Obtener los trámites del usuario actual
$sql = "SELECT id, nombre_tramite, url_tramite, img_url FROM tramites_favoritos WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Cerrar la consulta preparada
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Trámites - TrámiteTotal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="py-5">
        <div class="container">
            <h2>Eliminar Trámites</h2>
            <form action="procesar_eliminacion.php" method="POST">
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nombre_tramite']; ?></h5>
                                    <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="Icono Trámite">
                                    <input type="checkbox" name="tramites[]" value="<?php echo $row['id']; ?>">
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <button type="submit" name="eliminar_tramites" class="btn btn-danger">Eliminar Trámites</button>
            </form>
        </div>
    </main>
    <!-- Bootstrap JS y otros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
