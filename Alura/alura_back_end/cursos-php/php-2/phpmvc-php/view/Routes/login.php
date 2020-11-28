<!doctype html>
<html lang="en">
<head>
    <?php require_once __DIR__.'/../Components/header.php'; ?>
</head>
<body>
    <div class="container">
        <?php require_once __DIR__.'/../Components/cabecalho.php'; ?>
        <form action="/realizar-login" method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html>
