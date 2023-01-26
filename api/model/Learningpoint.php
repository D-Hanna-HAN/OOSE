<?php
namespace Api\Model;

class Learningpoint extends AbstractModel
{


    public static string $table_name = "learningpoint";


    public static function getLessonLearningpoints($lessonId)
    {
        global $db;
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