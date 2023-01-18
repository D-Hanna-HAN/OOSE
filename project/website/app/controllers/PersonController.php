<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class PersonController
{
    public static function setLogin($id, $type){
			$_SESSION["authId"] = $_GET["id"];
			$_SESSION["authType"] = $_GET["type_login"];
    }

    public static function isLoggedInAs($typeLogin){
        if((isset($_SESSION["authId"]) && isset($_SESSION["authType"])) && (!empty($_SESSION["authId"] && !empty($_SESSION["authType"])) && $_SESSION["authType"] == $typeLogin)){
            return true;
        }
        else{
            return false;
        }
    }
}