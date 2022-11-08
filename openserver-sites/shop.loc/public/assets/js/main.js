$(function() {

	// CART

		function showCart(cart){
			$('#cart-modal .modal-cart-content').html(cart)
			let myModalEl = document.querySelector('#cart-modal')
			let modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
			modal.show()
		}

		$('.add-to-cart').on('click', function (e){
			e.preventDefault();
			let id = $(this).data('id')
			let qty = $('#input-quantity').val() ? $('#input-quantity').val() : 1;
			const $this = $(this);

			$.ajax({
				url: 'cart/add',
				type: 'get',
				data: {id: id, qty: qty},
				success: function (res){
					showCart(res)
				},
				error: function (){
					alert('error')
				}
			})
		})
	// CART

	$('.open-search').click(function(e) {
		e.preventDefault();
		$('#search').addClass('active');
	});
	$('.close-search').click(function() {
		$('#search').removeClass('active');
	});

	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('#top').fadeIn();
		} else {
			$('#top').fadeOut();
		}
	});

	$('#top').click(function() {
		$('body, html').animate({scrollTop:0}, 700);
	});

	$('.sidebar-toggler .btn').click(function() {
		$('.sidebar-toggle').slideToggle();
	});

	$('.thumbnails').magnificPopup({
		type:'image',
		delegate: 'a',
		gallery: {
			enabled: true
		},
		removalDelay: 500,
		callbacks: {
			beforeOpen: function() {
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		}
	});

	$('#languages button').on('click', function (){
		let lang_code = $(this).data('langcode')
		window.location = PATH + '/language/change?lang=' + lang_code;
	})

});