<?php 
$this->db->distinct();
$this->db->select('angkatan');
$this->db->from('siswa');
$this->db->order_by('angkatan','DESC');
$angkatan = $this->db->get()->result_array();
$jurusan = $this->CRUD_model->GetWhere('jurusan');

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->

    
    <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li class="<?php echo activate_menu('home'); ?>">
          <a href="<?php echo site_url('admin/home');?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="<?php echo activate_menu('siswa');  ?> treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Data Siswa</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
           <?php foreach ($angkatan as $uu) { ?>
            <li class="<?php echo activate_menu('');  ?> treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i>
                <span> <?php echo $this->CRUD_model->angkatan2($uu['angkatan']); ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                 <?php foreach ($jurusan as $ii) { ?>
                  <li class="<?php echo activate_menu(''); ?>">
                    <a href="<?php echo site_url('admin/siswa/angkatan/'.$uu['angkatan'].'/'.$ii['id']);?>"><i class="fa fa-circle-o text-danger"></i>
                      <span> <?php echo $ii['jurusan']; ?></span>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>
          <?php } ?>
        </ul>
        </li>

        <li class="<?php echo activate_menu('nominal'); ?>">
          <a href="<?php echo site_url('admin/nominal');?>">
                <i class="fa fa-dollar"></i>
                <span>Rincian Pembayaran</span>
            </a>
        </li>

        <li class="<?php echo activate_menu('pemasukan'); ?>">
          <a href="<?php echo site_url('admin/pemasukan');?>">
                <i class="fa fa-money"></i>
                <span>Pemasukan</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('pengeluaran'); ?>">
          <a href="<?php echo site_url('admin/pengeluaran');?>">
                <i class="fa fa-cart-plus"></i>
                <span>Pengeluaran</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('pengaturan/akun'); ?>">
            <a href="<?php echo site_url('admin/pengaturan/akun');?>">
                  <i class="fa fa-user"></i>
                  <span>Akun</span>
              </a>
        </li>
        <li class="<?php echo activate_menu('logout'); ?>">
          <a href="<?php echo site_url('auth/logout');?>">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
            </a>
        </li>



    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
