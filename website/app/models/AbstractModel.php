<?php

namespace App\Models;

class AbstractModel
{
    //converts an array to a particular class :: does not work anymore needs to be fixed
    public static function arrayToClass($data, $class)
    {
        foreach (get_object_vars($obj = new $class) as $property => $default) {
            if (array_key_exists($property, $data)) {
                $obj->{$property} = $data[$property];
            }
        }
        return $obj;
    }

    //gets all rows of a class
    public static function getAll($limit = "null", $startIndex = 0)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getAll', ['limit' => $limit, 'startIndex' => $startIndex]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
    
    //gets a particular row by its id
    public static function getById($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getById', ['id' => $id]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }


    //gets mulitple rows depending on $params specification, $params used as $key => $value where $key is column name and $value the value
    public static function getByArray($params)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getByArray', ['params' => $params]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }


    //creates a new row for the specified model
    public static function create($arr)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'create', ['arr' => $arr]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

    //deletes a row depending on the id 
    public static function delete($id)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'delete', ['id' => $id]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

    //updates an existing row depending on the $id, $arr specifies the new value where the key is the column name
    public static function update($id, $arr)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'update', ['id' => $id, 'arr' => $arr]);
        Return \App\Controllers\ApiController::createPostRequest($request);
    }

}