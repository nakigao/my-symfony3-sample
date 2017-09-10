<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EgsGameExt
 *
 * @ORM\Table(name="egs_game_ext")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EgsGameExtRepository")
 */
class EgsGameExt
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

