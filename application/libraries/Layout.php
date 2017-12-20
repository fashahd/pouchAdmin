<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

    public function headercontent($module = null){
        $ret = "
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <!-- Meta, title, CSS, favicons, etc. -->
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'><!-- Favicons-->
                <meta name='description' content='My Poch adalah perusahaan yang bergerak di bidang payment channel dan payment gateway yang mengutamakan kemudahan, keamanan, kecepatan, dan fleksibilitas dalam setiap transaksi'>
                <meta name='keywords' content='My Pouch, pouch, payment gateway, payment channel'>
                <link rel='icon' href='".base_url()."appsources/mypouch-favicon.png' sizes='32x32'>
                <!-- Favicons-->
                <link rel='apple-touch-icon-precomposed' href='".base_url()."appsources/mypouch-favicon.png'>
            

                <title>My Pouch | $module</title>

                
                ".link_tag('appsources/css/themes/semi-dark-menu/materialize.css')."
                
                ".link_tag('appsources/css/themes/semi-dark-menu/style.css')."
                
                ".link_tag('appsources/css/custom/custom.css')."

                ".link_tag('appsources/vendors/noUiSlider/nouislider.css')."

                ".link_tag('appsources/vendors/prism/prism.css')."
                
                ".link_tag('appsources/vendors/perfect-scrollbar/perfect-scrollbar.css')."
                
                ".link_tag('appsources/vendors/jvectormap/jquery-jvectormap.css')."
                
                ".link_tag('appsources/vendors/dropify/css/dropify.min.css')."
                ".link_tag('appsources/vendors/sweetalert/dist/sweetalert.css')."

                ".link_tag('appsources/vendors/flag-icon/css/flag-icon.min.css')."
                ".link_tag('appsources/vendors/data-tables/css/jquery.dataTables.min.css')."

            </head>
        ";

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
            <script src='".base_url()."appsources/vendors/jquery-3.2.1.min.js'></script>
            <script src='".base_url()."appsources/js/materialize.min.js'></script>
            <script src='".base_url()."appsources/vendors/perfect-scrollbar/perfect-scrollbar.min.js'></script>
            <script src='".base_url()."appsources/js/plugins.js'></script>
            <script src='".base_url()."appsources/js/custom-script.js'></script> 
            <script src='".base_url()."appsources/js/jquery.form.js'></script> 
            <script src='".base_url()."appsources/vendors/data-tables/js/jquery.dataTables.min.js'></script>
            <script src='".base_url()."appsources/js/scripts/data-tables.js'></script>
            <script src='".base_url()."appsources/js/scripts/advanced-ui-modals.js'></script>
            <script src='".base_url()."appsources/vendors/sweetalert/dist/sweetalert.min.js'></script>
            
            <script src='".base_url()."appsources/pouch/default.js'></script>      
            <script src='".base_url()."appsources/pouch/module/batch.js'></script>  
            <script src='".base_url()."appsources/pouch/module/settings.js'></script>
            <script src='".base_url()."appsources/pouch/module/cash.js'></script>
            <script>
                $('#tableDisbursement').dataTable( {
                    'searching': false,
                    'bLengthChange': false,
                } );
            </script>
        ";

        return $ret;
    }
    
    public function sidemenu(){
		$CI =   &get_instance();
        
        $ret = '
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="no-padding">
                <ul class="collapsible" data-collapsible="accordion">
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan">
                            <i class="material-icons">payment</i>
                            <span class="nav-text">Transaction</span>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="'.base_url().'dashboard/cash">
                                        <i class="material-icons">attach_money</i>
                                        <span>Cash</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="'.base_url().'disbursements">
                                        <i class="material-icons">local_shipping</i>
                                        <span>Batch Disbursements</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="waves-effect waves-cyan" href="'.base_url().'settings">
                            <i class="material-icons">settings</i>
                            <span class="nav-text">Setting</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
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