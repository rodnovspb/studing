$(document).ready(function() {
    
    function loadProxyTable() {
        $.ajax({
            type: "POST",
            url: "index.php?route=ajax&action=loadProxyTable",
            data: {},
            success: function(data){                
                $("#proxyTable").empty().append(data);
            },
            error: function() {
                $("#proxyTable").empty().append('<tr class="bg-danger"><td rowspan="5" class="text-danger">Загрузчик таблицы не отвечает</td></tr>');
            }
        });        
    }   
    
    loadProxyTable();
    
    $("#addRroxy").on('click', function() {
        var ipAdress = $("#ipAdress").val();
        var port = $("#proxyPort").val();
        var typeProxy = $("#proxyType").val();
        var errorIP = verifyIP(ipAdress);
        var errorPort = verifyPort(port);
        if(errorIP || errorPort) {
            showReportPanel(errorIP + errorPort, 3);
            if(errorIP !== false) {
                $('#ipAdress').parent().addClass('has-error');
            }
            if(errorPort !== false) {
                $('#proxyPort').parent().addClass('has-error');
            }
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?route=ajax&action=insertProxyTable",
                data: {ipAdress: ipAdress, port: port, typeProxy: typeProxy},
                success: function (data) {
                    var info = JSON.parse(data);
                    if(info['code'] == 2) {
                        $("#proxyForm")[0].reset();                        
                    }                    
                    showReportPanel(info['report'], info['code']);
                    loadProxyTable();
                },
                error: function () {
                    showReportPanel('Обработчик запоса не отвечает', 3);
                }
            });            
        }       
    });
    
    $("#proxyTable").on('click', 'input[id^=delete_]', function(elem) {
        var row = $(elem.currentTarget);
        var deleteId = row.data('deleteid');
        $.ajax({
            type: "POST",
            url: "index.php?route=ajax&action=deleteProxyTable",
            data: {deleteId: deleteId},
            success: function(data) {
                console.log(data);
                loadProxyTable();
            },
            error: function() {
                showReportPanel('Обработчик запоса не отвечает', 3);
            }
        });
    });
    
});

