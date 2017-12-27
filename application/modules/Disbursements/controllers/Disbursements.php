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
	}

	public function index()
	{
		//konfigurasi pagination
        $config['base_url'] 	= site_url('disbursement/index'); //site url
        $config['total_rows'] 	= $this->ModelGlobal->getTransactionTotal($company_id,$status,$dttm1,$dttm2,$bank); //total row
        $config['per_page'] 	= 5;  //show record per halaman
        $config["uri_segment"] 	= 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		 // Membuat Style pagination untuk BootStrap v4
		 $config['first_link']       = 'First';
		 $config['last_link']        = 'Last';
		 $config['next_link']        = 'Next';
		 $config['prev_link']        = 'Prev';
		 $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		 $config['full_tag_close']   = '</ul></nav></div>';
		 $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		 $config['num_tag_close']    = '</span></li>';
		 $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		 $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		 $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		 $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['prev_tagl_close']  = '</span>Next</li>';
		 $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		 $config['first_tagl_close'] = '</span></li>';
		 $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
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
		$data["optCompany"]	= $this->ModelGlobal->getOptCompany();
		$data["transaction"] = $this->ModelGlobal->getTransaction($company_id,$status,$dttm1,$dttm2,$bank,$config["per_page"], $data['page']);
		$data["dttm1"]	= $dttm1;
		$data["dttm2"]	= $dttm2;
		$data["module"]	= "Disbursement";
		$this->layout->content('index',$data);
	}
}
