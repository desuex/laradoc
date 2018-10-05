<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04.10.2018
 * Time: 11:36
 */

namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Theory
 * @package App\Entities
 * @ORM\Entity(repositoryClass="TheoryRepository")
 * @ORM\Table("theories")
 */
class Theory
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
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="Scientist", inversedBy="theories")
     */
    protected $scientist;

    /**
     * Theory constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function setScientist(Scientist $scientist)
    {
        $this->scientist = $scientist;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getScientist()
    {
        return $this->scientist;
    }
}