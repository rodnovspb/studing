document.querySelector('.root-nav').addEventListener('click', function (event) {
	if(event.target.nodeName !== "SPAN") return;
	closeSubMenu(event.target.nextElementSibling);
	event.target.nextElementSibling.classList.toggle('sub-menu-active');


})

function closeSubMenu(current=null) {
	const parents = [];
	if(current){
		// console.dir(current)
		let currentParent = current.parentNode
		while(currentParent){
			if(currentParent.classList.contains('root-nav')){
				break;
			}
			if(currentParent.nodeName=='UL'){
				parents.push(currentParent)
				currentParent = currentParent.parentNode
			}
		}
	}
	const subMenu = document.querySelectorAll('.root-nav ul');
	Array.from(subMenu).forEach(item=>{
		if(item != current && !parents.includes(item)){
			item.classList.remove('sub-menu-active')
		}
	})
}