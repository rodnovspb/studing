const reviewsSlider = new Swiper('.menu__slider', {
	spaceBetween: 30,
	slidesPerView: 3,
	loop: true,
	autoplay: false,
	breakpoints: {
		660: {
			// slidesPerView: 1,
		},
	}
});