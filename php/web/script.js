let nameReg = document.querySelector('[name="name-reg"]')
nameReg.addEventListener('blur', function (){
  if(!(/^[A-zА-яё]{1,30}$/.test(nameReg.value))) {
    document.querySelector('.span-name').textContent = 'От 1 до 30 букв'
  }
  else {
    document.querySelector('.span-name').textContent = ''
    if(nameReg.classList.contains('red')) nameReg.classList.remove('red')
  }
})

let surnameReg = document.querySelector('[name="surname-reg"]')
surnameReg.addEventListener('blur', function (){
  if(!(/^[A-zА-яё]{1,30}$/.test(surnameReg.value))) {
    document.querySelector('.span-surname').textContent = 'От 1 до 30 букв'
  }
  else {
    document.querySelector('.span-surname').textContent = ''
    if(surnameReg.classList.contains('red')) surnameReg.classList.remove('red')
  }
})

let mailReg = document.querySelector('[name="mail-reg"]')
mailReg.addEventListener('blur', function (){
  if(!(/^[\w_.-]{1,30}@[\w_.-]{1,30}\.\w{1,20}$/.test(mailReg.value))) {
    document.querySelector('.span-mail').textContent = 'Неправильный формат'
  }
  else {
    document.querySelector('.span-mail').textContent = ''
    if(mailReg.classList.contains('red')) mailReg.classList.remove('red')
  }
})

let loginReg = document.querySelector('[name="login-reg"]')
loginReg.addEventListener('blur', function (){
  if(!(/^[A-z0-9]{1,30}$/.test(loginReg.value))) {
    document.querySelector('.span-login').textContent = 'Латинские буквы и цифры от 1 до 30 шт.'
  }
  else {
    document.querySelector('.span-login').textContent = ''
    if(loginReg.classList.contains('red')) loginReg.classList.remove('red')

  }
})

let passReg = document.querySelector('[name="pass-reg"]')
passReg.addEventListener('blur', function (){
  if(!(/^[A-z0-9]{3,8}$/.test(passReg.value))) {
    document.querySelector('.span-pass').textContent = 'Латинские буквы и цифры от 3 до 8 шт.'
  }
  else {
    document.querySelector('.span-pass').textContent = ''
    if(passReg.classList.contains('red')) passReg.classList.remove('red')

  }
  if(confirmReg.value) {
    if(passReg.value !== confirmReg.value) {
      document.querySelector('.span-confirm').textContent = 'Пароли не совпадают'
    }
    else {
      document.querySelector('.span-confirm').textContent = ''
      if(confirmReg.classList.contains('red')) confirmReg.classList.remove('red')

    }
  }
})

let dateReg = document.querySelector('[name="date-reg"]')
dateReg.addEventListener('blur', function (){
  if(dateReg.value) {
    if(dateReg.classList.contains('red')) dateReg.classList.remove('red')
  }
})

let confirmReg = document.querySelector('[name="confirm-reg"]')
confirmReg.addEventListener('blur', function (){
  if(passReg.value !== confirmReg.value) {
    document.querySelector('.span-confirm').textContent = 'Пароли не совпадают'
  }
  else {
    document.querySelector('.span-confirm').textContent = ''
    if(confirmReg.classList.contains('red')) confirmReg.classList.remove('red')

  }
})



let submitReg = document.querySelector('[name="submit-reg"]')

submitReg.onclick = function (e){
let inputs = document.querySelectorAll('.input-reg')
  inputs.forEach(elem=>{
    if(elem.value==''){
        if(elem.classList.contains('red')){
          elem.classList.remove('red')
          setTimeout(function (){
            elem.classList.add('red')
          }, 1)
        } else {
          elem.classList.add('red')
        }

    }
  })
let res1 = Array.from(inputs).every(elem=>elem.value !=='')
let regs = document.querySelectorAll('.reg')
let res = Array.from(regs).every(elem=>elem.textContent==='')
if(!res1 || !res) return false
}






