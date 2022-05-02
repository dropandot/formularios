<?php
class CursosModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function InsertarCursoSemestral($c1, $c2, $c3){
       $sql = "Insert tabla c1, c2, c3into values(?,?,?)";
        //$request = $this->insert($sql, [$c1,$c2,$c3]);
        //return $request;
    }

    public function obtenerCurso(){
        $query = "select * from cursos";
        return $request  = $this->select_all($query);
    }
<<<<<<< HEAD

    public function InsertarIngresos(int $id_universidad, string $dp_nombre, int $dp_edad, int $dp_whatsApp, string $dp_email, string $dp_facebook, string $dp_domicilio, string $data_carrera,
	string $data_escuela, string $data_horario, string $data_razonIngreso, string $ref_saberNosotros, string $ref_nombreTutor, int $ref_telefonoTutor, int $id_curso)
=======
    
    // public function InsertarIngresos(int $id_universidad, string $dp_nombre, int $dp_edad, int $dp_whatsApp, string $dp_email, string $dp_facebook, string $dp_domicilio, string $data_carrera,
	// string $data_escuela, string $data_horario, string $data_razonIngreso, string $ref_saberNosotros, string $ref_nombreTutor, int $ref_telefonoTutor, int $id_curso)
    public function InsertarIngresos( string $dp_nombre, int $dp_edad, int $dp_whatsApp, string $dp_email, string $dp_facebook, string $dp_domicilio, string $data_carrera,
	string $data_escuela, string $data_horario, string $data_razonIngreso, string $ref_saberNosotros, string $ref_nombreTutor, int $ref_telefonoTutor)
>>>>>>> cd1bc8925b445c953a531ac728fe3c62ab9cf277
    {
        $sql = "INSERT INTO ingresos( dp_nombre, dp_edad, dp_whatsApp, dp_email, dp_facebook, dp_domicilio, data_carrera,data_escuela, data_horario, data_razonIngreso, ref_saberNosotros, ref_nombreTutor, ref_telefonoTutor) 
         VALUES ('[$dp_nombre]','[$dp_edad]','[$dp_whatsApp]','[$dp_email]','[$dp_facebook]','[$dp_domicilio]','[$data_carrera]','[$data_escuela]','[$data_horario]','[$data_razonIngreso]','[$ref_saberNosotros]','[$ref_nombreTutor]','[$ref_telefonoTutor]')";
        $arrData = array($dp_nombre, $dp_edad, $dp_whatsApp, $dp_email, $dp_facebook, $dp_domicilio, $data_carrera,
        $data_escuela, $data_horario, $data_razonIngreso, $ref_saberNosotros, $ref_nombreTutor, $ref_telefonoTutor);
        $request_insert = $this->insert($sql, $arrData);
        return $request_insert;
    }
       
    
}