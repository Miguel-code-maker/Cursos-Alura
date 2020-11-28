<!DOCTYPE html>
<html lang="pt-br">
<?php require_once __DIR__ . '/../Components/header.php' ?>
<body>
    <?php require_once __DIR__. '/../Components/nav.php' ?>
<div class="container">
    <?php require_once __DIR__ . '/../Components/cabecalho.php' ?>

    <a href="/inserir-cursos" class="btn btn-primary mb-2">Adicionar novo curso</a>
    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>
                <div>
                    <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-info btn-sm">Alterar</a>
                    <a href="/deletar-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>