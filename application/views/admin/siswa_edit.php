<?php foreach ($data2 as $u) { ?>  
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/siswa/angkatan/'.$u->angkatan);?>">Data Siswa <?php echo($this->CRUD_model->angkatan($u->angkatan)); ?></a></li>
    <li class="active"> <?php echo $u->nama ?></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-7">
  <div class="box box-solid">
    <form class="form-horizontal" method="post" action="<?php echo site_url('admin/siswa/updatedata');?>">
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-4 control-label">NIS (Nomor Induk Sekolah)</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nis" value="<?php echo $u->nis ?>" required>
            <input type="hidden" class="form-control" name="nis_lama" value="<?php echo $u->nis ?>" required>
            <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_siswa ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">NISN (Nomor Induk Siswa Nasional)</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nisn" value="<?php echo $u->nisn ?>">
            <input type="hidden" class="form-control" name="nisn_lama" value="<?php echo $u->nisn ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Nama Lengkap Siswa</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Jenis Kelamin</label>
          <div class="col-sm-4">
            <select class="form-control select" name="kelamin">
              <option value="Laki-laki" <?php if($u->kelamin=='Laki-laki'){ ?> selected <?php } ?> > Laki-laki </option>
              <option value="Perempuan" <?php if($u->kelamin=='Perempuan'){ ?> selected <?php } ?>> Perempuan </option>
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Jurusan</label>
          <div class="col-sm-4">
            <select class="form-control select" name="jurusan">
              <?php foreach ($jurusan as $uu) {?>
            <option value="<?php echo $uu['id'] ?>" <?php if($uu['id']==$u->id_jurusan){ ?> selected <?php } ?>>
              <?php echo $uu['jurusan']; ?>
            </option>
              <?php } ?>
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Kelas</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="kelas" value="<?php echo $u->kelas ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Angkatan</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" name="angkatan" required value="<?php echo $u->angkatan ?>">
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
<?php } ?>  