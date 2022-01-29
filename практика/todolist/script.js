// localStorage.clear()
let add = document.querySelector('.add')
let ul = document.querySelector('.todo__items')

let data = localStorage.getItem('data')
if(data){
	ul.innerHTML = data
}

add.addEventListener('click', function () {
	let text = document.querySelector('.todo__input')
	if(text.value.length){
		let data = document.createElement('li')
		data.className = 'todo__item'
		data.dataset.todostate = 'active'
		let span = document.createElement('span')
		span.className = 'todo__task'
		span.textContent = text.value
		let commonSpan = document.createElement('span')
		commonSpan.className = "actions"
		let span1 = document.createElement('span')
		span1.className = 'todo__action todo__action_active'
		let span2 = document.createElement('span')
		span2.className = 'todo__action todo__action_complete'
		let span3 = document.createElement('span')
		span3.className = 'todo__action todo__action_delete'
		commonSpan.append(span1, span2, span3)
		data.append(span, commonSpan)
		ul.appendChild(data)
		text.value = ''

		let btns = commonSpan.children
		addAction(btns)

		}

			save()
}
)


let select = document.querySelector('.todo__select')
select.addEventListener('change', function () {
	let li = document.querySelectorAll('.todo__items li')
	for(let i = 0; i<li.length; i++){
		if(select.value===li[i].dataset.todostate){
			li[i].classList.add('display')
			li[i].classList.remove('display-none')
		}
		else {
			li[i].classList.remove('display')
			li[i].classList.add('display-none')
		}
	}

	if(this.value!=='active'){
		document.querySelector('.todo__input').setAttribute('disabled', 'disabled')
	}
	else {
		document.querySelector('.todo__input').removeAttribute('disabled')
	}

}


)


function save() {
	let data = document.querySelector('.todo__items').innerHTML
	localStorage.setItem('data', data)
}

function f() {
	let select = document.querySelector('.todo__select')
	if(select.value===this.parentElement.parentElement.dataset.todostate){
		this.parentElement.parentElement.classList.add('display')
		this.parentElement.parentElement.classList.remove('.display-none')
	}
	else {
		this.parentElement.parentElement.classList.remove('display')
		this.parentElement.parentElement.classList.add('display-none')
	}
}



function addAction(btns){
	for(let i = 0; i<btns.length; i++){

		if(btns[i].classList.contains('todo__action_active')){
			btns[i].addEventListener('click', function () {
				this.parentElement.parentElement.dataset.todostate = 'active'
				f.call(btns[i])
				save()
			})
		}

		if(btns[i].classList.contains('todo__action_complete')){
			btns[i].addEventListener('click', function () {
				this.parentElement.parentElement.dataset.todostate = 'complete'
				f.call(btns[i])
				save()
			})
		}

		if(btns[i].classList.contains('todo__action_delete')){
			btns[i].addEventListener('click', function () {
				this.parentElement.parentElement.dataset.todostate = 'delete'
				f.call(btns[i])
				save()
			})
		}


	}


}


addAction(document.querySelectorAll('.todo__action'))





// 		`<li class="todo__item" data-todostate = 'active'>
// // 		<span class="todo__task">${text}</span>
// //         <span class="actions">
// //           <span class="todo__action todo__action_restore"></span>
// // 		  <span class="todo__action todo__action_complete"></span>
// // 		  <span class="todo__action todo__action_delete"></span>
// //         </span>
// //       </li>`








































