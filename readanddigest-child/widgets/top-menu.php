<?php
/*
Plugin Name: Top Menu
Plugin URI: http://uwosh.edu
Description: Provides easy placement of the UWO Top Menu
Author: Joseph Kerkhof
Version: 1.0
Author URI: https://twitter.com/musicaljoeker
*/
// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');


add_action( 'widgets_init', function(){
     register_widget( 'UWO_Top_Menu' );
});
/**
 * Adds My_Widget widget.
 */
class UWO_Top_Menu extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'UWO_Top_Menu', // Base ID
			__('UWO Top Menu', 'text_domain'), // Name
			array( 'description' => __( 'This widgets allows easy placement for the UWO Top Menu.', 'text_domain' ), ) // Args
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
		echo "
		<div class='top-menu'>
			<a href='http://www.uwosh.edu/about-uw-oshkosh/'>About</a>
			<a href='http://www.uwosh.edu/academics/'>Academics</a>
			<a href='http://www.titans.uwosh.edu/'>Athletics</a>
			<a href='http://www.uwosh.edu/alumni'>Alumni</a>
			<a href='http://www.uwosh.edu/study-at-uw-oshkosh/'>Admissions</a>
			<a href='http://www.uwosh.edu/administration/'>Administration</a>
			<a href='http://www.uwosh.edu/resources/'>Resources</a>
			<a href='http://www.uwosh.edu/calendars/'>Calendars</a>
			<div class='big-menu'>
				<a href='' class='top-nav-dropdown'>Titan Services<i class='fa fa-caret-down' aria-hidden='true'></i></a>
				<div class='dropdown-content'>
					<a href='http://www.uwosh.edu/site-index/'>Site Index</a>
					<a href='http://www.uwosh.edu/directory'>Directory</a>
					<a href='https://www.uwosh.edu/registrar/titanweb/'>Titan Web</a>
					<a href='http://www.uwosh.edu/titanapps'>Titan Apps</a>
					<a href='https://titanfiles.uwosh.edu/xythoswfs/webview/xythoslogin.action'>Titan Files</a>
					<a href='https://my.wisconsin.edu/'>My UW System</a>
					<a href='http://www.uwosh.edu/d2l/'>Desire2Learn (D2L)</a>
					<a href='http://www.uwosh.edu/library/'>Polk Library</a>
					<a href='http://www.uwosh.edu/myuwo/'>MyUWO Portal</a>
					<a href='https://uwosh.collegiatelink.net/'>Student Clubs</a>
					<a href='http://www.uwosh.edu/titanjobs'>Titan Jobs</a>
				</div>
			</div>
		</div>";
	}
} // class My_Widget
