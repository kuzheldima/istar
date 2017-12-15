<?php

namespace AppBundle\Entity;

/**
 * Phone
 */
class Phone
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $number;


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
     * Set number
     *
     * @param string $number
     *
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * @var \AppBundle\Entity\Person
     */
    private $person;


    /**
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Phone
     */
    public function setPerson(\AppBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}
