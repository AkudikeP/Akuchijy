<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends MY_Controller {
  
  public function index() {
    redirect("index.php/admin/Product/fabrics");
  }
  
  public function add_fabric($edit=false)
  {
	  if($edit!=false)
	  {
	  }
	  else
	  { 
	  if($this->input->post("title")){
		$config['upload_path'] = './assets/images/fabrics/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
		 $this->upload->initialize($config);
		$cover="cover.jpg";$front="front.jpg";$back="back.jpg";
		if(!empty($_FILES["fabricc"]["name"])){
				
				
				if (!$this->upload->do_upload('fabricc'))
				{
				echo $this->upload->display_errors();
				}
				else
				{	
				$pic = $this->upload->data();
				$cover=$pic['file_name'];
				}
		}
		if(!empty($_FILES["front"]["name"])){
				
				if (!$this->upload->do_upload('front'))
				{
				echo $this->upload->display_errors();
				}
				else
				{	
				$pic = $this->upload->data();
				$front=$pic['file_name'];
				}
		}
		if(!empty($_FILES["back"]["name"])){
				
				if (!$this->upload->do_upload('back'))
				{
				echo $this->upload->display_errors();
				}
				else
				{	
				$pic = $this->upload->data();
				$back=$pic['file_name'];
				}
		}
	  
	 $data=array("title"=>$this->input->post("title"),
				"price"=>$this->input->post("wholesale_price"),
				"thumb"=>$cover,
				"front"=>$front,
				"back"=>$back,
				"category"=>$this->input->post("category"),
				"color"=>implode(",",$this->input->post("color")),
				"pattern"=>implode(",",$this->input->post("pattern")),
				"fabric"=>implode(",",$this->input->post("fab")),
				"brand"=>$this->input->post("brand"),
				"sku"=>$this->input->post("sku"),
				"sdesc"=>$this->input->post("sdesc"),
				"ldesc"=>$this->input->post("ldesc"),
				"tags"=>'');
				 if($this->db->insert('fabric',$data))
				 {
					$msg="New Category Added Successfully.";
				 }
				 else
				 {
					 $msg="Category Couldnot be Added.";
				 }
				 redirect ("admin/Product/add_fabric");
	
	  }
	  
	  
	  else
	  {
		 $this->middle = 'admin/add_fabric'; // passing middle to function. change this for different views.
    	 $this->adminlayout();
	  }
  }}
  
  public function attributes(){
	  
	$data['attr']=$this->db->get("attributes")->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/attributes',$data,true);
    $this->adminlayout();  
  }
  
  public function add_attr($id=false)
  {
	 
	  $chk=$this->db->get_where("attributes",array("attr_name"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Category Already Exist";
	 }
	else{
	$this->db->insert("attributes",array("attr_name"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	redirect ("admin/Product/attributes");
	}
	  
  }
  
  public function styles($cat=false){
	  if($cat==true){
		   $fcat=$this->db->get_where("category",array("cid"=>$cat))->row();  
	  }else{
	  $fcat=$this->db->get("category")->row();  
	  }
	$data['attr']=$this->db->get_where("attributes",array("cat"=>$fcat->cid))->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/styles',$data,true);
    $this->adminlayout(); 
  }
  
  public function add_style(){//
 // echo $_FILES["photo"]["name"];exit;
	 
	 	$file="";
		if(!empty($_FILES["photo"]["name"])){
	    $config['upload_path'] = './adminassets/styles/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo'))
		{
		echo $this->upload->display_errors();
		}
		else
		{	
		$pic = $this->upload->data();
		//print_r($pic);exit;
		$file=$pic['file_name'];
		//$type="image";
		}
		}
		
	  
	 $data=array("attr_id"=>$this->input->post('aid'),
	 			 "style"=>$this->input->post('stylename'),
				 "thumb_front"=>$file,
				 "sprice"=>$this->input->post('styleprice'));
				
				// print_r($data);//exit;
				 if($this->db->insert('style',$data))
				 {
					 ?><tr><td></td><td><?php echo $this->input->post('stylename');?></td><td><?php echo $this->input->post('styleprice');?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }
				 else
				 {
					 //$this->load->view("signup");
				 }
				
    
  }
  
  public function measurements(){
	$data['attr']=$this->db->get("measures")->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/measurements',$data,true);
    $this->adminlayout();   
  }
  
  public function add_measure($id=false)
  { 
	 
	  $chk=$this->db->get_where("measures",array("measure"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Measurement Already Exist for the category.";
	 }
	else{
	$this->db->insert("measures",array("measure"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	redirect ("index.php/admin/Product/measurements");
	}
	  
  }
  
  public function fabrics(){
	$data['fab']=$this->db->get("fabric")->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/products',$data,true);
    $this->adminlayout();  
  }
  
 
}
?>