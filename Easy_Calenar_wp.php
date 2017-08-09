<?php
/*
	Plugin Name: Juna IT Easy Calendar 
	Plugin URI: http://juna-it.com/index.php/juna-easy-calendar/
	Description: Juna Easy Calendar is very easily used plugin calendar, which has lots of advantages.
	Version: 1.2.31
	Author: Juna-IT
	Author URI: http://juna-it.com/
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
	add_action('widgets_init', function() {
	 	register_widget('Juna_IT_Easy_Calendar');
	});
	require_once('Juna_IT_Easy_Calendar_Widget.php');
	require_once('Ajax_in_Juna_IT_Easy_Calendar.php');
	require_once('Juna_IT_Easy_Calendar_Shortcode.php');

	add_action('wp_enqueue_scripts','Juna_IT_Easy_Calendar_Style');

	function Juna_IT_Easy_Calendar_Style()
	{
		wp_register_style( 'Juna_IT_Easy_Calendar', plugins_url( 'Style/Juna_IT_Easy_Calendar_Widget.css',__FILE__ ) );
		wp_enqueue_style( 'Juna_IT_Easy_Calendar' );
		wp_register_style('fontawesome-css',plugins_url('/Style/junaiticons.css', __FILE__)); 
	    wp_enqueue_style('fontawesome-css');	

		wp_register_script('Juna_IT_Easy_Calendar', plugins_url('Scripts/Juna_IT_Easy_Calendar_Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Juna_IT_Easy_Calendar', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('cwp-main', plugins_url('/Scripts/jssor.slider.mini.js', __FILE__), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'Juna_IT_Easy_Calendar' );
	}

	add_action("admin_menu", 'Juna_IT_Easy_Calendar_Admin_Menu' );

	function Juna_IT_Easy_Calendar_Admin_Menu() 
	{
		add_menu_page('Juna_IT_Easy_Calendar_Admin_Menu','Easy Calendar','manage_options','Juna_IT_Easy_Calendar_Admin_Menu','Manage_Juna_IT_Easy_Calendar_Admin_Menu', plugins_url("Images/easy-calendar-admin.png",__FILE__));

 		add_submenu_page( 'Juna_IT_Easy_Calendar_Admin_Menu', 'Juna_IT_Easy_Calendar_Admin_Menu_Add_Calendar', 'Add Calendar', 'manage_options', 'Juna_IT_Easy_Calendar_Admin_Menu', 'Manage_Juna_IT_Easy_Calendar_Admin_Menu');
 		add_submenu_page( 'Juna_IT_Easy_Calendar_Admin_Menu', 'Juna-IT Products', 'Juna-IT Products', 'manage_options', 'Juna_IT_Products', 'Manage_Juna_IT_Products_Easy');
	}

	function Manage_Juna_IT_Easy_Calendar_Admin_Menu()
	{
		require_once('Add_Easy_Calendar.php');
	}
	function Manage_Juna_IT_Products_Easy()
	{
		require_once('Juna-IT-Products.php');
	}

	add_action('admin_init', function() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		
		wp_register_script('Juna_IT_Easy_Calendar', plugins_url('Scripts/Juna_IT_Easy_Calendar_Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Juna_IT_Easy_Calendar', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Juna_IT_Easy_Calendar');

		wp_register_style('Juna_IT_Easy_Calendar', plugins_url('Style/Juna_IT_Easy_Calendar_Admin_Style.css', __FILE__ ));
		wp_enqueue_style('Juna_IT_Easy_Calendar');	 
	});

	register_activation_hook(__FILE__,'Easy_calendar_wp_activate');

	function Easy_calendar_wp_activate()
	{
		require_once('Easy_Calendar_wp_install.php');
	}
?>