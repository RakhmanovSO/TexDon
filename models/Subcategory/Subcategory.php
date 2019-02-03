<?php

namespace models\subcategory;

use utils\MySQL;

class Subcategory {

    public $subcategoryID;
    public $subcategoryTitle;
    public $subcategoryImagePath;


    public  function __construct($subcategoryID, $subcategoryTitle,  $subcategoryImagePath) {

        $this->subcategoryID = $subcategoryID;
        $this->subcategoryTitle = $subcategoryTitle;
        $this->subcategoryImagePath = $subcategoryImagePath;

    }// __construct Subcategory



    public static function GetSubcategoryList ( $limit = 200, $offset = 0 ){

         $stm = MySQL::$db->prepare ("SELECT sc.subcategoryID, sc.subcategoryTitle, c.categoryTitle, c.categoryID, cAs.categoryandsubcategoryID FROM `categoriesandsubcategories` AS `cAs` 
                                        INNER JOIN `categories` AS `c` ON cAs.categoryID = c.categoryID 
                                        INNER JOIN `subcategories` AS `sc` ON cAs.subcategoryID = sc.subcategoryID LIMIT $offset, $limit");


        $stm->execute();

        $subcategories = $stm->fetchAll(\PDO::FETCH_OBJ);

        return $subcategories;

    }//GetSubcategoryList



    public static function GetSubcategoryById($subcategoryID) {

        $stm = MySQL::$db->prepare("SELECT * FROM subcategories WHERE subcategoryID = :id");

        $stm->bindParam( ":id" , $subcategoryID , \PDO::PARAM_INT);

        $stm->execute();

        $subcategory =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $subcategory === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $subcategory;

    }//GetSubcategoryById


    public  static  function  GetAllSubcategoryByCategoryId ($categoryID ){

        $stm = MySQL::$db->prepare("SELECT c.categoryID, c.categoryTitle, sc.subcategoryID, sc.subcategoryTitle, sc.subcategoryImagePath, cAs.categoryandsubcategoryID 
                                    FROM `categoriesandsubcategories` AS `cAs` 
                                    INNER JOIN `subcategories` AS `sc` ON cAs.subcategoryID = sc.subcategoryID 
                                    INNER JOIN `categories` AS `c` ON cAs.categoryID = c.categoryID 
                                    WHERE c.categoryID = :categoryId");

        $stm->bindParam( ":categoryId" , $categoryID , \PDO::PARAM_INT);

        $stm->execute();

        $subcategoryes =  $stm->fetchAll(\PDO::FETCH_OBJ);

        if( $subcategoryes === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $subcategoryes;

    }//GetAllSubcategoryByCategoryId


    public static function GetSubcategoryToCategoryById($subcategoryID) {

        $stm = MySQL::$db->prepare("SELECT * FROM `categoriesandsubcategories` AS `cAs` 
        INNER JOIN `categories` AS `c` ON cAs.categoryID = c.categoryID 
        INNER JOIN `subcategories` AS `sc` ON cAs.subcategoryID = sc.subcategoryID 
        WHERE sc.subcategoryID = :id");

        $stm->bindParam( ":id" , $subcategoryID , \PDO::PARAM_INT);

        $stm->execute();

        $subcategory =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $subcategory === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $subcategory;

    }//GetSubcategoryToCategoryById


    public static function AddSubcategory( $subcategoryTitle,  $subcategoryImagePath) {

        $stm = MySQL::$db->prepare("INSERT INTO subcategories(subcategoryID , subcategoryTitle, subcategoryImagePath) VALUES (NULL ,:title ,:path)");

        $stm->bindParam(':title',  $subcategoryTitle, \PDO::PARAM_STR);

        $stm->bindParam(':path',  $subcategoryImagePath, \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления Подкатегории! Возможно такая Подкатегория уже есть!');
        }//if

        return  $result;

    }//AddSubcategory

    public static function DeleteSubcategory($subcategoryID){

        $stm = MySQL::$db->prepare("DELETE FROM subcategories WHERE subcategoryID = :subcategoryID");

        $stm->bindParam(':subcategoryID', $subcategoryID, \PDO::PARAM_INT);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления Подкатегории! Возможно такая Подкатегория уже есть!');
        }//if


        return  $result;

    }//DeleteSubcategory


    public static function UpdateSubcategory($subcategoryID,  $subcategoryTitle ){

        $stm = MySQL::$db->prepare("UPDATE `subcategories` SET `subcategoryTitle` = :title WHERE `subcategoryID` = :subcategoryId");


        $stm->bindParam(':subcategoryId', $subcategoryID, \PDO::PARAM_INT);

        $stm->bindParam(':title', $subcategoryTitle, \PDO::PARAM_STR);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при обновлении Подкатегории!');
        }//if

        return  $result;

    }//UpdateSubcategory



}//Subcategory