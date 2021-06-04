<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Esse são todos os usuários</h3>
					<div class="card-tools">
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
						<a href="<?= base_url('/admin/users/create') ?>" class="btn btn-block btn-success btn-sm">Adicionar novo usuário</a>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="default-datatable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($users) && is_array($users)) : ?>
								<?php foreach ($users as $users_item): ?>
								<tr>
									<td><?= $users_item['id'] ?></td>
									<td><?= $users_item['name'] ?></td>
									<td><?= $users_item['email'] ?></td>
									<td>
										<div class="btn-group">
											<a href="<?= base_url('/admin/users/profile/'.$users_item['id']) ?>" class="btn btn-sn bg-gradient-primary">Editar</a>
											<?= createModalButton('Excluir','btn btn-sn bg-gradient-danger','#modal-danger-'.$users_item['id']) ?>
										</div>
									</td>
								</tr>
								<?php createModalMessage('danger','modal-danger-'.$users_item['id'],'Cuidado!','Tem certeza que deseja apagar esse usuário?', base_url('admin/users/delete/'.$users_item['id'])) ?>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="4">Não foi possível encontrar nenhum usuário</td>
								</tr>
							<?php endif ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Data</th>
								<th>Email</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
<?= $this->endSection() ?>