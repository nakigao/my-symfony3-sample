<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterCatchPhrase
 *
 * @ORM\Table(name="character_catch_phrase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterCatchPhraseRepository")
 */
class CharacterCatchPhrase
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
