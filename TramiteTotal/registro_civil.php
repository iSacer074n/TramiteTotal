<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Servicio Básico - TrámiteTotal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="css/master.css">
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body style="background-color: #f0f0f0;">

<?php
session_start();
include 'header.php'; ?>

<main class="py-5">
    <div class="container">
        <h2>Seleccionar Servicio Básico</h2>
        <div class="row">
            <!-- Tarjeta de servicio básico - Luz -->
            <div class="col-md-4 mb-4">
                <div class="card" id="card-luz">
                    <div class="card-body">
                        <h5 class="card-title">Luz</h5>
                        <p class="card-text">Selecciona la empresa para pagar tu servicio de luz.</p>
                        <!-- Menú desplegable para seleccionar empresa -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button">
                                Seleccionar Empresa
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-link="https://www.enel.cl/es/clientes/servicios-en-linea/pago-de-cuenta.html">Certificado Nacimiento Para Asignación Familiar</a>
                                <a class="dropdown-item" href="#" data-link="chagual_energia_link">Certificado Antecedentes Fines Particulares</a>
                                <a class="dropdown-item" href="#" data-link="eolica_monte_redondo_link">Certificado de Matrimonio Para Asignación Familiar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
</main>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS y otros scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts.js"></script>

<script>
    // JavaScript para actualizar el enlace de la tarjeta
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const link = this.getAttribute('data-link');
            const card = this.closest('.card');
            card.querySelector('.btn-primary').textContent = this.textContent;
            card.dataset.link = link;
        });
    });

    // JavaScript para manejar el clic en la tarjeta
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function() {
            const link = this.dataset.link;
            if (link) {
                window.location.href = link + '.php';
            }
        });
    });
</script>
</body>
</html>
