<?php

namespace AppBundle\CurrencyProvider;

class MaxCurrencyResultStrategy implements CurrencyResultStrategy
{

    public function get(array $data): array
    {

        $usd = [];
        $eur = [];
        $gbp = [];
        $providerName = [];

        foreach($data as $currency) {
            $usd[] = $currency->getUsd();
            $eur[] = $currency->getEur();
            $gbp[] = $currency->getGbp();
            $providerName[] = $currency->getProviderName();
        }

        $maxUsd = max($usd);
        $maxEur = max($eur);
        $maxGbp = max($gbp);

        $output = [];

        $object = new \stdClass();
        $object->name = 'USD';
        $object->value = $maxUsd;
        $object->provider = $providerName[array_search($maxUsd, $usd, true)];
        $output[] = $object;

        $object = new \stdClass();
        $object->name = 'EUR';
        $object->value = $maxEur;
        $object->provider = $providerName[array_search($maxEur, $eur, true)];
        $output[] = $object;

        $object = new \stdClass();
        $object->name = 'GBP';
        $object->value = $maxGbp;
        $object->provider = $providerName[array_search($maxGbp, $gbp, true)];
        $output[] = $object;

        return $output;

    }

}