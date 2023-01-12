<?php

class WebsiteTest extends \PHPUnit\Framework\TestCase {

    public function testPersonCreation(){
        $person = new \App\Models\Student;
        $person->changeName('greg');

        $this->assertEquals('greg', $person->getFirstname());
    }
}