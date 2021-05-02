<h2>Posts</h2>
<div class="row my-3">
    <a class="btn btn-primary" href="<?= base_url('/posts/create') ?>">Criar Post</a>
</div>
<table class="table">
    <tr>
        <td>Titulo</td>
        <td>Acão</td>
    </tr>
    <?php if (! empty($posts) && is_array($posts)) : ?>
        <?php foreach ($posts as $posts_item): ?>
            <tr>
                <td>
                    <a href="<?= base_url('/posts/view/' . $posts_item['slug'] ) ?>"><?= $posts_item['title'] ?></a>
                </td>
                <td>
                    <a href="<?= base_url('/posts/edit/' . $posts_item['slug'] ) ?>">Editar</a>
                    <a href="<?= base_url('/posts/delete/' . $posts_item['slug'] ) ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colsspan="2">Não foi possível encontrar qualquer postagem para você</td>
        </tr>                
    <?php endif ?>
</table>