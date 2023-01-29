<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class LessonController
{
  //creates a lesson and ads additional learningpoints to that lesson
  public static function createLesson($name, $description, $week, $templateId, $learningpoints = [])
  {

    $lessonid = \App\Models\Lesson::create(['name' => $name, 'description' => $description, 'lesson_week' => $week, 'course_template_id' => $templateId]);
    if ($learningpoints) {
      foreach ($learningpoints as $point) {
        \App\Models\LessonLearningpoint::create(['lesson_id' => $lessonid, 'learningpoint_id' => $point]);
      }
    }
    return $lessonid;
  }

  //edits a lesson and updates the learningpoints
  public static function editLesson($name, $description, $learningpoints, $week, $lessonId)
  {

    \App\Models\Lesson::update($lessonId, ['name' => $name, 'description' => $description, 'lesson_week' => $week]);
    \App\Models\LessonLearningpoint::deleteByLesson($lessonId);
    foreach ($learningpoints as $point) {

      \App\Models\LessonLearningpoint::create(['lesson_id' => $lessonId, 'learningpoint_id' => $point]);
    }
    return;
  }


  //deletes a lesson 
  public static function deleteLesson($id)
  {

    \App\Models\LessonLearningpoint::deleteByLesson($id);
    return \App\Models\Lesson::delete($id);
  }

}