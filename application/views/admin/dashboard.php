<?php 
  date_default_timezone_set("Asia/Jakarta");
  $jam = date("H:i");
  $tanggal = date("y-m-d");
  $hari = date('l'); if($hari=='Monday'){$indo='Senin';}
  if($hari=='Tuesday'){$indo='Selasa';}if($hari=='Wednesday'){$indo='Rabu';}
  if($hari=='Thursday'){$indo='Kamis';}if($hari=='Friday'){$indo='Jumat';}
  if($hari=='Saturday'){$indo='Sabtu';}if($hari=='Sunday'){$indo='Minggu';}
  if(date('m')>6){
    $kelas_x = $this->db->where('angkatan', date('Y'))->count_all_results('siswa');
    $kelas_xi = $this->db->where('angkatan', date('Y')-1)->count_all_results('siswa');
    $kelas_xii = $this->db->where('angkatan', date('Y')-2)->count_all_results('siswa');
  } else {
    $kelas_x = $this->db->where('angkatan', date('Y')-1-1)->count_all_results('siswa');
    $kelas_xi = $this->db->where('angkatan', date('Y')-1-1)->count_all_results('siswa');
    $kelas_xii = $this->db->where('angkatan', date('Y')-2-1)->count_all_results('siswa');
  }
  
?> 
<ol class="breadcrumb" style="margin-bottom: 0px; padding-bottom: 0px;">
  <li><a href="<?php date_default_timezone_set("Asia/Jakarta"); echo site_url();?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
</ol> 
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
	<h3 align="left"> 
  <small>Anda login sebagai <?php echo $this->session->userdata('level') ?> (<?php echo $this->session->userdata('nama') ?>)</small></h3>  
