;(function (){

  document.addEventListener("DOMContentLoaded", ()=>{
    fetchGetIp();
    fetchGetOrg();
    attachFiles();
    mark();
    showProducts('data-stand') // макеты
    showOtherGoods()
    showProductsCases('data-often') // оснастки
    otherGoodsBtn()
    selectTypeProductBtns()
    selectTypeCaseBtns()
    templatesBtn()
    casesBtn()
    setMarkForUrgency()
    addCostDelivery()
  });

  /*Сколько показывать товаров*/
  let countOtherGoods;
  let countProducts; // это макеты
  let countProductCases; // это оснастки

  /*Номер выбранного массива макетов: все, дизайнерские, с лого*/
  // [[все, кроме диз и лого...],[диз...],[с лого...]]
  let numOfArrSubTempl = 0;

  /*номер элемента в подмассиве макетов*/
  let numTempl = 0;

  /*Номер выбранного массива оснасток: часто, авт., карм., металл.*/
  let numOfArrSubCase = 0;

  /*номер элемента в подмассиве оснасток*/
  let numCase = 0;

  /*Счетчик прикрепленных файлов*/
  let counterOfAttachFiles = 1;

  /*Функция получения названия ИП по ИНН/ОГРН*/
  function  fetchGetOrg(){
    let inputInn = document.querySelector('#inn_org');
    let inputName = document.querySelector('#input_name');
    if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
      inputInn.addEventListener('input', function (e) {
        if (inputInn.value.length >= 10) {
          // ищем числа состоящие из 10 или 13 цифр
          let number = inputInn.value.match(/\b\d{13}\b|\b\d{10}\b/g);
          if (number && number.length > 0) {
            fetch('/get/org', {
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
                  inputName.value = `${result.suggestions[0].data.opf.short} "${result.suggestions[0].data.name.full}"`;
                  if(inputName.value.length > 47) { inputName.rows = 2 }
                  inputInn.value = `ИНН: ${result.suggestions[0].data.inn} ОГРН: ${result.suggestions[0].data.ogrn}`
                  document.querySelector('input[name="requisites__contact"]').focus()
                  console.log(result.suggestions[0])
                }
              })
              .catch(error => console.log("error", error));
          }
        }
      });
    }
  }

  /*Функция получения названия ООО по ИНН/ОГРН*/
  function  fetchGetIp(){
    let inputInn = document.querySelector('#inn__ip');
    let inputName = document.querySelector('#input_name');
    if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
      inputInn.addEventListener('input', function (e) {
        if (inputInn.value.length >= 12) {
          // ищем числа состоящие из 12 или 15 цифр
          let number = inputInn.value.match(/\b(\d{15})\b|\b(\d{12})\b/g);

          if (number && number.length > 0) {
            fetch('/get/ip', {
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
                inputInn.value = `ИНН: ${result.suggestions[0].data.inn} ОГРНИП: ${result.suggestions[0].data.ogrn}`
                document.querySelector('input[name="requisites__contact"]').focus()
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
          changeOrderSum()
        })
      })
    }

    let casesInputs = document.querySelectorAll('input[name="case"]')
    if(casesInputs && casesInputs.length > 0){
      casesInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          casesInputs.forEach(elem => elem.closest('.cases__item').classList.remove('mark'))
          this.closest('.cases__item').classList.add('mark')
          changeOrderSum()
        })
      })
    }

    let otherGoodsInputs = document.querySelectorAll('.other-goods__item input[type="checkbox"]')
    if(otherGoodsInputs && otherGoodsInputs.length > 0){
      otherGoodsInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          this.closest('.other-goods__item').classList.toggle('mark')
          changeOrderSum()
        })
      })
    }

    let stampsInputs = document.querySelectorAll('input[name="stamp"]')
    if(typeof (stampsInputs) !== 'undefined' || stampsInputs !== null) {
      stampsInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          stampsInputs.forEach(elem => elem.closest('.stamp__item').classList.remove('mark'))
          this.closest('.stamp__item').classList.add('mark')
          changeOrderSum()
        })
      })
    }

    let faksimileInputs = document.querySelectorAll('input[name="faksimile"]')
    if(typeof (faksimileInputs) !== 'undefined' || faksimileInputs !== null) {
      faksimileInputs.forEach(elem => {
        elem.addEventListener('change', function (e) {
          faksimileInputs.forEach(elem => elem.closest('.faksimile__item').classList.remove('mark'))
          this.closest('.faksimile__item').classList.add('mark')
          changeOrderSum()
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
      productsTempl: {
        300: 2,
        575: 3,
        767: 3,
        990: 5,
        1200: 6,
        1350: 6
      },
      productsCases: {
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

    for (let key in breakpoints.productsTempl){
      if(containerWidth >= key){
        countProducts = breakpoints.productsTempl[key]
      }
    }

    for (let key in breakpoints.productsCases){
      if(containerWidth >= key){
        countProductCases = breakpoints.productsCases[key]
      }
    }

  }

  function showOtherGoods(){
    let listOtherGoods = document.querySelectorAll('.other-goods__item');
    /*если на странице не найдется товаров отменим функцию*/
    if(!listOtherGoods || listOtherGoods.length === 0){ return false; }

    setCountsByBreakpoints()

    for(let i=0; i<listOtherGoods.length; i++){
      listOtherGoods[i].classList.add('dn')
      if(i < countOtherGoods){
        listOtherGoods[i].classList.remove('dn')
      }
    }

    window.addEventListener('resize', function redraw1(){
      /*отвяжем, чтобы не тормозило, иначе навешиваются множество функций одинаковых*/
      window.removeEventListener('resize', redraw1)
      showOtherGoods()
      otherGoodsBtn()
    })

  }

  /*Функция показа слайдеров для других товаров и макетов*/
  function showProducts(dataType){
    let listProducts = document.querySelectorAll('.templates__item');
    let listSelectedProducts = document.querySelectorAll(`[${dataType}]`)

    /*если на странице не найдется товаров отменим функцию*/
    if(!listProducts || listProducts.length === 0){ return false; }

    setCountsByBreakpoints()

    listProducts.forEach(elem => elem.classList.add('dn'))

    for(let i=0; i<countProducts; i++){
        if(listSelectedProducts[i]){
          listSelectedProducts[i].classList.remove('dn')
        } else {
        break
        }
    }

    window.addEventListener('resize', function redraw(){
      /*отвяжем, чтобы не тормозило, иначе навешиваются множество функций одинаковых*/
      window.removeEventListener('resize', redraw)
      showProducts('data-stand')
    })

  }

  /*Функция показа слайдера для оснасток*/
  function showProductsCases(dataType){
    let listCases = document.querySelectorAll('.cases__item');
    let listSelectedCases = document.querySelectorAll(`[${dataType}]`)

    /*если на странице не найдется макетов отменим функцию*/
    if(!listCases || listCases.length === 0){ return false; }

    listCases.forEach(elem => elem.classList.add('dn'))

    for(let i=0; i<countProductCases; i++){
      if(listSelectedCases[i]){
        listSelectedCases[i].classList.remove('dn')
      } else {
        break
      }
    }

    window.addEventListener('resize', function redraw2(){
      /*отвяжем, чтобы не тормозило, иначе навешиваются множество функций одинаковых*/
      window.removeEventListener('resize', redraw2)
      showProductsCases(dataType)
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

  /*Функция для кнопок макетов: Стандартные, дизайнерские и пр.*/
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

  /*Функция для кнопок оснасток: часто, авт., карм. и пр.*/
  function selectTypeCaseBtns(){
    let oftenCasesBtn = document.querySelector('#oftenCaseBtn');
    if(typeof (oftenCasesBtn) == 'undefined' || oftenCasesBtn == null) return false
    let autCaseBtn = document.querySelector('#autCaseBtn');
    let pockCaseBtn = document.querySelector('#pockCaseBtn');

    let oftenCases = document.querySelectorAll('.cases__item[data-often]')
    let autCases = document.querySelectorAll('.cases__item[data-aut]')
    let pocketCases = document.querySelectorAll('.cases__item[data-pocket]')


    oftenCasesBtn.textContent += ` (${oftenCases.length ? oftenCases.length : '0'} шт.)`
    autCaseBtn.textContent += ` (${autCases.length ? autCases.length : '0'} шт.)`
    pockCaseBtn.textContent += ` (${pocketCases.length ? pocketCases.length : '0'} шт.)`


    document.querySelector('.cases__list').addEventListener('click', function (e){
      if(e.target.classList.contains('selectSubTypeCase')){
        deleteClassForAll(document.querySelectorAll('.selectSubTypeCase'), 'selectedBtn')
        e.target.classList.add('selectedBtn')
        if(e.target === oftenCasesBtn){
          showProductsCases('data-often')
          numOfArrSubCase = 0
          numCase = 0
        } else if(e.target === autCaseBtn){
          showProductsCases('data-aut')
          numOfArrSubCase = 1
          numCase = 0
        } else if(e.target === pockCaseBtn){
          showProductsCases('data-pocket')
          numOfArrSubCase = 2
          numCase = 0
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

  function cutCases(){
    let caseList = document.querySelectorAll('.cases__item')
    if(!caseList || caseList.length === 0){ return false; }

    let resultArr = [[],[],[]];

    caseList.forEach(elem => {
      if(elem.hasAttribute('data-often')){
        resultArr[0].push(elem)
      }
      if(elem.hasAttribute('data-aut')){
        resultArr[1].push(elem)
      }
      if(elem.hasAttribute('data-pocket')){
        resultArr[2].push(elem)
      }

    })
    return  resultArr.map(elem => unflat(elem, countProducts))

  }

  function templatesBtn(){
    let leftArrow = document.querySelector('#template_left_arrow')
    let rightArrow = document.querySelector('#template_right_arrow')
    if(typeof (leftArrow) === 'undefined' || leftArrow === null) return false

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

  function casesBtn(){
    let leftArrow = document.querySelector('#case_left_arrow')
    let rightArrow = document.querySelector('#case_right_arrow')
    if(typeof (leftArrow) === 'undefined' || leftArrow === null) return false

    let allSubtypeCaseBtns = document.querySelectorAll('.selectSubTypeCase')

    let cuttedCaseArr = cutCases()
    let caseList = document.querySelectorAll('.cases__item')

    leftArrow.addEventListener('click', function func1(e) {
      if(numOfArrSubCase === 0 && numCase === 0) {
        numOfArrSubCase = cuttedCaseArr.length - 1;
      } else if(numCase === 0 && numOfArrSubCase > 0){
        numOfArrSubCase--;
        numCase = cuttedCaseArr[numOfArrSubCase].length - 1
      } else {
        numCase--
      }
      setClassForAll(caseList, 'dn')
      deleteClassForAll(allSubtypeCaseBtns, 'selectedBtn')
      allSubtypeCaseBtns[numOfArrSubCase].classList.add('selectedBtn')
      if(cuttedCaseArr[numOfArrSubCase][numCase]){
        cuttedCaseArr[numOfArrSubCase][numCase].forEach(elem => elem.classList.remove('dn'))
      }


    })

    rightArrow.addEventListener('click', function func2(e) {
      if(numOfArrSubCase === cuttedCaseArr.length - 1 && numCase === cuttedCaseArr[cuttedCaseArr.length - 1].length - 1){
        numOfArrSubCase = 0;
        numCase = 0
      } else if(numCase === cuttedCaseArr[numOfArrSubCase].length - 1){
        numOfArrSubCase ++
        numCase = 0
      } else {
        numCase++
      }
      // на случай, если оснастка не была добавлена и будет ошибка
      if(!cuttedCaseArr[numOfArrSubCase][numCase]){
        numOfArrSubCase=0;
        numCase=0
      }
      setClassForAll(caseList, 'dn')
      deleteClassForAll(allSubtypeCaseBtns, 'selectedBtn')
      allSubtypeCaseBtns[numOfArrSubCase].classList.add('selectedBtn')
      cuttedCaseArr[numOfArrSubCase][numCase].forEach(elem => elem.classList.remove('dn'))




    })
  }

  function setMarkForUrgency(){
    let labels = document.querySelectorAll('.urgency__label')
    if(!labels || labels.length === 0) { return false; }
    labels.forEach(elem => {
      elem.addEventListener('click', function (e){
        labels.forEach(el => el.classList.remove('mark'))
        elem.classList.add('mark')
        changeOrderSum()
      })
    })
  }

  function changeOrderSum(){
    let span = document.querySelector('#order_sum')
    if(typeof (span) == 'undefined' || span == null) return false

    let hiddenInp = document.querySelector('#inp_order_sum')
    let prices = document.querySelectorAll('.mark')
    let sum = 0;
    for (let elem of prices) {
      if(elem.dataset.price && elem.dataset.price !== '' && elem.dataset.price !== null && typeof (elem.dataset.price) !== "undefined"){
        sum += Number(elem.dataset.price)
      } else {
        sum = 'рассчитаем'
        document.querySelector('#add_delivery').classList.add('dn')
        break
      }
    }
    if(typeof (sum) === 'number' && !isNaN(sum)){
      sum += ' ₽'
      document.querySelector('#add_delivery').classList.remove('dn')
    }
    hiddenInp.value = span.textContent = sum
  }

  function addCostDelivery(){
    let span = document.querySelector('#add_delivery')
    if(typeof (span) == 'undefined' || span == null) return false

    let delivery__list = document.querySelector('.delivery__list')
    delivery__list.addEventListener('click', function (e) {
          if(e.target.classList.contains('add_delivery')){
            span.textContent = ' + доставка'
          } else if(e.target.classList.contains('remove_delivery')){
            span.textContent = null
          }
      })
  }



})()









