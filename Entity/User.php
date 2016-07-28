<?php

namespace aos\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aosuser")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="firstname", type="string", length=255, nullable=true) */
    protected $firstname;
    /** @ORM\Column(name="Alastname", type="string", length=255, nullable=true) */
    protected $lastname;
    /** @ORM\Column(name="phonenumber", type="integer", nullable=true) */
    protected $phonenumber;
    /** @ORM\Column(name="carte_Identite", type="integer", nullable=true) */
    protected $carte_Identite;
    /** @ORM\Column(name="birthday", type="datetime", nullable=true) */
    protected $birthday;
    /** @ORM\Column(name="gender", type="string", length=255, nullable=true) */
    protected $gender;
    /** @ORM\Column(name="country", type="string", length=255, nullable=true) */
    protected $country;

    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;
    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;

    /** @ORM\Column(name="github_id", type="string", length=255, nullable=true) */
    private $github_id;
    /** @ORM\Column(name="github_access_token", type="string", length=255, nullable=true) */
    protected $github_access_token;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return User
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set carteIdentite
     *
     * @param integer $carteIdentite
     *
     * @return User
     */
    public function setCarteIdentite($carteIdentite)
    {
        $this->carte_Identite = $carteIdentite;

        return $this;
    }

    /**
     * Get carteIdentite
     *
     * @return integer
     */
    public function getCarteIdentite()
    {
        return $this->carte_Identite;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     *
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    /**
     * Set githubId
     *
     * @param string $githubId
     *
     * @return User
     */
    public function setGithubId($githubId)
    {
        $this->github_id = $githubId;

        return $this;
    }

    /**
     * Get githubId
     *
     * @return string
     */
    public function getGithubId()
    {
        return $this->github_id;
    }

    /**
     * Set githubAccessToken
     *
     * @param string $githubAccessToken
     *
     * @return User
     */
    public function setGithubAccessToken($githubAccessToken)
    {
        $this->github_access_token = $githubAccessToken;

        return $this;
    }

    /**
     * Get githubAccessToken
     *
     * @return string
     */
    public function getGithubAccessToken()
    {
        return $this->github_access_token;
    }
}
