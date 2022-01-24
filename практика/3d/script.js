
let card = document.querySelector('.card')
let logo = document.querySelector('.logo')
let title = document.querySelector('.title')
let text = document.querySelector('.text')
let elem = document.querySelector('.elem')

card.addEventListener('mouseenter', function () {
	logo.style.transform = 'translate3d(3px, 3px, 3px) rotateX(360deg)'
	title.style.transform = 'translate3d(3px, 3px, 3px)'
	text.style.transform = 'translate3d(3px, 3px, 3px)'
	logo.style.transition = 'all .5s ease'
	title.style.transition = 'all .5s ease'
	text.style.transition = 'all .5s ease'
})

card.addEventListener('mouseleave', function () {
	logo.style.transform = ''
	title.style.transform = ''
	text.style.transform = ''
})

let a = 180
elem.addEventListener('mouseenter', function () {
	this.style.transform = "rotateZ(" + a + "deg)"
	this.style.transition = "all .5s ease"
	a+=180

})

