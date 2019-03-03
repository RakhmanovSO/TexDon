<?php

namespace controllers\panel;
use utils\AccessControl;


class HomeController extends BaseController{

    public function indexAction(  ){

        $accessControlUtil = new AccessControl();

        if(!$accessControlUtil->CheckAccess()){
            $this->redirect('/TexDon/?ctrl=Home&act=authorize');
        }

        $this->view->title = "Hello, i'am index action";

        return 'index';

    }//index

    public function authorizeAction(  ){

        return 'authorize';

    }//index

}