<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/f3cd46a135.js" crossorigin="anonymous"></script> <!-- Script para las imagenes de redes sociales -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/ap.css">      <!-- Link a la hoja de estilos en cascada -->
    <title>Gracias por inscribirte</title>
    <link rel="icon" href="./public/img/favicon-min.png">   <!-- Imagen que se muestra en la pestaña del navegador -->
</head>
<body>

    <section class="barra">     <!-- Sección que contiene el logo, la barra de busqueda y los logos a redes sociales -->
        <div class="barra__img"> <!-- Contenedor que contiene la imagen del logo  -->
            <a href="https://thinkersmx.com/" class="barra__img barra__img-img"><img src="./public/img/logo.webp" alt="Logo Thinkers"></a>
        </div>
        <div class="barra__derecha"> <!-- Contenedor donde se encuentran la barra de busqueda y los logos de las redes -->
        <input id="menu-toggle" type="checkbox" />    <!-- Checkbox que hace posible la animación de hamburguesa del menú responsive -->  
        <label class='menu-button-container' for="menu-toggle">     
            <div class='menu-button'></div>
        </label>
        <ul class="menu">   <!-- Información y puntos de la barra de búsqueda -->  
                <li><a class="barra__a barra__a_orilla" href="https://thinkersmx.com/">Inicio</a></li>
                    <li><a class="barra__a barra__a_menu" >Cursos <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="barra__baja">    <!-- Menú dentro de otro menú, con este formato y eqtiquetas se agregan -->  
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
            <div class="pie__logos pie__logos_head">    <!-- Uso la misma etiqueta de imagenes aquí y en el pie de pagina -->  
                <div class="pie__redes">    <!-- Contenedor de la imagen con link -->
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

    <header class="inscripciones">  <!-- Barra de colores "degradados" donde está el titulo -->
        <div class="inscripciones__color1 inscripciones__color1-v"> <!-- Cada etiqueta tiene un color para hacer el efecto -->
            <div class="inscripciones__color2 inscripciones__color2-v">
                <div class="inscripciones__color3 inscripciones__color3-v">
                   <h1 class="inscripciones__titulo">¡GRACIAS POR INSCRIBIRTE!</h1> <!-- Titulo de la página -->
                </div>
            </div>
        </div>
    </header>

    <div class="precios">
        <div class="precios__titulo">
            <p>Ya estás a un paso más en tu camino al éxito profesional, te presentamos las distintas modalidades de pago del curso universitario Thinkers, eligé el plan y selecciona la forma de pago que más te convenga.</p>
        </div>
        <div class="precios__tipos">
            <div class="precios__card">
                <h1 class="precios__titulos">SEMESTRAL</h1>
                <div class="precios__inscripcion">
                    <p><b>Inscripción</b></p>
                    <p><b>$1 500</b></p>
                </div>
                <div class="precios__tipo">
                    <div class="precios__pago">
                        <b><p>Entre Semana</p></b>
                        <b><p>$2 400</p></b>
                    </div>
                    <div class="precios__pago">
                        <b><p>Sabatino</p></b>
                        <b><p>$2 100</p></b>
                    </div>
                </div>
                <div class="precios__boton">
                    <button class="precios__but" onclick="window.open('img_pago.html','PAGOS','width =580,height=450','chrome=yes','centerscreen');">Depósito/Transferencia</button>
                </div>
            </div>
            <div class="precios__card">
                <h1 class="precios__titulos">ANUAL</h1>
                <div class="precios__inscripcion">
                    <p><b>Inscripción</b></p>
                    <p><b>$1 500</b></p>
                </div>
                <div class="precios__tipo">
                    <div class="precios__pago">
                        <b><p>Entre Semana</p></b>
                        <b><p>$2 400</p></b>
                    </div>
                    <div class="precios__pago">
                        <b><p>Sabatino</p></b>
                        <b><p>$2 100</p></b>
                    </div>
                </div>
                <div class="precios__boton">
                    <button class="precios__but" >Depósito/Transferencia</button>
                </div>
            </div>
        </div>
        <div class="precios__tipos">
            <div class="precios__card">
                <h1 class="precios__titulos">SEMI-INTENSIVO</h1>
                <div class="precios__inscripcion">
                    <p><b>Costo Total</b></p>
                    <p><b>$6 500</b></p>
                </div>
                <div class="precios__boton">
                    <button class="precios__but">Depósito/Transferencia</button>
                </div>
            </div>
        </div>
    </div>

    <section class="informacion">   <!-- Sección que muestra la información extra y links de conveniencia -->
        <div class="informacion__descubrir">
            <ul class="informacion__ul">Descubrir:</ul> <!-- Lista con los links principales -->
                <li><a href="https://thinkersmx.com/" class="blanco">Inicio</a></li>
                <li><a href="https://thinkersmx.com/ingles/" class="blanco">Inglés</a></li>
                <li><a href="https://thinkersmx.com/blog/" class="blanco">Blog</a></li>
            
        </div>
        <div class="informacion__cursos">
            <ul class="informacion__ul">Cursos de admisión:</ul>    <!-- Lista hacía los otros cursos -->
                <li><a href="https://thinkersmx.com/curso-unam/" class="blanco">Curso UNAM</a></li>
                <li><a href="https://thinkersmx.com/curso-ipn/" class="blanco">Curso IPN</a></li>
                <li><a href="https://thinkersmx.com/curso-uanl/" class="blanco">Curso UANL</a></li>
                <li><a href="https://thinkersmx.com/curso_udeg/" class="blanco">Curso UDEG</a></li>
                <li><a href="https://thinkersmx.com/curso-uaslp/" class="blanco">Curso UASLP</a></li>         
        </div>
        <div class="informacion__contacto"> <!-- Menú con los datos de contacto -->
            <ul class="informacion__ul">Contacto:</ul>  <!-- Lista de metodos -->
                <li><div class="informacion__segmento"> <!-- Contenedor para el texto con link y la imagen -->
                    <i class="fa-brands fa-whatsapp"></i>
                    <a href="" class="blanco">444 577 5419</a>
                </div></li>
                <li><li><div class="informacion__segmento"> <!-- Contenedor para el texto con link y la imagen -->
                    <i class="fa-solid fa-envelope"></i>
                    <a href="" class="blanco">contacto@thinkersmx.com</a>
                </div></li>
                <li><li><div class="informacion__segmento"> <!-- Contenedor para el texto con link y la imagen -->
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="segmento">
                        <p>Valentin Gama #515</p>
                        <p>78220 San Luis Potosí</p>
                    </div>
                </div></li>
            
        </div>
    </section>

    <footer class="pie">    <!-- Pie de pagina con los terminos y condiciones y redes sociales -->
        <div class="pie__textos">   <!-- Contenedor para los links de terminos y condiciones  -->
            <a href="https://thinkersmx.com/terminos-y-condiciones/" target="blank"><p class="pie_sep">TÉRMINOS Y CONDICIONES</p></a>
        </div>
        <div class="pie__textos">
            <a href="https://thinkersmx.com/politica-privacidad" target="blank"><p class="pie_sep">POLÍTICA DE PRIVACIDAD</p></a>
        </div>
        <div class="pie__logos">    <!-- Contenedor para los logos de las redes sociales con su link -->
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
    </footer>

</body>
</html>
