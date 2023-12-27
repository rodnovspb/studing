;(function (){
    let body = document.querySelector('body')

    /*мобильное меню*/
    let burgers = document.querySelectorAll('.burger')
    if(burgers.length > 0){
        let menu = document.querySelector('.mobile')
        burgers.forEach(burger => {
            burger.addEventListener('click', function (e) {
                menu.classList.toggle('active')
                body.classList.toggle('noscroll')
            })
        })

    }

    /*навешивание рамки на карточку макета и оснастки при выборе товара*/
    let slideRadioInputs = document.querySelectorAll('.slide__input[type="radio"]')
    if(slideRadioInputs.length > 0){
        slideRadioInputs.forEach(radio => {
            radio.addEventListener('click', (e)=>{
                if(radio.closest('.slide-block').classList.contains('selected')){
                    /*снятие рамки если повторно кликаем на ту же карточку*/
                    radio.closest('.slide-block').classList.remove('selected')
                    radio.checked = false
                } else {
                    let slideBlocks = radio.closest('.swiper-wrapper').querySelectorAll('.slide-block')
                    slideBlocks.forEach(slideBlock => {
                        slideBlock.classList.remove('selected')
                    })
                    radio.closest('.slide-block').classList.add('selected')
                }

            })
        })
    }


    /*навешивание рамки на карточку дополнительных товаров*/
    let slideProductInputs = document.querySelectorAll('.slide__input[type="checkbox"]')
    if(slideProductInputs.length > 0){
        slideProductInputs.forEach(checkbox => {
            checkbox.addEventListener('change', function (e) {
                checkbox.closest('.slide-block').classList.toggle('selected')
                if(productsSlider.autoplay.running){
                    productsSlider.autoplay.stop();
                }
              })
        })
    }



    /*снятие рамки с выбранной доставки, появление поля адреса доставки*/
    let deliveryLabels = document.querySelectorAll('.delivery__label')
    if(deliveryLabels.length > 0){
        let textarea = document.querySelector('.delivery__text')
        let deliveryText = document.querySelector('.checkout__delivery')
        deliveryLabels.forEach(label => {
            label.addEventListener('click', (e)=>{

                if(label.previousElementSibling.checked){
                    label.previousElementSibling.checked = false
                    textarea.classList.add('dn')
                    if(deliveryText) { deliveryText.classList.add('dn') }
                    e.preventDefault()
                } else if(label.hasAttribute('data-default')){
                    textarea.classList.add('dn')
                    if(deliveryText) {deliveryText.classList.add('dn') }
                } else {
                    textarea.placeholder = label.dataset.text || ''
                    textarea.classList.remove('dn')
                    if(deliveryText) {deliveryText.classList.remove('dn') }
                }
            })
        })
    }

    /*Своя кнопка "Прикрепить файл"*/
    let fileInput = document.querySelector('#file__input')
    if(typeof(fileInput) != 'undefined' && fileInput != null){
        let span = document.querySelector('#file__text')
        let deleteBtn = document.querySelector('#file__delete')

        fileInput.addEventListener('change', function (e) {
            let filesize = 0;
            let countFiles = fileInput.files.length;
            if(countFiles > 0) {
                for(let i=0; i<countFiles; i++){
                    filesize += fileInput.files[i].size;
                }
                if(filesize > 20971520){
                    alert('Не больше 20 мб файлов, пожалуйста. Также файлы можно отправить на почту');
                    fileInput.value = null
                    return false;
                }

                if(countFiles === 1){
                    span.textContent = fileInput.files[0].name
                } else {
                    span.textContent = `Прикреплено файлов: ${countFiles}`
                }
                deleteBtn.classList.remove('dn')

            } else {
                span.textContent = null
            }
          })

        deleteBtn.addEventListener('click', function (e) {
            fileInput.value = span.textContent = null
            deleteBtn.classList.add('dn')
          })
    }


    /*Подсчет стоимости выбранных товаров*/
    let costElem = document.querySelector('.checkout__cost')
    if(typeof(costElem) != 'undefined' && costElem != null){
        let costText = costElem.querySelector('.checkout__text')
        let costNum = costElem.querySelector('.checkout__num')
        let hiddenInputCost = document.querySelector('#hidden_cost')

        let inputsWithCost = document.querySelectorAll('input[data-price]')
        inputsWithCost.forEach(input => {
            input.addEventListener('click', function (e) {
                let checkedInputs = document.querySelectorAll('input[data-price]:checked')
                let cost = 0;
                checkedInputs.forEach(checked => {
                    cost += parseFloat(checked.dataset.price.replace(',','.').replace(' ',''))
                })

                if(isNaN(cost)){
                    costNum.textContent = hiddenInputCost.value = 'рассчитаем'
                    costText.classList.remove('dn')
                    costNum.nextElementSibling.hidden = true
                } else if(cost > 0){
                    costNum.textContent = hiddenInputCost.value = `${cost} ₽`
                    costText.classList.remove('dn')
                    costNum.nextElementSibling.hidden = false
                } else {
                    costText.classList.add('dn')
                }
              })
        })
    }


    /*****************Капча*******************/
    ;(function (){
        let order_form = document.querySelector('form[name="order"]')
        if (typeof (order_form) != 'undefined' && order_form != null){

            order_form.addEventListener('submit', function (e) {
                e.preventDefault()
                getRecaptchaToken()
            })

            function getRecaptchaToken(){
                grecaptcha.ready(function () {
                    grecaptcha.execute('6LdPET0pAAAAAFA8NdG5hLAnfiulnMWRsb690ixs', { action: 'form' }).then(function (code) {
                        getScore(code)
                    });
                });
            }

            function getScore(code){
                fetch('/captcha', {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify({code: code, _token: document.querySelector('input[name=_token]').value})
                })
                        .then(response => response.json())
                        .then(result => sendForm(result))
                        .catch(error => console.log(error));
            }

            function sendForm(result){
                if(result > 0.5){
                    order_form.submit();
                } else {
                    let result = confirm('Нажмите, если вы не робот')
                    if(result){
                        order_form.submit();
                    }
                }
            }
        }

    })()



    /*****************Дадата*******************/
    /*Флаг для того, чтобы фетч переставал работать если пользователь редактирует реквизиты*/
    let flagForFetch = true;
    let csrf_token = document.querySelector('meta[name=csrf-token]').content;

    /*Функция получения названия ИП по ИНН/ОГРН*/
    ;(function  fetchGetOrg(){
        let inputInn = document.querySelector('#inn');
        let inputName = document.querySelector('#name');
        if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
            inputInn.addEventListener('input', function (e) {
                if (inputInn.value.length < 10) flagForFetch = true
                if(!flagForFetch) return false;
                if (inputInn.value.length >= 10) {
                    // ищем числа состоящие из 10 или 13 цифр
                    let number = inputInn.value.match(/\b\d{13}\b|\b\d{10}\b/g);
                    if (number && number.length > 0) {
                        fetch('/get/org', {
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            method: "POST",
                            body: JSON.stringify({inn: number[0], _token: csrf_token})
                        })
                                .then(response => response.json())
                                .then(result => {
                                    if (result.suggestions[0]) {
                                        let obj = result.suggestions[0];
                                        inputName.value = `${obj.data.opf.short} "${obj.data.name.full}"`;
                                        let city = null;
                                        if(obj.data.address.data.city_with_type){
                                            city = obj.data.address.data.city_with_type
                                        } else if(obj.data.address.data.settlement_with_type){
                                            city = result.suggestions[0].data.address.data.region_with_type + ', ' + result.suggestions[0].data.address.data.settlement_with_type;
                                        }
                                        inputInn.value = `ИНН: ${obj.data.inn} ОГРН: ${obj.data.ogrn}\r\n${city}`
                                        document.querySelector('input[name="contact"]').focus()
                                        flagForFetch = false
                                    }
                                    if(inputInn.value.length > 40) { inputInn.rows = 2 }
                                    if(inputInn.value.length > 85) { inputInn.rows = 3 }
                                    if(inputName.value.length > 40) { inputName.rows = 2 }
                                    if(inputName.value.length > 85) { inputName.rows = 3 }
                                })
                                .catch(error => console.log("error", error));
                    }

                }
            });
        }
    })();

    /*Функция получения названия ООО по ИНН/ОГРН*/
    (function  fetchGetIp(){
        let inputInn = document.querySelector('#inn');
        let inputName = document.querySelector('#name');
        if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
            inputInn.addEventListener('input', function (e) {
                if (inputInn.value.length < 10) flagForFetch = true
                if(!flagForFetch) return false;
                if (inputInn.value.length >= 12) {
                    // ищем числа состоящие из 12 или 15 цифр
                    let number = inputInn.value.match(/\b(\d{15})\b|\b(\d{12})\b/g);
                    if (number && number.length > 0) {
                        fetch('/get/ip', {
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            method: "POST",
                            body: JSON.stringify({inn: number[0], _token: csrf_token})
                        })
                                .then(response => response.json())
                                .then(result => {
                                    if (result.suggestions[0]) {
                                        let obj = result.suggestions[0];
                                        inputName.value = obj.value;
                                        inputInn.value = `ИНН: ${obj.data.inn} ОГРНИП: ${obj.data.ogrn}\r\n${obj.data.address ? obj.data.address.value: ''}`
                                        if(inputInn.value.length > 40) { inputInn.rows = 2 }
                                        if(inputInn.value.length > 95) { inputInn.rows = 3 }
                                        document.querySelector('input[name="contact"]').focus()
                                        flagForFetch = false
                                    }

                                })
                                .catch(error => console.log("error", error));
                    }
                }
            });
        }
    })();




})()
