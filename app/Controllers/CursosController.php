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
            'cabecera' => 'Curso Semestral',
            'tag_pages' => 'Curso Thinkers Semestral'
        ];
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
}
