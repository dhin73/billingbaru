<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Logout extends MX_Controller {

	public function index() {
		$this->session->unset_userdata(array("userid","level","logged_in"));
		$this->session->set_flashdata("successMsg","You have been logged out..");
		redirect("login","refresh");
	}

}