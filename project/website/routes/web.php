<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('Homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method' => 'indexAction'), array()));

$routes->add('convertfile', new Route(constant('URL_SUBFOLDER') . '/convert/{filename}', array('controller' => 'FileController', 'method' => 'convertToPdf')));
$routes->add('downloadFile', new Route(constant('URL_SUBFOLDER') . '/download/{lessonId}/{filename}/{convert}', array('controller' => 'LessonmaterialController', 'method' => 'downloadFileAction')));

if (isset($_SESSION["authType"]) && $_SESSION["authType"] == "student") {
    $routes->add('Dashboard', new Route(constant('URL_SUBFOLDER') . '/dashboard/', array('controller' => 'PageController', 'method' => 'studentDashboardAction')));
    $routes->add('Grades', new Route(constant('URL_SUBFOLDER') . '/grades/', array('controller' => 'PageController', 'method' => 'StudentGradesAction')));
    $routes->add('Courses', new Route(constant('URL_SUBFOLDER') . '/courses/', array('controller' => 'PageController', 'method' => 'StudentCoursesAction')));
    $routes->add('CourseView', new Route(constant('URL_SUBFOLDER') . '/course/view/{courseId}', array('controller' => 'PageController', 'method' => 'StudentCourseViewAction')));
    $routes->add('Agenda', new Route(constant('URL_SUBFOLDER') . '/agenda/', array('controller' => 'PageController', 'method' => 'StudentAgendaAction')));
    $routes->add('EditLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/view/{lessonId}', array('controller' => 'PageController', 'method' => 'StudentLessonAction'), array('lessonId' => '[0-9]+')));

} elseif (isset($_SESSION["authType"]) && $_SESSION["authType"] == "admin") {
    $routes->add('Dashboard', new Route(constant('URL_SUBFOLDER') . '/dashboard/', array('controller' => 'PageController', 'method' => 'adminDashboardAction'), array()));

    //student routes
    $routes->add('StudentEdit', new Route(constant('URL_SUBFOLDER') . '/student/edit/{studentId}', array('controller' => 'PageController', 'method' => 'StudentEditAction'), array('studentId' => '[0-9]+')));


    // file routes
    $routes->add('FileUpload', new Route(constant('URL_SUBFOLDER') . '/upload/{lessonId}', array('controller' => 'LessonMaterialController', 'method' => 'UploadFileAction'), array('lessonId' => '[0-9]+')));

    //classes routes
    $routes->add('Classes', new Route(constant('URL_SUBFOLDER') . '/classes/', array('controller' => 'PageController', 'method' => 'ClassListAction'), array()));
    $routes->add('CreateClass', new Route(constant('URL_SUBFOLDER') . '/class/create/', array('controller' => 'PageController', 'method' => 'ClassCreateAction'), array()));
    $routes->add('ViewClass', new Route(constant('URL_SUBFOLDER') . '/class/view/{classId}', array('controller' => 'PageController', 'method' => 'ClassViewAction'), array('classId' => '[0-9]+')));

    //course routes
    $routes->add('Courses', new Route(constant('URL_SUBFOLDER') . '/courses/', array('controller' => 'PageController', 'method' => 'CourseListAction'), array()));
    $routes->add('CreateCourse', new Route(constant('URL_SUBFOLDER') . '/course/create/', array('controller' => 'PageController', 'method' => 'CourseCreateAction'), array()));
    $routes->add('EditCourse', new Route(constant('URL_SUBFOLDER') . '/course/edit/{id}', array('controller' => 'PageController', 'method' => 'CourseEditAction'), array('id' => '[0-9]+')));

    //course template routes
    $routes->add('CreateCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/create/', array('controller' => 'PageController', 'method' => 'CourseTemplateCreateAction')));
    $routes->add('EditCourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/edit/{id}', array('controller' => 'PageController', 'method' => 'CourseTemplateEditAction'), array('id' => '[0-9]+')));
    $routes->add('DeletecourseTemplate', new Route(constant('URL_SUBFOLDER') . '/course_template/delete/{id}', array('controller' => 'PageController', 'method' => 'CourseTemplateDeleteAction'), array('id' => '[0-9]+')));

    //lesson routes
    $routes->add('CreateLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/create/{templateId}', array('controller' => 'PageController', 'method' => 'LessonCreateAction'), array('templateId' => '[0-9]+')));
    $routes->add('EditLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/edit/{lessonId}', array('controller' => 'PageController', 'method' => 'LessonEditAction'), array('lessonId' => '[0-9]+')));
    $routes->add('DeleteLesson', new Route(constant('URL_SUBFOLDER') . '/lesson/delete/{templateId}/{id}', array('controller' => 'PageController', 'method' => 'LessonDeleteAction'), array('templateId' => '[0-9]+', 'id' => '[0-9]+')));

    //learninpoint routes
    $routes->add('CreateLearningpoint', new Route(constant('URL_SUBFOLDER') . '/learningpoint/create/{templateId}', array('controller' => 'PageController', 'method' => 'LearningpointCreateAction'), array('templateId' => '[0-9]+')));
    $routes->add('EditLearningpoint', new Route(constant('URL_SUBFOLDER') . '/learningpoint/edit/{id}', array('controller' => 'PageController', 'method' => 'LearninpointEditAction'), array('id' => '[0-9]+')));
    $routes->add('DeleteLearningpoint', new Route(constant('URL_SUBFOLDER') . '/learningpoint/delete/{templateId}/{id}', array('controller' => 'PageController', 'method' => 'LearningpointDeleteAction'), array('templateId' => '[0-9]+', 'id' => '[0-9]+')));

    //Exam routes
    $routes->add('CreateExam', new Route(constant('URL_SUBFOLDER') . '/exam/create/{courseId}', array('controller' => 'PageController', 'method' => 'ExamCreateAction'), array('courseId' => '[0-9]+')));

}