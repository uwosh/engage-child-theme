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

    // Google Custom Search Customizing
    $(".eltdf-search-field").attr("name", "q");
    $(".eltdf-form-holder .eltdf-column-left").prepend("<input type='hidden' name='cx' value='007334596040304417000:r-k6f0v_yw8' /><input type='hidden' name='ie' value='UTF-8' />");
    $(".eltdf-search-submit").attr("name", "sa");
    $(".eltdf-search-menu-holder").attr("action", "http://" + document.domain + "/search-results");
  });

  $( window ).load(function() {

  });
}(jQuery));
