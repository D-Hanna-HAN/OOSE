<?php

abstract class AbstractModel
{
    public static function getAll($limit = null, $startIndex = 0)
    {
        global $db;

        $table = get_called_class()::$table_name;
        $limitQuery = "";
        if (!empty($limit)) {
            $limitQuery = " LIMIT :startIndex, :limit";
        }
        $query = "SELECT * FROM " . $table . $limitQuery;
        $stmt = $db->prepare($query);
        if (!empty($limit)) {
            $stmt->bindParam(":startIndex", $startIndex);
            $stmt->bindParam(":limit", $limit);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
    
    public static function getById($id)
    {
        global $db;
        $table = get_called_class()::$table_name;
        $query = "SELECT * FROM " . $table . " WHERE id= :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(get_called_class());
    }


    public static function getByArray($params, $returnType = "object")
    {
        global $db;
        $table = get_called_class()::$table_name;
        $whereStmt = "";
        foreach ($params as $key => $value) {
            $whereStmt .= " AND " . $key . " = :" . $key;
        }
        $query = "SELECT * FROM " . $table . " WHERE id > 0 " . $whereStmt;
        $stmt = $db->prepare($query);
        $parameters = array();
        foreach ($params as $key => $value) {
            // echo ":" . $key ." " . $value;
            // $stmt->bindParam(":" . $key, $value);
            $parameters[":" . $key] = $value;
        }
        $stmt->execute($parameters);
        if ($returnType == "all") {
            return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } else {
            return $stmt->fetchObject(get_called_class());
        }
    }

    public static function create($arr)
    {
        global $db;

        $table = get_called_class()::$table_name;
        $values = "";
        $keys = "";
        foreach ($arr as $key => $value) {
            $comma = ", ";

            if ($key === array_key_last($arr)) {
                $comma = "";
            }
            $values .= ":" . $key . $comma;
            $keys .= $key . $comma;
        }
        $query = " INSERT INTO " . $table . " (" . $keys . ") VALUES (" . $values . ")";
        $stmt = $db->prepare($query);
        foreach ($arr as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchObject(get_called_class());
    }
}
