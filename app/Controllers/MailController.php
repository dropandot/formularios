<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail extends Controllers{
    private $phpmailer = null;
    
    public function __construct() {
        $this->phpmailer = new PHPMailer();
        $this->phpmailer->isSMTP();
        $this->phpmailer->SMTPAuth = true;
        $this->phpmailer->Host = HOST_MAIL;
        $this->phpmailer->Port = PORT_MAIL;
        $this->phpmailer->Username = USER_MAIL;
        $this->phpmailer->Password = PASSWORD_MAIL;
    }

    public function mail(){
        $data = [

        ];

        $this->view->getView($this, '', $data);
    }

    public function information(array $data_form){
        if(!empty($data_form)){    
            switch($data_form['id_universidad']){
                case 1:
                    $universidad = 'UNAM';
                    break;
                case 2:
                    $universidad = 'IPN';
                    break;
                case 3:
                    $universidad = 'UANL';
                    break;
                case 4:
                    $universidad = 'UDEG';
                    break;
                case 5:
                    $universidad = 'UASLP';
                    break;
                default:
                    $universidad = 'ERROR';
                    break;
            }

            switch($data_form['id_curso']){
                case 1:
                    $curso = 'Curso Semestral';
                    break;
                case 2:
                    $curso = 'Curso Anual';
                    break;
                case 3:
                    $curso = 'Curso semi-Intensivo';
                    break;
                default:
                    $curso = 'ERROR';
                    break;
            }

            $data_clear = [
                'universidad' => strtolower(Utils::strClear($universidad)),
                'dp_nombre' => strtolower(Utils::strClear($data_form['dp_nombre'])),
                'dp_edad' => strtolower(Utils::strClear($data_form['dp_edad'])),
                'dp_whatsApp' => strtolower(Utils::strClear($data_form['dp_whatsApp'])),
                'dp_email' => strtolower(Utils::strClear($data_form['dp_email'])),
                'dp_facebook' => strtolower(Utils::strClear($data_form['dp_facebook'])),
                'dp_domicilio' => strtolower(Utils::strClear($data_form['dp_domicilio'])),
                'data_carrera' => strtolower(Utils::strClear($data_form['data_carrera'])),
                'data_escuela' => strtolower(Utils::strClear($data_form['data_escuela'])),
                'data_horario' => strtolower(Utils::strClear($data_form['data_horario'])),
                'data_razonIngreso' => strtolower(Utils::strClear($data_form['data_razonIngreso'])),
                'ref_saberNosotros' => strtolower(Utils::strClear($data_form['ref_saberNosotros'])), 
                'ref_nombreTutor' => strtolower(Utils::strClear($data_form['ref_nombreTutor'])),
                'ref_telefonoTutor' => strtolower(Utils::strClear($data_form['ref_telefonoTutor'])),
                'curso' => strtolower(Utils::strClear($curso))
            ];

            // print_r($data_clear);

            $emailEnviado = $this->sendEmail($data_clear);

            if($emailEnviado){
                $arrResponse = ['status' => true, 'msg' => 'ok'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error al Enviar Correo', 'serverResponse' => $this->phpmailer->ErrorInfo];
            }
        } else {
            $arrResponse = ['status' => false, 'msg' => 'Error 500', 'serverResponse' => 'acceso denegado'];
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    
    private function sendEmail(array $info){
        try {
            // $this->phpmailer->setFrom($info['dp_email'], "Thinkers");
            $this->phpmailer->setFrom(USER_MAIL, "Thinkers");
           
            switch($info['curso']){
                case "curso semestral":
                    $this->phpmailer->Subject = 'Inscripción al Curso Semestral';
                    break;
                case "curso anual":
                    $this->phpmailer->Subject = 'Inscripción al Curso Anual';
                    break;
                case "curso semi-intensivo":
                    $this->phpmailer->Subject = 'Inscripción al Curso Semi-Intensivo';
                    break;
                default:
                    $this->phpmailer->Subject = 'ERROR';
                    break;
            }    

            $this->phpmailer->addAddress($info['dp_email']);
            $this->phpmailer->addReplyTo(USER_MAIL, 'Más Información');
            $this->phpmailer->Body = "
            <head>
                <meta http-equiv='Content-type' content='text/html; charset=utf-8'/>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,600;0,700;1,100;1,600;1,700&family=Merriweather:ital,wght@0,300;1,300&display=swap'); 

                    :root {
                        --titulo: 'Barlow', sans-serif;
                    }
                
                    *{
                        background:red;
                        margin: 0;
                        padding: 5px;
                        box-sizing: border-box;
                        background-color: #ebebeb;
                        /*font-family: Arial, Helvetica, sans-serif;*/
                        font-family: var(--titulo);
                    }

                    .cabecera{
                        display: flex;
                        height: 80px;
                        width: 100%;
                        justify-content: center;
                        justify-items: center;
                        margin: 20px 0px 50px;
                    }

                    .info{
                        height: 500px;
                        width: 100%;
                    }

                    .info__automatico{
                        width: 100%;
                        display: flex;
                        justify-content: space-around;
                        justify-items: center;
                    }

                    .info__automatico-titulo{
                        margin-bottom: 60px;
                        tex-align: center;
                        color:blue;
                    }

                    .info__automatico-text{
                        color: #626466;
                        font-size: 2em;
                    }
                </style>
            </head>
            <body>
                <header class='cabecera'>
                    <!-- <img src='https://thinkersmx.com/wp-content/uploads/2021/01/logo_thinkers_525x144.png' alt='Logo Thinkers'> -->
                    <img src='../public/img/logo.webp' alt='Logo Thinkers'> 
                </header>
                <section class='info'>
                    <div class='info__automatico'>
                        <h1 class='info__automatico-titulo'>Ficha de Inscripción</h1>
                    </div>
                    <div class='info__grid'>
                        <div class='info__alumno'>
                            <h2 class='info__titulo'>Alumno</h2>
                            <p>Nombre: {$info['dp_nombre']}</p>  <!-- Aquí van las variables respectivas -->
                            <p>E-mail: </p>
                            <p>WhatsApp:</p>
                            <p>Facebook:</p>
                            <p>Edad:</p>
                            <p>Domicilio:</p>
                        </div>
                        <div class='info__tutor'>
                            <h2 class='info__titulo'>Tutor</h2>
                            <p>Nombre:</p>
                            <p>Celular:</p>
                        </div>
                        <div class='info__referencia'>
                            <h2 class='info__titulo'>Referencia</h2>
                            <p>Me enteré de Thinkers por medio de:</p>
                            <p>Prefiero el horario:</p>
                        </div>
                        <div class='info__academicos'>
                            <h2 class='info__titulo'>Datos Académicos</h2>
                            <p>Universiidad:</p>
                            <p>Carrera:</p>
                            <p>Escuela de Procedencia</p>
                            <p>Quiero ingresar a la universidad porque:</p>
                        </div>
                    </div>
                    <div class='info__automatico'>
                        <p class='info__automatico-text'>Mensaje generado por el sistema de inscripciones de Thinkers</p>
                    </div>
                </section>
            </body>
            ";

            $this->phpmailer->isHTML(true);
            $this->phpmailer->CharSet = 'UTF-8';
            return $this->phpmailer->send();
        } catch(Exception $e) {
           echo "Message could not be sent. Mailer Error: {$this->phpmailer->ErrorInfo}";
           return false;
        }
    }
}

