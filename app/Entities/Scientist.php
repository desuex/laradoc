<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04.10.2018
 * Time: 11:27
 */

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Scientist
 * @package App\Entities
 * @ORM\Entity(repositoryClass="ScientistRepository")
 * @ORM\Table(name="scientist")
 */
class Scientist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @ORM\OneToMany(targetEntity="Theory", mappedBy="scientist",cascade={"persist"})
     * @var ArrayCollection|Theory[]
     */
    protected $theories;

    /**
     * Scientist constructor.
     * @param $firstname
     * @param $lastname
     */
    public function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $this->theories = new ArrayCollection;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    public function addTheory(Theory $theory)
    {
        if(!$this->theories->contains($theory)){
            $theory->setScientist($this);
            $this->theories->add($theory);
        }
    }

    /**
     * @return Theory[]|ArrayCollection
     */
    public function getTheories()
    {
        return $this->theories;
    }
}