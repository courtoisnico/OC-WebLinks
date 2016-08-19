<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 18/08/2016
 * Time: 16:49
 */

namespace WebLinks\Domain;


use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * User id
     *
     * @var integer
     */
    private $id;


    /**
     * User name
     *
     * @var string
     */
    private $username;

    /**
     * User password
     *
     * @var string
     */
    private $password;

    /**
     * Salt that was originaly used to encode the password
     */
    private $salt;

    /**
     * Role
     * Values : ROLE_USER or ROLE_ADMIN
     *
     * @var string
     */
    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // Nothing to do here
    }
}