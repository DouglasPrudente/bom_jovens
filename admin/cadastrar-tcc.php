<?php
include "parts/header.php";
session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
$controle->protegePagina();
$_SESSION['menu'] = 'tcc';
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
                        <h1>TCC</h1>
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
                                <h3 class="card-title">Cadastrar TCC</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?PHP if ($_GET['ac']) {
                                echo '<form enctype="multipart/form-data" action="tcc.php?at=' . $_GET["ac"] . '" method="post" class="form-horizontal">';
                            } else {
                                echo '<form enctype="multipart/form-data" action="tcc.php?nac=1" method="post" class="form-horizontal">';
                            } ?>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TCC</label>
                                        <?php if($_GET['ac']){$titulo = $controle->getInformacao($_GET['ac'], 'titulo', 'tcc');} ?>
                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="" value="<?= $titulo;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Autores</label>
                                        <?php if($_GET['ac']){$autores = $controle->getInformacao($_GET['ac'], 'autores', 'tcc');} ?>
                                            <input type="text" id="autores" name="autores" class="form-control" placeholder="" value="<?=$autores;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Palavras Chave</label>
                                        <?php if($_GET['ac']){
                                            $palavras = $controle->getInformacao($_GET['ac'], 'palavras_chave', 'tcc');
                                        } 
                                        ?>
                                            <input type="text" name="palavras_chave" id="palavras_chave" class="form-control" placeholder="" value="<?=$palavras;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Linha de Estudo</label>
                                        <select name="linha_estudo" class="form-control" id="linha_estudo"
                                               placeholder="Sua senha" >
                                            <option value="">Escolha o Desenvolvimento</option>
                                            <option value="Desenvolvimento">Desenvolvimento</option>
                                            <option value="Banco de Dados">Banco de Dados</option>
                                            <option value="Engenharia de Software">Engenharia de Software</option>
                                            <option value="Redes / Sistemas Operacionais">Redes / Sistemas Operacionais</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <?php if($_GET['ac']){$resumo = $controle->getInformacao($_GET['ac'], 'resumo', 'tcc');} ?>

                                        <label for="exampleInputEmail1">Resumo</label>
                                        <textarea class="form-control" name="resumo" id="resumo" value=""><?php echo $resumo;?></textarea>
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