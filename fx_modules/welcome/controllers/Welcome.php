<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('session');
		$this->load->helper('date');
		// $this->session->set_userdata('language','id');
		echo "<pre>";
		// print_r(date('Y-F-d H:i:s a'));
		// echo SELF;
		// $this->lang->load('date', $this->session->userdata('language'));
		// echo $this->lang->line('month_name')[1];
		echo date_converter('2016-12-30', 'l, d F Y | D M', 'id');
		echo PHP_EOL;
		echo date_converter('2016-12-30', 'l, d F Y | D M', 'en');
		echo "</pre>";
		// $this->load->view('welcome_message');
	}

	function set($value='en')
	{
		if (array_key_exists($value, $this->config->item('language_id'))) {
			$this->session->set_userdata('language', $value);
		}
		var_dump(in_array($value, $this->config->item('language_id')));
		echo "<pre>";
		print_r($this->config->item('language_id'));
		// print_r($this->session->userdata());
	}
}
