<?php

include_once "conexao.php";

//Essa função vai ser usada para manter apenas o números que o usuário digitar no campo telefone,
//sem considerar parênteses, traços ou qualquer outra coisa.
//É importante pra subir corretamente no DB.
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

$erro = false;


$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
//obtendo id do cliente e garantindo que é um número inteiro.

//Se o formulário de edição é enviado, os campos recebem seus respectivos valores e acontece uma verificação
//para saber se foram ou não preenchidos corretamente.
//Se existir algum erro, o programa informará no topo da tela. Caso não, é feito um UPDATE no DB.
if(count($_POST) > 0){
$nome = $_POST['nome']; 
$email = $_POST['email']; 
$telefone = $_POST['telefone']; 
$data_nascimento = $_POST['data_nascimento']; 

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
            $update = $conectar->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento
            WHERE id = :id");

            $update->bindParam(':nome', $nome);
            $update->bindParam(':email', $email);
            $update->bindParam(':telefone', $telefone);
            $update->bindParam(':data_nascimento', $data_nascimento);
            $update->bindParam(':id', $id);
            $update->execute();
            if($update){
                header("Location: index.php");
            }
        }
}


$consulta = $conectar->prepare("SELECT * FROM clientes WHERE id = :id"); 
$consulta->bindParam(':id', $id, PDO::PARAM_INT);
$consulta->execute();
$cliente = $consulta->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    
    

    <p><a href="index.php">Voltar à Lista de Clientes</a></p>
    <form action="" method="POST">
        <p>
            <label>Nome*:</label>
            <input value="<?php echo $cliente['nome'];?>" type="text" name="nome" placeholder="Insira seu nome">
        </p>
        <p>
            <label>Email*:</label>
            <input value="<?php echo $cliente['email'];?>" type="email" name="email" placeholder="Insira seu email">
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php echo $cliente['telefone']?>" type="tel" name="telefone" placeholder="(44) 99999-9999">
        </p>
        <p>
            <label>Data de nascimento:</label>
            <input value="<?php echo $cliente['data_nascimento'];?>"type="date" name="data_nascimento">
        </p>
        <button type="submit" name="enviar">Editar Cliente</button>
    </form>
</body>
</html>