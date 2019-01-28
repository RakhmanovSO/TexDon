<?php

namespace controllers\panel;

use models\Product\Product;

use models\ProductAndAttributes\ProductAndAttributes;

use models\ProductAttributes\ProductAttributes;

use models\subcategory\Subcategory;

use models\Product\ProductImagesPath;

use models\ProductAndSubcategory\ProductAndSubcategory;

use utils\MySQL;

class ProductController extends BaseController {

    public function productsListAction(){
        
        $this->view->products = Product::GetProductList(50, 0);

        return 'products-list';

    }//productsListAction

    public function addProductAction(  ){

        $this->view->subcategories = Subcategory::GetSubcategoryList();

        $this->view->attributes = ProductAttributes::GetAttributesList();

        return 'addProduct';

    }//addProductAction


    public function addNewProductAction(  ){

        $productTitle = $this->request->getPostValue('productTitle');

        $productDescription = $this->request->getPostValue('productDescription');

        $subcategoryID = $this->request->getPostValue('subcategoryID');

        $productPrice = $this->request->getPostValue('productPrice');

        $attributes = json_decode(  $_POST['attributes'] );


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );


        $name = $_FILES['productImagePath']['name'];

        $imagePath = "E:/Games/wamp64/www/TexDon/assets/images/products";

        $productImagePath ="/TexDon/assets/images/category/$name";

        mkdir($imagePath);

        $imagePath .="/$name";

        $resultUploadedFile =  move_uploaded_file( $_FILES['productImagePath']['tmp_name'] , $imagePath);


        try{

            $result = Product::AddNewProduct($productTitle, $productDescription , $productPrice);

            $productID = MySQL::$db->lastInsertId();



           // foreach ( $productImagePath as $prPath ) {

            //ProductImagesPath::AddProductImagePath($productID, $prPath->productImagePath);

            ProductImagesPath::AddProductImagePath($productID, $productImagePath);

           // } // foreach  productImagePath


            foreach ( $attributes as $attribute ){

                ProductAndAttributes::AddAttributeToProduct($productID , $attribute->attributeID , $attribute->attributeValue );

            }//foreach


            ProductAndSubcategory::AddProductBySubcategory($productID ,$subcategoryID );


            $response['code'] = 200;
            $response['message'] = 'Товар добавлен!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productTitle' => $productTitle,
                'productDescription' => $productDescription,
                'productPrice' => $productPrice,
                'resultUploadedFile' =>  $resultUploadedFile

            );

        }//catch

        $this->json( $response );

    }//addNewProductAction


    public function updateProductAction( ){

        $productID = $this->request->getGetValue('productID');

        $product = Product::GetProductById($productID);

        $productImages = ProductImagesPath::GetProductImagePathList($productID);

        $subcategories = Subcategory::GetSubcategoryList();

        $attributes = ProductAttributes::GetAttributeByProductId($productID);

        $subcategoryAndProduct = ProductAndSubcategory::GetProductBySubcategoryList();

        $productAndSubcategoryId = ProductAndSubcategory::GetProductAndSubcategoryIdByProductId($productID);

        $this->view->product = $product;

        $this->view->productImages = $productImages;

        $this->view->subcategories = $subcategories;

        $this->view->attributes = $attributes;

        $this->view->subcategoryAndProduct = $subcategoryAndProduct;

        $this->view->productAndSubcategoryId = $productAndSubcategoryId;

        return 'updateProduct';

    }// updateProductAction


    public function saveUpdateProductAction( ){

        $productID = $this->request->getPostValue('productID');

        $subcategoryandproductID = $this->request->getPostValue('subcategoryandproductID');

        $productTitle = $this->request->getPostValue('productTitle');

        $productPrice = $this->request->getPostValue('productPrice');

        $productDescription = $this->request->getPostValue('productDescription');

        $subcategoryID = $this->request->getPostValue('subcategoryID');

        $attributes = json_decode(  $_POST['attributes'] );

        $imagesPaths = json_decode(  $_POST['imagesPaths'] );



        try{



            $result = Product::UpdateProduct($productID, $productTitle, $productDescription , $productPrice);


            ///// ??????????????

            foreach ( $attributes as $attribute ){
                ProductAndAttributes::AddAttributeToProduct($productID , $attribute->attributeID , $attribute->attributeValue );
            }//foreach

            foreach ( $imagesPaths as $path ){
                ProductImagesPath::AddProductImagePath( $productID, $path->productImagePath);
            }//foreach


            ProductAndSubcategory::UpdateProductBySubcategory($subcategoryandproductID, $subcategoryID , $productID );


            $response['code'] = 200;
            $response['message'] = 'Информация о товаре успешно обновлена!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productID' => $productID,
                'productTitle' => $productTitle,
                'productDescription' => $productDescription,
                'productPrice' => $productPrice,
                '$subcategoryandproductID' => $subcategoryandproductID
            );

        }//catch

        $this->json( $response );

    }//saveUpdateProductAction



    public function removeProductAction( ){

        $productID = $this->request->getDeleteValue('productID');


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $resultGetProductIdToSubcategory = ProductAndSubcategory::GetProductAndSubcategoryIdByProductId($productID);

            $this->view->resultGetProductIdToSubcategory = $resultGetProductIdToSubcategory;

            $resultDeleteProductAndSubcategoryTable = ProductAndSubcategory::DeleteProductBySubcategory($resultGetProductIdToSubcategory->subcategoryandproductID);

            $resultDeleteProduct = Product::DeleteProduct($productID);

            $response['code'] = 200;
            $response['message'] = 'Подкатегория удалена!';
            $response['data'] = array( 'resultGetProductIdToSubcategory' =>  $resultGetProductIdToSubcategory,
                'resultDeleteProductAndSubcategoryTable' => $resultDeleteProductAndSubcategoryTable,
                'resultDeleteProduct' => $resultDeleteProduct);

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'resultGetProductIdToSubcategory' =>  $resultGetProductIdToSubcategory,
                'resultDeleteProductAndSubcategoryTable' => $resultDeleteProductAndSubcategoryTable,
                'productID' =>  $productID);

        }//catch

        $this->json($response);


    }//removeProduct


}//ProductController