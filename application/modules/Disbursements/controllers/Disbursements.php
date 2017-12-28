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
		$dttm1 = date("Y-m-d");
		$dttm2 = date("Y-m-d");
		if($this->session->userdata("dttm1")){
			$dttm1 = $this->session->userdata("dttm1");
		}
		if($this->session->userdata("dttm2")){
			$dttm1 = $this->session->userdata("dttm2");
		}
		$company_id = $this->session->userdata("company_id");
		$status = $this->session->userdata("status");
		$dttm1 = $this->session->userdata("dttm1");
		$dttm2 = $this->session->userdata("dttm2");
		$bank = $this->session->userdata("bank");
		$data["optCompany"]	= $this->ModelGlobal->getOptCompany();
		$data["transaction"] = $this->ModelGlobal->getTransaction($company_id,$status,$dttm1,$dttm2,$bank);
		$data["dttm1"]	= $dttm1;
		$data["dttm2"]	= $dttm2;
		$data["module"]	= "Disbursement";
		$this->layout->content('index',$data);
	}
}
