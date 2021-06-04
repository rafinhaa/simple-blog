<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header p-2">
					<h3 class="card-title">Configurações gerais do blog</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="<?= base_url('/admin/blog/store') ?>" method="post">
					<?= csrf_field() ?>
					<div class="card-body">
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
								<div class="form-group">									
									<label for="SelectColor">Cor</label>
										<select id="SelectColor" name="theme-color"class="form-control">
											<option value="1" <?= isset($config["theme"]) &&  $config["theme"] == 1 ? 'selected' : set_value('theme-color') == 1 ? 'selected' : '' ?> style="color: #5FCB71;">Verde claro</option>
											<option value="2" <?= isset($config["theme"]) &&  $config["theme"] == 2 ? 'selected' : set_value('theme-color') == 2 ? 'selected' : '' ?> style="color: #5BC3D5;">Azul claro</option>
											<option value="3" <?= isset($config["theme"]) &&  $config["theme"] == 3 ? 'selected' : set_value('theme-color') == 3 ? 'selected' : '' ?> style="color: #3B7EEB;">Azul marinho</option>
											<option value="4" <?= isset($config["theme"]) &&  $config["theme"] == 4 ? 'selected' : set_value('theme-color') == 4 ? 'selected' : '' ?> style="color: #5ECCA9;">Verde limão</option>
											<option value="5" <?= isset($config["theme"]) &&  $config["theme"] == 5 ? 'selected' : set_value('theme-color') == 5 ? 'selected' : '' ?> style="color: #EEA73B;">Laranja</option>
											<option value="6" <?= isset($config["theme"]) &&  $config["theme"] == 6 ? 'selected' : set_value('theme-color') == 6 ? 'selected' : '' ?> style="color: #5469C9;">Roxo</option>
											<option value="7" <?= isset($config["theme"]) &&  $config["theme"] == 7 ? 'selected' : set_value('theme-color') == 7 ? 'selected' : '' ?> style="color: #5D6BA7;">Azul petróleo</option>
											<option value="8" <?= isset($config["theme"]) &&  $config["theme"] == 8 ? 'selected' : set_value('theme-color') == 8 ? 'selected' : '' ?> style="color: #6C51A4;">Rosa escuro</option>
									</select>
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
				</form>
			</div>
			<!-- /.card -->
		</div>
		<!--/.col (left) -->
	</div>
<?= $this->endSection() ?>