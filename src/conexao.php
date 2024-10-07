<?php


//Conectando ao banco de dados MySQL
try{

    $conectar = new PDO("mysql:host=db;port=3306;dbname=crud_base", "user", "userpass");
    

} catch(PDOexception $e){

    echo "Falha ao conectar!";

}


//

?>