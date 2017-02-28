require.config({
	//baseUrl: "content/themes/valentin_elizalde",
	paths: {
		jquery: "bower_components/jquery/jquery",
		slider: "bower_components/ResponsiveSlides.js/responsiveslides"
	},
	shim: {
	    slider: {
	        deps: [ 'jquery' ],
	        exports: 'responsiveSlides'
	    }
	}
});

requirejs(['jquery', 'slider'], function($) {
	var isMenuOpen = false;

	$(window).on('resize', onResize);

	$('header .menu_icon').click(function(){
		toggleMenu(!isMenuOpen);
	});



	function toggleMenu(_flag){
		if(_flag){
			$('header #menu_mobile').addClass('open');
		} else {
			$('header #menu_mobile').removeClass('open');
		}

		isMenuOpen = _flag;
	}

	// WINDOW RESIZE HANDLER
	function onResize(){
		// Close Mobile Menu
		toggleMenu(false);

		// Update Image Ratios
		$('.full_media img').each(function() {
			updateImagesRatios($(this));
		});
	}


	// UPDATE IMAGE ASPECT RATIOS
	function updateImagesRatios(_target){
		// Get ratios of container and image iself
		var holder_ratio = _target.parent().height() / _target.parent().width();
		var image_ratio = _target.height() / _target.width();

		console.log(holder_ratio+"  "+image_ratio);
	    // Compare ratios and fix image layout
	    if(holder_ratio > image_ratio) {
			_target.toggleClass('vertical', true);
	    } else {
			_target.toggleClass('vertical', false);
	    }
	}



	/*----------------------------------------------------
	//	RESPONSIVE / PROPORTIONAL IMAGES
	----------------------------------------------------*/
	// Hide images and add event listener
	$('.full_media img').on('load', function() {
		// Update image aspect after load
		updateImagesRatios($(this));
	});




	/*----------------------------------------------------
	//	SPONSORS SLIDER
	----------------------------------------------------*/
	$("#sponsors ul").responsiveSlides({
        pager: false,
        nav: true,
        speed: 320,
        pause: false,
        pauseControls: false,
        namespace: "large-btns"
    });




    //
    onResize();
});
