<?php
date_default_timezone_set('America/Mexico_City');
const PRODUCCION = false;
const LIBS = "src/Libreries/Core/";
const VIEWS = "Views";

if (PRODUCCION) {
    define('BASE_URL', "hhttps://formularios.test/");
    define('DB_HOST', "localhost");
    define('DB_NAME', "u749649490_proyect_mvc");
    define('DB_USER', "u749649490_hotaruv");
    define('DB_PASSWORD', "LCzY60+]vsb6");
    define('DB_CHARSET', "utf8");

    define('HOST_MAIL', 'smtp.hostinger.com');
    define('PORT_MAIL', 587);
    define('USER_MAIL', 'ventas@fly-select.com');
    define('PASSWORD_MAIL', 'FfpQ4t;/7.2(a3TM');
}else{
    define('BASE_URL', "https://formularios.test/");
    define('DB_HOST', "localhost");
    define('DB_NAME', "formularioIngresoThinkersDB");
    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_CHARSET', "utf8");

    define('HOST_MAIL', 'smtp.gmail.com');
    define('PORT_MAIL', 587);
    define('USER_MAIL', 'vuelos.flyselect@gmail.com');
    define('PASSWORD_MAIL', 'sxjwmexvwvfkgrvr');
    
}
const SPD = "."; //separador de decimales
const SPM = ","; //separador de Millares
const SMONEY = "$"; //Simbolo de moneda
