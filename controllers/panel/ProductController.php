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

    public function attributesListAction(  ){

        $this->view->attributes = ProductAttribute::getAttributesList();

        return 'attributes-list';

    }//attributesListAction

    public function addAttributeAction(  ){
        return 'addAttribute';
    }//addAttributeAction


    //AJAX
    public function addNewAttributeAction(  ){

        $attributeTitle = $this->request->getPostValue('attributeTitle');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try{
            $result = ProductAttribute::addNewAttribute( $attributeTitle );

            $response['code'] = 200;
            $response['message'] = 'Атрибут добавлен!';
            $response['data'] = $result;

        }//try

        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'attributeTitle' => $attributeTitle,
            );

        }//catch

        $this->json( $response );

    }//addNewAttributeAction


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


    public function updateProductAction(  ){

        $productID = $this->request->getGetValue('$productID');

        $product = Product::GetProductById($productID);

        $productImages = ProductImagesPath::GetProductImagePathList($productID);

        $subcategories = Subcategory::GetSubcategoryList();

        $attributes = ProductAttributes::GetAttributesList();


        $this->view->product = $product;

        $this->view->productImages = $productImages;

        $this->view->subcategories = $subcategories;

        $this->view->attributes = $attributes;


        return 'updateProduct';

    }


    public function allProductsAction(  ){

        $productID = $this->request->getGetValue( 'productID' );

        $this->view->products = Product::getProductById(  $productID );

        $this->view->products = Product::GetAllProducts($productID , 10,0);

        return 'allProducts';

    }//allProductsAction

}//ProductController