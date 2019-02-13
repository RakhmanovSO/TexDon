<?php


namespace models\Search;


use utils\MySQL;

class Search{

    public $searchText;



    public  function __construct($searchText) {

        $this->searchText = $searchText;

    }// __construct




    public static function SearchProduct ( $searchText, $limit = 50, $offset = 0 ){

        $stm = MySQL::$db->prepare ("SELECT * FROM `products`AS pr WHERE `productTitle` LIKE '%$searchText%' LIMIT  $offset, $limit");

        $stm->bindParam( ":title" ,  $searchText, \PDO::PARAM_STR);

        $stm->execute();

        $products = $stm->fetchAll(\PDO::FETCH_OBJ);

        return  $products;

    }//SearchProduct

}//Search