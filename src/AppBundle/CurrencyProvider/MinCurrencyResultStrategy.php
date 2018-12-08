<?php

namespace AppBundle\CurrencyProvider;

class MinCurrencyResultStrategy implements CurrencyResultStrategy
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

        $minUsd = min($usd);
        $minEur = min($eur);
        $minGbp = min($gbp);

        $output = [];

        $object = new \stdClass();
        $object->name = 'USD';
        $object->value = $minUsd;
        $object->provider = $providerName[array_search($minUsd, $usd, true)];
        $output[] = $object;

        $object = new \stdClass();
        $object->name = 'EUR';
        $object->value = $minEur;
        $object->provider = $providerName[array_search($minEur, $eur, true)];
        $output[] = $object;

        $object = new \stdClass();
        $object->name = 'GBP';
        $object->value = $minGbp;
        $object->provider = $providerName[array_search($minGbp, $gbp, true)];
        $output[] = $object;

        return $output;

    }

}