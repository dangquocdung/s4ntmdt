	// Wishlist Button
	//------------------------------------------------------------------------------
	$('.btn-wishlist').on('click', function() {
		var iteration = $(this).data('iteration') || 1,
				toastOptions = {
					title: 'Product',
					animateInside: false,
					position: 'topRight',
					progressBar: false,
					timeout: 3200,
					transitionIn: 'fadeInLeft',
					transitionOut: 'fadeOut',
					transitionInMobile: 'fadeIn',
					transitionOutMobile: 'fadeOut'
				};

		switch ( iteration) {
			case 1:
				$(this).addClass('active');
				toastOptions.class = 'iziToast-info';
				toastOptions.message = 'added to your wishlist!';
				toastOptions.icon = 'icon-info';
				break;
			
			case 2:
				$(this).removeClass('active');
				toastOptions.class = 'iziToast-danger';
				toastOptions.message = 'removed from your wishlist!';
				toastOptions.icon = 'icon-slash';
				break;
		}

		iziToast.show(toastOptions);

		iteration++;
		if (iteration > 2) iteration = 1;
		$(this).data('iteration', iteration);
	});

	// Compare Button
	//------------------------------------------------------------------------------
	$('.btn-compare').on('click', function() {
		var iteration = $(this).data('iteration') || 1,
				toastOptions = {
					title: 'Product',
					animateInside: false,
					position: 'topRight',
					progressBar: false,
					timeout: 3200,
					transitionIn: 'fadeInLeft',
					transitionOut: 'fadeOut',
					transitionInMobile: 'fadeIn',
					transitionOutMobile: 'fadeOut'
				};

		switch ( iteration) {
			case 1:
				$(this).addClass('active');
				toastOptions.class = 'iziToast-info';
				toastOptions.message = 'added to comparison table!';
				toastOptions.icon = 'icon-info';
				break;
			
			case 2:
				$(this).removeClass('active');
				toastOptions.class = 'iziToast-danger';
				toastOptions.message = 'removed from comparison table!';
				toastOptions.icon = 'icon-slash';
				break;
		}

		iziToast.show(toastOptions);

		iteration++;
		if (iteration > 2) iteration = 1;
		$(this).data('iteration', iteration);
	});