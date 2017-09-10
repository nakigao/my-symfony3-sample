<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterAttribute
 *
 * @ORM\Table(name="character_attribute")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterAttributeRepository")
 */
class CharacterAttribute
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

