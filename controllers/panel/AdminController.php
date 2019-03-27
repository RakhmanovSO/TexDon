<?php

namespace controllers\panel;

use models\Admin\Admin;

use utils\MySQL;


class AdminController extends BaseController {


    public function adminListAction(){

        $admins = Admin :: GetAllUsers(50,0);

        $this->view->admins = $admins;

        return 'admin-list';

    }//productsListAction



    public function addNewAdminAction(){

        return 'addNewAdmin';


    }//addNewAdmin


    public function saveNewAdminAction(){

        $login = $this->request->getPostValue('login');
        $password = $this->request->getPostValue('password');

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );


        try{

            Admin::AddNewUser($login, $password);

            $response['code'] = 200;
            $response['message'] = 'Администратор добавлен успешно!';

        }//try
        catch( \Exception $ex ){

            $response['code'] = 500;
            $response['message'] = $ex->getMessage();
            $response['data'] = array(
                'login' =>  $login,
            );

        }//catch

        $this->json( $response );


    }//addNewAdmin


    public function deleteAdminAction(){

        $adminID = $this->request->getGetValue('adminID');

        $admin = Admin::GetAdminByAdminID($adminID);

        $this->view->admin = $admin;

        return 'deleteAdmin';

    }//addNewAdmin


    public function saveDeleteAdminAction(){

        $adminID = $this->request->getPostValue('adminID');
        $password = $this->request->getPostValue('password');

        $response = array(
            'code' => -1,
            'message' => '',
            'data' => ''
        );

        try {
            $admin = Admin::GetAdminByAdminID($adminID);

            $hash = $admin->password;

            if (password_verify($password, $hash)) {

                $result = Admin::DeleteAdmin($adminID);

                    if ( $result == true){

                        $response['code'] = 200;
                        $response['message'] = "Администратор удален успешно !";
                        $response['data'] = array(
                            'adminID' => $adminID,
                            'Verification was successful' => "Администратор удален успешно!"
                        );

                    }//if
                    else{
                        $response['code'] = 401;
                        $response['message'] = "Администратора не удалось удалить ! (Verification password was successful)";
                        $response['data'] = array(
                            'adminID' => $adminID,
                            'Verification password was successful' => "Администратор не удален что-то пошло не так!"
                        );

                    }//else

            }
            else {

                $response['code'] = 401;
                $response['message'] = "Введен неверный пароль ! (Verification password - fail)";
                $response['data'] = array(
                    'adminID' => $adminID,
                    'password' => $password,
                    );
            }//else
        }//try
        catch( \Exception $ex ){

                $response['code'] = 400;
                $response['message'] = $ex->getMessage();
                $response['data'] = array(
                    'adminID' => $adminID,
                    'password' => $password,
                    'admin' => $admin, );
            }//catch

        $this->json($response);

    }//saveDeleteAdminAction



    public function getCurrentUser(){

        $user = null;

        if( isset($_SESSION[ 'session_user' ])){

            $user = unserialize($_SESSION[ 'session_user' ]);
            $user['session'] = 'yes';

        }//if
        else if(isset($_COOKIE[ 'cookie_user' ])){

            $user = unserialize($_COOKIE[ 'cookie_user' ]);

        }//else if
        else if( isset($_SESSION['admin'])){

            $user = unserialize($_SESSION[ 'admin' ]);

        }//else if
        else if( isset($_COOKIE['admin']) ){
            $user = unserialize($_COOKIE[ 'admin' ]);
        }//else if

        return $user;

    }//getCurrentUser


}//AdminController