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
			<form action="<?= base_url('/admin/posts/store') ?>" method="post" enctype="multipart/form-data">
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
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="row">
								<label for="InputFile">Imagem</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="InputFile" name="blog-imagem">
										<label class="custom-file-label" for="InputFile">Escolher</label>
									</div>										
								</div>
							</div>
							<div class="row">
								<span class="text-danger"><?= isset($validation) ? display_error($validation, 'blog-imagem') : '' ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<?php if(!empty($photo_post) && !is_null($photo_post)): ?>
							<label for="InputFile">Foto atual</label>
							<div class="form-group">											
								<img class="img-fluid img-thumbnail" src="<?= base_url('upload/posts-img/'.$photo_post) ?>" alt="image" >								
							</div>
							<?php endif; ?>							
						</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
				<!-- /.card-body -->
				<input type="hidden" name="id" value="<?= isset($id) ? $id : set_value('id') ?>">
			</form>
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>
<?= $this->endSection() ?>