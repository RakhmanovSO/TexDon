<?php

namespace controllers\api;

use models\Contacts\Contacts;

use controllers\panel\BaseController;

class ContactsFirmApiController extends BaseController{

    public function GetContactsFirmAction(){

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => 0

        );

        $contacts = Contacts::GetContactsFirm(1);

        $response['code'] = 200;

        $response['data'] = $contacts;

        $this->json( $response );

    }//GetContactsFirmAction


}//ContactsFirmApiController