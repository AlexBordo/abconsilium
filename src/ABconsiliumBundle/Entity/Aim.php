<?php

namespace ABconsiliumBundle\Entity;

use ABconsiliumBundle\Traits\AuthorEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="aims")
 * @ORM\Entity(repositoryClass="ABconsiliumBundle\Repository\AimRepository")
 */
class Aim extends AbstractEntity implements EntityAuthorInterface
{
    use AuthorEntityTrait;

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
     * @ORM\ManyToMany(targetEntity="User", mappedBy="aims")
     */
    private $authors;

    public function __construct(User $user)
    {
        $this->authors = new ArrayCollection();
        $this->addAuthor($user);
    }

    /**
     * @param string $title
     *
     * @return $this
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
     * @return $this
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
}
