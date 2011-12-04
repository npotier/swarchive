<?php

namespace Acseo\Bundle\StartupWeekendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acseo\Bundle\StartupWeekendBundle\Entity\Location
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\StartupWeekendBundle\Entity\LocationRepository")
 */
class Location
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="string", length=10)
     */
    private $latitude;

    /**
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="string", length=10)
     */
    private $longitude;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set latitude
     *
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}