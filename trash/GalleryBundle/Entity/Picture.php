<?php

namespace SymfonyGallery\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 */
class Picture
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $picName;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var integer
     */
    private $userId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set picName
     *
     * @param string $picName
     * @return Picture
     */
    public function setPicName($picName)
    {
        $this->picName = $picName;

        return $this;
    }

    /**
     * Get picName
     *
     * @return string 
     */
    public function getPicName()
    {
        return $this->picName;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Picture
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Picture
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
