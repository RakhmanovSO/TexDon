<?php

namespace controllers\api;

use models\Category\Category;

use controllers\panel\BaseController;

class CategoryApiController extends BaseController {


    public function GetAllCategoryAction(  ){

        // http://localhost:5012/TexDon/index.php?ctrl=CategoryApi&act=GetAllCategory

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );

        $response['code'] =200;
        $response['data'] =Category::GetCategoryList(900 , 0);

        $this->json($response);

    }//GetAllCategoryAction


    public function GetCategoryByIdAction(  ){

        $categoryID = $this->request->getGetValue('categoryID');

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );

        $response['code'] =200;
        $response['data'] =Category::GetCategoryById($categoryID);

        $this->json($response);


    }//GetCategoryByIdAction


    //////  ??????? /////
    public function GetSubcategoryByCategoryAction(  ){

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );

        $categoryID = $this->request->getGetValue('categoryID');
        $limit = $this->request->getGetValue('limit');
        $offset = $this->request->getGetValue('offset');

        if(empty($limit) || $limit < 1){
            $limit = 10;
        }//if

        if(empty($offset) || $offset < 1 ){
            $offset = 0;
        }//if

        $products = Category::GetCategoryAndProducts($categoryID, $limit , $offset);

        $category = Category::getCategoryById($categoryID);

        $response['code'] = 200;
        $response['data'] = array(
            'products' => $products,
            'category' => $category,
        );

        $this->json( $response );

    }//GetProductsByCategoryAction



}//CategoryApiController