<?php

include_once "conexao.php";

//Fazendo uma consulta no DB para visualizar a lista de clientes.
$clientes = $conectar->query("SELECT id, nome, email, telefone, data_nascimento, data_cadastro
FROM clientes ORDER BY data_cadastro ASC");

$num_clientes = $clientes->rowCount();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de clientes</h1>
    <p>Estes são os clientes cadastrados atualmente:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </thead>
        <tbody>
        <?php
            if($num_clientes === 0){
                echo    "<tr>
                            <td colspan='7'>Você não tem nenhum cliente cadastrado.</td>
                        </tr>";
            } else{
                while($linha = $clientes->fetch(PDO::FETCH_ASSOC)){ 
                    $telefone = "Não informado";
                    if(!empty($linha['telefone'])){
                        $ddd = substr($linha['telefone'], 0, 2);
                        $parte1 = substr($linha['telefone'], 2, 5);
                        $parte2 = substr($linha['telefone'], 7);  
                        $telefone = "($ddd) $parte1-$parte2";
                    }
                    $data_nascimento = "Não informado";
                    if($linha['data_nascimento'] != "0000-00-00"){
                        $data_nascimento = date("d/m/Y", strtotime($linha['data_nascimento']));
                    }
                    $data_cadastro = date("d/m/Y - H:i", strtotime($linha['data_cadastro']));
        ?>
                    <tr>
                        <td><?php echo htmlspecialchars($linha['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($linha['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($telefone, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($data_nascimento, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($data_cadastro, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="editar_cliente.php?id=<?php echo $linha['id'];?>">Editar</a> - <a href="deletar_cliente.php?id=<?php echo $linha['id'];?>">Deletar</a>
                        </td>
                    </tr>
        <?php }} ?>
        </tbody>
    </table>
    <p><a href="cadastrar_cliente.php">Clique aqui</a> para <b>cadastrar um cliente<b></p>
</body>
</html>