<?php

class cursos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }



    public function semestral()
    {
        
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Semestral'
        ];
        $this->views->getView($this, 'semestral', $data);
        
        // echo("1");
        
        if(!empty($_POST)){
            $id_universidad=$_POST['form_uni'];
            $dp_nombre=$_POST['form_name'];
            $dp_edad=$_POST['form_edad'];
            $dp_whatsApp= $_POST['form_num'];
            $dp_email=$_POST['form_email'];
            $dp_facebook= $_POST['form_face'];
            $dp_domicilio=$_POST['form_dom'];
            $data_carrera= $_POST['form_carrera'];
            $data_escuela= $_POST['form_escuela'];
            $data_horario= $_POST['form_horario'];
            $data_razonIngreso= $_POST['form_cuentanos'];
            $ref_saberNosotros= $_POST['form_csdt']; 
            $ref_nombreTutor= $_POST['form_name_padre'];
            $ref_telefonoTutor= $_POST['form_tel_padre'];
            $id_curso = 1;
            $ingresar = $this->model->InsertarIngresos($id_universidad, $dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor, $id_curso);
                // $ingresar = new CursosModel();
                // $ingresar = $this->model->InsertarIngresos($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
                // $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
                // InsertarCursoSemestral($prueba, $prueba1, $prueba2);
            if($ingresar){
                ?>
                    echo'<script type="text/javascript">
                    alert("registro completo");
                    </script>';
                <?php
            }
        }


        $this->views->getView($this, 'semestral', $data);
    }

    public function anual()
    {
        $data = [
            'cabecera' => 'Curso Anual',
            'tag_pages' => 'Curso Thinkers Anual'
        ];
        $seperadores = explode('/', $_GET['url']);
        $anual = 1;
        Utils::dd($seperadores[1]);

        // $seperadores = explode('/', $_GET['url']);
        // $anual = 1;
        // Utils::dd($seperadores[1]);
        echo("2");
        //echo Utils::dd($_GET);
        if(!empty($_POST)){
            $prueba = $_POST['prueba'];
            $prueba1 = $_POST['prueba1'];
            $prueba2 = $_POST['prueba2'];
            $insertar = $this->model->InsertarCursoSemestral($prueba, $prueba1, $prueba2);
        }
        $this->views->getView($this, 'anual', $data);
    }


    public function semiIntensivo()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Semi intensivo'
        ];
        $this->views->getView($this, 'semi_intensivo', $data);
        if(isset($_POST['register'])){
            // if(!empty($_POST)){
                echo "hola si jala esto";
            // }
        }
    }
    
}
