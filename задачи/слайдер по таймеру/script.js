let row = document.querySelector('.row')
let left = 0
autoSlider()

function autoSlider() {
    let timer = setTimeout(function () {
        left<-384 ? left=0:left-=128
        clearTimeout(timer)
        row.style.left = left + 'px'
        autoSlider()
    }, 1000)

}

