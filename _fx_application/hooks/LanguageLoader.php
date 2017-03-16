<?php
class LanguageLoader
{
	function initialize() {
		$app =& get_instance();
		$language_id = $app->session->has_userdata('language') ? $app->session->userdata('language') : 'en';
		$language_name = $app->config->item('language_id')[$language_id];
		$app->config->set_item('language', $language_name);
	}
}