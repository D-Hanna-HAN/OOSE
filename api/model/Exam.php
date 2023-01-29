<?php
namespace Api\Model;
class Exam extends AbstractModel{
    
    
    //indicates the table for this particular class
    public static string $table_name = "exam";

    //gets all exams and the registerd grades of a student
    public static function getExamsAndGrades($studentId){
        global $db;
        if(!$db){
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        E.id,
        E.name,
        E.description,
        E.date,
        g.id AS 'gradeId',
        G.grade
    FROM
        exam E
    LEFT JOIN grade G ON G.exam_id = E.id
    INNER JOIN course C ON C.id = E.course_id
    INNER JOIN class CL ON CL.id = C.class_id
    INNER JOIN class_student CS ON CS.class_id = CL.id
    WHERE CS.student_id = :studentId";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':studentId', $studentId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}