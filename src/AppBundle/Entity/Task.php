<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:04
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="\AppBundle\Entity\Repository\TaskRepository")
 * @ORM\Table(name="task")
 */
class Task
{
    /** @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;
    /** @ORM\Column(type="string") */
    public $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}