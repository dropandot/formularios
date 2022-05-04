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
                'universidad' => $universidad,
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
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                <meta name='generator' content='PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet'>
                <style type='text/css'>
                    html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color: #ebebeb; }
                    a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
                    a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
                    div.comment { display:none }
                    table { border-collapse:collapse; page-break-after:always }
                    .gridlines td { border:1px dotted black }
                    .gridlines th { border:1px dotted black }
                    .b { text-align:center }
                    .e { text-align:center }
                    .f { text-align:right }
                    .inlineStr { text-align:left }
                    .n { text-align:right }
                    .s { text-align:left }
                    td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style4 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style4 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style5 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style5 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style6 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    th.style6 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ebebeb }
                    td.style7 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    th.style7 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    td.style8 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    th.style8 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    td.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#737373; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    th.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#737373; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    td.style10 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#737373; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    th.style10 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#737373; font-family:'Calibri'; font-size:10pt; background-color:#ebebeb }
                    table.sheet0 col.col0 { width:54.2222216pt }
                    table.sheet0 col.col1 { width:42pt }
                    table.sheet0 col.col2 { width:54.2222216pt }
                    table.sheet0 col.col3 { width:42pt }
                    table.sheet0 col.col4 { width:42pt }
                    table.sheet0 col.col5 { width:42pt }
                    table.sheet0 col.col6 { width:67.09999923pt }
                    table.sheet0 tr { height:15pt }
                    table.sheet0 tr.row1 { height:70.25pt }
                    table.sheet0 tr.row2 { height:23.25pt }
                    table.sheet0 tr.row4 { height:27pt }
                    table.sheet0 tr.row7 { height:21.95pt }
                    table.sheet0 tr.row8 { height:21.95pt }
                    table.sheet0 tr.row9 { height:21.95pt }
                    table.sheet0 tr.row10 { height:21.95pt }
                    table.sheet0 tr.row11 { height:21.95pt }
                    table.sheet0 tr.row12 { height:21.95pt }
                    table.sheet0 tr.row13 { height:21.95pt }
                    table.sheet0 tr.row15 { height:21.95pt }
                    table.sheet0 tr.row16 { height:21.95pt }
                    table.sheet0 tr.row17 { height:21.95pt }
                    table.sheet0 tr.row18 { height:21.95pt }
                    table.sheet0 tr.row19 { height:21.95pt }
                    table.sheet0 tr.row20 { height:21.95pt }
                    table.sheet0 tr.row21 { height:27pt }
                    table.sheet0 tr.row22 { height:15pt }
                </style>
            </head>
            <body>
                <style>
                    @page { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
                    body { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
                </style>
                <table border='0' cellpadding='0' cellspacing='0' id='sheet0' class='sheet0 gridlines'>
                    <col class='col0'>
                    <col class='col1'>
                    <col class='col2'>
                    <col class='col3'>
                    <col class='col4'>
                    <col class='col5'>
                    <col class='col6'>
                    <tbody>
                    <tr class='row1'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style3 s style3' colspan='5'><img src='https://thinkersmx.com/wp-content/uploads/2021/01/logo_thinkers_525x144.png'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row2'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row3'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style4 s style4' colspan='3'>Ficha de Inscripción</td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row4'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row5'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row6'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row7'>
                        <td class='column0 style5 s style5' colspan='3'>Alumno</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style5 s style5' colspan='3'>Tutor</td>
                    </tr>
                    <tr class='row8'>
                        <td class='column0 style7 s style7' colspan='3'>Nombre:{$info['dp_nombre']}</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style7 s style7' colspan='3'>Nombre:</td>
                    </tr>
                    <tr class='row9'>
                        <td class='column0 style7 s style7' colspan='3'>E-mail:</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style7 s style7' colspan='3'>Celular:</td>
                    </tr>
                    <tr class='row10'>
                        <td class='column0 style7 s style7' colspan='3'>WhatsApp</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style5 s style5' colspan='3'>Referencia</td>
                    </tr>
                    <tr class='row11'>
                        <td class='column0 style7 s style7' colspan='3'>Facebook</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style8 s style8' colspan='3' rowspan='2'>Me enteré de Thinkers por medio de: $info</td>
                    </tr>
                    <tr class='row12'>
                        <td class='column0 style7 s style7' colspan='3'>Edad</td>
                        <td class='column3 style6 null'></td>
                    </tr>
                    <tr class='row13'>
                        <td class='column0 style7 s style7' colspan='3'>Domicilio</td>
                        <td class='column3 style6 null'></td>
                        <td class='column4 style7 s style7' colspan='3'>Prefiero el horario:</td>
                    </tr>
                    <tr class='row14'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row15'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style4 s style4' colspan='3'>Datos Académicos</td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row16'>
                        <td class='column0 style7 s style7' colspan='7'>Universidad:</td>
                    </tr>
                    <tr class='row17'>
                        <td class='column0 style7 s style7' colspan='7'>Carrera:</td>
                    </tr>
                    <tr class='row18'>
                        <td class='column0 style7 s style7' colspan='7'>Escuea de Procedencia:</td>
                    </tr>
                    <tr class='row19'>
                        <td class='column0 style8 s style8' colspan='7'>Quiero ingresar a la universidad porque: $info</td>
                    </tr>
                    <tr class='row21'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style2 null'></td>
                        <td class='column2 style2 null'></td>
                        <td class='column3 style2 null'></td>
                        <td class='column4 style2 null'></td>
                        <td class='column5 style2 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row22'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style9 s style9' colspan='5'>Mensaje generado por el sistema de inscipciones de Thinkers</td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    <tr class='row23'>
                        <td class='column0 style2 null'></td>
                        <td class='column1 style10 null'></td>
                        <td class='column2 style10 null'></td>
                        <td class='column3 style10 null'></td>
                        <td class='column4 style10 null'></td>
                        <td class='column5 style10 null'></td>
                        <td class='column6 style2 null'></td>
                    </tr>
                    </tbody>
                </table>
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

