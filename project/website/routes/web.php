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
    $routes->add('Courses', new Route(constant('URL_SUBFOLDER') . '/courses/', array('controller' => 'PageController', 'method' => 'CourseListAction'), array()));
    $routes->add('CreateCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/create/', array('controller' => 'PageController', 'method' => 'CourseTemplateCreateAction')));
    $routes->add('EditCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/edit/{id}', array('controller' => 'PageController', 'method' => 'CourseTemplateEditAction'), array('id' => '[0-9]+')));

}