<main class="main">
    <div class="content">
        <div class="container">
            <div class="content__block">
                <div class="content__date">{{ $date }}</div>
                <div class="bills">
                    <div class="bills__item">
                        Элекстроснабжение: <span>{{ $lastTotalEl }} р.</span>
                    </div>
                    <div class="bills__item">
                        Обращение с ТКО: <span>{{ $lastTko }} р.</span>
                    </div>
                    <div class="bills__item">
                        Коммунальные услуги: <span>{{ $lastKu }} р.</span>
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
                        <td>1000</td>
                        <td>16,74</td>
                        <td>0,13169</td>
                        <td>{{ $st1_newBill }}</td>
                        <td>{{ $st1_oldBill }}</td>
                        <td>{{ $st1_diffEl }}</td>
                        <td>{{ $st1_costEl }}</td>
                        <td>{{ $st1_costEl }}</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>14,88</td>
                        <td>0,11706</td>
                        <td>{{ $st2_newBill }}</td>
                        <td>{{ $st2_oldBill }}</td>
                        <td>{{ $st2_diffEl }}</td>
                        <td>{{ $st2_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>1000</td>
                        <td>12,31</td>
                        <td>0,09684</td>
                        <td>{{ $st3_newBill }}</td>
                        <td>{{ $st3_oldBill }}</td>
                        <td>{{ $st3_diffEl }}</td>
                        <td>{{ $st3_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>1000</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $st4_newBill }}</td>
                        <td>{{ $st4_oldBill }}</td>
                        <td>{{ $st4_diffEl }}</td>
                        <td>{{ $st4_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>1000</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $st5_newBill }}</td>
                        <td>{{ $st5_oldBill }}</td>
                        <td>{{ $st5_diffEl }}</td>
                        <td>{{ $st5_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>1000</td>
                        <td>12,89</td>
                        <td>0,1014</td>
                        <td>{{ $st6_newBill }}</td>
                        <td>{{ $st6_oldBill }}</td>
                        <td>{{ $st6_diffEl }}</td>
                        <td>{{ $st6_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>1000</td>
                        <td>11,6</td>
                        <td>0,09125</td>
                        <td>{{ $st7_newBill }}</td>
                        <td>{{ $st7_oldBill }}</td>
                        <td>{{ $st7_diffEl }}</td>
                        <td>{{ $st7_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>1000</td>
                        <td>14,46</td>
                        <td>0,11375</td>
                        <td>{{ $st8_newBill }}</td>
                        <td>{{ $st8_oldBill }}</td>
                        <td>{{ $st8_diffEl }}</td>
                        <td>{{ $st8_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>1000</td>
                        <td>15,31</td>
                        <td>0,12044</td>
                        <td>{{ $st9_newBill }}</td>
                        <td>{{ $st9_oldBill }}</td>
                        <td>{{ $st9_diffEl }}</td>
                        <td>{{ $st9_costEl }}</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                    <tr class="result">
                        <td>Общ.</td>
                        <td>1000</td>
                        <td>127,11</td>
                        <td>0,99993</td>
                        <td>2000</td>
                        <td>2500</td>
                        <td>500</td>
                        <td>3000</td>
                        <td>867</td>
                        <td>140</td>
                        <td>1200</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
