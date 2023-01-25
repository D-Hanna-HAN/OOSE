<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class LearningpointController
{
    public static function createLearningpoint($name, $description, $templateId){
        
		return \App\Models\Learningpoint::create(['name' => $name, 'description' => $description, 'course_template_id' => $templateId]);
    }
    public static function deleteLearningpoint($id){
        
		return \App\Models\Learningpoint::Delete($id);
    }

}