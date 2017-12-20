<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

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
	public function Login()
	{
		$this->load->view('login');
	}

	function register(){
		$this->load->view('register');
	}

	function validation(){
		$this->load->Model("ModelAuth");
		if(!isset($_POST["username"])){
			echo "Silahkan Isi Username anda !";
			return;
		}

		if(!isset($_POST["password"])){
			echo "Silahkan Isi Password anda !";
			return;
		}
		
		$auth 	= $this->ModelAuth->validation($_POST["username"],$_POST["password"]);
		// echo $auth;
		// return;
		$data = json_decode($auth, true);
		if($data["status"] == "error"){
			echo "error";
			return;
		}

		if($data["status"] == "sukses"){			
			$this->session->set_userdata("username",$data["username"]);
			$this->session->set_userdata("full_name",$data["full_name"]);
			$this->session->set_userdata("role",$data["role"]);
			echo "Sukses";
			return;
		}

	}

	function signout(){
		$this->session->unset_userdata("sessUSerID");
		$this->session->unset_userdata("sessEmail");

		header("location:auth/login");
	}
}
