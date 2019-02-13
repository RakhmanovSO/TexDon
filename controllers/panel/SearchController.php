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

    }//searchProduct


}//SearchController