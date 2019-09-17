<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Invoice extends BILLING_Controller {

	public function index() {
		$view["invoiceResult"] = db_query("SELECT `invoice`.`id`,`date`,`userid`,`invoiceid`,`jobid`,`lastchange`,`job`,`point` FROM invoice JOIN invoicejob ON `invoice`.`jobid` = `invoicejob`.`id` WHERE `userid`={$this->session->userdata('userid')} AND `date`='".date("Y-m-d")."'");
		$invoiceTotal = db_query("SELECT SUM(`point`) AS total FROM invoice JOIN invoicejob ON `invoice`.`jobid` = `invoicejob`.`id` WHERE `userid`={$this->session->userdata('userid')} AND `date`='".date("Y-m-d")."'");
		$view["invoiceTotal"] = isset($invoiceTotal[0]->total) ? $invoiceTotal[0]->total : 0;
		$view["invoicejobResult"] = db_reads("invoicejob");
		$this->load->view("invoice_view",$view);
	}

	public function add() {
		if ($this->input->post("invoiceid") && $this->input->post("jobid")) {
			$jobRow = db_read("invoicejob",array("id"=>$this->input->post("jobid")));

			$string_replace = array('#',',',';', '[', ']', '{', '}', '|', '^', '~','_');
            $invoiceid = strtoupper(trim(str_replace($string_replace,'',$this->input->post("invoiceid"))));

			if ($jobRow) {
				$config = $this->input->post("config");
				foreach ($config as $configName => $configValue) {
					if ($configValue) {
						if ($configName=="npwp") {
							$configValue = str_replace("#[^0-9]#","",$configValue);
						} elseif ($configName=="domain") {
							$configValue = strtolower($configValue);
						} elseif ($configName=="ticketid") {
							$configValue = strtoupper($configValue);
						}
						$configSubmitted[$configName] = $configValue;
					}
				}
				$configs = false;
				if (isset($configSubmitted)) {
					$configs = json_encode($configSubmitted);
				}
				$insertData = array(
					"invoiceid" => $invoiceid,
					"userid" => $this->session->userdata("userid"),
					"jobid" => $jobRow->id,
					"date" => date("Y-m-d"),
					"lastchange" => time(),
					"config" => $configs,
					"note" => $this->input->post("note"),
				);
				$invoiceInsert = db_create("invoice",$insertData);
				if ($invoiceInsert) {
					$this->session->set_flashdata("successMsg","Invoice berhasil ditambahkan");
				} else {
					$this->session->set_flashdata("errorMsg","Invoice gagal ditambahkan");
				}
			} else {
				$this->session->set_flashdata("errorMsg","Job tidak valid");
			}
		}
		redirect(base_url("invoice"),"refresh");
	}

	public function edit() {		
		if ($this->input->post("id") && $this->input->post("invoiceid") && $this->input->post("jobid")) {
			$invoiceRow = db_read("invoice",array("id"=>$this->input->post("id")));
			if ($invoiceRow) {
				$jobRow = db_read("invoicejob",array("id"=>$this->input->post("jobid")));
				if ($jobRow) {
					$editData = array(
						"invoiceid" => $this->input->post("invoiceid"),
						"jobid" => $this->input->post("jobid"),
						"lastchange" => time()
					);
					$invoiceUpdate = db_update("invoice",array("id"=>$this->input->post("id")),$editData);
					if ($invoiceUpdate) {
						$this->session->set_flashdata("successMsg","Invoice berhasil diperbaharui");
					} else {
						$this->session->set_flashdata("errorMsg","Invoice gagal diperbaharui");
					}
				} else {
					$this->session->set_flashdata("errorMsg","Job tidak valid");
				}
			} else {
				$this->session->set_flashdata("errorMsg","Invoice tidak ditemukan");
			}
		}
		redirect(base_url("invoice"),"refresh");
	}


	public function delete($id)
    {
        if($id==""){
            $this->session->set_flashdata("errorMsg","Invoice gagal dihapus");
            redirect('invoice');
        }else{
            $this->db->where('id', $id);
            $this->db->delete('invoice');
            $this->session->set_flashdata("successMsg","Invoice berhasil dihapus");
            redirect('invoice');
        }
    }
}