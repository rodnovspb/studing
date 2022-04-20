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
//
//
// document.querySelectorAll('[data-scroll]').forEach(function (elem) {
// 		elem.addEventListener('click', function (e) {
// 			e.preventDefault()
// 			document.querySelector(elem.dataset.scroll).scrollIntoView({ block: "center", behavior: "smooth"})
//
// 		})
// })



$(function () {
	let introH, headerH;
	let intro = $("#intro");
	let header = $("#header");

	// Header class on scroll

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

	// Smooth scroll
	$("[data-scroll]").on('click', function (event) {
		event.preventDefault();
		let scrollEl = $(this).data('scroll')
		let scrollElPos = $(scrollEl).offset().top
		$("html, body").animate({
			scrollTop: scrollElPos - headerH
		}, 500)
	})



})

