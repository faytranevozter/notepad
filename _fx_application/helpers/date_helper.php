<?php 
/*
|------------------------------------------------------------------
| Date Converter
|------------------------------------------------------------------
| Converting date format using language in codeigniter
| 
| Add code below to language directory in codeigniter
| application/language/indonesia/date_lang.php : 
| 
| $lang['month_name'] = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
| $lang['day_name'] = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
| 
 */

function date_converter($date, $new_format, $lang='id')
{
	// D	=	Mon through Sun
	// l	=	Sunday through Saturday
	// N	=	1 (for Monday) through 7 (for Sunday)
	// w	=	0 (for Sunday) through 6 (for Saturday)
	// F	=	January through December
	// M	=	Jan through Dec

	$timestamp = strtotime($date);
	if ($lang != 'en') {
		$app =& get_instance();
		$idiom = $app->config->item('language_id')[$lang];
		$app->lang->load('date', $idiom);

		$converted_date = date($new_format, $timestamp);
		if (strpos($new_format, 'F') !== FALSE) {
			$month_name = $app->lang->line('month_name');
			$month_global = date('F', $timestamp);
			$month_global_n = date('n', $timestamp);
			$month_id = $month_name[$month_global_n];
			$converted_date = str_replace($month_global, $month_id, $converted_date);
		}
		
		if (strpos($new_format, 'M') !== FALSE) {
			$month_name = $app->lang->line('month_name');
			$month_global2 = date('M', $timestamp);
			$month_global_n2 = date('n', $timestamp);
			$month_id2 = $month_name[$month_global_n2];
			$converted_date = str_replace($month_global2, substr($month_id2, 0, 3), $converted_date);
		}

		if (strpos($new_format, 'l') !== FALSE) {
			$day_name = $app->lang->line('day_name');
			$day_global = date('l', $timestamp);
			$day_global_n = date('w', $timestamp);
			$day_id = $day_name[$day_global_n];
			$converted_date =str_replace($day_global, $day_id, $converted_date);
		}

		if (strpos($new_format, 'D') !== FALSE) {
			$day_name = $app->lang->line('day_name');
			$day_global2 = date('D', $timestamp);
			$day_global_n2 = date('w', $timestamp);
			$day_id2 = $day_name[$day_global_n2];
			$converted_date =str_replace($day_global2, substr($day_id2, 0, 3), $converted_date);
		}

	} else {
		$converted_date = date($new_format, $timestamp);
	}

	return $converted_date;
}

