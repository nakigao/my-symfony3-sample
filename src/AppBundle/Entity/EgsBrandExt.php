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
     * @var integer
     *
     * @ORM\Column(name="egs_brand_id", type="bigint", nullable=false)
     */
    private $egsBrandId;

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
