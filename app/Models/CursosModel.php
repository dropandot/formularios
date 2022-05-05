<?php
class CursosModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function obtenerCurso(){
        $query = "select * from cursos";
        return $request  = $this->select_all($query);
    }

    public function InsertarIngresos(int $id_universidad, string $dp_nombre, int $dp_edad, int $dp_whatsApp, string $dp_email, string $dp_facebook, string $dp_domicilio, string $data_carrera,
	string $data_escuela, string $data_horario, string $data_razonIngreso, string $ref_saberNosotros, string $ref_nombreTutor, int $ref_telefonoTutor, int $id_curso)
    {

        $sql = "INSERT INTO ingresos(id_universidad, dp_nombre, dp_edad, dp_whatsApp, dp_email, dp_facebook, dp_domicilio, data_carrera,data_escuela, data_horario, data_razonIngreso, ref_saberNosotros, ref_nombreTutor, ref_telefonoTutor, id_curso) 
         VALUES ('$id_universidad', '$dp_nombre','$dp_edad','$dp_whatsApp','$dp_email','$dp_facebook','$dp_domicilio','$data_carrera','$data_escuela','$data_horario','$data_razonIngreso','$ref_saberNosotros','$ref_nombreTutor','$ref_telefonoTutor', '$id_curso')";
        $arrData = array($id_universidad, $dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
        $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor, $id_curso);
        $request_insert = $this->insert($sql, $arrData);

        

        return $request_insert;
    }
       
    
}