// let todo = {
// 	save(){
// 		let data = document.querySelector('.todo__items').innerHTML
// 		localStorage.setItem('todo', data)
// 	},
// 	action(e) {
// 		if(e){
// 			console.log(e.target)
// 		}
// 	},
// 	add(){
// 		let text = document.querySelector('.todo__input').value
// 		document.querySelector('.todo__items').insertAdjacentHTML('beforeend', this.create(text))
// 		document.querySelector('.todo__input').value = ''
//
// 	},
// 	create(text) {
// 		return `<li class="todo__item" data-todostate = 'active'>
// 		<span class="todo__task">${text}</span>
//         <span class="actions">
//           <span class="todo__action todo__action_restore"></span>
// 		  <span class="todo__action todo__action_complete"></span>
// 		  <span class="todo__action todo__action_delete"></span>
//         </span>
//       </li>`
//
// 	},
// 	init(){
// 		let fromStorage = localStorage.getItem('todo')
// 		if(fromStorage) {
// 			document.querySelector('.todo__items').innerHTML = fromStorage
// 		}
// 		f()
// 	}
// }
//
// todo.init()
//
//
// let add = document.querySelector('.add')
// add.addEventListener('click', function () {
// 	let text = document.querySelector('.todo__input').value
// 	if(text.length){
// 		todo.add()
// 		todo.save()
// 	}
// })
//
// let select = document.querySelector('.todo__select')
// select.addEventListener('change', function () {
// 	let value = select.value
// 	let li = document.querySelectorAll('.todo__items li')
// 	for (let i=0; i<li.length; i++){
// 		if(li[i].dataset.todostate !== value){
// 			li[i].classList.remove('display')
// 			li[i].classList.add('display-none')
// 		}
// 		else {
// 			li[i].classList.remove('display-none')
// 			li[i].classList.add('display')
// 		}
// 	}
//
// 	if(select.value !=='active'){
// 		document.querySelector('.todo__input').setAttribute('disabled', 'disabled')
// 	}
// 	else {
// 		document.querySelector('.todo__input').removeAttribute('disabled')
// 	}
//
// 	let active1 = document.querySelector('.todo__action_restore')
// 	let delete1 = document.querySelector('.todo__action_delete')
// 	let complete1 = document.querySelector('.todo__action_complete')
//
// 	// switch (value) {
// 	// 	case 'active':
// 	// 		active1.classList.remove('btn_yes')
// 	// 		active1.classList.add('btn_no')
// 	// 		complete1.classList.remove('btn_no')
// 	// 		complete1.classList.add('btn_yes')
// 	// 		break
// 	// 	case "completed":
// 	// 		active1.classList.add('btn_yes')
// 	// 		active1.classList.remove('btn_no')
// 	// 		complete1.classList.remove('btn_yes')
// 	// 		complete1.classList.add('btn_no')
// 	// }
//
//
//
// })
//
// function f() {
// 	let buttons = document.querySelectorAll('.todo__action')
// 	for(let i=0; i<buttons.length; i++){
// 		if(buttons[i].classList.contains('todo__action_restore')){
// 			buttons[i].addEventListener('click', function () {
// 				this.closest('.todo__item').dataset.todostate = 'active'
// 				if(select.value=='active'){
// 					this.closest('.todo__item').classList.add('display')
// 					this.closest('.todo__item').classList.remove('display-none')
// 				}
// 				else {
// 					this.closest('.todo__item').classList.add('display-none')
// 					this.closest('.todo__item').classList.remove('display')
// 				}
//
// 			});
// 		}
// 		if(buttons[i].classList.contains('todo__action_delete')){
// 			buttons[i].addEventListener('click', function () {
// 				this.closest('.todo__item').dataset.todostate = 'deleted'
// 				if(select.value=='deleted'){
// 					this.closest('.todo__item').remove()
//
//
// 				}
// 				else {
// 					this.closest('.todo__item').classList.add('display-none')
// 					this.closest('.todo__item').classList.remove('display')
// 				}
// 			});
//
// 		}
// 		if(buttons[i].classList.contains('todo__action_complete')){
// 			buttons[i].addEventListener('click', function () {
// 				this.closest('.todo__item').dataset.todostate = 'completed'
// 				if(select.value=='completed'){
// 					this.closest('.todo__item').classList.add('display')
// 					this.closest('.todo__item').classList.remove('display-none')
// 				}
// 				else {
// 					this.closest('.todo__item').classList.add('display-none')
// 					this.closest('.todo__item').classList.remove('display')
// 				}
// 			});
// 		}
//
// 	}
//
// }


