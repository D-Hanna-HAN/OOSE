<?php
namespace Api\Model;

class Learningpoint extends AbstractModel
{


    //indicates the table for this particular class
    public static string $table_name = "learningpoint";

//get all learningpoints that are connected to a lesson
    public static function getLessonLearningpoints($lessonId)
    {
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        L.name,
        L.description
        FROM
        Learningpoint L
        INNER JOIN lesson_learningpoint LL ON
        LL.learningpoint_id = L.id
        WHERE LL.lesson_id = :lessonId 
        ";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':lessonId', $lessonId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}