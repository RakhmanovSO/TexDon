<?php

namespace controllers\panel;

use models\Contacts\Contacts;


class ContactsController extends BaseController{


    public function updateContactsFirmAction(){

        $contactsFirm = Contacts::GetContactsFirm(1);

        $this->view->contactsFirm = $contactsFirm;

        return 'updateContacts';

    }//updateContactsFirm



    public function saveContactsFirmAction(  ){

        $contactID = 1;
        $email = $this->request->getPostValue('email');
        $skype = $this->request->getPostValue('skype');
        $viber = $this->request->getPostValue('viber');
        $phone1 = $this->request->getPostValue('phone1');
        $phone2 = $this->request->getPostValue('phone2');
        $phone3 = $this->request->getPostValue('phone3');
        $phone4 = $this->request->getPostValue('phone4');

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{

            $result = Contacts::updateContactsFirm( $contactID , $email, $skype, $viber,  $phone1,  $phone2,  $phone3, $phone4  );

            $response['code'] = 200;

            $response['message'] = 'Информация о фирме обновлена успешно!';

            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'contactID' => $contactID,
                'email' => $email,
                'skype' => $skype,
                '$phone1' => $phone1,
                '$phone2' => $phone2,
                '$phone3' => $phone3,
                '$phone4' => $phone4,
            );

        }//catch

        $this->json( $response );

    }//saveContactsFirm



}//ContactsController