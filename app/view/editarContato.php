<?php
    require '../model/agendaCRUD.php';
    $contato = buscarContatoParaEditar($_GET['id']);
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
<h1 align="center">Edite o Contato</h1>
<form class="form-horizontal" action="../model/agendaCRUD.php?acao=editar&id=<?= $contato['id'] ?>" method="post">
    <fieldset>
        <br><br><br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome</label>
            <div class="col-md-4">
                <input name="nome" required placeholder="<?= $contato['nome'] ?>" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Sobrenome</label>
            <div class="col-md-4">
                <input name="sobrenome" required placeholder="<?= $contato['sobrenome'] ?>" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>
            <div class="col-md-4">
                <input name="email" required placeholder="<?= $contato['email'] ?>" type="email" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Telefone</label>
            <div class="col-md-4">
                <input name="telefone" required placeholder="<?= $contato['telefone'] ?>" type="number" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Observação</label>
            <div class="col-md-4">
                <input name="observacao" placeholder="<?= $contato['observacao'] ?>" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Salvar
                    <span class="glyphicon glyphicon-ok">
                </button>
            </div>
        </div>

    </fieldset>
</form>
</body>
</html>