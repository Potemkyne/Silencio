<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Compagny
 *
 * @ORM\Table(name="compagny")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CompagnyRepository")
 */
class Compagny {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Movie",cascade={"persist"}, inversedBy="companies")
     */
    private $movies;

    /**
     * @var string
     *
     * @ORM\Column(name="compagnyName", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The compagny name must be at least {{ limit }} characters long"
     * )
     */
    private $compagnyName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set compagnyName
     *
     * @param string $compagnyName
     *
     * @return Compagny
     */
    public function setCompagnyName($compagnyName) {
        $this->compagnyName = $compagnyName;

        return $this;
    }

    /**
     * Get compagnyName
     *
     * @return string
     */
    public function getCompagnyName() {
        return $this->compagnyName;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movie
     *
     * @param \BackBundle\Entity\Movie $movie
     *
     * @return Compagny
     */
    public function addMovie(\BackBundle\Entity\Movie $movie) {
        $this->movies[] = $movie;
        return $this;
    }

    /**
     * Remove movie
     *
     * @param \BackBundle\Entity\Movie $movie
     */
    public function removeMovie(\BackBundle\Entity\Movie $movie) {
        $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies() {
        return $this->movies;
    }

    

}
