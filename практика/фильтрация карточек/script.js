
let boxs = document.querySelectorAll('.box')

document.querySelector('nav').addEventListener('click', function (event) {
		if(event.target.tagName !== 'LI') return false;
		let filter = event.target.dataset.color


		boxs.forEach(elem=>{
			elem.classList.remove('not-visible')
			if(!elem.classList.contains(filter) && filter !== 'all'){
				elem.classList.add('not-visible')
			}
		})

})