<?php

namespace App\Models;

class Lessonmaterial extends AbstractModel
{
    private int $id;
    private string $file_name;
    private int $lesson_id;

    public static $target_dir = "C:\\xampp\htdocs\schoolWebsites\OOSE\website\uploads\\";

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
     * @return string
     */
    public function getFile_name(): string
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name 
     * @return self
     */
    public function setFile_name(string $file_name): self
    {
        $this->file_name = $file_name;
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
}