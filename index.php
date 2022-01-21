<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <title>Login Usuário</title>
</head>
<body>
    <div class="container">

        <?php if (isset($_GET['mensagem'])) : ?>
            <div class="alert alert-warning" role="alert">
                <?= $_GET['mensagem'] ?>
            </div>
        <?php endif ?>

        <div class="card bg-light">
            <div class="card-body">
                <h2 class="card-title">Login Usuário</h2>
            </div>
        </div>
        
        
        <form action="autenticacao.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label" >Email </label>
                <input name="email" type="email" class="form-control" id="email">
            </div>      
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="senha" >
            </div>
            
            <button name="entrar" type="submit" class="btn btn-primary" value="Entrar">Enviar</button>
            <a href="index.php">
                <button type="button" class="btn btn-dark">
                    <i class="fas fa-undo"></i> Voltar
                </button>
            </a>
        </form>
    </div>
</body>
</html>