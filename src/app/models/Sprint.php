<?php

namespace App\Models;

class Sprint {
    public int $id;
    public string $name;
    public int $duration;
    public ?int $sprint_order;
}
