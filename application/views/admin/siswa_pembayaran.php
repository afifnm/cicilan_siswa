<?php foreach ($siswa as $siswa) { ?>  
<?php foreach ($pembayaran as $pembayaran) { ?>  
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/siswa/angkatan/'.$siswa['angkatan'].'/'.$siswa['id_jurusan']);?>">Data Siswa <?php echo($this->CRUD_model->angkatan($siswa['angkatan'])); ?></a></li>
    <li class="active">Pembayaran Tahun <?php echo $tahun_ajaran; ?></li>
    <li class="active"> <?php echo $siswa['nama']; ?></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <div class="col-md-12">
        <table border="0">
          <tr> 
            <td> NISN </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['nisn']; ?> </td>
          </tr>
          <tr> 
            <td> NIS </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['nis']; ?> </td>
          </tr>
          <tr> 
            <td> Nama Siswa </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['nama']; ?> </td>
          </tr>
          <tr> 
            <td> Jenis Kelamin </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['kelamin']; ?> </td>
          </tr>
          <tr> 
            <td> Kelas </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php if($this->CRUD_model->cekkelas($siswa['angkatan'])==1){ echo "X"; } 
            elseif ($this->CRUD_model->cekkelas($siswa['angkatan'])==2) {
              echo "XI";
            } elseif ($this->CRUD_model->cekkelas($siswa['angkatan'])==3) {
              echo "XII";
            } else {
              echo "Alumni";
            } ?>  <?php echo $siswa['kelas']; ?>
            </td>
          </tr>
          <tr> 
            <td> Jurusan </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['jurusan']; ?> </td>
          </tr>
        </table>
        <hr>
      </div>
      <div class="col-md-7">
        <table class="table table-bordered table-hover">
          <tr>
            <td align="center"> <b>-</b> </td> 
            <td align="center" width="27%"> <b>Sudah Dibayar</b> </td> 
            <td align="center" width="27%"> <b>Tagihan Thn. <?php echo $tahun_ajaran; ?></b> </td> 
            <td align="center" width="27%"> <b>Sisa Tagihan</b> </td> 
          </tr>
        <?php if($kelas==1) { ?>
          <tr>
            <td> SPP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['spp1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp1']-$siswa['spp1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['ps1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps1']-$siswa['ps1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['pap1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap1']-$siswa['pap1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['osis1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis1']-$siswa['osis1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PSG </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['psg1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['psg1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['psg1']-$siswa['psg1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['uus1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus1']-$siswa['uus1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['as1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as1']-$siswa['as1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> KOPERASI </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['kop1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kop1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kop1']-$siswa['kop1'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> <strong>JUMLAH TOTAL  </td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->stotal_kelas1($siswa['id_siswa']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas1($pembayaran['id']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format(
              $this->CRUD_model->total_kelas1($pembayaran['id'])-$this->CRUD_model->stotal_kelas1($siswa['id_siswa']),0,",","."); ?></td>
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['kk1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk1'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk1']-$siswa['kk1'],0,",","."); ?></td>
          </tr>
        <?php } ?>
        <?php if($kelas==2) { ?>
          <tr>
            <td> SPP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['spp2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp2']-$siswa['spp2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['ps2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps2']-$siswa['ps2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['pap2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap2']-$siswa['pap2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['osis2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis2']-$siswa['osis2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PSG </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['psg2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['psg2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['psg2']-$siswa['psg2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['uus2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus2']-$siswa['uus2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> UN </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['un2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['un2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['un2']-$siswa['un2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['as2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as2']-$siswa['as2'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> <strong>JUMLAH TOTAL </td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->stotal_kelas2($siswa['id_siswa']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas2($pembayaran['id']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format(
              $this->CRUD_model->total_kelas2($pembayaran['id'])-$this->CRUD_model->stotal_kelas2($siswa['id_siswa']),0,",","."); ?></td>
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['kk2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk2'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk2']-$siswa['kk2'],0,",","."); ?></td>
          </tr>
        <?php } ?>
        <?php if($kelas==3) { ?>
          <tr>
            <td> SPP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['spp3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['spp3']-$siswa['spp3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['ps3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['ps3']-$siswa['ps3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['pap3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['pap3']-$siswa['pap3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['osis3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['osis3']-$siswa['osis3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['uus3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['uus3']-$siswa['uus3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> UN </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['un3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['un3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['un3']-$siswa['un3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['as3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['as3']-$siswa['as3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> TWEAK </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['tweak3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['tweak3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['tweak3']-$siswa['tweak3'],0,",","."); ?></td>
          </tr>
          <tr>
            <td> <strong>JUMLAH TOTAL  </td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->stotal_kelas3($siswa['id_siswa']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas3($pembayaran['id']),0,",","."); ?></td>
            <td align="right"><strong><?php echo 'Rp. '.number_format(
              $this->CRUD_model->total_kelas3($pembayaran['id'])-$this->CRUD_model->stotal_kelas3($siswa['id_siswa']),0,",","."); ?></td>
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><?php echo 'Rp. '.number_format($siswa['kk3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk3'],0,",","."); ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($pembayaran['kk3']-$siswa['kk3'],0,",","."); ?></td>
          </tr>
          

        <?php } ?>
        </table>
        
      </div>
 <!-- PEMBATAS                                 -->
  <?php 
  $cek1 = $this->CRUD_model->cek_lunas1v2($siswa['id_siswa'],$siswa['angkatan']);
  $cek2 = $this->CRUD_model->cek_lunas2v2($siswa['id_siswa'],$siswa['angkatan']);
  $cek3 = $this->CRUD_model->cek_lunas3v2($siswa['id_siswa'],$siswa['angkatan']);
  ?>
    <form class="form-horizontal" method="post" action="<?php echo site_url('admin/siswa/bayar');?>">
      <div class="col-md-5">
        <?php if(($kelas==1) AND ($cek1>0)) { ?>
        <table class="table table-bordered table-hover">
          <tr>
            <td align="center"> <b>Pembayaran</b> </td> 
            <td align="center"> <b>Nominal</b> </td> 
          </tr>
          <input type="hidden" name="id_siswa" value="<?php echo($siswa['id_siswa']) ?>">
          <input type="hidden" name="tahun_ajaran" value="<?php echo($pembayaran['tahun_ajaran']) ?>">
          <input type="hidden" name="kelas" value="<?php echo($kelas) ?>">
          <tr>
            <td> SPP </td>
            <td align="right"><input type="number" class="form-control" name="spp1" value="0" id="spp1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'spp')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="spp1_lama" value="<?php echo($siswa['spp1']) ?>">
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><input type="number" class="form-control" name="ps1" value="0" id="ps1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'ps')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="ps1_lama" value="<?php echo($siswa['ps1']) ?>">
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><input type="number" class="form-control" name="pap1" value="0" id="pap1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'pap')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="pap1_lama" value="<?php echo($siswa['pap1']) ?>">
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><input type="number" class="form-control" name="osis1" value="0" id="osis1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'osis')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="osis1_lama" value="<?php echo($siswa['osis1']) ?>">
          </tr>
          <tr>
            <td> PSG </td>
            <td align="right"><input type="number" class="form-control" name="psg1" value="0" id="psg1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'psg')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="psg1_lama" value="<?php echo($siswa['psg1']) ?>">
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><input type="number" class="form-control" name="uus1" value="0" id="uus1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'uus')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="uus1_lama" value="<?php echo($siswa['uus1']) ?>">
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><input type="number" class="form-control" name="as1" value="0" id="as1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'as')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="as1_lama" value="<?php echo($siswa['as1']) ?>">
          </tr>
          <tr>
            <td> KOPERASI </td>
            <td align="right"><input type="number" class="form-control" name="kop1" value="0" id="kop1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'kop')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="kop1_lama" value="<?php echo($siswa['kop1']) ?>">
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><input type="number" class="form-control" name="kk1" value="0" id="kk1" onkeyup="kelas1()" onchange="kelas1()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'kk')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="kk1_lama" value="<?php echo($siswa['kk1']) ?>">
          </tr>
          <tr>
            <td> URAIAN PEMBAYARAN </td>
            <td><input type="text" class="form-control" name="uraian" required></td>
          </tr>
          <tr>
            <td> TANGGAL PEMBAYARAN </td>
            <td><input type="date" class="form-control" name="tanggal" required></td>
          </tr>
          <tr>
            <td> TOTAL DIBAYAR </td>
            <td><div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total1" readonly>
          </div> </td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-block">Bayar</button></td>
          </tr>
        <?php } ?>

        <?php if(($kelas==2) AND ($cek2>0)) { ?>
        <table class="table table-bordered table-hover">
          <tr>
            <td align="center"> <b>Pembayaran</b> </td> 
            <td align="center"> <b>Nominal</b> </td> 
          </tr>
          <input type="hidden" name="id_siswa" value="<?php echo($siswa['id_siswa']) ?>">
          <input type="hidden" name="tahun_ajaran" value="<?php echo($pembayaran['tahun_ajaran']) ?>">
          <input type="hidden" name="kelas" value="<?php echo($kelas) ?>">
          <tr>
            <td> SPP </td>
            <td align="right"><input type="number" class="form-control" name="spp2" id="spp2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'spp')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="spp2_lama" value="<?php echo($siswa['spp2']) ?>">
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><input type="number" class="form-control" name="ps2" id="ps2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'ps')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="ps2_lama" value="<?php echo($siswa['ps2']) ?>">
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><input type="number" class="form-control" name="pap2" id="pap2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'pap')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="pap2_lama" value="<?php echo($siswa['pap2']) ?>">
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><input type="number" class="form-control" name="osis2" id="osis2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'osis')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="osis2_lama" value="<?php echo($siswa['osis2']) ?>">
          </tr>
          <tr>
            <td> PSG </td>
            <td align="right"><input type="number" class="form-control" name="psg2" id="psg2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'psg')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="psg2_lama" value="<?php echo($siswa['psg2']) ?>">
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><input type="number" class="form-control" name="uus2" id="uus2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'uus')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="uus2_lama" value="<?php echo($siswa['uus2']) ?>">
          </tr>
          <tr>
            <td> UN </td>
            <td align="right"><input type="number" class="form-control" name="un2" id="un2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'un')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="un2_lama" value="<?php echo($siswa['un2']) ?>">
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><input type="number" class="form-control" name="as2" id="as2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'as')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="as2_lama" value="<?php echo($siswa['as2']) ?>">
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><input type="number" class="form-control" name="kk2" id="kk2" value="0" onkeyup="kelas2()" onchange="kelas2()"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'kk')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="kk2_lama" value="<?php echo($siswa['kk2']) ?>">
          </tr>
          <tr>
            <td> URAIAN PEMBAYARAN </td>
            <td><input type="text" class="form-control" name="uraian" required></td>
          </tr>
          <tr>
            <td> TANGGAL PEMBAYARAN </td>
            <td><input type="date" class="form-control" name="tanggal" required></td>
          </tr>
          <tr>
            <td> TOTAL DIBAYAR </td>
            <td><div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total2" readonly>
          </div> </td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-block">Bayar</button></td>
          </tr>
        <?php } ?>

        <?php if(($kelas==3) AND ($cek3>0)) { ?>
        <table class="table table-bordered table-hover">
          <tr>
            <td align="center"> <b>Pembayaran</b> </td> 
            <td align="center"> <b>Nominal</b> </td> 
          </tr>
          <input type="hidden" name="id_siswa" value="<?php echo($siswa['id_siswa']) ?>">
          <input type="hidden" name="tahun_ajaran" value="<?php echo($pembayaran['tahun_ajaran']) ?>">
          <input type="hidden" name="kelas" value="<?php echo($kelas) ?>">
          <tr>
            <td> SPP </td>
            <td align="right"><input type="number" class="form-control" name="spp3" id="spp3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'spp')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="spp3_lama" value="<?php echo($siswa['spp3']) ?>">
          </tr>
          <tr>
            <td> PS </td>
            <td align="right"><input type="number" class="form-control" name="ps3" id="ps3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'ps')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="ps3_lama" value="<?php echo($siswa['ps3']) ?>">
          </tr>
          <tr>
            <td> PAP </td>
            <td align="right"><input type="number" class="form-control" name="pap3" id="pap3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'pap')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="pap3_lama" value="<?php echo($siswa['pap3']) ?>">
          </tr>
          <tr>
            <td> OSIS </td>
            <td align="right"><input type="number" class="form-control" name="osis3" id="osis3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'osis')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="osis3_lama" value="<?php echo($siswa['osis3']) ?>">
          </tr>
          <tr>
            <td> UUS </td>
            <td align="right"><input type="number" class="form-control" name="uus3" id="uus3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'uus')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="uus3_lama" value="<?php echo($siswa['uus3']) ?>">
          </tr>
          <tr>
            <td> UN </td>
            <td align="right"><input type="number" class="form-control" name="un3" id="un3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'un')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="un3_lama" value="<?php echo($siswa['un3']) ?>">
          </tr>
          <tr>
            <td> ASURANSI </td>
            <td align="right"><input type="number" class="form-control" name="as3" id="as3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'as')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="as3_lama" value="<?php echo($siswa['as3']) ?>">
          </tr>
          <tr>
            <td> TWEAK </td>
            <td align="right"><input type="number" class="form-control" name="tweak3" id="tweak3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'tweak')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="tweak3_lama" value="<?php echo($siswa['tweak3']) ?>">
          </tr>
          <tr>
            <td> KALENDER & KORBAN </td>
            <td align="right"><input type="number" class="form-control" name="kk3" id="kk3" onkeyup="kelas3()" onchange="kelas3()" value="0"
              <?php if ($this->CRUD_model->cek_lunas($siswa['id_siswa'],$siswa['angkatan'],$kelas,'kk')<1) {
                echo "readonly";
              }?>></td>
            <input type="hidden" name="kk3_lama" value="<?php echo($siswa['kk3']) ?>">
          </tr>
          <tr>
            <td> URAIAN PEMBAYARAN </td>
            <td><input type="text" class="form-control" name="uraian" required></td>
          </tr>
          <tr>
            <td> TANGGAL PEMBAYARAN </td>
            <td><input type="date" class="form-control" name="tanggal" required></td>
          </tr>
          <tr>
            <td> TOTAL DIBAYAR </td>
            <td><div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total3" readonly>
          </div> </td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-block">Bayar</button></td>
          </tr>
        <?php } ?>
          
        </table>
        
      </div>
    </form>
    <?php } ?>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<script type="text/javascript">
  function kelas1() {
    var spp = parseInt(document.getElementById('spp1').value);
    var ps = parseInt(document.getElementById('ps1').value);
    var pap = parseInt(document.getElementById('pap1').value);
    var osis = parseInt(document.getElementById('osis1').value);
    var psg = parseInt(document.getElementById('psg1').value);
    var uus = parseInt(document.getElementById('uus1').value);
    var as = parseInt(document.getElementById('as1').value);
    var kop = parseInt(document.getElementById('kop1').value);
    var kk = parseInt(document.getElementById('kk1').value);

    var jumlah_harga = spp+ps+pap+osis+psg+uus+as+kop+kk;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total1').value = ribuan;
  }
  function kelas2() {
    var spp = parseInt(document.getElementById('spp2').value);
    var ps = parseInt(document.getElementById('ps2').value);
    var pap = parseInt(document.getElementById('pap2').value);
    var osis = parseInt(document.getElementById('osis2').value);
    var psg = parseInt(document.getElementById('psg2').value);
    var uus = parseInt(document.getElementById('uus2').value);
    var un = parseInt(document.getElementById('un2').value);
    var as = parseInt(document.getElementById('as2').value);
    var kk = parseInt(document.getElementById('kk2').value);

    var jumlah_harga = spp+ps+pap+osis+psg+uus+as+un+kk;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total2').value = ribuan;
  }
  function kelas3() {
    var spp = parseInt(document.getElementById('spp3').value);
    var ps = parseInt(document.getElementById('ps3').value);
    var pap = parseInt(document.getElementById('pap3').value);
    var osis = parseInt(document.getElementById('osis3').value);
    var tweak = parseInt(document.getElementById('tweak3').value);
    var uus = parseInt(document.getElementById('uus3').value);
    var un = parseInt(document.getElementById('un3').value);
    var as = parseInt(document.getElementById('as3').value);
    var kk = parseInt(document.getElementById('kk3').value);

    var jumlah_harga = spp+ps+pap+osis+tweak+uus+as+un+kk;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total3').value = ribuan;
  }
</script>
<?php } ?>  