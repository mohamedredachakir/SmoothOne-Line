<?php

namespace App\models;

class Brief
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $description,
        public int $estimatedDuration,
        public string $type,
        public int $sprintId,
        public int $classId,
        public int $teacherId
    ) {}
}
