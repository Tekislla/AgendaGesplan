<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br><br>
<h1 align="center">Faça o login para acessar a agenda.</h1>
<h6 align="center">(entre com "admin", "admin", "admin" ou cadastre um novo usuário).</h6>
<form class="form-horizontal" action="../controller/verificaUsuario.php?acao=login" method="post" onsubmit= validaUsuario()>
    <fieldset>
        <br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome</label>
            <div class="col-md-4">
                <input name="nome" id="nome" required type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Login</label>
            <div class="col-md-4">
                <input name="login" id="login" required type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Senha</label>
            <div class="col-md-4">
                <input name="senha" id="senha" required type="password" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Entrar 
                    <span class="glyphicon glyphicon-log-in">
                </button>

                <a href="cadastro.php">
	                 <button type="button" class="btn btn-warning">
	                 Cadastre-se
	                    <span class="glyphicon glyphicon-user">
	                 </button>
	                
	            </a>
            </div>
        </div>

    </fieldset>
</form>
</body>
</html>