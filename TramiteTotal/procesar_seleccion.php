<?php
session_start();
require 'conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: iniciar_sesion.php');
    exit();
}

$usuario_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['tramites'])) {
        // Limpiar los trámites actuales del usuario
        $stmt = $conn->prepare("DELETE FROM tramites_favoritos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $stmt->close();

        // Insertar los nuevos trámites seleccionados
        $stmt = $conn->prepare("INSERT INTO tramites_favoritos (usuario_id, nombre_tramite, url_tramite) VALUES (?, ?, ?)");
        foreach ($_POST['tramites'] as $tramite) {
            list($nombre_tramite, $url_tramite) = explode('|', $tramite);
            $stmt->bind_param("iss", $usuario_id, $nombre_tramite, $url_tramite);
            $stmt->execute();
        }
        $stmt->close();
    }
    // Redirigir a mis_tramites.php
    header('Location: mis_tramites.php');
    exit();
}
?>
