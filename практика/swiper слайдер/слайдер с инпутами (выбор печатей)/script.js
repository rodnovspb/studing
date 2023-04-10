const slider = new Swiper('.slider-container', {
	spaceBetween: 20,
	mousewheel: true,
	grabCursor: true,
	slidesPerView: 3, // кол-во слайдов по умолчанию (если не отрабатывают брейкпойнты)
	slidesPerGroup: 3,
	speed: 1000, // скорость сдвига
	loop: true, // повторять слайды
	navigation: {
		nextEl: '.button-next',
		prevEl: '.button-prev',
	},
	// effect: 'fade', // способ смены, их много, это через исчезновение и замену без сдвига
	focusableElements: 'input', // если слайд такого вида в фокусе (нажат), то слайдер останавливается
	// initialSlide: 5, // с какого слайда начинать
	breakpoints: {
		992: {
			slidesPerView: 6, // кол-во слайдов
			spaceBetween: 30,// расстояние между слайдами
			slidesPerGroup: 3,
		},
		660: {
			slidesPerView: 2,
			spaceBetween: 20
		},
	}
});


// slider.slideNext() - доп. функция смены смены слайдов



