<?php
include_once "MailController.php";

class cursos extends Controllers
{
    private $enviar_correo;

    public function __construct()
    {
        parent::__construct();
        $this->enviar_correo = new Mail();
    }

    public function semestral()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Semestral',
            'alertas'
        ];

        foreach($_POST as $post){
            echo $post . "<br>";
        }

        if (!empty($_POST)) {
            $id_universidad = $_POST['form_uni'];
            $dp_nombre = $_POST['form_name'];
            $dp_edad = $_POST['form_edad'];
            $dp_whatsApp = $_POST['form_num'];
            $dp_email = $_POST['form_email'];
            $dp_facebook = $_POST['form_face'];
            $dp_domicilio = $_POST['form_dom'];
            $data_carrera = $_POST['form_carrera'];
            $data_escuela = $_POST['form_escuela'];
            $data_horario = $_POST['form_horario'];
            $data_razonIngreso = $_POST['form_cuentanos'];
            $ref_saberNosotros = $_POST['form_csdt'];
            $ref_nombreTutor = $_POST['form_name_padre'];
            $ref_telefonoTutor = $_POST['form_tel_padre'];
            $id_curso = 1;

            $info = [
                'id_universidad' => $id_universidad,
                'dp_nombre' => $dp_nombre,
                'dp_edad' => $dp_edad,
                'dp_whatsApp' => $dp_whatsApp,
                'dp_email' => $dp_email,
                'dp_facebook' => $dp_facebook,
                'dp_domicilio' => $dp_domicilio,
                'data_carrera' => $data_carrera,
                'data_escuela' => $data_escuela,
                'data_horario' => $data_horario,
                'data_razonIngreso' => $data_razonIngreso,
                'ref_saberNosotros' => $ref_saberNosotros,
                'ref_nombreTutor' => $ref_nombreTutor,
                'ref_telefonoTutor' => $ref_telefonoTutor,
                'id_curso' => $id_curso
            ];

            // $ingresar = $this->model->InsertarIngresos($id_universidad, $dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            // $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor, $id_curso);

            // if($ingresar){ 
            //     $this->enviar_correo->information($info);
            //     $data['alertas'] = "alertas.js";
            // }

            $ingresar = $this->model->InsertarIngresos($info);
        }

        $this->views->getView($this, 'semestral', $data);
    }

    public function anual()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Anual'
        ];

        if (!empty($_POST)) {
            $id_universidad = $_POST['form_uni'];
            $dp_nombre = $_POST['form_name'];
            $dp_edad = $_POST['form_edad'];
            $dp_whatsApp = $_POST['form_num'];
            $dp_email = $_POST['form_email'];
            $dp_facebook = $_POST['form_face'];
            $dp_domicilio = $_POST['form_dom'];
            $data_carrera = $_POST['form_carrera'];
            $data_escuela = $_POST['form_escuela'];
            $data_horario = $_POST['form_horario'];
            $data_razonIngreso = $_POST['form_cuentanos'];
            $ref_saberNosotros = $_POST['form_csdt'];
            $ref_nombreTutor = $_POST['form_name_padre'];
            $ref_telefonoTutor = $_POST['form_tel_padre'];
            $id_curso = 2;

            $info = [
                'id_universidad' => $id_universidad,
                'dp_nombre' => $dp_nombre,
                'dp_edad' => $dp_edad,
                'dp_whatsApp' => $dp_whatsApp,
                'dp_email' => $dp_email,
                'dp_facebook' => $dp_facebook,
                'dp_domicilio' => $dp_domicilio,
                'data_carrera' => $data_carrera,
                'data_escuela' => $data_escuela,
                'data_horario' => $data_horario,
                'data_razonIngreso' => $data_razonIngreso,
                'ref_saberNosotros' => $ref_saberNosotros,
                'ref_nombreTutor' => $ref_nombreTutor,
                'ref_telefonoTutor' => $ref_telefonoTutor,
                'id_curso' => $id_curso
            ];

            $ingresar = $this->model->InsertarIngresos(
                $id_universidad,
                $dp_nombre,
                $dp_edad,
                $dp_whatsApp,
                $dp_email,
                $dp_facebook,
                $dp_domicilio,
                $data_carrera,
                $data_escuela,
                $data_horario,
                $data_razonIngreso,
                $ref_saberNosotros,
                $ref_nombreTutor,
                $ref_telefonoTutor,
                $id_curso
            );

            if ($ingresar) {
                $this->enviar_correo->information($info);
                $data['alertas'] = "alertas.js";
            }
        }

        $this->views->getView($this, 'anual', $data);
    }

    public function semiIntensivo()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Semi intensivo'
        ];

        if (!empty($_POST)) {
            $id_universidad = $_POST['form_uni'];
            $dp_nombre = $_POST['form_name'];
            $dp_edad = $_POST['form_edad'];
            $dp_whatsApp = $_POST['form_num'];
            $dp_email = $_POST['form_email'];
            $dp_facebook = $_POST['form_face'];
            $dp_domicilio = $_POST['form_dom'];
            $data_carrera = $_POST['form_carrera'];
            $data_escuela = $_POST['form_escuela'];
            $data_horario = $_POST['form_horario'];
            $data_razonIngreso = $_POST['form_cuentanos'];
            $ref_saberNosotros = $_POST['form_csdt'];
            $ref_nombreTutor = $_POST['form_name_padre'];
            $ref_telefonoTutor = $_POST['form_tel_padre'];
            $id_curso = 3;

            $info = [
                'id_universidad' => $id_universidad,
                'dp_nombre' => $dp_nombre,
                'dp_edad' => $dp_edad,
                'dp_whatsApp' => $dp_whatsApp,
                'dp_email' => $dp_email,
                'dp_facebook' => $dp_facebook,
                'dp_domicilio' => $dp_domicilio,
                'data_carrera' => $data_carrera,
                'data_escuela' => $data_escuela,
                'data_horario' => $data_horario,
                'data_razonIngreso' => $data_razonIngreso,
                'ref_saberNosotros' => $ref_saberNosotros,
                'ref_nombreTutor' => $ref_nombreTutor,
                'ref_telefonoTutor' => $ref_telefonoTutor,
                'id_curso' => $id_curso
            ];

            $ingresar = $this->model->InsertarIngresos(
                $id_universidad,
                $dp_nombre,
                $dp_edad,
                $dp_whatsApp,
                $dp_email,
                $dp_facebook,
                $dp_domicilio,
                $data_carrera,
                $data_escuela,
                $data_horario,
                $data_razonIngreso,
                $ref_saberNosotros,
                $ref_nombreTutor,
                $ref_telefonoTutor,
                $id_curso
            );

            if ($ingresar) {
                $this->enviar_correo->information($info);
                $data['alertas'] = "alertas.js";
            }
        }

        $this->views->getView($this, 'semiIntensivo', $data);
    }

    public function agradecimiento()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Agradecimiento',
            'alertas'
        ];

        $this->views->getView($this, 'agradecimiento', $data);
    }
}
