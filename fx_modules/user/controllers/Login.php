<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Desciption of Login User
 *
 * @author Elfay <mfahrurrifai@gmail.com>
 * @copyright Copyright (c) 2017, elfayhandmade
 */

class Login extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('login_model');
	}

	function index() {
		$data['action_login'] = base_url('user/login/verify');
		$this->load->view('login_view', $data);
	}

	function verify()
	{
		echo "<pre>";
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		set_flashdata('input_email', $email);
		set_flashdata('input_password', $password);
		$userdata = $this->login_model->get_user_data($email);
		if ($userdata !== FALSE) {
			$real_password = $this->encryption->decrypt($userdata->user_password);
			if ($real_password == $password) {
				var_dump($real_password);
			} else {
				set_flashdata('msg', 'Wrong Password');
				redirect('user/login');
			}
		} else {
			set_flashdata('msg', 'User Not Found');
			redirect('user/login');
		}
	}

}



