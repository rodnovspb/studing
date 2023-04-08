function verifyIP(IPvalue) {
    var errorString = "";
    var theName = "IPaddress";
    var ipPattern = /^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/;
    var ipArray = IPvalue.match(ipPattern);
    if (IPvalue == "0.0.0.0")
        errorString = errorString + theName + ': ' + IPvalue + ' это специальный IP адрес и не может быть использован. ';
    else if (IPvalue == "255.255.255.255")
        errorString = errorString + theName + ': ' + IPvalue + ' это специальный IP адрес и не может быть использован. ';
    if (ipArray == null)
        errorString = errorString + theName + ': ' + IPvalue + ' не допустимый IP адрес. ';
    else {
        for (i = 0; i < 4; i++) {
            thisSegment = ipArray[i];
            if (thisSegment > 255) {
                errorString = errorString + theName + ': ' + IPvalue + ' не допустимый IP адрес. ';
                i = 4;
            }
            if ((i == 0) && (thisSegment > 255)) {
                errorString = errorString + theName + ': ' + IPvalue + ' это специальный IP адрес и не может быть использован. ';
                i = 4;
            }
        }
    }
    extensionLength = 3;
    if (errorString == "")
        return false;
    else
        return errorString;
};

function verifyPort(portValue) {
    var errorString = "";
    var theName = "Port";
    var portPattern = /^\d{1,5}$/;
    var portArray = portValue.match(portPattern);
    if (portArray == null) {
        errorString = errorString + theName + ': ' + portValue + ' не верно указан порт.';
    }
    if (errorString == "")
        return false;
    else
        return errorString;
}

function isValidUrl(url) {
    var objRE = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i;
    return objRE.test(url);
}

function showReportPanel(text, flag = 1, delay = 5000) {
    switch (flag) {
        case 2:
            var className = 'success';
            break;
        case 3:
            var className = 'danger';
            break;
        case 4:
            var className = 'warning';
            break;
        default:
            var className = 'info';
    }
    $('#reportPanel').empty().append('<div class="bg-' + className + '"><p class="text-' + className + '">' + text + '</p></div>').fadeIn();
    setTimeout(function() {
        $('#reportPanel').fadeOut();
        $(document).find('.has-error').removeClass('has-error');
    }, delay);   
}

function isJSON(data) {
    var isJson = false
    try {
       var json = $.parseJSON(data);
       isJson = typeof json === 'object' ;
    } catch (ex) {
        console.error('data is not JSON');
    }
    return isJson;
}

function loadNewButton(func, buttonId, buttonValue, buttonClass = false) {
    if(!buttonClass) {
        buttonClass = 'default';
    }
    $.ajax({
        type: "POST",
        url: "index.php?route=ajax&action=loadNewButton",
        data: {
            buttonId: buttonId,
            buttonValue: buttonValue,
            buttonClass: buttonClass
        },
        success: function(data) {
            func(data);
        },
        error: function() {
            func('Кнопка не создана, т.к. обработчик запоса не отвечает');
        }
    });
}