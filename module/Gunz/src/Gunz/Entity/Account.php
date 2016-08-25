<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="Account")
 * @ORM\Entity(repositoryClass="Gunz\Repository\AccountRepo")
 */
class Account
{
    const GRADE_NORMAL = '0';
    const GRADE_MUTED = '104';
    const GRADE_GAMEMASTER = '252';
    const GRADE_DEVELOPER = '254';
    const GRADE_ADMINISTRATOR = '255';

    const PGRADE_FREE = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="AID", type="integer", nullable=false)
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
     * @var int
     *
     * @ORM\Column(name="UGradeID", type="integer", length=11, nullable=false)
     */
    private $gradeId;

	/**
     * @var integer
     *
     * @ORM\Column(name="PGradeID", type="integer", length=11, nullable=false)
     */
    private $pGradeId;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="RegDate", type="datetime", nullable=false)
     */
    private $regDate;

     /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=50, nullable=false)
     */
    private $name;

     /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=true)
     */
    private $email;

     /**
     * @var string
     *
     * @ORM\Column(name="RegNum", type="string", length=50, nullable=true)
     */
    private $regNum;

     /**
     * @var integer
     *
     * @ORM\Column(name="Age", type="integer", length=2, nullable=true)
     */
    private $age;

     /**
     * @var string
     *
     * @ORM\Column(name="ZipCode", type="string", length=50, nullable=true)
     */
    private $zip;

	/**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=256, nullable=true)
     */
    private $address;

	/**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=50, nullable=true)
     */
    private $country;

	/**
     * @var integer
     *
     * @ORM\Column(name="LastCID", type="integer", length=11, nullable=true)
     */
    private $lastCharacter;

	/**
     * @var integer
     *
     * @ORM\Column(name="Cert", type="integer", length=11, nullable=true)
     */
    private $cert;

	/**
     * @var string
     *
     * @ORM\Column(name="Question", type="string", length=50, nullable=true)
     */
    private $question;

	/**
     * @var string
     *
     * @ORM\Column(name="Answer", type="string", length=30, nullable=true)
     */
    private $answer;

	/**
     * @var string
     *
     * @ORM\Column(name="Status", type="integer", length=1, nullable=true)
     */
    private $status;

    /**
     *
     * @var \Gunz\Entity\Login
     *
     * @ORM\OneToOne(targetEntity="Gunz\Entity\Login", mappedBy="account", cascade={"persist"})
     */
    private $login;

	// [EndblockDate] [smalldatetime] NULL,
	// [LastLoginTime] [smalldatetime] NULL,
	// [LastLogoutTime] [smalldatetime] NULL,
	// [ServerID] [int] NULL,
	// [BlockType] [tinyint] NULL,
	// [HackingType] [tinyint] NULL,
	// [HackingRegTime] [smalldatetime] NULL,
	// [EndHackingBlockTime] [smalldatetime] NULL,
	// [IsPowerLevelingHacker] [tinyint] NULL,
	// [PowerLevelingRegDate] [datetime] NULL

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
     * @return \Gunz\Entity\Account
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get UGradeID
     *
     * @return int
     */
    public function getGradeId()
    {
        return $this->gradeId;
    }

    /**
     * Set UGradeID
     *
     * @param int $gradeId
     * @return \Gunz\Entity\Account
     */
    public function setGradeId($gradeId)
    {
        $this->gradeId = $gradeId;

        return $this;
    }

    /**
     * Get PGradeID
     *
     * @return int
     */
    public function getPGradeId()
    {
        return $this->pGradeId;
    }

    /**
     * Set PGradeID
     *
     * @param int $pGradeId
     * @return \Gunz\Entity\Account
     */
    public function setPGradeId($pGradeId)
    {
        $this->pGradeId = $pGradeId;

        return $this;
    }

    /**
     * Get RegDate
     *
     * @return DateTime
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set RegDate
     *
     * @param \DateTime $regDate
     * @return \Gunz\Entity\Account
     */
    public function setRegDate(\DateTime $regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get First Name
     *
     * @return string
     */
    public function getFirstName()
    {
        $name = explode(" ", $this->name);
        return reset($name);
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return \Gunz\Entity\Account
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return \Gunz\Entity\Account
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get RegNum
     *
     * @return string
     */
    public function getRegNum()
    {
        return $this->regNum;
    }

    /**
     * Set RegNum
     *
     * @param string $regNum
     * @return \Gunz\Entity\Account
     */
    public function setRegNum($regNum)
    {
        $this->regNum = $regNum;

        return $this;
    }

    /**
     * Get Age
     *
     * @return number
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set Age
     *
     * @param int $age
     * @return \Gunz\Entity\Account
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set zip
     *
     * @param $zip
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get zip
     *
     * @param $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Set country
     *
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get last character
     *
     * @return int
     */
    public function getLastCharacter()
    {
        return $this->lastCharacter;
    }

    /**
     * Set last character
     *
     * @param $lastCharacter
     * @return $this
     */
    public function setLastCharacter($lastCharacter)
    {
        $this->lastCharacter = $lastCharacter;

        return $this;
    }

    /**
     * Get cert
     *
     * @return int
     */
    public function getCert()
    {
        return $this->cert;
    }

    /**
     * Set cert
     *
     * @param $cert
     * @return $this
     */
    public function setCert($cert)
    {
        $this->cert = $cert;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set question
     *
     * @param $question
     * @return $this
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get secret answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set secret answer
     * @param $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get login
     *
     * @return \Gunz\Entity\Login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set login
     *
     * @param \Gunz\Entity\Login $Login
     * @return \Gunz\Entity\Account
     */
    public function setLogin(\Gunz\Entity\Login $login = null)
    {
        $this->login = $login;

        return $this;
    }
}
