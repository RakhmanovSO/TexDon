<?php

namespace controllers\api;

use models\InfoFirm\InfoFirm;

use controllers\panel\BaseController;

class InfoFirmApiController extends BaseController{

    public function GetFirmInfoAction(){

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => 0

        );

        $firmInfo = InfoFirm::GetInfoFirm(1);

        $response['code'] = 200;

        $response['data'] = $firmInfo;

        $this->json( $response );

    }//GetFirmInfoAction


}//InfoFirmApiController