<?php

namespace Marvin\MazekatonicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Link
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Chapter", inversedBy="links")
     * @ORM\JoinColumn(name="origin", referencedColumnName="id")
     */
    protected $origin;

    /**
     * @ORM\OneToOne(targetEntity="Chapter", mappedBy="destination")
     * @ORM\JoinColumn(name="destination", referencedColumnName="id")
     */
    protected $destination;

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
     * Set destination
     *
     * @param Chapter $node
     * @return Link
     */
    public function setDestination(Chapter $node)
    {
        $this->node = $node;

        return $this;
    }

    /**
     * Get destination
     *
     * @return Chapter
     */
    public function getDestination()
    {
        return $this->destination;
    }

    public function bindTo(Chapter $node)
    {
        $this->origin = $node;
    }

}
