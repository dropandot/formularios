<?php

class Home extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        //Utils::loginSession();
    }
    public function home(){
        $this->views->getView($this, 'home');
    }
    
}
