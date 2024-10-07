<?php

include_once "conexao.php";

//Para excluir um cliente, vamos pegar o ID dele pelo método GET e garantir que o número (id) seja inteiro.
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


//se o usuário clicar no botão "SIM", o código realiza a exclusão desse usuário no DB.
//Caso contrário, o usuário volta pra lista de clientes.
if(!empty($_POST['sim'])){
    $delete = $conectar->prepare("DELETE FROM clientes WHERE id = :id");
    $delete->bindParam(':id', $id);
    $delete->execute();
    echo "<p>Cliente Excluído com Sucesso!</p>
          <p><a href='index.php'>Clique aqui</a> para retornar à lista de clientes.";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar este cliente?</h1>
    
    <form action="" method="post">
        <a style="margin-right:10px;" href="index.php">NÃO</a>
        <button type="submit" name="sim" value="1">SIM</button>
    </form>
</body>
</html>
