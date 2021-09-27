<?php

    session_start();

    function login(){

        //LÊ OS USUÁRIOS DO ARQUIVO E OS CONVERTE EM UM ARRAY
        $lista_usuarios = file_get_contents("../../assets/json/usuarios.json");
        $lista_convertida = json_decode($lista_usuarios, true);

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        foreach ($lista_convertida as $usuario) {

            if ($login == $usuario['login'] && $senha == $usuario['senha']) {

                $_SESSION['nome']        = $usuario['nome'];
                $_SESSION['esta_logado'] = true;

                header("Location: ../../index.php");

            }
        }

        if (!$_SESSION['esta_logado']){
            header("Location: ../view/login.php");
        }
    }

    function logout(){
        //SAIR
        session_destroy();
        //REDIRECIONAR
        header("Location: ../view/login.php");
    }

    //ROTAS
    if ($_GET['acao'] == 'login'){
        login();
    }

    if ($_GET['acao'] == 'sair'){
        logout();
    }