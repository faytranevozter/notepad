<?php 
/**
 * Desciption of Common Helper
 *
 * @author Elfay <mfahrurrifai@gmail.com>
 * @copyright Copyright (c) 2017, elfayhandmade
 */

function set_flashdata($data, $value=NULL)
{
	$app =& get_instance();
	$app->session->set_flashdata($data, $value);
}

function flashdata($key='')
{
	$app =& get_instance();
	return $app->session->flashdata($key);
}