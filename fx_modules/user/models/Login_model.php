<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Desciption of Login Model
 *
 * @author Elfay <mfahrurrifai@gmail.com>
 * @copyright Copyright (c) 2017, elfayhandmade
 */

class Login_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_user_data($email='')
	{
		$this->db->where('user_email', $email);
		$q = $this->db->get('user');
		if ($q->num_rows() > 0) {
			return $q->row();
		} else {
			return FALSE;
		}
	}
}