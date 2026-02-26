<?php
namespace App\models;

class Competence {
    public function __construct(
        public ?int $id,
        public string $code,
        public string $label,
        public ?string $sprint_name = null
    ) {}
}
