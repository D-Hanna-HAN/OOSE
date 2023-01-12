<?php

namespace App\Controllers;
class ApiController
{
    private static $url = "http://localhost/schoolwebsites/OOSE/api/";

    public static function formatRequest(string $class, string $functionName, array $params = []){
        $content = [
            'class' => $class,
            'function' => $functionName,
            'params' => $params
        ];
        return $content;
    }

    public static function createGetRequest($request)
    {
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'GET',
                'content' => http_build_query($request)
            )
        );
        $context = stream_context_create($options);
        $resp = file_get_contents(apiController::$url, false, $context);
        return json_decode($resp);
    }

    public static function createPostRequest($request)
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
        return json_decode($resp);
    }

}