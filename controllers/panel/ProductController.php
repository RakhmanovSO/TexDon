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

        return 'addProduct';

    }//addProductAction


    public function addNewProductAction(  ){

        $productTitle = $this->request->getPostValue('productTitle');

        $productDescription = $this->request->getPostValue('productDescription');

        $subcategoryID = $this->request->getPostValue('subcategoryID');

        $productPrice = $this->request->getPostValue('productPrice');

        $brandProduct = $this->request->getPostValue('brandProduct');


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );


        try{

            $result = Product::AddNewProduct($productTitle, $productDescription , $productPrice,  $brandProduct );

            $productID = MySQL::$db->lastInsertId();


            $result2 = ProductAndSubcategory::AddProductBySubcategory($productID ,$subcategoryID );


            $response['code'] = 200;
            $response['message'] = 'Товар добавлен!';
            $response['data'] = array(
                'result' => $result,
                'result2' =>  $result2
            );

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productTitle' => $productTitle,
                'productDescription' => $productDescription,
                'productPrice' => $productPrice,
                'productID' => $productID
            );

        }//catch

        $this->json( $response );

    }//addNewProductAction



    public function removeProductAction( ){

        $productID = $this->request->getDeleteValue('productID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{

            $resultGetProductIdToSubcategory = ProductAndSubcategory::GetProductAndSubcategoryIdByProductId($productID);

            $resultGetProductImagesPath = ProductImagesPath::GetProductImagePathList($productID);

            $resultDeleteProductAndSubcategoryTable = ProductAndSubcategory::DeleteProductBySubcategory($resultGetProductIdToSubcategory->subcategoryandproductID);

            $resultDeleteProduct = Product::DeleteProduct($productID);



            if ($resultDeleteProduct == true) {

                foreach ($resultGetProductImagesPath as $path) {

                    $imagePath = "E:/Games/wamp64/www$path->productImagePath";

                    unlink($imagePath); // удаление файла по пути path  ???????????   http://localhost:5012
                }

            }//if

            $response['code'] = 200;
            $response['message'] = 'Продукт удален!';
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




    public function updateProductAction( ){

        $productID = $this->request->getGetValue('productID');

        $product = Product::GetProductById($productID);

        $subcategories = Subcategory::GetSubcategoryList();

        $subcategoryAndProduct = ProductAndSubcategory::GetProductBySubcategoryList();

        $productAndSubcategoryId = ProductAndSubcategory::GetProductAndSubcategoryIdByProductId($productID);

        $this->view->product = $product;

        $this->view->subcategories = $subcategories;

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

        $brandProduct = $this->request->getPostValue('brandProduct');


        try{

            $result = Product::UpdateProduct($productID, $productTitle, $productDescription , $productPrice, $brandProduct);

            $result2 = ProductAndSubcategory::UpdateProductBySubcategory($subcategoryandproductID, $subcategoryID , $productID );


            $response['code'] = 200;
            $response['message'] = 'Информация о товаре успешно обновлена!';

            $response['data'] = array(
                'result' => $result,
                'result2' =>  $result2
            );


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




    public function updateImagesProductAction( ){

        $productID = $this->request->getGetValue('productID');

        $product = Product::GetProductById($productID);

        $productImages = ProductImagesPath::GetProductImagePathList($productID);

        $this->view->product = $product;

        $this->view->productImages = $productImages;


        return 'updateProductImages';

    }// updateImagesProduct



    public function saveUpdateImagesProductAction( ){


        $productID = $this->request->getPostValue('productID');

        $name = $_FILES['productImagePath']['name'];

        $imagePath = "E:/Games/wamp64/www/TexDon/assets/images/products";

        $productImagePath ="/TexDon/assets/images/products/$name";

        mkdir($imagePath);

        $imagePath  .="/$name";

        $resultUploadedFile =  move_uploaded_file( $_FILES['productImagePath']['tmp_name'] , $imagePath );


        try{

            $result = ProductImagesPath::AddProductImagePath( $productID, $productImagePath);

            $response['code'] = 200;
            $response['message'] = 'Изображение успешно добавленно!';
            $response['data'] = array(
                'result' =>  $result,
                'resultUploadedFile' =>  $resultUploadedFile,
                'productID' => $productID,
                'imagesPaths' =>  $productImagePath
            );

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productID' => $productID,
                'imagesPaths' =>  $productImagePath,
                'resultUploadedFile' =>  $resultUploadedFile,
            );

        }//catch

        $this->json( $response );


    }//saveUpdateImagesProduct





    public function removeProductImageAction( ){

        $id = $this->request->getDeleteValue('id');

        $productID = $this->request->getDeleteValue('productID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{


            $resultGetProductImagesPath = ProductImagesPath::GetProductImagePathList($productID);

            $resultDeleteProductImagePath =  ProductImagesPath:: DeleteProductImagePath( $id);

            if ($resultDeleteProductImagePath == true) {

                foreach ($resultGetProductImagesPath as $path) {

                    $imagePath = "E:/Games/wamp64/www$path->productImagePath";

                    unlink($imagePath); // удаление файла по пути path  ???????????   http://localhost:5012
                }

            }//if

            $response['code'] = 200;
            $response['message'] = 'Продукт удален!';
            $response['data'] = array(
                'resultGetProductImagesPath' =>  $resultGetProductImagesPath,
                'resultDeleteProductImagePath ' =>  $resultDeleteProductImagePath ,
                );


        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array( 'id' =>  $id,
                'productID' =>  $productID
            );

        }//catch

        $this->json($response);


    }//removeProduct




    public function updateAttributesProductAction( ){

        $productID = $this->request->getGetValue('productID');

        $product = Product::GetProductById($productID);

        $attributesProduct = ProductAttributes::GetAttributeByProductId($productID);

        $allAttributes = ProductAttributes::GetAttributesList();

        $this->view->product = $product;

        $this->view->attributesProduct =  $attributesProduct;

        $this->view->allAttributes =  $allAttributes;

        return 'updateProductAttributes';

    }// updateProductAction



    public function saveUpdateAttributesProductAction( ){

        $productID = $this->request->getPostValue('productID');

        $attributes = json_decode( $_POST['attributes'] );

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );



        try{


            foreach ( $attributes as $attribute ){
                ProductAndAttributes::AddAttributeToProduct($productID , $attribute->attributeID , $attribute->attributeValue );
            }//foreach



            $response['code'] = 200;
            $response['message'] = 'Атрибуты добавлены успешно!';
            $response['data'] = array(
                'productID' => $productID,
                ' attributes' =>  $attributes,
            );

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productID' => $productID,
                ' attributes' =>  $attributes,

            );

        }//catch

        $this->json( $response );


    }//saveUpdateAttributesProduct



    public function removeProductAttributeAction( ){

        $attributeID = $this->request->getDeleteValue('attributeID');

        $productID = $this->request->getDeleteValue('productID');


        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );


        try{

            $resultGetAllProductAttributes =  ProductAndAttributes::GetAttributesProductByProductID($productID, $attributeID);

            if ( $resultGetAllProductAttributes == true) {

                foreach ($resultGetAllProductAttributes as $attribute) {

                    ProductAndAttributes::DeleteAttributeToProduct($attribute->productandattributesID );

                }// foreach

            }//if

            $response['code'] = 200;
            $response['message'] = 'Атрибут удален успешно!';
            $response['data'] = array(
                'productID' => $productID,
                'resultGetAllProductAttributes' => $resultGetAllProductAttributes,
            );



        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'productID' => $productID,
                'attributeID' =>  $attributeID,
            );

        }//catch

    }//removeProductAttribute



}//ProductController