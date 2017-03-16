<?php 
/**
 * Desciption of Theme Helper
 *
 * @author Elfay <mfahrurrifai@gmail.com>
 * @copyright Copyright (c) 2017, elfayhandmade
 */

function base_theme($suff='')
{
	$app =& get_instance();
	$used_theme = $app->config->item('user_theme');
	$suff = '/'.ltrim($suff, '/');
	return base_url('themes/'.$used_theme.$suff);
}

