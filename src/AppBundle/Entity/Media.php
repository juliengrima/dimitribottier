<?php

namespace AppBundle\Entity;

/**
 * Media
 */
class Media
{

    // Variable temporaire pour upload de fichier
    public $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($image)
    {
        $this->file = $image;
        return $this;
    }


    public function __toString()
    {
        return $this->getName() . ' | ' . $this->getPath();
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @var \AppBundle\Entity\Media
     */
    private $media;


    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Media
     */
    public function setMedia(\AppBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }
}
