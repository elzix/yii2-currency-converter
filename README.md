Yii2 Currency Converter
=======================
This extension will help to find out current currency conversion rate. This extension uses Open Exchange Rates's currency conversion API.

Why Use It
-----------
*   Reliable Rate, Uses Open Exchange Rates API
*   Conversion without curreny code (from country code)
*   Conversion of multiple currencies (Comma separated)

Requirements
-----------
*   PHP version 5.4 or later
*   Curl Extension (Optional)



Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist elzix/yii2-currency-converter "dev-master"
```

or add

```
"elzix/yii2-currency-converter": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

First create an account on https://openexchangerates.org/ to obtain an API Key.

Once the extension is installed, simply use it in your code by  :

```php
use Yii;
use elzix\CurrencyConverter\CurrencyConverter;

$converter = new CurrencyConverter();
$ratea =  $converter->convert('Your-API-Key', 'USD', 'NPR'); // Use Single Currency Code
$rateb =  $converter->convert('Your-API-Key', 'USD', 'NGN,NPR,KES'); // Use Multiple Currency Codes
$ratec =  $converter->convert('Your-API-Key', 'US', 'NP'); // Use Single Country Code
$rated =  $converter->convert('Your-API-Key', 'US', 'NG,NP,KE'); // Use Multiple Country Codes
$ratee =  $converter->convert('Your-API-Key', 'USD', 'NG,NPR,KE'); // Mix Multiple Country/Currency Codes

print_r($ratea);  // it will print current Nepalese currency (NPR) rate according to USD
print_r($rateb);  // it will print current Nigerian, Nepalese and Kenyan currencies (NGN,NPR,KES) rates according to USD
print_r($ratec);  // it will print current Nepalese (NP) currency rate according to US
print_r($rated);  // it will print current Nigerian, Nepalese and Kenyan (NG,NP,KE) currencies rates according to US
print_r($ratee);  // it will print current Nigerian, Nepalese and Kenyan currencies (NG,NPR,KE) rates according to USD

$z = 'KE'
print $ratee->$z;  // it will print current Kenyan (KE) currency rate inside $ratee object


```

