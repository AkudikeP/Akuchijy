<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller {
  
  public function index() {
    $this->middle = 'admin/dashboard'; // passing middle to function. change this for different views.
    $this->adminlayout();
  }
  
  public function Category(){
	  $data['cats']=$this->db->get("mcategory")->result();
	  $data['subcats']=$this->db->get("category")->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/category',$data,true);
      $this->adminlayout();
  }
  
  public function Add_category(){
	$chk=$this->db->get_where("mcategory",array("mcat_name"=>$this->input->post("category")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Main Category Already Exist";
	 }
	else{
		$cfile="default.jpg";
		if(!empty($_FILES["cfile"]["name"])){
				$config['upload_path'] = './assets/category/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '1000000';
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('cfile'))
				{
				echo $this->upload->display_errors();
				}
				else
				{	
				$pic = $this->upload->data();
				$cfile=$pic['file_name'];
				}
		}
	  
	 $data=array("mcat_name"=>$this->input->post("category"),
	 			 "mcat_image"=>$cfile);
				 if($this->db->insert('mcategory',$data))
				 {
					$msg="New Main Category Added Successfully.";
				 }
				 else
				 {
					 $msg="Main Category Couldnot be Added.";
				 }
				 $this->Category();
	}
	  
	 
  }
  
   public function Add_mcategory(){
	$chk=$this->db->get_where("category",array("mid"=>$this->input->post("mcat"),"cat_name"=>$this->input->post("category")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Sub Category Already Exist";
	 }
	else{
		$cfile="default.jpg";
		if(!empty($_FILES["cfile"]["name"])){
				$config['upload_path'] = './assets/category/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '1000000';
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('cfile'))
				{
				echo $this->upload->display_errors();
				}
				else
				{	
				$pic = $this->upload->data();
				$cfile=$pic['file_name'];
				}
		}
	  
	 $data=array("mid"=>$this->input->post("mcat"),
	 			 "cat_name"=>$this->input->post("category"),
	 			 "cat_image"=>$cfile);
				 if($this->db->insert('category',$data))
				 {
					$msg="New Category Added Successfully.";
				 }
				 else
				 {
					 $msg="Category Couldnot be Added.";
				 }
				 $this->Category();
	}
	  
	 
  }
 
}
?>