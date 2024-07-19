<?php
session_start();
$_SESSION['en_agregar_tramites'] = true;
require 'conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: iniciar_sesion.php');
    exit();
}

$usuario_id = $_SESSION['user_id'];

// Obtener los trámites favoritos del usuario
$stmt = $conn->prepare("SELECT nombre_tramite FROM tramites_favoritos WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$tramites_favoritos = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$favoritos_nombres = array_column($tramites_favoritos, 'nombre_tramite');

// Lista de trámites disponibles
$tramites_disponibles = [
    ['nombre' => 'Licencia de Conducir', 'url' => 'https://www.chileatiende.gob.cl/fichas/20592-licencias-de-conducir', 'img' => 'img/licencia_conducir.png'],
    ['nombre' => 'Certificados de estudios', 'url' => 'https://certificados.mineduc.cl/certificados-web/mvc/home/index', 'img' => 'img/estudios.jpg'],
    ['nombre' => 'JUNAEB TNE BECAS etc', 'url' => 'https://www.junaeb.cl/', 'img' => 'img/junaeb.png'],
    ['nombre' => 'Pagar servicios básicos', 'url' => 'servicios_basicos.php', 'img' => 'img/servicios_basicos.jpg'],
    ['nombre' => 'Registro civil', 'url' => 'https://www.registrocivil.cl/principal/servicios-en-linea', 'img' => 'img/resgistro_civil.jpg'],
    ['nombre' => 'Servicio de impuestos internos', 'url' => 'https://www.sii.cl/servicios_online/', 'img' => 'img/sii.jpeg']
];

// Filtrar trámites disponibles para que no incluyan los ya seleccionados
$tramites_disponibles = array_filter($tramites_disponibles, function ($tramite) use ($favoritos_nombres) {
    return !in_array($tramite['nombre'], $favoritos_nombres);
});

// Guardar selección de trámites
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $seleccionados = $_POST['tramites'] ?? [];

    // Insertar nuevos trámites seleccionados
    $stmt = $conn->prepare("INSERT INTO tramites_favoritos (usuario_id, nombre_tramite, url_tramite, img_url) VALUES (?, ?, ?, ?)");
    foreach ($seleccionados as $tramite) {
        foreach ($tramites_disponibles as $t) {
            if ($t['nombre'] == $tramite) {
                $stmt->bind_param("isss", $usuario_id, $t['nombre'], $t['url'], $t['img']);
                $stmt->execute();
            }
        }
    }
    $stmt->close();

    header('Location: mis_tramites.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Trámites - TrámiteTotal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="py-5">
        <div class="container">
            <h2>Selecciona tus trámites</h2>
            <form method="POST" action="agregar_tramites.php">
                <button type="submit" class="btn btn-primary mb-3">Confirmar selección</button>
                <div class="row">
                    <?php foreach ($tramites_disponibles as $tramite) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tramites[]" value="<?= $tramite['nombre'] ?>" id="<?= $tramite['nombre'] ?>">
                                        <label class="form-check-label" for="<?= $tramite['nombre'] ?>">
                                            <h5 class="card-title"><?= $tramite['nombre'] ?></h5>
                                        </label>
                                    </div>
                                    <img src="<?= $tramite['img'] ?>" alt="Icono <?= $tramite['nombre'] ?>" class="card-icon">
                                    <p class="card-text">Descripción breve del trámite...</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </main>
    <footer class="bg-dark text-light py-3">
        <div class="container">
            <p>&copy; 2024 Aplicación TrámiteTotal</p>
        </div>
    </footer>
    <!-- Bootstrap JS y otros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https
