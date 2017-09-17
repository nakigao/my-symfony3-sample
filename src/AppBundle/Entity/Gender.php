<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenderType
 *
 * @ORM\Table(name="gender")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenderRepository")
 */
class Gender
{
    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="html_text", type="string", length=16, nullable=false)
     */
    private $htmlText;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Gender
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set htmlText
     *
     * @param string $htmlText
     *
     * @return Gender
     */
    public function setHtmlText($htmlText)
    {
        $this->htmlText = $htmlText;

        return $this;
    }

    /**
     * Get htmlText
     *
     * @return string
     */
    public function getHtmlText()
    {
        return $this->htmlText;
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
