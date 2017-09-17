<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterDislike
 *
 * @ORM\Table(name="character_dislike")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterDislikeRepository")
 */
class CharacterDislike
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
