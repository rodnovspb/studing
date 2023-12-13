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
                    deliveryText.classList.add('dn')
                    e.preventDefault()
                } else if(label.hasAttribute('data-default')){
                    textarea.classList.add('dn')
                    deliveryText.classList.add('dn')
                } else {
                    textarea.placeholder = label.dataset.text || ''
                    deliveryText.classList.remove('dn')
                    textarea.classList.remove('dn')
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
                    alert('Не больше 20 мб файлов. Либо отправьте файлы на почту');
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





})()
