<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:18
 */

namespace AppBundle\Controller;


use Exception;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class BaseController extends FOSRestController
{

    protected function handleRequest(Request $request, string $form, array $options = [])
    {
        $form = $this->createForm($form, null, $options);
        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new Exception('Invalid Form');
        }

        return $data = $form->getData();
    }

    protected function getEntityManager()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    protected function getLoggedUser()
    {
        /** @var TokenStorage $tokenStorage */
        $tokenStorage = $this->get('security.token_storage');
        return $tokenStorage->getToken()->getUser();
    }
}