<?php $pager->setSurroundCount(2) ?>
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= 'Primeira' ?>">
            <span aria-hidden="true"><?= 'Primeira' ?></span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= 'Anterior' ?>">
            <span aria-hidden="true"><?= 'Anterior' ?></span>
            </a>
        </li>
        <?php endif ?>
        <?php foreach ($pager->links() as $link) : ?>
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>">
            <?= $link['title'] ?>
            </a>
        </li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= 'Próxima' ?>">
            <span aria-hidden="true"><?= 'Próxima' ?></span>
            </a>
        </li>
        <li class="page-link" class="page-item">
            <a href="<?= $pager->getLast() ?>" aria-label="<?= 'Última' ?>">
            <span aria-hidden="true"><?= 'Última' ?></span>
            </a>
        </li>
        <?php endif ?>
    </ul>
</nav>