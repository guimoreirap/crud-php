<?php
    require_once('verificaSessao.php');

    require_once('conexao-cliente.php');

    if(isset($_POST['excluir'])){
        $id = $_POST['id'];
        $sql = "delete from cliente where id = {$id}";

        mysqli_query($conexao, $sql);

        $mensagem = "Registro excluído com sucesso.";
    }

    $sql = "select * from cliente";

    $resultado = mysqli_query($conexao, $sql);

    $qtd = mysqli_num_rows($resultado);

    mysqli_close($conexao);
?>

<?php
    $titulo = "Lista de clientes";
    require_once('cabecalho.php');
?>

<?php
    $mensagem = "Lista de clientes";
    require_once('card.php');
?>

    <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Número</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($linha = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td> <?= $linha['id'] ?></td>
                        <td> <?= $linha['nome'] ?></td>
                        <td> <?= $linha['email'] ?></td>
                        <td> <?= $linha['cpfcnpj'] ?></td>
                        <td> <?= $linha['telefone'] ?></td>
                        <td> <?= $linha['endereco'] ?></td>
                        <td> <?= $linha['numero'] ?></td>
                        <td> <?= $linha['cidade'] ?></td>
                        <td> <?= $linha['estado'] ?></td>
                        <td> <?= $linha['status'] ?></td>
                        <td  class="d-flex">
                                <form action="cliente-alterar.php" method="post">
                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">

                                    <button type="submit" name="alterar" value="alterar" class="btn btn-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                    </button>
                                </form>

                                <form action="cliente-listar.php" method="post" onsubmit="return confirm('Tem certeza que quer excluir o registro?')">          

                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                                    <button type="submit" name="excluir" value="excluir" class="btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                    </button>
                            </form>
                    </tr>

                <?php endwhile ?>
    </table>
    <a href="cliente-cadastrar.php">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>    Cadastrar
            </button>
    </a>

<?php require_once('rodape.php'); ?>