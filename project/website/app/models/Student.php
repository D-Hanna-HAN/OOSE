<?php
namespace App\Models; 
class Student extends Person
{
    public static function getByClassId($classId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getByClassId', ['classId' =>$classId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
    public static function getStudentInfo($studentId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getStudentInfo', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }

    public static function getEventsById($studentId){
        
        $request = \App\Controllers\ApiController::formatRequest('Student', 'getEventsById', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
}