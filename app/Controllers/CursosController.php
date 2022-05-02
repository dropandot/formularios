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
        
        if(!empty($_POST)){
            $dp_nombre= trim($_POST['form_name']);
            $dp_edad=trim($_POST['form_edad']);
            $dp_whatsApp= trim($_POST['form_num']);
            $dp_email=trim($_POST['form_email']);
            $dp_facebook= trim($_POST['form_face']);
            $dp_domicilio=trim($_POST['form_dom']);
            $data_carrera= trim($_POST['form_carrera']);
            $data_escuela= trim($_POST['form_escuela']);
            $data_horario= trim($_POST['form_horaio']);
            $data_razonIngreso= trim($_POST['form_cuentanos']);
            $ref_saberNosotros= trim($_POST['form_csdt']); 
            $ref_nombreTutor= trim($_POST['form_name_padre']);
            $ref_telefonoTutor= trim($_POST['form_tel_padre']);
            $ingresar = $this->model->InsertarIngresos($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
            // $ingresar = new CursosModel();
            // $ingresar = $this->model->InsertarIngresos($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            // $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
            // InsertarCursoSemestral($prueba, $prueba1, $prueba2);
        }
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
            'cabecera' => 'Curso Semi intensivo',
            'tag_pages' => 'Curso Thinkers Semi intensivo'
        ];
        $this->views->getView($this, 'semi_intensivo', $data);
    }
    //probando agregar datos
    public function agragarDatos(){
        if (isset($_POST['register'])) {
            $dp_nombre= trim($_POST['form_name']);
            $dp_edad=trim($_POST['form_edad']);
            $dp_whatsApp= trim($_POST['form_num']);
            $dp_email=trim($_POST['form_email']);
            $dp_facebook= trim($_POST['form_face']);
            $dp_domicilio=trim($_POST['form_dom']);
            $data_carrera= trim($_POST['form_carrera']);
            $data_escuela= trim($_POST['form_escuela']);
            $data_horario= trim($_POST['form_horaio']);
            $data_razonIngreso= trim($_POST['form_cuentanos']);
            $ref_saberNosotros= trim($_POST['form_csdt']); 
            $ref_nombreTutor= trim($_POST['form_name_padre']);
            $ref_telefonoTutor= trim($_POST['form_tel_padre']);
            InsertarIngresos($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
        }
   }

    public function insertar(){
        if(!empty($_POST)){
            $dp_nombre= trim($_POST['form_name']);
            $dp_edad=trim($_POST['form_edad']);
            $dp_whatsApp= trim($_POST['form_num']);
            $dp_email=trim($_POST['form_email']);
            $dp_facebook= trim($_POST['form_face']);
            $dp_domicilio=trim($_POST['form_dom']);
            $data_carrera= trim($_POST['form_carrera']);
            $data_escuela= trim($_POST['form_escuela']);
            $data_horario= trim($_POST['form_horaio']);
            $data_razonIngreso= trim($_POST['form_cuentanos']);
            $ref_saberNosotros= trim($_POST['form_csdt']); 
            $ref_nombreTutor= trim($_POST['form_name_padre']);
            $ref_telefonoTutor= trim($_POST['form_tel_padre']);
            $ingresar = new CursosModel();
            $ingresar = $this->model->InsertarIngresos($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
            // InsertarCursoSemestral($prueba, $prueba1, $prueba2);
        }
    }
    
}
