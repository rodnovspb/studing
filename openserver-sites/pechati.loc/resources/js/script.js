document.addEventListener("DOMContentLoaded", ()=>{
  fetchGetIp();
  attachFiles();
  mark();
  showProducts()
  otherGoodsBtn()
});

/*Сколько показывать других товаров*/
let countOtherGoods;

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
    300: 2,
    575: 4,
    767: 5,
    990: 6,
    1200: 7,
    1350: 8
  }

  let containerWidth = document.querySelector('.container').clientWidth;

  for (let key in breakpoints){
    if(containerWidth >= key){
      countOtherGoods = breakpoints[key]
    }
  }

}

/*Функция показа слайдеров*/
function showProducts(){
  setCountsByBreakpoints()

  let listOtherGoods = document.querySelectorAll('.other-goods__item');

  for(let i=0; i<listOtherGoods.length; i++){
    listOtherGoods[i].classList.add('dn')
    if(i < countOtherGoods){
      listOtherGoods[i].classList.remove('dn')
    }
  }

  window.addEventListener('resize', function redraw(){
    /*отвяжем, чтобы не тормозило, иначе навешиваются множество функций одинаковых*/
    window.removeEventListener('resize', redraw)
    showProducts()
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

/*Функция добавления всем другим товарам display:none*/
function setNoneForOtherGoods(listOtherGoods){
  listOtherGoods.forEach(elem => elem.classList.add('dn'))
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
      setNoneForOtherGoods(listOtherGoods)
      res[countShowArr].forEach(elem => elem.classList.remove('dn'))
    })

  leftBtn.addEventListener('click', function (e) {
      if(countShowArr === 0) {
        countShowArr = res.length - 1;
      } else {
        countShowArr--;
      }
      setNoneForOtherGoods(listOtherGoods)
      res[countShowArr].forEach(elem => elem.classList.remove('dn'))
    })

}








