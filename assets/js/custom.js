/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$('#site-navigation ul li').click(function(){
		var $this = $(this);
		var splits = this.id.split(";");
		if(splits.length !==2) return;
		var $menu = $('#menu-'+splits[1]);
		if($menu.length === 0) return;
		$('#site-navigation ul li').each(function(){
			if(!$this.is($(this))){
				$(this).removeClass('toggled');
			}
		})
		$('#masthead .hover-menu').each(function(){
			if("menu-"+splits[1] !== this.id){
				$(this).removeClass('toggled');
			}
		});
		if($this.hasClass("toggled")){
			$this.removeClass("toggled");
		} else {
			$this.addClass("toggled");
		}
		if($menu.hasClass("toggled")){
			$menu.removeClass("toggled");
		} else {
			$menu.addClass("toggled");
		}
	});

});// END #####################################    END