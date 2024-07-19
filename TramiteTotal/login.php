<?php
session_start();

// Verifica si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost"; // Cambiar si es necesario
    $username = "root"; // Cambiar al nombre de usuario de la base de datos
    $password = ""; // Cambiar a la contraseña de la base de datos
    $dbname = "tramitetotal";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar los datos para la consulta
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT id, nombre FROM usuarios WHERE nombre=? AND contraseña=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username_input, $password_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Obtener el ID y el nombre del usuario
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $full_name = $row['nombre'];

        // Obtener el primer nombre
        $first_name = explode(' ', trim($full_name))[0];

        // Iniciar sesión y redirigir al usuario a la página de trámites
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $first_name; // Almacenar solo el primer nombre
        $_SESSION['user_id'] = $user_id;
        header('Location: index.php');
        exit;
    } else {
        // Si las credenciales son incorrectas, mostrar un mensaje de error y redirigir a iniciar_sesion.php
        $error = "Usuario o contraseña incorrectos.";
        header("Location: iniciar_sesion.php?error=1");
        exit();
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>
