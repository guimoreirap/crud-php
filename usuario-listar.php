<?php

    require_once("verificaSessao.php");

    require_once ('conexao.php');

    if(isset($_POST['excluir'])){
        $id = $_POST['id'];
        $sql = "delete from usuario where id = {$id}";

        mysqli_query($conexao, $sql);

        $mensagem = "Registro excluído com sucesso.";
    }

    $where = '';
    if(isset($_POST['pesquisar'])){
        if(isset($_POST['nome'])){
            $where = "and usuario.nome like '%". $_POST['nome'] ."%' ";
        }
    }

    $sql = "select usuario.*, grupousuario.nome as grupousuario_nome
            from usuario
        left join grupousuario on grupousuario.id = usuario.grupousuario_id
            where 1 = 1
                $where
        order by usuario.status desc, usuario.nome";

    $resultado = mysqli_query($conexao, $sql);

    $qtd = mysqli_num_rows($resultado);

    mysqli_close($conexao);
?>
    <?php
    
        $titulo = "Usuário Listar";
        require_once ('cabecalho.php'); 

        $mensagem = "Listar Usuário";
        require_once ('card.php'); 
    ?>
        <!--FILTRO POR NOME -->
        <form name="form" class="pt-3" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" aria-describedby="nome">
        </div>
        <button name="pesquisar" type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>  Search
        </button>

    </form>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Grupo de Usuario</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    while ($linha = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td> <?= $linha['id'] ?></td>
                        <td> <?= $linha['nome'] ?></td>
                        <td> <?= $linha['email'] ?></td>
                        <td> <?= $linha['grupousuario_nome'] ?></td>
                        <td> <?= $linha['status'] == 'S' ? 'Sim' : 'Não' ?></td>
                        <td  class="d-flex">
                                <form action="usuario-alterar.php" method="post">
                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">

                                    <button type="submit" name="alterar" value="alterar" class="btn btn-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                    </button>
                                </form>

                                <form action="usuario-listar.php" method="post" onsubmit="return confirm('Tem certeza que quer excluir o registro?')">          

                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                                    <button type="submit" name="excluir" value="excluir" class="btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>
                    

                    <?php endwhile ?>
            </tbody>
        </table>
        <a href="usuario-cadastrar.php">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Cadastrar
            </button>
        </a>

        

    <?php require_once('rodape.php'); ?>