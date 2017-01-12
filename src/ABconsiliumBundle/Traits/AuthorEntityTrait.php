<?php

namespace ABconsiliumBundle\Traits;

use ABconsiliumBundle\Entity\User;

trait AuthorEntityTrait
{
    /**
     * @param \ABconsiliumBundle\Entity\User $author
     *
     * @return Aim
     */
    public function addAuthor(User $author)
    {
        $this->authors[] = $author;

        return $this;
    }

    /**
     * @param \ABconsiliumBundle\Entity\User $author
     */
    public function removeAuthor(User $author)
    {
        $this->authors->removeElement($author);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}