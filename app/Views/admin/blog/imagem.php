<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('admin/blog/upload')?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">                        
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="blog-imagem">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'blog-imagem') : '' ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>