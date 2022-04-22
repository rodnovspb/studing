<h1>Список товаров</h1>
<table>
    <tr>
        <th>Айди</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Описание</th>
    </tr>
    <?php foreach ($goods as $good):?>
    <tr>
        <td><?= $good['id']?></td>
	  	<td><a href="/goods/<?= $good['id']?>/">Ссылка на товар</a></td>
        <td><?= $good['name']?></td>
        <td><?= $good['price']?></td>
        <td><?= $good['quantity']?></td>
        <td><?= $good['description']?></td>
    </tr>
    <?php endforeach;?>
</table>
