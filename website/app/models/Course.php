<?php

namespace App\Models; 
class Course extends AbstractModel
{
    private int $id;
    private int $course_template_id;
    private int $schooladmin_id;
    private int $class_id;
    private string $start_date;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getCourse_template_id(): int {
		return $this->course_template_id;
	}
	
	/**
	 * @param int $course_template_id 
	 * @return self
	 */
	public function setCourse_template_id(int $course_template_id): self {
		$this->course_template_id = $course_template_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getSchooladmin_id(): int {
		return $this->schooladmin_id;
	}
	
	/**
	 * @param int $schooladmin_id 
	 * @return self
	 */
	public function setSchooladmin_id(int $schooladmin_id): self {
		$this->schooladmin_id = $schooladmin_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getClass_id(): int {
		return $this->class_id;
	}
	
	/**
	 * @param int $class_id 
	 * @return self
	 */
	public function setClass_id(int $class_id): self {
		$this->class_id = $class_id;
		return $this;
	}
	public static function getCourses(){
		
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getCourses');
        return \App\Controllers\ApiController::createGetRequest($request);
	}

	public static function getCurrentCourseByClassId($classId){
		
        $request = \App\Controllers\ApiController::formatRequest('Course', 'getCurrentCourseByClassId', ['classId' =>$classId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
	}

	public static function getCoursesByStudentId($studentId){
		
        $request = \App\Controllers\ApiController::formatRequest('Course', 'getCoursesByStudentId', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
	}
}