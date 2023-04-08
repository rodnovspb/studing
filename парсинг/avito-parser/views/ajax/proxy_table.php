<tr>
    <td><?= $counter; ?></td>
    <td><?= $ip; ?></td>
    <td><?= $port; ?></td>
    <td><?= $type; ?></td>
    <td><?= ToHTML::inputButton('delete_'.$id, 'Удалить', NULL, 'btn btn-danger', 'data-deleteid="'.$id.'"'); ?></td>
</tr>
    