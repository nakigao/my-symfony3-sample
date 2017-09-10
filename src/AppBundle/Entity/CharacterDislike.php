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