Available Currency Codes
-----------------------
```php
$currencies = [
        'AF' => 'AFA',
        'AL' => 'ALL',
        'DZ' => 'DZD',
        'AS' => 'USD',
        'AD' => 'EUR',
        'AO' => 'AOA',
        'AI' => 'XCD',
        'AQ' => 'NOK',
        'AG' => 'XCD',
        'AR' => 'ARA',
        'AM' => 'AMD',
        'AW' => 'AWG',
        'AU' => 'AUD',
        'AT' => 'EUR',
        'AZ' => 'AZM',
        'BS' => 'BSD',
        'BH' => 'BHD',
        'BD' => 'BDT',
        'BB' => 'BBD',
        'BY' => 'BYR',
        'BE' => 'EUR',
        'BZ' => 'BZD',
        'BJ' => 'XAF',
        'BM' => 'BMD',
        'BT' => 'BTN',
        'BO' => 'BOB',
        'BA' => 'BAM',
        'BW' => 'BWP',
        'BV' => 'NOK',
        'BR' => 'BRL',
        'IO' => 'GBP',
        'BN' => 'BND',
        'BG' => 'BGL',
        'BF' => 'XAF',
        'BI' => 'BIF',
        'KH' => 'KHR',
        'CM' => 'XAF',
        'CA' => 'CAD',
        'CV' => 'CVE',
        'KY' => 'KYD',
        'CF' => 'XAF',
        'TD' => 'XAF',
        'CL' => 'CLF',
        'CN' => 'CNY',
        'CX' => 'AUD',
        'CC' => 'AUD',
        'CO' => 'COP',
        'KM' => 'KMF',
        'CD' => 'CDZ',
        'CG' => 'XAF',
        'CK' => 'NZD',
        'CR' => 'CRC',
        'HR' => 'HRK',
        'CU' => 'CUP',
        'CY' => 'EUR',
        'CZ' => 'CZK',
        'DK' => 'DKK',
        'DJ' => 'DJF',
        'DM' => 'XCD',
        'DO' => 'DOP',
        'TP' => 'TPE',
        'EC' => 'USD',
        'EG' => 'EGP',
        'SV' => 'USD',
        'GQ' => 'XAF',
        'ER' => 'ERN',
        'EE' => 'EEK',
        'ET' => 'ETB',
        'FK' => 'FKP',
        'FO' => 'DKK',
        'FJ' => 'FJD',
        'FI' => 'EUR',
        'FR' => 'EUR',
        'FX' => 'EUR',
        'GF' => 'EUR',
        'PF' => 'XPF',
        'TF' => 'EUR',
        'GA' => 'XAF',
        'GM' => 'GMD',
        'GE' => 'GEL',
        'DE' => 'EUR',
        'GH' => 'GHC',
        'GI' => 'GIP',
        'GR' => 'EUR',
        'GL' => 'DKK',
        'GD' => 'XCD',
        'GP' => 'EUR',
        'GU' => 'USD',
        'GT' => 'GTQ',
        'GN' => 'GNS',
        'GW' => 'GWP',
        'GY' => 'GYD',
        'HT' => 'HTG',
        'HM' => 'AUD',
        'VA' => 'EUR',
        'HN' => 'HNL',
        'HK' => 'HKD',
        'HU' => 'HUF',
        'IS' => 'ISK',
        'IN' => 'INR',
        'ID' => 'IDR',
        'IR' => 'IRR',
        'IQ' => 'IQD',
        'IE' => 'EUR',
        'IL' => 'ILS',
        'IT' => 'EUR',
        'CI' => 'XAF',
        'JM' => 'JMD',
        'JP' => 'JPY',
        'JO' => 'JOD',
        'KZ' => 'KZT',
        'KE' => 'KES',
        'KI' => 'AUD',
        'KP' => 'KPW',
        'KR' => 'KRW',
        'KW' => 'KWD',
        'KG' => 'KGS',
        'LA' => 'LAK',
        'LV' => 'LVL',
        'LB' => 'LBP',
        'LS' => 'LSL',
        'LR' => 'LRD',
        'LY' => 'LYD',
        'LI' => 'CHF',
        'LT' => 'EUR',
        'LU' => 'EUR',
        'MO' => 'MOP',
        'MK' => 'MKD',
        'MG' => 'MGF',
        'MW' => 'MWK',
        'MY' => 'MYR',
        'MV' => 'MVR',
        'ML' => 'XAF',
        'MT' => 'EUR',
        'MH' => 'USD',
        'MQ' => 'EUR',
        'MR' => 'MRO',
        'MU' => 'MUR',
        'YT' => 'EUR',
        'MX' => 'MXN',
        'FM' => 'USD',
        'MD' => 'MDL',
        'MC' => 'EUR',
        'MN' => 'MNT',
        'MS' => 'XCD',
        'MA' => 'MAD',
        'MZ' => 'MZM',
        'MM' => 'MMK',
        'NA' => 'NAD',
        'NR' => 'AUD',
        'NP' => 'NPR',
        'NL' => 'EUR',
        'AN' => 'ANG',
        'NC' => 'XPF',
        'NZ' => 'NZD',
        'NI' => 'NIC',
        'NE' => 'XOF',
        'NG' => 'NGN',
        'NU' => 'NZD',
        'NF' => 'AUD',
        'MP' => 'USD',
        'NO' => 'NOK',
        'OM' => 'OMR',
        'PK' => 'PKR',
        'PW' => 'USD',
        'PA' => 'PAB',
        'PG' => 'PGK',
        'PY' => 'PYG',
        'PE' => 'PEI',
        'PH' => 'PHP',
        'PN' => 'NZD',
        'PL' => 'PLN',
        'PT' => 'EUR',
        'PR' => 'USD',
        'QA' => 'QAR',
        'RE' => 'EUR',
        'RO' => 'ROL',
        'RU' => 'RUB',
        'RW' => 'RWF',
        'KN' => 'XCD',
        'LC' => 'XCD',
        'VC' => 'XCD',
        'WS' => 'WST',
        'SM' => 'EUR',
        'ST' => 'STD',
        'SA' => 'SAR',
        'SN' => 'XOF',
        'CS' => 'EUR',
        'SC' => 'SCR',
        'SL' => 'SLL',
        'SG' => 'SGD',
        'SK' => 'EUR',
        'SI' => 'EUR',
        'SB' => 'SBD',
        'SO' => 'SOS',
        'ZA' => 'ZAR',
        'GS' => 'GBP',
        'ES' => 'EUR',
        'LK' => 'LKR',
        'SH' => 'SHP',
        'PM' => 'EUR',
        'SD' => 'SDG',
        'SR' => 'SRG',
        'SJ' => 'NOK',
        'SZ' => 'SZL',
        'SE' => 'SEK',
        'CH' => 'CHF',
        'SY' => 'SYP',
        'TW' => 'TWD',
        'TJ' => 'TJR',
        'TZ' => 'TZS',
        'TH' => 'THB',
        'TG' => 'XAF',
        'TK' => 'NZD',
        'TO' => 'TOP',
        'TT' => 'TTD',
        'TN' => 'TND',
        'TR' => 'TRY',
        'TM' => 'TMM',
        'TC' => 'USD',
        'TV' => 'AUD',
        'UG' => 'UGS',
        'UA' => 'UAH',
        'SU' => 'SUR',
        'AE' => 'AED',
        'GB' => 'GBP',
        'US' => 'USD',
        'UM' => 'USD',
        'UY' => 'UYU',
        'UZ' => 'UZS',
        'VU' => 'VUV',
        'VE' => 'VEF',
        'VN' => 'VND',
        'VG' => 'USD',
        'VI' => 'USD',
        'WF' => 'XPF',
        'XO' => 'XOF',
        'EH' => 'MAD',
        'ZM' => 'ZMK',
        'ZW' => 'USD'
    ];

```
