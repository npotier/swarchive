<?php

namespace Acseo\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Acseo\Bundle\StartupWeekendBundle\Entity\Location as Location;

/**
 * Acseo\Bundle\UserBundle\Entity\User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\UserBundle\Entity\UserRepository")
 */
class User
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
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=45)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=45)
     */
    private $password;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin;

    /** 
     * @var $locations
     *
     * @ORM\ManyToMany(targetEntity="Acseo\Bundle\StartupWeekendBundle\Entity\Location")
     */
    private $locations;

    public function getLocations()
    {
        return $this->locations;
    }

    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    // /** 
    //  * @var $startups
    //  *
    //  * @ORM\ManyToMany(targetEntity="Acseo\Bundle\StartupBundle\Entity\Startup")
    //  */
    // private $startups;

    // public function getStartups()
    // {
    //     return $this->startups;
    // }

    // public function setStartups($startups)
    // {
    //     $this->startups = $startups;
    // }
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get isAdmin
     *
     * @return boolean 
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function __construct()
    {
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->startups = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
