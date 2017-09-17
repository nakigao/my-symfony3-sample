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
