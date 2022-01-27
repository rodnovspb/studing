let width = window.screen.availWidth;
console.log(width)

if(width>1000){
	let text = document.querySelector('.text')
	window.addEventListener('mousemove', function (event) {
		let x = event.clientX/window.innerWidth;
		let y = event.clientY/window.innerHeight;
		text.style.transform = `translate(-${x*20}px, -${y*20}px)`
	})
}