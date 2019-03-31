<?php

namespace controllers\api;

use models\Order\Order;
use models\Order\OrderDetails;

use utils\MySQL;
use controllers\panel\BaseController;

class OrderApiController extends BaseController{


    // добавление нового Заказа

    public function AddOrderAction (  ){

        $userName = $this->request->getPostValue('userFirstAndLastName');

        if($userName === "undefined" || $userName === "" || $userName === null){

            $this->json(
                array(
                    'code' => 401,
                    'message' => "Заказ не оформлен ! Произошла ошибка",
                )
            );
            exit();
        }//if


        $email = $this->request->getPostValue('userEmail');

        if($email === "undefined" || $email === "" || $email=== null){
            $email = null;
        }//if


        $userPhone = $this->request->getPostValue('userContactNumberPhone');

        if($userPhone === "undefined" || $userPhone === "" || $userPhone === null){

            $this->json(
                array(
                    'code' => 401,
                    'message' => "Заказ не оформлен ! Произошла ошибка",
                )
            );
            exit();

        }//if

        $deliveryAddress = $this->request->getPostValue('deliveryAddressOrder');

        $commentOrder = $this->request->getPostValue('commentToTheOrder');

        if($commentOrder === "undefined" || $commentOrder === "" || $commentOrder === null){
            $commentOrder = null;
        }//if


        $dateAndTimeOrder = date('Y-m-d');

        $orderDetails = json_decode ($_POST['orderDetails']);


        /// Если $_POST = 0 то Получить данные на сервере можно следующим образом:
        ///$orderDetails = json_decode(file_get_contents('php://input'), true);


        $userFirstAndLastName = trim($userName);
        $userEmail = trim($email);
        $userContactNumberPhone = trim($userPhone);
        $deliveryAddressOrder = trim($deliveryAddress);
        $commentToTheOrder = trim($commentOrder);


        $newOrder = Order::AddNewOrder($userFirstAndLastName,  $userContactNumberPhone, $userEmail, $deliveryAddressOrder, $commentToTheOrder,  $dateAndTimeOrder );

        $orderID = MySQL::$db->lastInsertId();

        foreach ($orderDetails as $OD) {

             OrderDetails::AddNewOrderDetails($OD->productID, $OD->amountProduct, $OD->productPrice, $orderID);

        }// foreach


        $this->json(
            array(
                'code' => 200,
                'message' => "Заказ оформлен !",
            )
        );

    }//AddOrder




    public function GetOrderByIDAction( ){

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );

        $orderID = $this->request->getGetValue('orderID');

        $order = Order::GetOrderByOrderId($orderID);

        $response['code'] = 200;

        $response['data'] = $order;

        $this->json($response);

    }//GetOrderByID



}//OrderApiController
