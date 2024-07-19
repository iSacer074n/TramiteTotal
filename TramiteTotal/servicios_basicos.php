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
                        <h5 class="card-title">Energía eléctrica</h5>
                        <p class="card-text">Selecciona la empresa para pagar tu servicio de energía eléctrica.</p>
                        <!-- Menú desplegable para seleccionar empresa -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button">
                                Seleccionar Empresa
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-link="https://www.enel.cl/es/clientes/servicios-en-linea/pago-de-cuenta.html">Enel</a>
                                <a class="dropdown-item" href="#" data-link="chagual_energia_link">Chagual Energía Spa</a>
                                <a class="dropdown-item" href="#" data-link="eolica_monte_redondo_link">Eólica Monte Redondo SpA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tarjeta de servicio básico - Agua -->
            <div class="col-md-4 mb-4">
                <div class="card" id="card-agua">
                    <div class="card-body">
                        <h5 class="card-title">Agua</h5>
                        <p class="card-text">Selecciona la empresa para pagar tu servicio de agua.</p>
                        <!-- Menú desplegable para seleccionar empresa -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button">
                                Seleccionar Empresa
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-link="https://www.aguasandinas.cl/web/aguasandinas/pagar-mi-cuenta">Aguas Andinas S.A.</a>
                                <a class="dropdown-item" href="#" data-link="aguas_cordillera_link">Aguas Cordillera S.A.</a>
                                <a class="dropdown-item" href="#" data-link="esval_link">ESVAL S.A.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tarjeta de servicio básico - Telefonía e Internet -->
            <div class="col-md-4 mb-4">
                <div class="card" id="card-telefonia">
                    <div class="card-body">
                        <h5 class="card-title">Telefonía e Internet</h5>
                        <p class="card-text">Selecciona la empresa para pagar tu servicio de telefonía e Internet.</p>
                        <!-- Menú desplegable para seleccionar empresa -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button">
                                Seleccionar Empresa
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-link="https://sucursalvirtual.clarochile.cl/PagoExpress/index?_gl=1*1p7ughk*_ga*MTA5OTY3MjM5My4xNzE2MTkxNjI2*_ga_1XFCP1SLCM*MTcxNjE5MTYyNS4xLjAuMTcxNjE5MTYyNS42MC4wLjA.*_gcl_au*MTkyMjY4MDIxNy4xNzE2MTkxNjI1">Claro</a>
                                <a class="dropdown-item" href="#" data-link="https://miperfil.entel.cl/CL_Web_Unified_Payment_EU/">Entel</a>
                                <a class="dropdown-item" href="#" data-link="https://pagos.movistar.cl/">Movistar</a>
                                <a class="dropdown-item" href="#" data-link="https://vtr.com/portaldepagos/initial">VTR</a>
                                <a class="dropdown-item" href="#" data-link="https://www.wom.cl/paga-aqui/">WOM</a>
                            </div>
                        </div>
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
