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


}