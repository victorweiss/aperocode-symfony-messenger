<?php

namespace App\Manager;

use Psr\Log\LoggerInterface;

class TaskManager
{
    public function __construct(
        private LoggerInterface $taskLogger
    ) {}

    public function myTask(array $params): void
    {
        // Do something
        sleep(1);

        // Do something else
        sleep(3);

        // And one last thing
        sleep(2);

        $this->taskLogger->info("Task finished with params : " . json_encode($params));
    }
}
