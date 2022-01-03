let elem=document.body.querySelector('.elem')

let a = 1
let scale=1
elem.addEventListener('wheel', function (event) {

    if(event.deltaY>0){
      scale+=0.05
    }
    else {
      scale-=0.05
    }

    elem.style.transform = 'scale('+ scale +')'
  console.log(event)

  // аналог event.preventDefault()
    return false
})

