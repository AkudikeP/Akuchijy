<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 

 { 

   var $template  = array();
   var $data      = array();

   public function layout() {
 // making temlate and send data to view.
     $this->template['header']   = $this->load->view('layout/headernew', $this->data, true);

     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);

     $this->template['footer'] = $this->load->view('layout/footernew', $this->data, true);

     $this->load->view('layout/index', $this->template);

   }

   

   

    public function adminlayout() {

     $this->template['header']   = $this->load->view('admin/header', $this->data, true);

     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);

     $this->load->view('admin/index', $this->template);

   }






   public function vendorlayout() {

     $this->template['header']   = $this->load->view('vendor/header', $this->data, true);

     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);

     $this->load->view('vendor/index', $this->template);

   }


   public function tailorlayout() {

     $this->template['header']   = $this->load->view('tailor/header', $this->data, true);

     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);

     $this->load->view('tailor/index', $this->template);

   }

   

   

   

}

?>