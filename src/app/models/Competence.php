<?php
namespace App\Models;

class Competence {
    public int $id;
    public int $sprint_id;
    public string $name;
    public ?string $description = null;
}
