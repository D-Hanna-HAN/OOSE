<?php
namespace Api\Model;
class LessonLearningpoint extends AbstractModel{
    
    
    public static string $table_name = "lesson_learningpoint";

    public static function deleteByLesson($lessonId){
        global $db;
        $table = get_called_class()::$table_name;
        $query = "DELETE FROM " . $table . " WHERE lesson_id= :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $lessonId);
        $stmt->execute();
        return;
    }
}