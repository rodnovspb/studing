<?php


namespace App\Services;


use App\Models\Currency;
use Carbon\Carbon;

class CurrencyConversion
{
    protected static $container;

    public static function getCurrencyFromSession() {
        return session('currency', 'RUB');
    }

    public static function loadContainer() {
        if(is_null(self::$container)){
            $currencies = Currency::get();
            foreach ($currencies as $currency) {
                self::$container[$currency->code] = $currency;
            }
        }
    }

    public static function getCurrencies(){
        self::loadContainer();
        return self::$container;
    }

    public static function convert($sum, $originCurrencyCode = 'RUB', $targetCurrencyCode = null) {
        self::loadContainer();

        $originCurrency = self::$container[$originCurrencyCode];

        if($originCurrency->rate !=0 || $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()){
//            CurrencyRates::getRates(); стоит ограничение на запросы, поэтому нафиг
            self::loadContainer();
            $originCurrency = self::$container[$originCurrencyCode];
        }

        if(is_null($targetCurrencyCode)){
            $targetCurrencyCode = self::getCurrencyFromSession();
        }
        $targetCurrency = self::$container[$targetCurrencyCode];

        if($originCurrency->rate !=0 || $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()){
//            CurrencyRates::getRates();
            self::loadContainer();
            $originCurrency = self::$container[$originCurrencyCode];
        }

        return round($sum / $originCurrency->rate * $targetCurrency->rate, 2);
    }

    public static function getCurrencySymbol() {
        self::loadContainer();

        $currencyFromSession = self::getCurrencyFromSession();
        $currency = self::$container[$currencyFromSession];
        return $currency->symbol;
    }

    public static function getBaseCurrency() {
        self::loadContainer();

        foreach (self::$container as $code => $currency){
            if($currency->isMain()){
                return $currency;
            }
        }
    }

}
