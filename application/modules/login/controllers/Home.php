<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

  function __construct(){
    parent::__construct();
    /*if($this->session->userdata('logged_in') !== TRUE){
      redirect('login/login');
    }*/
  }

  function index(){
    $this->load->view('template/home');
  }
    //Allowing akses to admin only
      /*if($this->session->userdata('level')==='1'){
        $this->load->view('template/header_view');
      }else{
          echo "Access Denied";
      }

  }

  function staffplus(){
    //Allowing akses to staffplus only
    if($this->session->userdata('level')==='2'){
      $this->load->view('template/dashboard_view');
    }else{
        echo "Access Denied";
    }
  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='3'){
      $this->load->view('template/dashboard_view');
    }else{
        echo "Access Denied";
    }
  }*/

}
