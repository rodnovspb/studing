$(document).ready(function() {
    
    function loadSettingsTable() {
        $.ajax({
            type: "POST",
            url: "index.php?route=ajax&action=loadSettingsTable",
            data: {},
            success: function(data){                
                $("#settingsTable").empty().append(data);
            },
            error: function() {
                $("#settingsTable").empty().append('<tr class="bg-danger"><td rowspan="5" class="text-danger">Загрузчик таблицы не отвечает</td></tr>');
            }
        });        
    }    
    
    function changeSaveButton() {
        var editId = $("#settingId").val();
        var button;
        var insertButtonToHtml = function(button) {
            $("#saveButton").empty().append(button);
        };        
        if(editId == '0') {
            loadNewButton(insertButtonToHtml, 'saveSettings', 'Сохранить новые настройки');
        } else {
            loadNewButton(insertButtonToHtml, 'saveSettings|clearSetting', 'Сохранить отредактированные настройки|Сбросить форму', 'success|warning');
        }        
    }
    
    loadSettingsTable();
    changeSaveButton();
    
    $("#saveButton").on('click', "#saveSettings", function() {
        
        var settingId = $("#settingId").val();
        var settingName = $("#settingName").val();
        var parseUrl = $("#parseUrl").val();
        var pagesCount = $("#pagesCount").val();
        var annoucementsCount = $("#annoucementsCount").val();
        var timeoutCount = $("#timeoutCount").val();
        var outputData = $("#outputData").val();
        var useProxy = false;
        if ($('#useProxy').is(":checked")) {
            useProxy = true;
        } 
        var errorString = '';

        if(settingName == '') {
            errorString += '<p class="text-danger">Имя настройки обязательно для дальнейшей идентификации в списке</p>';
            $('#settingName').parent().addClass('has-error');
        }
        if(!isValidUrl(parseUrl)) {
            errorString += '<p class="text-danger">Введенный URL адрес имеет не вырный формат</p>';
            $('#parseUrl').parent().addClass('has-error');
        } else {
            if(parseUrl.indexOf("avito") == -1) {
                errorString += '<p class="text-danger">Введенный URL не принадлежит Avito</p>';
                $('#parseUrl').parent().addClass('has-error');
            }            
        }
        if(pagesCount <= 0) {
            errorString += '<p class="text-danger">Количество страниц не может быть меньше или равно нулю</p>';
            $('#pagesCount').parent().addClass('has-error');
        }
        if(annoucementsCount <= 0) {
            errorString += '<p class="text-danger">Количество заказанных объявлений не может быть меньше или равно нулю</p>';
            $('#annoucementsCount').parent().addClass('has-error');
        }
        if(timeoutCount < 0) {
            errorString += '<p class="text-danger">Время тайиаута не может быть меньше нуля</p>';
            $('#timeoutCount').parent().addClass('has-error');
        }
        if(outputData == 0) {
            errorString += '<p class="text-danger">Следует указать формат выводных данных</p>';
            $('#outputData').parent().addClass('has-error');
        }
        
        if(errorString != '') {
            showReportPanel(errorString, 3, 30000);
        } else {
            
            $.ajax({
                type: "POST",
                url: 'index.php?route=ajax&action=insertSettingsTable',
                data: {
                    settingId: (settingId) ? settingId : false,
                    settingName: settingName,
                    parseUrl: parseUrl,
                    pagesCount: pagesCount,
                    annoucementsCount: annoucementsCount,
                    timeoutCount: timeoutCount,
                    outputData: outputData,
                    useProxy: useProxy                         
                },
                success: function(data) {
                    var info = JSON.parse(data);
                    if(info['code'] == 2) {
                        $("#settingId").val('0');
                        $("#settingsForm")[0].reset();                        
                    }                    
                    showReportPanel(info['report'], info['code']);
                    loadSettingsTable();
                },
                error: function() {
                    showReportPanel('Обработчик запоса не отвечает', 3);
                }                
            });           
        }      
        
    });
    
    $("#settingsTable").on('click', 'input[id^=delete_]', function(elem) {
        var button = $(elem.currentTarget);
        var deleteId = button.data("deleteid");
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=deleteSettingsTable',
            data: {
                deleteId: deleteId,
            },
            success: function(data) {
                loadSettingsTable();
            },
            error: function() {
                showReportPanel('Обработчик запоса не отвечает', 3);
            }
        });       
    });
    
    $("#settingsTable").on('click', 'input[id^=edit_]', function(elem) {
        var button = $(elem.currentTarget);
        var editId = button.data("editid");
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=getForEditSettingsTable',
            data: {
                editId: editId,
            },
            success: function(data) {
                var result = JSON.parse(data);
                $("#settingId").val(result.id);
                $("#parseUrl").val('http://www.avito.ru' + result.parseUrl);
                $("#settingName").val(result.settingName);
                $("#pagesCount").val(result.pagesCount);
                $("#annoucementsCount").val(result.annoucementsCount);
                $("#timeoutCount").val(result.timeoutCount);
                if(result.useProxy == 'true') {
                    $("#useProxy")[0].checked = true;
                } else {
                    $("#useProxy")[0].checked = false;
                }
                $('#outputData option').prop('selected', false);
                $('#outputData option[value=' + result.outputData + ']').prop('selected', true);
                changeSaveButton();               
            },
            error: function() {
                showReportPanel('Обработчик запоса не отвечает', 3);
            }
        });
    });
    
    $("#saveButton").on('click', '#clearSetting', function() {
        $("#settingsForm")[0].reset();
        $("#settingId").val('0');
        changeSaveButton();
    });     
    
    $("#settingsTable").on('click', 'input[id^=run_]', function(elem){
        var button = $(elem.currentTarget);
        var runId = button.data("runid");
        $(location).attr('href', 'index.php?route=running&action=prepare&settingId=' + runId);
    });
    
});

