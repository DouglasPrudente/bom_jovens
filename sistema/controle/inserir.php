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
$nome = $_POST["nome"];
$email = $_POST["email"];
$sobrenome = $_POST["sobrenome"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$complemento = $_POST["complemento"];
$numero = $_POST["numero"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$cep = $_POST["cep"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO clientes (nome, email, sobrenome, endereco, bairro, complemento, numero, cidade, uf, cep, senha, telefone) 
 VALUES ('$nome', '$email', '$sobrenome', '$endereco', '$bairro', '$complemento', '$numero','$cidade', '$uf', '$cep',md5('$senha'), '$telefone')"; //String com consulta SQL da inserção


if ($conn->query($sql) === TRUE) { //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
    echo "<script language='javascript' type='text/javascript'>
alert('Cliente cadastrado!');javascript:history.back()</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
alert('Erro ao cadastrar!');javascript:history.back()</script>";
}


?>

