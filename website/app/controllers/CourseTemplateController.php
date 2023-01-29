<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class CourseTemplateController
{
    //creates a template
    public static function createTemplate($name, $description)
    {
        $id = $_SESSION["authId"];

        return \App\Models\CourseTemplate::create(['name' => $name, 'description' => $description, "created_by_schooladmin_id" => $id]);
    }

    //gets the specified course template
    public static function getCourse($id)
    {
        return \App\Models\CourseTemplate::getById($id);
    }

    //validates a template and return true if its valid and false if its invalid
    public static function validTemplate($templateId)
    {
        $template = \App\Models\CourseTemplate::getById($templateId);
        if ($template) {
            $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $templateId]);

            if (is_array($learningpoints) && !empty($learningpoints)) {
                foreach ($learningpoints as $key => $learningpoint) {
                    $lesPoints = \App\Models\LessonLearningpoint::getByArray(['learningpoint_id' => $learningpoint["id"]]);
                    if ($lesPoints) {
                        unset($learningpoints[$key]);
                    }
                }
                if (empty($learningpoints)) {
                    return true;
                }
            }
        }
        return false;
    }
}