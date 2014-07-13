<?php

namespace Marvin\MazekatonicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Node
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Node
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\OneToMany(targetEntity="Edge", mappedBy="source")
     */
    protected $edges;

    public function __construct()
    {
        $this->setEdges(new ArrayCollection());
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
     * Set title
     *
     * @param string $title
     * @return Node
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Node
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set edges
     *
     * @param ArrayCollection $edges
     * @return Node
     */
    public function setEdges(ArrayCollection $edges)
    {
        $this->edges = $edges;

        return $this;
    }

    /**
     * Get edges
     *
     * @return ArrayCollection
     */
    public
    function getEdges()
    {
        return $this->edges;
    }

    public
    function toArray()
    {
        return ['title' => $this->title, 'content' => $this->content];
    }

}
