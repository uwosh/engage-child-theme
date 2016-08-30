<?php
/*
Plugin Name: Engage Custom Search
Plugin URI: http://uwosh.edu
Description: Provides the Google Custom Search for the Engage site.
Author: Joseph Kerkhof
Version: 1.0
Author URI: https://twitter.com/musicaljoeker
*/
// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');


add_action( 'widgets_init', function(){
     register_widget( 'Engage_Custom_Search' );
});
/**
 * Adds My_Widget widget.
 */
class Engage_Custom_Search extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Engage_Custom_Search', // Base ID
			__('Engage Custom Search', 'text_domain'), // Name
			array( 'description' => __( 'Provides the Google Custom Search for the Engage site.', 'text_domain' ), ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args ) {
    $gcs = "<script>
  (function() {
    var cx = '007334596040304417000:r-k6f0v_yw8';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox-only resultsUrl='http://26f.e7e.mwp.accessdomain.com/search-results/'></gcse:searchbox-only>";

    $customCSS = "<style>
/* Editing the Google Custom Search widget to match the theme template */
#___gcse_0{
    position: relative;
    display: table;
    vertical-align: middle;
    overflow: hidden;
    clear: both;
    margin: 0 7px;
}
#gs_id50{
  margin: 0;
}
.gsc-input-box{
  height: auto !important;
  background: none !important;
  box-shadow: none !important;
  border-top: 1px solid rgb(255, 255, 255) !important;
  border-left: 1px solid rgb(255, 255, 255) !important;
  border-bottom: 1px solid rgb(255, 255, 255) !important;
  border-top: 1px solid rgba(255, 255, 255, .3) !important;
  border-left: 1px solid rgba(255, 255, 255, .3) !important;
  border-bottom: 1px solid rgba(255, 255, 255, .3) !important;
  border-right: 0 !important;
}
table td{
  padding: 0;
}
#gs_tti50{
  padding: 0 !important;
}
::-webkit-input-placeholder {
   color: white;
}
:-moz-placeholder { /* Firefox 18- */
   color: white;
}
::-moz-placeholder {  /* Firefox 19+ */
   color: white;
}
:-ms-input-placeholder {
   color: white;
}
#gs_tti50 input{
  position: relative;
  width: 166px !important;
  height: 42px !important;
  line-height: 40px;
  margin: 0 !important;
  padding: 0 20px !important;
  font-family: inherit;
  font-size: 10px;
  font-weight: 500;
  letter-spacing: 2px;
  text-transform: uppercase;
  background-color: transparent !important;
  border-right: 0 !important;
  outline: 0 !important;
  vertical-align: middle;
  box-sizing: border-box;
  transition: border-color .15s cubic-bezier(.35,.7,.32,.9);
  background: none !important;
  color: white;
}
.gcs-themed-button{
  border-bottom-color: #fec424;
  border-top-color: #fec424;
  background-color: #fec424;
  position: relative;
  display: inline-block;
  width: 42px;
  height: 42px;
  line-height: 35px;
  padding: 0;
  font-size: 22px;
  font-family: inherit;
  color: #fff;
  border: 0;
  border-top: 1px solid #c99e66;
  border-bottom: 1px solid #c99e66;
  outline: 0;
  cursor: pointer;
  vertical-align: middle;
  text-align: center;
  transition: all .15s cubic-bezier(.35,.7,.32,.9);
}
table tbody tr{
  border: 0;
}
.gsib_b{
  display: none !important;
}
.gsc-input{
  padding-right: 0px !important;
}
.gsc-search-box{
      margin-top: 5px;
    }
</style>
";

    $customJS = "<script>
    (function ($) {
      $(window).load(function () {
        // Removing the Google Search Button
        $('.gsc-search-button input').replaceWith('<button class=\'gcs-themed-button\' type=\'submit\' value=\'Search\'><span class=\'ion-ios-search\'></span></button>');
        // Adding the Search Here placeholder text to the searchbox
        $('#gs_tti50 input').attr('placeholder', 'SEARCH HERE');
      });
    }(jQuery));
    </script>";

    // echo $gcs . $customJS . $customCSS;
    echo $gcs;
	}
} // class My_Widget
