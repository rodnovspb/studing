document.querySelector('.form-input').setAttribute('autocomplete', "off")

document.querySelector('.check').addEventListener('click', function () {
  let btn = document.querySelector('.btn')
  if(btn.hasAttribute('disabled')){
    btn.removeAttribute('disabled')
  }
  else {
    btn.setAttribute('disabled', 'disabled')
  }

})