<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;

	$table_name  =  $wpdb->prefix . "easy_calendar_manager";
	$table_name2 =  $wpdb->prefix . "easy_calendar_font_family";

	$sql2='CREATE TABLE IF NOT EXISTS ' .$table_name2.' (
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Font_family VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';

	$sql='CREATE TABLE IF NOT EXISTS ' .$table_name.' (
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Juna_IT_Easy_CalThemeTitle VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWidth VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalHeight VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDaysFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalBorderWidth VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalBorderRadius VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalBorderStyle VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalBorderColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalGridColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalFirstDay VARCHAR(255) NOT NULL,
		Juna_IT_Easy_Calendar_Show_Title VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalTitleBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalTitleColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalTitleFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalTitleFontFamily VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalMonthBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalMonthColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalMonthFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalMonthFontFamily VARCHAR(255) NOT NULL,
		Juna_IT_Easy_Calendar_Popup_Icons VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalIconColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalIconFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWDayBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWDayColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWDayFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWdayBRad VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWdayFontFamily VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSatBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSatColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSatFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSatBRad VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSatFontFamily VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSunBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSunColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSunFontSize VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSunBRad VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalSunFontFamily VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalCurrentBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalCurrentColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalCurrentBorderRadius VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalCurrentBorderColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWEventBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWEventColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalWEventBorderRadius VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSatBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSatColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSatBorderRadius VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSunBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSunColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalDSunBorderRadius VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalHoverBgColor VARCHAR(255) NOT NULL,
		Juna_IT_Easy_CalHoverColor VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
			
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql2);
	
	$family = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New',' AngsanaUPC','Aparajita','Arabic Typesetting','Arial',
		'Arial Black','Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic',
		'Comic Sans MS','Consolas','Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New',
		'DaunPenh','David','DFKai-SB','DilleniaUPC','DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong',
		'Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola','Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe',
		'Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika','Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee',
		'Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode','Malgun Gothic','Mangal','Manny ITC','Marlett',
		'Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue','Microsoft PhagsPa',
		'Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS',
		'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT',
		'NSimSun','Nyala','Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol',
		'Shonar Bangla','Shruti','SimHei','SimKai','Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic',
		'Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
	$Juna_IT_Easy_Cal_Count_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d",0));
	if(count($Juna_IT_Easy_Cal_Count_Fonts)==0)
	{
		for($i=0;$i<count($family);$i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Font_family) VALUES (%d, %s)", '', $family[$i]));
		}
	}
	$Juna_IT_Easy_Cal_Count_Themes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	if(count($Juna_IT_Easy_Cal_Count_Themes)==0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Juna_IT_Easy_CalThemeTitle, Juna_IT_Easy_CalWidth, Juna_IT_Easy_CalHeight, Juna_IT_Easy_CalBgColor, Juna_IT_Easy_CalDaysFontSize, Juna_IT_Easy_CalBorderWidth, Juna_IT_Easy_CalBorderRadius, Juna_IT_Easy_CalBorderStyle, Juna_IT_Easy_CalBorderColor, Juna_IT_Easy_CalGridColor, Juna_IT_Easy_CalFirstDay, Juna_IT_Easy_Calendar_Show_Title, Juna_IT_Easy_CalTitleBgColor, Juna_IT_Easy_CalTitleColor, Juna_IT_Easy_CalTitleFontSize, Juna_IT_Easy_CalTitleFontFamily, Juna_IT_Easy_CalMonthBgColor, Juna_IT_Easy_CalMonthColor, Juna_IT_Easy_CalMonthFontSize, Juna_IT_Easy_CalMonthFontFamily, Juna_IT_Easy_Calendar_Popup_Icons, Juna_IT_Easy_CalIconColor, Juna_IT_Easy_CalIconFontSize, Juna_IT_Easy_CalWDayBgColor, Juna_IT_Easy_CalWDayColor, Juna_IT_Easy_CalWDayFontSize, Juna_IT_Easy_CalWdayBRad, Juna_IT_Easy_CalWdayFontFamily, Juna_IT_Easy_CalSatBgColor, Juna_IT_Easy_CalSatColor, Juna_IT_Easy_CalSatFontSize, Juna_IT_Easy_CalSatBRad, Juna_IT_Easy_CalSatFontFamily, Juna_IT_Easy_CalSunBgColor, Juna_IT_Easy_CalSunColor, Juna_IT_Easy_CalSunFontSize, Juna_IT_Easy_CalSunBRad, Juna_IT_Easy_CalSunFontFamily, Juna_IT_Easy_CalCurrentBgColor, Juna_IT_Easy_CalCurrentColor, Juna_IT_Easy_CalCurrentBorderRadius, Juna_IT_Easy_CalCurrentBorderColor, Juna_IT_Easy_CalWEventBgColor, Juna_IT_Easy_CalWEventColor, Juna_IT_Easy_CalWEventBorderRadius, Juna_IT_Easy_CalDSatBgColor, Juna_IT_Easy_CalDSatColor, Juna_IT_Easy_CalDSatBorderRadius, Juna_IT_Easy_CalDSunBgColor, Juna_IT_Easy_CalDSunColor, Juna_IT_Easy_CalDSunBorderRadius, Juna_IT_Easy_CalHoverBgColor, Juna_IT_Easy_CalHoverColor) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', 'Orange Calendar', '230px', '242px', '#dd9933', '14px', '0px', '2px', 'none', '#dd9933', '#dd8b0f', 'Monday', 'No', '#ffffff', '#000000', '16px', 'Arial', '#dd9933', '#ffffff', '19px', 'Vijaya', '5', '#dd6000', '18px', '#dd8b0f', '#ffffff', '19px', '0px', 'Vijaya', '#dd8502', '#ffffff', '19px', '0px', 'Vijaya', '#d88200', '#ffffff', '19px', '0px', 'Vijaya', '#dd6000', '#ffffff', '0px', '#dd9933', '#dd9933', '#ffffff', '0px', '#dd9933', '#ffffff', '0px', '#dd9933', '#bc3e00', '0px', '#bc3e00', '#ddaa5d'));
	}
?>