<?php


//Conectando ao banco de dados MySQL
try{

    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=crud_base", "root", "");

} catch(PDOexception $e){

    echo "Falha ao conectar!";

}


?>