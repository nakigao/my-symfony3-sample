<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game", uniqueConstraints={@ORM\UniqueConstraint(name="egs_game_id", columns={"egs_game_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="egs_game_id", type="bigint", nullable=false)
     */
    private $egsGameId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_done", type="boolean", nullable=true)
     */
    private $isDone = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_normal", type="boolean", nullable=true)
     */
    private $isNormal = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=true)
     */
    private $isDeleted = '0';



    /**
     * Get id
     *
     * @return integer
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
     * @return Game
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
     * Set isDone
     *
     * @param boolean $isDone
     *
     * @return Game
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;

        return $this;
    }

    /**
     * Get isDone
     *
     * @return boolean
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * Set isNormal
     *
     * @param boolean $isNormal
     *
     * @return Game
     */
    public function setIsNormal($isNormal)
    {
        $this->isNormal = $isNormal;

        return $this;
    }

    /**
     * Get isNormal
     *
     * @return boolean
     */
    public function getIsNormal()
    {
        return $this->isNormal;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return Game
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }
}
