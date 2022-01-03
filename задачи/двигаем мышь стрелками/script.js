window.addEventListener('load', function () {
  let test = document.querySelector('.test')
  let count = 0
  let countTop = 0
    document.addEventListener('keydown', function (event) {
        if(event.code=='ArrowRight'){
          count+=3
          test.style.left = count + 'px'

        }
        if(event.code=="ArrowLeft"){
          count-=3
          test.style.left = count + 'px'

        }
      if(event.code=="ArrowDown"){
        countTop+=3
        test.style.top = countTop + 'px'

      }
      if(event.code=="ArrowUp"){
        countTop-=3
        test.style.top = countTop + 'px'

      }

    })
})