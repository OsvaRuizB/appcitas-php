<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Laer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
<header class="header">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="http://localhost/fisioterapia_laer/">
                    <h1 class="logo__nombre no-margin centrar-texto">LAER</h1>
                </a>
                <nav class="navegacion menu">
                    <a href="http://localhost/fisioterapia_laer/tratamientos.html" class="navegacion__enlace">Tratamientos</a>
                    <a href="http://localhost/fisioterapia_laer/nosotros.html" class="navegacion__enlace">Sobre Mi</a>
                    <a href="http://localhost:3000" class="navegacion__enlace">Agenda Tu Cita</a>
                </nav>     
            </div>
        </div>
    </header>


    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
        <?php echo $contenido; ?>
        </div>
    </div>

    <?php 
        echo $script ?? '';
    ?>

<footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="http://localhost/fisioterapia_laer/">
                    <h1 class="logo__nombre no-margin centrar-texto">LAER</h1>
                </a>

                <nav class="navegacion">
                    <a href="politicas_privacidad.html" class="navegacion__enlace">Politicas De Privacidad</a>
                    <a href="terminos_condiciones.html" class="navegacion__enlace">Terminos Y Condiciones</a>
                    
                    <a href="https://www.facebook.com/FisioterapiaLAER" class="navegacion__enlace">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                          </svg>
                    </a>
                    <a onclick="location.href='https://api.whatsapp.com/send?phone=527291787365&text=Hola.DOC';" class="navegacion__enlace">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                            <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </footer>


 
            
</body>
</html>