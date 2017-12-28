<?=$this->layout->headercontent($module)?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>PC</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>My</b>Pouch</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=base_url()?>appsources/mypouch-mini.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$this->session->userdata("full_name")?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=base_url()?>appsources/mypouch-mini.png" class="img-circle" alt="User Image">
                                <p>
                                    <?=$this->session->userdata("full_name")?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url()?>auth/signout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url()?>appsources/mypouch-mini.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                    <p><?=$this->session->userdata("full_name")?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <?=$this->layout->sidemenu()?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
                <?=$this->load->view($pages)?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; <?=date("Y")?>.</strong> All rights
            reserved.
        </footer>
    </div>
    <?=$this->layout->loadjscontent()?>
</body>
<script>    
    $('#dttm1').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    })   
    $('#dttm2').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    })
</script>
<script>
$('.select2').select2()
</script>
<!-- ./wrapper -->