<?php

namespace controllers\panel;

use models\InfoFirm\InfoFirm;


class InfoFirmController extends BaseController{

    public function updateInfoFirmAction(){

        $infoFirm = InfoFirm::GetInfoFirm(1);

        $this->view->infoFirm = $infoFirm;

        return 'updateInfoFirm';

    }//updateInfoFirm


    public function saveInfoFirmAction(  )
    {

        $infoFirmID = 1;

        $textN = $this->request->getPostValue('text');

        $text = trim($textN);


        if (isset($_FILES['imagePath1'])) {

            $name = $_FILES['imagePath1']['name'];

            $imagePath = "E:/Games/wamp64/www/TexDon/assets/images/infoFirm";

            $imagePath1 = "/TexDon/assets/images/infoFirm/$name";

            if (!file_exists($imagePath)) {

                mkdir($imagePath);
            }

            $imagePath .= "/$name";

            $resultUploadedFile = move_uploaded_file($_FILES['imagePath1']['tmp_name'], $imagePath); // копируем файл в папку  $result = true - все ОК

        }//if


        if (!isset($_FILES['imagePath1'])) {

                $imagePath1 = $this->request->getPostValue('imagePath1');

                if ($imagePath1 === null || $imagePath1 === NULL || $imagePath1 === "null" || $imagePath1 === "NULL") {

                    $imagePath1 = "/TexDon/assets/images/infoFirm/Log_Title_TexDon.png";

                }//if

                $imagePath = "E:/Games/wamp64/www/TexDon/assets/images/infoFirm";

            $resultUploadedFile = move_uploaded_file($imagePath1, $imagePath);


        }//if



        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{

            $result = InfoFirm::updateInfoFirm( $infoFirmID , $text, $imagePath1 );

            $response['code'] = 200;
            $response['message'] = 'Информация о фирме обновлена успешно!';
            $response['data'] = array('result' => $result, 'resultUploadedFile' => $resultUploadedFile );
        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'text' => $text,
                'imagePath1' => $imagePath1,
            );

        }//catch

        $this->json( $response );

    }//saveInfoFirm


}//InfoFirmController