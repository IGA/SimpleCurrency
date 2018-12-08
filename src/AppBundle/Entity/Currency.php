<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CurrencyRepository")
 */
class Currency
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usd", type="decimal", precision=10, scale=0)
     */
    private $usd;

    /**
     * @var string
     *
     * @ORM\Column(name="eur", type="decimal", precision=10, scale=0)
     */
    private $eur;

    /**
     * @var string
     *
     * @ORM\Column(name="gbp", type="decimal", precision=10, scale=0)
     */
    private $gbp;

    /**
     * @var string
     *
     * @ORM\Column(name="providerName", type="string", length=255, unique=true)
     */
    private $providerName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set usd
     *
     * @param string $usd
     *
     * @return Currency
     */
    public function setUsd($usd)
    {
        $this->usd = $usd;

        return $this;
    }

    /**
     * Get usd
     *
     * @return string
     */
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * Set eur
     *
     * @param string $eur
     *
     * @return Currency
     */
    public function setEur($eur)
    {
        $this->eur = $eur;

        return $this;
    }

    /**
     * Get eur
     *
     * @return string
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * Set gbp
     *
     * @param string $gbp
     *
     * @return Currency
     */
    public function setGbp($gbp)
    {
        $this->gbp = $gbp;

        return $this;
    }

    /**
     * Get gbp
     *
     * @return string
     */
    public function getGbp()
    {
        return $this->gbp;
    }

    /**
     * Set providerName
     *
     * @param string $providerName
     *
     * @return Currency
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;

        return $this;
    }

    /**
     * Get providerName
     *
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }
}

