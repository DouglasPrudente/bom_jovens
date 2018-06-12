<?php
include "parts/header.php";
session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
$controle->protegePagina();
$_SESSION['menu'] = 'usuarios';
?>
    <body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include "parts/menu.php" ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuários</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cadastrar Usuário</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?PHP if ($_GET['ac']) {
                                echo '<form role="form" action="usuarios.php?ac=' . $_GET["ac"] . '" method="post" class="form-horizontal">';
                            } else {
                                echo '<form role="form" action="usuarios.php?nac=1" method="post" class="form-horizontal">';
                            } ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="exampleInputEmail1"
                                               placeholder="Seu nome" <?PHP if ($_GET['ac']) {
                                                   echo 'value="' . $controle->getInformacao($_GET['ac'], 'nome', 'usuarios') . '"';
                                               } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Seu e-mail" <?PHP if ($_GET['ac']) {
                                                   echo 'value="' . $controle->getInformacao($_GET['ac'], 'email', 'usuarios') . '"';
                                               } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Senha</label>
                                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1"
                                               placeholder="Sua senha" <?PHP if ($_GET['ac']) {
                                                   echo 'value="' . $controle->getInformacao($_GET['ac'], 'nome', 'usuarios') . '"';
                                               } ?>">
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include "parts/footer.php" ?>