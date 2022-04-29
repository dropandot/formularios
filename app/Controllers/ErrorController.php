<?php

class ErrorsController extends Controllers{
    public function __construct(){
        parent::__construct();
     }
     public function notFound(){
         $this->views->getView($this, 'error404');
     }
}

$notfound = new ErrorsController();
$notfound->notFound();