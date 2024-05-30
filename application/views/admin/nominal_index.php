  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Data Rincian Pembayaran</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12" align="left">
  <div class="box-header">
    <a class="btn btn-danger" href="<?php echo site_url('admin/nominal/tambah/');?>"><i class="fa fa-plus-square"></i> Tambah Rincian Pembayaran</a>
    <a data-toggle="modal" data-target="#ModalPrint2" class="btn btn-danger pull-right" ><i class="fa fa-print"></i> Cetak Laporan</a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Rincian Pembayaran</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Tahun Ajaran</th>
          <th>Kelas X</th>
          <th>Kelas XI</th>
          <th>Kelas XII</th>
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
        <td><?php echo $u['tahun_ajaran']; ?></td>
        <td><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas1($u['id']),0,",","."); ?></td>
        <td><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas2($u['id']),0,",","."); ?></td>
        <td><?php echo 'Rp. '.number_format($this->CRUD_model->total_kelas3($u['id']),0,",","."); ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/nominal/editdata/'.$u['id']);?>" class="btn btn-warning btn-sm"> PERBARUI</a>  
          <button class="btn btn-default btn-sm">  
          <?php echo anchor('admin/nominal/hapus/'.$u['id'], 'HAPUS', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">RINCIAN PEMBAYARAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="get" action="<?php echo site_url('admin/nominal/laporan');?>" target="_blank">
            <div class="box-body">

              <div class="form-group">
                <div class="col-sm-12">
                  <select class="form-control" name="limit">
                    <option value="1">Tampilkan 4 Tahun Terakhir</option>
                    <option value="0">Semua</option>
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
    return confirm('Apakah anda yakin akan menghapus data rincian pembayaran ini?')
  }
</script>