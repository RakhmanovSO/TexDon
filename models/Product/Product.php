<?php


namespace models\Product;


use utils\MySQL;

class Product{

    public $productID;
    public $productTitle;
    public $productDescription;
    public $productPrice;




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

        $stm = MySQL::$db->prepare("SELECT * FROM `subcategoriesandproducts` AS `subpr` 
                        INNER JOIN `subcategories` AS `sc` ON subpr.subcategoryID = sc.subcategoryID 
                        INNER JOIN `products` AS `p` ON subpr.productID = p.productID 
                        WHERE sc.subcategoryID = :id LIMIT $offset, $limit");

        $stm->bindParam( ":id" ,  $subcategoryID, \PDO::PARAM_INT);

        $stm->execute();

        $product =  $stm->fetchAll(\PDO::FETCH_OBJ);


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//GetProductById



    public static function AddNewProduct($productTitle, $productDescription, $productPrice) {


        $stm = MySQL::$db->prepare("INSERT INTO `products`(`productID`, `productTitle`, `productDescription`, `productPrice`) VALUES (NULL, :title, :description, :price)");

        $stm->bindParam( ":title" ,  $productTitle, \PDO::PARAM_STR);

        $stm->bindParam( ":description" ,  $productDescription, \PDO::PARAM_STR);

        $stm->bindParam( ":price" , $productPrice, \PDO::PARAM_STR);

        $stm->execute();

        $product =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $product === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $product;

    }//GetProductById



}//Product