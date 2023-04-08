<?php if (!$setting): ?>
    <div class = "row">    
        <div class="col-md-12 bg-danger">
            <p class="text-danger">Не верно передан идентификатор настроек для текущего запуска</p>
        </div>    
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <?= ToHTML::header(4, 'Запуск с настройками: &laquo;' . $settingName . '&raquo;'); ?>
        </div>
    </div>
    <hr />
    <div class="row">
        <div id="usage" class="col-md-9">
            <div id="terminal"></div>
        </div>
        <div class="col-md-3">
            <?= ToHTML::inputButton('checkSetting', 'Проверить настройки', 'button', 'btn btn-success'); ?><br /><br />
            <?= ToHTML::inputButton('runParse', 'Запустить парсер', 'button', 'btn btn-danger'); ?><br /><br />
            <?= ToHTML::inputButton('consClear', 'Очистить окно парсера', 'button', 'btn btn-info'); ?><br /><br />
            <div id="forGetFile"></div>
        </div>
    </div>
<?php endif; ?>