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
            $this->redirect($routes, 'Dashboard');
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
                $tempId = CourseTemplateController::createTemplate($request->request->get('name'), $request->request->get('description'));

                $this->redirect($routes, 'CourseEdit', $tempId);
            }
            require_once APP_ROOT . '\views\CreateCourseTemplate.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseTemplateEditAction(RouteCollection $routes, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            if (!$course = \App\Models\Course::getByArray(["course_template_id" => $id])) {
                $request = Request::createFromGlobals();
                if ($request->request->get('name') && $request->request->get('description')) {
                    \App\Models\CourseTemplate::update($id, ["name" => $request->request->get('name'), "description" => $request->request->get('description')]);
                }
                $courseTemplate = CourseTemplateController::getCourse($id);
                $lessons = \App\Models\Lesson::getByArray(['course_template_id' => $id]);
                $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $id]);
                require_once APP_ROOT . '\views\EditCourseTemplate.php';
            } else {
                $this->redirect($routes, 'EditCourse', $course[0]["id"]);
            }
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseTemplateDeleteAction(RouteCollection $routes, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $courseTemplate = CourseTemplateController::getCourse($id);
            if (!\App\Models\Course::getByArray(["course_template_id" => $courseTemplate["id"]])) {
                $lessons = \App\Models\Lesson::getByArray(['course_template_id' => $id]);
                if ($lessons) {
                    foreach ($lessons as $lesson) {
                        $lesPoints = \App\Models\LessonLearningpoint::getByArray(["lesson_id" => $lesson["id"]]);
                        foreach ($lesPoints as $lesPoint) {
                            \App\Models\lessonLearningpoint::delete($lesPoint["id"]);
                        }
                        \App\Models\Lesson::delete($lesson["id"]);
                    }
                }
                $learningpoints = \App\Models\Learningpoint::getByArray(['course_template_id' => $id]);
                if ($learningpoints) {
                    foreach ($learningpoints as $point) {
                        \App\Models\Learningpoint::delete($point["id"]);
                    }
                }
                \App\Models\CourseTemplate::delete($courseTemplate["id"]);
            }
            $this->redirect($routes, 'Courses');
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function courseListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $templateCourses = \App\Models\CourseTemplate::getAll();
            $courses = \App\Models\Course::getCourses();
            require_once APP_ROOT . '\views\CourseList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }


    public function CourseCreateAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $courses = \App\Models\CourseTemplate::getAll();
            $classes = \App\Models\SchoolClass::getAll();

            $request = Request::createFromGlobals();
            if ($request->request->get('courseTemplateId') && $request->request->get('classId') && $request->request->get('startDate')) {
                $course = CourseController::createCourse($request->request->get('courseTemplateId'), $request->request->get('classId'), $request->request->get('startDate'), $_SESSION["authId"]);
                if ($course) {
                    $this->redirect($routes, 'EditCourse', $course);
                }
            }

            require_once APP_ROOT . '\views\CreateCourse.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function CourseEditAction(RouteCollection $routes, $id)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $course = \App\Models\Course::getById($id);
            $clas = \App\Models\SchoolClass::getById($course['class_id']);
            $exams = \App\Models\Exam::getByArray(["course_id" => $course['id']]);
            $template = \App\Models\CourseTemplate::getById($course["course_template_id"]);
            $lessons = \App\Models\lesson::getByArray(["course_template_id" => $template["id"]]);
            $learningpoints = \App\Models\Learningpoint::getByArray(["course_template_id" => $template["id"]]);

            $request = Request::createFromGlobals();
            if ($request->request->get('courseTemplateId') && $request->request->get('classId') && $request->request->get('startDate')) {
                $course = CourseController::createCourse($request->request->get('courseTemplateId'), $request->request->get('classId'), $request->request->get('startDate'), $_SESSION["authId"]);
                $this->redirect($routes, 'EditCourse', $course);
            }

            require_once APP_ROOT . '\views\EditCourse.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function ExamCreateAction(RouteCollection $routes, $courseId)
    {
        if (PersonController::isLoggedInAs('admin')) {

            $request = Request::createFromGlobals();
            var_dump($request->request->all());
            if ($request->request->get('name') && $request->request->get('description') && $request->request->get('date') && ($request->request->get('typeExam') || (int) $request->request->get('typeExam') == 0)) {
                \App\Models\Exam::create(['course_id' => $courseId, "name" => $request->request->get('name'), 'description' => $request->request->get('description'), 'date' => $request->request->get('date'), 'type_exam' => $request->request->get('typeExam')]);

                $this->redirect($routes, 'EditCourse', $courseId);
            }

            require_once APP_ROOT . '\views\CreateExam.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function lessonCreateAction(RouteCollection $routes, $templateId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('name') && $request->request->get('description') && $request->request->get('week')) {

                if (!isset($request->request->all()["learningpoints"])) {
                    LessonController::createLesson($request->request->get('name'), $request->request->get('description'), $request->request->get('week'), $templateId);
                } else {

                    LessonController::createLesson($request->request->get('name'), $request->request->get('description'), $request->request->get('week'), $templateId, $request->request->all()["learningpoints"]);
                }
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
                var_dump($request->request->all()["learningpoints"]);
                if ($request->request->get('upload_file')) {
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
                        $learningpoints[$key] = $point;
                        continue 2;
                    } else {
                        $point["active"] = false;
                        $learningpoints[$key] = $point;
                    }
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


    public function ClassListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $classes = \App\Models\SchoolClass::getAll();
            require_once APP_ROOT . '\views\ClassList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function ClassViewAction(RouteCollection $routes, $classId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $class = \App\Models\SchoolClass::getById($classId);
            $students = \App\Models\student::getByClassId($classId);
            require_once APP_ROOT . '\views\classView.php';
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
                $this->redirect($routes, 'Classes');
            }
            $students = \App\Models\Student::getAll();
            require_once APP_ROOT . '\views\CreateClass.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function StudentEditAction(RouteCollection $routes, $studentId)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('firstname') && $request->request->get('lastname')) {
                \App\Models\student::update($studentId, ["firstname" => $request->request->get('firstname'), "lastname" => $request->request->get('lastname')]);
                // $this->redirect($routes, 'classes');
            }
            if ($request->request->get('grade') && $request->request->get('examId')) {
                if (!empty($request->request->get('gradeId'))) {
                    \App\Models\Grade::update($request->request->get('gradeId'), ['grade' => $request->request->get('grade')]);

                } else {
                    \App\Models\Grade::create(['grade' => $request->request->get('grade'), 'student_id' => $studentId, 'exam_id' => $request->request->get('examId')]);
                }
                $this->redirect($routes, 'classes');
            }
            $student = \App\Models\Student::getStudentInfo($studentId);
            $exams = \App\Models\Exam::getExamsAndGrades($studentId);
            require_once APP_ROOT . '\views\EditStudent.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentCreateAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $request = Request::createFromGlobals();
            if ($request->request->get('firstname') && $request->request->get('lastname') && $request->request->get('birthday')) {
                \App\Models\Student::create(["firstname" => $request->request->get('firstname'), "lastname" => $request->request->get('lastname'), "birthday" => $request->request->get('birthday')]);
                $this->redirect($routes, 'students');
            }
            require_once APP_ROOT . '\views\CreateStudent.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }

    public function StudentListAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('admin')) {
            $students = \App\Models\Student::getAll();
            require_once APP_ROOT . '\views\StudentList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentGradesAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('student')) {
            $student = \App\Models\Student::getById($_SESSION["authId"]);
            $exams = \App\Models\Exam::getExamsAndGrades($student["id"]);
            require_once APP_ROOT . '\views\GradesList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentCoursesAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('student')) {
            $student = \App\Models\Student::getById($_SESSION["authId"]);
            $courses = \App\Models\Course::getCoursesByStudentId($student["id"]);
            require_once APP_ROOT . '\views\StudentCoursesList.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentCourseViewAction(RouteCollection $routes, $courseId)
    {
        if (PersonController::isLoggedInAs('student')) {
            $course = \App\Models\Course::getById($courseId);
            $clas = \App\Models\SchoolClass::getById($course['class_id']);
            $exams = \App\Models\Exam::getByArray(["course_id" => $course['id']]);
            $template = \App\Models\CourseTemplate::getById($course["course_template_id"]);
            $lessons = \App\Models\lesson::getByArray(["course_template_id" => $template["id"]]);
            $learningpoints = \App\Models\Learningpoint::getByArray(["course_template_id" => $template["id"]]);

            require_once APP_ROOT . '\views\ViewCourse.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentLessonAction(RouteCollection $routes, $lessonId)
    {
        if (PersonController::isLoggedInAs('student')) {
            $lesson = \App\Models\Lesson::getById($lessonId);
            $learningpoints = \App\Models\Learningpoint::getLessonLearningpoints($lessonId);

            $files = \App\Models\Lessonmaterial::getByArray(['lesson_id' => $lessonId]);
            $fileBaseUrl = \App\Models\LessonMaterial::$target_dir;
            require_once APP_ROOT . '\views\ViewLesson.php';
        } else {
            $this->redirect($routes, 'Homepage');
        }
    }
    public function StudentAgendaAction(RouteCollection $routes)
    {
        if (PersonController::isLoggedInAs('student')) {

            $events = \App\Models\Student::getEventsById($_SESSION["authId"]);
            require_once APP_ROOT . '\views\Agenda.php';
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