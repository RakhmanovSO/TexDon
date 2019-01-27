<?php

namespace models\categoryAndSubcategory;

use utils\MySQL;

class CategoryAndSubcategory {


    public static function AddSubcategoryToCategory ($categoryID, $subcategoryID ) {

        $stm = MySQL::$db->prepare("INSERT INTO `categoriesandsubcategories`(`categoryandsubcategoryID`, `categoryID`, `subcategoryID`) VALUES (NULL, :categoryID, :subcategoryID)");


        $stm->bindParam(':categoryID' , $categoryID , \PDO::PARAM_INT);

        $stm->bindParam(':subcategoryID' , $subcategoryID , \PDO::PARAM_INT);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления Подкатегории в Категорию !');
        }//if

        return  $result;

    }//AddSubcategoryToCategory


    public static function UpdateSubcategoryToCategory ($categoryandsubcategoryID, $categoryID, $subcategoryID ){

        $stm = MySQL::$db->prepare("UPDATE `categoriesandsubcategories` 
SET `categoryID`= :categoryId,`subcategoryID`= :subcategoryId 
WHERE `categoryandsubcategoryID`= :Id ");

        $stm->bindParam(':categoryId', $categoryID, \PDO::PARAM_INT);

        $stm->bindParam(':subcategoryId', $subcategoryID, \PDO::PARAM_INT);

        $stm->bindParam(':Id', $categoryandsubcategoryID, \PDO::PARAM_INT);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при обновлении Подкатегории в Категории !');
        }//if

        return  $result;

    }//UpdateSubcategoryToCategory


    public static function DeleteSubcategoryToCategory ( $categoryandsubcategoryID ){

        $stm = MySQL::$db->prepare("DELETE FROM `categoriesandsubcategories` WHERE `categoryandsubcategoryID`= :Id ");


        $stm->bindParam(':Id', $categoryandsubcategoryID, \PDO::PARAM_INT);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при удалении Подкатегории в Категории !');
        }//if

        return  $result;

    }//DeleteSubcategoryToCategory




}//CategoryAndSubcategory