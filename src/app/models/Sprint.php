<?php

namespace App\Models;

class Sprint
{
    public function __construct(
        public ?int $id,
        public string $name,
        public int $duration,
        public int $order
    ) {}
}

