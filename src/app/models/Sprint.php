<?php

namespace App\Models;

class Sprint {
    public int $id;
    public string $name;
    public int $duration;
    public int $sprint_order;
    public function __construct(
        int $id = 0,
        string $name = '',
        int $duration = 0,
        int $sprint_order = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->sprint_order = $sprint_order;
    }
}

