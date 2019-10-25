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
                            <form role="form" action="sistema/controle/inserir_usuario.php" method="post" class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="exampleInputEmail1"
                                               placeholder="Seu nome" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Seu e-mail" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">R.A.</label>
                                        <input type="number" name="ra" class="form-control" id="exampleInputEmail1"
                                               placeholder="Seu R.A."/>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Senha</label>
                                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1"
                                               placeholder="******" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="status" class="form-control" id="exampleInputPassword1"
                                               placeholder="Sua senha" >
                                            <option value="1">Administrador</option>
                                            <option value="2">Cliente</option>
                                        </select>
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