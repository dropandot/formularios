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
                    $curso = 'Curso Semi-Intensivo';
                    break;
                default:
                    $curso = 'ERROR';
                    break;
            }

            $data_clear = [
                'universidad' => $universidad,
                'dp_nombre' => $data_form['dp_nombre'],
                'dp_edad' => strtolower(Utils::strClear($data_form['dp_edad'])),
                'dp_whatsApp' => strtolower(Utils::strClear($data_form['dp_whatsApp'])),
                'dp_email' => strtolower(Utils::strClear($data_form['dp_email'])),
                'dp_facebook' => $data_form['dp_facebook'],
                'dp_domicilio' => $data_form['dp_domicilio'],
                'data_carrera' => $data_form['data_carrera'],
                'data_escuela' => $data_form['data_escuela'],
                'data_horario' => $data_form['data_horario'],
                'data_razonIngreso' => $data_form['data_razonIngreso'],
                'ref_saberNosotros' => $data_form['ref_saberNosotros'], 
                'ref_nombreTutor' => $data_form['ref_nombreTutor'],
                'ref_telefonoTutor' => strtolower(Utils::strClear($data_form['ref_telefonoTutor'])),
                'curso' => $curso
            ];

            // print_r($data_clear);

            $emailEnviado = $this->sendEmail($data_clear);

            if($emailEnviado){
                $arrResponse = ['status' => true, 'msg' => 'ok'];
                Utils::js()."sweet_alert.js";
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error al Enviar Correo', 'serverResponse' => $this->phpmailer->ErrorInfo];
            }
        } else {
            $arrResponse = ['status' => false, 'msg' => 'Error 500', 'serverResponse' => 'acceso denegado'];
        }

        json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    
    private function sendEmail(array $info){
        try {
            // $this->phpmailer->setFrom($info['dp_email'], "Thinkers");
            $this->phpmailer->setFrom(USER_MAIL, "Thinkers");
           
            switch($info['curso']){
                case "Curso Semestral":
                    $this->phpmailer->Subject = 'Inscripción al Curso Semestral';
                    break;
                case "Curso Anual":
                    $this->phpmailer->Subject = 'Inscripción al Curso Anual';
                    break;
                case "Curso Semi-Intensivo":
                    $this->phpmailer->Subject = 'Inscripción al Curso Semi-Intensivo';
                    break;
                default:
                    $this->phpmailer->Subject = 'ERROR';
                    break;
            }

            // $this->phpmailer->addAddress(USER_MAIL);
            $this->phpmailer->addAddress($info['dp_email']);
            $this->phpmailer->addReplyTo(USER_MAIL, 'Más Información');
            $this->phpmailer->Body = "
            <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='font-family:arial, 'helvetica neue', helvetica, sans-serif'>
                <head>
                    <meta charset='UTF-8'>
                    <meta content='width=device-width, initial-scale=1' name='viewport'>
                    <meta name='x-apple-disable-message-reformatting'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta content='telephone=no' name='format-detection'>
                    <style type='text/css'>
                        #outlook a {
                            padding:0;
                        }
                        .es-button {
                            mso-style-priority:100!important;
                            text-decoration:none!important;
                        }
                        a[x-apple-data-detectors] {
                            color:inherit!important;
                            text-decoration:none!important;
                            font-size:inherit!important;
                            font-family:inherit!important;
                            font-weight:inherit!important;
                            line-height:inherit!important;
                        }
                        .es-desk-hidden {
                            display:none;
                            float:left;
                            overflow:hidden;
                            width:0;
                            max-height:0;
                            line-height:0;
                            mso-hide:all;
                        }
                        [data-ogsb] .es-button {
                            border-width:0!important;
                            padding:10px 20px 10px 20px!important;
                        }
                        @media only screen and (max-width:600px) {
                            p, ul li, ol li, a { line-height:150%!important } 
                            h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } 
                            h1 { font-size:30px!important; text-align:left } 
                            h2 { font-size:24px!important; text-align:left } 
                            h3 { font-size:20px!important; text-align:left } 
                            .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important; text-align:left } 
                            .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:24px!important; text-align:left } 
                            .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:left } 
                            .es-menu td a { font-size:14px!important } 
                            .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } 
                            .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } 
                            .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } 
                            .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } 
                            *[class='gmail-fix'] { display:none!important } 
                            .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } 
                            .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } 
                            .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } 
                            .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } 
                            .es-button-border { display:inline-block!important } 
                            a.es-button, button.es-button { font-size:18px!important; display:inline-block!important } 
                            .es-adaptive table, .es-left, .es-right { width:100%!important } 
                            .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } 
                            .es-adapt-td { display:block!important; width:100%!important } 
                            .adapt-img { width:100%!important; height:auto!important } 
                            .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } 
                            .es-m-p0l { padding-left:0px!important } 
                            .es-m-p0t { padding-top:0px!important } 
                            .es-m-p0b { padding-bottom:0!important } 
                            .es-m-p20b { padding-bottom:20px!important } 
                            .es-mobile-hidden, .es-hidden { display:none!important } 
                            tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } 
                            tr.es-desk-hidden { display:table-row!important } 
                            table.es-desk-hidden { display:table!important } 
                            td.es-desk-menu-hidden { display:table-cell!important } 
                            .es-menu td { width:1%!important } table.es-table-not-adapt, 
                            .esd-block-html table { width:auto!important } 
                            table.es-social { display:inline-block!important } 
                            table.es-social td { display:inline-block!important } 
                        }
                    </style>
                </head>
                <body style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'>
                    <div class='es-wrapper-color' style='background-color:#F6F6F6'>
                        <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top'>
                            <tr>
                                <td valign='top' style='padding:0;Margin:0'>
                                    <table class='es-header' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
                                        <tr>
                                            <td align='center' style='padding:0;Margin:0'>
                                                <table class='es-header-body' cellspacing='0' cellpadding='0' bgcolor='#ebebeb' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ebebeb;width:900px'>
                                                    <tr>
                                                        <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'>
                                                            <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                <tr>
                                                                    <td valign='top' align='center' style='padding:0;Margin:0;width:860px'>
                                                                        <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;font-size:0px'><img class='adapt-img' src='https://jfroov.stripocdn.email/content/guids/CABINET_85281a6fbf6c406beb2e3825b152f73e/images/logo_qGv.png' alt='Logo Thinkers' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='525'></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class='es-footer' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
                                        <tr>
                                            <td align='center' style='padding:0;Margin:0'>
                                                <table class='es-footer-body' cellspacing='0' cellpadding='0' bgcolor='#ebebeb' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ebebeb;width:900px'>
                                                    <tr>
                                                        <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'>
                                                            <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                <tr>
                                                                    <td align='center' valign='top' style='padding:0;Margin:0;width:860px'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-top:15px;padding-bottom:35px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:35px;color:#333333;font-size:23px'><strong>Ficha de Inscripción</strong></p></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'>
                                                            <table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'>
                                                                <tr>
                                                                    <td class='es-m-p20b' align='left' style='padding:0;Margin:0;width:420px'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:27px;color:#333333;font-size:18px'><strong>Alumno</strong></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Nombre: {$info['dp_nombre']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>E-mail: {$info['dp_email']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>WhatsApp: {$info['dp_whatsApp']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Facebook: {$info['dp_facebook']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Edad: {$info['dp_edad']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Domicilio: {$info['dp_domicilio']}</p></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table cellpadding='0' cellspacing='0' class='es-right' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'>
                                                                <tr>
                                                                    <td align='left' style='padding:0;Margin:0;width:420px'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:30px;color:#333333;font-size:20px'><strong>Tutor</strong></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Nombre: {$info['ref_nombreTutor']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Celular: {$info['ref_telefonoTutor']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:30px;color:#333333;font-size:20px'><strong>Referencia</strong></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-left:10px;padding-bottom:35px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Me entere de Thinkers por medio de: {$info['ref_saberNosotros']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Prefiero el horario: {$info['data_horario']}</p></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'>
                                                            <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                <tr>
                                                                    <td align='center' valign='top' style='padding:0;Margin:0;width:860px'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:27px;color:#333333;font-size:18px'><strong>Datos Académicos</strong></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Universidad: {$info['universidad']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Carrera: {$info['data_carrera']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Escuela de Procedencia: {$info['data_escuela']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-left:10px;padding-bottom:40px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Quiero ingresar a la universidad porque: {$info['data_razonIngreso']}</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:26px;color:#737373;font-size:17px'>Mensaje generado por el sistema de inscripciones de Thinkers</p></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </body>
                </html>
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

