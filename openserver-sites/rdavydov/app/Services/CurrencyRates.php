<?php


namespace App\Services;


use Exception;
use GuzzleHttp\Client;

class CurrencyRates
{
    public static function getRates() {
        $baseCurrency = CurrencyConversion::getBaseCurrency();

        $url = config('currency_rates.api_url') . $baseCurrency->code;

        $client = new Client();

        $response = $client->request('GET', $url);

        if($response->getStatusCode() !== 200) {
            throw new Exception('Ошибка запроса валют');
        }

        $rates = json_decode($response->getBody()->getContents(), true)['rates'];

        foreach (CurrencyConversion::getCurrencies() as $currency){
            if(!$currency->isMain()){
                if(!isset($rates[$currency->code])){
                    throw new Exception('Ошибка запроса валют' . $currency->code);
                } else {
                    $currency->update(['rate' => $rates[$currency->code]]);
//                    $currency->touch(); много запросов к БД, не знаю как оптимизировать
                }
            }
        }
    }

}
