<!doctype html>
<html lang="pt-br">
<?php require_once __DIR__ . '/../Components/header.php' ?>
<body>
    <?php require_once __DIR__. '/../Components/nav.php';?>
<div class="container">
    <?php require_once __DIR__ . '/../Components/cabecalho.php' ?>
    <form <?= isset($curso)? "action='/salvar-curso?id={$curso->getId()}'": "action='/salvar-curso'" ?>  method='POST'>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" <?= !empty($curso)? "value='{$curso->getDescricao()}'" : '' ?>>
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>