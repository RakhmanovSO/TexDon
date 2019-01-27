<?php


namespace models\Product;

use utils\MySQL;

class ProductImagesPath {

    public $id;
    public $productID;
    public $productImagePath;


    public static function GetProductImagePathList ( $productID, $limit = 50, $offset = 0 ){


        $stm = MySQL::$db->prepare("SELECT * FROM `productimagespath` WHERE productID = :id");

        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetchAll(\PDO::FETCH_OBJ);

        if( $result === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return $result;

    }//GetProductImagePathList


    public static function AddProductImagePath ($productID, $productImagePath ){


        $stm = MySQL::$db->prepare("INSERT INTO `productimagespath`(`id`, `productID`, `productImagePath`) VALUES (NULL,:id, :path)");

        $stm->bindParam( ":id" , $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":path" , $productImagePath, \PDO::PARAM_STR);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return $result;

    }//AddProductImagePath


    public static function DeleteProductImagePath ( $id ){


        $stm = MySQL::$db->prepare("DELETE FROM `productimagespath` WHERE id = :id");

        $stm->bindParam( ":id" ,  $id, \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return $result;

    }//DeleteProductImagePath




    public static function UpdateProductImagePath ( $id, $productID, $productImagePath ){


        $stm = MySQL::$db->prepare("UPDATE `productimagespath` SET `productID` = :pId,`productImagePath` = :path WHERE id = :id");

        $stm->bindParam( ":id" ,  $id, \PDO::PARAM_INT);

        $stm->bindParam( ":pId" , $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":path" , $productImagePath, \PDO::PARAM_STR);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){

            throw new \Exception(MySQL::$db->errorInfo());

        }//if

        return $result;

    }//UpdateProductImagePath




}//ProductImagesPath

