const slider = new Swiper('.slider-container', {
	spaceBetween: 20,
	mousewheel: true, // прокрутка колесиком
	grabCursor: true, // курсор рукой (не работает)
	slidesPerView: 1, // кол-во слайдов по умолчанию (если не отрабатывают брейкпойнты)
	speed: 500, // скорость сдвига. Если 0, то моментальная смена
	autoplay: { // автозапуск
		delay: 1000 // время между сдвигами
	},
	loop: true, // повторять слайды
	navigation: {
		nextEl: '.button-next',
		prevEl: '.button-prev',
	},
	// effect: 'fade', // способ смены, их много, это 1 слайд заменяется превращается в другой
	// focusableElements: 'input', // если слайд такого вида в фокусе (нажат), то слайдер останавливается
	// initialSlide: 5, // с какого слайда начинать
	breakpoints: {
		992: {
			slidesPerView: 3, // кол-во слайдов
			spaceBetween: 30, // расстояние между слайдами
			slidesPerGroup: 3, // по сколько сдвигать
		},
		660: {
			slidesPerView: 2,
			spaceBetween: 20
		},
	}
});


// slider.slideNext() - доп. функция смены смены слайдов



