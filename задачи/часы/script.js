window.onload = function () {
let sec = document.querySelector('.sec')
let min = document.querySelector('.min')
let deg = 0
let degMin = 0
setInterval(moveSec, 1000)
setInterval(moveMin, 125)


  function moveMin() {
    min.style.transform = 'rotate('+degMin+'deg)'
    if(degMin==360){
      degMin=0
    }
      degMin+=0.0625
  }


  function moveSec() {
    sec.style.transform = 'rotate('+deg+'deg)'
    if(deg==360){
      deg=0
    }
    deg+=6
  }


}