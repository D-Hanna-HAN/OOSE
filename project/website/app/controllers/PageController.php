<?php

namespace App\Controllers;

use App\Models\SchoolClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Annotation\Route;

class PageController
{
    public function indexAction(RouteCollection $routes)
    {
        if (isset($_GET["type_login"])) {
            PersonController::setLogin($_GET["id"], $_GET["type_login"]);
        }
        $students = \App\Models\Student::getAll();
        $schooladmins = \App\Models\schooladmin::getAll();
        require_once APP_ROOT . '\views\Login.php';
    }

    public function studentDashboardAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('student')) {
            $student = \App\Models\Student::getById($_SESSION["authId"]);

            require_once APP_ROOT . '\views\StudentDashboard.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function adminDashboardAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $admin = \App\Models\Schooladmin::getById($_SESSION["authId"]);

            require_once APP_ROOT . '\views\AdminDashboard.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseTemplateCreateAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {

            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description')) {
                CourseTemplateController::createTemplate($request->request->get('name'), $request->request->get('description'));
            }
            require_once APP_ROOT . '\views\CreateCourseTemplate.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseTemplateEditAction(RouteCollection $routes, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description')) {
                \App\Models\CourseTemplate::update($id, ["name" => $request->request->get('name'), "description" => $request->request->get('description')]);
            }
            $courseTemplate = CourseTemplateController::getCourse($id);
            $lessons = \App\Models\Lesson::getByArray(['course_template_id' => $id]);
            $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $id]);
            require_once APP_ROOT . '\views\EditCourseTemplate.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseTemplateDeleteAction(RouteCollection $routes, $id)
    {
        // if (PersonController::isLoggedInAs('admin')) {
        //     $request = Request::createFromGlobals();
        //     if ($request->request->get('name') && $request->request->get('description')) {
        //         \App\Models\CourseTemplate::update($id, ["name" =>$request->request->get('name'), "description" => $request->request->get('description')]);
        //     }
        //     $courseTemplate = CourseTemplateController::getCourse($id);
        //     $lessons = \App\Models\Lesson::getByArray(['course_template_id' => $id]);
        //     $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $id]);
        //     require_once APP_ROOT . '\views\EditCourseTemplate.php';
        // } else {
        //     $this->redirect($routes, 'Homepage');
        // }
    }

    public function courseListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $templateCourses = \App\Models\CourseTemplate::getAll();
            $courses = \App\Models\Course::getAll();
            require_once APP_ROOT . '\views\CourseList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function lessonCreateAction(RouteCollection $routes, $templateId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description') && is_array($request->request->all()["learningpoints"]) && $request->request->get('week')) {
                LessonController::createLesson($request->request->get('name'), $request->request->get('description'), $request->request->all()["learningpoints"], $request->request->get('week'), $templateId);
                $this->redirect($routes, 'EditCourseTemplate', $templateId);
            }
            $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $templateId]);

            require_once APP_ROOT . '\views\CreateLesson.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }


    public function LessonDeleteAction(RouteCollection $routes, $templateId, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            LessonController::deleteLesson($id);
            $this->redirect($routes, 'EditCourseTemplate', $templateId);
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function lessonEditAction(RouteCollection $routes, $lessonId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $lesson = \App\Models\Lesson::getById($lessonId);
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description') && is_array($request->request->all()["learningpoints"]) && $request->request->get('week')) {
                LessonController::editLesson($request->request->get('name'), $request->request->get('description'), $request->request->all()["learningpoints"], $request->request->get('week'), $lesson["id"]);
                if($request->request->get('upload_file')){
                    // LessonMaterialController::uploadFile($request->request->get('upload_file'));
                }
                $this->redirect($routes, 'EditCourseTemplate', $lesson["course_template_id"]);
            }

            $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $lesson["course_template_id"]]);
            $activeLearningpoints = \App\Models\LessonLearningpoint::getByArray(['lesson_id' => $lesson["id"]]);
            foreach ($learningpoints as $key => $point) {
                foreach ($activeLearningpoints as $active) {
                    if ($active["learningpoint_id"] == $point["id"]) {
                        $point["active"] = true;
                    } else {
                        $point["active"] = false;
                    }
                    $learningpoints[$key] = $point;
                }
            }
            $files = \App\Models\Lessonmaterial::getByArray(['lesson_id' => $lessonId]);
            $fileBaseUrl = \App\Models\LessonMaterial::$target_dir;
            require_once APP_ROOT . '\views\EditLesson.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }


    public function learningpointCreateAction(RouteCollection $routes, $templateId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description')) {
                LearningpointController::createLearningpoint($request->request->get('name'), $request->request->get('description'), $templateId);
                $this->redirect($routes, 'EditCourseTemplate', $templateId);
            }
            require_once APP_ROOT . '\views\CreateLearningpoint.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function LearningpointDeleteAction(RouteCollection $routes, $templateId, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            LearningpointController::deleteLearningpoint($id);
            $this->redirect($routes, 'EditCourseTemplate', $templateId);
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseCreateAction(RouteCollection $routes, $templateId, $id)
    {

    }

    public function ClassListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $classes = \App\Models\SchoolClass::getAll();
            require_once APP_ROOT . '\views\ClassList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function ClassCreateAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('startyear') && is_array($request->request->all()["students"])) {
                ClassController::createClass($request->request->get('name'), $request->request->get('startyear'), $request->request->all()["students"]);
                // $this->redirect($routes, 'classes');
            }
            $students = \App\Models\Student::getAll();
            require_once APP_ROOT . '\views\CreateClass.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function redirect(Routecollection $routes, $pageName, int $id = 0)
    {
        $path = $routes->get($pageName)->getPath();
        if ($id) {
            $path = preg_replace('/{.*}/', $id, $path);
        }
        header("Location: " . $path);
    }

}