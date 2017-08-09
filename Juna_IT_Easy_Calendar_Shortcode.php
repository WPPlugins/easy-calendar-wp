<?php
	function Juna_Easy_Calendar_GET_Shortcode_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);

		return Juna_Easy_Calendar_Draw_Shortcode($atts['id']);
	}
	add_shortcode('Juna_Easy_Calendar', 'Juna_Easy_Calendar_GET_Shortcode_ID');
	function Juna_Easy_Calendar_Draw_Shortcode($CEid)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'hopar_1','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'1','widget_name'=>'Juna_IT_Easy_Calendar'), $atts, 'Juna_IT_Easy_Calendar' );
			$Juna_Easy_Calendar=new Juna_IT_Easy_Calendar;
			global $wpdb;
			$instance=array('Juna_IT_Easy_CalThemeTitle'=>$CEid);
			$Juna_Easy_Calendar->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
?>