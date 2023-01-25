<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class LessonMaterialController
{

    public static function uploadFileAction(RouteCollection $routes, $lessonId)
    {
        $file = basename($_FILES["upload_file"]["name"]);
        $file_loc = $_FILES['upload_file']['tmp_name'];

        if (move_uploaded_file($file_loc, \App\Models\LessonMaterial::$target_dir . $file)) {
            \App\Models\LessonMaterial::create(['file_name' => $file, 'lesson_id' => $lessonId]);
            $page = new PageController;
            $page->redirect($routes, 'EditLesson', $lessonId);
        } else {
        }
        return;
    }

    public static function downloadFileAction(routeCollection $routes, $lessonId, $filename, $convert = false)
    {
        $filename = \App\Models\LessonMaterial::$target_dir . $filename;
        if (file_exists($filename)) {
            if ($convert != "false") {
                $fileClass = new FileController($filename, $convert);
                $filename = $fileClass->getFilename();
            }
            header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
            header('Content-Length: ' . filesize($filename));

            readfile($filename);


        }
    }

}