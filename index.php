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
            <a class="navbar-brand" href="#myPage">
                <img src="assets/image/logo-repositorio-white.png" width="150" class="img-fluid"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#sobrenos">SOBRE NÓS</a></li>
                <li><a href="cadastro.php">CADASTRO</a></li>
                <li><a href="login.php">MINHA CONTA</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>Repositório</h1>
    <img src="assets/image/logo-fho.png">
    <p><br>A sua pesquisa facilitada!</p>
</div>

<!-- Container (About Section) -->
<div id="sobrenos" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>Nosso Objetivo</h2><br>
            <h3> Esta plataforma foi desenvolvida para auxiliar os alunos do curso de Sistemas da Informação na busca
                por artigos e trablahos de conclusão de curso, trazendo de uma forma facilitada o acesso aos arquivos de pesquisa.</h3><br>
            <br><a href="cadastro.php">
                <button class="btn btn-default btn-lg">Cadastrar-se</button>
            </a>
        </div>
        <div class="col-sm-4">
            <img src="assets/image/logo-repositorio.png" class="img-fluid">
        </div>
    </div>
</div>


<!-- Container -->
</body>
</html>
