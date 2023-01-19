<?php

namespace App\Models;

class AbstractModel
{
    public static function arrayToClass($data, $class)
    {
        foreach (get_object_vars($obj = new $class) as $property => $default) {
            if (array_key_exists($property, $data)) {
                $obj->{$property} = $data[$property];
            }
        }
        return $obj;
    }

    public static function getAll($limit = "null", $startIndex = 0)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getAll', ['limit' => $limit, 'startIndex' => $startIndex]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
    
    public static function getById($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getById', ['id' => $id]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }


    public static function getByArray($params)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getByArray', ['params' => $params]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }

    public static function create($arr)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'create', ['arr' => $arr]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

    public static function delete($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'delete', ['id' => $id]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }
    public static function update($id, $arr)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'update', ['id' => $id, 'arr' => $arr]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

}