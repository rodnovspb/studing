// let int = document.querySelector('#intro')
// let head = document.querySelector('#header')
// window.addEventListener('scroll', function () {
// 	if(this.scrollY>=int.clientHeight){
// 		head.classList.add('header--dark')
// 	} else {
// 		head.classList.remove('header--dark')
// 	}
// })
// window.addEventListener('resize', function () {
// 	console.log(`${this.innerWidth} ${this.innerHeight}`)
// })


$(function () {
	let introH, headerH;
	let intro = $("#intro");
	let header = $("#header");
	headerScroll()
	$(window).on('scroll resize', function () {
		headerScroll()
	})

	function headerScroll() {
		introH = intro.innerHeight();
		headerH = header.innerHeight();
		let scrollTop = $(this).scrollTop()
		if(scrollTop >= introH - headerH ){
			header.addClass('header--dark')
		} else {
			header.removeClass('header--dark')
		}
	}

})

