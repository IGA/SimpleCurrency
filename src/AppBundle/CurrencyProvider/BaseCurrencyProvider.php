<?php

declare(strict_types=1);

namespace AppBundle\CurrencyProvider;

use GuzzleHttp\Exception\GuzzleException;

abstract class BaseCurrencyProvider implements CurrencyProviderInterface
{
    
    public const PROVIDER_URL = null;
    public const PROVIDER_RESPONSE_ROOT = null;

    public const CURRENCY_SYMBOL_NAME = null;
    public const CURRENCY_VALUE_NAME = null;

    public const CURRENCY_USD_SYMBOL = null;
    public const CURRENCY_EUR_SYMBOL = null;
    public const CURRENCY_GBP_SYMBOL = null;

    /**
     * @return Currencies
     * @throws CurrencyProviderException
     */
    public function getCurrencies(): Currencies
    {

        $client = new \GuzzleHttp\Client();
        $response = null;
        $data = null;

        try {
            $response = $client->request('GET', static::PROVIDER_URL);
            $statusCode = $response->getStatusCode();
            if($statusCode === 200) {
                $data = \json_decode((string) $response->getBody(), true);
            } else {
                throw new CurrencyProviderException('PROVIDER URL IS NOT AVAILABLE (STATUS CODE: ' . $statusCode . ')');
            }
            $data = static::PROVIDER_RESPONSE_ROOT ? $data[static::PROVIDER_RESPONSE_ROOT] : $data;
        } catch (GuzzleException $e) {
            throw new CurrencyProviderException('GUZZLE ERROR: ' . $e->getMessage(), 0, $e);
        }

        $currencies = new Currencies();

        foreach($data as $item) {
            switch ($item[static::CURRENCY_SYMBOL_NAME]) {
                case static::CURRENCY_USD_SYMBOL:
                    $currencies->setUsd((float) $item[static::CURRENCY_VALUE_NAME]);
                    break;
                case static::CURRENCY_EUR_SYMBOL:
                    $currencies->setEur((float) $item[static::CURRENCY_VALUE_NAME]);
                    break;
                case static::CURRENCY_GBP_SYMBOL:
                    $currencies->setGbp((float) $item[static::CURRENCY_VALUE_NAME]);
                    break;
            }
        }

        return $currencies;
    }

    /**
     * @return mixed
     */
    public function getProviderName()
    {
        return $this::PROVIDER_NAME;
    }

}