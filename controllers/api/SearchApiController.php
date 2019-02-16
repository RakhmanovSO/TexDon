<?php

namespace controllers\api;

use models\Search\Search;

use models\ProductAttributes\ProductAttributes;

use models\Product\ProductImagesPath;


use controllers\panel\BaseController;

class SearchApiController extends BaseController {


    public function GetSearchProductAction(){

        // http://localhost:5012/TexDon/index.php?ctrl=SearchApi&act=GetSearchProduct&productTitle=Intel&XDEBUG_SESSION_START=17349

        $productTitle = $this->request->getGetValue('productTitle');

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => [
                'images' => [],
                'attributes' => [],
                'product' => []

            ],

        );

        $products = Search::SearchProduct( $productTitle);


        if (count($products) === 0) {

            $products = "По вашему запросу - $productTitle  ничего не найдено !!! Попробуйте ввести другое название. ";

            $response['code'] = 200;

            $response['data']['product'] = $products;

        }//if

        else{

            $response['code'] = 200;

            $response['data']['product'] = $products;


            foreach ($products as $pr) {

                $attribut = ProductAttributes::GetProductAttributeByProductId($pr->productID);

                array_push( $response['data']['attributes'], $attribut);

            }//foreach

            foreach ($products as $pr) {

                $path = ProductImagesPath::GetProductImagePathList($pr->productID, 1);

                array_push( $response['data']['images'], $path);

            }//foreach


        }// else


        $this->json( $response );

    }//GetSearchProduct





}//SearchApiController