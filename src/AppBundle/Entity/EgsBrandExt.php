<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EgsBrandExt
 *
 * @ORM\Table(name="egs_brand_ext")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EgsBrandExtRepository")
 */
class EgsBrandExt
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
    private $egsBrandId;

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
     * Set egsBrandId
     *
     * @param integer $egsBrandId
     *
     * @return EgsBrandExt
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
}
