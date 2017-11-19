<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:02
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{

    /** @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $nick;
    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user", cascade={"remove"})
     * @var Task[]|Collection<Task>
     */
    protected $tasks;

    public function __construct(string $nick, string $password)
    {
        $this->nick = $nick;
        $this->password = $password;
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks(): ArrayCollection
    {
        return $this->tasks;
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task)
    {
        $this->tasks->add($task);
    }
}