<?php

namespace App\Models;

class Grade extends AbstractModel
{
    private int $id;
    private int $student_id;

    //0 = written exam, 1 = practical exam 
    private int $exam_id;
    private int $grade;


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
    public function getStudent_id(): int
    {
        return $this->student_id;
    }

    /**
     * @param int $student_id 
     * @return self
     */
    public function setStudent_id(int $student_id): self
    {
        $this->student_id = $student_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExam_id(): int
    {
        return $this->exam_id;
    }

    /**
     * @param int $exam_id 
     * @return self
     */
    public function setExam_id(int $exam_id): self
    {
        $this->exam_id = $exam_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrade(): int
    {
        return $this->grade;
    }

    /**
     * @param int $grade 
     * @return self
     */
    public function setGrade(int $grade): self
    {
        $this->grade = $grade;
        return $this;
    }
}