<?php
//src/SymfonyGallery/UserBundle/Entity/AdminUser.php

namespace SymfonyGallery\UserBundle\Entity;

use FOS\UserBundle\Model\AdminUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="symfonygallery_user")
 */
class AdminUser extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

