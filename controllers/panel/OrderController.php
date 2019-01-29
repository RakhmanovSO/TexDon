<?php

namespace controllers\panel;

use models\Order\Order;

use models\Order\OrderDetails;
use models\Product\Product;


class OrderController extends BaseController {


    public function ordersListAction() {

        $this->view->orders = Order::GetOrderList(50, 0);

        return 'orders-list';

    }//ordersList



    public function aboutTheOrderAction() {

       $orderID = $this->request->getGetValue('orderID');

       $order = Order::GetOrderByOrderId($orderID);

       $orderDetails = OrderDetails::GetOrderDetailsByOrderId($orderID);

        $this->view->order = $order;

        $this->view->orderDetails = $orderDetails;

        return 'moreAboutTheOrder';

    }//aboutTheOrder



    public function saveUpdateOrderAction() {

        $response = array (
            'code' => -1,
            'message' => '',
            'data' => ''   );

        $this->json( $response );

    }// SaveUpdateOrder



    public function removeOrderAction () {

        $orderID = $this->request->getDeleteValue('orderID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $result = Order::DeleteOrder($orderID);


            $response['code'] = 200;
            $response['message'] = 'Заказ удален!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'orderID' => $orderID, );

        }//catch

        $this->json($response);

    }// removeOrderAction




}//OrderController