<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class BILLING_Controller extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$isLoggedIn = $this->session->userdata("logged_in");
		$ref = (isset($_SERVER['REDIRECT_URL'])) ? $_SERVER['REDIRECT_URL'] : false;
		if (!$isLoggedIn) {
			if ($ref) {
				redirect(base_url("login?ref={$ref}"),"refresh");
			} else {
				redirect(base_url("login"),"refresh");
			}
		}
	}

}

?>