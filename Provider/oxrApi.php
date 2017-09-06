<?php
namespace elzix\CurrencyConverter\Provider;

class oxrApi implements ProviderInterface
{
    /**
     * Url where Curl request is made
     *
     * @var strig
     */
    const API_URL = 'https://openexchangerates.org/api/latest.json?app_id=[api]&base=[fromCurrency]&symbols=[toCurrency]';

    /**
     * {@inheritDoc}
     */
    public function getRate($api, $fromCurrency, $toCurrency)
    {
        $fromCurrency = urlencode($fromCurrency);
        $toCurrency = urlencode($toCurrency);

        $url = str_replace(
            ['[api]', '[fromCurrency]', '[toCurrency]'],
            [$api, $fromCurrency, $toCurrency],
            static::API_URL
        );

        // Open CURL session:
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $latest = json_decode($json);

        return (strlen($toCurrency) > 3 )? $latest->rates : $latest->rates->$toCurrency;
    }
}
