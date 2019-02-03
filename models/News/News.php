<?php


namespace models\News;

use utils\MySQL;

class News{

    public $newsID;
    public $titleNews;
    public $dateNews;
    public $textNews;
    public $newsTypeID;
    public $imagePath1;
    public $imagePath2;
    public $displayOnTheHomePage;



    public static function GetNewsList ( $limit = 40, $offset = 0 ){

        $stm = MySQL::$db->prepare ("SELECT newsID, titleNews, dateNews, imagePath1 FROM news LIMIT $offset, $limit");


        $stm->execute();

        $news = $stm->fetchAll(\PDO::FETCH_OBJ);

        return  $news;

    }//GetNewsList



    public static function GetNewsById( $newsID) {

        $stm = MySQL::$db->prepare("SELECT * FROM news WHERE newsID = :id");

        $stm->bindParam( ":id" ,  $newsID , \PDO::PARAM_INT);

        $stm->execute();

        $news =  $stm->fetch(\PDO::FETCH_OBJ);


        if( $news === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $news;

    }//GetNewsById



    public static function GetNewsByIdForDisplayOnTheHomePage( $displayOnTheHomePage=1 ) {

        $stm = MySQL::$db->prepare("SELECT n.newsID, n.titleNews, n.dateNews, n.imagePath1, n.newsTypeID, tn.titleNewsType FROM `news` AS `n` INNER JOIN `typesnews` AS `tn` ON n.newsTypeID = tn.newsTypeID WHERE n.displayOnTheHomePage = :displayOnTheHomePage");

        $stm->bindParam( ":displayOnTheHomePage" ,  $displayOnTheHomePage , \PDO::PARAM_INT);

        $stm->execute();

        $news =  $stm->fetchAll(\PDO::FETCH_OBJ);


        if( $news === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $news;

    }//GetNewsById


    public static function AddNewNews( $titleNews, $dateNews, $textNews, $newsTypeID, $imagePath1, $imagePath2, $displayOnTheHomePage) {

        $stm = MySQL::$db->prepare("INSERT INTO `news`(`newsID`, `titleNews`, `dateNews`, `textNews`, `newsTypeID`, `imagePath1`, `imagePath2`, `displayOnTheHomePage`) VALUES (NULL, :title,:dateNews,:text,:newsTypeID,:path1,:path2,:display)");

        $stm->bindParam( ":title" , $titleNews , \PDO::PARAM_STR);

        $stm->bindParam( ":dateNews" , $dateNews , \PDO::PARAM_STR);

        $stm->bindParam( ":text" , $textNews , \PDO::PARAM_STR);

        $stm->bindParam( ":newsTypeID" , $newsTypeID , \PDO::PARAM_INT);

        $stm->bindParam( ":path1" , $imagePath1 , \PDO::PARAM_STR);

        $stm->bindParam( ":path2" , $imagePath2 , \PDO::PARAM_STR);

        $stm->bindParam( ":display" , $displayOnTheHomePage , \PDO::PARAM_INT);


        $news =  $stm->execute();


        if( $news === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $news;


    }//AddNewNews



    public static function UpdateNews( $newsID, $titleNews, $dateNews, $textNews, $newsTypeID, $imagePath1, $imagePath2, $displayOnTheHomePage ) {

        $stm = MySQL::$db->prepare("UPDATE `news` SET `titleNews`= :title, `dateNews`= :dateNews,`textNews`= :text,`newsTypeID`= :newsTypeID,`imagePath1`= :path1, `imagePath2`= :path1,`displayOnTheHomePage`= :display WHERE `newsID`= :id");


        $stm->bindParam( ":id" , $newsID , \PDO::PARAM_INT);

        $stm->bindParam( ":title" , $titleNews , \PDO::PARAM_STR);

        $stm->bindParam( ":dateNews" , $dateNews , \PDO::PARAM_STR);

        $stm->bindParam( ":text" , $textNews , \PDO::PARAM_STR);

        $stm->bindParam( ":newsTypeID" , $newsTypeID , \PDO::PARAM_INT);

        $stm->bindParam( ":path1" , $imagePath1 , \PDO::PARAM_STR);

        $stm->bindParam( ":path2" , $imagePath2 , \PDO::PARAM_STR);

        $stm->bindParam( ":display" , $displayOnTheHomePage , \PDO::PARAM_INT);


        $news =  $stm->execute();


        if( $news === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $news;


    }//UpdateNews


    public static function DeleteNews( $newsID ) {

        $stm = MySQL::$db->prepare("DELETE FROM `news` WHERE `newsID`= :id");

        $stm->bindParam( ":id" , $newsID , \PDO::PARAM_INT);


        $news =  $stm->execute();


        if( $news === false ){
            throw new \Exception(MySQL::$db->errorInfo());
        }//if

        return $news;

    }// DeleteNews




}//News