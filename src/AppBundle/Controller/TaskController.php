<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class TaskController extends BaseController
{
    /**
     * @Rest\View(serializerGroups={"task_list"})
     * @param Request $request
     * @return Task[]
     */
    public function listAction(Request $request)
    {
        $user = $this->getLoggedUser();
        $taskRepository = $this->getDoctrine()->getRepository(Task::class);
        $tasks = $taskRepository->findBy(['user' => $user]);
        return $tasks;
    }

    public function createAction(Request $request)
    {
        $data = $this->handleRequest($request, TaskFormType::class);
        $task = new Task($data->title, $this->getLoggedUser());
        $manager = $this->getEntityManager();
        $manager->persist($task);
        $manager->flush();

        return $task;
    }

    public function deleteAction(int $id)
    {
        $task = $this->getDoctrine()->getRepository(Task::class)->get($id);
        $this->getEntityManager()->remove($task);
        $this->getEntityManager()->flush();

        return new JsonResponse();
    }
}
