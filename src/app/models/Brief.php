<?php

namespace App\models;

class Brief {
    public int $id;
    public string $title;
    public string $description;
    public int $sprint_id;
    public int $class_id;
    public int $teacher_id;
    public string $deadline;
}