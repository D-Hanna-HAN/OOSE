<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
        require_once APP_ROOT . '\views\Home.php';
	}
	public function AllStudentsAction(RouteCollection $routes){
		$students = StudentController::showAllStudents();
		require_once APP_ROOT . '\views\ShowAllStudents.php';
	}
	public function StudentAction(int $id, RouteCollection $routes){
		$student = StudentController::findById($id);
		require_once APP_ROOT . '\views\Student.php';
	}
}