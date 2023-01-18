<?php
namespace App\Models;

class Person extends AbstractModel
{
	protected $id;
	protected $firstname;
	protected $lastname;
	protected $birthday;



	/**
	 * @return mixed
	 */
	public function getBirthday() {
		return $this->birthday;
	}
	
	/**
	 * @param mixed $birthday 
	 * @return self
	 */
	public function setBirthday($birthday): self {
		$this->birthday = $birthday;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastname() {
		return $this->lastname;
	}
	
	/**
	 * @param mixed $lastname 
	 * @return self
	 */
	public function setLastname($lastname): self {
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFirstname() {
		return $this->firstname;
	}
	
	/**
	 * @param mixed $firstname 
	 * @return self
	 */
	public function setFirstname($firstname): self {
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
}