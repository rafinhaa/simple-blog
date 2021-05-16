<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Essa são todas as suas postagens</h3>
				<div class="card-tools">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
					<a href="<?= base_url('/admin/posts/create') ?>" class="btn btn-block btn-success btn-sm">Adicionar novo post</a>
				</div>
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
								<td>
									<div class="btn-group">
										<a href="<?= base_url('/admin/posts/edit/'.$posts_item['slug']) ?>" class="btn btn-sn bg-gradient-primary">Editar</a>
										<?= createModalButton('Excluir','btn btn-sn bg-gradient-danger','#modal-danger-'.$posts_item['id']) ?>
									</div>
								</td>
							</tr>
							<?php createModalMessage('danger','modal-danger-'.$posts_item['id'],'Cuidado!','Tem certeza que deseja apagar essa postagem?', base_url('admin/posts/delete/'.$posts_item['slug'])) ?>
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