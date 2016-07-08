<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table("artist")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ArtistRepository")
 */
class Artist extends User
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
       /* $this->CategoryService = new \Doctrine\Common\Collections\ArrayCollection();*/
    }

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Artist
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
}
