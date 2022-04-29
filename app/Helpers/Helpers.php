<?php

class Utils
{
    static function base_url()
    {
        return BASE_URL;
    }

    static function dbard()
    {
        return BASE_URL."/public/";
    }
    static function js()
    {
        return BASE_URL."/public/js/";
    }
    static function css()
    {
        return BASE_URL."/public/css/";
    }
    static function img()
    {
        return BASE_URL."/public/img/";
    }

    static function destinos()
    {
        return BASE_URL."/public/img/destinos/";
    }

    static function header($data = ""){
        $view_header = "Views/Template/header.php";
        require_once $view_header;
    }
    static function navbar($data = ""){
        $view_header = "Views/Template/navbar.php";
        require_once $view_header;
    }
    static function menu($data = ""){
        $view_menu = "Views/Template/menu.php";
        require_once $view_menu;
    }
    static function footer($data = ""){
        $view_menu = "Views/Template/footer.php";
        require_once $view_menu;
    }
    static function scripts($data = ""){
        $view_menu = "Views/Template/scripts.php";
        require_once $view_menu;
    }

    static function scriptPersonales($data = ""){
        $view_menu = "Views/Template/scriptspersonales.php";
        require_once $view_menu;
    }

    

    static function dd($data)
    {
        $format = print_r('<pre>');
        $format = print_r($data);
        $format = print_r('</pre>');
        return $format;
    }
    static function strClear($cadena)
    {
        $string = preg_replace(['/\s+/', '/^\|\s$/'], [' ', ''], $cadena);
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src>", "", $string);
        $string = str_ireplace("<script type=>", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE * FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("DROP TABLE", "", $string);
        $string = str_ireplace("OR '1' = '1", "", $string);
        $string = str_ireplace('OR "1" = "1"', "", $string);
        $string = str_ireplace('OR `1` = `1`', "", $string);
        $string = str_ireplace("IS NULL; --", "", $string);
        $string = str_ireplace("LIKE '", "", $string);
        $string = str_ireplace('LIKE "', "", $string);
        $string = str_ireplace("LIKE `", "", $string);
        $string = str_ireplace("OR 'a'='a'", "", $string);
        $string = str_ireplace('OR "a"="a"', "", $string);
        $string = str_ireplace("OR `a`=a`", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        return $string;
    }
    static function passGenerator($length = 10)
    {
        $pass = "";
        $logintudPass = $length;
        $cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456456789#$&';
        $logitudCadena = strlen($cadena);
        for ($i = 1; $i < $logintudPass; $i++) {
            $pos = rand(0, $logitudCadena - 1);
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;
    }

    static function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1 . "-" . $r2 . "-" . $r3 . "-" . $r4;
        return $token;
    }
    static function formatMoney($cantidad)
    {
        $cantidad = number_format($cantidad, 2, SPD, SPM);
        return $cantidad;
    }

    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function redirect($url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            echo '</noscript>';
            exit;
        }
    }

    public static function loginSession(){
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: '.Utils::base_url().'/login');
        }
    }
    public static  function CalcularTiempo($fechaInicio)
    {
        $hoy = date('Y-m-d');
        $dateTime1 = date_create($fechaInicio);
        $dateTime2 = date_create($hoy);
        $interval = date_diff($dateTime1, $dateTime2);
        $tiempo = array();

        foreach ($interval as $valor) {
            $tiempo[] = $valor;
        }
        return $tiempo;
    }

    public static function getHoraActual()
    {
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        return $hora = strftime("%H:%M");
    }

    public static function FechaActual()
    {
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        return strftime("%Y-%m-%d");
    }

    public static function delfromPaFile($directorio){
        foreach(glob($directorio . "/*") as $elemento){      
            if(is_dir($elemento)){
                Utils::delfromPaFile($elemento);
            }else{
                unlink($elemento);
            }
      }
      rmdir($directorio);
     }

     public static function guardarLogoUsuario($foto)
    {
        $nombreDelArchivo = "logo.png";
        $tipo = $foto['type'];
        $datos = $foto['tmp_name'];
        
        $size = getimagesize($datos);
        $ancho = $size[0];
        $alto = $size[1];

        $u_nom = $_SESSION['usuario']->id;
        $Nusuario  = $u_nom;
        $nuevo_ancho = 1683;
        $nuevo_alto = 642;

        if ($tipo == "image/jpg" || $tipo == "image/jpeg") {
            $origen = imagecreatefromjpeg($datos);
        } else if ($tipo == "image/png") {
            $origen = imagecreatefrompng($datos);
        }
         $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
         $nuevoSize = imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
         if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
            $directorio = strtolower("assets/sistema/medico/{$Nusuario}/logo");
            if (!is_dir($directorio)) {
                mkdir($directorio, 0755, true);
            }
            imagedestroy($origen);
            if ($nuevoSize) {
                imagejpeg($destino, $directorio . "/" . $nombreDelArchivo);
                return $nombreDelArchivo;
            }
        }
    }


    public static function limparCadena(String $nombre, String $ruta = BASE_URL)
    {
        if ($_FILES['archivo']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            $achivo = str_replace('.', '', $nombre);
            $archivoN = str_replace('xlsx', '', $achivo);
            $nombre = $archivoN . '.' . 'xlsx';
            return $nombre;
        } else if ($_FILES['archivo']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            $achivo = str_replace('.', '', $nombre);
            $archivoN = str_replace('docx', '', $achivo);
            $nombre = $archivoN . '.' . 'docx';
            return $nombre;
        } else if ($_FILES['archivo']['type'] == 'application/pdf') {
            $achivo = str_replace('.', '', $nombre);
            $archivoN = str_replace('pdf', '', $achivo);
            $nombre = $archivoN . '.' . 'pdf';
            return $nombre;
        } else if ($_FILES['archivo']['type'] == 'video/mp4') {
            $achivo = str_replace('.', '', $nombre);
            $archivoN = str_replace('mp4', '', $achivo);
            $nombre = $archivoN . '.' . 'mp4';
            return $nombre;
        } else {
            Utils::redirect($ruta);
        }
    }

    
}
