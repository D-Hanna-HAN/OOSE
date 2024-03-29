<?php
namespace Api\Model;

class Student extends AbstractModel
{


    //indicates the table for this particular class
    public static string $table_name = "Student";

    //gets all students that are in a particular class
    public static function getByClassId($classId)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        S.id,
        S.firstname,
        S.lastname
    FROM
        student S
    INNER JOIN class_student CS ON
        CS.student_id = S.id
    WHERE
        CS.class_id = :classId";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':classId', $classId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    //gets all info about a student
    public static function getStudentInfo($studentId)
    {
        global $db;
        if (!$db) {
            $config = new \Api\Model\config;
            $db = $config->getDb();
        }
        $query = "SELECT
        S.id,
        S.firstname,
        S.lastname,
        C.name,
        C.id AS 'classId'
    FROM
        student S
    LEFT JOIN class_student CS ON
        CS.student_id = S.id
        LEFT JOIN class C ON 
        C.id = CS.class_id 
    WHERE
        S.id = :studentId";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':studentId', $studentId);
        $stmt->execute();
        return $stmt->fetch();
    }
    //gets all lessons and exams from a student
    public static function getEventsById($studentId)
    {
        global $db;
        $query = "SELECT
        L.id,
            L.name,
            L.description,
            WEEK(DATE_ADD(C.start_date, INTERVAL L.lesson_week WEEK)) AS 'week',
            'lesson' AS 'event_type'
        FROM
            lesson L
        INNER JOIN course C ON
            C.course_template_id = L.course_template_id
        INNER JOIN class_student CS ON
            CS.class_id = C.class_id
        WHERE
            CS.student_id = :student_id
        UNION
        SELECT
        E.id,
            E.name,
            E.description,
            WEEK(e.date) as 'week',
            'exam' AS 'event_type'
        FROM
            exam E
        INNER JOIN course C ON
            E.course_id = C.id
        INNER JOIN class_student CS ON
            CS.class_id = C.class_id
        WHERE
            CS.student_id = :studentId
        ORDER BY week
        ";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':studentId', $studentId);
        $stmt->bindValue(':student_id', $studentId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}