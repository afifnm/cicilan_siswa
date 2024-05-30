<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Pengeluaran_model');
        $this->load->model('Auth_model');
        $this->load->library('Pdf');
        $this->check_login();
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }

    public function laporan(){
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Laporan Pemasukan | '.$site['judul'],
            'site'                  => $site,
            'tanggal1'              => $tanggal1,
            'tanggal2'              => $tanggal2
        );
        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->where('tanggal >=',$tanggal1);
        $this->db->where('tanggal <=',$tanggal2);
        $this->db->order_by('tanggal','ASC');
        $data4 = $this->db->get()->result_array();
        $data4 = array('data4' => $data4); 
        $this->load->view('admin/pemasukan_laporan', array_merge($data, $data4));
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Pemasukan Sekolah | '.$site['judul'],
            'site'                  => $site
        );

        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->order_by('tanggal','DESC');
        $data4 = $this->db->get()->result_array();
        $data4 = array('data4' => $data4); 
        $this->template->load('layout/template', 'admin/pemasukan_index', array_merge($data, $data4));
    }

    public function input(){
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal')
         );  
        $this->CRUD_model->Insert('pemasukan', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg"><div class="info-box alert-success">
        <div class="info-box-icon"><i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Pemasukan, '.$this->input->post('keterangan').' telah ditambahkan.</div>
        </div></p>');
        redirect('admin/pemasukan');       
    }
    public function hapus($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('pemasukan', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-info"><div class="info-box-icon"><i class="fa fa-info-circle"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">INFO</b><br> Pemasukan telah dihapus.</div></div></p>');
        redirect('admin/pemasukan');
    }




}