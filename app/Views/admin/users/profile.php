<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="card card-primary card-outline">
			<div class="card-body box-profile">
				<div class="text-center">
					<?php if( !empty($user['profile_img']) && file_exists(set_realpath('upload/userprofile/'.$user['profile_img']))): ?>
						<img src="<?= base_url('/upload/userprofile/'.$user['profile_img']) ?>" class="img-fluid img-thumbnail img-circle"" alt="User Image">
					<?php else: ?>
						<img class="profile-user-img img-fluid img-circle" src="<?= base_url('/adminlte/img/user2-160x160.jpg') ?>" alt="User profile picture">
					<?php endif; ?>						
				</div>
				<h3 class="profile-username text-center"><?= $user['name'] ?></h3>
				<p class="text-muted text-center"><?= $user['email'] ?></p>				
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
	<div class="col-md-9">
		<div class="card">
			<div class="card-header p-2">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Configurações</a></li>
					<li class="nav-item"><a class="nav-link" href="#photo" data-toggle="tab">Foto</a></li>
				</ul>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<form class="form-horizontal" action="<?= base_url('admin/users/store')?>" method="post">
							<div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>" name="name" id="inputName" placeholder="Nome" value="<?= isset($user['name']) ? $user['name'] : set_value('name') ?>">
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : '' ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" id="inputEmail" placeholder="Email" value="<?= isset($user['email']) ? $user['email'] : set_value('email') ?>">
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputSkills" class="col-sm-2 col-form-label">Senha</label>
								<div class="col-sm-4">
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" id="inputSkills" placeholder="Senha">
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>
								</div>
                                <label for="inputSkills" class="col-form-label">Confirmar senha</label>
                                <div class="col-sm-4">
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('cpassword') ? 'is-invalid' : '' ?>" name="cpassword" id="inputSkills" placeholder="Repita a senha">
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'cpassword') : '' ?></span>
								</div>
							</div>
							<input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : set_value('id') ?>">
							<div class="form-group row">
								<div class="offset-sm-2 col-sm-10">
									<button type="submit" class="btn btn-danger">Enviar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
                    <div class="tab-pane" id="photo">
                        <form action="<?= base_url('admin/users/upload/'.$user['id'])?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <label for="InputFile">Imagem</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="InputFile" name="profile-imagem">
                                            <label class="custom-file-label" for="InputFile">Escolher</label>
                                        </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'profile-imagem') : '' ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="InputFile">Foto atual</label>
                                    <div class="form-group">
										<?php if(!empty($user['profile_img']) && file_exists(set_realpath('upload/userprofile/'.$user['profile_img']))): ?>											
											<img src="<?= base_url('/upload/userprofile/'.$user['profile_img']) ?>" class="img-fluid img-thumbnail img-circle"" alt="User Image">
										<?php else: ?>
											<img class="profile-user-img img-fluid img-circle" src="<?= base_url('/adminlte/img/user2-160x160.jpg') ?>" alt="image" >
										<?php endif; ?>
                                    </div>
                                </div>
								<input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : set_value('id') ?>">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
<?= $this->endSection() ?>