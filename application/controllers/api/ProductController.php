<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 03.03.2019
 * Time: 13:17
 */

namespace application\controllers\api;


class ProductController
{

    public function testAction(  ){
        
        echo json_encode([
            'product' => [
                'title' => 'Intel',
                'price' => 500
            ]
        ]);
        exit();

    }

    public function homeAction(  ){

        echo "<h2>Home!</h2>";
        exit();

    }
    
}