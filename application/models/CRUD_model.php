<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model{

 	public function GetWhere($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }

    public function Insert($table,$data){
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function angkatan($angkatan){ //gapakai kelas
        $kelas1=date('Y')-$angkatan; 
        $kelas2=date('Y')-$angkatan-1; 
        $bulan=date('m'); //cek bulan ke 7 apa bukan?
        if($bulan>6){
          if($kelas1==0) {
            $kelas ="X";
          } elseif($kelas1==1) {
            $kelas = "XI";
          } elseif($kelas1==2) {
            $kelas = "XII";
          } else {
            $kelas =''.$angkatan;
          }
        } else {
          if($kelas2==0) {
            $kelas = "X";
          } elseif($kelas2==1) {
            $kelas = "XI";
          } elseif($kelas2==2) {
            $kelas = "XII";
          } else {
            $kelas =''.$angkatan;
          }
        }
        return $kelas;
    }
    public function angkatan2($angkatan){ // pakai kelas
        $kelas1=date('Y')-$angkatan; 
        $kelas2=date('Y')-$angkatan-1; 
        $bulan=date('m'); //cek bulan ke 7 apa bukan?
        if($bulan>6){
          if($kelas1==0) {
            $kelas ="Kelas X";
          } elseif($kelas1==1) {
            $kelas = "Kelas XI";
          } elseif($kelas1==2) {
            $kelas = "Kelas XII";
          } else {
            $kelas ='Alumni '.$angkatan;
          }
        } else {
          if($kelas2==0) {
            $kelas = "Kelas X";
          } elseif($kelas2==1) {
            $kelas = "Kelas XI";
          } elseif($kelas2==2) {
            $kelas = "Kelas XII";
          } else {
            $kelas ='Alumni '.$angkatan;
          }
        }
        return $kelas;
    }
    public function count_angkatan($angkatan){
      $hasil = $this->db->where('angkatan', $angkatan)->count_all_results('siswa');
      return $hasil;
    }
    public function cekkelas($angkatan){
        $kelas1=date('Y')-$angkatan; 
        $kelas2=date('Y')-$angkatan-1; 
        $bulan=date('m'); //cek bulan ke 7 apa bukan?
        if($bulan>6){
          if($kelas1==0) {
            $kelas = 1;
          } elseif($kelas1==1) {
            $kelas = 2;
          } elseif($kelas1==2) {
            $kelas = 3;
          } else {
            $kelas = 4;
          }
        } else {
          if($kelas2==0) {
            $kelas = 1;
          } elseif($kelas2==1) {
            $kelas = 2;
          } elseif($kelas2==2) {
            $kelas = 3;
          } else {
            $kelas =4;
          }
        }
        return $kelas;
    }
    public function nominal_transaksi($id){
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+
        ) as nominal');
        $this->db->from('detail_pembayaran');
        $this->db->where('id', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function nominal_transaksi2($id){
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+kk1+
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+kk2+
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+kk3+
          tweak1+tweak2+tweak3
        ) as nominal');
        $this->db->from('detail_pembayaran');
        $this->db->where('id', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function total_kelas1($id){
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->or_where('id', $id); 
        $this->db->or_where('tahun_ajaran', $id); 
        return $this->db->get()->row()->nominal;
    }
    public function total_kelas2($id){
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->or_where('id', $id); 
        $this->db->or_where('tahun_ajaran', $id); 
        return $this->db->get()->row()->nominal;
    }
    public function total_kelas3($id){
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->or_where('id', $id); 
        $this->db->or_where('tahun_ajaran', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function angkatan_total_kelas1($angkatan){
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('angkatan', $angkatan); 
        return $this->db->get()->row()->nominal;
    }
    public function angkatan_total_kelas2($angkatan){
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('angkatan', $angkatan); 
        return $this->db->get()->row()->nominal;
    }
    public function angkatan_total_kelas3($angkatan){
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('angkatan', $angkatan); 
        return $this->db->get()->row()->nominal;
    }

    public function stotal_kelas1($id){
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id); 
        return $this->db->get()->row()->nominal;
    }
    public function stotal_kelas2($id){
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id); 
        return $this->db->get()->row()->nominal;
    }
    public function stotal_kelas3($id){
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function cek_lunas1($id_siswa,$angkatan){
        $plus1=$angkatan;
        $plus2=$angkatan+1;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
    public function cek_lunas2($id_siswa,$angkatan){
        $plus1=$angkatan+1;
        $plus2=$angkatan+2;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
    public function cek_lunas3($id_siswa,$angkatan){
        $plus1=$angkatan+2;
        $plus2=$angkatan+3;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }

    public function cek_lunas1v2($id_siswa,$angkatan){
        $plus1=$angkatan;
        $plus2=$angkatan+1;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+kk1+tweak1
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+as1+kop1+kk1+tweak1
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
    public function cek_lunas2v2($id_siswa,$angkatan){
        $plus1=$angkatan+1;
        $plus2=$angkatan+2;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+kk2+tweak2
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp2+ps2+pap2+osis2+psg2+uus2+un2+as2+kop2+kk2+tweak2
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
    public function cek_lunas3v2($id_siswa,$angkatan){
        $plus1=$angkatan+2;
        $plus2=$angkatan+3;
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+kk3+tweak3
        ) as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum(
          spp3+ps3+pap3+osis3+psg3+uus3+un3+as3+kop3+kk3+tweak3
        ) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
 
    public function pendapatanhari(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+kk1+as1+kop1+tweak1+
          spp2+ps2+pap2+osis2+psg2+uus2+un2+kk2+as2+kop2+tweak2+
          spp3+ps3+pap3+osis3+psg3+uus3+un3+kk3+as3+kop3+tweak3
        ) as total');
        $this->db->from('detail_pembayaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        return $this->db->get()->row()->total;
    }
    public function pendapatanbulan(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m");
        $this->db->select('sum(
          spp1+ps1+pap1+osis1+psg1+uus1+un1+kk1+as1+kop1+tweak1+
          spp2+ps2+pap2+osis2+psg2+uus2+un2+kk2+as2+kop2+tweak2+
          spp3+ps3+pap3+osis3+psg3+uus3+un3+kk3+as3+kop3+tweak3
        ) as total');
        $this->db->from('detail_pembayaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        return $this->db->get()->row()->total;
    }

    public function pendapatanlainhari(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $this->db->select('sum(nominal) as total');
        $this->db->from('pemasukan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        return $this->db->get()->row()->total;
    }
    public function pendapatanlainbulan(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m");
        $this->db->select('sum(nominal) as total');
        $this->db->from('pemasukan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        return $this->db->get()->row()->total;
    }

    public function pengeluaranhari(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $this->db->select('sum(nominal) as total');
        $this->db->from('pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        return $this->db->get()->row()->total;
    }
    public function pengeluaranbulan(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m");
        $this->db->select('sum(nominal) as total');
        $this->db->from('pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        return $this->db->get()->row()->total;
    }

    public function tahun_ajaran($angkatan,$i){
        $tahun_ini = $angkatan+$i; 
        $bulan=date('m'); //cek bulan ke 7 apa bukan?
        if($bulan>6){
          $plus1=$tahun_ini; 
          $plus2=$tahun_ini+1;
          $angkatan1=$tahun_ini;
          $angkatan2=$tahun_ini-1;
          $angkatan3=$tahun_ini-2;
          $tahun1=$plus1.'/'.$plus2; 
        } else {
          $plus1=$tahun_ini-1; 
          $plus2=$tahun_ini;
          $angkatan1=$tahun_ini-1;
          $angkatan2=$tahun_ini-2;
          $angkatan3=$tahun_ini-3;
          $tahun1=$plus1.'/'.$plus2; 
        }
        return $tahun1;
    }
    public function jurusan($id){
        $this->db->select('jurusan as jurusan');
        $this->db->from('jurusan');
        $this->db->where('id', $id); 
        return $this->db->get()->row()->jurusan;
    }

    public function cek_lunas($id_siswa,$angkatan,$kelas,$pembayaran){
      if ($kelas==1) {
        $plus1=$angkatan;
        $plus2=$angkatan+1;
      } elseif ($kelas==2) {
        $plus1=$angkatan+1;
        $plus2=$angkatan+2;
      } elseif ($kelas==3) {
        $plus1=$angkatan+2;
        $plus2=$angkatan+3;
      }
        
        $tahun_ajaran = $plus1.'/'.$plus2;
        $this->db->select('sum('.$pembayaran.$kelas.') as nominal');
        $this->db->from('pembayaran');
        $this->db->where('tahun_ajaran', $tahun_ajaran); 
        $total = $this->db->get()->row()->nominal;
        $this->db->select('sum('.$pembayaran.$kelas.') as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa); 
        $dibayar = $this->db->get()->row()->nominal;
        $hasil = $total-$dibayar;
        return $hasil;
    }
}
