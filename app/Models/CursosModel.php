<?php
class CursosModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function InsertarCursoSemestral($c1, $c2, $c3){
       $sql = "Insert tabla c1, c2, c3into values(?,?,?)";
        $request = $this->insert($sql, [$c1,$c2,$c3]);
    }


    
}