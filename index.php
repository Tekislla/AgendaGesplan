<?php
    session_start();

    $existe = isset($_SESSION['esta_logado']);

    if($existe == false){
        header("Location: login.php");
    }

    require 'agendaCRUD.php';

    if ($_GET['acao'] != 'buscar'){
        $meusContatos = pegarContatos();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container" style="margin-top: 30px;">


    <a href="verificaUsuario.php?acao=sair"><button class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span></button></a>
    <h1 align="center">Bem vindo à agenda!</h1>
    <br>
    <br>
    <br>
    <br>

    <!-- CADASTRO-->
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" action="agendaCRUD.php?acao=cadastrar" method="post" >



                <!--nome-->
                <div class="col-md-6">
                    <label for="nome"></label>
                    <input name="nome" required type="text" class="form-control" id="nome" placeholder="Nome" style="width: 450px">
                </div>

                 <!--sobrenome-->
                 <div class="col-md-6">
                    <label for="sobrenome"></label>
                    <input name="sobrenome" required type="text" class="form-control" id="sobrenome" placeholder="Sobrenome" style="width: 220px">
                </div>


                <!--email-->
                <div class="col-md-6">
                    <br>
                    <label for="email"></label>
                    <input name="email" required type="email" class="form-control" id="email" placeholder="Email" style="width: 450px">
                </div>

                <!--telefone-->
                <div class="col-md-4">
                    <br>
                    <label for="telefone"></label>
                    <input name="telefone" required type="number" class="form-control" id="telefone" placeholder="Telefone" style="width: 220px">
                </div>

                <!--observação-->
                <div class="col-md-10">
                    <br>
                    <label for="observacao"></label>
                    <input name="observacao" type="text" class="form-control" id="observacao" placeholder="Observação" style="width: 790px">
                </div>
<br><br><br>
                <button type="submit" class="btn btn-success">Cadastrar
                    <span class="glyphicon glyphicon-save"></span>
                </button>
                <br><br><br><br><br>

            </form>
            <div class="row">
                <div class="col-md-10" style="margin-left: 19px">
                    <form action="index.php?acao=buscar" method="post">
                        <div class="input-group col-md-10" style="float: left">
                            <input type="text" required class="form-control" id="busca" name="busca" value="<?= $_POST['busca'] ?>" placeholder="Pesquisar Contato">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit"> Pesquisar
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div class="input-group-btn">
                        </div>
                        <?php if ($_GET['acao'] == 'buscar'): ?>
                            <div class="form-group  col-md-1">
                                <a class="btn btn-info form-group" style="float: right"  href="index.php">
                                    <span class="glyphicon glyphicon-refresh" </span></a>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <!--CONTATOS-->
    <div class="row">
        <div class="col-md-12">

            <!-- Conteúdo -->
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Observação</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <!-- repetir -->
                <?php foreach ($meusContatos as $contato): ?>
                    <tr>
                        <td><?= $contato['id'] ?>        </td>
                        <td><?= $contato['nome'] ?>      </td>
                        <td><?= $contato['sobrenome'] ?> </td>
                        <td><?= $contato['email'] ?>     </td>
                        <td><?= $contato['telefone'] ?>  </td>
                        <td><?= $contato['observacao'] ?></td>
                        <td>
                            <a href="agendaCRUD.php?acao=excluir&id=<?= $contato['id'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </a>
                            <a href="editarContato.php?id=<?= $contato['id'] ?>">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>