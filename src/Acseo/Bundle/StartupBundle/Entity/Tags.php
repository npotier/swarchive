<?php

namespace Acseo\Bundle\StartupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acseo\Bundle\StartupBundle\Entity\Tags
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acseo\Bundle\StartupBundle\Entity\TagsRepository")
 */
class Tags
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
     * @var string $value
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->getValue();
    }
}