<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 20.08.2017
 * Time: 17:57
 */

namespace AppBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BaseRepository extends EntityRepository
{
    public function get(int $id)
    {
        if(null === ($entity = $this->find($id))) {
            $parts = explode("\\", $this->_entityName);
            $name = end($parts);
            throw new NotFoundHttpException("$name with id: $id doesn't exist");
        }

        return $entity;
    }
}