<div class="row"> 
    <?= ToHTML::formOpen("proxyForm"); ?>
        <div class="col-md-6">
            <div class="form-group">
            <?= ToHTML::input('ipAdress', 'text', 'IP-адрес прокси-сервера', 'form-control'); ?>
            </div>
        </div>        
        <div class="col-md-3">
            <div class="form-group">
            <?= ToHTML::input('proxyPort', 'text', 'Порт', 'form-control'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <?= ToHTML::select('proxyType', $params, 'Тип прокси', NULL, 'form-control'); ?>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <?= ToHTML::button('addRroxy', 'Добавить', 'button', 'btn btn-primary'); ?>
        </div>
    <?= ToHTML::formClose(); ?>    
</div>
<br />
<div class="row">
    <div id="reportPanel" class="col-md-12" style="display: none;"></div>
</div>
 
<hr /> 
<div class="row">
    <table class="table table-strirped">
        <caption>
            Список используемых прокси-серверов
        </caption>
        <thead>
            <tr>
                <th class="col-md-1">№ п/п</th>
                <th class="col-md-4">IP адрес</th>
                <th class="col-md-2">Порт</th>
                <th class="col-md-2">Тип</th>
                <th class="col-md-2">Действие</th>
            </tr>
        </thead>
        <tbody id="proxyTable">
        </tbody>
    </table>
</div>

