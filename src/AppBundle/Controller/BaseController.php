<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:18
 */

namespace AppBundle\Controller;


use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{

    protected function handleRequest(Request $request, string $form, array $options = [])
    {
        $form = $this->createForm($form, null, $options);
        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new Exception('Invalid Form');
        }
    }

    protected function getEntityManager()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }
}