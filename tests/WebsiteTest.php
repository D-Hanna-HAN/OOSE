<?php

class WebsiteTest extends \PHPUnit\Framework\TestCase {
    public function testGetStudent(){
        $student = \App\Models\Student::getById(1);
        $this->assertArrayHasKey('firstname', $student);
    }

    public function testCreateTemplate(){
        $template = \App\Models\CourseTemplate::create(["name" => "unit test", "description" => "deze template is gecreeerd door een unit test", "created_by_schooladmin_id" => 1]);
        $this->assertIsNumeric($template);
    }

    public function testCreateInvalidTemplate(){
        
        $template = \App\Models\CourseTemplate::create(["name" => "unit test", "description" => "deze template is gecreeerd door een unit test", "created_by_schooladmin_id" => 1]);
        $learningpoints = [
            ["name" => "Lorem", "description" => "ipsum", "course_template_id" => $template],
            ["name" => "Lorem2", "description" => "ipsum2", "course_template_id" => $template]
        ];
        $lastAdded = 0;
        foreach($learningpoints AS $point){
            $lastAdded = \App\Models\Learningpoint::create($point);
        }
        $lesson = \App\Models\Lesson::create(["name" => "unit test lesson", "description" => "random lesson description", "course_template_id" => $template, "lesson_week" => 1]);
        $validity = \App\Controllers\CourseTemplateController::ValidTemplate($template);
        $this->assertFalse($validity);
    }
    public function testCreateValidTemplate(){
        
        $template = \App\Models\CourseTemplate::create(["name" => "unit test valid", "description" => "deze template is gecreeerd door een unit test", "created_by_schooladmin_id" => 1]);
        $learningpoints = [
            ["name" => "Lorem", "description" => "ipsum", "course_template_id" => $template],
            ["name" => "Lorem2", "description" => "ipsum2", "course_template_id" => $template]
        ];
        foreach($learningpoints AS $point){
            $pointId = \App\Models\Learningpoint::create($point);
            $lesson = \App\Models\Lesson::create(["name" => "unit test lesson valid", "description" => "random lesson description", "course_template_id" => $template, "lesson_week" => 1]);
            $lesPoint = \App\Models\LessonLearningpoint::create(["lesson_id" => $lesson, "learningpoint_id" => $pointId]);
        }
        $lesson = \App\Models\Lesson::create(["name" => "unit test lesson", "description" => "random lesson description", "course_template_id" => $template, "lesson_week" => 1]);
        $validity = \App\Controllers\CourseTemplateController::ValidTemplate($template);
        $this->assertTrue($validity);
    }

}