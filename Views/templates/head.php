<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/f3cd46a135.js" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Inscripciones Thinkers</title>
    <link rel="icon" href="./public/img/favicon-min.png">
    <?php require_once('Views/estilos.php'); ?>
</head>

<body>
    <?php include_once 'Views/templates/header.php' ?>
    <section class="barra"> 
        <div class="barra__img">
            <a href="https://thinkersmx.com/" class="barra__img"><img src="./public/img/logo.webp" alt="Logo Thinkers"></a>
        </div>
        <div class="barra__derecha">
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
                <li><a class="barra__a barra__a_orilla" href="https://thinkersmx.com/">Inicio</a></li>
                    <li><a class="barra__a barra__a_menu" >Cursos <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="barra__baja">
                            <li><a class="barra__a" href="https://thinkersmx.com/curso-unam/">Curso UNAM</a></li>
                            <li><a class="barra__a" href="https://thinkersmx.com/curso-ipn/">Curso IPN</a></li>
                            <li><a class="barra__a" href="https://thinkersmx.com/curso-uanl/">Curso UANL</a></li>
                            <li><a class="barra__a" href="https://thinkersmx.com/curso_udeg/">Curso UDEG</a></li>
                            <li><a class="barra__a" href="https://thinkersmx.com/curso-uaslp/">Curso UASLP</a></li>
                        </ul>
                    </li>
                <li><a class="barra__a barra__a_centro" href="https://thinkersmx.com/ingles/">Inglés</a></li>
                <li><a class="barra__a barra__a_orilla" href="https://thinkersmx.com/blog/">Blog</a></li>
            </ul>
            <div class="pie__logos pie__logos_head">
                <div class="pie__redes">
                    <a class="logos" target="blank" href="https://www.facebook.com/thinkersmx/"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <div class="pie__redes">
                    <a class="logos" target="blank" href="https://www.instagram.com/thinkers_mx/?hl=es-la"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="pie__redes">
                    <a class="logos" target="blank" href="https://www.tiktok.com/@thinkersmx"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </section>

    <header class="inscripciones">
        <div class="inscripciones__color1">
            <div class="inscripciones__color2">
                <div class="inscripciones__color3">
                   <h1 class="inscripciones__titulo">INSCRIPCIONES</h1>
                </div>
            </div>
        </div>
    </header>
    
    <section class="ficha">
        <h2 class="ficha__titulo">Ficha de Inscripción</h2>
        <div class="ficha__textos">
            <p class="ficha__texto">Hola Pensador, estás a un paso de pertenecer a la comunidad de pensadores número 1; en el siguiente formulario debes ingresar datos personales, académicos y de referencia, todos ellos nos ayudan a darte un servicio mucho más personalizado, a conocerte un poco mejor, así como llevar un mejor control de tus avances y de nuestra comunidad de pensadores.</p>
            <p class="ficha__texto negritas">Si tienes una extensión que bloquea anuncios o tu navegador bloquea publicidad, por favor desactiva esta función o extensión temporalmente para enviar tu ficha sin problemas.</p>
        </div>
        <p class="ficha__bienvenida negritas">Bienvenido al inicio de tu éxito profesional, bienvenido a Thinkers!!</p>
    </section>
