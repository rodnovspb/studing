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

	// Navigation toggle on mobile

	let navToggle = $('#navToggle')
	let nav = $('#nav')
	navToggle.on('click', function (event) {
		event.preventDefault();
		nav.toggleClass('show')
		$(this).toggleClass('active')
		$('body').toggleClass('show-nav')
	})

	$(window).on('resize', function () {
		navToggle.removeClass('active')
		nav.removeClass('show')
		$('body').removeClass('show-nav')
	})


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

		navToggle.removeClass('active')
		nav.removeClass('show')
		$('body').removeClass('show-nav')

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

		// Slick slider
	// https://kenwheeler.github.io/slick/====================================

		// IntroSlider

		let introSlider = $("#introSlider");

		introSlider.slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			// fade: true,
			autoplay: true,
			autoplaySpeed: 4000,
		})

		$("#introSliderPrev").on('click', function () {
			introSlider.slick('slickPrev')
		})

		$("#introSliderNext").on('click', function () {
			introSlider.slick('slickNext')
		})

		// ReviewsSlider

		let reviewsSlider = $("#reviewsSlider");

		reviewsSlider.slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			speed: 500,
			arrows: false,
		})

	// Aos.js   https://github.com/michalsnik/aos


	AOS.init({
		// Global settings:
		disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
		startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
		initClassName: 'aos-init', // class applied after initialization
		animatedClassName: 'aos-animate', // class applied on animation
		useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
		disableMutationObserver: false, // disables automatic mutations' detections (advanced)
		debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
		throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


		// Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
		offset: 80, // offset (in px) from the original trigger point
		delay: 0, // values from 0 to 3000, with step 50ms
		duration: 700, // values from 0 to 3000, with step 50ms
		easing: 'ease', // default easing for AOS animations
		once: false, // whether animation should happen only once - while scrolling down
		mirror: false, // whether elements should animate out while scrolling past them
		anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

	});




})

