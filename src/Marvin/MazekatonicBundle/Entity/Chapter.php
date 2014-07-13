<?php

namespace Marvin\MazekatonicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Chapter
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Chapter
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
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\OneToMany(targetEntity="Link", mappedBy="chapter")
     */
    protected $links;

    /**
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="chapters")
     * @ORM\JoinColumn(name="book", referencedColumnName="id")
     */
    protected $book;

    public function __construct()
    {
        $this->links = new ArrayCollection();
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
     * Set position
     *
     * @param int $position
     * @return Chapter
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Chapter
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
     * add link to links set
     *
     * @param Link $link
     * @return Node
     */
    public function addLink(Link $link)
    {
        $this->links->add($link);

        return $this;
    }

    /**
     * Get links
     *
     * @return ArrayCollection
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function toArray()
    {
        return ['title' => $this->title, 'content' => $this->content];
    }

}
