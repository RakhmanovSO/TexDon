<?php


namespace models\Admin;


use utils\MySQL;

class Admin{

    public $login;
    public $password;


    public function __construct($login, $password){

        $this->login = $login;
        $this->password = $password;

    }// __construct






}//Admin