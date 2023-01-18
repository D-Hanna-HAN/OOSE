<?php

namespace App\Controllers;

class ApiController
{
    private static $url = "http://localhost/schoolwebsites/OOSE/api/";

    public static function formatRequest(string $class, string $functionName, $params = [])
    {
        $content = [
            'class' => $class,
            'function' => $functionName,
            'params' => $params
        ];
        return $content;
    }

    //return type can be either json or class of the object that needs to be returned
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
        if ($returnType == "array") {
            return json_decode($resp,true);

        }else{
            $obj = $returnType::arrayToClass(json_decode($resp, true), $returnType);
            return $obj;
        }
    }

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
            return json_decode($resp,true);

        }else{
            $obj = $returnType::arrayToClass(json_decode($resp, true), $returnType);
            return $obj;
        }
    }

}