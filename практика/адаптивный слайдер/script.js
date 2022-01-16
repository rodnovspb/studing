
let images = document.querySelectorAll('.slider img')
let sliderLine = document.querySelector('.slider-line')
let slider = document.querySelector('.slider')
let btnPrev = document.querySelector('.btn-prev')
let btnNext = document.querySelector('.btn-next')

let count = 0
let width

function init() {
  width = slider.offsetWidth
  sliderLine.style.width = width*images.length + "px"
  images.forEach(item=>{
  item.style.width = width + "px"
  item.style.height = 'auto'
  }
  )
  count=0
  sliderLine.style.transform = "translateX(0px)"

}
init()
window.addEventListener('resize', init)

btnPrev.addEventListener('click', function () {
  count=count-width
  if(count==-width*images.length){
    count=0
  }
  sliderLine.style.transform = "translateX("+count+"px)"
})

btnNext.addEventListener('click', function () {
  count=count+width
  if(count==width){
    count = -width*(images.length-1)
  }
  sliderLine.style.transform = "translateX("+count+"px)"

})

