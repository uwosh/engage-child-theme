<?php

/*** Child Theme Function  ***/
//Check & Create table to DB depending on whether it exist or not
function create_engage_table(){
    global $wpdb;

    $shadowless_background_table = $wpdb->prefix . 'shadowless_background';
    //Checking if table exist
    if($wpdb->get_var('SHOW TABLES LIKE ' . $shadowless_background_table) != $shadowless_background_table){
        //If table doesn't exist, create one
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $shadowless_background_table(
        id INT NOT NULL AUTO_INCREMENT,
        background TINYINT(1) NOT NULL DEFAULT '0',
        PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

function create_engage_table_data(){
    global $wpdb;
    $shadowless_background_table = $wpdb->prefix . 'shadowless_background';

        $wpdb->insert($shadowless_background_table, array(
            'background' => 0
            )
        );
}

//Calling engage's functions
add_action('after_switch_theme', 'create_engage_table');
add_action('after_switch_theme', 'create_engage_table_data');

// Engage's settings page
function engage_register_options_page() {
	add_options_page('Engage Options', 'Engage Options', 4, 'engage-options', 'engage_options_page');
}
add_action('admin_menu', 'engage_register_options_page');

function engage_options_page(){
?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <div class="wrap">
        <h3>Engage Options</h3>
		<p>Remove gradient background of <i>'Home'</i> page by checking the checkbox then <i>'Update Background'</i> or keep gradient background by unchecking the checkbox then <i>'Update Background'</i>. (If page has gradient/light background with checkbox checked/unchecked, follow given instruction to change it the way you want)</p>
        <form action="<?php echo get_site_url(); ?>" method="POST">
            <div id="checkbox-container">
                Light Background: <input type="checkbox" id="backSwap" name="new_background" />
            </div><br />

            <input type="submit" name="submit" value="Update Background" class="button" />
        </form>
        <script>
            var checkboxValue = JSON.parse(localStorage.getItem('checkboxValue')) || {}
            var $checkbox = $("#checkbox-container :checkbox");

            $checkbox.on("change", function() {
                $checkbox.each(function() {
                    checkboxValue[this.id] = this.checked;
                });
            	localStorage.setItem("checkboxValue", JSON.stringify(checkboxValue));
            });

        	//on page load
        	$.each(checkboxValue, function(key, value) {
           		$("#" + key).prop('checked', value);
        	});
        </script>
    </div>
<?php
}

//Updating Engage table's 'background' data value
function update_background_value() {
    global $wpdb;
    $shadowless_background_table = $wpdb->prefix . 'shadowless_background';

    if (isset($_POST['submit']) && isset($_POST['new_background']) == 'checked'){
        $wpdb->update($shadowless_background_table, array('background' => '1'), array('id' => 1));
    }
    elseif (isset($_POST['submit']) && isset($_POST['new_background']) == ''){
        $wpdb->update($shadowless_background_table, array('background' => '0'), array('id' => 1));
    }
}
add_action('init', 'update_background_value');

//Alerting successful updated background message
if (isset($_POST['submit'])){
	echo "<script type='text/javascript'>alert('You have successfully updated the background.');</script>";
}

// Custom Widgets
include_once 'widgets/top-menu.php';
include_once 'widgets/custom-search.php';

// Custom JavaScript
function uwo_theme_enqueue_script(){
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/script.js', array('jquery') ,'1.0', true );
}
add_action( 'wp_enqueue_scripts', 'uwo_theme_enqueue_script' );

// Favicons
function uwo_favicon_link() {
    echo '<!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="' . get_stylesheet_directory_uri() . '/img/favicons/apple-touch-icon-152x152.png">
    <meta name="apple-mobile-web-app-title" content="UW Oshkosh">
    <link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/img/favicons/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="msapplication-TileImage" content="' . get_stylesheet_directory_uri() . '/img/favicons/mstile-144x144.png">
    <meta name="application-name" content="UW Oshkosh">';
}
add_action( 'wp_head', 'uwo_favicon_link' );

// Scripts

function eltd_child_theme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'childstyle' );
}
add_action('wp_enqueue_scripts', 'eltd_child_theme_enqueue_scripts', 11);
