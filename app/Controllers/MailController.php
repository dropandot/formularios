<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    private $phpmailer = null;
    public function __construct()
    {
        $this->phpmailer = new PHPMailer();
        $this->phpmailer->isSMTP();
        $this->phpmailer->SMTPAuth   = true;
        //$this->phpmailer->SMTPSecure = 'tls';
        $this->phpmailer->Host       = HOST_MAIL;
        $this->phpmailer->Port       = PORT_MAIL;
        $this->phpmailer->Username   = USER_MAIL;
        $this->phpmailer->Password   = PASSWORD_MAIL;

        //parent::__construct();
    }

    public function mail()
    {
        $data = [
            "pages_id" => 3,
            "tag_tag" => 'Roles Usuario',
            "tag_pages" => 'rol usuario',
            "pages_title" => 'Roles Usuario',
            "panel_option" => '',
            'pages_function_js' => 'roles_functions.js'
        ];
        $this->views->getView($this, 'mail_vuelo_redondo', $data);
    }
    public function vuelo_redondo()
    {
        //Utils::dd($_POST);
        if (!isset($_POST) || !empty($_POST)) {
            $salida = $_POST['salida'];
            $destino = $_POST['destino'];
            $fecha_salida = $_POST['fecha_salida'];
            $fecha__llegada = $_POST['fecha_llegada'];
            $pasajeros = $_POST['pasajeros'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $mail = $_POST['email'];
            $adicionales =  $_POST['adicionales'];

            switch ($destino) {
                case 0:
                    $d = 'otros';
                    break;
                case 1:
                    $d = 'Las Bahamas';
                    break;
                case 2:
                    $d = 'Mérida';
                    break;
                case 3:
                    $d = 'La Habana';
                    break;
                case 4:
                    $d = 'República Dominicana';
                    break;
                case 5:
                    $d = 'Costa Rica';
                    break;

                default:
                    $d = 'desconocido';
                    break;
            }

            $s = strtolower(Utils::strClear($salida));
            $fs = strtolower(Utils::strClear($fecha_salida));
            $fl = strtolower(Utils::strClear($fecha__llegada));
            $p = strtolower(Utils::strClear($pasajeros));
            $n = strtolower(Utils::strClear($nombre));
            $t = strtolower(Utils::strClear($telefono));
            $e = strtolower(Utils::strClear($mail));
            $ad = strtolower(Utils::strClear($adicionales));

            $datos__form = [
                'salida' =>  $s,
                'destino' =>  $d,
                'fecha_salida' => $fs,
                'fecha_llegada' => $fl,
                'pasajeros' =>  $p,
                'nombre' =>  $n,
                'telefono'  =>  $t,
                'email' =>  $e,
                'adicionales' => $ad
            ];

            $emailEnviado = $this->sendEmail($datos__form, 'faotqm@hotmail.com');
            if ($emailEnviado) {
                $arrResponse = ['status' => true, 'msg' => 'ok'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error al Enviar Correo', 'serverResponse' => $this->phpmailer->ErrorInfo];
            }
        } else {
            $arrResponse = ['status' => false, 'msg' => 'Error 500', 'serverResponse' => 'acceso denegado'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function vuelo_sencillo()
    {
        if (!isset($_POST) || !empty($_POST)) {
            $salida = $_POST['salida_sencillo'];
            $destino = $_POST['destino__sencillo'];
            $fecha_salida = $_POST['fecha_salida_sencillo'];
            $pasajeros = $_POST['pasajeros_sencillo'];
            $nombre = $_POST['nombre_sencillo'];
            $telefono = $_POST['telefono_sencillo'];
            $mail = $_POST['email_sencillo'];
            $adicionales =  $_POST['adicionales_sencillo'];

            switch ($destino) {
                case 0:
                    $d = 'otros';
                    break;
                case 1:
                    $d = 'Las Bahamas';
                    break;
                case 2:
                    $d = 'Mérida';
                    break;
                case 3:
                    $d = 'La Habana';
                    break;
                case 4:
                    $d = 'República Dominicana';
                    break;
                case 5:
                    $d = 'Costa Rica';
                    break;

                default:
                    $d = 'desconocido';
                    break;
            }
            $s = strtolower(Utils::strClear($salida));
            $fs = strtolower(Utils::strClear($fecha_salida));
            $p = strtolower(Utils::strClear($pasajeros));
            $n = strtolower(Utils::strClear($nombre));
            $t = strtolower(Utils::strClear($telefono));
            $e = strtolower(Utils::strClear($mail));
            $ad = strtolower(Utils::strClear($adicionales));

            $datos__form = [

                'salida' =>  $s,
                'destino' =>  $d,
                'fecha_salida' => $fs,
                'pasajeros' =>  $p,
                'nombre' =>  $n,
                'telefono'  =>  $t,
                'email' =>  $e,
                'adicionales' => $ad
            ];

            $emailEnviado = $this->sendEmail($datos__form, false);
            if ($emailEnviado) {
                $arrResponse = ['status' => true, 'msg' => 'ok'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error al Enviar Correo', 'serverResponse' => $this->phpmailer->ErrorInfo];
            }
        } else {
            $arrResponse = ['status' => false, 'msg' => 'Error 500', 'serverResponse' => 'acceso denegado'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    private function sendEmail(array $data, bool $redondo = true)
    {
        try {
            if ($redondo) {
                $this->phpmailer->setFrom(USER_MAIL, "Solicitud De vuelo Redondo (VUELOS AL CARIBE)");
                $this->phpmailer->Subject = 'Solicitud De Vuelo Redondo';
            } else {
                $this->phpmailer->setFrom(USER_MAIL, "Solicitud De vuelo Sencillo (VUELOS AL CARIBE)");
                $this->phpmailer->Subject = 'Solicitud De Vuelo Sencillo';
            }
            $this->phpmailer->addAddress(USER_MAIL);


            $this->phpmailer->addReplyTo(USER_MAIL, 'Solicitudo de Más Información');
            // $this->phpmailer->addCC('sales@fly-select.com');
            // $this->phpmailer->addCC('gerencia@fly-select.com');
            // $this->phpmailer->addCC('marketing@fly-select.com');

            $this->phpmailer->Body = "
            <h1>Solicitud De Vuelo Enviado desde Landing (VUELOS AL CARIBE)</h1>
            <table cellspacing='0' style='border-collapse:collapse; width:1356px'>
	<tbody>
		<tr>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; height:24px; vertical-align:bottom; white-space:nowrap; width:80px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Salida</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:80px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Destino</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:80px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Fecha de salida</span></strong></span></span></td>
        ";
            if ($redondo) {
                $this->phpmailer->Body .= "
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:126px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Fecha de Llegada</span></strong></span></span></td>
        ";
            }
            $this->phpmailer->Body .= "
        <td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; text-align:left; vertical-align:middle; white-space:nowrap; width:166px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Numero de pasajeros</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:194px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Nombre del Pasajero</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:202px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Telefono del Pasajero</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:228px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Correo Electronico</span></strong></span></span></td>
			<td style='border-bottom:2px solid #acccea; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:197px'><span style='font-size:17px'><span style='color:#44546a'><strong><span style='font-family:Calibri,sans-serif'>Adicionales</span></strong></span></span></td>
		</tr>
		<tr>
        <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['salida']}</span></span></span></td>
        <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['destino']}</span></span></span></td>
        <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['fecha_salida']}</span></span></span></td>
        
        ";
            if ($redondo) {
                $this->phpmailer->Body .= "
			<td style='border-bottom:none; border-left:none; border-right:none; border-top:none; height:21px; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['fecha_llegada']};</span></span></span></td>
        ";
            }
            $this->phpmailer->Body .= "
                            <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['pasajeros']}</span></span></span></td>
                            <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['nombre']}</span></span></span></td>
                            <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['telefono']}</span></span></span></td>
                            <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['email']}</span></span></span></td>
                            <td style='border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:middle; white-space:nowrap'><span style='font-size:15px'><span style='color:#ce9178'><span style='font-family:Consolas,monospace'>{$data['adicionales']}</span></span></span></td>
                        </tr>
                    </tbody>
                </table>       
            ";
            $this->phpmailer->isHTML(true);
            $this->phpmailer->CharSet = 'UTF-8';
            return $this->phpmailer->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->phpmailer->ErrorInfo}";
            return false;
        }
    }
}