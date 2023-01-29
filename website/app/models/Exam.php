<?php

namespace App\Models; 
class Exam extends AbstractModel
{
    private int $id;
    private int $course_id;
    private int $type_exam;


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
	public function getCourse_id(): int {
		return $this->course_id;
	}
	
	/**
	 * @param int $course_id 
	 * @return self
	 */
	public function setCourse_id(int $course_id): self {
		$this->course_id = $course_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getType_exam(): int {
		return $this->type_exam;
	}
	
	/**
	 * @param int $type_exam 
	 * @return self
	 */
	public function setType_exam(int $type_exam): self {
		$this->type_exam = $type_exam;
		return $this;
	}

	//gets all exams and grades of a student
    public static function getExamsAndGrades($studentId){
        
        $request = \App\Controllers\ApiController::formatRequest('Exam', 'getExamsAndGrades', ['studentId' =>$studentId]);
        Return \App\Controllers\ApiController::createGetRequest($request);
    }
}