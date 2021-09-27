<?php 
    require 'agendaCRUD.php';
?>

<!doctype html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br><br>
<h1 align="center">Cadastre-se!</h1>
<form class="form-horizontal" onsubmit="return validacao()" id="formulario" action="agendaCRUD.php?acao=cadastrarUsuario" method="post">
    <fieldset>
        <br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome</label>
            <div class="col-md-4">
                <input name="nome" required id="nome" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Login</label>
            <div class="col-md-4">
                <input name="login" required id="login" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Senha</label>
            <div class="col-md-4">
                <input name="senha" required id="senha" type="password" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Confirme a Senha</label>
            <div class="col-md-4">
                <input name="confirmaSenha" required id="confirmaSenha" type="password" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Cadastrar
                    <span class="glyphicon glyphicon-ok">
                </button>
            </div>
        </div>

    </fieldset>
</form>
</body>
</html>
<script>
    function validacao(){
        if(document.getElementById('senha').value != document.getElementById('confirmaSenha').value){
            window.alert('As senhas informadas são diferentes!');
            document.getElementById('confirmaSenha').focus();
            return false;
        }
    }
</script>