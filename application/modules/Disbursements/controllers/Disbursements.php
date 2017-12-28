<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disbursements extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("username")){
			redirect("auth/login");
			return;
		}
		$this->load->model("ModelGlobal");
		$this->load->library('pagination');
	}

	public function index()
	{	
		$dttm1 = date("Y-m-d");
		$dttm2 = date("Y-m-d");
		if($this->session->userdata("dttm1")){
			$dttm1 	= $this->session->userdata("dttm1");
		}
		if($this->session->userdata("dttm2")){
			$dttm2 	= $this->session->userdata("dttm2");
		}
		$company_id = $this->session->userdata("company");
		$status 	= $this->session->userdata("status");
		$bank 		= $this->session->userdata("bank");
		$limit 		= $this->session->userdata("limit");
        $page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->ModelGlobal->getTransactionTotal($company_id,$status,$dttm1,$dttm2,$bank);

		$data["optCompany"]		= $this->ModelGlobal->getOptCompany($company_id);
		$data["optLimit"]		= $this->ModelGlobal->getOptLimitPage($limit);
		$data["optBank"]		= $this->ModelGlobal->getOptBank($bank);
		$data["optStatus"]		= $this->ModelGlobal->getOptStatus($status);
		$data["dttm1"]	= $dttm1;
		$data["dttm2"]	= $dttm2;
		$data["page"]	= $page;
		$config['base_url'] 	= base_url() . 'disbursements/index';
		$config['total_rows'] 	= $total_records;
		$config['per_page'] 	= $limit;
		$config["uri_segment"] 	= 3;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$config['num_links'] 	= $total_records;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Previous';
		 
		$this->pagination->initialize($config);
		
	   // build paging links
	  	$data["links"] = $this->pagination->create_links();
	   	$str_links = $this->pagination->create_links();
	   	$data["links"] = explode('&nbsp;',$str_links );
		$data["module"]	= "Disbursement";
		$this->layout->content('index',$data);
	}

	function getDisbursements(){
		$dttm1 		= $_POST["dttm1"];
		$dttm2 		= $_POST["dttm2"];
		$company 	= $_POST["company"];
		$status 	= $_POST["status"];
		$bank 		= $_POST["bank"];
		$page 		= $_POST["page"];
		$limit 		= $_POST["limit"];
		$this->session->set_userdata("dttm1",$dttm1);
		$this->session->set_userdata("dttm2",$dttm2);
		$this->session->set_userdata("status",$status);
		$this->session->set_userdata("bank",$bank);
		$this->session->set_userdata("company",$company);
		$this->session->set_userdata("limit",$limit);		

		$data["optCompany"]		= $this->ModelGlobal->getOptCompany();
		$data["transaction"] 	= $this->ModelGlobal->getTransaction($company,$status,$dttm1,$dttm2,$bank,$limit, $page*$limit);
		$data["start"] 			= $page*$limit;
		$this->load->view("disburseData",$data);
	}
}
