let one = document.querySelector('.one')
let two = document.querySelector('.two')
let parent = document.querySelector('.myslide')

parent.onmousemove = function (event) {
    two.style.width = event.offsetX + 'px'
}
parent.onmouseout = function () {
  two.style.width = '500px'
  two.style.transition = "width 350ms ease"
}
parent.onmouseover = function () {
  two.style.removeProperty('transition')
}