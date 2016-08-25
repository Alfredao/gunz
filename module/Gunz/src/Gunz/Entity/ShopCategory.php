<?php

namespace Gunz\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop Category
 *
 * @ORM\Table(name="ShopCategory")
 * @ORM\Entity(repositoryClass="Gunz\Repository\ShopCategoryRepo")
 */
class ShopCategory
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="SCID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

     /**
     * @var string
     *
     * @ORM\Column(name="Nome", type="string", length=255, nullable=false)
     */
    private $nome;

     /**
     * @var int
     *
     * @ORM\Column(name="Ordem", type="integer", nullable=false)
     */
    private $ordem;

     /**
     * @var int
     *
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $status;

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
     * Get Nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set Nome
     *
     * @param string $nome
     * @return \Gunz\Entity\ShopCategory
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get ordem
     *
     * @return string
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * Set status
     *
     * @param string $ordem
     * @return \Gunz\Entity\ShopCategory
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;

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
     * @param string $status
     * @return \Gunz\Entity\ShopCategory
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
