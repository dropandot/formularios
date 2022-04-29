<?php

Class cursos extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    
    
    public function semestral(){
        $data = [
            'cabecera' => 'Curso Semestral',
            'tag_pages' => 'Curso Thinkers Semestral'
        ];
        $this->views->getView($this, 'semestral', $data);

    }

    public function anual(){
        $data = [
            'cabecera' => 'Curso Anual',
            'tag_pages' => 'Curso Thinkers Anual'
        ];
        $this->views->getView($this, 'anual', $data);

    }

    public function semiIntensivo(){
        $data = [
            'cabecera' => 'Curso Semi intensivo',
            'tag_pages' => 'Curso Thinkers Semi intensivo'
        ];
        $this->views->getView($this, 'semiintensivo', $data);
    }
    


}