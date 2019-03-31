<?php


namespace models\Order;


use utils\MySQL;

class OrderDetails {

    public $orderDetailsID;
    public $productID;
    public $amountProduct;
    public $productPrice;
    public $orderID;


    public function __construct( $orderDetailsID, $productID,  $amountProduct, $productPrice, $orderID){

        $this->orderDetailsID = $orderDetailsID;
        $this->productID = $productID;
        $this->amountProduct =  $amountProduct;
        $this->productPrice = $productPrice;
        $this->orderID = $orderID;

    }// __construct



    public static function GetOrderDetailsByOrderId ( $orderID ){

        $stm = MySQL::$db->prepare ("SELECT od.orderDetailsID, od.productID, od.amountProduct, od.productPrice, od.orderID, p.productTitle FROM orderdetails as od INNER JOIN products as p ON p.productID = od.productID WHERE od.orderID = :id");

        $stm->bindParam( ":id" ,  $orderID, \PDO::PARAM_INT);

        $stm->execute();

        $result =  $stm->fetchAll(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;


    }//GetOrderDetailsByOrderId


    public static function AddNewOrderDetails( $productID,  $amountProduct, $productPrice, $orderID) {

        $stm = MySQL::$db->prepare("INSERT INTO `orderdetails`(`orderDetailsID`, `productID`, `amountProduct`, `productPrice`, `orderID`) VALUES  (NULL, :id, :amount, :price, :orderId )");


        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":amount" ,  $amountProduct, \PDO::PARAM_INT);

        $stm->bindParam( ":price" , $productPrice, \PDO::PARAM_STR);

        $stm->bindParam( ":orderId" ,  $orderID, \PDO::PARAM_INT);

        $stm->execute();

        $result =  $stm->fetch(\PDO::FETCH_OBJ);

        return  $result;

    }//AddNewOrderDetails


    public static function UpdateOrderDetails( $orderDetailsID, $productID,  $amountProduct, $productPrice, $orderID) {

        $stm = MySQL::$db->prepare("UPDATE `orderdetails` SET `productID`= :idP,`amountProduct`= :amount, `productPrice`= :price,`orderID`= :orderId WHERE `orderDetailsID`= :id");

        $stm->bindParam( ":id" ,  $orderDetailsID, \PDO::PARAM_INT);

        $stm->bindParam( ":idP" ,  $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":amount" ,  $amountProduct, \PDO::PARAM_INT);

        $stm->bindParam( ":price" , $productPrice, \PDO::PARAM_STR);

        $stm->bindParam( ":orderId" ,  $orderID, \PDO::PARAM_INT);

        $stm->execute();

        $result =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//AddNewOrderDetails



    public static function DeleteOrderDetailsById ( $orderDetailsID ){

        $stm = MySQL::$db->prepare ("DELETE FROM `orderdetails` WHERE orderDetailsID = :id");

        $stm->bindParam( ":id" ,  $orderDetailsID , \PDO::PARAM_INT);

        $stm->execute();

        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//DeleteDetailsByOrderId








}//Order