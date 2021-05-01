<h2><?=  isset($slug) ? 'Editando' : 'Novo post'  ?></h2>
<?= \Config\Services::validation()->listErrors() ?>

<form action="<?= base_url('/posts/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input class=="form-control" type="input" name="title" />
    </div>
    <div class="form-group">
        <label for="body">Text</label>
        <textarea class=="form-control" name="body"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Salvar" />
    </div>
    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
</form>