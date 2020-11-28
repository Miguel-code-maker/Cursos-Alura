<div class="jumbotron">
    <h1><?= $title; ?></h1>
</div>
<?php if ($_SESSION['mensagem']) {?>
    <div class="alert alert-<?= $_SESSION['mensagem-tipo'];?>">
        <?= $_SESSION['mensagem'];?>
    </div>
<?php
    unset($_SESSION['mensagem']);
    unset($_SESSION['mensagem-tipo']);
} ?>

