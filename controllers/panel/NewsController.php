<?php

namespace controllers\panel;

use models\News\News;

use models\News\TypeNews;


class NewsController extends BaseController{

    public function newsListAction(  ){

        $this->view->news = News::GetNewsList(30,0);

        return 'news-list';

    }//NewsList


    public function addNewNewsAction(){

        $this->view->typesNews = TypeNews::GetNewsTypeList();

        return 'AddNewNews';

    }// addNewNews



    public function addNewsAction(){

        $title = $this->request->getPostValue('titleNews');

        $textN = $this->request->getPostValue('textNews');

        $newsTypeID = $this->request->getPostValue('newsTypeID');

        $displayOnTheHomePage = $this->request->getPostValue('displayOnTheHomePage');

        $dateNews = date ('Y-m-d');



        $titleNews = trim($title);

        $textNews = trim($textN);


///////////////////////////////////  image 1

        $name1 = $_FILES['imagePath1']['name'];

        if ($name1 == null){

            $imagePath1 = $this->request->getPostValue('imagePath1');

            if($imagePath1 === null || $imagePath1 === NULL || $imagePath1 === "null" || $imagePath1 === "NULL"){

                $imagePath1 = NULL;

            }//if

        }
        else {

            $newsImagePath1 = "E:/Games/wamp64/www/TexDon/assets/images/news";

            $imagePath1 = "/TexDon/assets/images/news/$name1";

            if(!file_exists($newsImagePath1)){

                mkdir($newsImagePath1);

            }//if


            $newsImagePath1 .= "/$name1";

            $resultUploadedFile1 = move_uploaded_file($_FILES['imagePath1']['tmp_name'], $newsImagePath1);

        }
//////////////////////////////////// image 2

        $imagePath2 = NULL;
        $resultUploadedFile2 = NULL;

        if (isset($_FILES['imagePath2'])) {

            $name2 = $_FILES['imagePath2']['name'];

            if ($name2 === null){

                $imagePath2 = $this->request->getPostValue('imagePath2');

                if($imagePath2 === null || $imagePath2 === NULL || $imagePath2 === "null" || $imagePath2 === "NULL"){

                    $imagePath2 = NULL;

                }//if

            }
            else {

                $newsImagePath2 = "E:/Games/wamp64/www/TexDon/assets/images/news";

                $imagePath2 = "/TexDon/assets/images/news/$name2";

                if(!file_exists($newsImagePath2)){

                    mkdir($newsImagePath2);

                }//if

                $newsImagePath2 .= "/$name2";

                $resultUploadedFile2 = move_uploaded_file($_FILES['imagePath2']['tmp_name'], $newsImagePath2);
            }


        }// if


////////////////////////////////////  result

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try{


        $result = News::AddNewNews($titleNews, $dateNews, $textNews, $newsTypeID, $imagePath1, $imagePath2, $displayOnTheHomePage);

            $response['code'] = 200;
            $response['message'] = 'Новость добавлена успешно!';
            $response['data'] = array('result' => $result, 'resultUploadedFile1' => $resultUploadedFile1 , 'resultUploadedFile2' => $resultUploadedFile2);
        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'resultUploadedFile1' => $resultUploadedFile1,
                'resultUploadedFile2' => $resultUploadedFile2,
                'titleNews' =>  $titleNews,
                'imagePath1' => $imagePath1
            );

        }//catch

