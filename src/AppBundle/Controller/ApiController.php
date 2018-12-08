<?php

namespace AppBundle\Controller;

use AppBundle\CurrencyProvider\CurrencyProviderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 *
 * @Route("/api/v1")
 * @package AppBundle\Controller
 */
class ApiController extends Controller
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
     * @Route("/get-currencies", name="get_currencies", methods={"GET"})
     */
    public function getCurrencies(Request $request)
    {
        $filter = $request->query->get('filter', 'min');

        if($filter === 'max') {
            $currencies = $this->currencyProviderManager->getMaxCurrencies();
        } else {
            $currencies = $this->currencyProviderManager->getMinCurrencies();
        }

        $html = $this->renderView('default/currency.html.twig',
            [
                'items' => $currencies
            ]);

        return $this->json(['items' => $currencies, 'html' => $html]);

    }

}