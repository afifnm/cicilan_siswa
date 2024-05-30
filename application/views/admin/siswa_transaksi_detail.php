<?php foreach ($siswa as $siswa) { ?>  
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/siswa/angkatan/'.$siswa['angkatan'].'/'.$siswa['id_jurusan']);?>">Data Siswa <?php echo($this->CRUD_model->angkatan($siswa['angkatan'])); ?></a></li>
    <li><a href="<?php echo site_url('admin/siswa/transaksi/'.$siswa['id_siswa']);?>">Transaksi Pembayaran</a></li>
    <li class="active">Detail Transaksi Pembayaran</li>
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
            <td> Kelas </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php if($this->CRUD_model->cekkelas($siswa['angkatan'])==1){ echo "X"; } 
            elseif ($this->CRUD_model->cekkelas($siswa['angkatan'])==2) {
              echo "XI";
            } elseif ($this->CRUD_model->cekkelas($siswa['angkatan'])==3) {
              echo "XII";
            } else {
              echo "Alumni";
            } ?> <?php echo $siswa['kelas']; ?>
            </td>
          </tr>
          <?php foreach ($transaksi as $u) {?>
          <tr> 
            <td> Tanggal Pembayaran </td>
             <td> &nbsp; : &nbsp; </td>
            <td> <?php echo mediumdate_indo($u['tanggal']); ?></td>
          </tr>
          <tr> 
            <td> Uraian Pembayaran </td>
             <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $u['uraian']; ?></td>
          </tr>
          <?php if ($u['spp1']>0) { ?>
            <tr> 
            <td> SPP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['spp1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['spp2']>0) { ?>
            <tr> 
            <td> SPP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['spp2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['spp3']>0) { ?>
            <tr> 
            <td> SPP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['spp3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['ps1']>0) { ?>
            <tr> 
            <td> PS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['ps1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['ps2']>0) { ?>
            <tr> 
            <td> PS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['ps2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['ps3']>0) { ?>
            <tr> 
            <td> PS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['ps3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['pap1']>0) { ?>
            <tr> 
            <td> PAP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['pap1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['pap2']>0) { ?>
            <tr> 
            <td> PAP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['pap2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['pap3']>0) { ?>
            <tr> 
            <td> PAP </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['pap3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['osis1']>0) { ?>
            <tr> 
            <td> OSIS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['osis1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['osis2']>0) { ?>
            <tr> 
            <td> OSIS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['osis2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['osis3']>0) { ?>
            <tr> 
            <td> OSIS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['osis3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['psg1']>0) { ?>
            <tr> 
            <td> PSG </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['psg1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['psg2']>0) { ?>
            <tr> 
            <td> PSG </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['psg2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['psg3']>0) { ?>
            <tr> 
            <td> PSG </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['psg3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['uus1']>0) { ?>
            <tr> 
            <td> UUS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['uus1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['uus2']>0) { ?>
            <tr> 
            <td> UUS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['uus2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['uus3']>0) { ?>
            <tr> 
            <td> UUS </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['uus3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['un1']>0) { ?>
            <tr> 
            <td> UN </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['un1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['un2']>0) { ?>
            <tr> 
            <td> UN </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['un2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['un3']>0) { ?>
            <tr> 
            <td> UN </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['un3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['tweak3']>0) { ?>
            <tr> 
            <td> Tweak </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['tweak3'],0,",","."); ?></td>
          </tr>
          <?php } ?>


          <?php if ($u['as1']>0) { ?>
            <tr> 
            <td> Asuransi </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['as1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['as2']>0) { ?>
            <tr> 
            <td> Asuransi </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['as2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['as3']>0) { ?>
            <tr> 
            <td> Asuransi </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['as3'],0,",","."); ?></td>
          </tr>
          <?php } ?>

          <?php if ($u['kop1']>0) { ?>
            <tr> 
            <td> Koperasi </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['kop1'],0,",","."); ?></td>
          </tr>
          <?php } ?>


          <?php if ($u['kk1']>0) { ?>
            <tr> 
            <td> Kalender dan Korban </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['kk1'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['kk2']>0) { ?>
            <tr> 
            <td> Kalender dan Korban </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['kk2'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <?php if ($u['kk3']>0) { ?>
            <tr> 
            <td> Kalender dan Korban </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($u['kk3'],0,",","."); ?></td>
          </tr>
          <?php } ?>
          <tr> 
            <td> Total Dibayar </td>
             <td> &nbsp; : &nbsp; </td>
            <td align="right">Rp. <?php echo number_format($this->CRUD_model->nominal_transaksi2($u['id'],0,",",".")); ?></td>
          </tr>
          

        <?php } ?>

        </table>
      </div>

        
      </div>

    </div>
    <!-- /.box-body -->
  </div>
</div>
<script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus transaksi pembayaran ini?')
  }
</script>
<?php } ?>   