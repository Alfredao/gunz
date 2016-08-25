<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clan
 *
 * @ORM\Table(name="Clan")
 * @ORM\Entity(repositoryClass="Gunz\Repository\ClanRepo")
 */
class Clan
{
    /**
     *
     * @var integer
     *
     * @ORM\Column(name="CLID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Wins", type="integer")
     */
    private $wins;

    /**
     * @var integer
     *
     * @ORM\Column(name="Losses", type="integer")
     */
    private $losses;

    /**
     * @var integer
     *
     * @ORM\Column(name="Point", type="integer")
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", nullable=false)
     */
    private $name;

    /**
     *
     * @var \Gunz\Entity\Character
     *
     * @ORM\ManyToOne(targetEntity="Gunz\Entity\Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MasterCID", referencedColumnName="CID")
     * })
     */
    private $master;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @param string $name
     * @return \Gunz\Entity\Clan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set points
     *
     * @param string $points
     * @return \Gunz\Entity\Clan
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get Wins
     *
     * @return integer
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Set Wins
     *
     * @param string $wins
     * @return \Gunz\Entity\Clan
     */
    public function setWins($wins)
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get Losses
     *
     * @return integer
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * Set Losses
     *
     * @param string $losses
     * @return \Gunz\Entity\Clan
     */
    public function setLosses($losses)
    {
        $this->losses = $losses;

        return $this;
    }

    /**
     * Get master
     *
     * @return \Gunz\Entity\Character
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Set master
     *
     * @param \Gunz\Entity\Character $master
     * @return \Gunz\Entity\Clan
     */
    public function setMaster(\Gunz\Entity\Character $master)
    {
        $this->master = $master;

        return $this;
    }
}

// [Exp]
// [Level]
// [MarkWebImg]
// [Introduction]
// [RegDate]
// [DeleteFlag]
// [DeleteName]
// [Homepage]
// [Draws]
// [Ranking]
// [TotalPoint]
// [Cafe_Url]
// [Email]
// [EmblemUrl]
// [RankIncrease]
// [EmblemChecksum]
// [LastDayRanking]
// [LastMonthRanking]