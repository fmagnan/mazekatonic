<?php

namespace Marvin\MazekatonicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edge
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Edge
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
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    protected $text;

    /**
     * @ORM\ManyToOne(targetEntity="Node", inversedBy="edges")
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    protected $source;

    /**
     * @ORM\OneToOne(targetEntity="Node", mappedBy="destination")
     * @ORM\JoinColumn(name="destination_id", referencedColumnName="id")
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
     * Set text
     *
     * @param string $text
     * @return Edge
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set destination
     *
     * @param Node $node
     * @return Edge
     */
    public function setDestination(Node $node)
    {
        $this->node = $node;

        return $this;
    }

    /**
     * Get destination
     *
     * @return Node
     */
    public function getDestination()
    {
        return $this->destination;
    }

    public function bindTo(Node $node)
    {
        $this->source = $node;
    }

}
