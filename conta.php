<?php
session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
if (!$_SESSION['login']) {
    $controle->login($_POST['email'], $_POST['senha']);
}
$controle->protegePagina();

include "parts/header.php";
?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">SAIR</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container (About Section) -->
<div id="sobrenos" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>TCC</h2>
            <h4>Pesquisa de TCC's</h4>
            <form action="transportadoras.php" method="post">
                <input class="form-control" id="peso" name="peso" type="number"
                       required>
                <p>
                    <input type="submit" name="submit" style="cursor:pointer" value="Enviar">
                    <input type="reset" value="Limpar">

            </form>

            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>TCC</th>
                    <th>Alunos</th>
                    <th>Orientador</th>
                    <th>Linha de Estudo</th>
                    <th>Download</th>
                </tr>
                

                </tbody>
            </table>
            </p>
            <br>

        </div>
        <div class="col-sm-4">
            <img src="assets/image/icone.png">
        </div>
    </div>
</div>

<!-- Container -->
<?php include "parts/contato.php" ?>
</body>
</html>
