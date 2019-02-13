<?php


namespace models\ProductAndSubcategory;


use utils\MySQL;

class ProductAndSubcategory{

    public $subcategoryandproductID;
    public $productID;
    public $subcategoryID;



    public static function GetProductBySubcategoryList ( $limit = 50, $offset = 0 ){

        $stm = MySQL::$db->prepare ("SELECT * FROM `subcategoriesandproducts` LIMIT $offset, $limit");


        $stm->execute();

        $result  = $stm->fetchAll(\PDO::FETCH_OBJ);

        return  $result;

    }//GetProductBySubcategoryList


    public static function AddProductBySubcategory ($subcategoryID, $productID) {

        $stm = MySQL::$db->prepare("INSERT INTO `subcategoriesandproducts`(`subcategoryandproductID`, `subcategoryID`, `productID`) VALUES (NULL,:subcategoryID, :productID)");

        $stm->bindParam( ":subcategoryID" ,  $subcategoryID, \PDO::PARAM_INT);

        $stm->bindParam( ":productID" , $productID, \PDO::PARAM_INT);

        $result = $stm->execute();

        if( $result  === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $result;

    }//AddProductBySubcategory



    public static function DeleteProductBySubcategory ($subcategoryandproductID) {


        $stm = MySQL::$db->prepare("DELETE FROM `subcategoriesandproducts` WHERE subcategoryandproductID = :id");

        $stm->bindParam( ":id" ,  $subcategoryandproductID, \PDO::PARAM_INT);


        $result = $stm->execute();


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $result;

    }//DeleteProductBySubcategory



    public static function UpdateProductBySubcategory( $subcategoryandproductID, $subcategoryID, $productID ){

        $stm = MySQL::$db->prepare("UPDATE `subcategoriesandproducts` SET `subcategoryID`= :subId,`productID`= :pId WHERE subcategoryandproductID = :id");

        $stm->bindParam( ":id" ,  $subcategoryandproductID, \PDO::PARAM_INT);

        $stm->bindParam( ":pId" , $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":subId" , $subcategoryID, \PDO::PARAM_INT);

        $result = $stm->execute();


        if( $result === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return $result;

    }//UpdateProductImagePath




    public static function GetProductAndSubcategoryIdByProductId ($productID) {

        $stm = MySQL::$db->prepare("SELECT * FROM `subcategoriesandproducts` WHERE productID = :id");

        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);


        $stm->execute();

        $result =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $result;

    }//GetProductAndSubcategoryIdByProductId






}//ProductAndSubcategory