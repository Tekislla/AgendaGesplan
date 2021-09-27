<?php

    session_start();

    function login(){

        //lê os usuários do arquivo e converte em um array
        $lista_usuarios = file_get_contents("usuarios.json");
        $lista_convertida = json_decode($lista_usuarios, true);

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        foreach ($lista_convertida as $usuario) {

            if ($login == $usuario['login'] && $senha == $usuario['senha']) {

                $_SESSION['nome']        = $usuario['nome'];
                $_SESSION['esta_logado'] = true;

                header("Location: index.php");

            }
        }

        if (!$_SESSION['esta_logado']){
            header("Location: login.php");
        }
    }

    function logout(){
        //sair
        session_destroy();
        //redirecionar
        header("Location: login.php");
    }

    //ROTAS
    if ($_GET['acao'] == 'login'){
        login();
    }

    if ($_GET['acao'] == 'sair'){
        logout();
    }