<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Laporan_model');
        $this->load->library('Pdf');
        $this->check_login();
        if (($this->session->userdata('level') != "Admin") AND ($this->session->userdata('level') != "Front Office")) {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dashboard | '.$site['judul'],
            'site'                  => $site,
        );
        $jurusan = $this->CRUD_model->GetWhere('jurusan');
        $jurusan = array('jurusan' => $jurusan);
        $this->template->load('layout/template', 'admin/dashboard', array_merge($data,$jurusan));
    }
    public function laporan(){
        $pembayaran = $this->input->get('pembayaran');
        $data = array(
            'pembayaran'                  => $pembayaran,
        );
        $this->load->view('admin/dashboard_laporan',$data);
    }
}
 