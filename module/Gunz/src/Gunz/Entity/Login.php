<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="Login")
 * @ORM\Entity(repositoryClass="Gunz\Repository\LoginRepo")
 */
class Login
{
    /**
     * @var integer
     *
     * @ORM\Column(name="LID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="UserID", type="string", length=20, nullable=false)
     */
    private $user;

	/**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=20, nullable=false)
     */
    private $password;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="LastConnDate", type="datetime", nullable=false)
     */
    private $lastConnDate;

    /**
     * @var string
     *
     * @ORM\Column(name="LastIP", type="string", length=20, nullable=false)
     */
    private $lastIp;

    /**
     *
     * @var \Gunz\Entity\Account
     *
     * @ORM\OneToOne(targetEntity="Gunz\Entity\Account", inversedBy="login")
     * @ORM\JoinColumn(name="AID", referencedColumnName="AID")
     */
    private $account;

    /**
     * Get AID
     *
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get UserID
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set UserID
     *
     * @param string $user
     * @return \Gunz\Entity\Login
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return \Gunz\Entity\Login
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get lastConnDate
     *
     * @return DateTime
     */
    public function getLastConnDate()
    {
        return $this->lastConnDate;
    }

    /**
     * Set lastConnDate
     *
     * @param \DateTime $lastConnDate
     * @return \Gunz\Entity\Account
     */
    public function setLastConnDate(\DateTime $lastConnDate)
    {
        $this->lastConnDate = $lastConnDate;

        return $this;
    }

    /**
     * Get last IP
     *
     * @return string
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set last IP
     *
     * @param string $lastIp
     * @return \Gunz\Entity\Account
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get Account [AID]
     *
     * @return \Gunz\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set Account [AID]
     *
     * @param \Gunz\Entity\Account $account
     * @return \Gunz\Entity\Login
     */
    public function setAccount(\Gunz\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }
}
