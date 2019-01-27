<?php

namespace controllers\api;

use models\Subcategory\Subcategory;

use controllers\panel\BaseController;

class SubcategoryApiController extends BaseController {



    public function GetAllSubcategoriesAction(  ){

        // localhost:5012/TexDon/index.php?ctrl=SubcategoryApi&act=GetAllSubcategories&categoryID=1

        $categoryID = $this->request->getGetValue('categoryID');

        $response = array(
            'code' => 0,
            'message' => 0,
            'data' => 0
        );


        $subcategoryes = Subcategory::GetAllSubcategoryByCategoryId($categoryID);

        $response['code'] = 200;

        $response['data'] = $subcategoryes;

        $this->json($response);


    }//GetAllSubcategoriesAction





}//SubcategoryApiController