<?php


namespace models\Contacts;

use utils\MySQL;

class Contacts {

    public $contactID;
    public $email;
    public $skype;
    public $viber;
    public $phone1;
    public $phone2;
    public $phone3;
    public $phone4;


    public static function GetContactsFirm( $contactID = 1  ) {

        $stm = MySQL::$db->prepare("SELECT * FROM `contacts` WHERE `contactID` = :id");


        $stm->bindParam( ":id" , $contactID , \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){
            throw new \Exception('Ошибка при получении Контактов фирмы !');
        }//if

        return  $result;

    }//GetContactsFirm



    public static function updateContactsFirm( $contactID = 1 , $email, $skype, $viber, $phone1,  $phone2 , $phone3, $phone4 ) {

        $stm = MySQL::$db->prepare("UPDATE `contacts` SET `email` = :email, `skype`= :skype, 
                                        `viber`= :viber, `phone1`= :phone1, 
                                        `phone2`= :phone2, `phone3`= :phone3, `phone4`= :phone4 WHERE `contactID` = :id");


        $stm->bindParam( ":id" , $contactID, \PDO::PARAM_INT);

        $stm->bindParam( ":email" , $email, \PDO::PARAM_STR);

        $stm->bindParam( ":skype" , $skype, \PDO::PARAM_STR);

        $stm->bindParam( ":viber" , $viber, \PDO::PARAM_STR);

        $stm->bindParam( ":phone1" , $phone1, \PDO::PARAM_STR);

        $stm->bindParam( ":phone2" , $phone2, \PDO::PARAM_STR);

        $stm->bindParam( ":phone3" , $phone3, \PDO::PARAM_STR);

        $stm->bindParam( ":phone4" , $phone4, \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при обновлении Контактов фирмы !');
        }//if

        return  $result;

    }//updateContactsFirm





} //Contacts