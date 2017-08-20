<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends BaseController
{
    /**
     * @Route("web/task", name="task_list")
     */
    public function listAction(Request $request)
    {
        return new JsonResponse($this->getDoctrine()->getRepository(Task::class)->findAll());
    }

    public function createAction(Request $request)
    {
        $data = $this->handleRequest($request, TaskFormType::class);
        $task = new Task($data->title);
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
