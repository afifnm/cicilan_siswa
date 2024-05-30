<?php foreach ($siswa as $siswa) { ?>  
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/siswa/angkatan/'.$siswa['angkatan'].'/'.$siswa['id_jurusan']);?>">Data Siswa <?php echo($this->CRUD_model->angkatan($siswa['angkatan'])); ?></a></li>
    <li class="active">Transaksi Pembayaran</li>
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
            } ?> <?php echo $siswa['kelas']; ?>
            </td>
          </tr>
          <tr> 
            <td> Jurusan </td>
            <td> &nbsp; : &nbsp; </td>
            <td> <?php echo $siswa['jurusan']; ?> </td>
          </tr>
        </table>
        <hr>
          <?php
            $kelas = $this->CRUD_model->cekkelas($siswa['angkatan']);
            $cek1 = $this->CRUD_model->cek_lunas1($siswa['id_siswa'],$siswa['angkatan']);
            $cek2 = $this->CRUD_model->cek_lunas2($siswa['id_siswa'],$siswa['angkatan']);
            $cek3 = $this->CRUD_model->cek_lunas3($siswa['id_siswa'],$siswa['angkatan']);
            $plus=$siswa['angkatan']+1;
            $cetak = $siswa['angkatan'].'/'.$plus;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$siswa['id_siswa'].'/1/'.$cetak);?>" 
            class="btn btn-<?php if($cek1<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php if($kelas>1) { 
            $plus1=$siswa['angkatan']+1;
            $plus2=$siswa['angkatan']+2;
            $cetak = $plus1.'/'.$plus2;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$siswa['id_siswa'].'/2/'.$cetak);?>" 
            class="btn btn-<?php if($cek2<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php } ?>
          <?php if($kelas>2) { 
            $plus1=$siswa['angkatan']+2;
            $plus2=$siswa['angkatan']+3;
            $cetak = $plus1.'/'.$plus2;
          ?>
          <a href="<?php echo site_url('admin/siswa/pembayaran/'.$siswa['id_siswa'].'/3/'.$cetak);?>"
            class="btn btn-<?php if($cek3<1){ echo('danger');} else {echo('info');}?> btn-sm"><strong><?php echo $cetak; ?> </strong></a>
          <?php } ?>
        <hr>
      </div>
      <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr style="text-align: center;">
          <th style="width: 20px;">No</th>
          <th style="text-align: center;">Tanggal</th>
          <th style="text-align: center;">Uraian Pembayaran</th>
          <th style="text-align: center;">Tahun Ajaran</th>
          <th style="text-align: center;">Nominal</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $sum = 0;
        foreach ($transaksi as $u) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo mediumdate_indo($u['tanggal']); ?></td>
        <td>
          <a href="<?php echo site_url('admin/siswa/detail_transaksi/'.$u['id'].'/'.$u['id_siswa']);?>" target='_blank'> <?php echo $u['uraian']; ?></a></td>
        <td style="text-align: center;"><?php echo $u['tahun_ajaran']; ?></td>
        <td align="right"><?php $total = $this->CRUD_model->nominal_transaksi2($u['id']); echo 'Rp. '.number_format($total,0,",","."); ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/siswa/cetaknota/'.$u['id'].'/'.$u['id_siswa']);?>" class="btn btn-danger btn-sm" target='_blank'> CETAK NOTA</a>  
          <button class="btn btn-default btn-sm">  
          <?php echo anchor('admin/siswa/batal_transaksi/'.$u['id'], 'HAPUS', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>      
        </td>
        </tr>
        <?php $no++; $sum=$sum+$total;} ?>
        </tbody>
        <tr>
          <td colspan="4"></td>
          <td align="right"><?php echo 'Rp. '.number_format($sum,0,",","."); ?></td>
          <td> </td>
        </tr>
      </table>
        
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