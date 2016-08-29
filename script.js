// Wordpress uses the 'jQuery' object by default to call jQuery.
//  This wrapping, self-executing function allows us to use the
//  default $ for all of our jQuery calls.
(function ($) {
  $(document).ready(function(){
    // Changing the link of the logo to the UWO home page
    $(".eltdf-logo-wrapper a").attr("href", "http://uwosh.edu/");

    // Toggle for the UWO Top Navigation
    $(".big-menu").hover(function(){
      $(".dropdown-content").fadeToggle("medium");
    });
  });

  $( window ).load(function() {

  });
}(jQuery));
