let block = document.querySelector('.block')
let img = document.querySelector('img')
img.draggable = false
img.onclick = function(){
  console.log(img.getBoundingClientRect())
}

block.addEventListener('mousedown', function (event) {
  this.style.position = 'absolute'
  this.style.zIndex = '1000'
  document.body.append(block)
  let shiftX = event.clientX - block.getBoundingClientRect().left
  let shiftY = event.clientY - block.getBoundingClientRect().top

  function moveAt(num1, num2) {
    block.style.left = num1 - shiftX + 'px'
    block.style.top = num2 - shiftY + 'px'
  }

  moveAt(event.pageX, event.pageY)

  document.addEventListener('mousemove', function f1(event) {
    moveAt(event.pageX, event.pageY)
    block.addEventListener('mouseup', function () {
      document.removeEventListener('mousemove', f1)
      block.onmouseup = null
    })
  })





})