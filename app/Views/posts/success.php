<div class="pt-5">
    <div class="alert alert-success">
        <?= isset($info) ? $info : 'Nenhuma mensagem recebida.'?>
    </div>
    <a class="btn btn-primary" href="<?= base_url('/posts'); ?>">Ultimas postagens</a>
    <a class="btn btn-success" href="<?= base_url('/posts/create'); ?>">Novo post</a>
</div>