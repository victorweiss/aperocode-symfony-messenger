<?php

namespace App\Handler;

use App\Manager\TaskManager;
use App\Message\TaskMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class TaskHandler
{
    public function __construct(
        private TaskManager $manager
    ) {}

    public function __invoke(TaskMessage $message)
    {
        $this->manager->myTask($message->getParams());
    }
}
