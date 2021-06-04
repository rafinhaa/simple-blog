<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <div class="row">


		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Imagem</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="<?= base_url('admin/blog/upload')?>" method="post" enctype="multipart/form-data">
					<?= csrf_field() ?>
					<div class="card-body">
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
							<div class="col-md-6 text-center">
                                <label for="InputFile">Foto atual</label>
                                <div class="form-group">
									<?php if( file_exists(set_realpath('assets/images/blog-personal-image.png'))): ?>
                                        <img class="img-fluid img-thumbnail img-circle" src="<?= base_url('assets/images/blog-personal-image.png') ?>" alt="image" >			
                                    <?php else: ?>
                                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/images/profile.png') ?>" alt="image" >
                                    <?php endif; ?>
                                </div>
							</div>
						</div>						
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
			<!-- /.card -->
		</div>
		<!--/.col (left) -->
<?= $this->endSection() ?>