<?php

namespace Acseo\Bundle\StartupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acseo\Bundle\StartupWeekendBundle\Entity\Event;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Acseo\Bundle\StartupBundle\Entity\Startup
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\StartupBundle\Entity\StartupRepository")
 */
class Startup
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
     * @var string $twitter
     *
     * @ORM\Column(name="twitter", type="string", length=50)
     */
    private $twitter;

    /**
     * @var string $facebook
     *
     * @ORM\Column(name="facebook", type="string", length=255)
     */
    private $facebook;

    /**
     * @var string $website
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var string $logo
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string $pitch
     *
     * @ORM\Column(name="pitch", type="string", length=255)
     */
    private $pitch;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var $event
     *
     * @ORM\OneToOne(targetEntity="Acseo\Bundle\StartupWeekendBundle\Entity\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;
 
    /**
     * @var integer $rank
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    public function getRank()
    {
        return $this->rank;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /** 
     * @var $tags
     *
     * @ORM\ManyToMany(targetEntity="Tags")
     * @ORM\JoinTable(name="startup_tags")
     */
    private $tags;

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }


    /** 
     * @var $users
     *
     * @ORM\ManyToMany(targetEntity="Acseo\Bundle\UserBundle\Entity\User")
     * @ORM\JoinTable(name="startup_users")
     */
    private $users;

    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @var $comments
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="startup")
     */
    private $comments;

    /**
     * Get comments
     *
     * @return collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set comments
     *
     */
    public function setComments(ArrayCollection $comments)
    {
        return $this->comments = $comments;
    }
    /**
     * Get event
     *
     * @return integer 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set event
     *
     */
    public function setEvent(Event $event)
    {
        return $this->event = $event;
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
     * Set twitter
     *
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set website
     *
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set pitch
     *
     * @param string $pitch
     */
    public function setPitch($pitch)
    {
        $this->pitch = $pitch;
    }

    /**
     * Get pitch
     *
     * @return string 
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function __construct()
    {
        //Set default rank to 99 in order to have a good sort for non ranked startups
        $this->rank = 99;
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();

    }
}