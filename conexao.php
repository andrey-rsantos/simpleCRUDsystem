<?php


//Conectando ao banco de dados MySQL
try{

    $conectar = new PDO("mysql:host=;port=;dbname=", "", "");
    //Aqui seriam inseridos os dados de conexão com o banco via PDO.

} catch(PDOexception $e){

    echo "Falha ao conectar!";

}


//

?>