let row = document.querySelector('.row')
let left = 0
document.querySelector('.left').addEventListener('click', function () {
    left<-384 ? left=0:left-=128
    row.style.left = left + 'px'
})