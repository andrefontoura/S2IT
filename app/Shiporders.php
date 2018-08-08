<?php

namespace S2Test\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shiporders")
 */
class Shiporders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $orderid;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderperson;

    /**
     * @ORM\Column(type="string")
     */
    private $shipto_name;

    /**
     * @ORM\Column(type="string")
     */
    private $shipto_adress = false;

    /**
     * @ORM\Column(type="string")
     */
    private $shipto_country = false;

    /**
     * @ORM\Column(type="string")
     */
    private $shipto_city = false;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function isDone()
    {
        return $this->isDone;
    }

    public function toggleStatus()
    {
        if(!$this->isDone) {
            $this->isDone = true;
        } else {
            $this->isDone = false;
        }
    }
}