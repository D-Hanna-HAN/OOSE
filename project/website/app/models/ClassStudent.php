<?php

namespace App\Models; 
class ClassStudents extends AbstractModel
{
    private int $id;
    private int $class_id;
    private int $student_id;
    

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
	
	/**
	 * @return int
	 */
	public function getStudent_id(): int {
		return $this->student_id;
	}
	
	/**
	 * @param int $student_id 
	 * @return self
	 */
	public function setStudent_id(int $student_id): self {
		$this->student_id = $student_id;
		return $this;
	}
}