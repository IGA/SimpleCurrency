<?php

namespace AppBundle\CurrencyProvider;

use AppBundle\Entity\Currency;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class CurrencyProviderManager
{

    /**
     * @var array
     */
    private $providers;
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(array $providers, EntityManagerInterface $entityManager)
    {
        $this->providers = $providers;
        $this->entityManager = $entityManager;
    }

    public function process()
    {

        /**
         * @var Currency[] $currencies
         */
        $currencies = [];

        foreach($this->providers as $providerItem) {
            if(class_exists($providerItem)) {

                /**
                 * @var CurrencyProviderInterface $provider
                 */
                $provider = new $providerItem;

                /**
                 * @var Currencies $data
                 */
                $data = $provider->getCurrencies();
                $providerName = $provider::PROVIDER_NAME;

                $currency = $this->entityManager->getRepository(Currency::class)->findOneBy(['providerName' => $providerName]);

                if(!$currency) {
                    $currency = new Currency();
                }

                $currency
                    ->setUsd($data->getUsd())
                    ->setEur($data->getEur())
                    ->setGbp($data->getGbp())
                    ->setProviderName($providerName);

                if($currency->getId() === null) {
                    $this->entityManager->persist($currency);
                }
                $currencies[] = $currency;

            }
        }

        $this->entityManager->flush();

        return $currencies;

    }

    /**
     * @return array
     */
    public function getMinCurrencies()
    {

        $currencies = $this->entityManager->getRepository(Currency::class)->findAll();

        $currencyResult = new CurrencyResult(new MinCurrencyResultStrategy());
        return $currencyResult->get($currencies);

    }

    /**
     * @return array
     */
    public function getMaxCurrencies()
    {

        $currencies = $this->entityManager->getRepository(Currency::class)->findAll();

        $currencyResult = new CurrencyResult(new MaxCurrencyResultStrategy());
        return $currencyResult->get($currencies);

    }

}