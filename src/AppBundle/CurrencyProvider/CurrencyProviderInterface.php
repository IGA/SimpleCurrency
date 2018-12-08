<?php

declare(strict_types=1);

namespace AppBundle\CurrencyProvider;

interface CurrencyProviderInterface {

    public const PROVIDER_NAME = null;

    public function getCurrencies();
    public function getProviderName();

}