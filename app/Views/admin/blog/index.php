<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Configurações gerais do blog</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="<?= base_url('/admin/blog') ?>" method="post">
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
								<label for="InputTextName">Nome blog</label>
								<input type="text" class="form-control <?= isset($validation) && $validation->hasError('nome-blog') ? 'is-invalid' : '' ?>" id="InputTextName" name="nome-blog" placeholder="Nome" value="<?= isset($config["blog_name"]) ? $config["blog_name"] : set_value('nome-blog') ?>">
								<span class="text-danger"><?= isset($validation) ? display_error($validation, 'nome-blog') : '' ?></span>            
							</div>
							<div class="form-group">
								<label for="InputTextAreaBio">Biografia do autor</label>
								<textarea class="form-control <?= isset($validation) && $validation->hasError('bio') ? 'is-invalid' : '' ?>" name="bio" id="InputTextBio" rows="5" placeholder="Digite o que quiser ..."><?= isset($config["bio"]) ? $config["bio"] : set_value('bio') ?></textarea>
								<span class="text-danger"><?= isset($validation) ? display_error($validation,'bio') : '' ?></span>
							</div>					
						</div>						
					</div>
					<h6>Social Links</h6>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">						
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span for="InputTextTwitterLink" class="input-group-text"><i class="fab fa-twitter"></i></span>
									</div>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('twitter-link') ? 'is-invalid' : '' ?>" name="twitter-link" placeholder="Twitter" value="<?= isset($config["social_twitter"]) ? $config["social_twitter"] : set_value('twitter-link') ?>">									
								</div>
								<span class="text-danger"><?= isset($validation) ? display_error($validation,'twitter-link') : '' ?></span>
							</div>
							<div class="form-group">						
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fab fa-github"></i></span>
									</div>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('github-link') ? 'is-invalid' : '' ?>" name="github-link" placeholder="Github" value="<?= isset($config["social_github"]) ? $config["social_github"] : set_value('github-link') ?>">									
								</div>
								<span class="text-danger"><?= isset($validation) ? display_error($validation,'github-link') : '' ?></span>
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">						
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fab fa-linkedin"></i></span>
									</div>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('linkedin-link') ? 'is-invalid' : '' ?>" name="linkedin-link" placeholder="Linkedin" value="<?= isset($config["social_linkedin"]) ? $config["social_linkedin"] : set_value('linkedin-link') ?>">									
								</div>
								<span class="text-danger"><?= isset($validation) ? display_error($validation,'linkedin-link') : '' ?></span>
							</div>
							<div class="form-group">						
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fab fa-stack-overflow"></i></span>
									</div>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('stackoverflow-link') ? 'is-invalid' : '' ?>" name="stackoverflow-link" placeholder="Stack Overflow" value="<?= isset($config["social_stoverflow"]) ? $config["social_stoverflow"] : set_value('stackoverflow-link') ?>">									
								</div>
							</div>
							<span class="text-danger"><?= isset($validation) ? display_error($validation,'stackoverflow-link') : '' ?></span>
						</div>
					</div>
					<div class="row justify-content-center">		
						<div class="col-md-6">				
							<div class="form-group">						
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fab fa-codepen"></i></span>
									</div>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('codepen-link') ? 'is-invalid' : '' ?>" name="codepen-link" placeholder="Codepen" value="<?= isset($config["social_codepen"]) ? $config["social_codepen"] : set_value('codepen-link') ?>">
									<span class="text-danger"><?= isset($validation) ? display_error($validation,'codepen-link') : '' ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
				<input type="hidden" name="id" value="<?= isset($id) ? $id : set_value('id') ?>">
			</form>
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>