<?php

namespace App\Controllers;

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
            $this->indexAction($routes);
        }
    }

    public function adminDashboardAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $admin = \App\Models\Schooladmin::getById($_SESSION["authId"]);

            require_once APP_ROOT . '\views\AdminDashboard.php';
        } else {
            $this->indexAction($routes);
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
            $this->indexAction($routes);
        }
    }

    public function CourseTemplateEditAction(RouteCollection $routes, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description')) {
                CourseTemplateController::createTemplate($request->request->get('name'), $request->request->get('description'));
            }
            $CourseTemplate = CourseTemplateController::getCourse();
            $lessons = Lesson::getByArray(['course_template_id' => $id]);
            $learningPoints = Learningpoint::getByArray(['course_template_id' => $id]);
            require_once APP_ROOT . '\views\EditCourseTemplate.php';
        } else {
            $this->indexAction($routes);
        }
    }

    public function courseListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $templateCourses = \App\Models\CourseTemplate::getAll();
            $Courses = \App\Models\CourseTemplate::getAll();
            require_once APP_ROOT . '\views\CourseList.php';
        } else {
            $this->indexAction($routes);
        }
    }

    public function lessonCreateAction(RouteCollection $routes, $template_id)
    {
        if ($request->request->get('name') && $request->request->get('description')) {
            Lesson::createTemplate($request->request->get('name'), $request->request->get('description'));
        }
    }

}