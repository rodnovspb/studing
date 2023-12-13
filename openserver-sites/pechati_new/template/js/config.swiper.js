const templatesSlider = new Swiper('.slider-container-template', {
    mousewheel: false, // прокрутка колесиком
    speed: 0, // скорость сдвига. Если 0, то моментальная смена
    autoplay: false,
    loop: false, // повторять слайды
    navigation: {
        nextEl: '.button-next-template',
        prevEl: '.button-prev-template',
    },
    freeMode: true,
    shortSwipes: false,
    focusableElements: 'input',
    // effect: 'fade', // способ смены, их много, это 1 слайд заменяется превращается в другой
    // focusableElements: 'input', // если слайд такого вида в фокусе (нажат), то слайдер останавливается
    breakpoints: {
        270: {
            slidesPerView: 2, // кол-во слайдов
            slidesPerGroup: 2, // по сколько сдвигать
        },
        479.98: {
            slidesPerView: 3, // кол-во слайдов
            slidesPerGroup: 3, // по сколько сдвигать
        },
        575.98: {
            slidesPerView: 3, // кол-во слайдов
            slidesPerGroup: 3, // по сколько сдвигать
        },
        767.98: {
            slidesPerView: 4, // кол-во слайдов
            slidesPerGroup: 4, // по сколько сдвигать
        },
        991.98: { // когда window >=660
            slidesPerView: 5, // кол-во слайдов
            slidesPerGroup: 5, // по сколько сдвигать
        },
        1199.98: { // когда window >=992
            slidesPerView: 6, // кол-во слайдов
            slidesPerGroup: 6, // по сколько сдвигать
        },
    }
});

const casesSlider = new Swiper('.slider-container-case', {
    mousewheel: false, // прокрутка колесиком
    speed: 0, // скорость сдвига. Если 0, то моментальная смена
    autoplay: false,
    loop: false, // повторять слайды
    navigation: {
        nextEl: '.button-next-case',
        prevEl: '.button-prev-case',
    },
    freeMode: true,
    shortSwipes: false,
    focusableElements: 'input',
    // effect: 'fade', // способ смены, их много, это 1 слайд заменяется превращается в другой
    // focusableElements: 'input', // если слайд такого вида в фокусе (нажат), то слайдер останавливается
    breakpoints: {
        270: {
            slidesPerView: 2, // кол-во слайдов
            slidesPerGroup: 2, // по сколько сдвигать
        },
        479.98: {
            slidesPerView: 3, // кол-во слайдов
            slidesPerGroup: 3, // по сколько сдвигать
        },
        575.98: {
            slidesPerView: 4, // кол-во слайдов
            slidesPerGroup: 4, // по сколько сдвигать
        },
        767.98: {
            slidesPerView: 5, // кол-во слайдов
            slidesPerGroup: 5, // по сколько сдвигать
        },
        991.98: { // когда window >=660
            slidesPerView: 5, // кол-во слайдов
            slidesPerGroup: 5, // по сколько сдвигать
        },
        1199.98: { // когда window >=992
            slidesPerView: 6, // кол-во слайдов
            slidesPerGroup: 6, // по сколько сдвигать
        },
    }
});


const productsSlider = new Swiper('.slider-container-product', {
    mousewheel: true, // прокрутка колесиком
    speed: 0, // скорость сдвига или превращения через effect fade. Если 0, то моментальная смена
    autoplay: {
        delay: 8000,
    },
    loop: false, // повторять слайды
    spaceBetween: 10,
    navigation: {
        nextEl: '.button-next-case',
        prevEl: '.button-prev-case',
    },
    freeMode: true,
    shortSwipes: false,
    focusableElements: 'input', // работает только на двигающемся слайдере, на speed=0 через js остановить
    // effect: 'fade', // способ смены, их много, это 1 слайд заменяется превращается в другой
    // focusableElements: 'input', // если слайд такого вида в фокусе (нажат), то слайдер останавливается
    breakpoints: {
        270: {
            slidesPerView: 2, // кол-во слайдов
            slidesPerGroup: 2, // по сколько сдвигать

        },
        479.98: {
            slidesPerView: 3, // кол-во слайдов
            slidesPerGroup: 3, // по сколько сдвигать

        },
        575.98: {
            slidesPerView: 4, // кол-во слайдов
            slidesPerGroup: 4, // по сколько сдвигать
        },
        767.98: {
            slidesPerView: 5, // кол-во слайдов
            slidesPerGroup: 5, // по сколько сдвигать
        },
        991.98: { // когда window >=660
            slidesPerView: 5, // кол-во слайдов
            slidesPerGroup: 5, // по сколько сдвигать
        },
        1199.98: { // когда window >=992
            slidesPerView: 7, // кол-во слайдов
            slidesPerGroup: 7, // по сколько сдвигать
        },
    }
});


// slider.slideNext() - доп. функция смены слайдов



