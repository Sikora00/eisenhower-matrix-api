<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TaskController
{
    /**
     * @Route("web/task", name="task_list")
     */
    public function listAction(Request $request)
    {
        return new JsonResponse([['date' => '12-08-2017', 'note' => 'Note from api']]);
    }
}
