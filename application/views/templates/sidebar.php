  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>./assets/dokumen/karangduren.png" alt="Karangduren" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Web Karangduren</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
			</div>
  </aside>
