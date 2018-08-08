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
    $(".eltdf-form-holder .eltdf-column-left").prepend("<input type='hidden' name='cx' value='007334596040304417000:mkxz06xsklq' /><input type='hidden' name='ie' value='UTF-8' />");
    $(".eltdf-search-submit").attr("name", "sa");
    $(".eltdf-search-menu-holder").attr("action", "https://" + document.domain + "/search-results");
  });

  $( window ).load(function() {
    // Hotfix to modify to src file of the Engage header images
    // 15 in this case is the WordPress ID of the site in the multisite network
    $(".eltdf-transparent-logo, .eltdf-light-logo, .eltdf-dark-logo, .eltdf-normal-logo").attr("src","/wp-content/uploads/sites/15/UWO-Wordmark-Reverse.png");
    $(".eltdf-image-widget img").attr("src", "/wp-content/uploads/sites/15/ENGAGE_light.png");
    $(".eltdf-logo-wrapper a img").attr("src", "/wp-content/uploads/sites/15/UWO-Wordmark-Reverse.png")
  });
}(jQuery));
