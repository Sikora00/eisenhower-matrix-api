<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:15
 */

namespace AppBundle\Entity\Repository;



use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserRepository extends BaseRepository implements UserLoaderInterface
{

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $username The username
     *
     * @return User|null
     */
    public function loadUserByUsername($username): ?User
    {
        $qb = $this->createQueryBuilder('u')
                ->where('u.userName = :userName')
                ->setParameter('userName', $username);
        return $user = $qb->getQuery()->getOneOrNullResult();
    }

    public function getByToken(string $token): User
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.token = :token')
            ->setParameter('token', $token);
        $user = $qb->getQuery()->getOneOrNullResult();
        if(!$user) {
            throw new NotFoundHttpException('User with token not found');
        }

        return $user;
    }
}