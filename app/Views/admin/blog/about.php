<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header p-2">
					<h3 class="card-title">Descrição</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="<?= base_url('/admin/blog/about') ?>" method="post">
					<?= csrf_field() ?>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="InputTextName">Título da pagina</label>
									<input type="text" class="form-control <?= isset($validation) && $validation->hasError('title-page') ? 'is-invalid' : '' ?>" id="InputTextName" name="title-page" placeholder="Nome" value="<?= isset($config["title_page"]) ? $config["title_page"] : set_value('title-page') ?>">
									<span class="text-danger"><?= isset($validation) ? display_error($validation, 'title-page') : '' ?></span>            
								</div>
								<div class="form-group">
									<label for="InputTextAreaBio">Sobre</label>
									<textarea class="form-control <?= isset($validation) && $validation->hasError('about') ? 'is-invalid' : '' ?>" name="about" id="InputTextBio" rows="5" placeholder="Digite o que quiser ..."><?= isset($config["about"]) ? $config["about"] : set_value('about') ?></textarea>
									<span class="text-danger"><?= isset($validation) ? display_error($validation,'about') : '' ?></span>
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