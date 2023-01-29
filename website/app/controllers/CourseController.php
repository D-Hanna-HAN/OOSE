<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class CourseController
{
    //validates and creates the course
    public static function createCourse($templateId, $classId, $startDate, $creatorId)
    {
        if (CourseTemplateController::validTemplate($templateId)) {
            $course = \App\Models\Course::create(['course_template_id' => $templateId, 'schooladmin_id' => $creatorId, 'class_id' => $classId, 'start_date' => $startDate]);
            return $course;
        }
        return 0;
    }


}