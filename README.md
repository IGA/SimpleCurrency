EnUygunTask
===========

A Symfony project created on December 8, 2018, 7:03 am.

### Commands
```
git clone https://github.com/IGA/SimpleCurrency.git
cd SimpleCurrency
composer update
php bin/console doctrine:schema:create
php bin/console app:provider-save
php bin/console server:run
```

### How do I add new adapter
You must create a new adapter with BaseCurrencyProvider. Example;
```
namespace AppBundle\CurrencyProvider;

class CurrencyProviderCustomAdapter extends BaseCurrencyProvider
{

    public const PROVIDER_NAME = 'Provider3';   // Provider Name
    public const PROVIDER_URL = 'PROVIDER_URL'; // Provider URL
    public const PROVIDER_RESPONSE_ROOT = '';   // Provider response path

    public const CURRENCY_SYMBOL_NAME = 'symbol';   // Currency symbol key
    public const CURRENCY_VALUE_NAME = 'amount';    // Currency value key

    public const CURRENCY_USD_SYMBOL = 'USDTRY';    // USD currency symbol
    public const CURRENCY_EUR_SYMBOL = 'EURTRY';    // EUR currency symbol
    public const CURRENCY_GBP_SYMBOL = 'GBPTRY';    // GBP currency symbol

}
```
You must define the provider adapter in parameters.yml
```
providers:
    - AppBundle\CurrencyProvider\CurrencyProviderOneAdapter
    - AppBundle\CurrencyProvider\CurrencyProviderTwoAdapter
    - AppBundle\CurrencyProvider\CurrencyProviderCustomAdapter
```
Finally run the following command
```$xslt
php bin/console app:provider-save
```
#### Featured Uses
- Symfony 3.4
- Adapter Design Pattern
- Strategy Design Pattern
- SQLite
- Bootstrap
- jQuery