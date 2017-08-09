<?php
	
	class  Juna_IT_Easy_Calendar extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Juna_IT_Easy_Calendar','description'=>'This is the widget of Juna_IT_Easy_Calendar plugin');
			parent::__construct('Juna_IT_Easy_Calendar','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$defaults = array('Juna_IT_Easy_CalThemeTitle'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Calendar = $instance['Juna_IT_Easy_CalThemeTitle'];
		   	?>
		   	<div>			  
			   	<p>
			   		Calendar Title:
			   		<select name="<?php echo $this->get_field_name('Juna_IT_Easy_CalThemeTitle'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;
							$table_name  =  $wpdb->prefix . "easy_calendar_manager";
							$Calendar_Title=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));
				   			
				   			foreach ($Calendar_Title as $Title1)
				   			{
				   				?> <option value="<?php echo $Title1->id; ?>"> <?php echo $Title1->Juna_IT_Easy_CalThemeTitle; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Calendar = empty($instance['Juna_IT_Easy_CalThemeTitle']) ? '' : $instance['Juna_IT_Easy_CalThemeTitle'];
 		 	global $wpdb;
			$table_name  =  $wpdb->prefix . "easy_calendar_manager";
			$Theme_Params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d",$Calendar));

			if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==1)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-arrow-circle-o-left';
 		 		$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-arrow-circle-o-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==2)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-arrow-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-arrow-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==3)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-chevron-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-chevron-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==4)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-toggle-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-toggle-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==5)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-chevron-circle-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-chevron-circle-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==6)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-arrow-circle-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-arrow-circle-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==7)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-angle-double-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-angle-double-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==8)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-caret-left';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-caret-right';
 		 	}
 		 	else if($Theme_Params[0]->Juna_IT_Easy_Calendar_Popup_Icons==9)
 		 	{
 		 		$Juna_IT_Easy_Calendar_Left_Icon='junaiticons-mail-reply';
				$Juna_IT_Easy_Calendar_Right_Icon='junaiticons-mail-forward';
 		 	}
 		 	echo $before_widget;
 		 	?>
 		 	<style type="text/css">
 		 		#calendar11_<?php echo $Calendar;?>
 		 		{
 		 			width:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWidth;?>;
 		 			height:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalHeight;?>;
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBgColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDaysFontSize;?>;
 		 			border:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderWidth;?> <?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderStyle;?> <?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderColor;?>;
 		 			border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderRadius;?>;
 		 			border-collapse:initial;
 		 		}
 		 		#calendar11_<?php echo $Calendar;?> tr td
 		 		{
 		 			border-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalGridColor;?> !important;
 		 			border-top: 1px solid <?php echo $Theme_Params[0]->Juna_IT_Easy_CalGridColor;?>;
 		 		}
 		 		#title_name_<?php echo $Calendar;?>
 		 		{
 		 			border-top-left-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderRadius;?>;
 		 			border-top-right-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBorderRadius;?>;
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalTitleBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalTitleColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalTitleFontSize;?>;
 		 			font-family:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalTitleFontFamily;?>;
 		 			<?php if($Theme_Params[0]->Juna_IT_Easy_Calendar_Show_Title=='Yes'){?>border-top:0px !important;<?php }?>
 		 		}
 		 		.junaitescal_<?php echo $Calendar;?>
 		 		{
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalIconColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalIconFontSize;?>;
 		 		}
 		 		#JIT_EasyCal_M_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalMonthBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalMonthColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalMonthFontSize;?>;
 		 			font-family:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalMonthFontFamily;?>;
 		 		}
 		 		.JIT_EasyCal_WDN_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWDayBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWDayColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWDayFontSize;?>;
 		 			font-family:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWdayFontFamily;?>;
 		 			border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWdayBRad;?>;
 		 		}
 		 		.JIT_EasyCal_Sat_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSatBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSatColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSatFontSize;?>;
 		 			border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSatBRad;?>;
 		 			font-family:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSatFontFamily;?>;
 		 		}
 		 		.JIT_EasyCal_Sun_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSunBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSunColor;?>;
 		 			font-size:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSunFontSize;?>;
 		 			border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSunBRad;?>;
 		 			font-family:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalSunFontFamily;?>;
 		 		}
 		 		.today1_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalCurrentBgColor;?> !important;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalCurrentColor;?> !important;
 		 			border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalCurrentBorderRadius;?> !important;
 		 			border-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalCurrentBorderColor;?> !important;		
 		 		}
 		 		.without1_<?php echo $Calendar;?>
 		 		{
 		 			background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWEventBgColor;?>;
 		 			color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWEventColor;?>;
					border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWEventBorderRadius;?>;
				}
				.saturday11_<?php echo $Calendar;?>
				{
					background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSatBgColor;?> !important;
					color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSatColor;?> !important;
					border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSatBorderRadius;?> !important;		
				}
				.sunday11_<?php echo $Calendar;?>
				{
					background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSunBgColor;?> !important;
					color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSunColor;?> !important;
					border-radius:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalDSunBorderRadius;?> !important;
				}
				.without1_<?php echo $Calendar;?>:hover
				{
					background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalHoverBgColor;?> !important;
					color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalHoverColor;?> !important;
				}
				.JIT_EasyCalank_<?php echo $Calendar;?>
				{
					background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBgColor;?>;
					border-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalGridColor;?>;
				}
				#JIT_EasyCal_P_<?php echo $Calendar;?>,#JIT_EasyCal_N_<?php echo $Calendar;?>
				{
					background-color:<?php echo $Theme_Params[0]->Juna_IT_Easy_CalBgColor;?>;
				}
				#JIT_EasyCal_P_<?php echo $Calendar;?>,#JIT_EasyCal_N_<?php echo $Calendar;?>,#JIT_EasyCal_M_<?php echo $Calendar;?>
				{
					<?php if($Theme_Params[0]->Juna_IT_Easy_Calendar_Show_Title=='No'){?>border-top:0px !important;<?php }?>
				}
 		 	</style>
 		 	<!-- <div class="JIT_Cal_Div" id="JIT_Cal_Div_<?php echo $Calendar;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $Theme_Params[0]->Juna_IT_Easy_CalWidth;?>; height: <?php echo $Theme_Params[0]->Juna_IT_Easy_CalHeight;?>; ">
 		 		<input type="text" style="display: none;" class="JIT_CAL_Hidden" id="JIT_CAL_Hidden_<?php echo $Calendar;?>" value="<?php echo $Theme_Params[0]->Juna_IT_Easy_CalWidth;?>">
 		 		
		        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $Theme_Params[0]->Juna_IT_Easy_CalWidth;?>; height: <?php echo $Theme_Params[0]->Juna_IT_Easy_CalHeight;?>; overflow: hidden;">
		            <div data-p="112.50" style="display: none;"> -->
		            	<table class="JIT_EasyCal" id="calendar11_<?php echo $Calendar;?>">
		            	<input type="text" style="display: none;" id="JIT_CAL_FD_<?php echo $Calendar;?>" value="<?php echo $Theme_Params[0]->Juna_IT_Easy_CalFirstDay;?>">
					  		<thead >
					  			<?php if($Theme_Params[0]->Juna_IT_Easy_Calendar_Show_Title=='Yes'){?>
				 		 			<tr>
				 		 				<td id='title_name_<?php echo $Calendar;?>' class="title_name1" colspan="7"><?php echo $Theme_Params[0]->Juna_IT_Easy_CalThemeTitle;?></td>
				 		 			</tr>
			 		 			<?php }?>
					    		<tr>
					    			<td class='prev11' id="JIT_EasyCal_P_<?php echo $Calendar;?>"><i class="junaitescal_<?php echo $Calendar;?> junaitescal junaiticons-style <?php echo $Juna_IT_Easy_Calendar_Left_Icon;?>"></i></td>
					    			<td class='month11' id="JIT_EasyCal_M_<?php echo $Calendar;?>" colspan="5"></td>
					    			<td class='next11' id="JIT_EasyCal_N_<?php echo $Calendar;?>"><i class="junaitescal_<?php echo $Calendar;?> junaitescal junaiticons-style <?php echo $Juna_IT_Easy_Calendar_Right_Icon;?>"></i></td>
					    		</tr>
					   			<tr>
					   				<?php if($Theme_Params[0]->Juna_IT_Easy_CalFirstDay=='Monday'){?>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Mo</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Tu</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>We</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Th</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Fr</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?> JIT_EasyCal_Sat_<?php echo $Calendar;?>'>Sa</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?> JIT_EasyCal_Sun_<?php echo $Calendar;?>'>Su</td>
						   			<?php } else {?>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?> JIT_EasyCal_Sun_<?php echo $Calendar;?>'>Su</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Mo</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Tu</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>We</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Th</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?>'>Fr</td>
						   				<td class='week_day11 JIT_EasyCal_WDN_<?php echo $Calendar;?> JIT_EasyCal_Sat_<?php echo $Calendar;?>'>Sa</td>
						   			<?php }?>
					   			</tr>
					  		<tbody>
						</table>
				<!-- 	</div>
		        </div>
		    </div>	 -->	
 		 	<?php
 		 	echo $after_widget;
 		}
	}
?>