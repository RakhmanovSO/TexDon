<?php

namespace models\ProductAndAttributes;

use utils\MySQL;

class ProductAndAttributes {

    public $productandattributesID;
    public $productID;
    public $attributeID;
    public $value;




    public static function AddAttributeToProduct( $productID , $attributeID , $value ){

        $stm = MySQL::$db->prepare("INSERT INTO `productsandattributes`(`productandattributesID`, `attributeID`, `productID`, `value`) VALUES(NULL , :attributeID , :productID , :val)");

        $stm->bindParam(':attributeID' , $attributeID , \PDO::PARAM_INT);
        $stm->bindParam(':productID' , $productID , \PDO::PARAM_INT);
        $stm->bindParam(':val' , $value , \PDO::PARAM_STR);

        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка добавления атрибута!');
        }//if

        return  $result;

    }//AddAttributeToProduct



    public static function DeleteAttributeToProduct( $productandattributesID ){

        $stm = MySQL::$db->prepare("DELETE FROM `productsandattributes` WHERE productandattributesID = :id");

        $stm->bindParam(':id', $productandattributesID, \PDO::PARAM_INT);

        $result = $stm->execute();


        if( $result === false ){
            throw new \Exception('Ошибка удаления атрибута!');
        }//if

        return  $result;

    }//DeleteAttributeToProduct



    public static function UpdateAttributeToProduct ($productandattributesID, $productID, $attributeID,  $value ){

        $stm = MySQL::$db->prepare("UPDATE `productsandattributes` SET `attributeID`=:attributId,`productID`=:productId,`value`=:val WHERE `productandattributesID`= :Id ");

        $stm->bindParam(':attributId', $attributeID, \PDO::PARAM_INT);

        $stm->bindParam(':productId', $productID, \PDO::PARAM_INT);

        $stm->bindParam(':val', $value, \PDO::PARAM_STR);

        $stm->bindParam(':Id', $productandattributesID, \PDO::PARAM_INT);


        $result = $stm->execute();

        if( $result === false ){
            throw new \Exception('Ошибка обновления атрибута!');
        }//if

        return  $result;

    }//UpdateAttributeToProduct




}//ProductAndAttributes
