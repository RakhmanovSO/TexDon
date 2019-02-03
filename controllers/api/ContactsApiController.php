<?php

namespace controllers\api;

use models\Contacts\Contacts;

use controllers\panel\BaseController;

class ContactsApiController extends BaseController {


    public function GetAllContactsAction()
    {

        // http://localhost:5012/TexDon/index.php?ctrl=ContactsApi&act=GetAllContacts

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );

        $response['code'] = 200;

        $response['data'] = Contacts::GetContactsFirm();

        $this->json($response);

    }//GetAllCategoryAction



}