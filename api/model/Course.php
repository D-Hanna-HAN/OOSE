<?php
namespace Api\Model;
class Course extends AbstractModel{
    
    
    //indicates the table for this particular class
    public static string $table_name = "course";

    //get all the courses with info from course template
    public static function getCourses(){
        
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        C.id,
        CT.name,
        CT.description,
        C.start_date
    FROM
        course C
    INNER JOIN course_template CT ON
        CT.id = C.course_template_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //gets the most recent course added to a particular class
    public static function getCurrentCourseByClassId($classId){
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        C.id,
        CT.name,
        CT.description,
        C.start_date
    FROM
        course C
        INNER JOIN course_template CT ON
        CT.id = C.course_template_id
        WHERE C.class_id = :classId ORDER BY C.start_date DESC";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':classId', $classId);
        $stmt->execute();
        return $stmt->fetch();
    }

    //gets all the courses that are connected to a student
    public static function getCoursesByStudentId($studentId){
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        C.id,
        CT.name,
        CT.description,
        C.start_date
    FROM
        course C
        INNER JOIN course_template CT ON
        CT.id = C.course_template_id
        INNER JOIN class_student CS ON 
        CS.class_id = C.class_id 
        WHERE CS.student_id = :studentId ORDER BY C.start_date DESC";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':studentId', $studentId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}