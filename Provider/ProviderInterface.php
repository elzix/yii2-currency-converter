<?php
namespace elzix\CurrencyConverter\Provider;

interface ProviderInterface
{
    /**
     * Gets exchange rate from API
     *
     * @param  string $fromCurrency
     * @param  string $toCurrency
     * @return float
     */
    public function getRate($api, $fromCurrency, $toCurrency);
}
