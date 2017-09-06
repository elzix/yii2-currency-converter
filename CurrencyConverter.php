<?php

namespace elzix\CurrencyConverter;

class CurrencyConverter implements CurrencyConverterInterface
{

    /**
     * @var Provider\ProviderInterface
     */
    protected $rateProvider;

    /**
     * {@inheritDoc}
     */
    public function convert($api, $from, $to, $amount = 1)
    {
        $fromCurrency = $this->parseCurrencyArgument($from);
        $toCurrency = $this->parseCurrencyArgument($to);

        $rate = $this->getRateProvider()->getRate($api, $fromCurrency, $toCurrency);

        return $rate * $amount;
    }

    /**
     * Gets Rate Provider
     *
     * @return Provider\ProviderInterface
     */
    public function getRateProvider()
    {
        if (!$this->rateProvider) {
            $this->setRateProvider(new Provider\oxrApi());
        }

        return $this->rateProvider;
    }

    /**
     * Sets rate provider
     *
     * @param  Provider\ProviderInterface $rateProvider
     * @return self
     *
     */
    public function setRateProvider(Provider\ProviderInterface $rateProvider)
    {
        $this->rateProvider = $rateProvider;

        return $this;
    }

    /**
     * Parses the Currency Arguments
     *
     * @param string|array $data
     * @return string
     * @throws Exception\InvalidArgumentException
     */
    protected function parseCurrencyArgument($data)
    {
        if (is_string($data)) {
            $currency = $data;
        } elseif (is_array($data)) {
            if (isset($data['country'])) {
                $currency = CountryToCurrency::getCurrency($data['country']);
            } elseif (isset($data['currency'])) {
                $currency = $data['currency'];
            } else {
                throw new Exception\InvalidArgumentException('Please provide country or currency!');
            }
        } else {
            throw new Exception\InvalidArgumentException('Invalid currency provided. String or array expected.');
        }

        return $currency;
    }
}
