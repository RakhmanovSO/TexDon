<?php

namespace controllers\panel;

use models\Search\Search;

use utils\MySQL;

class SearchController extends BaseController {



    public function searchProductAction(  ){

        $title = $this->request->getPostValue('productTitle');

        $productTitle = trim($title);

        $product = Search::SearchProduct($productTitle, 50, 0);


        if (count($product) === 0) {

            $this->view->product = 0;

        }//if

        else{

            $this->view->product = $product;

        }// else


        return 'searchProduct';


      //  require('localhost:5012/TexDon/views/Search/searchProduct.php');
       // $response['code'] = 200;
       // $response['message'] = '';
       //   $response['data'] = $product;
        //  $this->json( $response );

    }//searchProduct






}//SearchController