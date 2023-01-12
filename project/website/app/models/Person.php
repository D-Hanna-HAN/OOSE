<?php
namespace App\Models; 
class Person
{
    private $id;
    private $age;
    private $firstname;
    private $lastname;
    private $initials;
    private $address;
    
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
	public function getInitials() {
		return $this->initials;
	}
	
	/**
	 * @param mixed $initials 
	 * @return self
	 */
	public function setInitials($initials): self {
		$this->initials = $initials;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}
	
	/**
	 * @param mixed $address 
	 * @return self
	 */
	public function setAddress($address): self {
		$this->address = $address;
		return $this;
	}
}