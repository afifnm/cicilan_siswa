<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nominal extends MY_Controller
{
    public function __construct(){
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
            'title'                 => 'Data Rincian Pembayaran | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->order_by('tahun_ajaran','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/nominal_index', array_merge($data,$data2));
    }

    public function laporan(){
        $limit = $this->input->get('limit');
        $this->db->select('*');
        $this->db->from('pembayaran');
        if ($limit=='1') {
            $this->db->limit(4,0);
        }  
        $this->db->order_by('tahun_ajaran','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->load->view('admin/nominal_laporan', $data2);
    }

    public function tambah(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tambah Rincian Pembayaran | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->order_by('tahun_ajaran','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/nominal_tambah', array_merge($data,$data2));
    }

    public function simpan(){
        $data = array(
            'spp1' => $this->input->post('spp1'),
            'ps1' => $this->input->post('ps1'),
            'pap1' => $this->input->post('pap1'),
            'osis1' => $this->input->post('osis1'),
            'psg1' => $this->input->post('psg1'),
            'uus1' => $this->input->post('uus1'),
            'kk1' => $this->input->post('kk1'),
            'as1' => $this->input->post('as1'),
            'kop1' => $this->input->post('kop1'),


            'spp2' => $this->input->post('spp2'),
            'ps2' => $this->input->post('ps2'),
            'pap2' => $this->input->post('pap2'),
            'osis2' => $this->input->post('osis2'),
            'psg2' => $this->input->post('psg2'),
            'uus2' => $this->input->post('uus2'),
            'un2' => $this->input->post('un2'),
            'kk2' => $this->input->post('kk2'),
            'kop2' => $this->input->post('kop2'),

            'spp3' => $this->input->post('spp3'),
            'ps3' => $this->input->post('ps3'),
            'pap3' => $this->input->post('pap3'),
            'osis3' => $this->input->post('osis3'),
            'uus3' => $this->input->post('uus3'),
            'un3' => $this->input->post('un3'),
            'kk3' => $this->input->post('kk3'),
            'kop3' => $this->input->post('kop3'),
            'tweak3' => $this->input->post('tweak3'),

            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            
         ); 
        $panjang = strlen($this->input->post('tahun_ajaran'));
        $cek = $this->db->where('tahun_ajaran', $this->input->post('tahun_ajaran'))->count_all_results('pembayaran');
        if($cek<>0){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
            <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">PERINGATAN</b><br>Tahun Ajaran yaitu '.$this->input->post('tahun_ajaran').' sudah ada. Silahkan coba lagi.</div></div></p> ');
            redirect('admin/nominal/tambah');      
        } elseif($panjang>9){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
            <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">PERINGATAN</b><br>Penulisan Tahun Ajaran yaitu '.$this->input->post('tahun_ajaran').' salah. Pastikan tanpa spasi.</div></div></p> ');
            redirect('admin/nominal/tambah');      
        } 
        $this->CRUD_model->Insert('pembayaran', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Rincian pembayaran tahun '.$this->input->post('tahun_ajaran').' telah ditambahkan.</div></div></p> ');
        redirect('admin/nominal');       
    }

    public function hapus($id){
        $where = array(
            'id' => $id
        );
        $data = $this->CRUD_model->delete('pembayaran', $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-info"><div class="info-box-icon"><i class="fa fa-info-circle"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">INFO</b><br> Data rincian pembayaran telah dihapus.</div></div></p>');
        redirect('admin/nominal/');
    }
    public function editdata($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Rincian Pembayaran | '.$site['judul'],
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'pembayaran')->result();
        $this->template->load('layout/template', 'admin/nominal_edit', array_merge($data, $data2));
    }
    public function updatedata(){   
        $where = array(
            'id' => $this->input->post('id')
        );
        $data = array(
            'spp1' => $this->input->post('spp1'),
            'ps1' => $this->input->post('ps1'),
            'pap1' => $this->input->post('pap1'),
            'osis1' => $this->input->post('osis1'),
            'psg1' => $this->input->post('psg1'),
            'uus1' => $this->input->post('uus1'),
            'kk1' => $this->input->post('kk1'),
            'as1' => $this->input->post('as1'),
            'kop1' => $this->input->post('kop1'),

            'spp2' => $this->input->post('spp2'),
            'ps2' => $this->input->post('ps2'),
            'pap2' => $this->input->post('pap2'),
            'osis2' => $this->input->post('osis2'),
            'psg2' => $this->input->post('psg2'),
            'uus2' => $this->input->post('uus2'),
            'un2' => $this->input->post('un2'),
            'kk2' => $this->input->post('kk2'),
            'as2' => $this->input->post('as2'),

            'spp3' => $this->input->post('spp3'),
            'ps3' => $this->input->post('ps3'),
            'pap3' => $this->input->post('pap3'),
            'osis3' => $this->input->post('osis3'),
            'uus3' => $this->input->post('uus3'),
            'un3' => $this->input->post('un3'),
            'kk3' => $this->input->post('kk3'),
            'as3' => $this->input->post('as3'),
            'tweak3' => $this->input->post('tweak3'),
         );  
        $data = $this->CRUD_model->Update('pembayaran', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-info"><div class="info-box-icon"><i class="fa fa-info-circle"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Rincian pembayaran tahun '.$this->input->post('tahun_ajaran').' telah diperbarui.</div></div></p> ');
        redirect('admin/nominal/');
    }
}
