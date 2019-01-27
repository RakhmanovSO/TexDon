<?php

namespace controllers\panel;


class HomeController extends BaseController{

    public function indexAction(  ){

        $this->view->title = "Hello, i'am index action";

        return 'index';

    }//index

}