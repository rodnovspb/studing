const burger = document.querySelector('.menu-icon')
const menu = document.querySelector('.menu')
const body = document.body

if(burger && menu){
	burger.addEventListener('click', function (e) {
	      burger.classList.toggle('_active')
		  menu.classList.toggle('_active')
		  body.classList.toggle('_lock')
	  })
}

let filter = document.querySelector('.filter')

if(filter){
	let items = filter.querySelectorAll('.block-filter')
	items.forEach(item=>{
		item.addEventListener('click', function (e) {
			item.querySelector('.block-filter__dropdown').classList.toggle('_active')
			item.querySelector('.block-filter__icon').classList.toggle('_active')

			if(e.target.classList.contains('block-filter__item')){
				item.querySelector('.block-filter__value').textContent = e.target.textContent
			}
		  })
	})
}

// ---------Swiper-----------------------------//
const popularSlider = new Swiper('.popular-slider', {
	spaceBetween: 20,
	slidesPerView: 1,
	loop: true,
	navigation: {
		nextEl: '.popular-slider-next',
		prevEl: '.popular-slider-prev',
	},
	breakpoints: {
		992: {
			slidesPerView: 3,
		},
		660: {
			slidesPerView: 2,
		},
	}
});

const reviewsSlider = new Swiper('.slider-reviews', {
	spaceBetween: 20,
	slidesPerView: 1,
	loop: true,
	navigation: {
		nextEl: '.slider-reviews-next',
		prevEl: '.slider-reviews-prev',
	},
	breakpoints: {
		992: {
			slidesPerView: 3,
		},
		660: {
			slidesPerView: 2,
		},
	}
});
