<?php
include "parts/header.php";

session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
$controle->protegePagina();
if ($_GET['nac']) {
    if ($_POST['nome'] && $_POST['nome'] != '') {
        $controle->registraTransp($_POST['nome'], $_POST['link'], $_POST['telefone'], $_POST['valor']);
    }
} elseif ($_GET['ac']) {
    if ($_POST['nome'] && $_POST['nome'] != '') {
        $controle->atualizaTransp($_GET['ac'], $_POST['nome'], $_POST['link'], $_POST['telefone'], $_POST['valor']);
    }
}

$_SESSION['menu'] = 'transportadoras';
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
                        <h1>Transpostadoras</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                                <a href="cadastrar-transportadoras.php" class="btn btn-primary" id="to-login">Cadastrar Transpostadoras</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Transpostadoras</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Site</th>
                                    <th>Valor por peso</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $controle->getTransportadoras(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include "parts/footer.php"?>