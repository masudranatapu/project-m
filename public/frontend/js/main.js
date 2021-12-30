(function($) {
    "use strict";
    
    /*---
       stickey menu
    ---*/
    // $(window).on('scroll',function() {    
    //        var scroll = $(window).scrollTop();
    //        if (scroll < 100) {
    //         $(".sticky-header").removeClass("sticky");
    //        }else{
    //         $(".sticky-header").addClass("sticky");
    //        }
    // });
    
    
    /*--------------------------
     ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    

        $(".search_bar a.open-close").click(function(){
          $(".search_bar #mobile-search").toggleClass("form");
          return false;
        });




    /*-----
    jQuery MeanMenu
    ------------------------------ */
    $('.mobile-menu nav').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu",
        onePage: true,
    });
    
    /* slider activation */
    $('.slider_area').owlCarousel({
        animateOut: 'fadeOut',
        autoplay: true,
		    loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 1,
        dots:true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });
    
    /* slider activation */
    $('.category-carousel').owlCarousel({
        animateOut: 'fadeOut',
        autoplay: true,
        loop: true,
        nav: true,
        autoplay: true,
        margin: 15,
        autoplayTimeout: 3000,
        responsive:{
                0:{
                items:2,
            },
            360:{
                items:3,
            },
            576:{
                items:4,
            },
            992:{
                items:5,
            },
            1200:{
                items:8,
            },
          
        },
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });
    

      /* categorie banner activation */
    $('.new-arrival-carousel').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 4,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
    		responsive:{
      				0:{
      			items:2,
      		},
                481:{
            items:3,
          },
                576:{
    				items:4,
    			},
                768:{
    				items:4,
    			},
                1200:{
    				items:6,
    			},
    		  
            }
        });



      /* categorie banner activation */
    $('.best-selling-carousel').owlCarousel({
        autoplay: true,
    loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 6000,
        items: 4,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
        responsive:{
              0:{
            items:2,
          },
                481:{
            items:3,
          },
                576:{
            items:4,
          },
                768:{
            items:4,
          },
                1200:{
            items:6,
          },
          
            }
        });


    

    /*wow activation*/
    new WOW().init();
    
      /*------addClass/removeClass -------*/
    $(".currency > a,.language > a,.top_links > a").on("click", function() {
        $(this).removeAttr('href');
        $(this).toggleClass('open').next('.dropdown_currency,.dropdown_language,.dropdown_links').toggleClass('open');
        $(this).parents().siblings().find('.dropdown_currency,.dropdown_language,.dropdown_links').removeClass('open');
    });

    $('body').on('click', function (e) {
        var target = e.target;
        if (!$(target).is('.currency > a,.language > a,.top_links > a') ) {
            $('.dropdown_currency,.dropdown_language,.dropdown_links').removeClass('open');
        }
    });
    
    /*mini cart slideToggle*/
    
    $(".cart_link > a").on("click", function() {
        $('.mini_cart').slideToggle('medium');
    }); 
    
    /*categories slideToggle*/
    $(".categories_title").on("click", function() {
        $(this).toggleClass('active');
        $('.categories_menu_inner').slideToggle('medium');
    }); 
    
     
    /*------addClass/removeClass categories-------*/
   $(".categories_menu_inner > ul > li > a, #cat_toggle.has-sub > a").on("click", function() {
        $(this).removeAttr('href');
        $(this).toggleClass('open').next('.submenu').toggleClass('open');
        $(this).parents().siblings().find('.submenu').removeClass('open');
    });
    /*------addClass/removeClass categories-------*/
   $(".categories_menu_inner > ul > li > ul.submenu > li > a").on("click", function() {
        $(this).removeAttr('href');
        $(this).toggleClass('open').next('.submenu').toggleClass('open');
        $(this).parents().siblings().find('.submenu').removeClass('open');
    });

    $('body').on('click', function (e) {
        var target = e.target;
        if (!$(target).is('.categories_menu_inner > ul > li > a') ) {
            $('.categories_mega_menu').removeClass('open');
        }
    });
    

    /*niceSelect*/
     $('select').niceSelect();
    

    $(".header_account_list > a.reg-toggle").on("click", function() {
            $("ul.reg-log").toggleClass("visible");
            return false;
    });
 
    $(window).on('scroll',function() {    
           var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $(".header_middel").removeClass("sticky");
           }else{
            $(".header_middel").addClass("sticky");
           }
    });


})(jQuery);