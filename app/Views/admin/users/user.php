<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>	
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Usuário</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="<?= base_url('/admin/users/store') ?>" method="post">
					<?= csrf_field() ?>
					<div class="card-body">					
							<?php if (!empty(session()->getFlashdata('fail'))) : ?>
								<div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
							<?php endif ?>
							<?php if (!empty(session()->getFlashdata('success'))) : ?>
								<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
							<?php endif ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="InputTextName">Nome</label>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>" id="InputTextName" name="name" placeholder="Nome" value="<?= set_value('name') ?>">
									<span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>            
								</div>					
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="InputTextEmail">Email</label>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" id="InputTextEmail" name="email" placeholder="Digite o email" value="<?= set_value('email') ?>">
									<span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>                  
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="InputTextPassword">Senha</label>
									<input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" id="InputTextPassword" name="password" placeholder="Digite a senha">
									<span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="InputTextCPassword">Confirmar Senha</label>
									<input type="password" class="form-control <?= isset($validation) && $validation->hasError('cpassword') ? 'is-invalid' : '' ?>" id="InputTextCPassword" name="cpassword" placeholder="Repita a senha">
									<span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
					<input type="hidden" name="id" value="<?= isset($id) ? $id : set_value('id') ?>">
				</form>
			</div>
			<!-- /.card -->
		</div>
		<!--/.col (left) -->
	</div>
<?= $this->endSection() ?>