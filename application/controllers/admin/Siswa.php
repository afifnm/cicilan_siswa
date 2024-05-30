<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends MY_Controller
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


    public function angkatan($angkatan,$jurusan){
        $kelas = $this->CRUD_model->angkatan($angkatan);
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Siswa '.$kelas.' | '.$site['judul'],
            'site'                  => $site,
            'jurusan'               => $this->CRUD_model->jurusan($jurusan),
            'kelas'                 => $this->CRUD_model->cekkelas($angkatan),
            'angkatan'              => $angkatan
        );
        $this->db->select('*');
        $this->db->from('siswa a');
        $this->db->join('jurusan b', 'b.id = a.id_jurusan','left');
        $this->db->where('a.angkatan',$angkatan);
        $this->db->where('a.id_jurusan',$jurusan);
        $this->db->order_by('nis','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/siswa_index', array_merge($data,$data2));
    }

    public function pembayaran($id_siswa,$kelas,$tahun1,$tahun2){
        $tahun_ajaran = $tahun1.'/'.$tahun2;
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Pembayaran Siswa Tahun '.$tahun_ajaran.' | '.$site['judul'],
            'site'                  => $site,
            'tahun_ajaran'          => $tahun_ajaran,
            'kelas'                 => $kelas
        );
        $this->db->select('*')->from('siswa a')->join('jurusan b', 'b.id = a.id_jurusan','left');
        $this->db->where('a.id_siswa',$id_siswa);
        $siswa = $this->db->get()->result_array();
        $siswa = array('siswa' => $siswa);

        $this->db->select('*')->from('pembayaran');
        $this->db->where('tahun_ajaran',$tahun_ajaran);
        $pembayaran = $this->db->get()->result_array();
        $pembayaran = array('pembayaran' => $pembayaran);

        $this->template->load('layout/template', 'admin/siswa_pembayaran', array_merge($data,$siswa,$pembayaran));
    }
    public function transaksi($id_siswa){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Transaksi Pembayaran Siswa | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*')->from('siswa a')->join('jurusan b', 'b.id = a.id_jurusan','left');
        $this->db->where('a.id_siswa',$id_siswa);
        $siswa = $this->db->get()->result_array();
        $siswa = array('siswa' => $siswa);

        $this->db->select('*')->from('detail_pembayaran')->where('id_siswa',$id_siswa);
        $this->db->order_by('tanggal','DESC');
        $transaksi = $this->db->get()->result_array();
        $transaksi = array('transaksi' => $transaksi);
        $this->template->load('layout/template', 'admin/siswa_transaksi', array_merge($data,$siswa,$transaksi));
    }
    public function detail_transaksi($id,$id_siswa){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Detail Transaksi Pembayaran Siswa | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*')->from('siswa a')->join('jurusan b', 'b.id = a.id_jurusan','left');
        $this->db->where('a.id_siswa',$id_siswa);
        $siswa = $this->db->get()->result_array();
        $siswa = array('siswa' => $siswa);
        
        $this->db->select('*')->from('detail_pembayaran');
        $this->db->where('id',$id);
        $transaksi = $this->db->get()->result_array();
        $transaksi = array('transaksi' => $transaksi);

        $this->template->load('layout/template', 'admin/siswa_transaksi_detail', array_merge($data,$siswa,$transaksi));
    }
    public function laporan(){
        $tahun_ajaran = substr($this->input->get('tahun_ajaran'),0,9);
        $kelas = substr($this->input->get('tahun_ajaran'),10,1);
        $angkatan = $this->input->get('angkatan');
        $keterangan = $this->input->get('keterangan');
        $jurusan = $this->input->get('jurusan');
        $pembayaran = $this->input->get('pembayaran');

        if($pembayaran=='all'){
            $title = '';
        } elseif($pembayaran=='spp'){
            $title = 'SPP';
        } elseif($pembayaran=='ps'){
            $title = 'PS';
        } elseif($pembayaran=='pap'){
            $title = 'PAP';
        } elseif($pembayaran=='osis'){
            $title = 'OSIS';
        } elseif($pembayaran=='psg'){
            $title = 'PSG';
        } elseif($pembayaran=='uus'){
            $title = 'UUS';
        } elseif($pembayaran=='un'){
            $title = 'UN';
        } elseif($pembayaran=='tweak'){
            $title = 'TWEAK';
        } elseif($pembayaran=='kop'){
            $title = 'KOPERASI';
        } elseif($pembayaran=='as'){
            $title = 'ASURANSI';
        } elseif($pembayaran=='kk'){
            $title = 'KALENDER & KORBAN';
        }

        if($pembayaran=='all'){
            if($kelas==1){
                $tagihan = $this->CRUD_model->total_kelas1($tahun_ajaran);
            } elseif($kelas==2){
                $tagihan = $this->CRUD_model->total_kelas2($tahun_ajaran);
            } elseif($kelas==3){
                $tagihan = $this->CRUD_model->total_kelas3($tahun_ajaran);
            } 
        } else {
            $tagihan = $this->Laporan_model->sum_pembayaran($pembayaran,$kelas,$tahun_ajaran);
        }

        
        $x=$pembayaran.$kelas;
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Laporan Pembayaran | '.$site['judul'],
            'site'                  => $site,
            'title'                 => $title,
            'kelas'                 => $kelas,
            'angkatan'              => $angkatan,
            'jurusan'               => $jurusan,
            'tahun_ajaran'          => $tahun_ajaran,
            'pembayaran'            => $pembayaran,
            'tagihan'               => $tagihan
        );

        $this->db->select('*');
        if($pembayaran=='all'){
           if ($keterangan==1) {
                //lunas
                if($kelas==1){
                    $this->db->having('sum(spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+tweak1) >=',$tagihan);
                } elseif($kelas==2){
                    $this->db->having('sum(spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+tweak2) >=',$tagihan);
                } elseif($kelas==3){
                    $this->db->having('sum(spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+tweak3) >=',$tagihan);
                }
            } elseif ($keterangan==2) {
                //belum lunas
                if($kelas==1){
                    $this->db->having('sum(spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+tweak1) <',$tagihan);
                } elseif($kelas==2){
                    $this->db->having('sum(spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+tweak2) <',$tagihan);
                } elseif($kelas==3){
                    $this->db->having('sum(spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+tweak3) <',$tagihan);
                }
            } 
        } else {
            if ($keterangan==1) {
                //lunas
                $this->db->having('sum('.$x.') >=',$tagihan);
            } elseif ($keterangan==2) {
                //belum lunas
                $this->db->having('sum('.$x.') <',$tagihan);
            } 
        }
        
        $this->db->from('siswa');
        $this->db->where('angkatan',$angkatan);
        if($jurusan>0){
          $this->db->where('id_jurusan',$jurusan);  
        }
        $this->db->group_by('nis','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->load->view('admin/siswa_laporan', array_merge($data, $data2));
    }
    
    public function simpan($link){
        $data = array(
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'kelamin' => $this->input->post('kelamin'),
            'id_jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan')
         );  
        // $ceknisn = $this->db->where('nisn', $this->input->post('nisn'))->count_all_results('siswa');
        // if($ceknisn<>0){
        //     $this->session->set_flashdata('alert', '<p class="box-msg">
        //     <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        //     <div class="info-box-content" style="font-size:14">
        //     <b style="font-size: 20px">PERINGATAN</b><br>NISN yang anda masukan yaitu '.$this->input->post('nisn').' sudah digunakan. Silahkan coba lagi.</div></div></p> ');
        //     if($link==0){ redirect('admin/home'); } 
        //     else { redirect('admin/siswa/angkatan/'.$this->input->post('angkatan'));  }    
        // }
        $ceknis = $this->db->where('nis', $this->input->post('nis'))->count_all_results('siswa');
        if($ceknis<>0){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
            <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">PERINGATAN</b><br>NIS yang anda masukan yaitu '.$this->input->post('nis').' sudah digunakan. Silahkan coba lagi.</div></div></p> ');
            if($link==0){ redirect('admin/home'); } 
            else { redirect('admin/siswa/angkatan/'.$this->input->post('angkatan'));  }       
        }

        $this->CRUD_model->Insert('siswa', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Siswa baru, '.$this->input->post('nama').' telah ditambahkan.</div></div></p> ');
        if($link==0){ redirect('admin/home'); } 
        else { redirect('admin/siswa/angkatan/'.$this->input->post('angkatan'));  }      
    }
    public function updatedata(){
        $data = array(
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'kelamin' => $this->input->post('kelamin'),
            'id_jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan')
         );  
        // $ceknisn = $this->db->where('nisn', $this->input->post('nisn'))->count_all_results('siswa');
        // if(($ceknisn<>0) AND ($this->input->post('nisn')<>$this->input->post('nisn_lama'))){
        //     $this->session->set_flashdata('alert', '<p class="box-msg">
        //     <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        //     <div class="info-box-content" style="font-size:14">
        //     <b style="font-size: 20px">PERINGATAN</b><br>NISN yang anda masukan yaitu '.$this->input->post('nisn').' sudah digunakan. Silahkan coba lagi.</div></div></p> ');
        //     redirect('admin/siswa/editdata/'.$this->input->post('id'));    
        // }
        $ceknis = $this->db->where('nis', $this->input->post('nis'))->count_all_results('siswa');
        if(($ceknis<>0) AND ($this->input->post('nis')<>$this->input->post('nis_lama'))){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger"><div class="info-box-icon"><i class="fa fa-check"></i></div>
            <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">PERINGATAN</b><br>NIS yang anda masukan yaitu '.$this->input->post('nis').' sudah digunakan. Silahkan coba lagi.</div></div></p> ');
            redirect('admin/siswa/editdata/'.$this->input->post('id'));        
        }

        $where = array(
            'id_siswa' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('siswa', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Data siswa, '.$this->input->post('nama').' telah diperbarui.</div></div></p> ');
        redirect('admin/siswa/angkatan/'.$this->input->post('angkatan').'/'.$this->input->post('jurusan'));     
    }
    public function hapus($id,$angkatan,$jurusan){
        $where = array(
            'id_siswa' => $id
        );
        $this->CRUD_model->delete('siswa', $where);
        $this->CRUD_model->delete('detail_pembayaran', $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-info"><div class="info-box-icon"><i class="fa fa-info-circle"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">INFO</b><br> Data siswa telah dihapus.</div></div></p>');
        redirect('admin/siswa/angkatan/'.$angkatan.'/'.$jurusan);
    }
    public function editdata($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Siswa | '.$site['judul'],
        );
        $where = array('id_siswa' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'siswa')->result();
        $jurusan = $this->CRUD_model->GetWhere('jurusan');
        $jurusan = array('jurusan' => $jurusan);
        $this->template->load('layout/template', 'admin/siswa_edit', array_merge($data, $data2,$jurusan));
    }
    public function bayar(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("y-m-d");
        $kelas = $this->input->post('kelas');
        if($kelas==1){
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
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'id_siswa' => $this->input->post('id_siswa'),
            'tanggal' => $this->input->post('tanggal'),
            'uraian' => $this->input->post('uraian')
            ); 
        } elseif ($kelas==2) {
            $data = array(
            'spp2' => $this->input->post('spp2'),
            'ps2' => $this->input->post('ps2'),
            'pap2' => $this->input->post('pap2'),
            'osis2' => $this->input->post('osis2'),
            'psg2' => $this->input->post('psg2'),
            'uus2' => $this->input->post('uus2'),
            'un2' => $this->input->post('un2'),
            'as2' => $this->input->post('as2'),
            'kk2' => $this->input->post('kk2'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'id_siswa' => $this->input->post('id_siswa'),
            'tanggal' => $this->input->post('tanggal'),
            'uraian' => $this->input->post('uraian')
            ); 
        } elseif ($kelas==3) {
            $data = array(
            'spp3' => $this->input->post('spp3'),
            'ps3' => $this->input->post('ps3'),
            'pap3' => $this->input->post('pap3'),
            'osis3' => $this->input->post('osis3'),
            'uus3' => $this->input->post('uus3'),
            'un3' => $this->input->post('un3'),
            'tweak3' => $this->input->post('tweak3'),
            'kk3' => $this->input->post('kk3'),
            'as3' => $this->input->post('as3'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'id_siswa' => $this->input->post('id_siswa'),
            'tanggal' => $this->input->post('tanggal'),
            'uraian' => $this->input->post('uraian')
            ); 
        }
        // yang bawah buat database siswa
        if($kelas==1){
            $siswabayar = array(
            'spp1' => $this->input->post('spp1')+$this->input->post('spp1_lama'),
            'ps1' => $this->input->post('ps1')+$this->input->post('ps1_lama'),
            'pap1' => $this->input->post('pap1')+$this->input->post('pap1_lama'),
            'osis1' => $this->input->post('osis1')+$this->input->post('osis1_lama'),
            'psg1' => $this->input->post('psg1')+$this->input->post('psg1_lama'),
            'uus1' => $this->input->post('uus1')+$this->input->post('uus1_lama'),
            'kk1' => $this->input->post('kk1')+$this->input->post('kk1_lama'),
            'as1' => $this->input->post('as1')+$this->input->post('as1_lama'),
            'kop1' => $this->input->post('kop1')+$this->input->post('kop1_lama'),
            ); 
        } elseif ($kelas==2) {
            $siswabayar = array(
            'spp2' => $this->input->post('spp2')+$this->input->post('spp2_lama'),
            'ps2' => $this->input->post('ps2')+$this->input->post('ps2_lama'),
            'pap2' => $this->input->post('pap2')+$this->input->post('pap2_lama'),
            'osis2' => $this->input->post('osis2')+$this->input->post('osis2_lama'),
            'psg2' => $this->input->post('psg2')+$this->input->post('psg2_lama'),
            'uus2' => $this->input->post('uus2')+$this->input->post('uus2_lama'),
            'un2' => $this->input->post('un2')+$this->input->post('un2_lama'),
            'kk2' => $this->input->post('kk2')+$this->input->post('kk2_lama'),
            'as2' => $this->input->post('as2')+$this->input->post('as2_lama'),
            ); 
        } elseif ($kelas==3) {
            $siswabayar = array(
            'spp3' => $this->input->post('spp3')+$this->input->post('spp3_lama'),
            'ps3' => $this->input->post('ps3')+$this->input->post('ps3_lama'),
            'pap3' => $this->input->post('pap3')+$this->input->post('pap3_lama'),
            'osis3' => $this->input->post('osis3')+$this->input->post('osis3_lama'),
            'uus3' => $this->input->post('uus3')+$this->input->post('uus3_lama'),
            'un3' => $this->input->post('un3')+$this->input->post('un3_lama'),
            'tweak3' => $this->input->post('tweak3')+$this->input->post('tweak_lama3'),
            'kk3' => $this->input->post('kk3')+$this->input->post('kk3_lama'),
            'as3' => $this->input->post('as3')+$this->input->post('as3_lama'),
            ); 
        }
        $where = array(
            'id_siswa' => $this->input->post('id_siswa'),
        );
        $this->CRUD_model->Update('siswa', $siswabayar, $where);
        $this->CRUD_model->Insert('detail_pembayaran', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Transaksi pembayaran berhasil dilakukan.</div></div></p> ');
        redirect('admin/siswa/transaksi/'.$this->input->post('id_siswa'));       
    }
    public function batal_transaksi($id){
        $this->db->select('*')->from('detail_pembayaran')->where('id',$id);
        $transaksi = $this->db->get()->result_array();

        foreach ($transaksi as $u){
            $this->db->select('*')->from('siswa')->where('id_siswa',$u['id_siswa']);
            $siswa = $this->db->get()->result_array();
            foreach ($siswa as $uu){
                $data = array(
                    'spp1' => $uu['spp1']-$u['spp1'],
                    'ps1' => $uu['ps1']-$u['ps1'],
                    'pap1' => $uu['pap1']-$u['pap1'],
                    'osis1' => $uu['osis1']-$u['osis1'],
                    'psg1' => $uu['psg1']-$u['psg1'],
                    'uus1' => $uu['uus1']-$u['uus1'],
                    'kk1' => $uu['kk1']-$u['kk1'],
                    'as1' => $uu['as1']-$u['as1'],
                    'kop1' => $uu['kop1']-$u['kop1'],

                    'spp2' => $uu['spp2']-$u['spp2'],
                    'ps2' => $uu['ps2']-$u['ps2'],
                    'pap2' => $uu['pap2']-$u['pap2'],
                    'osis2' => $uu['osis2']-$u['osis2'],
                    'psg2' => $uu['psg2']-$u['psg2'],
                    'uus2' => $uu['uus2']-$u['uus2'],
                    'un2' => $uu['un2']-$u['un2'],
                    'kk2' => $uu['kk2']-$u['kk2'],
                    'as2' => $uu['as2']-$u['as2'],

                    'spp3' => $uu['spp3']-$u['spp3'],
                    'ps3' => $uu['ps3']-$u['ps3'],
                    'pap3' => $uu['pap3']-$u['pap3'],
                    'osis3' => $uu['osis3']-$u['osis3'],
                    'psg3' => $uu['psg3']-$u['psg3'],
                    'uus3' => $uu['uus3']-$u['uus3'],
                    'un3' => $uu['un3']-$u['un3'],
                    'kk3' => $uu['kk3']-$u['kk3'],
                    'as3' => $uu['as3']-$u['as3'],
                    'tweak3' => $uu['tweak3']-$u['tweak3'],
                    );
                $where = array('id_siswa' => $u['id_siswa']);
                $this->CRUD_model->Update('siswa', $data, $where);
                $where = array('id' => $id);
                $this->CRUD_model->delete('detail_pembayaran', $where);
                $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUCCESS</b><br>Transaksi pembayaran telah dihapus dilakukan.</div></div></p> ');
                redirect('admin/siswa/transaksi/'.$u['id_siswa']);  
            }
        }    
    }
    public function cetaknota($id,$id_siswa){

        $this->db->select('*')->from('siswa a')->join('jurusan b', 'b.id = a.id_jurusan','left');
        $this->db->where('a.id_siswa',$id_siswa);
        $siswa = $this->db->get()->result_array();
        $siswa = array('siswa' => $siswa);

        $this->db->select('*')->from('detail_pembayaran')->where('id',$id);
        $transaksi = $this->db->get()->result_array();
        $transaksi = array('transaksi' => $transaksi);
        $this->load->view('admin/siswa_cetaknota', array_merge($siswa,$transaksi));
    }
}
