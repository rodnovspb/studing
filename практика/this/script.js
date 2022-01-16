document.querySelector('button').onclick = ()=> {
  console.log(this)
}

document.querySelector('.select').addEventListener('change', f)

function f() {
    document.querySelector('.elem2').textContent = this.value
  console.log(this)
}

f.apply(document.querySelector('.select'))

document.querySelector('button').onclick = function () {
    console.log(document.querySelector('button')===this)
}

let a = document.querySelector('.select')

function f() {
  console.log(this)
}

f.apply(a)