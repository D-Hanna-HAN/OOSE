<?php
namespace App\Models; 
class Student extends Person
{

    public function __construct()
    {
        $this->setId("1");
        $this->setFirstname('david');
    }


    public function changeName($firstname)
    {
        $this->setFirstname($firstname);
    }
}