<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;
class StudentController
{
    public static function showAllStudents(){
        $api = new ApiController;
        $request = ApiController::formatRequest('Student', 'getAll');
        Return $api->createPostRequest($request);
    }
    public static function findById($id){
        $api = new ApiController;
        $request = ApiController::formatRequest('Student', 'getById', ['id' => $id]);
        Return $api->createPostRequest($request);
    }
}