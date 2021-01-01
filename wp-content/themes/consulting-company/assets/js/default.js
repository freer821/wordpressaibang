(function($) {
$.fn.menumaker = function(options) {  
 var consultingcompanymenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   consultingcompanymenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     consultingcompanymenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     consultingcompanymenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else consultingcompanymenu.addClass('dropdown');
   if (settings.sticky === true) consultingcompanymenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1024;
     if ($( window ).width() > mediasize) {
       consultingcompanymenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       consultingcompanymenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
jQuery(document).ready(function(){
  jQuery("#consultingcompanymenu").menumaker({
     format: "multitoggle"
  });
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        jQuery('.scroll_top').fadeIn(200);    // Fade in the arrow
    } else {
        jQuery('.scroll_top').fadeOut(200);   // Else fade out the arrow
    }
});
jQuery('.scroll_top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

  jQuery( 'p:empty' ).remove();
  jQuery(document).ready(function() {
    jQuery("#home-slider").owlCarousel({
      nav : true, // Show next and prev buttons
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
      ],
      slideSpeed : 300,
      paginationSpeed : 400,
      loop : true,
      items : 1,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      touchDrag: false,
      mouseDrag: false,
      dots : true
    });
  });    

});
})(jQuery);

