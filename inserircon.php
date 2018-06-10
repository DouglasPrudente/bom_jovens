<?php
@ini_set('display_errors','1');
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Cnome = $_POST["nome"];
$Cemail = $_POST["email"];
$comentario = $_POST["comentario"];

$servername = "localhost";
$username = "root";
$conn = new mysqli($servername, $username, "");

mysqli_select_db($conn, "bancopa");
mysqli_query($conn, "INSERT INTO c_contato (cnome, cemail, comentario) VALUES (NULL, '$cnome',
'$csobrenome','$cemail')");
mysqli_close($conn);
echo "Salvo com Sucesso! <br />";
?>
<br><a href="index.html">Voltar.....</a></br>


