<?php

namespace SymfonyGallery\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserFolder
 */
class UserFolder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $folderName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $pictureId;


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
     * Set folderName
     *
     * @param string $folderName
     * @return UserFolder
     */
    public function setFolderName($folderName)
    {
        $this->folderName = $folderName;

        return $this;
    }

    /**
     * Get folderName
     *
     * @return string 
     */
    public function getFolderName()
    {
        return $this->folderName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return UserFolder
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pictureId
     *
     * @param integer $pictureId
     * @return UserFolder
     */
    public function setPictureId($pictureId)
    {
        $this->pictureId = $pictureId;

        return $this;
    }

    /**
     * Get pictureId
     *
     * @return integer 
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }
}
