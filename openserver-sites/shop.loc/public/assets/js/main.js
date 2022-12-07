$(function() {

	// CART

		$('#input-sort').on('change', function (e){
			window.location = PATH + window.location.pathname + '?' + $(this).val()
		})

		function showCart(cart){
			$('#cart-modal .modal-cart-content').html(cart)
			let myModalEl = document.querySelector('#cart-modal')
			let modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
			modal.show()

			if($('.cart-qty').text()){
				$('.count-items').text($('.cart-qty').text());
			} else {
				$('.count-items').text('0');
			}
		}

		$('#cart-modal .modal-cart-content').on('click', '.del-item', function (e){
			e.preventDefault()
			const id = $(this).data('id')

			$.ajax({
				url: 'cart/delete',
				type: 'get',
				data: {id: id},
				success: function (res){
					const url = window.location.toString()
					if(url.indexOf('cart/view') !== -1){
						window.location = url
					} else {
						showCart(res)
					}
				},
				error: function (){
					alert('error')
				}
			})

		})

	$('#cart-modal .modal-cart-content').on('click', '#clear-cart', function (){

		$.ajax({
			url: 'cart/clear',
			type: 'get',
			success: function (res){
				showCart(res)
			},
			error: function (){
				alert('error')
			}
		})

	})

		$('#get-cart').on('click', function (e){
			e.preventDefault()

			$.ajax({
				url: 'cart/show',
				type: 'get',
				success: function (res){
					showCart(res)
				},
				error: function (){
					alert('error')
				}
			})

		})

		$('.add-to-cart').on('click', function (e){
			e.preventDefault();
			let id = $(this).data('id')
			let qty = $('#input-quantity').val() ? $('#input-quantity').val() : 1;
			const $this = $(this);
			$this.find('i').removeClass('fa-shopping-cart').addClass('fa-luggage-cart')

			$.ajax({
				url: 'cart/add',
				type: 'get',
				data: {id: id, qty: qty},
				success: function (res){
					showCart(res)
					$this.find()
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

	$('.product-card').on('click', '.add-to-wishlist', function (e){
		e.preventDefault()
		const id = $(this).data('id')
		const $this = $(this)
		$.ajax({
			url: 'wishlist/add',
			type: 'GET',
			data: {id: id},
			success: function (res){
				res = JSON.parse(res);
				Swal.fire(
						res.text,
						'',
						res.result
				)
				if(res.result === 'success'){
					$this.removeClass('add-to-wishlist').addClass('delete-from-wishlist')
					$this.find('i').removeClass('far fa-heart').addClass('fas fa-hand-holding-heart')
				}
			},
			error: function (){
				alert('error')
			}
		})
	})

	$('.product-card').on('click', '.delete-from-wishlist', function (e){
		e.preventDefault()
		const id = $(this).data('id')
		const $this = $(this)
		$.ajax({
			url: 'wishlist/delete',
			type: 'GET',
			data: {id: id},
			success: function (res){
				const url = window.location.toString()
				if(url.indexOf('wishlist') !== -1){
					window.location = url
				} else {
					res = JSON.parse(res)
					Swal.fire(
							res.text,
							'',
							res.result
					)
					if(res.result == 'success'){
						$this.removeClass('delete-from-wishlist').addClass('add-to-wishlist')
						$this.find('i').removeClass('fas fa-hand-holding-heart').addClass('far fa-heart')
					}
				}
			},
			error: function (){
				alert('error')
			}
		})
	})

});




















