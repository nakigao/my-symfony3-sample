<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EgsGameYear
 *
 * @ORM\Table(name="egs_game_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EgsGameYearRepository")
 */
class EgsGameYear
{
    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer", nullable=false)
     */
    private $total = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="html_text", type="string", length=64, nullable=false)
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
     * Set year
     *
     * @param integer $year
     *
     * @return EgsGameYear
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set total
     *
     * @param integer $total
     *
     * @return EgsGameYear
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return EgsGameYear
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
     * @return EgsGameYear
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
