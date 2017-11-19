<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use AppBundle\Form\TaskFormType;
use AppBundle\Form\UserData;
use AppBundle\Form\UserFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends BaseController
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
        /** @var UserData $data */
        $data = $this->handleRequest($request, UserFormType::class);
        $user = new User($data->nick, $data->password);
        $manager = $this->getEntityManager();
        $manager->persist($user);
        $manager->flush();
        return $user;
    }
}
