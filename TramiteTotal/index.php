<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trámites - TrámiteTotal</title>
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
        <h2>Qué trámite necesitas</h2>
            <section id="trámites">
                <div class="row">
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='https://www.chileatiende.gob.cl/fichas/20592-licencias-de-conducir';">
                            <div class="card-body">
                                <h5 class="card-title">Licencia de Conducir</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/licencia_conducir.png" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='https://certificados.mineduc.cl/certificados-web/mvc/home/index';">
                            <div class="card-body">
                                <h5 class="card-title">Certificados de estudios</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/estudios.jpg" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='https://www.junaeb.cl/';">
                            <div class="card-body">
                                <h5 class="card-title">JUNAEB TNE BECAS etc</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/junaeb.png" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='servicios_basicos.php';">
                            <div class="card-body">
                                <h5 class="card-title">pagar servicios básicos</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/servicios_basicos.jpg" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='https://www.registrocivil.cl/principal/servicios-en-linea';">
                            <div class="card-body">
                                <h5 class="card-title">Registro civil</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/resgistro_civil.jpg" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de trámite -->
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location='https://homer.sii.cl/';">
                            <div class="card-body">
                                <h5 class="card-title">servicio de impuestos interno</h5>
                                <p class="card-text"></p>
                                <!-- Icono descriptivo -->
                                <img src="img/sii.jpeg" alt="Icono Licencia" class="card-icon">
                                <!-- Botón para ver más detalles -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Aquí puedes agregar más tarjetas para representar otros trámites -->
                </div>
            </section>
        </div>
    </main>
    <footer class="bg-dark text-light py-3">
        <div class="container">
            <p>&copy; 2024 Aplicación TrámiteTotal</p>
        </div>
    </footer>
    <!-- Bootstrap JS y otros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
