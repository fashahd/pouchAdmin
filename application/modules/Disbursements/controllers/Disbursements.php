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
		$company_id = $this->session->userdata("company_id");
		$status 	= $this->session->userdata("status");
		$bank 		= $this->session->userdata("bank");
		
		// init params
        // init params
        $params = array();
        $limit_per_page = 10;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->ModelGlobal->getTransactionTotal($company_id,$status,$dttm1,$dttm2,$bank);
		

		$data["optCompany"]		= $this->ModelGlobal->getOptCompany();
		$data["transaction"] 	= $this->ModelGlobal->getTransaction($company_id,$status,$dttm1,$dttm2,$bank,$limit_per_page, $page*$limit_per_page);
		$config['base_url'] 	= base_url() . 'disbursements/index';
		$config['total_rows'] 	= $total_records;
		$config['per_page'] 	= $limit_per_page;
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
		$data["dttm1"]	= $dttm1;
		$data["dttm2"]	= $dttm2;
		$data["module"]	= "Disbursement";
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$this->layout->content('index',$data);
	}
}
