<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterSerif
 *
 * @ORM\Table(name="character_serif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterSerifRepository")
 */
class CharacterSerif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

