<?php

declare(strict_types=1);

namespace AppBundle\CurrencyProvider;

class Currencies
{
    /**
     * @var float
     */
    private $usd;

    /**
     * @var float
     */
    private $eur;

    /**
     * @var float
     */
    private $gbp;

    /**
     * @return float
     */
    public function getUsd(): float
    {
        return $this->usd;
    }

    /**
     * @param float $usd
     * @return Currencies
     */
    public function setUsd(float $usd): Currencies
    {
        $this->usd = $usd;
        return $this;
    }

    /**
     * @return float
     */
    public function getEur(): float
    {
        return $this->eur;
    }

    /**
     * @param float $eur
     * @return Currencies
     */
    public function setEur(float $eur): Currencies
    {
        $this->eur = $eur;
        return $this;
    }

    /**
     * @return float
     */
    public function getGbp(): float
    {
        return $this->gbp;
    }

    /**
     * @param float $gbp
     * @return Currencies
     */
    public function setGbp(float $gbp): Currencies
    {
        $this->gbp = $gbp;
        return $this;
    }

}