<?= ToHTML::formOpen("settingsForm"); ?>
<div class="row">
    <div class="col-md-12">
        <?= ToHTML::header(4, 'Параметры поиска объявлений'); ?>
        <div class="form-group">
            <?= ToHTML::input('parseUrl', 'text', 'Ссылка на страницу Avito c поисковыми параметрами для парсинга', 'form-control', NULL, 'https://www.avito.ru/moskva/avtomobili?searchRadius=0&sort=default'); ?>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <?= ToHTML::header(4, 'Настройки парсинга и конфиденциальности'); ?>
    </div>    
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?= ToHTML::input('settingName', 'text', 'Название текущей настройки', 'form-control', NULL, 'Продажа автомобилей'); ?>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?= ToHTML::input('pagesCount', 'number', 'Количество страниц с объявлениями', 'form-control', 50, '50', 'min="1" max="100"'); ?>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?= ToHTML::input('annoucementsCount', 'number', 'Максимальное количество записей (объялений)', 'form-control', 1000, '1000', 'min="10" max="5500"'); ?>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?= ToHTML::input('timeoutCount', 'number', 'Таймаут между обращениями к старнице, сек.', 'form-control', 0, '0', 'min="0" max="30"'); ?>
        </div>
    </div>
    <div class="col-md-8">
        <?php if($proxies != 0): ?>        
        <?= ToHTML::checkbox("useProxy", 'Использовать список прокси-серверов', NULL, '1', TRUE, "useProxy"); ?>
        <?php endif; ?>
        <br /><?= ToHTML::link(['name' => 'Настроить список прокси-серверов', 'link' => '/parser/?route=crud_proxy']); ?>        
        <?= ToHTML::hidden('settingId'); ?>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <?= ToHTML::header(4, 'Настройки выдачи результатов'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= ToHTML::select('outputData', $outputDataList, 'Выгузить конечные данные в виде:', 'Выбрать форму представления полученных данных...', 'form-control', 'xlsx2007'); ?>
    </div>
</div>
<hr />
<div class="row">
    <div id="saveButton" class="col-md-12 text-center"></div>
</div>
<?= ToHTML::formClose(); ?>
<br />
<div class="row">
    <div id="reportPanel" class="col-md-12" style="display: none;"></div>
</div>

<hr /> 
<div class="row">
    <table class="table table-strirped">
        <caption>
            Список готовых настроек парсинга
        </caption>
        <thead>
            <tr>
                <th class="col-md-1">№ п/п</th>
                <th class="col-md-4">Название настройки</th>
                <th class="col-md-1">Страниц</th>
                <th class="col-md-1">Объявлений</th>
                <th class="col-md-1">Таймаут</th>
                <th class="col-md-1">Прокси</th>
                <th class="col-md-3">Действия</th>
            </tr>
        </thead>
        <tbody id="settingsTable">
        </tbody>
    </table>
</div>
<br />
<br />
<br />