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
                <li><a href="#servico">SERVIÇOS</a></li>
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

<!-- Container (Services Section) -->
<div id="servico" class="container-fluid text-center">
    <h2>SERVIÇOS</h2>
    <h3>Aqui as opções de Transportadoras são separadas de acordo com a sua necessidade, baseado no peso da sua encomenda, fornecendo informação de preços, tempo de entrega e Região de atividade.</h3>
    <br><br>

    <div class="row">
        <div class="col-sm-4">
        <span style="font-size: 40px" class="glyphicon glyphicon-usd"></span>
        <h4>Preços</h4>
        <p>Encontre o melhor preço...</p>
        </div>
    <div class="col-sm-4">
        <span style="font-size: 40px" class="fa fa-truck"></span>
        <h4>Transportadoras</h4>
        <p>As Melhores transpotadoras, para sua segurança...</p>
    </div>
    <div class="col-sm-4">
        <span style="font-size: 40px" class="glyphicon glyphicon-map-marker"></span>
        <h4>Localidade</h4>
        <p>As Regiões onde cada Transportadora atende...</p>
        </div>
    </div>
    <br><br>

</div>
 

<!-- Container (Portfolio Section) -->
<h2>
    <center> Opiniões de alguns clientes</center>
</h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <h4>"NOSSA, QUE SITE BOM DA PORRA."<br><span>Luiz Inácio Lula da Silva</span></h4>
        </div>
        <div class="item">
            <h4>"ESSE SITE É SENSACIONAL MESMO."<br><span>Michel Temer</span></h4>
        </div>
        <div class="item">
            <h4>"TEMOS QUE ESTOCAR O VENTO"<br><span>Dilma Rousseff</span></h4>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
</div>


<!-- Container -->
<?php include "parts/contato.php" ?>
</body>
</html>
