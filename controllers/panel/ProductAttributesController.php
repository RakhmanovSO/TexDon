<?php

namespace controllers\panel;

use models\ProductAttributes\ProductAttributes;

use models\ProductAndAttributes\ProductAndAttributes;


use utils\MySQL;


class ProductAttributesController extends BaseController {



    public function attributesListAction(  ){

        $this->view->attributes = ProductAttributes::GetAttributesList(50, 0);

        return 'attributes-list';

    }//attributesListAction


    public function addAttributeAction(  ){
        return 'addAttribute';
    }//addAttributeAction



    public function addNewAttributeAction(  ){

        $title = $this->request->getPostValue('attributeTitle');


        $attributeTitle = trim($title);


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{
            $result = ProductAttributes::AddNewAttribute( $attributeTitle );

            $response['code'] = 200;
            $response['message'] = 'Атрибут добавлен!';
            $response['data'] = $result;

        }//try

        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'attributeTitle' => $attributeTitle,
            );

        }//catch

        $this->json( $response );

    }//addNewAttributeAction


    public function removeAttributeAction(){

        $attributeID = $this->request->getDeleteValue('attributeID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $result = ProductAttributes::DeleteAttribute( $attributeID );

            $response['code'] = 200;
            $response['message'] = 'Атрибут удален!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'attributeID' => $attributeID );

        }//catch

        $this->json($response);

    }//removeAttributeAction



    public function updateAttributeAction(){

        $attributeID = $this->request->getGetValue('attributeID');

        $attribute = ProductAttributes::GetAttributeById($attributeID);

        $this->view->attribute = $attribute;

        return 'updateAttribute';

    }//updateCategory


    public function saveAttributeAction(  ){

        $attributeID = $this->request->getPostValue('attributeID');

        $title = $this->request->getPostValue('attributeTitle');

        $attributeTitle = trim($title);


        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{

            ProductAttributes::UpdateAttribute( $attributeID , $attributeTitle );

            $response['code'] = 200;
            $response['message'] = 'Атрибут обновлен успешно!';

        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'attributeID ' => $attributeID ,
                'attributeTitle' => $attributeTitle,
            );

        }//catch

        $this->json( $response );

    }//saveAttributeAction




}//ProductAttributesController