<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 03.03.2019
 * Time: 13:23
 */

namespace application;
use Bramus\Router\Router;

class Application{
    
    public function start(  ){

        $router = new Router();

        $router->setNamespace('application\\controllers\\api');

        $routes = require_once 'panel-routes.php';

        $router->before('GET|POST|PUT|DELETE', 'public/panel' ,function (  ){

            if( $_SESSION['isAdmin'] ){

            }

        });

        foreach ($routes as $method => $params) {

            $router->$method($params['path'] ,$params['action'] );

        }//foreach

//        $router->get('/' , 'ProductController@testAction');
//        $router->get('/home' , 'ProductController@homeAction');

        $router->run();
        
    }

}