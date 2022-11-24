init()
loadRubrics(0)

let blockQuestion = [];
let currentQuestion;
let questions;

if(!localStorage.getItem('blockQuestions')){
	localStorage.setItem('blockQuestions', JSON.stringify([]))
} else {
	blockQuestion = JSON.parse(localStorage.getItem('blockQuestions'))
}

function init(){
	let str = '';
	for(let i=1, j=0; i<11; i++,j+=10){
		str += `<li class="page-item"><a class="page-link" href="" data-offset="${j}">${i}</a></li>`
	}
	pagination.innerHTML = str;
	pagination.firstElementChild.classList.add('active')

	let list = document.querySelectorAll('.page-link')
	list.forEach(elem=>{
		elem.addEventListener('click', function (e) {
			e.preventDefault()
			let parentsLiList = document.querySelectorAll('#pagination .page-item')

			removeActive(parentsLiList)

			this.closest('.page-item').classList.add('active')
			let offset = elem.dataset.offset
			loadRubrics(offset)
		})
	})
}

function removeActive(list){
	list.forEach(elem=>{
		elem.className = elem.className.replace('active', '')
	})
}

function loadRubrics(offset){
	fetch(`http://jservice.io/api/categories?count=10&offset=${offset}`)
			.then(res=>res.json())
			.then(res=>showRubrics(res))
}

function showRubrics(data){
	let str = ''
	for (let datum of data) {
		str += `<li><a href="#" data-id="${datum.id}">${datum.title}</a></li>`
	}
	rubrics_list.innerHTML = str

	setActive()
}

function setActive(){
	let links = document.querySelectorAll('#rubrics_list a')
	links.forEach(elem=>{
		elem.addEventListener('click', function (e){
			e.preventDefault()
			removeActive(links)
			this.classList.add('active')
		})
	})
}

btn.addEventListener('click', async function (e) {
	try {
		let activeLink = document.querySelector('#rubrics_list a.active')
		if(!activeLink){
			alert('Выберите категорию')
			return
		}
		let category_id = activeLink.dataset.id

		let response = await fetch(`http://jservice.io/api/clues?category=${category_id}`)

		if(!response.ok){
			throw new Error('Код ответа вне диапазона 200-299')
		} else {
			questions = await response.json()
			for (let question of questions) {
				if(!blockQuestion.includes(question.id)){
					textOfQuestion.textContent = question.question
					document.querySelector('#skip').style.display = 'inline-block'
					document.querySelector('#answer').style.display = 'inline-block'
					currentQuestion = question
					break
				}
			}

		}

	} catch (e){
		console.log(e)
	}
})

skip.addEventListener('click', function (e) {

	blockQuestion.push(currentQuestion.id)

	for (let question of questions) {
		if(!blockQuestion.includes(question.id)){
			textOfQuestion.textContent = question.question
			currentQuestion = question
			break
		}
	}
  })

answer.addEventListener('keyup', function (e) {
		if(e.code === 'Enter' && answer.value == currentQuestion.answer){
			alert('Правильно')
		} else {
			alert('Неправильно')
		}
  })

window.addEventListener('beforeunload', function (e) {
	localStorage.setItem('blockQuestions', JSON.stringify(blockQuestion))
  })