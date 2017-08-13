<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 13.08.2017
 * Time: 11:02
 */

namespace AppBundle\Entity;

class User
{

    protected $nick;

    protected $password;

    public function __construct(string $nick, string $password)
    {
        $this->nick = $nick;
        $this->password = $password;
    }
}