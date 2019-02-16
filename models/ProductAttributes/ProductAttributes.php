<?php

namespace models\ProductAttributes;

use utils\MySQL;

class ProductAttributes {

    public $attributeID;
    public $attributeTitle;




    public function __construct( $attributeID , $attributeTitle){

        $this->attributeID = $attributeID;

        $this->attributeTitle = $attributeTitle;

    } // __construct ProductAttributess


    public static function GetAttributesList( $limit = 100 , $offset = 0 ){

        $stm = MySQL::$db->prepare("SELECT * FROM productattributes LIMIT $offset, $limit");

        $stm->execute();

        $attributes = $stm->fetchAll(\PDO::FETCH_OBJ);

        return $attributes;

    }//GetAttributesList


    public static function GetAttributeById($attributeID) {

        $stm = MySQL::$db->prepare("SELECT * FROM productattributes WHERE attributeID = :id");

        $stm->bindParam( ":id" , $attributeID , \PDO::PARAM_INT);

        $stm->execute();

        $attribute =  $stm->fetch(\PDO::FETCH_OBJ);

        if( $attribute === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $attribute;

    }//GetAttributeById


    public static function GetProductAttributeByProductId( $productID) {

        $stm = MySQL::$db->prepare("SELECT p.productID, p.productTitle, p.productPrice, p.brandProduct, pratrib.productandattributesID, pratrib.attributeID, atrib.attributeTitle, pratrib.value 
                                        FROM `products` AS `p` 
                                        INNER JOIN `productsandattributes` AS `pratrib` ON p.productID = pratrib.productID 
                                        INNER JOIN `productattributes` AS `atrib` ON pratrib.attributeID = atrib.attributeID 
                                        WHERE p.productID = :id ");

        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);

        $stm->execute();

        $attribut = $stm->fetchAll(\PDO::FETCH_OBJ);


        if(  $attribut === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $attribut;

    }//GetProductById




    public static function AddNewAttribute( $attributeTitle ){

        $stm = MySQL::$db->prepare("INSERT INTO `productattributes`(`attributeID`, `attributeTitle`) VALUES(NULL , :title)");

        $stm->bindParam(':title' , $attributeTitle , \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления атрибута! Возможно такой атрибут уже есть!');
        }//if

        return  $result;

    }//addNewAttribute


    public static function DeleteAttribute( $attributeID ){

        $stm = MySQL::$db->prepare("DELETE FROM `productattributes` WHERE attributeID = :Id");

        $stm->bindParam(':Id' , $attributeID ,  \PDO::PARAM_INT);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка удаления атрибута!');
        }//if

        return  $result;

    }//DeleteAttribute


    public static function UpdateAttribute($attributeID, $attributeTitle ){

        $stm = MySQL::$db->prepare("UPDATE `productattributes` SET `attributeTitle` = :title WHERE `attributeID` = :attributeId");


        $stm->bindParam(':attributeId', $attributeID, \PDO::PARAM_INT);

        $stm->bindParam(':title', $attributeTitle, \PDO::PARAM_STR);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка обновления атрибута!');
        }//if

        return  $result;

    }//UpdateAttribute


    public static function GetAttributeByProductId( $productID ) {

        $stm = MySQL::$db->prepare("SELECT p.productID, at.attributeID, paatt.value, at.attributeTitle FROM `productsandattributes` AS `paatt` INNER JOIN `products` AS `p` ON paatt.productID = p.productID INNER JOIN `productattributes` AS `at` ON paatt.attributeID = at.attributeID  WHERE p.productID = :id");


        $stm->bindParam(':id', $productID, \PDO::PARAM_INT);

        $stm->execute();

        $attributes = $stm->fetchAll(\PDO::FETCH_OBJ);

        if( $attributes === false ){
            throw new \Exception('Ошибка получения атрибутов продукта!');
        }//if

        return $attributes;

    }// GetAttributeByProductId




}//ProductAttributes