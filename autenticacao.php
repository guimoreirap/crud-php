<?php

if (isset($_POST['email']) && isset($_POST['senha'])){

    //Receber os dados
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    require_once("conexao.php");

    $sql = "select * from usuario where email = '{$email}'";      
    $resultado = mysqli_query($conexao, $sql);
    $totalDeRegistros =  mysqli_num_rows($resultado);

    $usuario = mysqli_fetch_array($resultado);

    if ($totalDeRegistros == 1 && password_verify($senha, $usuario['senha'])){
        //Proceder com o login 

        //Inicia a sessão se não tiver nenhuma sessão ativa
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        header("location: principal.php");
        die();
        
    } else {
        $mensagem = "Usuario/Senha invalidos";
        header("location: login-usuario.php?mensagem={$mensagem}");
        die();
    }
} 


?>