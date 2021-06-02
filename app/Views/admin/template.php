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
						<?php if(!empty($currentUser['profile_img']) && file_exists(set_realpath('upload/userprofile/'.$currentUser['profile_img']))): ?>
								<img src="<?= base_url('/upload/userprofile/'.$currentUser['profile_img']) ?>" class="img-circle elevation-2" alt="User Image">
							<?php else: ?>
								<img src="<?= base_url('/adminlte/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
							<?php endif; ?>
						</div>
						<div class="info">
							<a href="#" class="d-block"><?= $currentUser['name'] ?></a>
						</div>
					</div>
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
							<li class="nav-item">
								<a href="#>" class="nav-link">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Configurações
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('/admin/blog') ?>" class="nav-link">
											<p>Blog</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('/admin/blog/imagem') ?>" class="nav-link">
											<p>Imagem</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('/admin/blog/about') ?>" class="nav-link">
											<p>Sobre</p>
										</a>
									</li>
								</ul>	
							</li>
							<li class="nav-item">
								<a href="<?= base_url('/login/logout') ?>" class="nav-link">
									<i class="nav-icon fas fa-sign-out-alt"></i>
									<p>
										Sair
									</p>
								</a>
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
						<?= $this->renderSection('content') ?>
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
			<script type="text/javascript">toastr.error('<?= session()->getFlashdata('fail') ?>')</script>
        <?php endif ?>
		<?php if (!empty(session()->getFlashdata('success'))) : ?>
			<script type="text/javascript">toastr.success('<?= session()->getFlashdata('success') ?>')</script>
        <?php endif ?>
	</body>
</html>