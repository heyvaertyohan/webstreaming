<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table("artistsgroup")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ArtistgroupRepository")
 */
class Artistsgroup extends User
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
       /* $this->CategoryService = new \Doctrine\Common\Collections\ArrayCollection();*/
    }
}
