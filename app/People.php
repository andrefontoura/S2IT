<?php

namespace S2Test\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="people")
 */
class People
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $personid;

    /**
     * @ORM\Column(type="string")
     */
    private $personname;

    /**
     * @ORM\Column(type="string")
     */
    //private $phone;

    /**
     * User constructor.
     * @param $personid
     * @param $personname
     */
    public function __construct($personid, $personname)
    {
        $this->personid = $personid;
        $this->personname = $personname;
        //$this->description = $description;
    }

    public function getId()
    {
        return $this->personid;
    }

    public function getName()
    {
        return $this->personname;
    }

    public function setName($name)
    {
        $this->personname = $name;
    }

    public function setId($id)
    {
        $this->personid = $id;
    }

}