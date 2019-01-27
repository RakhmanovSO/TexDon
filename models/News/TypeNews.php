<?php


namespace models\News;

use utils\MySQL;

class TypeNews{

    public $newsTypeID;
    public $titleNewsType;



    public static function GetNewsTypeList ( ){

        $stm = MySQL::$db->prepare ("SELECT * FROM `typesnews`");


        $stm->execute();

        $newsTypes = $stm->fetchAll(\PDO::FETCH_OBJ);

        return  $newsTypes;

    }//GetNewsTypeList



}//TypeNews