<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
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
        $task = new Task($request->get('title'));
        $manager = $this->getEntityManager();
        $manager->persist($task);
        $manager->flush();
        return new JsonResponse();
    }
}
