<?php

namespace models\category;

use utils\MySQL;

class Category{

    public $categoryID ;
    public $categoryTitle;
    public $categoryImagePath;


    public  function __construct($categoryID, $categoryTitle,  $categoryImagePath) {

        $this->categoryID = $categoryID;
        $this->categoryTitle = $categoryTitle;
        $this->categoryImagePath = $categoryImagePath;

    }// __construct Category


    public static function GetCategoryList( $limit = 200, $offset = 0 ){

        $stm = MySQL::$db->prepare("SELECT * FROM categories LIMIT $offset, $limit");

        $stm->execute();

        $categoryes = $stm->fetchAll(\PDO::FETCH_OBJ);

        return $categoryes;

    }//getCategoryList



    public static function GetCategoryById($categoryID) {

        $stm = MySQL::$db->prepare("SELECT * FROM categories WHERE categoryID = :id");

        $stm->bindParam( ":id" , $categoryID , \PDO::PARAM_INT);

        $stm->execute();

        $category =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $category === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $category;

    }//getCategoryById


    public static function AddCategory( $categoryTitle, $categoryImagePath ) {

        $stm = MySQL::$db->prepare("INSERT INTO categories(categoryID , categoryTitle, categoryImagePath) VALUES (NULL ,:title, :path)");

        $stm->bindParam(':title',  $categoryTitle, \PDO::PARAM_STR);

        $stm->bindParam(':path',  $categoryImagePath, \PDO::PARAM_STR);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления Категории! Возможно такая Категория уже есть!');
        }//if

        return  $result;

    }//AddCategory

    public static function DeleteCategory($categoryID){

        $stm = MySQL::$db->prepare("DELETE FROM categories WHERE categoryID = :categoryID");

        $stm->bindParam(':categoryID', $categoryID, \PDO::PARAM_INT);

        $result = $stm->execute();

        return  $result;

    }//DeleteCategory


    public static function UpdateCategory($categoryID,  $categoryTitle, $categoryImagePath ){

        $stm = MySQL::$db->prepare("UPDATE `categories` SET `categoryTitle` = :title, `categoryImagePath` = :path WHERE `categoryID` = :categoryId");

        $stm->bindParam(':categoryId', $categoryID, \PDO::PARAM_INT);

        $stm->bindParam(':title', $categoryTitle, \PDO::PARAM_STR);

        $stm->bindParam( ":path" , $categoryImagePath , \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка при обновлении Категории!');
        }//if

        return  $result;

    }//UpdateCategory


    public static function GetSubcategoryAmountByCategory( $categoryID ){

        $stm = MySQL::$db->prepare("SELECT COUNT(cands.subcategoryID) as `count` FROM  `categoriesandsubcategories` as cands WHERE cands.categoryID = :id");

        $stm->bindParam(':id' , $categoryID , \PDO::PARAM_INT);

        $stm->execute();

        $count = $stm->fetch(\PDO::FETCH_OBJ);

        return $count->count;


    }//GetSubcategoryAmountByCategory




}//Category