<?php

namespace controllers\api;

use models\News\News;
use controllers\panel\BaseController;

class NewsApiController extends BaseController{


    public function GetNewsListAction(){

        // http://localhost:5012/TexDon/index.php?ctrl=NewsApi&act=GetNewsList

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => 0

        );

        $news = News::GetNewsByIdForDisplayOnTheHomePage();

        $response['code'] = 200;

        $response['data'] = $news;

        $this->json( $response );

    }//GetNewsListAction



    public function GetNewsListForTheSectionNewsAction(){

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => 0

        );

        $news = News::GetNewsList();

        $response['code'] = 200;

        $response['data'] = $news;

        $this->json( $response );

    }//GetNewsListForTheSectionNews



    public function GetNewsByIdAction(){

        $newsID = $this->request->getGetValue('newsID');

        $response = array(

            'code' => 0,

            'message' => 0,

            'data' => 0

        );

        $news = News::GetNewsById($newsID);

        $response['code'] = 200;

        $response['data'] = $news;

        $this->json( $response );

    }//GetNewsListAction





}//ProductApiController