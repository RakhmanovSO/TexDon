<?php


namespace models\Order;


use utils\MySQL;

class Order {

    public $orderID;
    public $userFirstAndLastName;
    public $userContactNumberPhone;
    public $userEmail;
    public $deliveryAddressOrder;
    public $commentToTheOrder;
    public $dateAndTimeOrder;


    public function __construct($orderID, $userFirstAndLastName, $userContactNumberPhone, $userEmail, $deliveryAddressOrder,$commentToTheOrder, $dateAndTimeOrder ){

        $this->orderID = $orderID;
        $this->userFirstAndLastName = $userFirstAndLastName;
        $this->userContactNumberPhone = $userContactNumberPhone;
        $this->userEmail = $userEmail;
        $this->deliveryAddressOrder = $deliveryAddressOrder;
        $this->commentToTheOrder = $commentToTheOrder;
        $this->dateAndTimeOrder = $dateAndTimeOrder;

    }// __construct



    public static function GetOrderList ( $limit = 50, $offset = 0){

        $stm = MySQL::$db->prepare ("SELECT ord.orderID, ord.dateAndTimeOrder, ord.userFirstAndLastName, ord.deliveryAddressOrder FROM `orders` AS `ord` LIMIT $offset, $limit");

        $stm->execute();

        $result =  $stm->fetchAll(\PDO::FETCH_OBJ);

        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//GetOrderByOrderId


    public static function GetOrderByOrderId ( $orderID ){

        $stm = MySQL::$db->prepare ("SELECT `orderID`, `userFirstAndLastName`, `userContactNumberPhone`, `userEmail`, `deliveryAddressOrder`, `commentToTheOrder`, `dateAndTimeOrder` FROM `orders` WHERE orderID = :id");

        $stm->bindParam( ":id" ,  $orderID, \PDO::PARAM_INT);

        $stm->execute();

        $result =  $stm->fetchAll(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//GetOrderByOrderId



    public static function AddNewOrder( $userFirstAndLastName, $userContactNumberPhone, $userEmail, $deliveryAddressOrder, $commentToTheOrder, $dateAndTimeOrder) {

        $stm = MySQL::$db->prepare("INSERT INTO `orders`(`orderID`, `userFirstAndLastName`, `userContactNumberPhone`, `userEmail`, `deliveryAddressOrder`, `commentToTheOrder`, `dateAndTimeOrder`) VALUES (NULL, :userName, :phone, :email, :address, :comment, :datetime )");

        $stm->bindParam( ":userName" ,  $userFirstAndLastName, \PDO::PARAM_STR);

        $stm->bindParam( ":phone" ,  $userContactNumberPhone, \PDO::PARAM_STR);

        $stm->bindParam( ":email" , $userEmail, \PDO::PARAM_STR);

        $stm->bindParam( ":address" ,  $deliveryAddressOrder, \PDO::PARAM_STR);

        $stm->bindParam( ":comment" ,  $commentToTheOrder, \PDO::PARAM_STR);

        $stm->bindParam( ":datetime" ,  $dateAndTimeOrder, \PDO::PARAM_STR);

        $stm->execute();

        $result =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//AddNewOrder



    public static function UpdateOrder($orderID, $userFirstAndLastName, $userContactNumberPhone, $userEmail, $deliveryAddressOrder, $commentToTheOrder, $dateAndTimeOrder) {


        $stm = MySQL::$db->prepare("UPDATE `orders` SET `userFirstAndLastName`= :userName,`userContactNumberPhone`= :phone,`userEmail`= :email,`deliveryAddressOrder`= :address,`commentToTheOrder`= :comment,`dateAndTimeOrder`= :datetime WHERE `orderID`= :id");

        $stm->bindParam( ":id" ,  $orderID, \PDO::PARAM_INT);

        $stm->bindParam( ":userName" ,  $userFirstAndLastName, \PDO::PARAM_STR);

        $stm->bindParam( ":phone" ,  $userContactNumberPhone, \PDO::PARAM_STR);

        $stm->bindParam( ":email" , $userEmail, \PDO::PARAM_STR);

        $stm->bindParam( ":address" ,  $deliveryAddressOrder, \PDO::PARAM_STR);

        $stm->bindParam( ":comment" ,  $commentToTheOrder, \PDO::PARAM_STR);

        $stm->bindParam( ":datetime" ,  $dateAndTimeOrder, \PDO::PARAM_STR);

        $stm->execute();

        $result =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//UpdateOrder



    public static function DeleteOrder ( $orderID ){

        $stm = MySQL::$db->prepare ("DELETE FROM `orders` WHERE orderID = :id");

        $stm->bindParam( ":id" ,  $orderID , \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//DeleteOrder


// SELECT ord.orderID, ord.dateAndTimeOrder, ord.userFirstAndLastName, ord.deliveryAddressOrder FROM `orders` AS `ord` LIMIT 0, 50

    /// SELECT* FROM `orders` AS `ord` INNER JOIN `orderdetails` AS `ordDet` ON ord.orderID = ordDet.orderID LIMIT 0, 50
    /// SELECT ord.orderID, ord.dateAndTimeOrder, ord.deliveryAddressOrder, ordDet.orderDetailsID FROM `orders` AS `ord` INNER JOIN `orderdetails` AS `ordDet` ON ord.orderID = ordDet.orderID LIMIT 0, 50


}//Order