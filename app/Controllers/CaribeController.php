<?php

class Caribe extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        //Utils::loginSession();
    }
    public function vuelos_al_caribe()
    {

        $paises = $this->model->getPaisesCaribe();
        $destinos = $this->model->getDestinosCaribe();
        $data = [
            "tag_pages" => 'Fly Select | Vuelos Privados',
            "pages_title" => 'Bienvenido a tu próximo destino',
            "pages_name" => 'Fly Select | Vuelos Privados',
            'pages_function_js' => 'home_functions.js',
            'pages_styles_css' => 'app.css',
            "paises" => $paises,
            "destinos" => $destinos,
            "cabecera" => 'VUELOS EN AVIÓN PRIVADO AL CARIBE <br><span class="dorado">MÉXICO Y EL MUNDO',

        ];
        $this->views->getView($this, 'caribe', $data);
    }
    public function vuelos_en_jet_al_caribe()
    {

        $paises = $this->model->getPaisesCaribe();
        $destinos = $this->model->getDestinosCaribe();
        $data = [
            "tag_pages" => 'Fly Select | Vuelos Privados',
            "pages_title" => 'Bienvenido a tu próximo destino',
            "pages_name" => 'Fly Select | Vuelos Privados',
            'pages_function_js' => 'home_functions.js',
            'pages_styles_css' => 'app.css',
            "paises" => $paises,
            "destinos" => $destinos,
            "cabecera" => 'VUELOS EN JET PRIVADO AL CARIBE <br><span class="dorado">MÉXICO Y EL MUNDO',

        ];
        $this->views->getView($this, 'jet', $data);
    }
    public function vuelos_avion_privado()
    {

        $paises = $this->model->getPaisesMexico();
        $destinos = $this->model->getDestinosMexico();
        $data = [
            "tag_pages" => 'Fly Select | Vuelos en Avion Privados',
            "pages_title" => 'Bienvenido a tu próximo destino',
            "pages_name" => 'Fly Select | Vuelos Privados',
            'pages_function_js' => 'home_functions.js',
            'pages_styles_css' => 'app.css',
            "paises" => $paises,
            "destinos" => $destinos,
            "cabecera" => 'LA AEROLÍNEA PRIVADA MÁS COMPLETA <br><span class="dorado">Y GRANDE EN MÉXICO',

        ];
        $this->views->getView($this, 'privados', $data);
    }
    public function vuelos_jet_privado()
    {

        $paises = $this->model->getPaisesMexico();
        $destinos = $this->model->getDestinosMexico();
        $data = [
            "tag_pages" => 'Fly Select | Vuelos en Avion Privados',
            "pages_title" => 'Bienvenido a tu próximo destino',
            "pages_name" => 'Fly Select | Vuelos Privados',
            'pages_function_js' => 'home_functions.js',
            'pages_styles_css' => 'app.css',
            "paises" => $paises,
            "destinos" => $destinos,
            "cabecera" => 'RENTA DE VUELOS EN  <br><span class="dorado">JET PRIVADO',

        ];
        $this->views->getView($this, 'privados', $data);
    }
    public function gracias(){
        $data = [
            "tag_pages" => 'Fly Select | Vuelos Privados',
            "pages_title" => 'Bienvenido a tu próximo destino',
            "pages_name" => 'Fly Select | Vuelos Privados',
            'pages_function_js' => 'redirect.js',

        ];
        $this->views->getView($this, 'agradecimiento', $data);
    }
}
