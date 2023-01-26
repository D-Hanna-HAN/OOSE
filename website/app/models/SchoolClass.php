<?php
namespace App\Models;


class SchoolClass extends AbstractModel
{
    private int $id;
    private string $name;
    private string $start_year;

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
	public function getStart_year(): string {
		return $this->start_year;
	}
	
	/**
	 * @param string $start_year 
	 * @return self
	 */
	public function setStart_year(string $start_year): self {
		$this->start_year = $start_year;
		return $this;
	}
}