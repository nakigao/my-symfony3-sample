<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiddleName
 *
 * @ORM\Table(name="middle_name")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MiddleNameRepository")
 */
class MiddleName
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_kana", type="string", length=255, nullable=false)
     */
    private $nameKana;

    /**
     * @var integer
     *
     * @ORM\Column(name="duplicate_count", type="integer", nullable=true)
     */
    private $duplicateCount;



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
     * Set name
     *
     * @param string $name
     *
     * @return MiddleName
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
     * @return MiddleName
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
     * Set duplicateCount
     *
     * @param integer $duplicateCount
     *
     * @return MiddleName
     */
    public function setDuplicateCount($duplicateCount)
    {
        $this->duplicateCount = $duplicateCount;

        return $this;
    }

    /**
     * Get duplicateCount
     *
     * @return integer
     */
    public function getDuplicateCount()
    {
        return $this->duplicateCount;
    }
}
