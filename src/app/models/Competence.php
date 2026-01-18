<?php
namespace App\Models;

class Competence {
    public int $id;
    public string $code;
    public string $label;
    public ?string $sprint_name = null;
}

