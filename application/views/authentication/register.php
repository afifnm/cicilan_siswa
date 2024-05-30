<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo site_url('/');?>"><b>Web</b>RPP</a>
  </div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true)?>
	</div>
  <div class="register-box-body">
    <p class="login-box-msg">REGISTER FORM</p>
		      <form class="form-horizontal" method="post" action="<?php echo site_url('auth/simpan');?>">
		        <div class="box-body">
		          <div class="form-group">
		            <label class="col-sm-3 control-label">*Username</label>
		            <div class="col-sm-9">
		            	<input type="hidden" class="form-control" name="level" value="Pengguna">
		              <input type="text" class="form-control" name="username" placeholder="Username" required>
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">*Password</label>
		            <div class="col-sm-9">
		              <input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Nama Lengkap</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
		            </div>
		          </div>  
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Asal Sekolah</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="asal_sekolah" placeholder="Asal Sekolah">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Angkatan</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="angkatan" placeholder="Angkatan">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Tempat Lahir</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Tanggal Lahir</label>
		            <div class="col-sm-9">
		              <input type="date" class="form-control" name="tanggal_lahir">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Email</label>
		            <div class="col-sm-9">
		              <input type="email" class="form-control" name="email" placeholder="Email">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Alamat</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="alamat" placeholder="Alamat">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-3 control-label">Nomor Telp.</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control" name="no_hp" placeholder="Nomor Telp.">
		            </div>
		          </div>   	
		        </div>
		        <!-- /.box-body -->
		        <div class="box-footer">
		          <a href="<?php echo site_url('/');?>" class="btn btn-default">Cancel</a>
		          <button type="submit" class="btn btn-success pull-right">Daftar</button>
		        </div>
		        <!-- /.box-footer -->
		      </form>
  </div>
  <!-- /.form-box -->
</div>