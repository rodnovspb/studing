const burger = document.querySelector('.menu-icon')
const menu = document.querySelector('.menu')
const body = document.body

if(burger && menu){
	burger.addEventListener('click', function (e) {
	      burger.classList.toggle('_active')
		  menu.classList.toggle('_active')
		  body.classList.toggle('_lock')
	  })
}