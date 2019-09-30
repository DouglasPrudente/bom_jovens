<?php include "parts/header.php"; ?>

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
                <li><a href="#sobrenos">SOBRE NÓS</a></li>
                <li><a href="cadastro.php">CADASTRO</a></li>
                <li><a href="#contato">CONTATO</a></li>
                <li><a href="login.php">MINHA CONTA</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>BomJovens</h1>
    <p>O transporte que você precisa está aqui!</p>
</div>

<!-- Container (About Section) -->
<div id="sobrenos" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>Nosso Trabalho</h2><br>
            <h3> O desenvolvimeto desta plataforma foi baseado na ideia de uma plataforma que contenha os dados de cotação de diversas transportadoras. </h3><br>
            <br><a href="cadastro.php">
                <button class="btn btn-default btn-lg">QUERO ME CADASTRAR</button>
            </a>
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