</div>
<div class="row">
  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>&nbsp;&nbsp;&nbsp;<?php echo($kelas_x); ?></h3>
      </div>
      <div class="icon">
        X &nbsp;
      </div>
      <a data-toggle="modal" data-target="#ModalPlus" class="small-box-footer">Tambah Siswa &nbsp; <i class="fa fa-plus-circle"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>&nbsp;&nbsp;&nbsp;<?php echo($kelas_xi); ?></h3>
      </div>
      <div class="icon">
        XI &nbsp;
      </div>
      <a data-toggle="modal" data-target="#ModalPlus" class="small-box-footer">Tambah Siswa &nbsp; <i class="fa fa-plus-circle"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
       <h3>&nbsp;&nbsp;&nbsp;<?php echo($kelas_xii); ?></h3>
      </div>
      <div class="icon">
        XII &nbsp;
      </div>
      <a data-toggle="modal" data-target="#ModalPlus" class="small-box-footer">Tambah Siswa &nbsp; <i class="fa fa-plus-circle"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title" style="text-align: center;">LAPORAN PEMBAYARAN</h3>
        <a data-toggle="modal" data-target="#ModalPrint" class="btn btn-danger pull-right" ><i class="fa fa-print"></i></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-sm-6 col-xs-12">
          <table class="table table-striped">
            <tbody>
            <tr>
              <td colspan="6" style="text-align: center; font-size: 18px;">
                TAHUN AJARAN 
                <?php 
                $tahun_ini = date('Y'); 
                  $bulan=date('m'); //cek bulan ke 7 apa bukan?
                  if($bulan>6){
                    $plus1=$tahun_ini; 
                    $plus2=$tahun_ini+1;
                    $angkatan1=$tahun_ini;
                    $angkatan2=$tahun_ini-1;
                    $angkatan3=$tahun_ini-2;
                    $tahun=$plus1.'/'.$plus2; 
                  } else {
                    $plus1=$tahun_ini-1; 
                    $plus2=$tahun_ini;
                    $angkatan1=$tahun_ini-1;
                    $angkatan2=$tahun_ini-2;
                    $angkatan3=$tahun_ini-3;
                    $tahun=$plus1.'/'.$plus2; 
                  }
                  echo $tahun;
                  ?>  
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">-</td>
              <td style="text-align: center;">JUMLAH</td>
              <td style="text-align: center;">TAGIHAN</td>
              <td style="text-align: center;">TOTAL TAGIHAN</td>
              <td style="text-align: center;">TOTAL DIBAYAR</td>
              <td style="text-align: center;">TOTAL SISA TAGIHAN</td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan1); ?></td>
              <td style="text-align: center;"><?php echo $count1=$this->CRUD_model->count_angkatan($angkatan1); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total1=$this->CRUD_model->total_kelas1($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1=$count1*$total1,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar1=$this->CRUD_model->angkatan_total_kelas1($angkatan1),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1-$dibayar1,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan2); ?></td>
              <td style="text-align: center;"><?php echo $count2=$this->CRUD_model->count_angkatan($angkatan2); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total2=$this->CRUD_model->total_kelas2($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total2=$count2*$total2,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar2=$this->CRUD_model->angkatan_total_kelas2($angkatan2),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total2-$dibayar2,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan3); ?></td>
              <td style="text-align: center;"><?php echo $count3=$this->CRUD_model->count_angkatan($angkatan3); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total3=$this->CRUD_model->total_kelas3($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total3=$count3*$total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar3=$this->CRUD_model->angkatan_total_kelas3($angkatan3),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total3-$dibayar3,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;">-</td>
              <td style="text-align: center;"><?php echo $count1+$count2+$count3 ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total1+$total2+$total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1+$sub_total2+$sub_total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar1+$dibayar2+$dibayar3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1+$sub_total2+$sub_total3-$dibayar1-$dibayar2-$dibayar3,0,".",","); ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6 col-xs-12">
          <table class="table table-striped">
            <tbody>
            <tr>
              <td colspan="6" style="text-align: center; font-size: 18px;">
                TAHUN AJARAN 
                <?php 
                $tahun_ini = date('Y')-1; 
                  $bulan=date('m'); //cek bulan ke 7 apa bukan?
                  if($bulan>6){
                    $plus1=$tahun_ini; 
                    $plus2=$tahun_ini+1;
                    $angkatan1=$tahun_ini;
                    $angkatan2=$tahun_ini-1;
                    $angkatan3=$tahun_ini-2;
                    $tahun=$plus1.'/'.$plus2; 
                  } else {
                    $plus1=$tahun_ini-1; 
                    $plus2=$tahun_ini;
                    $angkatan1=$tahun_ini-1;
                    $angkatan2=$tahun_ini-2;
                    $angkatan3=$tahun_ini-3;
                    $tahun=$plus1.'/'.$plus2; 
                  }
                  echo $tahun;
                  ?>  
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">-</td>
              <td style="text-align: center;">JUMLAH</td>
              <td style="text-align: center;">TAGIHAN</td>
              <td style="text-align: center;">TOTAL TAGIHAN</td>
              <td style="text-align: center;">TOTAL DIBAYAR</td>
              <td style="text-align: center;">TOTAL SISA TAGIHAN</td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan1); ?></td>
              <td style="text-align: center;"><?php echo $count1=$this->CRUD_model->count_angkatan($angkatan1); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total1=$this->CRUD_model->total_kelas1($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1=$count1*$total1,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar1=$this->CRUD_model->angkatan_total_kelas1($angkatan1),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1-$dibayar1,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan2); ?></td>
              <td style="text-align: center;"><?php echo $count2=$this->CRUD_model->count_angkatan($angkatan2); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total2=$this->CRUD_model->total_kelas2($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total2=$count2*$total2,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar2=$this->CRUD_model->angkatan_total_kelas2($angkatan2),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total2-$dibayar2,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;"><?php echo $this->CRUD_model->angkatan($angkatan3); ?></td>
              <td style="text-align: center;"><?php echo $count3=$this->CRUD_model->count_angkatan($angkatan3); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total3=$this->CRUD_model->total_kelas3($tahun),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total3=$count3*$total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar3=$this->CRUD_model->angkatan_total_kelas3($angkatan3),0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total3-$dibayar3,0,".",","); ?></td>
            </tr>
            <tr>
              <td style="text-align: center;">-</td>
              <td style="text-align: center;"><?php echo $count1+$count2+$count3 ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($total1+$total2+$total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1+$sub_total2+$sub_total3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($dibayar1+$dibayar2+$dibayar3,0,".",","); ?></td>
              <td style="text-align: center;">Rp. <?php echo number_format($sub_total1+$sub_total2+$sub_total3-$dibayar1-$dibayar2-$dibayar3,0,".",","); ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.row -->
      </div>
      <!-- ./box-body -->
      <div class="box-footer">
        <!-- /.row -->
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
          <div class="col-sm-4 col-xs-6">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td colspan="2" style="text-align: center; font-size: 18px;">PEMASUKAN PENGEMBANGAN SEKOLAH
                    <a data-toggle="modal" data-target="#ModalPrintPemasukan" class="btn btn-danger pull-right" ><i class="fa fa-print"></i></a>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: center;">HARI INI</td>
                  <td style="text-align: center;">BULAN INI</td>
                </tr>
                <tr>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pendapatanhari(),0,".",","); ?></td>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pendapatanbulan(),0,".",","); ?></td>
                </tr>
                </tbody>
              </table>
          </div>
          <div class="col-sm-4 col-xs-6">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td colspan="2" style="text-align: center; font-size: 18px;">PEMASUKAN LAIN
                    <a data-toggle="modal" data-target="#ModalPrintPengeluaran2" class="btn btn-danger pull-right" ><i class="fa fa-print"></i></a>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: center;">HARI INI</td>
                  <td style="text-align: center;">BULAN INI</td>
                </tr>
                <tr>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pendapatanlainhari(),0,".",","); ?></td>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pendapatanlainbulan(),0,".",","); ?></td>
                </tr>
                </tbody>
              </table>
          </div>
          <div class="col-sm-4 col-xs-6">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td colspan="2" style="text-align: center; font-size: 18px;">PENGELUARAN
                    <a data-toggle="modal" data-target="#ModalPrintPengeluaran" class="btn btn-danger pull-right" ><i class="fa fa-print"></i></a>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: center;">HARI INI</td>
                  <td style="text-align: center;">BULAN INI</td>
                </tr>
                <tr>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pengeluaranhari(),0,".",","); ?></td>
                  <td style="text-align: center;">Rp. <?php echo number_format($this->CRUD_model->pengeluaranbulan(),0,".",","); ?></td>
                </tr>
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="ModalPlus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">TAMBAH DATA SISWA BARU
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/siswa/simpan/0');?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">NIS (Nomor Induk Sekolah)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nis" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">NISN (Nomor Induk Siswa Nasional)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nisn">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Nama Lengkap Siswa</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                  <select class="form-control select" name="kelamin">
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <label class="col-sm-4 control-label">Jurusan</label>
                <div class="col-sm-4">
                  <select class="form-control select" name="jurusan">
                    <?php foreach ($jurusan as $u) {?>
                  <option value="<?php echo $u['id'] ?>">
                    <?php echo $u['jurusan']; ?>
                  </option>
                    <?php } ?>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <label class="col-sm-4 control-label">Kelas</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="kelas" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Angkatan</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" name="angkatan" required>
                </div>
              </div> 

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Simpan</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>


      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalPrintPengeluaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PENGELUARAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/pengeluaran/laporan');?>" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Awal</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal1" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Berakhir</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal2" required>
                </div>
              </div> 
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Print</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalPrintPengeluaran2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PEMASUKAN LAIN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/pemasukan/laporan');?>" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Awal</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal1" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Berakhir</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal2" required>
                </div>
              </div> 
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Print</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="ModalPrintPemasukan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PEMASUKAN PENGEMBANGAN SEKOLAH
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/pengeluaran/laporan2');?>" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Awal</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal1" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Berakhir</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal2" required>
                </div>
              </div> 
              <div class="form-group">
                <label class="col-sm-3 control-label">Pembayaran</label>
                <div class="col-sm-8">
                  <select name="pembayaran" class="form-control">
                    <option value="all">Semua</option>
                    <option value="spp">SPP</option>
                    <option value="ps">PS</option>
                    <option value="pap">PAP</option>
                    <option value="osis">OSIS</option>
                    <option value="psg">PSG</option>
                    <option value="uus">UUS</option>
                    <option value="un">UN</option>
                    <option value="as">Asuransi</option>
                    <option value="kop">Koperasi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Print</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalPrint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PEMBAYARAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/home/laporan');?>" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <div class="col-sm-12">
                  <select name="pembayaran" class="form-control">
                    <option value="all">Semua</option>
                    <option value="spp">SPP</option>
                    <option value="ps">PS</option>
                    <option value="pap">PAP</option>
                    <option value="osis">OSIS</option>
                    <option value="psg">PSG</option>
                    <option value="uus">UUS</option>
                    <option value="un">UN</option>
                    <option value="as">Asuransi</option>
                    <option value="kop">Koperasi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Print</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>