<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link navbar-warning">
		<img src="dist/img/logo.png" alt="Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">TOPSIS</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="dist/img/avatar5.png" class="img-circle elevation-2"
					 alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $_SESSION['nama'] ? $_SESSION['nama'] : '-' ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php if ($_SESSION['level_id']=='ADMIN') : ?>
					<?php include 'menu_admin.php'; ?>
				<?php else : ?>
					<?php include 'menu_user.php'; ?>
				<?php endif; ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
