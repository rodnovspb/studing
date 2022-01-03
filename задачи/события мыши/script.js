let one = document.querySelector('.one')

function randomColor(){
  let num1 = Math.random()*255
  let num2 = Math.random()*255
  let num3 = Math.random()*255
  return 'rgb('+num1+','+num2+','+ num3+')'
}


one.onclick = function () {
    this.style.backgroundColor = randomColor()
}

one.addEventListener('contextmenu', function (event) {
    this.style.transform = 'scale(2) rotate(45deg)'
    event.preventDefault()
})

one.oncontextmenu = function () {
  this.style.transform = 'scale(2) rotate(45deg)'
  return false
}

document.addEventListener('contextmenu', function (event) {
  event.preventDefault()
})

document.oncontextmenu = function () {
  return false
}

let a = 0, b = 0
one.addEventListener('mouseenter', function () {
  a+=20
  this.style.transform = 'translate('+a+'px)'
})

one.addEventListener('mouseleave', function () {
  b+=20
  this.style.transform = 'translate(-'+a+'px)'
})
let width = 150
one.addEventListener('mousemove', function () {
  width+=1
  this.style.width = width + 'px'
})
one.addEventListener('mousedown', function (event) {
  console.log(event.which + ' ' + event.button)
})

one.addEventListener('mouseup', function (event) {
  console.log('отпустил')
})

// запрет выделения текста
document.onmousedown = function () {
  return false
}