$(document).ready(function() {   
    
    function terminalScroll() {
        var wrapHeight = $("#usage").height();
        var fieldHeight = $("#terminal").height(); 
        if(wrapHeight < fieldHeight) {
            $("#usage").scrollTop( fieldHeight - (wrapHeight - 20) );
        }
    }
    function outCons(data) {      
        $("#terminal").append(data + '<br />');
        terminalScroll();
    }
    function outConsNB(data) {
        $("#terminal").append(data + ' ');
    }
    function outConsCaution(data) {
        $("#terminal").append('<span style="color: yellow;">' + data + '</span><br />');
        terminalScroll();
    }
    function outConsError(data) {      
        $("#terminal").append('<span style="color: red;">' + data + '</span><br />');
        terminalScroll();
    }     
    function clearCons() {
        $("#terminal").empty();
        $("#checkSetting").attr('disabled', false);
        $("#runParse").attr('disabled', false);
    }      
    
    $("#consClear").on('click', function() {
        clearCons();
    });

    $("#checkSetting").on('click', function () {
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=checkSetting',
            success: function (data) {
                $("#checkSetting").attr('disabled', true);
                if (isJSON(data)) {
                    var resData = JSON.parse(data);
                    for(var key in resData) {
                        outCons(key + ': ' + resData[key]);                        
                    }
                    divider();
                } else {
                    outConsError(data);
                }
            },
            error: function () {
                outConsError('Обработчик запроса не отвечает. Невозможно получить настройки.');
            }
        });
    });
    
    function divider() {
        outCons("----------------------------");
    }
    
    function buttonsEnable() {
        $("#checkSetting").attr('disabled', false);
        $("#runParse").attr('disabled', false);
        $("#consClear").attr('disabled', false);
    }
    
    var getParseResult = function(outAction) {        
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=' + outAction,
            success: function(data) {
                if(!isJSON(data)) {
                    //outCons(data);
                    outConsError('Ошибка записи результатов парсинга!');
                    buttonsEnable();
                } else {
                    var result = JSON.parse(data);
                    divider();
                    outConsCaution('Парсинг окончен, готовим данные к выдаче...');
                    divider();
                    outConsCaution('Файл: ' + result['filename'] + ' &ndash; готов.');
                    $("#forGetFile").append(result['button']);
                    divider();
                    outCons('Готово!');
                    divider();
                    buttonsEnable();
                }                
            },
            error: function() {
                outConsError('Обработчик запроса не отвечает. Невозможно получить настройки.');
                buttonsEnable();
            }
        });
    };
    
    var getSettingForParse = function() {
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=getSettingForParse',
            success: function(data) {
                
                if(!isJSON(data)) {            
                    outConsError(data);
                    buttonsEnable();
                } else {
                    var setting = JSON.parse(data);
                    outCons('Настройки получены');
                    divider();
                    outCons('Работаем:');
                    divider();

                    var maxPages = Number(setting['pagesCount']) + 1;
                    var maxAnnounces = Number(setting['annoucementsCount']) + 1;
                    var outAction = setting['outputData'];
                    var currentAnnounce = 0; 
                    var currentPage = 1;

                    parseMainPage(currentPage, maxPages, currentAnnounce, maxAnnounces, outAction);                   
                }               
            },
            error: function() {
                outConsError('Обработчик запроса не отвечает. Невозможно получить настройки.');
                buttonsEnable();
            }
        });
    };
    
    var parseMainPage = function(currentPage, maxPages, currentAnnounce, maxAnnounces, outAction) {  
        if(currentPage) {
            $.ajax({
                type: "POST",
                url: 'index.php?route=ajax&action=parseMainPage',
                data: {
                    currentPage: currentPage
                },
                success: function(data) { 
                    outConsCaution('Обрабатываем страницу №' + currentPage + ':');
                    if(!isJSON(data)) {            
                        outConsError(data);
                        buttonsEnable();
                    } else {
                        var arrData = JSON.parse(data);                        
                        outConsCaution('Сраница №' + currentPage + ' - получена, обработка результатов ...');  
                        forParseInnerPage:
                        for(var index in arrData['description']) {
                            currentAnnounce++;
                            if(currentAnnounce == maxAnnounces) {
                                getParseResult(outAction);
                                break forParseInnerPage;
                            }
                            getParseInnerPage(arrData['link'][index], arrData['description'][index], currentAnnounce);                            
                            if(index == arrData['description'].length - 1) {
                                currentPage++;
                                if(currentPage < maxPages) {
                                    parseMainPage(currentPage, maxPages, currentAnnounce, maxAnnounces, outAction);
                                } else {
                                    setTimeout(
                                        getParseResult,
                                        10000,
                                        outAction
                                    );
                                }                              
                            }
                        }
                    }                    
                },
                error: function() {                    
                    outConsError('Обработчик запроса не отвечает. Невозможно получить страницу.');
                    buttonsEnable();
                }
            });
        } 
    };
    
    var getParseInnerPage = function(parseUrl, description, currentAnnounce) {  
        $.ajax({
            type: "POST",
            url: 'index.php?route=ajax&action=getParseInnerPage',
            data: {
                parseUrl: parseUrl,
                description: description,
                currentAnnounce: currentAnnounce
            },
            success: function(data) {
                outConsNB(currentAnnounce + ') Парсим: ' + description);
                if(!isJSON(data)) {                
                    outConsError(data); 
                    buttonsEnable();
                } else {    
                    var result = JSON.parse(data);     
                    if(result['phone']) {
                        outCons('... Готово!');
                    } else {
                        outConsError('... Неудача!');
                    }                    
                }
            },
            error: function() {
                outConsError('Обработчик запроса не отвечает. Невозможно получить страницу.');
                buttonsEnable();
            }
        });
    };
    
    $("#runParse").on('click', function() { 
        
        $("#checkSetting").attr('disabled', true);
        $("#runParse").attr('disabled', true);
        $("#consClear").attr('disabled', true); 
        $("#forGetFile").empty();
        
        outConsError('Не закрывайте окно браузера, иначе результаты будут удалены!');        
        getSettingForParse();
    });
    
    $("#forGetFile").on('click', '#getFileResult', function() {
        var filename = $(this).data('filename');
        
        $.ajax({
            type: "POST",
            url: '/files/'.filename,
            success: function(response, status, xhr) {
                // check for a filename
                //var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                var type = xhr.getResponseHeader('Content-Type');
                var blob = new Blob([response], { type: type });

                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location = downloadUrl;
                    }

                    setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
                }
                //$("#forGetFile").empty();
                outCons('Файл: ' + filename + ' &ndash; отправлен.');
                divider();
            }
        });        
    });
    
});