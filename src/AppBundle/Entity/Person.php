<?php

namespace AppBundle\Entity;

/**
 * Person
 */
class Person
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $patronymic;


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
     * Set name
     *
     * @param string $name
     *
     * @return Person
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
     * Set surname
     *
     * @param string $surname
     *
     * @return Person
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set patronymic
     *
     * @param string $patronymic
     *
     * @return Person
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $phones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add phone
     *
     * @param \AppBundle\Entity\Phone $phone
     *
     * @return Person
     */
    public function addPhone(\AppBundle\Entity\Phone $phone)
    {
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \AppBundle\Entity\Phone $phone
     */
    public function removePhone(\AppBundle\Entity\Phone $phone)
    {
        $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    public function __toString()
    {
        return $this->name;
    }
}
