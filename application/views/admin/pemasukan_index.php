  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Pemasukan Sekolah</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDigital"><i class="fa fa-plus-square"></i> Tambah Pemasukan</button>
    <a data-toggle="modal" data-target="#ModalPrint2" class="btn btn-danger pull-right" ><i class="fa fa-print"></i> Cetak Laporan</a>
  </div>
</div> 
<div class="col-md-12">
  <div class="box box-solid"> 
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th style="text-align: center;">Tanggal</th>
          <th style="text-align: center;">Keterangan</th>
          <th style="text-align: center;">Nominal</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data4 as $u) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo mediumdate_indo($u['tanggal']) ?></td>
        <td><?php echo $u['keterangan']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($u['nominal'],0,".",","); ?></td>
        <td align="center">  
          <button class="btn btn-default btn-sm">  
          <?php echo anchor('admin/pemasukan/hapus/'.$u['id'], '<i class="fa fa-trash"></i> HAPUS', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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


  <div class="modal fade" id="ModalDigital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">PEMASUKAN SEKOLAH
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/pemasukan/input');?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="tanggal" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="keterangan" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nominal</label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="nominal" required>
                  </div>              
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



  <div class="modal fade" id="ModalPrint2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">LAPORAN PEMASUKAN
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

  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus pemasukan ini?')
  }
  </script>