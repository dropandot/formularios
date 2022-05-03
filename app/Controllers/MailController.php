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
    //    try {
    //        $this->phpmailer->setFrom(USER_MAIL, "Thinkers");
           
    //        switch($info){
    //            case "curso semestral":
    //                 $this->phpmailer->Subject = 'Inscripción al Curso Semestral';
    //                 break;
                        


    //        }

    

    //    }
    }
}

