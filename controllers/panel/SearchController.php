<?php

namespace controllers\panel;

use models\Search\Search;

use utils\MySQL;

class SearchController extends BaseController {



    public function searchProductAction(  ){

        $productTitle = $this->request->getPostValue('productTitle');

        $product = Search::SearchProduct($productTitle, 50, 0);


        if (count($product) === 0) {

            $product = "По вашему запросу - $productTitle  ничего не найдено !!! Попробуйте ввести другое название. ";

            $this->view->searchProduct = $product;

        }//if

        else{

            $this->view->searchProduct = $product;


        }// else



        return 'searchProduct';

        require('localhost:5012/TexDon/views/Search/searchProduct.php');

       // $response['code'] = 200;
       // $response['message'] = '';

       //   $response['data'] = $product;

        //  $this->json( $response );

    }//searchProduct






}//SearchController