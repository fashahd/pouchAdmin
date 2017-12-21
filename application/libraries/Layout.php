<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

    public function headercontent($module = null){
        $ret = '
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>'.$module.' | My Pouch Admin</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.7 -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/bootstrap/dist/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/font-awesome/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/Ionicons/css/ionicons.min.css">
            <!-- jvectormap -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/jvectormap/jquery-jvectormap.css">
            <!-- bootstrap datepicker -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="'.base_url().'appsources/bower_components/select2/dist/css/select2.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="'.base_url().'appsources/dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="'.base_url().'appsources/dist/css/skins/_all-skins.min.css">
        
            <!-- Google Font -->
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>
        ';

        return $ret;
    }
    
	public function headerlogin()
	{
        $ret = '
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Admin | My Pouch</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                
                <!-- Favicons-->
                <link rel="apple-touch-icon-precomposed" href="'.base_url().'appsources/mypouch-favicon.png">
                <!-- Bootstrap 3.3.7 -->
                <link rel="stylesheet" href="'.base_url().'/appsources/bower_components/bootstrap/dist/css/bootstrap.min.css">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="'.base_url().'/appsources/bower_components/font-awesome/css/font-awesome.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="'.base_url().'/appsources/bower_components/Ionicons/css/ionicons.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="'.base_url().'/appsources/dist/css/AdminLTE.min.css">
                <!-- iCheck -->
                <link rel="stylesheet" href="'.base_url().'/appsources/plugins/iCheck/square/blue.css">
            
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
            
                <!-- Google Font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            </head>';

        return $ret;
    }
    
    public function loadjslogin()
	{
        $ret = "
            <!-- Module Login -->
            <script src='".base_url()."/appsources/bower_components/jquery/dist/jquery.min.js'></script>
            <!-- Bootstrap 3.3.7 -->
            <script src='".base_url()."/appsources/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>
            
            <script src='".base_url()."appsources/pouch/default.js'></script>
            <script src='".base_url()."appsources/pouch/module/login.js'></script>
        ";

        return $ret;
    }
    
    public function content($view,$data = null){
		$CI =   &get_instance();
        $data["pages"]  = $view;
        $CI->load->view("templates/content",$data);
    }

    public function loadjscontent(){
        $ret = "
            <script src='".base_url()."appsources/bower_components/jquery/dist/jquery.min.js'></script>
            <!-- Bootstrap 3.3.7 -->
            <script src='".base_url()."appsources/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>
            <!-- FastClick -->
            <script src='".base_url()."appsources/bower_components/fastclick/lib/fastclick.js'></script>
            <!-- AdminLTE App -->
            <script src='".base_url()."appsources/dist/js/adminlte.min.js'></script>
            <!-- Sparkline -->
            <script src='".base_url()."appsources/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'></script>
            <!-- jvectormap  -->
            <script src='".base_url()."appsources/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
            <script src='".base_url()."appsources/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
            <!-- SlimScroll -->
            <script src='".base_url()."appsources/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'></script>
            <!-- Select2 -->
            <script src='".base_url()."appsources/bower_components/select2/dist/js/select2.full.min.js'></script>
            <!-- bootstrap datepicker -->
            <script src='".base_url()."appsources/bower_components/moment/min/moment.min.js'></script>
            <script src='".base_url()."appsources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'></script>
            <!-- ChartJS -->
            <script src='".base_url()."appsources/bower_components/Chart.js/Chart.js'></script>
            <!-- AdminLTE for demo purposes -->
            <script src='".base_url()."appsources/dist/js/demo.js'></script>
            
            <script src='".base_url()."appsources/pouch/default.js'></script>
        ";

        return $ret;
    }
    
    public function sidemenu(){
		$CI =   &get_instance();
        
        $ret = '
                       
        <li>
            <a href="'.base_url().'fronted">
                <i class="fa fa-home"></i> <span>Fronted</span>
            </a>
        </li>
        <li><a href="'.base_url().'disbursements"><i class="fa fa-send"></i> <span>Disbursements</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        ';

        return $ret;
    }

    function childmenu($menu_id){
		$CI =   &get_instance();
        $sql    = "SELECT * FROM tect_mastermenu WHERE menu_parent_id = '$menu_id' AND menu_is_show = 'Y' order by menu_sort asc";
        $query  = $CI->db->query($sql);
        $ret = "";
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $ret .= '<li><a href="'.base_url().''.$row->menu_url.'">'.$row->menu_tittle.'</a></li>';
            }
        }

        return array($query->num_rows(),$ret);
    }

    public function logo_color(){
        $logo = '<img src="'.base_url().'appsources/mypouch.png" width="250px"/>';
        return $logo;
    }
    
    public function logo_white(){
        $logo = '<img src="'.base_url().'appsources/mypouch.png" width="250px"/>';
        return $logo;
    }
    
    public function logo_mini(){
        $logo = '<img style="width:30px;height:30px;float:left;margin-right:10px;margin-top:-5px" src="'.base_url().'appsources/mypouch-mini.png" />';
        return $logo;
    }
}