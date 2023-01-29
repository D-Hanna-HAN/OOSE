<?php
namespace App\Models; 
class Student extends Person
{
    //gets all students that are part of a class
    public static function getByClassId($classId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getByClassId', ['classId' =>$classId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }

    //gets all studentinfo of a student
    public static function getStudentInfo($studentId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getStudentInfo', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }


//gets all lessons and exams of a student
    public static function getEventsById($studentId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getEventsById', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
}