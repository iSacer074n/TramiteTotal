<?php
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

    // Preparar los datos para la inserción en la base de datos
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $email = $_POST['correo'];
    $password = $_POST['password'];

    // Insertar los datos en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre, rut, correo, contraseña) VALUES ('$nombre', '$rut', '$email', '$password')";


    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. ¡Bienvenido!";
        // Redirigir a la página de inicio de sesión después de 3 segundos
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>";
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }
    

    // Cerrar conexión
    $conn->close();
}
?>
