<?php

namespace controllers\api;

use models\Search\Search;

use models\ProductAttributes\ProductAttributes;

use models\Product\ProductImagesPath;


use controllers\panel\BaseController;

class SearchApiController extends BaseController {


    public function GetSearchProductAction(){
        // http://localhost:5012/TexDon/index.php?ctrl=SearchApi&act=GetSearchProduct&productTitle=Intel&XDEBUG_SESSION_START=17349

        $title = $this->request->getGetValue('productTitle');

        $productTitle = trim($title);

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => [
                'products' => [],
            ],
        );

        $products = Search::SearchProduct($productTitle);

        if (count($products) === 0) {

            $response['data']['products'] = $products;
            $response['code'] = 200;

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