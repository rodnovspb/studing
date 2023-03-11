;(function (){

  document.addEventListener("DOMContentLoaded", ()=>{
    fetchGetIp();
    attachFiles();
    mark();
    showProducts('data-stand')
    otherGoodsBtn()
    selectTypeProductBtns()
    templatesBtn()
  });

  /*Сколько показывать товаров*/
  let countOtherGoods;
  let countProducts;

  /*Номер выбранного массива: все, дизайнерские, с лого*/
  // [[все, кроме диз и лого...],[диз...],[с лого...]]
  let numOfArrSubTempl = 0;

  /*номер элемента в подмассиве*/
  let numTempl = 0;

  /*Счетчик прикрепленных файлов*/
  let counterOfAttachFiles = 1;

  /*Функция получения названия по ИНН/ОГРН*/
  function  fetchGetIp(){
    let inputInn = document.querySelector('#inn');
    let inputName = document.querySelector('#input_name');
    if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
      inputInn.addEventListener('input', function (e) {
        if (inputInn.value.length >= 12) {
          // ищем числа состоящие из 12 или 15 цифр
          let number = inputInn.value.match(/\b\d{15}\b|\b\d{12}\b/g);
          if (number && number.length > 0) {
            fetch('/dadata/ip', {
              headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
              },
              method: "POST",
              body: JSON.stringify({inn: number[0]})
            })
              .then(response => response.json())
              .then(result => {
                if (result.suggestions[0]) {
                  inputName.value = result.suggestions[0].value;
                }
              })
              .catch(error => console.log("error", error));
          }
        }
      });
    }
  }

  /*Функция прикрепления, показа файлов и их удаления из формы заказа*/
  function attachFiles(){
    let fileWrapper = document.querySelector('.file__wrapper')
    if(typeof (fileWrapper) == 'undefined' || fileWrapper == null) return false

    let attachInput = document.querySelector('.label_file:last-of-type .attach_input')

    let fileList = document.querySelector('.file__list')
    let attachLabel = document.querySelector('.file__wrapper .label_file:last-of-type')

    attachInput.addEventListener('change', function (e){
      if(this.files.length === 0) { return false; }
      if(this.files[0].size > 10485760) { alert('Файл не больше 10 Мб, пожалуйста'); return false; }
      if(counterOfAttachFiles > 5) { alert('Не больше 5 файлов, пожалуйста. Либо отправьте файлы на почту'); return false; }

      counterOfAttachFiles++;

      fileList.insertAdjacentHTML('beforeend', `<li class="file__item"><span class="file__name">${this.files[0].name}</span><button type="button">╳</button></li>`);

      fileList.querySelector('.file__item:last-of-type button').addEventListener('click', function (){
        attachInput.value = null
        this.parentElement.remove();
      })

      attachLabel.style.display = 'none'

      attachLabel.insertAdjacentHTML('afterend', `<label class="requisites__file label_file">Прикрепить файл<input class="attach_input" name="files[]" type="file"></label>`);

      attachFiles()

    })









  }

  /*Функция обвода рамкой шаблонов и оснасток при клике*/
  function mark(){
    let templateInputs = document.querySelectorAll('input[name="template"]')
    if(templateInputs && templateInputs.length > 0){
      templateInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          templateInputs.forEach(elem => elem.closest('.templates__item').classList.remove('mark'))
          this.closest('.templates__item').classList.add('mark')
        })
      })
    }

    let casesInputs = document.querySelectorAll('input[name="case"]')
    if(casesInputs && casesInputs.length > 0){
      casesInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          casesInputs.forEach(elem => elem.closest('.cases__item').classList.remove('mark'))
          this.closest('.cases__item').classList.add('mark')
        })
      })
    }

    let otherGoodsInputs = document.querySelectorAll('.other-goods__item input[type="checkbox"]')
    if(otherGoodsInputs && otherGoodsInputs.length > 0){
      otherGoodsInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          this.closest('.other-goods__item').classList.toggle('mark')
        })
      })
    }



  }

  /*Функция установки количества колонок слайдера в зав. от ширины контейнера сайта*/
  function setCountsByBreakpoints(){
    let breakpoints = {
      othergoods: {
        300: 2,
        575: 4,
        767: 5,
        990: 6,
        1200: 7,
        1350: 8
      },
      products: {
        300: 2,
        575: 3,
        767: 3,
        990: 5,
        1200: 6,
        1350: 6
      }

    }

    let containerWidth = document.querySelector('.container').clientWidth;

    for (let key in breakpoints.othergoods){
      if(containerWidth >= key){
        countOtherGoods = breakpoints.othergoods[key]
      }
    }

    for (let key in breakpoints.products){
      if(containerWidth >= key){
        countProducts = breakpoints.products[key]
      }
    }

  }

  /*Функция показа слайдеров*/
  function showProducts(dataType){
    let listOtherGoods = document.querySelectorAll('.other-goods__item');
    let listProducts = document.querySelectorAll('.templates__item');
    let listSelectedProducts = document.querySelectorAll(`[${dataType}]`)

    /*если на странице не найдется товаров отменим функцию*/
    if(!listProducts || listProducts.length === 0){ return false; }

    setCountsByBreakpoints()

    for(let i=0; i<listOtherGoods.length; i++){
      listOtherGoods[i].classList.add('dn')
      if(i < countOtherGoods){
        listOtherGoods[i].classList.remove('dn')
      }
    }

    listProducts.forEach(elem => elem.classList.add('dn'))

    for(let i=0; i<countProducts; i++){
      if(dataType === null){
          listProducts[i].classList.remove('dn')
      } else if(listSelectedProducts[i]){
          listSelectedProducts[i].classList.remove('dn')
      } else {
        break
      }
    }

    window.addEventListener('resize', function redraw(){
      /*отвяжем, чтобы не тормозило, иначе навешиваются множество функций одинаковых*/
      window.removeEventListener('resize', redraw)
      showProducts(dataType)
      otherGoodsBtn()
    })

  }

  /*Функция разбиения массива на подмассивы*/
  function unflat(src, count) {
    const result = [];
    for (let s = 0, e = count; s < src.length; s += count, e += count)
      result.push(src.slice(s, e));
    return result;
  }

  /*Функция удаления класса у всех элементов*/
  function deleteClassForAll(elems, className){
    elems.forEach(elem => elem.classList.remove(className))
  }

  /*Функция добавления класса всем элементам*/
  function setClassForAll(elems, className){
    elems.forEach(elem => elem.classList.add(className))
  }

  function otherGoodsBtn(){
    let listOtherGoods = Array.from(document.querySelectorAll('.other-goods__item'));
    if(listOtherGoods.length === 0) { return false; }
    let rightBtn = document.querySelector('#other_right_arrow');
    let leftBtn = document.querySelector('#other_left_arrow');
    let res = unflat(listOtherGoods, countOtherGoods);
    let countShowArr = 0;

    rightBtn.addEventListener('click', function (e) {
      if(countShowArr === res.length - 1) {
        countShowArr = 0;
      } else {
        countShowArr++;
      }
      setClassForAll(listOtherGoods, 'dn')
      res[countShowArr].forEach(elem => elem.classList.remove('dn'))
    })

    leftBtn.addEventListener('click', function (e) {
      if(countShowArr === 0) {
        countShowArr = res.length - 1;
      } else {
        countShowArr--;
      }
      setClassForAll(listOtherGoods, 'dn')
      res[countShowArr].forEach(elem => elem.classList.remove('dn'))
    })

  }

  function selectTypeProductBtns(){
    let standTemplatesBtn = document.querySelector('#standTemplatesBtn');
    if(typeof (standTemplatesBtn) == 'undefined' || standTemplatesBtn == null) return false
    let desTemplatesBtn = document.querySelector('#desTemplatesBtn');
    let logoTemplatesBtn = document.querySelector('#logoTemplatesBtn');

    let standTmpts = document.querySelectorAll('.templates__item[data-stand]')
    let desTmpts = document.querySelectorAll('.templates__item[data-des]')
    let logoTmpts = document.querySelectorAll('.templates__item[data-logo]')

    standTemplatesBtn.textContent += ` (${standTmpts.length ? standTmpts.length : '0'} шт.)`
    desTemplatesBtn.textContent += ` (${desTmpts.length ? desTmpts.length : '0'} шт.)`
    logoTemplatesBtn.textContent += ` (${logoTmpts.length ? logoTmpts.length : '0'} шт.)`

    document.querySelector('.templates__list').addEventListener('click', function (e){
      if(e.target.classList.contains('selectSubTypeTmpl')){
        deleteClassForAll(document.querySelectorAll('.selectSubTypeTmpl'), 'selectedBtn')
        e.target.classList.add('selectedBtn')
        if(e.target === standTemplatesBtn){
          showProducts('data-stand')
          numOfArrSubTempl = 0
          numTempl = 0
        } else if(e.target === desTemplatesBtn){
          showProducts('data-des')
          numOfArrSubTempl = 1
          numTempl = 0
        } else if(e.target === logoTemplatesBtn){
          showProducts('data-logo')
          numOfArrSubTempl = 2
          numTempl = 0
        }
      }
    })

  }

  function cutTemplates(){
    let templateList = document.querySelectorAll('.templates__item')
    if(!templateList || templateList.length === 0){ return false; }

    let resultArr = [[],[],[]];

    templateList.forEach(elem => {
      if(elem.hasAttribute('data-des')){
        resultArr[1].push(elem)
      }
      if(elem.hasAttribute('data-logo')){
        resultArr[2].push(elem)
      }
      if(elem.hasAttribute('data-stand')){
        resultArr[0].push(elem)
      }
    })
    return  resultArr.map(elem => unflat(elem, countProducts))

  }

  function templatesBtn(){
    let leftArrow = document.querySelector('#template_left_arrow')
    let rightArrow = document.querySelector('#template_right_arrow')
    if(typeof (leftArrow) == 'undefined' || rightArrow == null) return false

    let allSubtypeTmplBtns = document.querySelectorAll('.selectSubTypeTmpl')

    let cuttedTemplArr = cutTemplates()
    let templateList = document.querySelectorAll('.templates__item')

    leftArrow.addEventListener('click', function func1(e) {
        if(numOfArrSubTempl === 0 && numTempl === 0) {
          numOfArrSubTempl = cuttedTemplArr.length - 1;
        } else if(numTempl === 0 && numOfArrSubTempl > 0){
          numOfArrSubTempl--;
          numTempl = cuttedTemplArr[numOfArrSubTempl].length - 1
        } else {
          numTempl--
        }
        setClassForAll(templateList, 'dn')
        deleteClassForAll(allSubtypeTmplBtns, 'selectedBtn')
        allSubtypeTmplBtns[numOfArrSubTempl].classList.add('selectedBtn')
        cuttedTemplArr[numOfArrSubTempl][numTempl].forEach(elem => elem.classList.remove('dn'))

      })

    rightArrow.addEventListener('click', function func2(e) {
          if(numOfArrSubTempl === cuttedTemplArr.length - 1 && numTempl === cuttedTemplArr[cuttedTemplArr.length - 1].length - 1){
            numOfArrSubTempl = 0;
            numTempl = 0
          } else if(numTempl === cuttedTemplArr[numOfArrSubTempl].length - 1){
            numOfArrSubTempl ++
            numTempl = 0
          } else {
            numTempl++
          }
          setClassForAll(templateList, 'dn')
          deleteClassForAll(allSubtypeTmplBtns, 'selectedBtn')
          allSubtypeTmplBtns[numOfArrSubTempl].classList.add('selectedBtn')
          cuttedTemplArr[numOfArrSubTempl][numTempl].forEach(elem => elem.classList.remove('dn'))

      })

  }



})()









