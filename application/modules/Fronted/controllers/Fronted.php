<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fronted extends MX_Controller {

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
		$data["dttm1"]	= $dttm1;
		$data["dttm2"]	= $dttm2;
		$data["module"]	= "Fronted";
		$this->layout->content('index',$data);
	}
}
