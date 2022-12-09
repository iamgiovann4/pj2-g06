<?php
    session_start();
    require "database/database.php";

    $erro = array();
    
    $email = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($email['ok'])) { //empty = vazio || só acessa esse if qnd o usuario clicar no botao
        $email = $_POST['email'];
        
        $query_senha = "SELECT id, senha_usuario 
                          FROM usuarios 
                          WHERE email = '$email'"; //salvando esse texto na variavel

        $query_alter = $connect->prepare($query_senha);//fazendo o select no BDD
       
        $query_alter->execute();//executando a query

            if(($query_alter) AND ($query_alter->rowCount() != 0)){//se a qtnd de linha que encontrou no BDD for ! 0,     então acessar o IF 
            
                $row_usuario = $query_alter->fetch(PDO::FETCH_ASSOC);//lendo o valor com o fetch
                //var_dump($row_usuario);
                if($row_usuario == 0 ){
                    echo $erro[] = "<span style='color: #ff0000'>Erro: Usuário ou senha inválida!</span>";
                    }
                if ($row_usuario != 0) {
                    $novasenha = substr(md5(time()), 0, 6);                   
                    $senhacripto = password_hash($novasenha, PASSWORD_DEFAULT);
                    echo('Sua nova senha é: ' . $novasenha);
//mail($email, "Sua nova senha", "Sua nova senha é: ".$senhacripto)
                    if (1==1) {
                        $update = "UPDATE usuarios set senha_usuario = '$senhacripto' WHERE email = '$email'";
                        
                        $stmt = $connect->prepare($update);//fazendo o select no BDD

                        $stmt->execute();

                        echo'<br>';
                        echo $_SESSION['sucess'] = 'Senha alterada com sucesso';
                        }
                }
    }else {
                    echo $_SESSION['error'] = "<span style='color: #ff0000'>Erro: Usuário ou senha inválida!</span>";
                }}

?>

<!DOCTYPE html>
<html lang="pt - BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
    <style>
        body, html{
            background-color: #3ecbff;
            height: 100%;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form > input{
            border-radius: 7px;
            border: 2px solid #ffbb9a;
            padding: 10px;
        }
        form{
            display:flex;
            flex-direction: column;

        }

        form > button{
            padding: 5px;
            border: 2px solid #ffbb9a;
        }

        form > button:hover{
            background-color: #007affcc;
        }
        a > button{
            padding: 5px;
            border: 2px solid #ffbb9a;
            width: 100%;
        }
        a > button:hover{
            background-color: #007affcc;
        }

        .caixa{
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: aliceblue;
            box-shadow: 8px 8px 8px 7px black;
        }
    </style>
</head>
<body>
    <div class="caixa">
    <form action="" method="post">
        <h2>Recuperação de senha</h2>
        <label for="email"></label>
        <input type="email" name="email" placeholder="Digite seu e-mail"><br>
        <button type="submit" name="ok" value="ok">Enviar</button>
        
    </form><br>
    <a href="index.php"><button>Voltar</button></a></div>
    
</body>
</html>