        $this->json( $response );


    }//addNews



    public function updateNewsAction(){

        $newsID = $this->request->getGetValue('newsID');

        $this->view->news = News::GetNewsById( $newsID );

        $this->view->typesNews = TypeNews::GetNewsTypeList();

        return 'updateNews';
    }//updateNews


    public function saveUpdateNewsAction(){

        $newsID = $this->request->getPostValue('newsID');

        $title = $this->request->getPostValue('titleNews');

        $textN = $this->request->getPostValue('textNews');

        $newsTypeID = $this->request->getPostValue('newsTypeID');

        $displayOnTheHomePage = $this->request->getPostValue('displayOnTheHomePage');

        $dateNews = date ('Y-m-d');


        $titleNews = trim($title);

        $textNews = trim($textN);


///////////////////////////////////  image 1

        if (isset($_FILES['imagePath1'])) {


            $name1 = $_FILES['imagePath1']['name'];

            if ($name1 == null) {

                $imagePath1 = $this->request->getPostValue('imagePath1');

                if ($imagePath1 === null || $imagePath1 === NULL || $imagePath1 === "null" || $imagePath1 === "NULL") {

                    $imagePath1 = NULL;

                }//if

            } else {

                $newsImagePath1 = "E:/Games/wamp64/www/TexDon/assets/images/news";

                $imagePath1 = "/TexDon/assets/images/news/$name1";

                if (!file_exists($newsImagePath1)) {

                    mkdir($newsImagePath1);

                }//if


                $newsImagePath1 .= "/$name1";

                $resultUploadedFile1 = move_uploaded_file($_FILES['imagePath1']['tmp_name'], $newsImagePath1);

            }


        }//if

        if (!isset($_FILES['imagePath1'])) {

            $imagePath1 = $this->request->getPostValue('imagePath1');

            $newsImagePath1 = "E:/Games/wamp64/www/TexDon/assets/images/news";

            $resultUploadedFile1 = move_uploaded_file($imagePath1,  $newsImagePath1);

        }//

//////////////////////////////////// image 2

        $imagePath2 = NULL;
        $resultUploadedFile2 = NULL;

        if (isset($_FILES['imagePath2'])) {

            $name2 = $_FILES['imagePath2']['name'];

            if ($name2 == null){

                $imagePath2 = $this->request->getPostValue('imagePath2');

                if($imagePath2 === null || $imagePath2 === NULL || $imagePath2 === "null" || $imagePath2 === "NULL"){

                    $imagePath2 = NULL;

                }//if

            }
            else {

                $newsImagePath2 = "E:/Games/wamp64/www/TexDon/assets/images/news";

                $imagePath2 = "/TexDon/assets/images/news/$name2";

                if(!file_exists($newsImagePath2)){

                    mkdir($newsImagePath2);

                }//if

                $newsImagePath2 .= "/$name2";

                $resultUploadedFile2 = move_uploaded_file($_FILES['imagePath2']['tmp_name'], $newsImagePath2);
            }


        }// if


        if (!isset($_FILES['imagePath2'])) {

            $imagePath2 = $this->request->getPostValue('imagePath2');

            $newsImagePath1 = "E:/Games/wamp64/www/TexDon/assets/images/news";

            $resultUploadedFile2 = move_uploaded_file($imagePath2,  $newsImagePath1);

        }//



////////////////////////////////////  result

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );


        try{


            $result = News::UpdateNews($newsID, $titleNews, $dateNews, $textNews, $newsTypeID, $imagePath1, $imagePath2, $displayOnTheHomePage);

            $response['code'] = 200;
            $response['message'] = 'Новость обновлена успешно!';
            $response['data'] = array('result' => $result, 'resultUploadedFile1' => $resultUploadedFile1 , 'resultUploadedFile2' => $resultUploadedFile2);
        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(

                'resultUploadedFile1' => $resultUploadedFile1,
                'resultUploadedFile2' => $resultUploadedFile2,
                'titleNews' =>  $titleNews,
                'imagePath1' => $imagePath1,
                'imagePath2' => $imagePath2
            );

        }//catch

        $this->json( $response );


    }//saveUpdateNews


    public function removeNewsAction(){

        $newsID = $this->request->getDeleteValue('newsID');

        $response = array(
            'code' => '' , 'data' => '' , 'message' => ''
        );

        try {

            $path = News::GetNewsById($newsID);


            if ($path->imagePath2 === null) {

                $imagePath1 = "E:/Games/wamp64/www$path->imagePath1";
                unlink($imagePath1); // удаление файла по пути

            } //if
            else if ($path->imagePath1 === null){
                $imagePath2 = "E:/Games/wamp64/www$path->imagePath2";
                unlink($imagePath2); // удаление файла по пути
            }
            else if ($path->imagePath1 === null && $path->imagePath2 === null){

            }
            else {

                $imagePath1 = "E:/Games/wamp64/www$path->imagePath1";
                unlink($imagePath1); // удаление файла по пути

                $imagePath2 = "E:/Games/wamp64/www$path->imagePath2";
                unlink($imagePath2); // удаление файла по пути

            }// else


            $result = News::DeleteNews($newsID);


            $response['code'] = 200;
            $response['message'] = 'Новость удалена успешно!';
            $response['data'] = $result;

        }//try
        catch( \Exception $ex ){

            $response['code'] = 400;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'newsID' => $newsID );

        }//catch

        $this->json($response);


    }//removeNews




}// NewsController