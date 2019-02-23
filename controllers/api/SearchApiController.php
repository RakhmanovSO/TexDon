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
                'products' => [],
            ],
        );

        $products = Search::SearchProduct($productTitle);


        if (count($products) === 0) {

            $products = "По вашему запросу - $productTitle  ничего не найдено !!! Попробуйте ввести другое название. ";

            $response['code'] = 200;

            $response['data']['product'] = $products;

        }//if

        else{

            foreach ($products as $pr) {

                $images = ProductImagesPath::GetProductImagePathList($pr->productID, 1);

                $attributes = ProductAttributes::GetProductAttributeByProductId($pr->productID);

                $pr->images = $images;

                $pr->attributes = $attributes;

            }//foreach

            $response['data']['products'] = $products;

        }// else


        $this->json( $response );

    }//GetSearchProduct





}//SearchApiController