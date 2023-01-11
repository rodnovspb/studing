<main class="main">
  <div class="content">
    <div class="container">
      <form action="" method="post">
       @csrf
      <table class="table table-admin">
        <tbody>
          <tr>
            <th rowspan="2">ID</th>
            <th colspan="3">Счета</th>
            <th colspan="9">Показания э/э по студиям</th>
            <th rowspan="2">Дата счета</th>
            <th rowspan="2">Действия</th>
          </tr>
          <tr>
            <th>Э/Э</th>
            <th>ТКО</th>
            <th>К/У</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
          </tr>
          @foreach($bills as $bill)
              <tr>
                  <td>{{ $bill->id }}</td>
                  <td>{{ $bill->electricity }}</td>
                  <td>{{ $bill->tko }}</td>
                  <td>{{ $bill->ku }}</td>
                  <td>{{ $bill->st1_elect }}</td>
                  <td>{{ $bill->st2_elect }}</td>
                  <td>{{ $bill->st3_elect }}</td>
                  <td>{{ $bill->st4_elect }}</td>
                  <td>{{ $bill->st5_elect }}</td>
                  <td>{{ $bill->st6_elect }}</td>
                  <td>{{ $bill->st7_elect }}</td>
                  <td>{{ $bill->st8_elect }}</td>
                  <td>{{ $bill->st9_elect }}</td>
                  <td>{{ getDateString($bill->bill_date) }}</td>
                  <td class="buttons"><a href="#" data-delete="<?= $bill->id ?>" class="btn-delete" title="Удалить">❌</a></td>
              </tr>
          @endforeach
              <tr class="load">
                  <td></td>
                  <td><input size="1" required type="text" name="electricity"></td>
                  <td><input size="1" required type="text" name="tko"></td>
                  <td><input size="1" required type="text" name="ku"></td>
                  <td><input size="1" required type="text" name="st1_elect"></td>
                  <td><input size="1" required type="text" name="st2_elect"></td>
                  <td><input size="1" required type="text" name="st3_elect"></td>
                  <td><input size="1" required type="text" name="st4_elect"></td>
                  <td><input size="1" required type="text" name="st5_elect"></td>
                  <td><input size="1" required type="text" name="st6_elect"></td>
                  <td><input size="1" required type="text" name="st7_elect"></td>
                  <td><input size="1" required type="text" name="st8_elect"></td>
                  <td><input size="1" required type="text" name="st9_elect"></td>
                  <td><input size="1" required type="date" name="bill_date"></td>
              </tr>
        </tbody>
      </table>
      <div class="text-right">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Отправить</button>
      </div>
      </form>
      <div class="table-pagination">{{ $bills->links() }}</div>
    </div>
  </div>
</main>
