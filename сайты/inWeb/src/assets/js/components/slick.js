let portfolio = $("#portfolio");

portfolio.slick({
	dots: true,
	speed: 800,
	slidesToShow: 2,
	slidesToScroll: 2,
	arrows: false,
})

$("#portfolio-arrow-prev").on('click', function (e) {
	e.preventDefault()
	portfolio.slick('slickPrev')
})

$("#portfolio-arrow-next").on('click', function (e) {
	e.preventDefault()
	portfolio.slick('slickNext')
})
