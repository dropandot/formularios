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
            if($ingresar){
                ?>
                    echo'<script type="text/javascript">
                    alert("registro completo");
                    </script>';
                <?php
            }else{
                ?>
                    echo'<script type="text/javascript">
                    alert("registro incompleto");
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
        $this->views->getView($this, 'anual', $data);
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
            $id_curso = 2;
            $ingresar = $this->model->InsertarIngresos($id_universidad, $dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor, $id_curso);
            if($ingresar){
                ?>
                    echo'<script type="text/javascript">
                    alert("registro completo");
                    </script>';
                <?php
            }else{
                ?>
                    echo'<script type="text/javascript">
                    alert("registro incompleto");
                    </script>';
                <?php
            }
        }
    }

    public function semiIntensivo()
    {
        $data = [
            'cabecera' => '',
            'tag_pages' => 'Curso Thinkers Semi intensivo'
        ];
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
            $id_curso = 3;
            $ingresar = $this->model->InsertarIngresos($id_universidad, $dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
            $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor, $id_curso);
            if($ingresar){
                ?>
                    echo'<script type="text/javascript">
                    alert("registro completo");
                    </script>';
                <?php
            }else{
                ?>
                    echo'<script type="text/javascript">
                    alert("registro incompleto");
                    </script>';
                <?php
            }
        }
    }
    
}
