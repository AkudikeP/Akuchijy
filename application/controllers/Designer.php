<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('cities_model');
        $data['city'] = '';
        if ($this->session->userdata('city_session'))
        {
            $data['city'] = '<a class="link-black pr-1" href="'.base_url().'welcome/unset_city"><i class="fa fa-map-marker"></i>'.$this->cities_model->get(array('id' => $this->session->userdata('city_session')))->row().'</a>';
        }

        $data['title'] = 'Meet our designers';
        $data['page'] = 'designer';
        $this->load->view('templates/header1', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('designer/index');
    }
}