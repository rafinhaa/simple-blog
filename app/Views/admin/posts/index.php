<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Essa são todas as suas postagens</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="default-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Data</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($posts) && is_array($posts)) : ?>
							<?php foreach ($posts as $posts_item): ?>
							<tr>
								<td><?= $posts_item['id'] ?></td>
								<td><?= $posts_item['title'] ?></td>
								<td><?= $posts_item['updated_at'] ?></td>
								<td></td>
							</tr>
							<?php endforeach; ?>
						<?php else : ?>
						<tr>
							<td colsspan="4">Não foi possível encontrar qualquer postagem para você</td>
						</tr>
						<?php endif ?>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Data</th>
							<th>Ações</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>