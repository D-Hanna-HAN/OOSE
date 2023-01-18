<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
 $routes->add('Homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method' => 'indexAction'), array()));
if ($_SESSION["authType"] == "student") {
    $routes->add('Dashboard', new Route(constant('URL_SUBFOLDER') . '/dashboard/', array('controller' => 'PageController', 'method' => 'studentDashboardAction')));
} elseif ($_SESSION["authType"] == "admin") {
    $routes->add('Dashboard', new Route(constant('URL_SUBFOLDER') . '/dashboard/', array('controller' => 'PageController', 'method' => 'adminDashboardAction'), array()));

    //course routes
    $routes->add('Courses', new Route(constant('URL_SUBFOLDER') . '/courses/', array('controller' => 'PageController', 'method' => 'CourseListAction'), array()));

    //course template routes
    $routes->add('CreateCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/create/', array('controller' => 'PageController', 'method' => 'CourseTemplateCreateAction')));
    $routes->add('EditCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/edit/{id}', array('controller' => 'PageController', 'method' => 'CourseTemplateEditAction'), array('id' => '[0-9]+')));

    //lesson routes
    $routes->add('CreateLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/create/{templateId}', array('controller' => 'PageController', 'method' => 'LessonCreateAction'), array('templateId' => '[0-9]+')));
    $routes->add('EditLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/edit/{id}', array('controller' => 'PageController', 'method' => 'LessonEditAction'), array('id' => '[0-9]+')));

    //learninpoint routes
    $routes->add('CreateLearningpoint', new Route(constant('URL_SUBFOLDER') . '/learningpoint/create/{templateId}', array('controller' => 'PageController', 'method' => 'LearningpointCreateAction'), array('templateId' => '[0-9]+')));
    $routes->add('EditLearningpoint', new Route(constant('URL_SUBFOLDER') . '/learningpoint/edit/{id}', array('controller' => 'PageController', 'method' => 'LearninpointEditAction'), array('id' => '[0-9]+')));
}