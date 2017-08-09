<?php
	add_action( 'wp_ajax_Juna_IT_Easy_Calendar_search_theme_field', 'Juna_IT_Easy_Calendar_search_theme_field_Callback' );
	add_action( 'wp_ajax_nopriv_Juna_IT_Easy_Calendar_search_theme_field', 'Juna_IT_Easy_Calendar_search_theme_field_Callback' );

	function Juna_IT_Easy_Calendar_search_theme_field_Callback()
	{
		$Juna_IT_Easy_Calendar_search_theme_field=strtolower(sanitize_text_field($_POST['foobar']));

		global $wpdb;		

		$table_name  =  $wpdb->prefix . "easy_calendar_manager";

		$Searched_Juna_IT_Calendar_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));

		for($i=0;$i<count($Searched_Juna_IT_Calendar_Theme);$i++)
		{
			if(strpos(strtolower($Searched_Juna_IT_Calendar_Theme[$i]->Juna_IT_Easy_CalThemeTitle),$Juna_IT_Easy_Calendar_search_theme_field)!='')
			{
				echo $Searched_Juna_IT_Calendar_Theme[$i]->id . ')&*&(' . $Searched_Juna_IT_Calendar_Theme[$i]->Juna_IT_Easy_CalThemeTitle . ')*^*(';
			}
			else
			{
				echo "ccc";
			}			
		}
		die();
	}
?>