<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends BILLING_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view("dashboard_view");
	}

}

?>