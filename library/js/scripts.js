/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
 */


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
 */
function updateViewportDimensions() {
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
    return { width: x, height: y };
}
// setting the viewport width
// var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
 */
var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
        if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *  // update the viewport, in case the window size has changed
 *  viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
 */

// if you're on an older browser I decided to remove the content. Sorry, this is a new thing I'm trying
function oldBrowser() {
    var html = jQuery("html");
    if (html.hasClass('lt-ie10') || html.hasClass('lt-ie9') || html.hasClass('lt-ie8') || html.hasClass('lt-ie7')) {
        jQuery('.container.notIE').remove();
    };
} // oldBrowsers

function makeHeightWindowHeight() {
    // set the viewport using the function above
    viewport = updateViewportDimensions();
    var viweportHeight = viewport.height,
        divToChangeHeight = jQuery('.header');

    // if on home page
    if (jQuery('body').hasClass('home page')) {
        // change the height of the DIV to match the browser height
        divToChangeHeight.css('height', viweportHeight);

        // calculate margins for logo to push items down.
        if (viewport.width >= 768) {
            var logoHeight = 248;
        } else {
            var logoHeight = 142
        };
        var marginToCalc = viweportHeight - logoHeight,
            marginTopBot = marginToCalc / 2
        downArrow = jQuery('#downArrow').outerHeight() + 50;

        jQuery('#logo').css({
            marginTop: marginTopBot,
            marginBottom: marginTopBot - downArrow
        })

    }

} // end function

function openCloseMenu() {
    var menu = jQuery('#menuToggle');

    menu.on('click', function() {
        if (viewport.width <= 768) {
            if (jQuery(this).parent().hasClass('openMenu')) {
                jQuery(this).parent().removeClass('openMenu');
            } else if (!jQuery(this).parent().hasClass('openMenu')) {
                jQuery(this).parent().addClass('openMenu');
            }
        }
    });
} // end function

function menuAndTopBanner() {
    jQuery(window).on('scroll', function() {

        var scrollPos = jQuery(document).scrollTop(),
            topImage = jQuery('#top-header').outerHeight();

        if (scrollPos >= topImage) {
            jQuery('#menuContainer').addClass('stickToTop');
        } else {
            jQuery('#menuContainer').removeClass('stickToTop');
        }

    });
} // end function

function changeTabs() {
    var tabs = jQuery('.tabs span'),
        backgroundColor = jQuery('.backgroundColor');

    tabs.on('click touchend', function(event) {
        event.preventDefault();

        tabs.children('a').removeClass('open');
        jQuery(this).children('a').addClass('open');

        // find the relative form to show and get the color
        var tabChild = jQuery(this).children('a').attr('rel'),
            colorToUse = jQuery(this).children('a').data('color');

        // hide the other form
        jQuery('article.entry-content').hide();

        // set the color of the background to match the form
        jQuery(backgroundColor).removeClass('grey green');
        jQuery(backgroundColor).addClass(colorToUse);

        // show the relative form
        jQuery('article.entry-content.' + tabChild).show();

    });
} // end function

function fadeInTagLineOnHomePage() {
    // if on home page
    if (jQuery('body').hasClass('home page')) {

        jQuery(window).on('scroll', function() {

            var scrollPos = jQuery(document).scrollTop(),
                topOfFeatureSection = jQuery('.entry-content.feature').offset().top - 200;

            if (scrollPos >= topOfFeatureSection) {
                jQuery('#pageCaptionAndImage').addClass('animateIn');
            }

        }); // on scroll
    } // if
} // end function


// for the non-home pages we use a little parallax effect with the wide screen images :)
function headerImageParallaxEffect() {

    if (!jQuery('body').hasClass('home page')) {

        // lets set the 2nd block to the right place
        function setBlockMarginTop() {

            // get the height of the top block & get the block that sits under it
            var largeImage = jQuery('.fixedImage img'),
                blockOne = jQuery('.entry-content.blockOne'),
                heightOfImage = '';

            function setMarginTop() {
                heightOfImage = largeImage.outerHeight();
                // set the block's position with the height from above margin/top position
                blockOne.css({
                    'marginTop': heightOfImage
                });
            }

            if (largeImage === null || largeImage === undefined) {
                setMarginTop();
            } else {
                setMarginTop();
            }
        } // setBlockMarginTop

        jQuery(window).on('load resize', function() {
            setBlockMarginTop();
        });

        // as user scrolls then the 2nd block's margin/top position is calculated
        // Create cross browser requestAnimationFrame method:
        window.requestAnimationFrame =
            window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function(f) {
                setTimeout(f, 1000 / 60)
            };

        function parallax() {
            var fixedImageWrapper = jQuery('section.fixedImage'),
                titleOfPage = jQuery('.fixedImage h1.h1'),
                scrolltop = window.pageYOffset // get number of pixels document has scrolled vertically 

            fixedImageWrapper.css({
                top: -scrolltop * .25 + 'px' // move headerImage at 20% of scroll rate
            });


            titleOfPage.css({
                '-webkit-transform': 'translateX(-50%) translateY(' + -(50 - (-scrolltop * 0.22)) + '%)',
                '-moz-transform': 'translateX(-50%) translateY(' + -(50 - (-scrolltop * 0.22)) + '%)',
                '-ms-transform': 'translateX(-50%) translateY(' + -(50 - (-scrolltop * 0.22)) + '%)',
                '-o-transform': 'translateX(-50%) translateY(' + -(50 - (-scrolltop * 0.22)) + '%)',
                transform: 'translateX(-50%) translateY(' + -(50 - (-scrolltop * 0.22)) + '%)'
            });

            // -webkit-transform = "translate(0px, -" + scrolltop + "px)";
            // -moz-transform    = "translate(0px, -" + scrolltop + "px)";
            // -ms-transform     = "translate(0px, -" + scrolltop + "px)";
            // -o-transform      = "translate(0px, -" + scrolltop + "px)";
            // transform"        = "translate(0px, -" + scrolltop + "px)";

        } // parallax

        window.addEventListener('scroll', function() { // on page scroll
            requestAnimationFrame(parallax) // call parallaxbubbles() on next available screen paint
        }, false)

    } // if 
} // end function

/* Put all your regular jQuery in here */
jQuery(document).ready(function($) {

    // make 1st page image the same height as browser windwow height
    makeHeightWindowHeight();

    // .header
    openCloseMenu();

    // stickyHeader
    menuAndTopBanner();

    // contact page tabs
    changeTabs();

    // FadeIn tagline on home page
    fadeInTagLineOnHomePage();

    // parallax effect for header images
    headerImageParallaxEffect();

    // remove content from old browsers to stop people being cheeky
    oldBrowser();

}); /* end of as page load scripts */

// When the window is resized, we perform this function
jQuery(window).resize(function() {
    // update the viewport, in case the window size has changed
    viewport = updateViewportDimensions();

    // if on home page then set the height of the top <div> to the window height
    makeHeightWindowHeight();

});
