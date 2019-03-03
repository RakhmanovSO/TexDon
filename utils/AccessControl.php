<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 03.03.2019
 * Time: 12:43
 */

namespace utils;


class AccessControl{

    public function CheckAccess(  ){

        if(!isset($_SESSION['isAdmin'])){
            return false;
        }//if

        return true;

    }

}