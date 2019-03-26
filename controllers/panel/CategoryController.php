<?php

namespace controllers\panel;

use models\category\Category;
use models\subcategory\Subcategory;


class CategoryController extends BaseController {


    public function categoriesListAction(  ){

        $this->view->categories = Category::GetCategoryList(40,0);

        foreach ( $this->view->categories as $category ){
            $category->count = Category::GetSubcategoryAmountByCategory( $category->categoryID );
        }

        return 'categories-list';

    }//categoriesListAction


    public function removeCategoryAction(){

        $categoryID = $this->request->getDeleteValue('categoryID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $category = Category::GetCategoryById($categoryID);

            $result = Category::DeleteCategory( $categoryID );



            if ($result == true) {

                    $imagePath = "E:/Games/wamp64/www$category->categoryImagePath";

                    unlink($imagePath);

            }// if


            $response['code'] = 200;
            $response['message'] = 'Категория удалена!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'categoryID' => $categoryID );

        }//catch

        $this->json($response);

    }//removeCategoryAction


    public function updateCategoryAction(){

        $categoryID = $this->request->getGetValue('categoryID');

        $category = Category::GetCategoryById($categoryID);

        $this->view->category =$category;

        return 'updateCategory';

    }//updateCategory


    public function saveCategoryAction(  ){

        $categoryID = $this->request->getPostValue('categoryID');
        $categoryTitle = $this->request->getPostValue('categoryTitle');


        $name1 = $_FILES['categoryImagePath']['name'];

        if ($name1 == null){

            $categoryImagePath = $this->request->getPostValue('categoryImagePath');

        }//if
        else {

            $imagePath = "E:/Games/wamp64/www/TexDon/assets/images/category";

            $categoryImagePath = "/TexDon/assets/images/category/$name1";

            mkdir($imagePath);

            $imagePath .= "/$name1";

            $resultUploadedFile1 = move_uploaded_file($_FILES['categoryImagePath']['tmp_name'], $imagePath);

        }// else

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{

            Category::UpdateCategory( $categoryID , $categoryTitle, $categoryImagePath);

            $response['code'] = 200;
            $response['message'] = 'Категория обновлена успешно!';

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'categoryID' => $categoryID,
                'categoryTitle' => $categoryTitle,
                'resultUploadedFile1' => $resultUploadedFile1,
            );

        }//catch

        $this->json( $response );

    }//saveCategoryAction


    public function addCategoryAction(  ){

        return 'addCategory';

    }//addCategoryAction


    public function addNewCategoryAction(  ){

        $categoryTitle = $this->request->getPostValue('categoryTitle');

        $name = $_FILES['categoryImagePath']['name'];

        // $extention = end (explode ('.' , $name));

        // $folder = data("d_m_Y H_i_s");

        // $categoryImagePath = "E:/Games/wamp64/www/TexDon/assets/images/category/$folder";

        $categoryImagePath = "E:/Games/wamp64/www/TexDon/assets/images/category";

        $ImagePath ="/TexDon/assets/images/category/$name";

        mkdir($categoryImagePath);  // создаём папку по пути categoryImagePath с именем папки folder

        $categoryImagePath .="/$name";

       $resultUploadedFile =  move_uploaded_file( $_FILES['categoryImagePath']['tmp_name'] , $categoryImagePath); // копируем файл в папку  $result = true - все ОК

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{
            $resultAddNewCategory = Category::AddCategory( $categoryTitle , $ImagePath );

            $response['code'] = 200;
            $response['message'] = 'Категория добавлена!';
            $response['data'] = array('resultAddNewCategory' => $resultAddNewCategory, 'resultUploadedFile' => $resultUploadedFile );

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'categoryTitle' => $categoryTitle, 'categoryImagePath' => $categoryImagePath, 'resultUploadedFile' => $resultUploadedFile);

        }//catch

        $this->json( $response );

    }// addNewCategoryAction



    public function categoryAndSubcategoryAction(  ){

        $categoryID = $this->request->getGetValue( 'categoryID' );

        $this->view->category = Category::GetCategoryById($categoryID);

        $this->view->subcategoryes = Subcategory::GetAllSubcategoryByCategoryId($categoryID);

        return 'categoryAndSubcategory';

    }//categoryAndSubcategoryAction



}//CategoryController