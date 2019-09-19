<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('facebook');
	}

	public function index()
	{
		
		echo "kk";
	}

	
}
