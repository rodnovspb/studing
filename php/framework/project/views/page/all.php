<h3><?= $h1 ?></h3>

<table>
  <tr>
	<th>Название</th>
	<th>Номер</th>
	<th>Ссылка</th>
  </tr>
  <?php foreach ($pages as $page):?>
  <tr>
	<td><?= $page['title']?></td>
	<td><?= $page['id']?></td>
	<td><a href="/get-one/<?= $page['id']?>">ссылка на страницу</a></td>
  </tr>
  <?php endforeach; ?>
</table>
