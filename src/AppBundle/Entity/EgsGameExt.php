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
     * @var integer
     *
     * @ORM\Column(name="egs_game_id", type="bigint", nullable=false)
     */
    private $egsGameId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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
