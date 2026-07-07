jQuery(document).ready(function($) {
    /*slider*/
    var slides = JSON.parse( click_ajax.slides ),
        image_path = click_ajax.image_path;

    jQuery(function($){
        $.supersized({
            // Functionality
            slideshow               :   1,			// Slideshow on/off
            autoplay				:	1,			// Slideshow starts playing automatically
            start_slide             :   1,			// Start slide (0 is random)
            stop_loop				:	0,			// Pauses slideshow on last slide
            random					: 	0,			// Randomize slide order (Ignores start slide)
            slide_interval          :   3000,		// Length between transitions
            transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
            transition_speed		:	1000,		// Speed of transition
            new_window				:	1,			// Image links open in new window/tab
            pause_hover             :   0,			// Pause slideshow on hover
            keyboard_nav            :   1,			// Keyboard navigation on/off
            performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
            image_protect			:	1,			// Disables image dragging and right click with Javascript

            /*// Size & Position						   */
            min_width		        :   0,			// Min width allowed (in pixels)
            min_height		        :   0,			// Min height allowed (in pixels)
            vertical_center         :   1,			// Vertically center background
            horizontal_center       :   1,			// Horizontally center background
            fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
            fit_portrait         	:   1,			// Portrait images will not exceed browser height
            fit_landscape			:   0,			// Landscape images will not exceed browser width

            // Components
            slide_links				:	false,	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
            thumb_links				:	1,			// Individual thumb links for each slide
            thumbnail_navigation    :   0,			// Thumbnail navigation
            image_path              :   image_path,			// Thumbnail navigation
            slides 					:  	slides,
            // Theme Options
            progress_bar			:	1,			// Timer for each slide
            mouse_scrub				:	0
        });
    });
    /*slider end*/

    /*centering logo*/
    var site_logo = $( ".site-logo" );
    function centerLogo() {
        var countMenuParents = $(".header-main-menu ul#at-center > li").length;
        if ( countMenuParents !== 0) {
            if ( countMenuParents > 1) {
                var centerChild = Math.floor(countMenuParents / 2);
            } else {
                centerChild = 1;
            }
            var center_logo = $('.site-branding > .wrapper');
            if ( center_logo.length ) {
                site_logo.detach().insertAfter('.header-main-menu ul#at-center > li:nth-child('+centerChild+')');
                site_logo.wrap( '<li id="header-logo"></li>' );
            }
           $('.site-branding').remove();
        }

        if( $('body').hasClass('not-front-page') ){
            var header_height = $('.site-header').height();
            $('.site-content').css('margin-top',header_height);
        }
    }
    centerLogo();

    /*toggle header*/
    $(document).on( 'click', '.at-close-menu', function( event ) {
        event.preventDefault();
        $('.site-header').fadeOut('slower');
        $('.at-menu-toggle').removeClass('at-close-menu fa-times').addClass('at-open-menu fa-align-justify');
    });
    $(document).on( 'click', '.at-open-menu', function( event ) {
        event.preventDefault();
        $('.site-header').fadeIn('slower');
        $('.at-menu-toggle').removeClass('at-open-menu fa-align-justify').addClass('at-close-menu fa-times');
    });
    var at_open_menu = $('.at-front-page .at-menu-toggle.at-open-menu').length;
    if (  at_open_menu > 0){
        $('.site-header').hide();
    }

    /*slick menu*/
    $('.header-wrapper .menu').slicknav({
        allowParentLinks :true,
        duration: 1000,
        prependTo: '.header-wrapper .responsive-slick-menu',
        'closedSymbol': '<i class="fa fa-angle-down"></i>',
        'openedSymbol': '<i class="fa fa-angle-up"></i>'
    });

    /*logo push on slick menu*/
    function push_logo() {
        var countMenuParents = $(".site-header.at-center").length;
        if ( countMenuParents !== 0){
            var header_logo = $( "#header-logo" ).html();
            $('.slicknav_btn').after( '<span id="header-logo clearfix">'+ header_logo +'</span>' );
        }

    }
    push_logo();

    /*tooltip*/
    var window_width = $(window).width();
    var tooltip_width = 500;
    if( window_width < 767 ) {
        tooltip_width = window_width * 0.6;
    }
    $('.tooltip').tooltipster({
        animation: 'fade',
        distance: 0,
        arrow: false,
        contentAsHTML: true,
        delay: 200,
        theme: 'tooltipster-light',
        minWidth: tooltip_width,
        side: 'left',
        trigger: 'hover',
        viewportAware: true
    });

    /*click fixed*/
    jQuery('.menu-item-has-children > a').click(function(){
        var at_this = jQuery(this);
        if( at_this.hasClass('at-clicked')){
            return true;
        }
        var at_width = jQuery(window).width();
        if( at_width > 992 && at_width <= 1230 ){
            at_this.addClass('at-clicked');
            return false;
        }
    });

    //for menu
     $('.header-wrapper #site-navigation .menu-main-menu-container').addClass('clearfix');

    // MASSONRY Without jquery
    var $masonry_boxes = $( '.masonry-start' );
    $masonry_boxes.hide();

    var $container = $( '#masonry-loop' );
    $container.imagesLoaded( function(){
        $masonry_boxes.fadeIn( 'slow' );
        $container.masonry({
            itemSelector : '.masonry-post'
        });
    });
    $(window).resize(function () {
        $container.masonry('bindResize')
    });
    /*scroll function*/
    at_window = $(window);
    at_window.scroll(function () {


        var scrollTop = at_window.scrollTop();
        var offset = 100;

        if ( scrollTop > offset ) {
            $("body.home.at-enable-feature").addClass('front-page').removeClass('front-page');
            $("body.home.at-enable-feature .site-logo img").attr('src',click_ajax.black_logo);
        }
        else {
            $("body.home.at-enable-feature").addClass('front-page').removeClass('not-front-page');
            $("body.home.at-enable-feature .site-logo img").attr('src',click_ajax.white_logo);
        }
    })


    /*new pagination style*/
    var paged = parseInt(click_ajax.paged) + 1;
    var max_num_pages = parseInt(click_ajax.max_num_pages);
    var next_posts = click_ajax.next_posts;

    /*ajax loading*/
    $(document).on( 'click', '.show-more', function( event ) {
        event.preventDefault();
        var show_more = $(this);
        var click = show_more.attr('data-click');

        if( ( paged-1 ) >= max_num_pages){
            show_more.html(click_ajax.no_more_posts)
        }

        if( click === 0 || ( paged - 1) >= max_num_pages){
            return false;
        }
        show_more.html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
        show_more.attr("data-click", 0);
        var page = parseInt( show_more.attr('data-number') );
        var click_temp_post = $('#click-temp-post');


        click_temp_post.load(next_posts + ' article.post', function() {
            /*http://stackoverflow.com/questions/17780515/append-ajax-items-to-masonry-with-infinite-scroll*/
            paged++;/*next page number*/
            next_posts = next_posts.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ paged);

            var html = click_temp_post.html();
            click_temp_post.html('');

            // Make jQuery object from HTML string
            var $moreBlocks = $( html ).filter('article.masonry-post');

            // Append new blocks to container
            $('#masonry-loop').append( $moreBlocks ).imagesLoaded(function(){
                // Have Masonry position new blocks
                $('#masonry-loop').masonry( 'appended', $moreBlocks );
                /*tooltip*/
                $('.tooltip').tooltipster({
                    animation: 'fade',
                    distance: 0,
                    arrow: false,
                    contentAsHTML: true,
                    delay: 200,
                    theme: 'tooltipster-light',
                    minWidth: 500,
                    side: 'left',
                    trigger: 'hover',
                    viewportAware: true
                });
                show_more.html(click_ajax.show_more)
            });

            show_more.attr("data-number", page+1);
            show_more.attr("data-click", 1);
        });
        return false;
    });
});