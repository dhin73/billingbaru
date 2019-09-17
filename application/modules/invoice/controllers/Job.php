		
<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Job extends BILLING_Controller {

	public function index() {
		$view["jobResult"] = db_reads("invoicejob");
		$this->load->view("job_view",$view);
	}

	public function add()
	{
		$product = $this->Job_model;
		$validation = $this->form_validation;
		$validation->set_rules($job->rules());

		if ($validation->run()) {
			$product->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view("tiket/job/new_form");
	}

	public function edit($idjob = null)
	{
		if (!isset($id)) redirect('tiket/job');
	   
		$job = $this->Job_model;
		$validation = $this->form_validation;
		$validation->set_rules($job->rules());

		if ($validation->run()) {
			$job->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["job"] = $job->getById($idjob);
		
		
		$this->load->view("tiket/job/edit_form", $data);
	}

	public function delete($idjob=null)
	{
		
		if ($this->Job_model->delete($idjob)) {
			redirect(site_url('tiket/job'));
		}
	}
}