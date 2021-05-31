<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3><?= $totalPosts?></h3>
				<p>Quantidade de Posts</p>
			</div>
			<div class="icon">
				<i class="nav-icon fas fa-pen"></i>
			</div>
			<div class="small-box-footer"></div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?= $totalViews ?></h3>
				<p>Visualizações Totais</p>
			</div>
			<div class="icon">
				<i class="fas fa-chart-line"></i>
			</div>
			<div class="small-box-footer"></div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>44</h3>
				<p>User Registrations</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<div class="small-box-footer"></div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>65</h3>
				<p>Unique Visitors</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<div class="small-box-footer"></div>
		</div>
	</div>
	<!-- ./col -->
</div>
<div class="row">
	<div class="col-md-6">
		<div class="card card">
			<div class="card-header">
				<h3 class="card-title">Posts mais visualizados</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="default-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Título</th>
							<th>Visualizações</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($posts) && is_array($posts)) : ?>
						<?php foreach ($posts as $posts_item): ?>
						<tr>
							<td><a href="<?= base_url('/post-blog/'.$posts_item['slug']) ?>"><?= $posts_item['title'] ?></a></td>
							<td><?= $posts_item['views'] ?></td>
						</tr>
						<?php endforeach; ?>
						<?php else : ?>
						<tr>
							<td colspan="2">Não foi possível encontrar qualquer postagem para você</td>
						</tr>
						<?php endif ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Título</th>
							<th>Visualizações</th>
						</tr>
					</tfoot>
				</table>				
			</div>
			<!-- /.card-body -->
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card">
			<div class="card-header">
				<h3 class="card-title">Quick Example</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>
<!--/.row -->
<?= $this->endSection() ?>