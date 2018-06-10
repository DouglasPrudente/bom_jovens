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
                    <table cellspacing="10">
                        <tr>
                            <td>
                                <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text"
                                       required>
                            </td>
                            <td>
                                <input class="form-control" id="email" name="email" placeholder="E-mail" type="email"
                                       required>
                            </td>
                            <td>
                                <input class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome"
                                       type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="doc" name="doc" placeholder="RG / I.E." type="text"
                                       required>
                            </td>
                        <tr>
                            <td>
                                <input class="form-control" id="reg" name="reg" placeholder="CPF / CNPJ" type="text"
                                       required>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>

                <!-- ENDEREÇO -->
                <fieldset>
                    <legend>Dados de Endereço</legend>
                    <table cellspacing="10">
                        <tr>
                            <td>
                                <input class="form-control" id="rua" name="rua" placeholder="Logradouro" type="text"
                                       required>
                            </td>
                            <td>
                                <input class="form-control" id="bairro" name="bairro" placeholder="Bairro" type="text"
                                       required>
                            </td>
                            <td>
                            <td>
                                <input class="form-control" id="numero" name="numero" placeholder="Número" type="text"
                                       size="4" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="complemento" name="complemento"
                                       placeholder="Complemento" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="cidade" name="cidade" placeholder="Cidade" type="text"
                                       required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="UF" nUFame="estado" placeholder="UF" type="text"
                                       size="2" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="cep1" name="cep1" placeholder="CEP" type="text" size="8"
                                       maxlength="8" required>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>

                <!-- DADOS DE CONTATO -->
                <fieldset>
                    <legend>Dados de contato</legend>
                    <table cellspacing="10">
                        <tr>
                            <td>
                                <input class="form-control" id="econtato" name="econtato"
                                       placeholder="E-mail para Contato" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" id="tel" name="tel" placeholder="Telefone para Contato"
                                       required>
                            </td>
                        </tr>
                    </table>
                </fieldset>
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

