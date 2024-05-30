<ol class="breadcrumb">
	<li><a href="<?php echo site_url();?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Profile</li>
</ol>
<div id="myalert">
	<?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/upload/images/profil/'.$this->session->userdata('foto')); ?>" alt="User profile picture">
				<h3 class="profile-username text-center"><?php echo $this->session->userdata('nama'); ?></h3>
				<p class="text-muted text-center">
					<?php echo $this->session->userdata('level'); ?>
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>NIP/NIM/NIK</b><br><a><?php echo $this->session->userdata('username')?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Terakhir Login</b><br><a><?php echo $this->session->userdata('last_login'); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
				<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="settings">
					<form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $this->session->userdata('username'); ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $this->session->userdata('nama'); ?>">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 control-label">Asal Sekolah</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" value="<?php echo $this->session->userdata('asal_sekolah'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Angkatan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" placeholder="Angkatan" name="angkatan" value="<?php echo $this->session->userdata('angkatan'); ?>">
								<input type="hidden" class="form-control" placeholder="Angkatan" name="prodi" value="<?php echo $this->session->userdata('prodi'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Telp</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" placeholder="Telp" name="no_hp" value="<?php echo $this->session->userdata('no_hp'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $this->session->userdata('tempat_lahir'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-5">
								<input type="date" class="form-control" placeholder="Tempat Lahir" name="tanggal_lahir" value="<?php echo $this->session->userdata('tanggal_lahir'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $this->session->userdata('alamat'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" placeholder="Foto" name="berkas">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="password">
					<form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
						<div class="form-group">
							<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
							</div>
						</div>
						<div class="form-group">
							<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
							</div>
						</div>
						<div class="form-group">
							<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success  btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>