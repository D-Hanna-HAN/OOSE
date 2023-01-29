<?php
namespace Api\Model;
class LessonLearningpoint extends AbstractModel{
    
    
    //indicates the table for this particular class
    public static string $table_name = "lesson_learningpoint";
    
//deletes all learningpoints that are connected to a lesson
    public static function deleteByLesson($lessonId){
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $table = get_called_class()::$table_name;
        $query = "DELETE FROM " . $table . " WHERE lesson_id= :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $lessonId);
        $stmt->execute();
        return;
    }
}