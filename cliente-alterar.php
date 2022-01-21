<?php
    //conexao com o banco e verificação de sessão
    require_once('verificaSessao.php');
    require_once('conexao-cliente.php');
    
    //captura o id do front para ser pesquisado dentro do banco de dados
    $id = $_POST['id'];

    if(isset($_POST['salvar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $status = $_POST['status'];

        $sql = "update cliente 
                                set nome =  '{$nome}',
                                    email = '{$email}',
                                    cpfcnpj = '{$cpf}',
                                    telefone = '{$telefone}',
                                    endereco = '{$endereco}',
                                    numero = '{$numero}',
                                    cidade = '{$cidade}',
                                    estado = '{$estado}',
                                    status = '{$status}'
                            where   id =    {$id}";

        mysqli_query($conexao, $sql);
        $mensagem = "Registro atualizado com sucesso";
    } 

    //Captura os dados no banco para ser mostrado no front
    $sql = "select * from cliente where id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);


?>


<?php
    $titulo = "Alterar cliente";
    require_once('cabecalho.php');
?>
<?php
    $mensagem = "Alterar cliente";
    require_once('card.php');
?>

    <form name="form" class="pt-3" method="post">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">

        <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" value="<?= $linha['nome'] ?>">
        </div>
        <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="<?= $linha['email'] ?>">
        </div>
        <div class="mb-3">
                <label for="cpf" class="form-label">CPF/CNPJ</label>
                <input name="cpf" type="text" class="form-control" id="cpf" value="<?= $linha['cpfcnpj'] ?>">
        </div>
        <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input name="telefone" type="number" class="form-control" id="telefone" value="<?= $linha['telefone'] ?>">
        </div>
        <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input name="endereco" type="text" class="form-control" id="endereco" value="<?= $linha['endereco'] ?>">
        </div>
        <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input name="numero" type="number" class="form-control" id="numero" value="<?= $linha['numero'] ?>">
        </div>
        <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input name="cidade" type="text" class="form-control" id="cidade" value="<?= $linha['cidade'] ?>">
        </div>
        <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input name="estado" type="text" class="form-control" id="estado" value="<?= $linha['estado'] ?>">
        </div>
        <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input name="status" type="text" class="form-control" id="status" value="<?= $linha['status'] ?>">
        </div>
        
            <button name="salvar" type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>  Salvar
            </button>

            <a href="cliente-listar.php">
                <button type="button" class="btn btn-dark">
                    <i class="fas fa-undo"></i> Voltar
                </button>
            </a>
    </form>

    <?php
        require_once('rodape.php');
    ?>