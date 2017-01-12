<?php

namespace ABconsiliumBundle\Entity;

interface EntityAuthorInterface
{
    public function addAuthor(User $author);

    public function removeAuthor(User $author);

    public function getAuthors();
}