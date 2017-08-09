<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	$table_name  =  $wpdb->prefix . "easy_calendar_manager";

	$Juna_IT_Easy_Calendar_Themes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));
?>
<form method="POST">
	<div id="Juna_IT_Easy_Calendar_Main_Div"> 
		<div class="Juna_IT_Easy_Calendar_Theme_Submenu1_Footer_Div">
			<a href="http://juna-it.com" target="_blank" title="Click to Visit"><img src="<?php echo plugins_url("Images/logo-white.png",__FILE__);?>" class="Juna_IT_Logo_Orange"></a>
			<div class="Juna_IT_Easy_Calendar_Event_Submenu_Div">	
				<span class="Theme_Title_Span">Theme Title:</span> 
				<input type="text"   class="Juna_IT_Easy_Calendar_search_theme_field" id="Juna_IT_Easy_Calendar_search_theme_field" onclick="Juna_IT_Easy_Calendar_Search_Theme_Clicked()" placeholder="Search">
				<input type="button" class="Juna_IT_Easy_Calendar_Reset_Theme_button" value="Reset" onclick="Juna_IT_Easy_Calendar_Reset_Theme_Button_Clicked()">
				<span class="searched_theme_calendar_does_not_exist" id="searched_theme_calendar_does_not_exist"></span>
			</div>	
			<div class="Juna_IT_Easy_Calendar_Event_Submenu_Div1">
				<input type="button" class="Juna_IT_Easy_Cal_Them_Sub_Tab_Buttons" value="Gereral Parameters" onclick="Juna_IT_Easy_Calendar_Theme_Sub_Buttons(1)">
				<input type="button" class="Juna_IT_Easy_Cal_Them_Sub_Tab_Buttons" value="Header Parameters" onclick="Juna_IT_Easy_Calendar_Theme_Sub_Buttons(2)">
				<input type="button" class="Juna_IT_Easy_Cal_Them_Sub_Tab_Buttons" value="Body Parameters" onclick="Juna_IT_Easy_Calendar_Theme_Sub_Buttons(3)">
				<input type="hidden" id="Juna_IT_Easy_Cal_Theme_Sub_ID" name="Juna_IT_Easy_Cal_Theme_Sub_ID">
				<input type="hidden" name="Juna_IT_Easy_Calendar_Popup_Icons" id="Juna_IT_Easy_Calendar_Popup_Icons" value="">

				<input type="button" class="Create_New_Theme_Calendar_button" value="Back" onclick="Juna_IT_Easy_Cal_Theme_Sub_BacK_Button()">
			</div>	
		</div>	

		<table class='Juna_IT_Easy_Calendar_Theme_Sub_Main_Table'>
			<tr class="Juna_IT_Easy_Calendar_Theme_Sub_first_row">
				<td class='Juna_IT_Easy_Calendar_Theme_Sub_main_id_item'><B><I>No</I></B></td>
				<td class='Juna_IT_Easy_Calendar_Theme_Sub_main_name_item'><B><I>Calendar Name</I></B></td>
				<td class='Juna_IT_Easy_Calendar_Theme_Sub_main_shortcode_item'><B><I>Shortcode</I></B></td>
				<td class='Juna_IT_Easy_Calendar_Theme_Sub_main_actions_item'><B><I>Actions</I></B></td>
			</tr>
		</table>
		<table class='Juna_IT_Easy_Calendar_Theme_Sub_Table'>
			<?php for($i=0;$i<count($Juna_IT_Easy_Calendar_Themes);$i++){?>
				<tr>
					<td class='Juna_IT_Easy_Calendar_Theme_Sub_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='Juna_IT_Easy_Calendar_Theme_Sub_name_item'><B><I><?php echo $Juna_IT_Easy_Calendar_Themes[$i]->Juna_IT_Easy_CalThemeTitle;?></I></B></td>
					<td class='Juna_IT_Easy_Calendar_Theme_Sub_shortcode_item'><B><I><?php echo '[Juna_Easy_Calendar id="'.$Juna_IT_Easy_Calendar_Themes[$i]->id.'"]';?></I></B></td>
					<td class='Juna_IT_Easy_Calendar_Theme_Sub_edit_item' onclick="Edit_Easy_Calendar_Theme(<?php echo $Juna_IT_Easy_Calendar_Themes[$i]->id;?>)"><B><I>Edit</I></B></td>
					<td><B><I>Delete</I></B></td>
				</tr>
			<?php } ?>
		</table>
		<table class='Juna_IT_Easy_Calendar_Theme_Sub_Table1'></table>
	</div>

	<div id="Juna_IT_Easy_Calendar_Button_Div" class="Juna_IT_Easy_Calendar_Button_Div">
		<a href="http://juna-it.com/index.php/juna-easy-calendar/" target="_blank"<abbr title="Click to Buy"><div class="Juna_IT_Easy_Calendar_Full_Version_Image"></div></a>
		<span style="display:block;color:#ffffff;font-size:16px;" >This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.</span><br>
		<span style="display:block;color:#ffffff;font-size:16px;margin-top:-15px;" > We appreciate every customer.</span>
	</div>

	<img src="<?php echo plugins_url('Images/general parameters.PNG',__FILE__ );?>" id="Juna_IT_Easy_Calendar_Image_1">
	<img src="<?php echo plugins_url('Images/header parameters.PNG',__FILE__ );?>" id="Juna_IT_Easy_Calendar_Image_2">
	<img src="<?php echo plugins_url('Images/body parameters.PNG',__FILE__ );?>" id="Juna_IT_Easy_Calendar_Image_3">	
</form>