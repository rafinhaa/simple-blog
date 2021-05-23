<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>	
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Post</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="<?= base_url('/admin/posts/store') ?>" method="post">
					<?= csrf_field() ?>
					<div class="card-body">
						<div class="form-group">
							<label for="InputTextTitle">Título</label>
							<input type="text" class="form-control <?= isset($validation) && $validation->hasError('title') ? 'is-invalid' : '' ?>" name="title" id="InputTextTitle" placeholder="Título do post" value="<?= isset($titlepost) ? $titlepost : set_value('title') ?>">
							<span class="text-danger"><?= isset($validation) ? display_error($validation,'title') : '' ?></span>
						</div>
						<div class="form-group">
							<label for="InputTextAreaBody">Postagem</label>
							<textarea class="form-control <?= isset($validation) && $validation->hasError('body') ? 'is-invalid' : '' ?>" name="body" id="InputTextAreaBody" rows="9" placeholder="Digite o que quiser ..."><?= isset($body) ? $body : set_value('body') ?></textarea>
							<span class="text-danger"><?= isset($validation) ? display_error($validation,'body') : '' ?></span>
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