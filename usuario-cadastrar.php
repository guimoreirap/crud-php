<?php
    require_once("verificaSessao.php");
    require_once ("conexao.php");

    if (isset($_POST['salvar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $grupousuario_id = $_POST['grupousuario_id'];

        $sql = "insert into usuario (nome, email, senha, grupousuario_id) values ('{$nome}', '{$email}', '{$senha}', '{$grupousuario_id}')";

        mysqli_query($conexao, $sql);

        $mensagem = "Registro inserido com sucesso"; 
    }
?>

    <?php 
    $titulo = "Usuário Cadastrar";
    require_once ('cabecalho.php'); 
    ?>
            
    <?php 
    $mensagem = "Cadastrar Usuário";
    require_once ('card.php'); 
    ?>
    
    <!-- FORMULARIO -->
    <form name="form" class="pt-3" method="post">
        <!-- NOME -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" aria-describedby="nome">
        </div>
        <!-- EMAIL -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
        </div>
        <!-- SENHA -->
        <div class="mb-3">
            <label for="senha" class="form-label">senha</label>
            <input name="senha" type="password" class="form-control" id="senha">
        </div>
        
        <!-- GRUPO DE USUARIO -->
        <div class="mb-3">
            <label for="grupousuario_id">Grupo de Usuario</label>
            <select name="grupousuario_id" id="grupousuario_id" class="form-select">
                <option value="">-- Selecione --</option>

                <?php
                    $sql = "select * from grupousuario order by nome";
                    $resultado = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultado)):
                ?>
                
                <option value="<?= $linha['id'] ?>" > <?= $linha['nome'] ?> </option>
                <?php endwhile; ?>
                
            </select>
        </div>

        <button name="salvar" type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>  Save
        </button>

        <a href="usuario-listar.php">
            <button type="button" class="btn btn-dark">
                <i class="fas fa-undo"></i> Voltar
            </button>
        </a>
    </form>

<?php mysqli_close($conexao); ?>
<?php require_once('rodape.php'); ?>