<?php
    require_once("verificaSessao.php");
    require_once('conexao.php');

    $id = $_POST['id'];

    if(isset($_POST['salvar'])){
        $nome            = $_POST['nome'];
        $email           = $_POST['email'];
        $status          = $_POST['status'];
        $grupousuario_id = $_POST['grupousuario_id'];

        $sql = "update usuario 
                                set nome            = '{$nome}',
                                    email           = '{$email}',
                                    status          = '{$status}',
                                    grupousuario_id = '{$grupousuario_id}'
                            where   id              =  {$id}";

        mysqli_query($conexao, $sql);
        $mensagem = "Registro atualizado com sucesso.";
    }

    $sql = "select * from usuario where id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

?>

<?php 
    $titulo = "Usuário Alterar";
    require_once ('cabecalho.php'); 
?>
            
    <?php 
        $mensagem = "Alterar Usuário";
        require_once ('card.php'); 
    ?>
            
        <form class="pt-3" method="post">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input name="nome" type="text" id="nome" class="form-control" value="<?= $linha['nome'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" id="email" class="form-control" value="<?= $linha['email'] ?>">
            </div>

            <div class="mb-3">
                <label for="grupousuario_id">Grupo de Usuario</label>
                <select name="grupousuario_id" id="grupousuario_id" class="form-select">
                    <option value="">-- Selecione --</option>

                    <?php
                        $sql = "select * from grupousuario order by nome";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($linhaGU = mysqli_fetch_array($resultado)){
                    ?>
                
                    <option value="<?= $linhaGU['id'] ?>"
                      <?= ($linha['grupousuario_id'] == $linhaGU['id']) ? 'selected' : '' ?> >
                      <?= $linhaGU['nome'] ?> 
                    </option>
                        <?php } ?>
                
                 </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Ativo</label>
                <select name="status" id="status" class="form-select" >
                    <option value="S" <?= ($linha['status'] == 'S' ? 'selected' : '') ?>>Sim</option>
                    <option value="N" <?= ($linha['status'] == 'N' ? 'selected' : '') ?>>Não</option>
                </select>
            </div>
            
            <button name="salvar" type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>  Salvar
            </button>

            <a href="usuario-listar.php">
                <button type="button" class="btn btn-dark">
                    <i class="fas fa-undo"></i> Voltar
                </button>
            </a>
        </form>

<?php require_once('rodape.php'); ?>