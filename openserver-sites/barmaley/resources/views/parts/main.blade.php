<main class="main">
    <div class="content">
        <div class="container">
            <div class="content__block">
                <div class="content__date">{{ $bill[0]->bill_date }}</div>
                <div class="bills">
                    <div class="bills__item">
                        Электроснабжение: <span>{{ $bill[0]->electricity }} р.</span>
                    </div>
                    <div class="bills__item">
                        Обращение с ТКО: <span>{{ $bill[0]->tko }} р.</span>
                    </div>
                    <div class="bills__item">
                        Коммунальные услуги: <span>{{ $bill[0]->ku }} р.</span>
                    </div>
                </div>



                <table class="table content__price">
                    <tr>
                        <th>Студия</th>
                        <th>Сумма</th>
                        <th>Площадь (м2)</th>
                        <th>% площади</th>
                        <th>Э/э за текущий месяц</th>
                        <th>Э/э за прошлый мес.</th>
                        <th>Расход э/э</th>
                        <th>*6 руб</th>
                        <th>Э/э общая</th>
                        <th>ТКО</th>
                        <th>К/У</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>{{ $result[1] }}</td>
                        <td>16,74</td>
                        <td>0,13169</td>
                        <td>{{ $nowBillElectArr[1] }}</td>
                        <td>{{ $lastBillElectArr[1] }}</td>
                        <td>{{ $diffElectArr[1] }}</td>
                        <td>{{ $costElectArr[1] }}</td>
                        <td>{{ $electBySquareArr[1] }}</td>
                        <td>{{ $tkoBySquareArr[1] }}</td>
                        <td>{{ $kuBySquareArr[1] }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $result[2] }}</td>
                        <td>14,88</td>
                        <td>0,11706</td>
                        <td>{{ $nowBillElectArr[2] }}</td>
                        <td>{{ $lastBillElectArr[2] }}</td>
                        <td>{{ $diffElectArr[2] }}</td>
                        <td>{{ $costElectArr[2] }}</td>
                        <td>{{ $electBySquareArr[2] }}</td>
                        <td>{{ $tkoBySquareArr[2] }}</td>
                        <td>{{ $kuBySquareArr[2] }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $result[3] }}</td>
                        <td>12,31</td>
                        <td>0,09684</td>
                        <td>{{ $nowBillElectArr[3] }}</td>
                        <td>{{ $lastBillElectArr[3] }}</td>
                        <td>{{ $diffElectArr[3] }}</td>
                        <td>{{ $costElectArr[3] }}</td>
                        <td>{{ $electBySquareArr[3] }}</td>
                        <td>{{ $tkoBySquareArr[3] }}</td>
                        <td>{{ $kuBySquareArr[3] }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $result[4] }}</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $nowBillElectArr[4] }}</td>
                        <td>{{ $lastBillElectArr[4] }}</td>
                        <td>{{ $diffElectArr[4] }}</td>
                        <td>{{ $costElectArr[4] }}</td>
                        <td>{{ $electBySquareArr[4] }}</td>
                        <td>{{ $tkoBySquareArr[4] }}</td>
                        <td>{{ $kuBySquareArr[4] }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $result[5] }}</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $nowBillElectArr[5] }}</td>
                        <td>{{ $lastBillElectArr[5] }}</td>
                        <td>{{ $diffElectArr[5] }}</td>
                        <td>{{ $costElectArr[5] }}</td>
                        <td>{{ $electBySquareArr[5] }}</td>
                        <td>{{ $tkoBySquareArr[5] }}</td>
                        <td>{{ $kuBySquareArr[5] }}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>{{ $result[6] }}</td>
                        <td>12,89</td>
                        <td>0,1014</td>
                        <td>{{ $nowBillElectArr[6] }}</td>
                        <td>{{ $lastBillElectArr[6] }}</td>
                        <td>{{ $diffElectArr[6] }}</td>
                        <td>{{ $costElectArr[6] }}</td>
                        <td>{{ $electBySquareArr[6] }}</td>
                        <td>{{ $tkoBySquareArr[6] }}</td>
                        <td>{{ $kuBySquareArr[6] }}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>{{ $result[7] }}</td>
                        <td>11,6</td>
                        <td>0,09125</td>
                        <td>{{ $nowBillElectArr[7] }}</td>
                        <td>{{ $lastBillElectArr[7] }}</td>
                        <td>{{ $diffElectArr[7] }}</td>
                        <td>{{ $costElectArr[7] }}</td>
                        <td>{{ $electBySquareArr[7] }}</td>
                        <td>{{ $tkoBySquareArr[7] }}</td>
                        <td>{{ $kuBySquareArr[7] }}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>{{ $result[8] }}</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $nowBillElectArr[8] }}</td>
                        <td>{{ $lastBillElectArr[8] }}</td>
                        <td>{{ $diffElectArr[8] }}</td>
                        <td>{{ $costElectArr[8] }}</td>
                        <td>{{ $electBySquareArr[8] }}</td>
                        <td>{{ $tkoBySquareArr[8] }}</td>
                        <td>{{ $kuBySquareArr[8] }}</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>{{ $result[9] }}</td>
                        <td>15,31</td>
                        <td>0,12044</td>
                        <td>{{ $nowBillElectArr[9] }}</td>
                        <td>{{ $lastBillElectArr[9] }}</td>
                        <td>{{ $diffElectArr[9] }}</td>
                        <td>{{ $costElectArr[9] }}</td>
                        <td>{{ $electBySquareArr[9] }}</td>
                        <td>{{ $tkoBySquareArr[9] }}</td>
                        <td>{{ $kuBySquareArr[9] }}</td>
                    </tr>
                    <tr class="result">
                        <td>Общ.</td>
                        <td>{{ $sumForAll }}</td>
                        <td>127,11</td>
                        <td>0,99993</td>
                        <td>{{ $nowElectSum }}</td>
                        <td>{{ $lastElectSum }}</td>
                        <td>{{ $sumElect }}</td>
                        <td>{{ $costElect }}</td>
                        <td>{{ $diffElect }}</td>
                        <td>{{ round($bill[0]->tko) }}</td>
                        <td>{{ round($bill[0]->ku) }}</td>
                    </tr>
                </table>
                <div class="table-pagination">{{ $bill->links() }}</div>
            </div>
        </div>
    </div>
</main>
