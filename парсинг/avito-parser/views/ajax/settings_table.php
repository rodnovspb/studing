<tr>
    <td><?= $counter; ?></td>
    <td><?= $settingName; ?></td>
    <td><?= $pagesCount; ?></td>
    <td><?= $annoucementsCount; ?></td>
    <td><?= $timeoutCount; ?></td>
    <?php if($useProxy == 'false'): ?>
    <td class="text-center bg-danger">&mdash;</td>
    <?php else: ?>
    <td class="text-center bg-success">&#10003;</td>
    <?php endif; ?>    
    <td>
        <div class="input-group">
            <span class="input-group-btn">
            <?= ToHTML::inputButton('delete_'.$id, 'Удалить', NULL, 'btn btn-danger', 'data-deleteid="'.$id.'"'); ?>
            <?= ToHTML::inputButton('edit_'.$id, 'Редактировать', NULL, 'btn btn-primary', 'data-editid="'.$id.'"'); ?>
            <?= ToHTML::inputButton('run_'.$id, 'Парсить', NULL, 'btn btn-success', 'data-runid="'.$id.'"'); ?>
            </span>
        </div>        
    </td>
</tr>
