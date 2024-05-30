<?php 
  date_default_timezone_set("Asia/Jakarta");
  $jam = date("H:i");
  $tanggal = date("y-m-d");
  $hari = date('l'); if($hari=='Monday'){$indo='Senin';}
  if($hari=='Tuesday'){$indo='Selasa';}if($hari=='Wednesday'){$indo='Rabu';}
  if($hari=='Thursday'){$indo='Kamis';}if($hari=='Friday'){$indo='Jumat';}
  if($hari=='Saturday'){$indo='Sabtu';}if($hari=='Sunday'){$indo='Minggu';}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('layout/_meta.php') ;?>
	<!-- css -->
	<?php require_once('layout/_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition skin-green layout-top-nav">
	<div class="wrapper">
		<!-- header -->
	  <header class="main-header">
	    <nav class="navbar navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <a href="<?php echo site_url('home');?>" class="navbar-brand"><b>Web</b> RPP</a>
	        </div>
	        <div class="navbar-custom-menu">
	          <ul class="nav navbar-nav">
	            <li>
	              <a href="<?php echo site_url('/');?>">
	                <i class="fa fa-login"></i> <b>BERANDA</b>
	              </a>
	            </li>
	            <li>
	              <a href="<?php echo base_url("assets/upload/panduan.pdf"); ?>" target="_blank">
	                <i class="fa fa-login"></i> <b>PANDUAN</b>
	              </a>
	            </li>
	            <li>
	              <a href="<?php echo site_url('auth/login');?>">
	                <i class="fa fa-login"></i> <b>LOGIN</b>
	              </a>
	            </li>
	          </ul>
	        </div>
	        <!-- /.navbar-custom-menu -->
	      </div>
	      <!-- /.container-fluid -->
	    </nav>
	  </header>
		<!-- sidebar -->
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="col-xs-12 ngepasin">
				<div class="box-header">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<img class="pull-right"style="width: 140px; height: 80px; margin-top: 20px;" src="<?php echo base_url('assets/upload/images/logo.png');?>">
					  <h1 align="center">
					    &nbsp;Aplikasi Berbasis Web Pendidikan Kewarganegaraan <br>
					    <small> Rencana Pelakasanaan Pembelajaran<br></small>
					  </h1> 
					  <h3 align="left"> <small>Hari ini <?php echo longdate_indo('Y-m-d') ?></small></h3>  
					</div>
					<div class="col-md-1">
					</div>
				</div>
					<div class="col-md-2"></div>
					<div class="col-md-8">
							<div id="myCarousel" class="carousel slide">
								<!-- carousel indicator -->
								<ol class="carousel-indicators">
								  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								  <li data-target="#myCarousel" data-slide-to="1"></li>
								</ol>
								<!-- carousel item -->
								<div class="carousel-inner">
								  <div class="item active">
									<img src="<?php echo base_url('assets/upload/images/slides/slide1.jpg');?>" alt="">
									<div class="carousel-caption">
									  <h4></h4>
									  <p></p>
									</div>
								  </div>
								  <div class="item">
									<img src="<?php echo base_url('assets/upload/images/slides/slide2.jpg');?>" alt="">
									<div class="carousel-caption">
									  <h4></h4>
									  <p></p>
									</div>
								  </div>
								</div>
								<!-- carousel nav -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
							</div>
						</div>
					<div class="col-md-2">
					</div>
			</section>
		</div>
		<!-- footer -->
		<footer class="main-footer">
			<strong>Copyright &copy;  
			Supported by LPPM UNS</strong> <?php echo date('Y'); ?>.
		</footer>
	</div>
	<!-- js -->
	<?php require_once('layout/_js.php') ;?>
</body>
</html>
