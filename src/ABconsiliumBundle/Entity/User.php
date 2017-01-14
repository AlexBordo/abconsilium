<?php

namespace ABconsiliumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="ABconsiliumBundle\Repository\UserRepository")
 */
class User extends AbstractEntity implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Todo", mappedBy="author")
     */
    private $todos;

    /**
     * @ORM\OneToMany(targetEntity="Target", mappedBy="author")
     */
    private $targets;

    /**
     * @ORM\ManyToMany(targetEntity="Aim", inversedBy="authors")
     * @ORM\JoinTable(name="user_aim")
     */
    private $aims;

    public function __construct()
    {
        $this->todos = new ArrayCollection();
        $this->targets = new ArrayCollection();
        $this->aims = new ArrayCollection();
        $this->isActive = true;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param \ABconsiliumBundle\Entity\Todo $todo
     *
     * @return User
     */
    public function addTodo(\ABconsiliumBundle\Entity\Todo $todo)
    {
        $this->todos[] = $todo;

        return $this;
    }

    /**
     * @param \ABconsiliumBundle\Entity\Todo $todo
     */
    public function removeTodo(\ABconsiliumBundle\Entity\Todo $todo)
    {
        $this->todos->removeElement($todo);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTodos()
    {
        return $this->todos->getValues();
    }

    /**
     * @param \ABconsiliumBundle\Entity\Target $target
     *
     * @return User
     */
    public function addTarget(\ABconsiliumBundle\Entity\Target $target)
    {
        $this->targets[] = $target;

        return $this;
    }

    /**
     * @param \ABconsiliumBundle\Entity\Target $target
     */
    public function removeTarget(\ABconsiliumBundle\Entity\Target $target)
    {
        $this->targets->removeElement($target);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTarget()
    {
        return $this->targets->getValues();
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTargets()
    {
        return $this->targets->getValues();
    }

    /**
     * @param \ABconsiliumBundle\Entity\Aim $aim
     *
     * @return User
     */
    public function addAim(\ABconsiliumBundle\Entity\Aim $aim)
    {
        $this->aims[] = $aim;

        return $this;
    }

    /**
     * @param \ABconsiliumBundle\Entity\Aim $aim
     */
    public function removeAim(\ABconsiliumBundle\Entity\Aim $aim)
    {
        $this->aims->removeElement($aim);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAims()
    {
        return $this->aims;
    }
}
