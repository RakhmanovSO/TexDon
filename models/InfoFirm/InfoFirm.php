<?php


namespace models\InfoFirm;

use utils\MySQL;

class InfoFirm {

    public $infoFirmID;
    public $text;
    public $imagePath1;



    public static function GetInfoFirm( $infoFirmID = 1  ) {

        $stm = MySQL::$db->prepare("SELECT * FROM `informationfirm` WHERE `infoFirmID` = :id");

        $stm->bindParam( ":id" , $infoFirmID , \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){
            throw new \Exception('Ошибка при получении информации о фирме!');
        }//if

        return  $result;

    }//GetInfoFirm


    public static function updateInfoFirm( $infoFirmID = 1 , $text, $imagePath1 ) {

        $stm = MySQL::$db->prepare("UPDATE `informationfirm` SET `text` = :text, `imagePath1`= :path WHERE `infoFirmID`= :id");


        $stm->bindParam( ":id" , $infoFirmID , \PDO::PARAM_INT);

        $stm->bindParam( ":text" , $text, \PDO::PARAM_STR);

        $stm->bindParam( ":path" ,$imagePath1 , \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при обновлении информации о фирме!');
        }//if

        return  $result;

    }//updateInfoFirm







}//InfoFirm