<?php include "parts/header.php" ?>
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
                <li><a href="index.php">INICIO</a></li>
                <li><a href="#cadastro">CADASTRO</a></li>
                <li><a href="#contato">CONTATO</a></li>
                <li><a href="login.php">MINHA CONTA</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>BonJovens Transporte</h1>
    <p>O transporte que você precisa está aqui!</p>
</div>


<div id="cadastro" class="container-fluid bg-grey">
    <h2 class="text-center">CADASTRO</h2>
    <div class="row">
        <div class="col-sm-5">
        </div>

        <div class="col-sm-6 form-group">
            <form action="sistema/controle/inserir.php" method="post">

                <!-- DADOS PESSOAIS -->
                <fieldset>
                    <legend>Dados Pessoais</legend>

                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text" required >
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" id="ra" name="ra" placeholder="R.A" type="number" required >
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" id="email" name="email" placeholder="E-mail" type="text" required >
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" id="senha" name="senha" placeholder="Senha" type="password" required >
                        </div>
                    </div>

                </fieldset>
                <br/>

                <br/>

                <input type="submit" name="submit" style="cursor:pointer" value="Enviar">
                <input type="reset" value="Limpar">

            </form>

        </div>
    </div>
</div>

<!-- Container -->
<?php include "parts/contato.php" ?>
</body>
</html>

