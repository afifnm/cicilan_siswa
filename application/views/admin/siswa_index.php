<?php
  $tahun1 = $this->CRUD_model->tahun_ajaran($angkatan,0);
  $tahun2 = $this->CRUD_model->tahun_ajaran($angkatan,1);
  $tahun3 = $this->CRUD_model->tahun_ajaran($angkatan,2);
  $jur = $this->CRUD_model->GetWhere('jurusan');
?>
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li class="active">Data Siswa <?php echo $this->CRUD_model->angkatan2($angkatan); ?></li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Siswa <?php echo $this->CRUD_model->angkatan2($angkatan); ?> (<?php echo($jurusan); ?>)</h3>
      <a data-toggle="modal" data-target="#ModalPrint2" class="btn btn-danger pull-right" ><i class="fa fa-print"></i> Cetak Laporan</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>NIS</th>
          <th>NISN</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th style="text-align: center;">Pembayaran</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $u) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $u['nis']; ?></td>
        <td><?php echo $u['nisn']; ?></td>
        <td><?php echo $u['nama']; ?></td>
        <td><?php echo $u['kelas']; ?></td>
        <td align="center">

          <?php
            $kelas = $this->CRUD_model->cekkelas($u['angkatan']);
            $cek1 = $this->CRUD_model->cek_lunas1($u['id_siswa'],$u['angkatan']);
            $cek2 = $this->CRUD_model->cek_lunas2($u['id_siswa'],$u['angkatan']);
            $cek3 = $this->CRUD_model->cek_lunas3($u['id_siswa'],$u['angkatan']);
            $plus=$u['angkatan']+1;
            $cetak = $u['angkatan'].'/'.$plus;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$u['id_siswa'].'/1/'.$cetak);?>" 
            class="btn btn-<?php if($cek1<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php if($kelas>1) { 
            $plus1=$u['angkatan']+1;
            $plus2=$u['angkatan']+2;
            $cetak = $plus1.'/'.$plus2;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$u['id_siswa'].'/2/'.$cetak);?>" 
            class="btn btn-<?php if($cek2<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php } ?>
          <?php if($kelas>2) { 
            $plus1=$u['angkatan']+2;
            $plus2=$u['angkatan']+3;
            $cetak = $plus1.'/'.$plus2;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$u['id_siswa'].'/3/'.$cetak);?>"
            class="btn btn-<?php if($cek3<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php } ?>
          <a href="<?php echo site_url('admin/siswa/transaksi/'.$u['id_siswa']);?>" class="btn btn-success btn-sm"> <strong> TRANSAKSI </strong></a> 
    
        </td>

        <td align="center">
          <a href="<?php echo site_url('admin/siswa/editdata/'.$u['id_siswa']);?>" class="btn btn-warning btn-sm"> PERBARUI</a>  
          <button class="btn btn-default btn-sm">  
          <?php echo anchor('admin/siswa/hapus/'.$u['id_siswa'].'/'.$u['angkatan'].'/'.$u['id_jurusan'], 'HAPUS', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>      
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>
  <div class="modal fade" id="ModalPrint2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PEMBAYARAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/siswa/laporan');?>" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">Tahun Ajaran</label>
                <div class="col-sm-6">
                  <input type="hidden" name="angkatan" value="<?php echo($angkatan) ?>">
                  <select class="form-control" name="tahun_ajaran">
                    <?php if($kelas>2) { ?>
                      <option value="<?php echo $tahun3.'-3';?>"><?php echo($tahun3);?> - KELAS XII</option>
                    <?php } ?>
                    <?php if($kelas>1) { ?>
                      <option value="<?php echo $tahun2.'-2';?>"><?php echo($tahun2);?> - KELAS XI</option>
                    <?php } ?>
                    <option value="<?php echo $tahun1.'-1';?>"><?php echo($tahun1);?> - KELAS X</option>
                    
                  </select>  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Jurusan</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jurusan">
                    <option value="0">Semua Jurusan</option>
                    <?php foreach ($jur as $ii) { ?>
                      <option value="<?php echo($ii['id']) ?>"><?php echo($ii['jurusan']) ?></option>
                    <?php } ?>
                  </select>  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Keterangan</label>
                <div class="col-sm-6">
                  <select class="form-control" name="keterangan">
                    <option value="0">Semua</option>
                    <option value="1">Lunas</option>
                    <option value="2">Belum Lunas</option>
                  </select>  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Pembayaran</label>
                <div class="col-sm-6">
                  <select name="pembayaran" class="form-control">
                    <option value="all">Semua</option>
                    <option value="spp">SPP</option>
                    <option value="ps">PS</option>
                    <option value="pap">PAP</option>
                    <option value="osis">OSIS</option>
                    <option value="psg">PSG</option>
                    <option value="uus">UUS</option>
                    <option value="un">UN</option>
                    <option value="as">ASURANSI</option>
                    <option value="kop">KOPERASI</option>
                    <option value="tweak">TWEAK</option>
                    <option value="kk">KALENDER & KORBAN</option>
               
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
<script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus data siswa ini?')
  }
</script>