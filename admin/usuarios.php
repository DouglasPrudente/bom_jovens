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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                                <a href="cadastrar-usuarios.php" class="btn btn-primary" id="to-login">Cadastrar Usuários</a>
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
                            <h3 class="card-title">Lista de Usuários</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                	<!-- Essa função é responsável por listar todos os usuarios cadastrados no banco -->
                                    <?php $controle->getUsuarios(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include "parts/footer.php"?>