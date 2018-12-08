<?php

declare(strict_types=1);

namespace AppBundle\CurrencyProvider;

class CurrencyProviderTwoAdapter extends BaseCurrencyProvider
{

    public const CURRENCY_SYMBOL_NAME = 'kod';
    public const CURRENCY_VALUE_NAME = 'oran';

    public const CURRENCY_USD_SYMBOL = 'DOLAR';
    public const CURRENCY_EUR_SYMBOL = 'AVRO';
    public const CURRENCY_GBP_SYMBOL = 'İNGİLİZ STERLİNİ';

    public const PROVIDER_NAME = 'Provider2';
    public const PROVIDER_URL = 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3';

}