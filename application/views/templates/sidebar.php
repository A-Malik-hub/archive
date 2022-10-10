<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li <?= $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
				<a href="<?php echo base_url('') ?>"><i class="fa fa-address"></i><span>Dashboard</span></a>
				</li>
				<li <?= $this->uri->segment(1) == 'surat' ? 'class="active"':"" ?>>
				<a href="<?php echo base_url('surat') ?>"><i class="fa fa-envelope"></i><span> Arsip Surat</span></a>
				</li>
				<li <?= $this->uri->segment(1) == 'about' ? 'class="active"':"" ?>>
				<a href="<?php echo base_url('about') ?>"><i class="fa fa-address-card"></i><span>About</span></a>
				</li>
			</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
