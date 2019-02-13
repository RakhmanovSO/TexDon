<?php

namespace controllers\api;

use models\Product\Product;
use models\Product\ProductImagesPath;
use models\ProductAttributes\ProductAttributes;

use controllers\panel\BaseController;

class ProductApiController extends BaseController{


    public function GetProductsListAction(){

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => [
                'images' => [],
                'product' => []

            ],



        );

        $subcategoryID = $this->request->getGetValue('subcategoryID');

        $limit = $this->request->getGetValue('limit');

        $offset = $this->request->getGetValue('offset');

        if(empty($limit) || $limit < 1){

            $limit = 50;

        }//if


        if(empty($offset) || $offset < 1 ){

            $offset = 0;

        }//if


        $products = Product::GetProductBySubcategoryId($subcategoryID, $limit , $offset);



        $response['code'] = 200;

        $response['data']['product'] = $products;


       foreach ($products as $pr) {

            $path = ProductImagesPath::GetProductImagePathList($pr->productID, 1);

            array_push( $response['data']['images'], $path);

       }//foreach



        $this->json( $response );

    }//GetProductsList




    public function GetAboutProductAction(){

        $productID = $this->request->getGetValue('productID');

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => [
                'images' => [],
                'attributes' => [],
                'product' => []

            ],

        );


        $product = Product::GetProductById($productID);


        $response['code'] = 200;

        $response['data']['product'] = $product;



       $pathImages = ProductImagesPath::GetProductImagePathList($productID, 500 , 0);

            $response['data']['images'] = $pathImages;

       $attribut = ProductAttributes::GetAttributeByProductId($productID);


             $response['data']['attributes'] = $attribut;


        $this->json( $response );

    }//AboutProduct





}//ProductApiController