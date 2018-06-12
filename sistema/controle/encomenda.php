<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "bancopa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Erro ao Conectar: " . $conn->connect_error);
}

//Abaixo atribuímos os valores provenientes do formulário pelo método POST
$cliente = $_SESSION["login"];
$nome = $_POST["nome"];
$peso = $_POST["peso"];

$sql_news = "INSERT INTO encomendas (cliente, nome, peso) VALUES ('$cliente', '$nome', '$peso')"; //String com consulta SQL da inserção


if ($conn->query($sql_news) === TRUE) { //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
    echo "<script language='javascript' type='text/javascript'>
alert('Contato cadastrado!');javascript:history.back()</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
alert('Erro ao cadastrar!');javascript:history.back()</script>";
}


?>

