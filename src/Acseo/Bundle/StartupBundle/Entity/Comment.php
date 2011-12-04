<?php

namespace Acseo\Bundle\StartupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use  Acseo\Bundle\StartupBundle\Entity\Startup;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Acseo\Bundle\StartupBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\StartupBundle\Entity\CommentRepository")
 */
class Comment
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
     * @var date $date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var text $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


    /**
     * @var $startup
     *
     * @ORM\ManyToOne(targetEntity="Startup", cascade={"all"})
     */
    private $startup;

    /**
     * Get startup
     *
     * @return startup 
     */
    public function getStartup()
    {
        return $this->startup;
    }

    /**
     * Set startups
     *
     */
    public function setStartups(Startup $startups)
    {
        return $this->startup = $startup;
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
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }
}