<?php

namespace App\Message;

class TaskMessage
{
    public function __construct(
        private array $params
    ) {}

    public function getParams(): array
    {
        return $this->params;
    }
}
