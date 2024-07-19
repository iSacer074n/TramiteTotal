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

// Verificar si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_tramites'])) {
    // Verificar si se seleccionaron tramites para eliminar
    if (isset($_POST['tramites']) && is_array($_POST['tramites']) && count($_POST['tramites']) > 0) {
        // Convertir los IDs de tramites seleccionados a una cadena para usar en la consulta SQL
        $tramites_ids = implode(",", $_POST['tramites']);
        
        // Consulta SQL para eliminar los tramites seleccionados del usuario actual
        $sql = "DELETE FROM tramites_favoritos WHERE id IN ($tramites_ids) AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        
        // Redirigir a mis_tramites.php
        header('Location: mis_tramites.php');
        exit;
    }
}

// Si no se seleccionaron tramites para eliminar o hubo algún otro error, redirigir a mis_tramites.php
header('Location: mis_tramites.php');
exit;
?>
