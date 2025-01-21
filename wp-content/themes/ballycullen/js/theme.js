
// Custom JQuery Functions
(function ($) {
    $(document).ready(function(){


        //var viewportHeight = $('.hero').outerHeight();
       // $('.hero').css({ height: viewportHeight });
       // $('.hero').css({ height: window.innerHeight });


        // Toggle Class to open off-canvas menu
        $(function () {
            'use strict'
            $('[data-toggle="offcanvas"]').on('click', function () {
                $('.offcanvas-collapse').toggleClass('open');
            })
        })
  
        // Off Canvas Button
        $(function () {
            $('.navbar-toggler').on('click', function () {
                $(this).closest('.navbar-toggler').toggleClass('active');
                $('#site-header').toggleClass('offcanvas-active');
            })
        })

        // Footer Button
        $(function () {
            $('.footer-toggler').on('click', function () {
                $(this).closest('.footer-toggler').toggleClass('active');
            })
        })

        // Direction Toggle Button (Contact Page)
        $(function () {
            $('.bcc-location-directions-item-header .btn').on('click', function () {
                $(this).closest('.bcc-location-directions-item-header .btn').toggleClass('active');
            })
        })


        // LINKS

        // select all links with hashes
        $('a[href*="#"]')

        // remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('[data-toggle="tab"]')
        .not('[data-toggle="modal"]')
        .not('.carousel-control-next')
        .not('.carousel-control-prev')
        .click(function(event) {
        // on-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // does a scroll target exist?
            if (target.length) {
            // only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 123
            }, 1000, function() {});
            }
        }
        });


        //// NAVBAR
		var $navbar = $(".navbar");
        // hide .navbar first
       // $($navbar).hide();
        var navheight = $($navbar).height();
    
        // fade in .navbar
        $(function () {
            $(window).scroll(function () {
    
                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 450) {
                    $($navbar).show().addClass('fadeIn'); // show
                    $('body').css('position', 'relative'); // relative body to fix IE scroll jank
                    if ($(window).width() < 992) { // lg breakpoint
                      $($navbar).show().addClass('fadeIn').css('height','auto');
                    }
                    else {
                      $($navbar).addClass('fadeIn').css('height',navheight);
                    }
                } else {
                    $($navbar).removeClass('fadeIn'); // hide
                    $('body').css('position', 'static'); // static body to fix IE scroll jank
                }
            });
        });


        //Donate - Floating Button
        // Fade in after scroll down


        var $donateBtn = $("#donateBtn");

        // hide button
        $($donateBtn).hide();
     
        // fadeIn Button
        $(function () {
            $(window).scroll(function () {
    
                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 450) {
                   
                    $($donateBtn).show().addClass('fadeIn'); // show
                   
                    if ($(window).width() < 992) { // lg breakpoint
                      $($donateBtn).show().addClass('fadeIn');
                    }
                    else {
                      $($donateBtn).show().addClass('fadeIn');
                    }
                } else {
                    $($donateBtn).removeClass('fadeIn').hide(); // hide
                   
                }
            });
        });
        



	});
}(jQuery));
