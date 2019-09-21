<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->helper('form');
	}
	
	public function index($page = 'home')
	{
		$data['title'] = 'Home';
		$data['page'] = 'home';

		$this->db->order_by("service_id", "ASC");
		$data['services'] = $this->db->get_where("services",array('status'=>'enable'))->result();
		// move above to Services_model

		$this->load->view('sample/header', $data);
		$this->load->view('sample/navbar', $data);
		$this->load->view('sample/home');
		$this->load->view('sample/footer', $data);
	}
}
