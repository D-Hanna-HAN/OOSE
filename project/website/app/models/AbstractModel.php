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

    public static function getAll($limit = "", $startIndex = 0)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getAll', ['limit' => $limit, 'startIndex' => $startIndex]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
    
    public static function getById($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getById', ['id' => $id]);
        Return get_called_class()::arrayToClass(\App\Controllers\ApiController::createGetRequest($request), get_called_class());
    }


    public static function getByArray($params)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getByArray', ['params' => [$params]]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }

    public static function create($arr)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'create', $arr);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

    public static function delete($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'delete', ['id' => $id]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }
    public static function update($id, $params)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'update', ['id' => $id, 'params' => [$params]]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

}