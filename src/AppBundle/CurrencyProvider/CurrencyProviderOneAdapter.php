<?php

declare(strict_types=1);

namespace AppBundle\CurrencyProvider;

class CurrencyProviderOneAdapter extends BaseCurrencyProvider
{

    public const PROVIDER_NAME = 'Provider1';
    public const PROVIDER_URL = 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0';
    public const PROVIDER_RESPONSE_ROOT = 'result';

    public const CURRENCY_SYMBOL_NAME = 'symbol';
    public const CURRENCY_VALUE_NAME = 'amount';

    public const CURRENCY_USD_SYMBOL = 'USDTRY';
    public const CURRENCY_EUR_SYMBOL = 'EURTRY';
    public const CURRENCY_GBP_SYMBOL = 'GBPTRY';

}