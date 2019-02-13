<?php

namespace controllers\api;

use models\Order\Order;
use models\Order\OrderDetails;

use controllers\panel\BaseController;

class OrderApiController extends BaseController{


    // добавление нового Заказа

    public function AddOrderAction (  ){

        $userFirstAndLastName = $this->request->getPostValue('userFirstAndLastName');
        $userEmail = $this->request->getPostValue('userEmail');
        $userContactNumberPhone = $this->request->getPostValue('userContactNumberPhone');
        $deliveryAddressOrder = $this->request->getPostValue('deliveryAddressOrder');
        $commentToTheOrder = $this->request->getPostValue('commentToTheOrder');

        $dateAndTimeOrder = date('Y-m-d');


        $orderDetails = $_POST['orderDetails'];


        $newOrder = Order::AddNewOrder($userFirstAndLastName,  $userContactNumberPhone, $userEmail, $deliveryAddressOrder, $commentToTheOrder,  $dateAndTimeOrder );

        $orderID = MySQL::$db->lastInsertId();

        foreach ($orderDetails as $OD) {

             OrderDetails::AddNewOrderDetails($OD->productID, $OD->amountProduct, $OD->productPrice, $orderID);

        }// foreach


        $this->json(
            array(
            'order' => $newOrder,
            'orderDetails' => $orderDetails
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
