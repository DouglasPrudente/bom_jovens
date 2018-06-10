<?php
@ini_set('display_errors','1');
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$servername = "localhost";
$username = "root";
$pass = "mysql";
$conn = new mysqli($servername, $username, $pass);

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$doc = $_POST["doc"];
$reg = $_POST["reg"];
$rua = $_POST["rua"];
$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$UF = $_POST["UF"];
$cep = $_POST["cep"];
$econtato = $_POST["econtato"];
$tel = $_POST["econtato"];

mysqli_select_db($conn, "bancopa");
mysqli_query($conn, "INSERT INTO d_pessoais (DSC_NOME, DSC_EMAIL, DSC_SNOME, DSC_RGIE, NUM_PFPJ, DSC_LOG, DSC_BAIRRO, DSC_COMP, NUM_NUM, DSC_CID, DSC_UF, NUM_CEP, DSC_CEMAIL, DSC_CTEL) VALUES ('$nome','$sobrenome','$email','$doc','$reg','$rua','$bairro','$numero','$complemento','$cidade','$UF','$cep','$econtato','$tel')");
mysqli_close($conn);
echo "Salvo com Sucesso! <br />";
?>
<br><a href="index.php">Voltar.....</a></br>


