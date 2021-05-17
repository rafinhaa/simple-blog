<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SimpleBlog | <?= $titlepage ?></title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url('/plugins/fontawesome-free/css/all.min.css') ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('/adminlte/css/adminlte.min.css') ?>">
		<?php if (! empty($css) && is_array($css)) : ?>
		<?php foreach ($css as $name => $css_item): ?>
		<!-- <?= $name ?> -->
		<link rel="stylesheet" href="<?= base_url($css_item) ?>">
		<?php endforeach; ?>
		<?php endif ?>
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="<?= base_url('/admin/') ?>" class="nav-link">Home</a>
					</li>
				</ul>
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<!-- Navbar Search -->
					<li class="nav-item">
						<a class="nav-link" data-widget="navbar-search" href="#" role="button">
						<i class="fas fa-search"></i>
						</a>
						<div class="navbar-search-block">
							<form class="form-inline">
								<div class="input-group input-group-sm">
									<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
									<div class="input-group-append">
										<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
										</button>
										<button class="btn btn-navbar" type="button" data-widget="navbar-search">
										<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="../../adminlte/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											Brad Diesel
											<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">Call me whenever you can...</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="../../adminlte/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											John Pierce
											<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">I got your message bro</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="../../adminlte/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											Nora Silvester
											<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">The subject goes here</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
						</div>
					</li>
					<!-- Notifications Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<span class="dropdown-item dropdown-header">15 Notifications</span>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="<?= base_url('/admin/') ?>" class="brand-link">
				<img src="<?= base_url('/adminlte/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?= base_url('/adminlte/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block">Alexander Pierce</a>
						</div>
					</div>
					<!-- SidebarSearch Form -->
					<div class="form-inline">
						<div class="input-group" data-widget="sidebar-search">
							<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
								</button>
							</div>
						</div>
					</div>
					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="<?= base_url('admin/') ?>" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-pen"></i>
									<p>
										Post
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('/admin/posts') ?>" class="nav-link">
											<p>Todos os posts</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('/admin/posts/create') ?>" class="nav-link">
											<p>Adicionar novo</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('/admin/posts/create') ?>" class="nav-link">
											<p>Categorias</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Usuários
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('/admin/users') ?>" class="nav-link">
											<p>Todos os usuários</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('/admin/users/create') ?>" class="nav-link">
											<p>Adicionar novo</p>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1><?= $titlepage ?></h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Novo Post</li>
								</ol>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<?php
							if(isset($view)){
							  echo view($view);
							}
							?>
					</div>					
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<div class="float-right d-none d-sm-block">
					<b>Version</b> 3.1.0
				</div>
				<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
			</footer>
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?= base_url('/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('/adminlte/js/adminlte.min.js') ?>"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?= base_url('/adminlte/js/demo.js') ?>"></script>
		<?php if (! empty($scripts) && is_array($scripts)) : ?>
			<?php foreach ($scripts as $name => $script): ?>
				<!-- <?= $name ?> -->
				<script src="<?= base_url($script) ?>"></script>
			<?php endforeach; ?>
		<?php endif ?>
		<?php if (!empty(session()->getFlashdata('fail'))) : ?>
			<script type="text/javascript">toastr.success('Have Fun')</script>
        <?php endif ?>
		<?php if (!empty(session()->getFlashdata('success'))) : ?>
			<script type="text/javascript">toastr.success('Have Fun')</script>
        <?php endif ?>
	</body>
</html>