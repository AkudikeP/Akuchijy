<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
  
  public function index() {
	  if($this->session->userdata("loggedin")){
			redirect("product");
		}
	// $this->session->set_flashdata('msg', 'Invalid Username or Password.');	
    $this->load->view("admin/admin_login_view"); // passing middle to function. change this for different views.
    //$this->adminlayout();
  }
  
  public function login(){//print_r($_POST);
	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');  
	
	if($this->form_validation->run() == FALSE)
		{
			redirect("admin");
		}
		else
		{
			$chk=$this->db->get_where("admin",array("username"=>$this->input->post("username"),"password"=>md5($this->input->post("password"))));
			if($chk->num_rows()>0)
			{
				$data=array("loggedin"=>"true",
							"user"=>"admin");
							$this->session->set_userdata($data);
							redirect("product");
			}
			else
			{
			$this->session->set_flashdata('msg', 'Invalid Username or Password.');	
			redirect("admin");
			}
		}
  }
    public function a1760($value){//print_r($_POST);
    	//echo password_hash($value, PASSWORD_BCRYPT, array('cost' => 12));
    	echo $cvvalue = "$2y$12$zZM22Khn4Fs.BJF80qN/DeUUZE/b6Mu2rAN6MqlV5Y6j9a2nFz6cC";//password_hash($value, PASSWORD_BCRYPT, array('cost' => 12));
    	if(password_verify($value, $cvvalue))
    	{
    		echo 'yes';
    	}else{
    		echo 'no';
    	}

	/*this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');  
	
	if($this->form_validation->run() == FALSE)
		{
			redirect("admin");
		}
		else
		{
			$chk=$this->db->get_where("admin",array("username"=>$this->input->post("username"),"password"=>md5($this->input->post("password"))));
			if($chk->num_rows()>0)
			{
				$data=array("loggedin"=>"true",
							"user"=>"admin");
							$this->session->set_userdata($data);
							redirect("product");
			}
			else
			{
			$this->session->set_flashdata('msg', 'Invalid Username or Password.');	
			redirect("admin");
			}
		}*/
  }
  
  public function altration(){
	$this->session->sess_destroy();
	redirect("admin");
  }
  //Logout Function
  public function logout(){
	$this->session->sess_destroy();
	redirect("admin");
  }
  
  
 
}
?>