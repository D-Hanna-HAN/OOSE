<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class CourseTemplateController
{
    public static function createTemplate($name, $description){
        $id = $_SESSION["authId"];
        
		\App\Models\CourseTemplate::create(['name' => $name, 'description' => $description, "created_by_schooladmin_id" => $id]);
    }
}