<?php

namespace controllers\panel;

use models\category\Category;

use models\categoryAndSubcategory;

use models\subcategory\Subcategory;

use utils\MySQL;


class SubcategoryController extends BaseController {


    public function subcategoriesListAction() {

        $this->view->subcategories = Subcategory::GetSubcategoryList(60, 0);

        return 'subcategories-list';

    }//subcategoriesListAction


    public function addSubcategoryAction(  ){

        $this->view->categories = Category::GetCategoryList(900,0);

        return 'addSubcategory';

    }//addProductAction


    public function addNewSubcategoryAction(  ){

        $subcategoryTitle = $this->request->getPostValue('subcategoryTitle');

        $name = $_FILES['subcategoryImagePath']['name'];

        $subcategoryImagePath = "E:/Games/wamp64/www/TexDon/assets/images/subcategory";

        $ImagePath ="/TexDon/assets/images/subcategory/$name";

        mkdir($subcategoryImagePath);  // создаём папку по пути subcategoryImagePath с именем папки folder

        $subcategoryImagePath .="/$name";

        $resultUploadedFile =  move_uploaded_file( $_FILES['subcategoryImagePath']['tmp_name'] , $subcategoryImagePath); // копируем файл в папку  $result = true - все ОК


        $categoryID = $this->request->getPostValue('categoryID');


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $result = Subcategory::AddSubcategory( $subcategoryTitle, $ImagePath);

            $subcategoryID = MySQL::$db->lastInsertId();

            $result2 = categoryAndSubcategory\CategoryAndSubcategory::AddSubcategoryToCategory( $categoryID, $subcategoryID );


            $response['code'] = 200;
            $response['message'] = 'Подкатегория добавлена!';
            $response['data'] = array(
                'resultAddSubcategory' => $result,
                'resultAddSubcategoryToCategory' => $result2,
                'resultUploadedFile' => $resultUploadedFile
            );

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'subcategoryTitle' => $subcategoryTitle,
                'subcategoryID' => $subcategoryID,
                'resultUploadedFile' => $resultUploadedFile
            );

        }//catch

        $this->json( $response );

    }// addNewSubcategoryAction



    public function removeSubcategoryAction(){

        $categoryandsubcategoryID = $this->request->getDeleteValue('categoryandsubcategoryID');

        $subcategoryID = $this->request->getDeleteValue('subcategoryID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $result = categoryAndSubcategory\CategoryAndSubcategory::DeleteSubcategoryToCategory($categoryandsubcategoryID);

            $result1 = Subcategory::DeleteSubcategory( $subcategoryID );

            $response['code'] = 200;
            $response['message'] = 'Подкатегория удалена!';
            $response['data'] = $result1;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'subcategoryID' => $subcategoryID,
                                        'categoryandsubcategoryID' => $categoryandsubcategoryID,
                                        'result' => $result );

        }//catch

        $this->json($response);

    }//removeCategoryAction



    public function updateSubcategoryAction(){

        $subcategoryID = $this->request->getGetValue('subcategoryID');

        $subcategory = Subcategory::GetSubcategoryToCategoryById($subcategoryID);

        $this->view->categories = Category::GetCategoryList(900,0);

        $this->view->subcategory =$subcategory;

        return 'updateSubcategory';

    }//updateSubcategory


    public function saveSubcategoryAction(  ){

        $subcategoryTitle = $this->request->getPostValue('subcategoryTitle');
        $subcategoryID = $this->request->getPostValue('subcategoryID');
        $categoryID = $this->request->getPostValue('categoryID');
        $categoryandsubcategoryID = $this->request->getPostValue('categoryandsubcategoryID');

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{

            Subcategory::UpdateSubcategory( $subcategoryID  , $subcategoryTitle );

            categoryAndSubcategory\CategoryAndSubcategory::UpdateSubcategoryToCategory($categoryandsubcategoryID, $categoryID, $subcategoryID);

            $response['code'] = 200;
            $response['message'] = 'Подкатегория обновлена успешно!';

        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'subcategoryID' => $subcategoryID,
                'subcategoryTitle' => $subcategoryTitle,
            );

        }//catch

        $this->json( $response );

    }//saveSubcategoryAction





}//SubcategoryController

