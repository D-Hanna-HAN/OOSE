<?php
namespace App\Models;

class LessonLearningpoint extends AbstractModel
{
    private int $id;
    private int $lesson_id;
    private int $learningpoint_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLesson_id(): int
    {
        return $this->lesson_id;
    }

    /**
     * @param int $lesson_id 
     * @return self
     */
    public function setLesson_id(int $lesson_id): self
    {
        $this->lesson_id = $lesson_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLearningpoint_id(): int
    {
        return $this->learningpoint_id;
    }

    /**
     * @param int $learningpoint_id 
     * @return self
     */
    public function setLearningpoint_id(int $learningpoint_id): self
    {
        $this->learningpoint_id = $learningpoint_id;
        return $this;
    }

    //deletes all learningpoints depending on the lesson id
    public static function deleteByLesson($lessonId)
    {
        $request = \App\Controllers\ApiController::formatRequest(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1), 'deleteByLesson', ['lessonId' => $lessonId]);
        return \App\Controllers\ApiController::createPostRequest($request);
    }
}