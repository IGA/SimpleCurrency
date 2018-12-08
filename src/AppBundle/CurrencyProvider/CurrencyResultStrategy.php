<?php

namespace AppBundle\CurrencyProvider;

interface CurrencyResultStrategy
{
    public function get(array $data): array;
}