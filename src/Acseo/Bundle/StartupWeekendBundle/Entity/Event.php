<?php

namespace Acseo\Bundle\StartupWeekendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Acseo\Bundle\StartupBundle\Entity as Startup;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Acseo\Bundle\StartupWeekendBundle\Entity\Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\StartupWeekendBundle\Entity\EventRepository")
 */
class Event
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
     * @var date $eventDate
     *
     * @ORM\Column(name="eventDate", type="date")
     */
    private $eventDate;

    /**
     * @var integer $numberOfParticipant
     *
     * @ORM\Column(name="numberOfParticipant", type="integer")
     */
    private $numberOfParticipant;


    /**
     * @var $location
     *
     * @ORM\OneToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * Get location
     *
     * @return integer 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set location
     *
     */
    public function setLocation(Location $location)
    {
        return $this->location = $location;
    }


    /**
     * @var $startups
     *
     * @ORM\OneToMany(targetEntity="Acseo\Bundle\StartupBundle\Entity\Startup", mappedBy="event")
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $startups;

    /**
     * Get startups
     *
     * @return collection 
     */
    public function getStartups()
    {
        return $this->startups;
    }

    /**
     * Set startups
     *
     */
    public function setStartups(ArrayCollection $startups)
    {
        return $this->startups = $startups;
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
     * Set eventDate
     *
     * @param date $eventDate
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    /**
     * Get eventDate
     *
     * @return date 
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set numberOfParticipant
     *
     * @param integer $numberOfParticipant
     */
    public function setNumberOfParticipant($numberOfParticipant)
    {
        $this->numberOfParticipant = $numberOfParticipant;
    }

    /**
     * Get numberOfParticipant
     *
     * @return integer 
     */
    public function getNumberOfParticipant()
    {
        return $this->numberOfParticipant;
    }


    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->startups = new ArrayCollection();
    }

}