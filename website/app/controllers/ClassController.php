<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class ClassController
{
  public static function createClass($name, $schoolyear, $students)
  {
    $classId = \App\Models\SchoolClass::create(['name' => $name, 'start_year' => $schoolyear]); 
    foreach ($students as $student) {
      \App\Models\ClassStudent::create(['class_id' => $classId, 'student_id' => $student]);
    }
    return;
  }

  public static function editClass($name, $description, $learningpoints, $week, $lessonId)
  {

  }


  public static function deleteClass($id)
  {

  }

}