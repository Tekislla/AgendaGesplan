<?php

    ini_set('display_errors', 0 );
    error_reporting(0);

    function transformaArray(string $arquivo){                             //FUNÇÃO PARA TRANSFORMAR DADOS JSON EM ARRAY

        $conteudo = file_get_contents($arquivo, true);                                  //PEGAR OS DADOS DO ARQUIVO JSON
        $conteudo = json_decode($conteudo, true);                                      //CONVERTER DADOS JSON PARA ARRAY

        return $conteudo;
    }

    function transformaJson(array $variavel, string $arquivo){                   //FUNÇÃO PARA TRANSFORMAR ARRAY EM JSON

        $conteudo = json_encode($variavel, JSON_PRETTY_PRINT);                              //TRANSORMAR ARRAY PARA JSON
        file_put_contents($arquivo, $conteudo);                                     //ATUALIZAR CONTEÚDO DO ARQUIVO JSON

    }


    function cadastrar(){                                                                         //CADASTRAR UM USUÁRIO

        $contatos = transformaArray("contatos.json");                                  //TRANSFORMAR DADOS JSON EM ARRAY

        $contato = [
            "id"         => uniqid(),                                                                   //GERAR ID ÚNICO
            "nome"       => $_POST['nome'],                                         //PEGAR O VALOR 'NOME' DO FORMULÁRIO
            "sobrenome"  => $_POST['sobrenome'],                               //PEGAR O VALOR 'SOBRENOME' DO FORMULÁRIO
            "email"      => $_POST['email'],                                       //PEGAR O VALOR 'EMAIL' DO FORMULÁRIO
            "telefone"   => $_POST['telefone'],                                 //PEGAR O VALOR 'TELEFONE' DO FORMULÁRIO
            "observacao" => $_POST['observacao']                              //PEGAR O VALOR 'OBSERVAÇÃO' DO FORMULÁRIO
        ];

        array_push($contatos, $contato);                                                     //ADICIONA VALORES AO ARRAY

        transformaJson($contatos, "contatos.json");                                           //TRANSFORMA ARRAY EM JSON

        header('Location: index.php');                                                //REDIRECIONAR PARA PÁGINA INICIAL

    }                                                                                                    //FIM DA FUNÇÃO

     function cadastrarUsuario(){                                                     //FUNÇÃO PARA CADASTRAR UM USUÁRIO
        
        $usuarios = transformaArray("usuarios.json");                                  //TRANSFORMAR DADOS JSON EM ARRAY

        $usuario = [
            "nome"     => $_POST['nome'],                                                       //PEGAR O NOME INFORMADO
            "login"    => $_POST['login'],                                                     //PEGAR O LOGIN INFORMADO
            "senha"    => $_POST['senha']                                                      //PEGAR A SENHA INFORMADA
                                               
        ];

        array_push($usuarios, $usuario);                                             //INSERIR DADOS INFORMADOS NO ARRAY
 
        transformaJson($usuarios, "usuarios.json");                                           //TRANSFORMA ARRAY EM JSON

        header('Location: login.php');                                                 //REDIRECIONAR PARA TELA DE LOGIN
    }                                                                                                    


    function pegarContatos(){                                            //FUNÇÃO PARA PEGAR OS CONTATOS DO ARQUIVO JSON

        $contatos = transformaArray("contatos.json");                                  //CONVERTER DADOS JSON PARA ARRAY
        
        return $contatos;                                                                         //RETORNAR OS CONTATOS
     }                                                                                                   //FIM DA FUNÇÃO

    function pesquisarContato($valorBuscado){                                         //FUNÇÃO PARA PESQUISAR UM CONTATO

        $contatos = transformaArray("contatos.json");                                  //CONVERTER DADOS JSON PARA ARRAY

        $novosContatos = [];                                                             //GUARDAR OS CONTATOS NUM ARRAY

        foreach ($contatos as $contato) {                                    //TRATAR CADA CONTATO COMO UM CONTATO ÚNICO

            if($contato['nome'] == $valorBuscado){                             //RETORNAR O CONTATO DE ACORDO COM SEU ID
                $novosContatos[] = $contato;                                               //ADICIONAR CONTATOS AO ARRAY
            }
        }

        return $novosContatos;                                                                 //RETORNAR NOVOS CONTATOS

    }                                                                                                    //FIM DA FUNÇÃO

    function buscarContatoParaEditar($valorBuscado){                                     //FUNÇÃO PARA EDITAR UM CONTATO

        $contatos = transformaArray("contatos.json");                                  //CONVERTER DADOS JSON PARA ARRAY


        foreach ($contatos as $contato) {                                    //TRATAR CADA CONTATO COMO UM CONTATO ÚNICO

            if($contato['id'] == $valorBuscado){                                        //COMPARAR O CONTATO COM PELO ID
                return $contato;                                                          //RETORNAR CONTATO PARA EDITAR
            }
        }

        return null;                                                        //RETORNAR NULO CASO NÃO ENCONTRE UM CONTATO

    }

    function salvarContatoEditado($id){                                           //FUNÇÃO PARA SALVAR O CONTATO EDITADO

        $contatosAuxiliar = transformaArray("contatos.json");                          //CONVERTER DADOS JSON PARA ARRAY

        foreach ($contatosAuxiliar as $posicao => $contato){                       //TRATAR DAS INFORMAÇÕES PELA POSIÇÃO
            if ($contato['id'] == $id){                                         //COMPARAR O ID DO CONTATO A SER EDITADO

                $contatosAuxiliar[$posicao]['nome'] = $_POST['nome'];                     //SUBSTITUIR NOME PELO EDITADO
                $contatosAuxiliar[$posicao]['sobrenome'] = $_POST['sobrenome'];           //SUBSTITUIR NOME PELO EDITADO
                $contatosAuxiliar[$posicao]['email'] = $_POST['email'];                  //SUBSTITUIR EMAIL PELO EDITADO
                $contatosAuxiliar[$posicao]['telefone'] = $_POST['telefone'];         //SUBSTITUIR TELEFONE PELO EDITADO
                $contatosAuxiliar[$posicao]['observacao'] = $_POST['observacao'];     //SUBSTITUIR TELEFONE PELO EDITADO

                break;                                                                                           //PARAR
            }
        }

        transformaJson($contatosAuxiliar, "contatos.json");                                   //TRANSFORMA ARRAY EM JSON

        header('Location: index.php');                                                       //REDIRECIONAR PARA O INDEX

    }                                                                                                    //FIM DA FUNÇÃO


    function excluirContato($idContato){                                                //FUNÇÃO PARA EXCLUIR UM CONTATO

        $contatos = transformaArray("contatos.json");                                  //CONVERTER DADOS JSON PARA ARRAY

        foreach($contatos as $posicao => $contato){                   //TRATAR CADA INFORMAÇÃO DO CONTATO EM SUA POSIÇÃO

            if($contato['id'] == $idContato){                                    //REMOVE O CONTATO DE ACORDO SOM SEU ID
                unset($contatos[$posicao]);
                break;
            }
        }

        transformaJson($contatos, "contatos.json");                                           //TRANSFORMA ARRAY EM JSON

        header('Location: index.php');                                                //REDIRECIONAR PARA PÁGINA INICIAL

    }                                                                                                    //FIM DA FUNÇÃO


    //GERENCIAMENTO DE ROTAS

    if ($_GET['acao'] == 'cadastrar'){
        cadastrar();                                                                     //CHAMADA PARA FUNÇÃO CADASTRAR
    } elseif($_GET['acao'] == 'excluir'){
        excluirContato($_GET['id']);                                                       //CHAMADA PARA FUNÇÃO EXCLUIR
    } elseif ($_GET['acao'] == 'editar'){
        salvarContatoEditado($_GET['id']);                                     //CHAMADA PARA FUNÇÃO DE SALVAR O CONTATO
    }
    if ($_GET['acao'] == 'cadastrarUsuario'){
        cadastrarUsuario();                                                      //CHAMADA PARA FUNÇÃO CADASTRAR USUÁRIO
    }
    if ($_GET['acao'] == 'buscar'){                                                     //CHAMADA PARA A FUNÇÃO DE BUSCA
        $meusContatos = pesquisarContato($_POST['busca']);
    }