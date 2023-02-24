<?php

namespace App\Controller;

use App\Manager\TaskManager;
use App\Message\TaskMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('', name: 'app_base')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    #[Route('/synchrone', name: 'synchrone')]
    public function synchrone(TaskManager $manager): Response
    {
        $params = ['foo' => 'bar'];

        $manager->myTask($params);

        $this->addFlash('success', 'Task finished');

        return $this->redirectToRoute('app_base');
    }

    #[Route('/asynchrone', name: 'asynchrone')]
    public function asynchrone(MessageBusInterface $bus): Response
    {
        $params = ['baz' => 'quz'];

        $message = new TaskMessage($params);

        $bus->dispatch($message);

        $this->addFlash('success', 'Task finished');

        return $this->redirectToRoute('app_base');
    }
}
