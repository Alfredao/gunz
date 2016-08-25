<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServerStatus
 *
 * @ORM\Table(name="ServerStatus")
 * @ORM\Entity(repositoryClass="Gunz\Repository\ServerStatusRepo")
 */
class ServerStatus
{

    const STATUS_CLOSED = 0;
	const STATUS_OPENED = 1;

	const TYPE_NORMAL = 2;
	const TYPE_CLAN = 3;
	const TYPE_QUEST = 4;
    const TYPE_DEBUG = 6;

    /**
     * @var integer
     *
     * @ORM\Column(name="ServerID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

	/**
     * @var integer
     *
     * @ORM\Column(name="CurrPlayer", type="integer", length=5, nullable=false)
     */
    private $currPlayer;

	/**
     * @var integer
     *
     * @ORM\Column(name="MaxPlayer", type="integer", length=5, nullable=false)
     */
    private $maxPlayer;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="Time", type="datetime", nullable=false)
     */
    private $time;

	/**
     * @var integer
     *
     * @ORM\Column(name="IP", type="string", length=20, nullable=false)
     */
    private $ip;

	/**
     * @var integer
     *
     * @ORM\Column(name="Port", type="integer", length=5, nullable=false)
     */
    private $port;

	/**
     * @var string
     *
     * @ORM\Column(name="ServerName", type="string", nullable=false)
     */
    private $name;

	/**
     * @var integer
     *
     * @ORM\Column(name="Opened", type="integer", length=1, nullable=false)
     */
    private $opened;

	/**
     * @var integer
     *
     * @ORM\Column(name="Type", type="integer", length=1, nullable=false)
     */
    private $type;

	/**
     * @var string
     *
     * @ORM\Column(name="AgentIP", type="string", length=20, nullable=true)
     */
    private $agentIp;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get curr player
     *
     * @return int
     */
    public function getCurrPlayer()
    {
        return $this->currPlayer;
    }

    /**
     * Set curr player
     *
     * @param $currPlayer
     * @return $this
     */
    public function setCurrPlayer($currPlayer)
    {
        $this->currPlayer = $currPlayer;

        return $this;
    }

    /**
     * Get max players
     *
     * @return int
     */
    public function getMaxPlayer()
    {
        return $this->maxPlayer;
    }

    /**
     * Set max players
     *
     * @param $maxPlayer
     * @return $this
     */
    public function setMaxPlayer($maxPlayer)
    {
        $this->maxPlayer = $maxPlayer;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return $this
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get IP
     *
     * @return int
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set IP
     *
     * @param $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set port
     *
     * @param $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get opened
     *
     * @return int
     */
    public function getOpened()
    {
        return $this->opened;
    }

    /**
     * Set opened
     *
     * @param $opened
     * @return $this
     */
    public function setOpened($opened)
    {
        $this->opened = $opened;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get AgentIP
     *
     * @return string
     */
    public function getAgentIp()
    {
        return $this->agentIp;
    }

    /**
     * Set AgentIP
     *
     * @param $agentIp
     * @return $this
     */
    public function setAgentIp($agentIp)
    {
        $this->agentIp = $agentIp;

        return $this;
    }
}
