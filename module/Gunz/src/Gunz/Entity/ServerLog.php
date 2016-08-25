<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServerStatus
 *
 * @ORM\Table(name="ServerLog")
 * @ORM\Entity(repositoryClass="Gunz\Repository\ServerLogRepo")
 */
class ServerLog
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @var \Gunz\Entity\ServerStatus
     *
     * @ORM\ManyToOne(targetEntity="Gunz\Entity\ServerStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ServerID", referencedColumnName="ServerID")
     * })
     */
    private $server;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerCount", type="integer", nullable=false)
     */
    private $playerCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="GameCount", type="integer", nullable=false)
     */
    private $gameCount;

}
