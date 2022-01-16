
let input = document.querySelector('.check')
let spider = document.querySelector('.spider')
let header = document.querySelector('.header')

input.addEventListener('change', function () {
  if(this.checked){
    spider.style.animationName='animation2'
    header.style.animationName='animation'
  }
  else {
    spider.style.animationName=null
    header.style.animationName=null
  }
})


function playSound() {
  let sound = new Audio()
  sound.preload
  sound.src='sound.mp3'
  sound.play()
}

spider.onclick = playSound