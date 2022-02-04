
let span = document.querySelector('.close')
let btn = document.querySelector('.myBtn')
let modal = document.querySelector('.modal')


btn.addEventListener('click', function () {
	modal.classList.add('block')
})

span.addEventListener('click', function () {
	modal.classList.remove('block')
})

window.addEventListener('click', function (event) {
	if(event.target.classList.contains('modal')){
		modal.classList.remove('block')
	}
})