<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class MainController extends Controller
{
    static $months = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );

    static $square = [
        0.13169,
        0.11706,
        0.09684,
        0.11375,
        0.11375,
        0.1014,
        0.09125,
        0.11375,
        0.12044
    ];

    /*Процент за ПЭС*/
    static $comission = 1;


    public function index() {
        $bill = Bill::query()->orderBy('id', 'desc')->simplePaginate(1);
        $billArr = $bill[0];
        $id = $bill[0]->id;
        /*получим запись расчета за прошлый месяц*/
        $lastBill = Bill::query()->find($id-1);
        $lastBill = Bill::query()->where('id', '<', $id)->orderBy('id', 'desc')->first();
        /*получим массив с э/э за этот месяц*/
        $nowBillElectArr = self::getBillElect($billArr);
        /*получим массив с э/э за прошлый месяц*/
        $lastBillElectArr = self::getBillElect($lastBill);
        /*получим массив с расходом за месяц*/
        $diffElectArr = self::getDiffArr($nowBillElectArr,  $lastBillElectArr);
        /*получим массив с расходом э/э умноженным на 6р/квт-ч*/
        $costElectArr = self::getCostArr($diffElectArr, 6);
        /*получим сумму по студиям за прошлый месяц*/
        $lastElectSum = array_sum($lastBillElectArr);
        /*получим сумму по студиям за этот' месяц*/
        $nowElectSum = array_sum($nowBillElectArr);
        /*получим сумму в квт расхода э/э по студиям за месяц*/
        $sumElect = array_sum($diffElectArr);
        /*получим стоимость расхода э/э по студиям за месяц*/
        $costElect = array_sum($costElectArr);
        /*получим разницу в деньгах между э/э за всю квартиру и э/э за студии*/
        $diffElect = round($billArr->electricity - $costElect, 1);
        /*распределим разницу в э/э по студиям по площади*/
        $electBySquareArr = self::getCostElectBySquare($diffElect);
        /*распределим тко по студиям по площади*/
        $tkoBySquareArr = self::getCostTkoBySquare($billArr->tko);
        /*распределим к/у по студиям по площади*/
        $kuBySquareArr = self::getCostKuBySquare($billArr->ku);
        /*получим итоговую сумму за все по студиям*/
        $result = self::getResultSum($costElectArr, $electBySquareArr, $tkoBySquareArr, $kuBySquareArr);
        /*получим общую сумму*/
        $sumForAll = array_sum($result);
        /*получим итоговую сумму за все по студиям + 1 % за ПЭС*/
        $resultWithComission = self::getResultSumWithCommission($costElectArr, $electBySquareArr, $tkoBySquareArr, $kuBySquareArr);
        /*получим общую сумму + 1 процент ПЭС*/
        $sumForAllWithComission = array_sum($resultWithComission);
        /*получим дату строкой*/
        $date = getDateString($bill[0]->bill_date);


        return view('index', compact('bill', 'nowBillElectArr', 'lastBillElectArr', 'diffElectArr', 'costElectArr', 'lastElectSum', 'nowElectSum', 'sumElect', 'costElect', 'diffElect', 'electBySquareArr', 'tkoBySquareArr', 'kuBySquareArr', 'result', 'sumForAll', 'resultWithComission', 'sumForAllWithComission', 'date'));
    }

    public function getBillElect($bill) {
        $arr = [];
        if(isset($bill)){
            $bill = $bill->toArray();
            $i = 1;
            foreach ($bill as $k => $v){
                if(preg_match("#st[1-9]_elect#", $k)){
                    $arr[$i] = $v;
                        $i++;
                }
            }
        } else {
            $arr = array_fill(1, 9, 0);
        }
        return $arr;
    }

    public function getDiffArr($arr1, $arr2) {
        $arr = [];
        for($i = 1; $i <= count($arr1); $i++){
            $arr[$i] = $arr1[$i] - $arr2[$i];
        }
        return $arr;
    }

    public function getCostArr($arr, $cost) {
        for ($i=1; $i <= count($arr); $i++){
            $arr[$i] = $arr[$i] * $cost;
        }
        return $arr;
    }

    public function getCostElectBySquare($sum) {
        $arr = [];
        $squares = MainController::$square;

        for($i = 1; $i <= count($squares); $i++){
            $arr[$i] = round($squares[$i-1]*$sum, 1);
        }

        return $arr;
    }

    public function getCostTkoBySquare($sum) {
        $arr = [];
        $squares = MainController::$square;

        for($i = 1; $i <= count($squares); $i++){
            $arr[$i] = round($squares[$i-1]*$sum, 1);
        }

        return $arr;
    }

    public function getCostKuBySquare($sum) {
        $arr = [];
        $squares = MainController::$square;

        for($i = 1; $i <= count($squares); $i++){
            $arr[$i] = round($squares[$i-1]*$sum, 1);
        }

        return $arr;
    }

    public function getResultSum($arr1, $arr2, $arr3, $arr4) {
        $arr = [];
        for($i = 1; $i <= count($arr1); $i++){
            $arr[$i] = ceil($arr1[$i] + $arr2[$i] + $arr3[$i] + $arr4[$i]);
        }

        return $arr;
    }

    public function getResultSumWithCommission($arr1, $arr2, $arr3, $arr4) {
        $arr = [];
        for($i = 1; $i <= count($arr1); $i++){
            $arr[$i] = ceil($arr1[$i] * self::getPercent() + $arr2[$i] * self::getPercent() + $arr3[$i] * self::getPercent() + $arr4[$i]);
        }

        return $arr;
    }

    public static function getPercent(){
        return  1 + (self::$comission / 100);
    }


}
