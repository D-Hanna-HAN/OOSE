<?php

namespace App\Controllers;

class ApiController
{
    private static $url = "http://localhost/schoolwebsites/OOSE/api/";

    //creates a valid array to be send with the post or get request that contains the class function name and any additional parameters
    public static function formatRequest(string $class, string $functionName, $params = [])
    {
        $content = [
            'class' => $class,
            'function' => $functionName,
            'params' => $params
        ];
        return $content;
    }

    //creates a get request to the api, return type can be either array or object
    public static function createGetRequest($request, $returnType = "array")
    {
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'GET'
            )
        );
        $context = stream_context_create($options);
        $resp = file_get_contents(apiController::$url . "?" . http_build_query($request), false, $context);
        // echo $resp;  
        if ($returnType == "array") {
            return json_decode($resp, true);

        } else {
            $obj = $returnType::arrayToClass(json_decode($resp, true), $returnType);
            return $obj;
        }
    }

    //creates a post request to the api, return type can be either array or object 
    public static function createPostRequest($request, $returnType = "array")
    {
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($request)
            )
        );
        $context = stream_context_create($options);
        $resp = file_get_contents(apiController::$url, false, $context);
        if ($returnType == "array") {
            return json_decode($resp, true);

        } else {
            $obj = $returnType::arrayToClass(json_decode($resp, true), $returnType);
            return $obj;
        }
    }
}