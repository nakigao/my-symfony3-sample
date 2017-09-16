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
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="bigint")
     */
    private $egsGameId;

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
     * Set egsGameId
     *
     * @param integer $egsGameId
     *
     * @return EgsGameExt
     */
    public function setEgsGameId($egsGameId)
    {
        $this->egsGameId = $egsGameId;

        return $this;
    }

    /**
     * Get egsGameId
     *
     * @return integer
     */
    public function getEgsGameId()
    {
        return $this->egsGameId;
    }
}
