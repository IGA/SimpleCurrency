<?php


namespace AppBundle\CurrencyProvider;


class CurrencyResult
{

    /**
     * @var CurrencyResultStrategy
     */
    private $resultStrategy;

    public function __construct(CurrencyResultStrategy $resultStrategy)
    {
        $this->resultStrategy = $resultStrategy;
    }

    public function get(array $data): array
    {
        return $this->resultStrategy->get($data);
    }

}