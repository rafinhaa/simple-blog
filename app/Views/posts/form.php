<h2><?=  isset($id) ? 'Editando' : 'Novo post'  ?></h2>
<?= \Config\Services::validation()->listErrors() ?>

<form action="<?= base_url('/posts/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input class=="form-control" type="input" name="title" value="<?= isset($titlepost) ? $titlepost : set_value('title') ?>"/>
    </div>
    <div class="form-group">
        <label for="body">Text</label>
        <textarea class=="form-control" name="body"><?= isset($body) ? $body : set_value('body') ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Salvar" />
    </div>
    <input type="hidden" name="id" value="<?= isset($id) ? $id : set_value('id') ?>">
</form>