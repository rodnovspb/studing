const reviewsSlider = new Swiper('.menu__slider', {
	spaceBetween: 30,
	slidesPerView: 2,
	loop: true,
	autoplay: true,
	breakpoints: {
		1000: {
			slidesPerView: 3,
		},
	}
});