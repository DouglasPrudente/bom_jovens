<?php
include "parts/header.php";
session_start();
include "sistema/controle/controle.php";
$controle = new Controle;
$controle->protegePagina();
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
                        <h1>Transportadoras</h1>
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
                                <h3 class="card-title">Cadastrar Transportadoras</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?PHP if ($_GET['ac']) {
                                echo '<form role="form" action="transportadoras.php?ac=' . $_GET["ac"] . '" method="post" class="form-horizontal">';
                            } else {
                                echo '<form role="form" action="transportadoras.php?nac=1" method="post" class="form-horizontal">';
                            } ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="exampleInputEmail1"
                                               placeholder="Nome" <?PHP if ($_GET['ac']) {
                                                   echo 'value="' . $controle->getInformacao($_GET['ac'], 'nome', 'transportadoras') . '"';
                                               } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site</label>
                                        <input type="text" name="link" class="form-control" id="exampleInputEmail1"
                                               placeholder="Site" <?PHP if ($_GET['ac']) {
                                                   echo 'value="' . $controle->getInformacao($_GET['ac'], 'link', 'transportadoras') . '"';
                                               } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefone</label>

                                        <input type="text" class="form-control" name="telefone"
                                               data-inputmask='"mask": "(99) 9999-9999"' data-mask
                                               placeholder="Telefone" <?PHP if ($_GET['ac']) {
                                            echo 'value="' . $controle->getInformacao($_GET['ac'], 'telefone', 'transportadoras') . '"';
                                        } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Valor por Peso (kg)</label>
                                        <input type="text" name="valor" class="form-control" id="exampleInputPassword1"
                                               placeholder="Valor" <?PHP if ($_GET['ac']) {
                                            echo 'value="' . $controle->getInformacao($_GET['ac'], 'valor', 'transportadoras') . '"';
                                        } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Peso Maximo</label>
                                        <input type="text" name="peso" class="form-control" id="exampleInputPassword1"
                                               placeholder="Peso Maximo" <?PHP if ($_GET['ac']) {
                                            echo 'value="' . $controle->getInformacao($_GET['ac'], 'peso', 'transportadoras') . '"';
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

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0-alpha
        </div>
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=".plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
    </body>
</html>
