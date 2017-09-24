<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterBase
 *
 * @ORM\Table(name="character_base")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterBaseRepository")
 */
class CharacterBase
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
     */
    private $middleName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="family_name", type="string", length=255, nullable=true)
     */
    private $familyName = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="integer", nullable=false)
     */
    private $gender = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="true_gender", type="integer", nullable=false)
     */
    private $trueGender = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="blood_type", type="integer", nullable=false)
     */
    private $bloodType = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="cup", type="string", length=1, nullable=true)
     */
    private $cup;

    /**
     * @var integer
     *
     * @ORM\Column(name="bust", type="integer", nullable=true)
     */
    private $bust;

    /**
     * @var integer
     *
     * @ORM\Column(name="waist", type="integer", nullable=true)
     */
    private $waist;

    /**
     * @var integer
     *
     * @ORM\Column(name="hip", type="integer", nullable=true)
     */
    private $hip;

    /**
     * @var integer
     *
     * @ORM\Column(name="birth_month", type="integer", nullable=true)
     */
    private $birthMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="birth_day", type="integer", nullable=true)
     */
    private $birthDay;

    /**
     * @var integer
     *
     * @ORM\Column(name="introduction_priority", type="integer", nullable=true)
     */
    private $introductionPriority;



    /**
     * Set egsGameId
     *
     * @param integer $egsGameId
     *
     * @return CharacterBase
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
     * Set name
     *
     * @param string $name
     *
     * @return CharacterBase
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
     * Set middleName
     *
     * @param string $middleName
     *
     * @return CharacterBase
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set familyName
     *
     * @param string $familyName
     *
     * @return CharacterBase
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return CharacterBase
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set trueGender
     *
     * @param integer $trueGender
     *
     * @return CharacterBase
     */
    public function setTrueGender($trueGender)
    {
        $this->trueGender = $trueGender;

        return $this;
    }

    /**
     * Get trueGender
     *
     * @return integer
     */
    public function getTrueGender()
    {
        return $this->trueGender;
    }

    /**
     * Set bloodType
     *
     * @param integer $bloodType
     *
     * @return CharacterBase
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;

        return $this;
    }

    /**
     * Get bloodType
     *
     * @return integer
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return CharacterBase
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return CharacterBase
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set cup
     *
     * @param string $cup
     *
     * @return CharacterBase
     */
    public function setCup($cup)
    {
        $this->cup = $cup;

        return $this;
    }

    /**
     * Get cup
     *
     * @return string
     */
    public function getCup()
    {
        return $this->cup;
    }

    /**
     * Set bust
     *
     * @param integer $bust
     *
     * @return CharacterBase
     */
    public function setBust($bust)
    {
        $this->bust = $bust;

        return $this;
    }

    /**
     * Get bust
     *
     * @return integer
     */
    public function getBust()
    {
        return $this->bust;
    }

    /**
     * Set waist
     *
     * @param integer $waist
     *
     * @return CharacterBase
     */
    public function setWaist($waist)
    {
        $this->waist = $waist;

        return $this;
    }

    /**
     * Get waist
     *
     * @return integer
     */
    public function getWaist()
    {
        return $this->waist;
    }

    /**
     * Set hip
     *
     * @param integer $hip
     *
     * @return CharacterBase
     */
    public function setHip($hip)
    {
        $this->hip = $hip;

        return $this;
    }

    /**
     * Get hip
     *
     * @return integer
     */
    public function getHip()
    {
        return $this->hip;
    }

    /**
     * Set birthMonth
     *
     * @param integer $birthMonth
     *
     * @return CharacterBase
     */
    public function setBirthMonth($birthMonth)
    {
        $this->birthMonth = $birthMonth;

        return $this;
    }

    /**
     * Get birthMonth
     *
     * @return integer
     */
    public function getBirthMonth()
    {
        return $this->birthMonth;
    }

    /**
     * Set birthDay
     *
     * @param integer $birthDay
     *
     * @return CharacterBase
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    /**
     * Get birthDay
     *
     * @return integer
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * Set introductionPriority
     *
     * @param integer $introductionPriority
     *
     * @return CharacterBase
     */
    public function setIntroductionPriority($introductionPriority)
    {
        $this->introductionPriority = $introductionPriority;

        return $this;
    }

    /**
     * Get introductionPriority
     *
     * @return integer
     */
    public function getIntroductionPriority()
    {
        return $this->introductionPriority;
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
