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
	let scrollTop = $(window).scrollTop()

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

	// Scrollspy
	let windowH = $(window).height()
	scrollSpy(scrollTop)
	$(window).on('scroll', function () {
		scrollTop = $(this).scrollTop()
		scrollSpy(scrollTop)
	})

	function scrollSpy(scrollTop) {
		$("[data-scrollspy]").each(function () {
			let $this = $(this)
			let sectionId = $this.data('scrollspy')
			let sectionOffset = $this.offset().top
			sectionOffset = sectionOffset - windowH/3
			if(scrollTop >= sectionOffset){
				$('[data-scroll]').removeClass('active')
				$('#nav [data-scroll="' + sectionId + '"]').addClass('active')
			}
			if(scrollTop==0){
				$('[data-scroll]').removeClass('active')
			}
		})
	}

	// Modal
		$("[data-modal]").on('click', function (event) {
			event.preventDefault();
			let modal = $(this).data('modal');
			$('body').addClass('no-scroll')
			$(modal).addClass('show')

			setTimeout(function () {
				$(modal).find('.modal__inner').css({
					transform: 'scale(1)',
					opacity: '1'
				})
			}, 200)

		})

		$('[data-modal-close]').on('click', function (event) {
			event.preventDefault();
			let modal = $(this).parents('.modal')

			modalClose(modal)

			modal.removeClass('show')
			$('body').removeClass('no-scroll')
		})

		$('.modal').on('click', function () {
				$(this).find('.modal__inner').css({
					transform: 'scale(0.5)',
					opacity: '0 '
				})
			$(this).removeClass('show')
			$('body').removeClass('no-scroll')
		})

		$('.modal__inner').on('click', function (e) {
			e.stopPropagation()
		})

		function modalClose(modal) {
			setTimeout(function () {
				modal.find('.modal__inner').css({
					transform: 'scale(0.5)',
					opacity: '0 '
				})
			}, 200)
		}

})

