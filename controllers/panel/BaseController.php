<?php

namespace controllers\panel;


use utils\Request;
use utils\View;

class BaseController{

    public $view;
    protected $request;


    public function __construct(){

        $this->view = new View();
        $this->request = new Request();

    }//__construct

    public function redirect( $location ){

        header("location:$location");

    }

    public function json( $value ){

        header('Content-type: application/json');

        echo json_encode( $value );
        exit();

    }//json

}