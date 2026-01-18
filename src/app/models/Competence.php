<?php
namespace App\Models;

class Competence {
    public int $id;
    public ?int $sprint_id = null;
    public string $code;
    public ?string $label = null; 
}
