<?php


namespace models\Product;


use utils\MySQL;

class Product{

    public $productID;
    public $productTitle;
    public $productDescription;
    public $productPrice;
    public $brandProduct;



    public  function __construct($productID, $productTitle,  $productPrice, $brandProduct) {

        $this->productID = $productID;
        $this->productTitle = $productTitle;
        $this->productPrice = $productPrice;
        $this->brandProduct = $brandProduct;

    }// __construct




    public static function GetProductList ( $limit = 50, $offset = 0 ){

        $stm = MySQL::$db->prepare ("SELECT * FROM products LIMIT $offset, $limit");


        $stm->execute();

        $products = $stm->fetchAll(\PDO::FETCH_OBJ);

        return  $products;

    }//GetProductList



    public static function GetProductById( $productID) {

        $stm = MySQL::$db->prepare("SELECT * FROM products WHERE productID = :id");

        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);

        $stm->execute();

        $product =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//GetProductById


    public static function GetProductBySubcategoryId( $subcategoryID,  $limit = 50, $offset = 0) {

        $stm = MySQL::$db->prepare("SELECT subpr.subcategoryandproductID, sc.subcategoryID, sc.subcategoryTitle, p.productID, p.productTitle, p.productPrice, p.brandProduct 
                                        FROM `subcategoriesandproducts` AS `subpr` 
                                        INNER JOIN `subcategories` AS `sc` ON subpr.subcategoryID = sc.subcategoryID 
                                        INNER JOIN `products` AS `p` ON subpr.productID = p.productID 
                                        WHERE sc.subcategoryID = :id LIMIT $offset, $limit");

        $stm->bindParam( ":id" ,  $subcategoryID, \PDO::PARAM_INT);

        $stm->execute();

        $product = $stm->fetchAll(\PDO::FETCH_OBJ);


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//GetProductById






    public static function AddNewProduct($productTitle, $productDescription, $productPrice, $brandProduct) {


        $stm = MySQL::$db->prepare("INSERT INTO `products`(`productID`, `productTitle`, `productDescription`,  `productPrice`, `brandProduct`) VALUES (NULL, :title, :description, :price, :brand)");

        $stm->bindParam( ":title" ,  $productTitle, \PDO::PARAM_STR);

        $stm->bindParam( ":description" ,  $productDescription, \PDO::PARAM_STR);

        $stm->bindParam( ":price" , $productPrice, \PDO::PARAM_STR);

        $stm->bindParam( ":brand" ,  $brandProduct, \PDO::PARAM_STR);

        $product = $stm->execute();


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//AddNewProduct



    public static function UpdateProduct($productID, $productTitle, $productDescription, $productPrice, $brandProduct) {


        $stm = MySQL::$db->prepare("UPDATE `products` SET `productTitle`= :title,`productDescription`= :description,`productPrice`= :price, `brandProduct`= :brand WHERE productID = :id");

        $stm->bindParam( ":id" ,  $productID, \PDO::PARAM_INT);

        $stm->bindParam( ":title" ,  $productTitle, \PDO::PARAM_STR);

        $stm->bindParam( ":description" ,  $productDescription, \PDO::PARAM_STR);

        $stm->bindParam( ":price" , $productPrice, \PDO::PARAM_STR);

        $stm->bindParam( ":brand" ,  $brandProduct, \PDO::PARAM_STR);


        $product = $stm->execute();


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//UpdateProduct




    public static function DeleteProduct($productID){

        $stm = MySQL::$db->prepare("DELETE FROM `products` WHERE productID = :id");

        $stm->bindParam(':id', $productID, \PDO::PARAM_INT);

        $result = $stm->execute();


        if( $result === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return  $result;

    }//DeleteProduct






}//Product