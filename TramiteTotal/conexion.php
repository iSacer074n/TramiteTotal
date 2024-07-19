<?php     $servername = "localhost"; // Cambiar si es necesario
    $username = "root"; // Cambiar al nombre de usuario de la base de datos
    $password = ""; // Cambiar a la contraseña de la base de datos
    $dbname = "tramitetotal";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }