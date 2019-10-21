<?php 

class Store extends CI_Controller

{


	public function __Construct(){

		parent:: __Construct();
		
		$this->load->helper(array('url', 'html','form', 'file'));

		$this->load->library('form_validation');
		$this->load->library('upload');
		
	


		//$this->load->model('Userfile');



	}

	public function index(){



		//$this->load->view("header");
$this->load->view("index");
//$this->load->view("footer");


	}





}
?>