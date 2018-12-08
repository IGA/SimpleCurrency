<?php

namespace AppBundle\Controller;

use AppBundle\CurrencyProvider\CurrencyProviderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

    /**
     * @var CurrencyProviderManager
     */
    private $currencyProviderManager;

    public function __construct(CurrencyProviderManager $currencyProviderManager)
    {

        $this->currencyProviderManager = $currencyProviderManager;
    }

    /**
     * @Route("/", name="homepage")
     * @return Response
     */
    public function indexAction(): Response
    {

        $minCurrencies = $this->currencyProviderManager->getMinCurrencies();
        $maxCurrencies = $this->currencyProviderManager->getMaxCurrencies();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'minCurrencies' => $minCurrencies,
            'maxCurrencies' => $maxCurrencies
        ]);
    }
}
