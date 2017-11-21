<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class SessionController extends BaseController
{

    public function loginAction(Request $request)
    {
        $userName = $request->get('userName');
        $password = $request->get('password');
        /** @var UserRepository $userRepository */
        $userRepository = $this->get('app.user.user_repository');
        $user = $userRepository->loadUserByUsername($userName);
        $encoder = $this->get('security.password_encoder');
        if(!$user || !$encoder->isPasswordValid($user, $password)) {
            throw new BadCredentialsException();
        }

        $token = md5(random_bytes(10));
        $user->setToken($token);
        $this->getEntityManager()->flush();
        return ['token' => $token];
    }
}
