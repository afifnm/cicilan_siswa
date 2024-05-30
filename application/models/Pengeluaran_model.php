<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model{

    public function pengeluaran($jenis){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m");
        $this->db->select('*');
        $this->db->from('pengeluaran a');
        $this->db->join('supplier b', 'b.id_sup = a.id_sup','left');
        $this->db->where("DATE_FORMAT(a.tanggal,'%Y-%m')", $tanggal);
        $this->db->where("a.jenis", $jenis);
        $this->db->order_by('a.tanggal','DESC');
        return $this->db->get()->result_array();
    }

    public function pengeluaran2($jenis){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m");
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        $this->db->where("jenis", $jenis);
        $this->db->order_by('tanggal','DESC');
        return $this->db->get()->result_array();
    }

    public function laporan_pengeluaran($jenis,$tanggal1,$tanggal2){
        $this->db->select('*');
        $this->db->from('pengeluaran a');
        $this->db->join('supplier b', 'b.id_sup = a.id_sup','left');
        $this->db->where('a.tanggal <=', $tanggal2);
        $this->db->where('a.tanggal >=', $tanggal1); 
        $this->db->where("a.jenis", $jenis);
        $this->db->order_by('a.tanggal','ASC');
        return $this->db->get()->result_array();
    }

    public function laporan_pengeluaran2($jenis,$tanggal1,$tanggal2){
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <=', $tanggal2);
        $this->db->where('tanggal >=', $tanggal1); 
        $this->db->where("jenis", $jenis);
        $this->db->order_by('tanggal','ASC');
        return $this->db->get()->result_array();
    }

    public function laporan($tanggal1,$tanggal2){
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <=', $tanggal2);
        $this->db->where('tanggal >=', $tanggal1); 
        $this->db->order_by('tanggal','ASC');
        return $this->db->get()->result_array();
    }

//--------------------------------------------------------------------------

    public function pendapatan_cash($tanggal1,$tanggal2){
        $this->db->select('sum(nominal) as total');
        $this->db->from('detail_piutang');
        $this->db->where('tanggal <=', $tanggal2);
        $this->db->where('tanggal >=', $tanggal1); 
        $this->db->where("pembayaran", 'Tunai');
        return $this->db->get()->row()->total;
    }

    public function pendapatan_tf($tanggal1,$tanggal2){
        $this->db->select('sum(nominal) as total');
        $this->db->from('detail_piutang');
        $this->db->where('tanggal <=', $tanggal2);
        $this->db->where('tanggal >=', $tanggal1); 
        $this->db->where("pembayaran !=", 'Tunai');
        return $this->db->get()->row()->total;
    }

//--------------------------------------------------------------------------

    public function pengeluaran_b4($tanggal1){
        $this->db->select('sum(qty*harga) as total');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <', $tanggal1); 
        $this->db->where('pembayaran', 'Tunai'); 
        $this->db->group_start();
        $this->db->or_where("jenis", 'DIGITAL');
        $this->db->or_where("jenis", 'OFFSET');
        $this->db->or_where("jenis", 'MERCHANDISE');
        $this->db->or_where("jenis", 'RUMAH TANGGA');
        $this->db->or_where("jenis", 'PRIVE');
        $this->db->group_end();
        return $this->db->get()->row()->total;
    }

    public function pengeluaran_b4_bank($tanggal1){
        $this->db->select('sum(qty*harga) as total');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <', $tanggal1); 
        $this->db->where('pembayaran', 'Bank'); 
        $this->db->group_start();
        $this->db->or_where("jenis", 'DIGITAL');
        $this->db->or_where("jenis", 'OFFSET');
        $this->db->or_where("jenis", 'MERCHANDISE');
        $this->db->or_where("jenis", 'RUMAH TANGGA');
        $this->db->or_where("jenis", 'PRIVE');
        $this->db->group_end();
         return $this->db->get()->row()->total;
    }
    public function pendapatan_b4($tanggal1){
        $this->db->select('sum(qty*harga) as total');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <', $tanggal1); 
        $this->db->where('pembayaran', 'Tunai'); 
        $this->db->where("jenis", 'PENDAPATAN');
        return $this->db->get()->row()->total;
    }
    public function pendapatan_b4_bank($tanggal1){
        $this->db->select('sum(qty*harga) as total');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal <', $tanggal1); 
        $this->db->where('pembayaran', 'Bank'); 
        $this->db->where("jenis", 'PENDAPATAN');
        return $this->db->get()->row()->total;
    }

  

}
