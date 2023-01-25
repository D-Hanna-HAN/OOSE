<?php

namespace App\Models;

class Lesson extends AbstractModel
{
    private int $id;
	private string $name;
	private string $description;
    private int $course_template_id;
    private int $lesson_week;
    

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
	public function getLesson_week(): int {
		return $this->lesson_week;
	}
	
	/**
	 * @param int $lesson_week 
	 * @return self
	 */
	public function setLesson_week(int $lesson_week): self {
		$this->lesson_week = $lesson_week;
		return $this;
	}
}