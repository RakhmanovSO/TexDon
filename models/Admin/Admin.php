<?php



namespace models\Admin;

use utils\MySQL;

class Admin {

/*
        login   password

AdminTexDonGeneral  TexDon-2019

AdminTexDonFirst  TexDonAdmin-01

AdminTexDonSecond  TexDonAdmin-02
 */

    public $adminID;
    public $login;
    public $password;


    public function __construct($adminID, $login, $password){

        $this->adminID = $adminID;
        $this->login = $login;
        $this->password = $password;

    }// __construct



    public  static function AddNewUser ($login, $password){

       /*

       $bcrypt = new Bcrypt();

        $bcrypt_version = '2y';

        $heshPassword = $bcrypt->encrypt($password, $bcrypt_version);


    https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php

      $heshPassword = password_hash( $password, PASSWORD_BCRYPT);

       $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

        password_verify($password, $hash);

       */


        $heshPassword = password_hash( $password, PASSWORD_BCRYPT);

        $stm = MySQL::$db->prepare("INSERT INTO `admins`( `adminID`, `login` , `password` ) VALUES ( DEFAULT, :login, :password )");

        $stm->bindParam(':login' , $login , \PDO::PARAM_STR);

        $stm->bindParam(':password' , $heshPassword , \PDO::PARAM_STR);

        $stm->execute();

        return  MySQL::$db->lastInsertId();

    }//addNewUser



    public  static function DeleteUser ($password){

        $stm = MySQL::$db->prepare("DELETE FROM `admins` WHERE password = :userPassword");

        $stm->bindParam(':userPassword', $password , \PDO::PARAM_STR);

        $user = $stm->execute();

        if(  $user === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return  $user;

    }//DeleteUser


    public  static function GetSingleUser($login, $password){

        $stm = MySQL::$db->prepare("SELECT * FROM `admins`AS ad WHERE ad.login = :userLogin AND ad.password = :userPassword LIMIT 0, 2 ");

        $stm->bindParam(':userLogin', $login, \PDO::PARAM_STR);

        $stm->bindParam(':userPassword', $password , \PDO::PARAM_STR);

        $stm->execute();

        return $stm->fetch(\PDO::FETCH_OBJ);

    }//getSingleUser



    public  static function GetAllUsers($limit = 50, $offset = 0){

        $stm = MySQL::$db->prepare("SELECT * FROM `admins` LIMIT :offset, :limit ");
        $stm->bindParam(':offset' , $offset , \PDO::PARAM_INT);
        $stm->bindParam(':limit' , $limit , \PDO::PARAM_INT);
        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_OBJ);

    }//GetAllUsers







}//Admin