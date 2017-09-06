<?php

namespace elzix\CurrencyConverter;

use Yii;
use yii\base\UserException;

class CountryToCurrency
{

    /**
     * @var array    key contains country code, value contains respective country currency
     */
    protected static $currencies = [
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
        'BY' => 'BYN',
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

    /**
     * Gets Currency code by Country code
     *
     * @param  string $countryCode Country code
     * @return string
     * @throws UserException
     */
    public static function getCurrency($countryCode)
    {
        if(strlen($countryCode) < 3): //query one country code
            if (!array_key_exists($countryCode, self::$currencies))
                throw new UserException(sprintf('Unsupported Country Code, %s', $countryCode));
            return self::$currencies[$countryCode];
        else :
            if(strpos($countryCode, ',')) { //query for array
                $currencies = explode(',', $countryCode);
                $notFound = $x = 0;
                $currencyCode[$x] = '';
                foreach ($currencies as $currency):
                    if(strlen($currency) < 3){ //query more than one country code used
                        if (!array_key_exists($currency, self::$currencies)){ 
                            throw new UserException(sprintf('Unsupported Country Code, %s', $currency));
                            $notFound = 1;
                        }
                        else //in_array(needle, haystack)
                            if (!in_array(self::$currencies[$currency], $currencyCode))
                                $currencyCode[$x] = self::$currencies[$currency];
                    }
                    else{ //query more than one currency code
                        if (!in_array($currency, self::$currencies)){
                            throw new UserException(sprintf('Unsupported Currency Code, %s', $currency));
                            $notFound = 1;
                        }
                        else 
                            if (!in_array($currency, $currencyCode))
                                $currencyCode[$x] = $currency;
                    }
                    $x++;
                endforeach;
                    
                if ($notFound == 0){
                    $currencyCode = implode(',', $currencyCode);
                    return $currencyCode;
                }
            }
            else { //query one currency code
                if (!in_array($countryCode, self::$currencies))
                    throw new UserException(sprintf('Unsupported Currency Code, %s', $countryCode));
                else return $countryCode;
            }return $countryCode;
        endif;        
    }
}
