<?php
class ApiTest extends \PHPUnit\Framework\TestCase
{
    public function testGetPerson()
    {
        $id = 1;
        $student = Api\Model\Student::getById(1);

        $this->assertArrayHasKey('firstname', $student);
    }
    public function testPersonUpdate()
    {
        $oldStudent = Api\Model\Student::getById(3);
        $randomName = $oldStudent . "unitTest";
        Api\Model\Student::update(3, ["lastname" => $randomName]);

        $this->assertNotEquals(Api\Model\Student::getById(3)["lastname"], $oldStudent["lastname"]);
    }
    public function testPersonCreate()
    {
        $student = ["firstname" => "harko", "lastname" => "menis", "birthday" => "2004-12-13"];
        $studentId = Api\Model\Student::create($student);
        $this->assertIsNumeric($studentId);
    }

}