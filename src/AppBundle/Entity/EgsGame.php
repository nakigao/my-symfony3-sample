<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EgsGame
 *
 * @ORM\Table(name="egs_game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EgsGameRepository")
 */
class EgsGame
{
    /**
     * @var int
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="bigint")
     */
    private $egsBrandId;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=TRUE)
     */
    private $nameKana;

    /**
     * @var string
     *
     * @ORM\Column(type="date")
     */
    private $releaseYmd;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=TRUE)
     */
    private $url;

//id, egs_brand_id, name, name_kana, release_ymd, url


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
     * Set id
     *
     * @param integer $id
     *
     * @return EgsGame
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set egsBrandId
     *
     * @param integer $egsBrandId
     *
     * @return EgsGame
     */
    public function setEgsBrandId($egsBrandId)
    {
        $this->egsBrandId = $egsBrandId;

        return $this;
    }

    /**
     * Get egsBrandId
     *
     * @return integer
     */
    public function getEgsBrandId()
    {
        return $this->egsBrandId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return EgsGame
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameKana
     *
     * @param string $nameKana
     *
     * @return EgsGame
     */
    public function setNameKana($nameKana)
    {
        $this->nameKana = $nameKana;

        return $this;
    }

    /**
     * Get nameKana
     *
     * @return string
     */
    public function getNameKana()
    {
        return $this->nameKana;
    }

    /**
     * Set releaseYmd
     *
     * @param \DateTime $releaseYmd
     *
     * @return EgsGame
     */
    public function setReleaseYmd($releaseYmd)
    {
        $this->releaseYmd = $releaseYmd;

        return $this;
    }

    /**
     * Get releaseYmd
     *
     * @return \DateTime
     */
    public function getReleaseYmd()
    {
        return $this->releaseYmd;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return EgsGame
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
