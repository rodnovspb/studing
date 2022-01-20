document.querySelector('.root').addEventListener('mouseover', function (event) {
	if(event.target.parentElement.parentElement.nodeName==='UL'){
		//находим родителя наведенного элемента
		let parentActive = event.target.parentElement.parentElement
		//находим детей родителя (братьев наведенного элемента)
		let children = Array.from(parentActive.children)
		for(let elem of children){
			//находим детей ul у каждого вышестоящего ребенка
			let uls = elem.querySelectorAll('ul')
			for(let elem1 of uls){
				//если ul содержит класс .active, то убираем его
				if(elem1.classList.contains('active')){
					elem1.classList.remove('active')
				}
			}

		}

		if(event.target.nodeName==='SPAN'){
			event.target.nextElementSibling.classList.add('active')
		}
	}

})

document.querySelector('.root').addEventListener('mouseleave', function () {
	let uls = this.querySelectorAll('ul')
	for(let elem of uls){
		elem.classList.remove('active')
	}

})