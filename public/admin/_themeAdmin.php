<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?=$this->e($titulo)?> | <?=$this->e($empresa)?></title>
 
    <link rel="stylesheet" href="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/menu_cursos.css">

    <link rel="stylesheet" href="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="<?= SITE["base_url"] ?>vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= SITE["base_url"] ?>vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link href="<?= SITE["base_url"] ?>vendor/almasaeed2010/adminlte/smartwizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    
    <?= $this->section('styles')?> 


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .info-box { 
            min-height: 50px; 
        }
        .info-box .info-box-icon{
            font-size: 1.0rem;
        } 
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="<?= SITE['base_url']?>" class="navbar-brand">
                 <!--     <img src="<?= SITE['base_url']?>assets/dist/img/pceplogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> 
                    <span class="brand-text font-weight-light"><b> <?= EMPRESA['nome']; ?></b></span> -->
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= SITE['base_url']?>admin" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= SITE['base_url']?>admin\web" class="nav-link">Site Web</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">Cadastro</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= SITE["base_url"] ?>admin\users" class="dropdown-item">Usuarios</a></li>
                            </ul>
                        </li>

                    </ul>
 
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                     
                    <!-- Notifications Dropdown Menu -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"> <b>Alertas</b></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-users"> <b>Empresa</b></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">Selecione uma Empresa</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages 
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests 
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports 
                            </a>
                        </div>
                    </li> -->
                    
                     
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE["base_url"]?>logout"><i
                                class="fas fa-times-circle"></i> <b>Sair</b></a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <div class="content-wrapper">
            <?= $this->section('content')?>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <?php
            if($_SESSION['logado']):
            ?>
            <div class="float-right d-none d-sm-inline">
             Usuário: <b><?= ucfirst($_SESSION['nome'])?></b>
            </div>
            <?php
                endif
            ?>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019-<?= date("Y")?> <a href="http://www.solartechsolutions.com.br" target="_blank" >Maciel Oliveira  </a> by <?= EMPRESA['nome'] ?> </strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= SITE["base_url"]?>vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
    <script type="text/javascript" src="<?= SITE["base_url"] ?>vendor/almasaeed2010/adminlte/smartwizard/js/jquery.smartWizard.min.js"></script>
    <script src="<?= SITE['base_url']?>vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= SITE['base_url']?>vendor/almasaeed2010/adminlte/recursosextras.js"></script>

    
    <?= $this->section('scripts')?> 
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>

  <?php 
        if (!empty($_SESSION['alert'])) {
            unset($_SESSION['alert']);
        }
    ?>  
</body>

</html>