<?php

namespace App\Models; 
class Course extends AbstractModel
{
    private int $id;
    private int $course_template_id;
    private int $schooladmin_id;
    private int $class_id;

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
}