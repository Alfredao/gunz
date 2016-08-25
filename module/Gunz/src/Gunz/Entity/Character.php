<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Character
 *
 * @ORM\Table(name="Character")
 * @ORM\Entity(repositoryClass="Gunz\Repository\CharacterRepo")
 */
class Character
{
    /**
     *
     * @var integer
     *
     * @ORM\Column(name="CID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @var \Gunz\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="Gunz\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="AID", referencedColumnName="AID")
     * })
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="Level", type="integer", nullable=false)
     */

    private $level;
    /**
     * @var integer
     *
     * @ORM\Column(name="Sex", type="integer", nullable=false)
     */
    private $sex;

    /**
     * @var integer
     *
     * @ORM\Column(name="CharNum", type="integer", nullable=false)
     */
    private $charNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="Hair", type="integer", nullable=false)
     */
    private $hair;

    /**
     * @var integer
     *
     * @ORM\Column(name="Face", type="integer", nullable=false)
     */
    private $face;

    /**
     * @var integer
     *
     * @ORM\Column(name="XP", type="integer", nullable=false)
     */
    private $xp;

    /**
     * @var integer
     *
     * @ORM\Column(name="BP", type="integer", nullable=false)
     */
    private $bp;

    /**
     * @var integer
     *
     * @ORM\Column(name="HP", type="integer", nullable=false)
     */
    private $hp;

    /**
     * @var integer
     *
     * @ORM\Column(name="AP", type="integer", nullable=false)
     */
    private $ap;

    /**
     * @var integer
     *
     * @ORM\Column(name="FR", type="integer", nullable=false)
     */
    private $fr;

    /**
     * @var integer
     *
     * @ORM\Column(name="CR", type="integer", nullable=false)
     */
    private $cr;

    /**
     * @var integer
     *
     * @ORM\Column(name="ER", type="integer", nullable=false)
     */
    private $er;

    /**
     * @var integer
     *
     * @ORM\Column(name="WR", type="integer", nullable=false)
     */
    private $wr;

    /**
     * @var integer
     *
     * @ORM\Column(name="head_slot", type="integer", nullable=true)
     */
    private $headSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="chest_slot", type="integer", nullable=true)
     */
    private $chestSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="hands_slot", type="integer", nullable=true)
     */
    private $handsSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="legs_slot", type="integer", nullable=true)
     */
    private $legsSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="feet_slot", type="integer", nullable=true)
     */
    private $feetSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="fingerl_slot", type="integer", nullable=true)
     */
    private $fingerLSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="fingerr_slot", type="integer", nullable=true)
     */
    private $fingerRSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="melee_slot", type="integer", nullable=true)
     */
    private $meleeSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="primary_slot", type="integer", nullable=true)
     */
    private $primarySlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="secondary_slot", type="integer", nullable=true)
     */
    private $secondarySlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom1_slot", type="integer", nullable=true)
     */
    private $custumOneSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom2_slot", type="integer", nullable=true)
     */
    private $custumTwoSlot;

    /**
     * @var integer
     *
     * @ORM\Column(name="RegDate", type="datetime", nullable=true)
     */
    private $regDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="LastTime", type="datetime", nullable=true)
     */
    private $lastTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayTime", type="integer", nullable=true)
     */
    private $playTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="GameCount", type="integer", nullable=true)
     */
    private $gameCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="KillCount", type="integer", nullable=true)
     */
    private $killCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="DeathCount", type="integer", nullable=true)
     */
    private $deathCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="DeleteFlag", type="integer", nullable=true)
     */
    private $deleteFlag;

    /**
     * @var string
     *
     * @ORM\Column(name="DeleteName", type="string", nullable=false)
     */
    private $deleteName;

    // [DeleteName] [varchar](24) NULL,
    // [head_itemid] [int] NULL,
    // [chest_itemid] [int] NULL,
    // [hands_itemid] [int] NULL,
    // [legs_itemid] [int] NULL,
    // [feet_itemid] [int] NULL,
    // [fingerl_itemid] [int] NULL,
    // [fingerr_itemid] [int] NULL,
    // [melee_itemid] [int] NULL,
    // [primary_itemid] [int] NULL,
    // [secondary_itemid] [int] NULL,
    // [custom1_itemid] [int] NULL,
    // [custom2_itemid] [int] NULL,
    // [QuestItemInfo] [binary](292) NULL

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
     * @return \Gunz\Entity\Character
     */
    public function setAccount(\Gunz\Entity\Account $account = null)
    {
        $this->account = $account;

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
     * @param string $name
     * @return \Gunz\Entity\Character
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get level
     *
     * @return number
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return \Gunz\Entity\Character
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get sex
     *
     * @return number
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     * @return \Gunz\Entity\Character
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get char number
     *
     * @return number
     */
    public function getCharNum()
    {
        return $this->charNum;
    }

    /**
     * Set char number
     *
     * @param integer $charNum
     * @return \Gunz\Entity\Character
     */
    public function setCharNum($charNum)
    {
        $this->charNum = $charNum;

        return $this;
    }

    /**
     * @return number
     */
    public function getHair()
    {
        return $this->hair;
    }

    /**
     * @param integer $hair
     * @return \Gunz\Entity\Character
     */
    public function setHair($hair)
    {
        $this->hair = $hair;

        return $this;
    }

    /**
     * @return number
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * @param integer $face
     * @return \Gunz\Entity\Character
     */
    public function setFace($face)
    {
        $this->face = $face;

        return $this;
    }

    /**
     * Get XP
     *
     * @return number
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Set XP
     *
     * @param integer $xp
     * @return \Gunz\Entity\Character
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * @return number
     */
    public function getBp()
    {
        return $this->bp;
    }

    /**
     * @param integer $bp
     * @return \Gunz\Entity\Character
     */
    public function setBp($bp)
    {
        $this->bp = $bp;

        return $this;
    }

    /**
     * @return number
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param integer $hp
     * @return \Gunz\Entity\Character
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * @return number
     */
    public function getAp()
    {
        return $this->ap;
    }

    /**
     * @param integer $ap
     * @return \Gunz\Entity\Character
     */
    public function setAp($ap)
    {
        $this->ap = $ap;

        return $this;
    }

    /**
     * @return number
     */
    public function getFr()
    {
        return $this->fr;
    }

    /**
     * @param integer $fr
     * @return \Gunz\Entity\Character
     */
    public function setFr($fr)
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * @return number
     */
    public function getCr()
    {
        return $this->cr;
    }

    /**
     * @param integer $cr
     * @return \Gunz\Entity\Character
     */
    public function setCr($cr)
    {
        $this->cr = $cr;

        return $this;
    }

    /**
     * @return number
     */
    public function getEr()
    {
        return $this->er;
    }

    /**
     * @param integer $er
     * @return \Gunz\Entity\Character
     */
    public function setEr($er)
    {
        $this->er = $er;

        return $this;
    }

    public function getWr()
    {
        return $this->wr;
    }

    /**
     * @param integer $wr
     * @return \Gunz\Entity\Character
     */
    public function setWr($wr)
    {
        $this->wr = $wr;

        return $this;
    }

    /**
     * @return number
     */
    public function getHeadSlot()
    {
        return $this->headSlot;
    }

    /**
     * @param integer $headSlot
     * @return \Gunz\Entity\Character
     */
    public function setHeadSlot($headSlot)
    {
        $this->headSlot = $headSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getChestSlot()
    {
        return $this->chestSlot;
    }

    /**
     * @param integer $chestSlot
     * @return \Gunz\Entity\Character
     */
    public function setChestSlot($chestSlot)
    {
        $this->chestSlot = $chestSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getHandsSlot()
    {
        return $this->handsSlot;
    }

    /**
     * @param integer $handsSlot
     * @return \Gunz\Entity\Character
     */
    public function setHandsSlot($handsSlot)
    {
        $this->handsSlot = $handsSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getLegsSlot()
    {
        return $this->legsSlot;
    }

    /**
     * @param integer $legsSlot
     * @return \Gunz\Entity\Character
     */
    public function setLegsSlot($legsSlot)
    {
        $this->legsSlot = $legsSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getFeetSlot()
    {
        return $this->feetSlot;
    }

    /**
     * @param integer $feetSlot
     * @return \Gunz\Entity\Character
     */
    public function setFeetSlot($feetSlot)
    {
        $this->feetSlot = $feetSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getFingerLSlot()
    {
        return $this->fingerLSlot;
    }

    /**
     * @param integer $fingerLSlot
     * @return \Gunz\Entity\Character
     */
    public function setFingerLSlot($fingerLSlot)
    {
        $this->fingerLSlot = $fingerLSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getFingerRSlot()
    {
        return $this->fingerRSlot;
    }

    /**
     * @param integer $fingerRSlot
     * @return \Gunz\Entity\Character
     */
    public function setFingerRSlot($fingerRSlot)
    {
        $this->fingerRSlot = $fingerRSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getMeleeSlot()
    {
        return $this->meleeSlot;
    }

    /**
     * @param integer $meleeSlot
     * @return \Gunz\Entity\Character
     */
    public function setMeleeSlot($meleeSlot)
    {
        $this->meleeSlot = $meleeSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getPrimarySlot()
    {
        return $this->primarySlot;
    }

    /**
     * @param integer $primarySlot
     * @return \Gunz\Entity\Character
     */
    public function setPrimarySlot($primarySlot)
    {
        $this->primarySlot = $primarySlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getSecondarySlot()
    {
        return $this->secondarySlot;
    }

    /**
     * @param integer $secondarySlot
     * @return \Gunz\Entity\Character
     */
    public function setSecondarySlot($secondarySlot)
    {
        $this->secondarySlot = $secondarySlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getCustumOneSlot()
    {
        return $this->custumOneSlot;
    }

    /**
     * @param integer $custumOneSlot
     * @return \Gunz\Entity\Character
     */
    public function setCustumOneSlot($custumOneSlot)
    {
        $this->custumOneSlot = $custumOneSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getCustumTwoSlot()
    {
        return $this->custumTwoSlot;
    }

    /**
     * @param integer $custumTwoSlot
     * @return \Gunz\Entity\Character
     */
    public function setCustumTwoSlot($custumTwoSlot)
    {
        $this->custumTwoSlot = $custumTwoSlot;

        return $this;
    }

    /**
     * @return number
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @param integer $regDate
     * @return \Gunz\Entity\Character
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * @return number
     */
    public function getLastTime()
    {
        return $this->lastTime;
    }

    /**
     * @param integer $lastTime
     * @return \Gunz\Entity\Character
     */
    public function setLastTime($lastTime)
    {
        $this->lastTime = $lastTime;

        return $this;
    }

    /**
     * @return number
     */
    public function getPlayTime()
    {
        return $this->playTime;
    }

    /**
     * @param integer $playTime
     * @return \Gunz\Entity\Character
     */
    public function setPlayTime($playTime)
    {
        $this->playTime = $playTime;

        return $this;
    }

    /**
     * @return number
     */
    public function getGameCount()
    {
        return $this->gameCount;
    }

    /**
     * @param integer $gameCount
     * @return \Gunz\Entity\Character
     */
    public function setGameCount($gameCount)
    {
        $this->gameCount = $gameCount;

        return $this;
    }

    /**
     * @return number
     */
    public function getKillCount()
    {
        return $this->killCount;
    }

    /**
     * @param integer $killCount
     * @return \Gunz\Entity\Character
     */
    public function setKillCount($killCount)
    {
        $this->killCount = $killCount;

        return $this;
    }

    /**
     * @return number
     */
    public function getDeathCount()
    {
        return $this->deathCount;
    }

    /**
     * @param integer $deathCount
     * @return \Gunz\Entity\Character
     */
    public function setDeathCount($deathCount)
    {
        $this->deathCount = $deathCount;

        return $this;
    }

    /**
     * @return number
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * @param integer $deleteFlag
     * @return \Gunz\Entity\Character
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeleteName()
    {
        return $this->deleteName;
    }

    /**
     * @param string $deleteName
     * @return \Gunz\Entity\Character
     */
    public function setDeleteName($deleteName)
    {
        $this->deleteName = $deleteName;

        return $this;
    }
}

// [CID] [int] IDENTITY(1,1) NOT NULL, -- PK
// [AID] [int] NOT NULL,
// [Name] [varchar](24) NOT NULL,
// [Level] [smallint] NOT NULL,
// [Sex] [tinyint] NOT NULL,
// [CharNum] [smallint] NOT NULL,
// [Hair] [tinyint] NULL,
// [Face] [tinyint] NULL,
// [XP] [int] NOT NULL,
// [BP] [int] NOT NULL,
// [HP] [smallint] NULL,
// [AP] [smallint] NULL,
// [FR] [int] NULL,
// [CR] [int] NULL,
// [ER] [int] NULL,
// [WR] [int] NULL,
// [head_slot] [int] NULL,
// [chest_slot] [int] NULL,
// [hands_slot] [int] NULL,
// [legs_slot] [int] NULL,
// [feet_slot] [int] NULL,
// [fingerl_slot] [int] NULL,
// [fingerr_slot] [int] NULL,
// [melee_slot] [int] NULL,
// [primary_slot] [int] NULL,
// [secondary_slot] [int] NULL,
// [custom1_slot] [int] NULL,
// [custom2_slot] [int] NULL,
// [RegDate] [datetime] NULL,
// [LastTime] [datetime] NULL,
// [PlayTime] [int] NULL,
// [GameCount] [int] NULL,
// [KillCount] [int] NULL,
// [DeathCount] [int] NULL,
// [DeleteFlag] [tinyint] NULL,
// [DeleteName] [varchar](24) NULL,
// [head_itemid] [int] NULL,
// [chest_itemid] [int] NULL,
// [hands_itemid] [int] NULL,
// [legs_itemid] [int] NULL,
// [feet_itemid] [int] NULL,
// [fingerl_itemid] [int] NULL,
// [fingerr_itemid] [int] NULL,
// [melee_itemid] [int] NULL,
// [primary_itemid] [int] NULL,
// [secondary_itemid] [int] NULL,
// [custom1_itemid] [int] NULL,
// [custom2_itemid] [int] NULL,
// [QuestItemInfo] [binary](292) NULL