function Juna_IT_Easy_Calendar_Theme_Sub_Buttons(number)
{
	for(var i=1;i<=3;i++)
	{
		if(i!=number)
		{
			jQuery('#Juna_IT_Easy_Calendar_Image_'+i).hide();
		}
		else
		{
			jQuery('#Juna_IT_Easy_Calendar_Image_'+i).show();
		}
	}
}
function Juna_IT_Easy_Cal_Theme_Sub_BacK_Button()
{
	location.reload();
}
function Juna_IT_Easy_Calendar_Search_Theme_Clicked()
{
	setInterval(function(){
		var Juna_IT_Easy_Calendar_search_theme_field=jQuery('#Juna_IT_Easy_Calendar_search_theme_field').val();
		if(Juna_IT_Easy_Calendar_search_theme_field!='')
		{
			var ajaxurl = object.ajaxurl;
			var data = {
			action: 'Juna_IT_Easy_Calendar_search_theme_field', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: Juna_IT_Easy_Calendar_search_theme_field, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response){
				if(response=='ccc')
				{
					jQuery('#searched_theme_calendar_does_not_exist').html('* Requested Calendar does not exist!');
					jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').hide();
					jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table').show();
				}
				else
				{
					jQuery('#searched_theme_calendar_does_not_exist').html('');
					jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table').hide();
					jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').show();
					jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').empty();
					var Shortpart1='[Juna_Easy_Calendar id="';
					var Shortpart2='"]';						
					var searched_params=response.split(')*^*(');
					for(i=0;i<parseInt(searched_params.length-1);i++)
					{
						searched_params_callback=searched_params[i].split(')&*&(');	

						jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').append("<tr><td class='Juna_IT_Easy_Calendar_Theme_Sub_id_item'><B><I>"+parseInt(parseInt(i)+1)+"</I></B></td><td class='Juna_IT_Easy_Calendar_Theme_Sub_name_item'><B><I>"+searched_params_callback[1]+"</I></B></td><td class='Juna_IT_Easy_Calendar_Theme_Sub_shortcode_item'><B><I>"+Shortpart1+searched_params_callback[0]+Shortpart2+"</I></B></td><td class='Juna_IT_Easy_Calendar_Theme_Sub_edit_item' onclick='Edit_Easy_Calendar_Theme("+searched_params_callback[0]+")'><B><I>Edit</I></B></td><td><B><I>Delete</I></B></td></tr>");
					}
				}
			});
		}
		else
		{
			jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').hide();
			jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table').show();
			jQuery('#searched_theme_calendar_does_not_exist').html('');
		}
	}, 500);
}
function Juna_IT_Easy_Calendar_Reset_Theme_Button_Clicked()
{
	jQuery('#Juna_IT_Easy_Calendar_search_theme_field').val('');
	jQuery('#searched_theme_calendar_does_not_exist').html('');
	jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table1').hide();
	jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table').show();
}
function Edit_Easy_Calendar_Theme(Theme_ID)
{
	jQuery('#Juna_Easy_Cal_Theme_Sub_Save_Button').fadeOut();
	jQuery('#Juna_Easy_Cal_Theme_Sub_Update_Button').fadeIn();
	jQuery('.Juna_IT_Easy_Calendar_Event_Submenu_Div').fadeOut();
	jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Main_Table').fadeOut();
	jQuery('.Juna_IT_Easy_Calendar_Theme_Sub_Table').fadeOut();
	jQuery('#Juna_Easy_Cal_Theme_Sub_ID').val(Theme_ID);

	for(var i=1;i<=3;i++)
	{
		if(i!=1)
		{
			jQuery('#Juna_IT_Easy_Calendar_Image_'+i).hide();
		}
		else
		{
			jQuery('#Juna_IT_Easy_Calendar_Image_'+i).show();
		}
	}
	setTimeout(function(){
		jQuery('.Juna_IT_Easy_Calendar_Event_Submenu_Div1').fadeIn();
	},500)	
}