<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));
$routes->add('students', new Route(constant('URL_SUBFOLDER') . '/students/', array('controller' => 'PageController', 'method'=>'AllStudentsAction'), array()));
$routes->add('student', new Route(constant('URL_SUBFOLDER') . '/student/{id}', array('controller' => 'PageController', 'method'=>'StudentAction'), array('id' => '[0-9]+')));