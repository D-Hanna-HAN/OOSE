<?php

namespace Api\Model;

abstract class AbstractModel
{
    //this function gets all rows of a given class, $limit parameter restricts the amount of rows in the output, $startIndex parameter indicates how many rows to skip before getting rows
    public static function getAll($limit = null, $startIndex = 0)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }

        $table = get_called_class()::$table_name;
        $limitQuery = "";
        if (!empty($limit) && $limit != "null") {
            $limitQuery = " LIMIT :startIndex, :limit";
        }
        $query = "SELECT * FROM " . $table . $limitQuery;
        $stmt = $db->prepare($query);
        if (!empty($limit) && $limit != "null") {
            $stmt->bindParam(":startIndex", $startIndex);
            $stmt->bindParam(":limit", $limit);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    //gets a row from the database from a given class, $id parameter indicates which row
    public static function getById($id)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $table = get_called_class()::$table_name;
        $query = "SELECT * FROM " . $table . " WHERE id= :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //getByArray gets rows from the database for a given class, $params is used as $key => $value where $key is the column name and value the search parameter
    public static function getByArray($params)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
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
        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    //create function creates a row in the database, $arr is used as $key => value where $key is the column name and value the inserted value
    public static function create($arr)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
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
        return $db->lastInsertId();
    }


    //delete function deletes a row from the database, $id indicates the row that needs to be deleted
    public static function delete($id)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $table = get_called_class()::$table_name;
        $query = "DELETE FROM " . $table . " WHERE id= :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(get_called_class());
    }


    //update function updates a row in the database,$id indicates the row that needs to be updated, $arr is used as $key => value where $key is the column name and value the updated value
    public static function update($id, $arr)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }

        $table = get_called_class()::$table_name;
        $values = "";
        $keys = "";
        foreach ($arr as $key => $value) {
            $comma = ", ";

            if ($key === array_key_last($arr)) {
                $comma = "";
            }
            $values .= $key . " = :" . $key . $comma;
        }
        $query = " UPDATE " . $table . " SET " . $values . " WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        foreach ($arr as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchObject(get_called_class());
    }
}