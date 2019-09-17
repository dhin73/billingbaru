<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends MX_Controller {

	public function index() {
		$this->load->view('login_view');
	}

	public function auth() {
		$email = $this->input->post('email',TRUE);
		$password = md5($this->input->post('password',TRUE));
		$ref = $this->input->get("ref");
		$validateRow = db_read("user",array("email"=>$email,"password"=>$password));
		if ($validateRow) {
			$sesdata = array(
				'userid' => $validateRow->id,
				'level' => $validateRow->level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			if ($ref) {
				redirect(base_url($ref),"refresh");
			} else {
				redirect(base_url("dashboard"),"refresh");
			}
		} else {
			$this->session->set_flashdata("errorMsg",'Username or Password is Wrong!');
			if ($ref) {
				redirect(base_url("login?ref={$ref}"),"refresh");
			} else {
				redirect(base_url("login"),"refresh");
			}
		}
	}

}