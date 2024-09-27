<?php

include_once "conexao.php";

//Essa função vai ser usada para manter apenas o números que o usuário digitar no campo telefone,
//sem considerar parênteses, traços ou qualquer outra coisa.
//É importante pra subir corretamente no DB.
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}


$erro = false;


//Verificando se o formulário foi enviado.
//Caso sim, as variáveis recebem o que foi preenchido no forms por meio do método POST.
if(count($_POST) > 0){
$nome = $_POST['nome']; 
$email = $_POST['email']; 
$telefone = $_POST['telefone']; 
$data_nascimento = $_POST['data_nascimento']; 

    //Aqui são feitas algumas verificações, tais como se foram preenchidos nome e email (obrigatórios),
    //além de formatar o telefone com a função limpar_texto caso o usuário tenha preenchido.
    //Caso haja qualquer erro, o programa avisará. Caso não, ele prossegue pra inserção dos dados no DB.
    if(empty($nome)){
        $erro = "Preencha o nome:";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro = "Preencha o email:";
    }
    if(!empty($telefone)){
        $telefone = limpar_texto($telefone); 
        if(strlen($telefone) != 11){
            $erro = "O telefone deve ser preenchido no padrão: (44) 99999-9999";
        }
    }
    if($erro) {
        echo "<p><b>$erro<b></p>";
    } else{
            $insert = $conectar->prepare("INSERT INTO clientes (nome, email, telefone, data_nascimento, data_cadastro)
            VALUES (:nome, :email, :telefone, :data_nascimento, NOW())");

            $insert->bindParam(':nome', $nome);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':telefone', $telefone);
            $insert->bindParam(':data_nascimento', $data_nascimento);
            $insert->execute();
            if($insert){
                echo "Usuário cadastrado com sucesso!";
                unset($_POST);
            }
        }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    
    
    <p><a href="index.php">Voltar à Lista de Clientes</a></p>
    <form action="" method="POST">
        <p>
            <label>Nome*:</label>
            <input value="<?php if(!empty($_POST['nome'])) echo $nome;?>" type="text" name="nome" placeholder="Insira seu nome">
            <!-- O código PHP dentro do input entra para que, caso o usuário digite algo e dê algum erro na hora de submeter, ele não tenha que redigitar.-->
        </p>
        <p>
            <label>Email*:</label>
            <input value="<?php if(!empty($_POST['email'])) echo $email;?>" type="email" name="email" placeholder="Insira seu email">
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if(!empty($_POST['telefone'])) echo $telefone;?>" type="tel" name="telefone" placeholder="(44) 99999-9999">
        </p>
        <p>
            <label>Data de nascimento:</label>
            <input value="<?php if(!empty($_POST['data_nascimento'])) echo $data_nascimento;?>"type="date" name="data_nascimento">
        </p>
        <button type="submit" name="enviar">Cadastrar Cliente</button>
    </form>
</body>
</html>