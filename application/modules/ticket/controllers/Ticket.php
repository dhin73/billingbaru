<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Ticket extends BILLING_Controller {

    public function index() {
        $view["ticketResult"] = db_query("SELECT `ticket`.`id`,`date`,`userid`,`ticketid`,`jobid`,`lastchange`,`job`,`point` FROM ticket JOIN ticketjob ON `ticket`.`jobid` = `ticketjob`.`id` WHERE `userid`={$this->session->userdata('userid')} AND `date`='".date("Y-m-d")."'");
        $ticketTotal = db_query("SELECT SUM(`point`) AS total FROM ticket JOIN ticketjob ON `ticket`.`jobid` = `ticketjob`.`id` WHERE `userid`={$this->session->userdata('userid')} AND `date`='".date("Y-m-d")."'");
        $view["ticketTotal"] = isset($ticketTotal[0]->total) ? $ticketTotal[0]->total : 0;
        $view["ticketjobResult"] = db_reads("ticketjob");
        $this->load->view("ticket_view",$view);
    }

    public function job() {
        $view["jobResult"] = db_reads("ticketjob");
        $this->load->view("job_view",$view);
    }

    public function add() {
        if ($this->input->post("ticketid") && $this->input->post("jobid")) {
            $jobRow = db_read("ticketjob",array("id"=>$this->input->post("jobid")));
            $string_replace = array('#',',',';', '[', ']', '{', '}', '|', '^', '~','_');
            $ticketid = strtoupper(trim(str_replace($string_replace,'',$this->input->post("ticketid"))));

            if(strlen($ticketid) != 11){
                $this->session->set_flashdata("errorMsg","Input Data Tidak Sesuai");
            }else{
            
                if ($jobRow) {
                    $insertData = array(
                        "ticketid" => $ticketid,
                        "userid" => $this->session->userdata("userid"),
                        "jobid" => $jobRow->id,
                        "date" => date("Y-m-d"),
                        "lastchange" => time()
                    );
                    $ticketInsert = db_create("ticket",$insertData);
                    if ($ticketInsert) {
                        $this->session->set_flashdata("successMsg","Ticket berhasil ditambahkan");
                    } else {
                        $this->session->set_flashdata("errorMsg","Ticket gagal ditambahkan");
                    }
                } else {
                    $this->session->set_flashdata("errorMsg","Job tidak valid");
                }
            }
        }
        redirect(base_url("ticket"),"refresh");
    }

    public function edit() {
        if ($this->input->post("id") && $this->input->post("ticketid") && $this->input->post("jobid")) {
            $ticketRow = db_read("ticket",array("id"=>$this->input->post("id")));
            if ($ticketRow) {
                $jobRow = db_read("ticketjob",array("id"=>$this->input->post("jobid")));
                if ($jobRow) {
                    $editData = array(
                        "ticketid" => $this->input->post("ticketid"),
                        "jobid" => $this->input->post("jobid"),
                        "lastchange" => time()
                    );
                    $ticketUpdate = db_update("ticket",array("id"=>$this->input->post("id")),$editData);
                    if ($ticketUpdate) {
                        $this->session->set_flashdata("successMsg","Ticket berhasil diperbaharui");
                    } else {
                        $this->session->set_flashdata("errorMsg","Ticket gagal diperbaharui");
                    }
                } else {
                    $this->session->set_flashdata("errorMsg","Job tidak valid");
                }
            } else {
                $this->session->set_flashdata("errorMsg","Ticket tidak ditemukan");
            }
        }
        redirect(base_url("ticket"),"refresh");
    }

    public function editjob() {
        if ($this->input->post("id") && $this->input->post("job")) {
            $ticketjobRow = db_read("gantikontak",array("id"=>$this->input->post("id")));
            if ($ticketjobRow) {
                    $editData = array(
                        "job" => $this->input->post("job"),
                        "point" => $this->input->post("point")
                    );
                    $ticketjobUpdate = db_update("ticketjob",array("id"=>$this->input->post("id")),$editData);
                    if ($ticketjobUpdate) {
                        $this->session->set_flashdata("successMsg","Data berhasil diperbaharui");
                    } else {
                        $this->session->set_flashdata("errorMsg","Data gagal diperbaharui");
                    }
                } 
            else {
                $this->session->set_flashdata("errorMsg","Data tidak ditemukan");
            }
        }
        redirect(base_url("ticket"),"refresh");
    }

    public function delete($id)
    {
        if($id==""){
            $this->session->set_flashdata("errorMsg","Ticket gagal dihapus");
            redirect('ticket');
        }else{
            $this->db->where('id', $id);
            $this->db->delete('ticket');
            $this->session->set_flashdata("successMsg","Ticket berhasil dihapus");
            redirect('ticket');
        }
    }
}