<?php
    require_once('verificaSessao.php');

    if(isset($_POST['salvar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $status = $_POST['status'];

        require_once('conexao-cliente.php');

        $sql = "insert into cliente (nome, email, senha, cpfcnpj, telefone, endereco, numero, cidade, estado, status) values ('{$nome}', '{$email}', '{$senha}', '{$cpf}', '{$telefone}', '{$endereco}', '{$numero}', '{$cidade}', '{$estado}', '{$status}')";

        mysqli_query($conexao, $sql);
        mysqli_close($conexao);

        $mensagem = "Registro inserido com sucesso!";
    }

    $titulo = 'Cadastro de cliente';
    require_once('cabecalho.php');

    $mensagem = 'Cadastro de cliente';
    require_once('card.php');
?>

<div class="container-fluid">
    <form name="form" class="pt-3" method="post">
        <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" aria-describedby="nome">
        </div>
        <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
        </div>
        <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="senha">
        </div>
        <div class="mb-3">
                <label for="cpf" class="form-label">CPF/CNPJ</label>
                <input name="cpf" type="text" class="form-control" id="cpf" aria-describedby="cpf">
        </div>
        <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input name="telefone" type="number" class="form-control" id="telefone" aria-describedby="telefone">
        </div>
        <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input name="endereco" type="text" class="form-control" id="endereco" aria-describedby="endereco">
        </div>
        <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input name="numero" type="number" class="form-control" id="numero" aria-describedby="numero">
        </div>
        <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input name="cidade" type="text" class="form-control" id="cidade" aria-describedby="cidade">
        </div>
        <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input name="estado" type="text" class="form-control" id="estado" aria-describedby="estado">
        </div>
        <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input name="status" type="text" class="form-control" id="status" aria-describedby="status">
        </div>
        
            <button name="salvar" type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>  Save
            </button>

            <a href="cliente-listar.php">
                <button type="button" class="btn btn-dark">
                    <i class="fas fa-undo"></i> Voltar
                </button>
            </a>
    </form>
</div>
<br>
<br>

<?php
    require_once('rodape.php');
?>