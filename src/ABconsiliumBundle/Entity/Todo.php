<?php

namespace ABconsiliumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="todos")
 * @ORM\Entity(repositoryClass="ABconsiliumBundle\Repository\TodoRepository")
 */
class Todo extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="todos")
     * @ORM\JoinTable(name="user_todo")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Target", inversedBy="todos")
     * @ORM\JoinColumn(name="target_id", referencedColumnName="id")
     */
    private $target;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime", nullable=true)
     */
    private $dateCreated;

    public function __construct(User $user)
    {
        $this->author = $user;
    }

    /**
     * @param string $title
     *
     * @return Todo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $content
     *
     * @return Todo
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return Todo
     *
     * @param \ABconsiliumBundle\Entity\User $author
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \DateTime $dateCreated
     *
     * @return Todo
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \ABconsiliumBundle\Entity\Target $target
     *
     * @return Todo
     */
    public function setTarget(\ABconsiliumBundle\Entity\Target $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return \ABconsiliumBundle\Entity\Target
     */
    public function getTarget()
    {
        return $this->target;
    }
}
