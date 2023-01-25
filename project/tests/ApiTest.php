<?php
class ApiTest extends \PHPUnit\Framework\TestCase
{

    public function testPersonUpdate()
    {
        $oldStudent = Api\Model\Student::getById(1);
        Api\Model\Student::update(1,["lastname" => "gertrude"]);

        $this->assertNotEquals(Api\Model\Student::getById(1)->lastname, $oldStudent->lastname);
    }

}