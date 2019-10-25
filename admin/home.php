<?php

session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
if (!$_SESSION['login']) {
    $controle->login($_POST['nome'], $_POST['senha']);
}
$controle->protegePagina();

$_SESSION['menu'] = 'dashboard';
include "parts/header.php";
?>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include "parts/menu.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-6 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><br></h3>

                                    <p>TCC's Cadastrados</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="clientes.php" class="small-box-footer">Ver detalhes <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><br></h3>
                                    <p>Usuarios Cadastrados</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="usuarios.php" class="small-box-footer">Ver detalhes <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
<?php include "parts/footer.php" ?>