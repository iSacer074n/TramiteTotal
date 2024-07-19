<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Asegurarse de que la sesión esté completamente cerrada
session_unset();
session_destroy();

// Redirigir al usuario a la página de inicio
header("Location: index.php");
exit;
?>
