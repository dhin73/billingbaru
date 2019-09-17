<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
Class Ganti extends BILLING_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
 
    public function index(){
        $view["gantikontakResult"] = db_query("SELECT id, domain, ticketid, status, keterangan, url, userid, lastchange date FROM gantikontak ORDER BY status DESC");
        $view["gantikontakPending"] = db_query("SELECT id, domain, ticketid, status, keterangan, url, userid, lastchange date FROM gantikontak WHERE `status`= 'Pending' ORDER BY date DESC");
        $view["status"]=db_query ("SELECT status FROM gantikontak");
        $this->load->view("ganti_view",$view);
    }
 
    public function add(){
        //cek data sudah ada atau belum
        $domain = strtolower($this->input->post('domain'));
        $cek = $this->db->query("SELECT domain FROM gantikontak WHERE domain = '$domain' AND status = 'Pending'");
        $cek_domain = $cek->num_rows();
        
        if ($cek_domain > 0){
            $this->session->set_flashdata("errorMsg","Ganti kontak tersebut sudah diinput dan masih proses, silakan update data");
            redirect(base_url("ganti"),"refresh");
        }
        else{
            //Hapus karakter tertentu
            $string_replace = array('#',',',';', '[', ']', '{', '}', '|', '^', '~','_');
            $ticketid = strtoupper(trim(str_replace($string_replace,'',$this->input->post("ticketid"))));
            
            if(strlen($ticketid) != 11){
                $this->session->set_flashdata("errorMsg","Input TicketID Tidak Sesuai");
            }else{
                if ($this->input->post("ticketid") && $this->input->post("domain")) {
                    $insertData = array(
                        "id" => $this->input->post("id"),
                        "date" => date("Y-m-d"),
                        "domain" => $domain,
                        "ticketid" => $ticketid,
                        "status" => $this->input->post("status"),
                        "keterangan" => $this->input->post("keterangan"),
                        "url" => $this->input->post("url"),
                        "userid" => $this->session->userdata("userid"),
                        "lastchange" => time()
                    );
                    $gantiInsert = db_create("gantikontak",$insertData);
                    if ($gantiInsert) {
                        $this->session->set_flashdata("successMsg","Data berhasil ditambahkan");
                    } else {
                        $this->session->set_flashdata("errorMsg","Data gagal ditambahkan");         
                    }
                }
            }
        }
        redirect(base_url("ganti"),"refresh");
    }
 
    /*public function edit()
    {
        if ($this->input->post("id") && $this->input->post("domain") && $this->input->post("ticketid")) {
            $gantikontakRow = db_read("gantikontak",array("id"=>$this->input->post("id")));
            if ($gantikontakRow) {
                    $editData = array(
                        "domain" => $this->input->post("domain"),
                        "ticketid" => $this->input->post("ticketid"),
                        "status" => $this->input->post("status"),
                        "keterangan" => $this->input->post("keterangan"),
                        "lastchange" => time()
                    );
                    $gantikontakUpdate = db_update("gantikontak",array("id"=>$this->input->post("id")),$editData);
                    if ($gantikontakUpdate) {
                        $this->session->set_flashdata("successMsg","Data berhasil diperbaharui");
                    } else {
                        $this->session->set_flashdata("errorMsg","Data gagal diperbaharui");
                    }
                } 
            else {
                $this->session->set_flashdata("errorMsg","Data tidak ditemukan");
            }
        }
        redirect(base_url("ganti"),"refresh");
    }*/

    public function edit() {
        if ($this->input->post("id") && $this->input->post("domain")) {
            $gantikontakRow = db_read("gantikontak",array("id"=>$this->input->post("id")));
            if ($gantikontakRow) {
                $editData = array(
                    "domain" => $this->input->post("domain"),
                    "status" => $this->input->post("status"),
                    "keterangan" => $this->input->post("keterangan"),
                    "lastchange" => time()
                );
                $gantikontakUpdate = db_update("gantikontak",array("id"=>$this->input->post("id")),$editData);
                if ($gantikontakUpdate) {
                    $this->session->set_flashdata("successMsg","Data berhasil diperbaharui");
                } else {
                    $this->session->set_flashdata("errorMsg","Data gagal diperbaharui");
                }
            } else {
                $this->session->set_flashdata("errorMsg","Data tidak ditemukan");
            }
        }
        redirect(base_url("ganti"),"refresh");
    }
 
    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('errorMsg',"Data Anda Gagal Di Hapus");
            redirect('ganti');
        }else{
            $this->db->where('id', $id);
            $this->db->delete('gantikontak');
            $this->session->set_flashdata('successMsg',"Data Berhasil Dihapus");
            redirect('ganti');
        }
    }
 
}