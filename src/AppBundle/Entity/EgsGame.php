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
     * @var integer
     *
     * @ORM\Column(name="egs_brand_id", type="bigint", nullable=false)
     */
    private $egsBrandId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_kana", type="text", nullable=true)
     */
    private $nameKana;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_ymd", type="date", nullable=false)
     */
    private $releaseYmd;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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
