<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancopa";

// Cria a Conexão com o Banco
$conn = new mysqli($servername, $username, $password, $dbname);
// Checa a conexão
if ($conn->connect_error) {
    die("Erro ao Conectar: " . $conn->connect_error);
}

//Abaixo atribuímos os valores provenientes do formulário pelo método POST
$nome = $_POST["nome"];
$email = $_POST["email"];
$ra = $_POST["ra"];
$senha = $_POST["senha"];
$status = $_POST["status"];

$sql = "INSERT INTO usuarios (nome, email, ra, senha, status) VALUES ('$nome', '$email', '$ra', '$senha', '$status')"; 
//String com consulta SQL da inserção


if ($conn->query($sql) === TRUE) { //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
    echo "<script language='javascript' type='text/javascript'>
alert('Usuario cadastrado!');javascript:history.back()</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
alert('Erro ao cadastrar!');javascript:history.back()</script>";
}


?>

