<?php

namespace ABconsiliumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Todo
 *
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
     * @ORM\JoinColumn(name="todo_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime", nullable=true)
     */
    private $dateCreated;

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
}
