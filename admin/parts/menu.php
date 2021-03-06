<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link text-center">
        <!--<img src="dist/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">-->
        <span class="brand-text font-weight-light"><img src="../assets/image/logo-repositorio-white.png" width="150" class="img-fluid"></a></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="home.php" class="nav-link <?PHP if ($_SESSION['menu'] == 'dashboard') {
                        echo 'active';
                    } ?>">
                        <i class="fa fa-dashboard nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="tcc.php" class="nav-link <?PHP if ($_SESSION['menu'] == 'tcc') {
                        echo 'active';
                    } ?>">
                        <i class="fa fa-users nav-icon"></i>
                        <p>TCC's</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="usuarios.php" class="nav-link <?PHP if ($_SESSION['menu'] == 'usuarios') {
                        echo 'active';
                    } ?>">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Usuários</p>
                    </a>
                </li>

                <li class="nav-header">SISTEMA</li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Sair</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>