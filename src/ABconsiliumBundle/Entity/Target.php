<?php

namespace ABconsiliumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Target
 *
 * @ORM\Table(name="targets")
 * @ORM\Entity(repositoryClass="ABconsiliumBundle\Repository\TargetRepository")
 */
class Target extends AbstractEntity
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="targets")
     * @ORM\JoinColumn(name="target_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @param string $title
     *
     * @return Target
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
     * @return Target
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
     * @return Target
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
}
