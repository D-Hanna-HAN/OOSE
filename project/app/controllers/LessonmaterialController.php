<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class LessonMaterialController
{

    public static function uploadFileAction(RouteCollection $routes, $lessonId)
    {
        var_dump($_FILES);
        $file = basename($_FILES["upload_file"]["name"]);
        $file_loc = $_FILES['upload_file']['tmp_name'];
        $file_size = $_FILES['upload_file']['size'];
        $file_type = $_FILES['upload_file']['type'];

        if (move_uploaded_file($file_loc, \App\Models\LessonMaterial::$target_dir . $file)) {
            \App\Models\LessonMaterial::create(['file_name' =>$file, 'lesson_id' => $lessonId]);
            $page = new PageController;
            $page->redirect($routes, 'EditLesson', $lessonId);
        } else {
        }
        return;
    }

}