<?php

namespace App\Models; 
class CourseTemplate extends AbstractModel
{
    private int $id;
    private string $name;
    private string $description;
    private string $created_by_schooladmin_id;


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
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCreated_by_schooladmin_id(): string {
		return $this->created_by_schooladmin_id;
	}
	
	/**
	 * @param string $created_by_schooladmin_id 
	 * @return self
	 */
	public function setCreated_by_schooladmin_id(string $created_by_schooladmin_id): self {
		$this->created_by_schooladmin_id = $created_by_schooladmin_id;
		return $this;
	}
}