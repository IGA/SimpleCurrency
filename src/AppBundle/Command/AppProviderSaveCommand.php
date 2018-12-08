<?php

namespace AppBundle\Command;

use AppBundle\CurrencyProvider\CurrencyProviderManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppProviderSaveCommand extends ContainerAwareCommand
{

    /**
     * @var CurrencyProviderManager
     */
    private $currencyProviderManager;

    public function __construct(CurrencyProviderManager $currencyProviderManager, ?string $name = null)
    {
        parent::__construct($name);
        $this->currencyProviderManager = $currencyProviderManager;
    }

    protected function configure()
    {
        $this
            ->setName('app:provider-save')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $io = new SymfonyStyle($input, $output);

        $currencies = $this->currencyProviderManager->process();

        $outputArray = [];

        foreach($currencies as $currency) {
            $outputArray[] = [
                $currency->getId(),
                $currency->getUsd(),
                $currency->getEur(),
                $currency->getGbp(),
                $currency->getProviderName()
            ];
        }

        $io->title('Currency List');
        $io->table(
            ['ID', 'USD', 'EUR', 'GBP', 'Provider Name'],
            $outputArray
        );

        $io->success('Data was processed into the database!');

    }

}
