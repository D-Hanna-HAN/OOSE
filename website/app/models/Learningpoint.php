<?php
namespace App\Models;

class Learningpoint extends AbstractModel
{
	private int $id;

	private string $name;
	private string $description;
	private int $course_template_id;
	private int $exam_id;


	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCourse_template_id(): int
	{
		return $this->course_template_id;
	}

	/**
	 * @param int $course_template_id 
	 * @return self
	 */
	public function setCourse_template_id(int $course_template_id): self
	{
		$this->course_template_id = $course_template_id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getExam_id(): int
	{
		return $this->exam_id;
	}

	/**
	 * @param int $exam_id 
	 * @return self
	 */
	public function setExam_id(int $exam_id): self
	{
		$this->exam_id = $exam_id;
		return $this;
	}

	//gets all learningpoints that are connected to a lesson
	public static function getLessonLearningpoints($lessonId)
	{
		$request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'getLessonLearningpoints', ['lessonId' => $lessonId]);
		return \App\Controllers\ApiController::createPostRequest($request);
	}
}