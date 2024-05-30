<div class="login-box">
<!-- 	<div class="login-logo">
		<img src="<?php echo base_url('assets/upload/images/logo.png'); ?>" style="width: 100px;height: 100px;">
		<h3><a href="<?php echo base_url(); ?>"><?php echo $site['nama_website']?></a></h3>
	</div> -->
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Masuk Dengan Username & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" placeholder="Username" />
				<span class="fa fa-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password" />
				<span class="fa fa-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="col-md-12" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
					<br>
				</div>
			</div>
		</form>

	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true)?>
	</div>
</div>
<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(6500).slideUp(600);
</script>
