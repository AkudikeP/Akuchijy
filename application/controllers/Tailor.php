<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tailor extends MY_Controller 
{  
 	public function __construct() 
 	{
        parent::__construct();
		/*if(!$this->session->userdata("vendor_loggedin"))
		{
			redirect("Tailor");
		}*/   
	} 

 	public function index() {
    $this->load->view("tailor/tailor_login_view");
  }

  public function dashboard() 
	{
		if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
		//print_r($this->session->userdata);//exit;
	    $data=array();//['attr']=$this->db->get("attributes")->result();
	    $data['t_id'] = $this->session->userdata['tid'];
		$this->template['middle'] = $this->load->view ($this->middle = 'tailor/dashboard',$data,true);
	    $this->tailorlayout();  
 	}

 	public function login(){//print_r($_POST);
	$this->form_validation->set_rules('temail', 'Email', 'required');
	$this->form_validation->set_rules('tpass', 'Password', 'required');  
	
	if($this->form_validation->run() == FALSE)
		{
			redirect("Tailor");
		}
		else
		{
			$chk=$this->db->get_where("tailors",array("temail"=>$this->input->post("temail"),"tpass"=>md5($this->input->post("tpass"))))->row();

			if($chk)
			{
				$data=array("tailor_loggedin"=>"true",
							"user"=>"tailor",
							"tid" => $chk->id,
							"temail"=>$this->input->post("temail")
							);
							$this->session->set_userdata($data);
							redirect("tailor/dashboard");
			}
			else
			{
			$this->session->set_flashdata('msg', 'Invalid Email or Password.');	
			redirect("Tailor");
			}
		}
  }

  public function logout(){
	$this->session->sess_destroy();
	redirect("Tailor");
  }


  public function profile(){
  	if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
  	$tid = $this->session->userdata('tid');
	  $data['tailor']=$this->db->get_where("tailors",array("id"=>$tid))->row();
	 $this->template['middle'] = $this->load->view ($this->middle = 'tailor/profile',$data,true);
     $this->tailorlayout();
  }

  public function change_pass()
  {
  	if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
	   //echo md5($_POST['op']
  	$tid = $this->session->userdata('tid');
	$chk=$this->db->get_where("tailors",array("id"=>$tid,"tpass"=>md5($_POST['op'])))->row();
	  if($chk)
	  {
		  
		  $data=array("tpass"=>md5($_POST['np']));
		  $this->db->where("id",$chk->id);
		  if($this->db->update("tailors",$data)==true)
		  {
			  echo "Password Changed Successfully.";
		  }
		  else
		  {
			  echo "Password Couldnot be Changed.";
		  }
	  }else{
		  echo "Incorrect Password.";
	  }
  }


    public function profile_update()
    {
    	if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
	   //echo md5($_POST['op']
  	   $tid = $this->session->userdata('tid');		
	  
	 $data=array("tname"=>$this->input->post('tname'),
	 			 "gender"=>$this->input->post('gender'),
				 "tphone"=>$this->input->post('tphone'),
				 "temail"=>$this->input->post('temail'),
				 "tcity"=>$this->input->post('tcity'),
				 "tstate"=>$this->input->post('tstate'),
				 "shopname"=>$this->input->post('shopname'),
				 "tshop_number"=>$this->input->post('tshop_number'),
				 "tshop_address"=>$this->input->post('tshop_address'),
				 "landmark"=>$this->input->post('landmark'),
				 "pincode"=>$this->input->post('pincode'),
				 "speciliazation"=>implode(",",$this->input->post("speciliazation")),
				 "payment_type"=>$this->input->post('payment_type')
				 );
				
				$this->db->where("id",$tid);
				 if($this->db->update('tailors',$data))
				 {
					 
				 }
				 redirect("Tailor/profile");
  }

  public function accepted_order(){
  	if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
	$tid = $this->session->userdata('tid');
	$all=$this->db->get_where("tailor_assign",array("sstatus"=>'accepted',"tid"=>$tid));
	$data['totalpro']=$all->num_rows();
	$data['accepted']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'tailor/accepted_products',$data,true);
    $this->tailorlayout();  
  }

	public function completed_order(){
  	if(!$this->session->userdata("tailor_loggedin"))
		{
			redirect("Tailor");
		}
	$tid = $this->session->userdata('tid');
	$all=$this->db->get_where("tailor_assign",array("tid"=>$tid,"pstatus"=>'completed'));
	$data['totalpro']=$all->num_rows();
	$data['completed']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'tailor/completed_products',$data,true);
    $this->tailorlayout();  
  }
  
   public function tailor_finance(){
   
     	$tid = $this->session->userdata('tid');
     	$this->session->set_userdata('sorting','');
    $this->db->select('*');
    $this->db->order_by("id","desc");
    $this->db->from('order_items');
    $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    $this->db->where("tid",$tid);
    $data['items']=$this->db->get()->result();

  $this->template['middle'] = $this->load->view ($this->middle = 'tailor/tailor_orders',$data,true);
    $this->tailorlayout(); 
  }

public function w_order(){
$tid = $this->session->userdata('tid');
      $d = strtotime("today");
$this->db->where('odate BETWEEN "'. date('Y-m-d', strtotime("last sunday midnight",$d)). '" and "'. date('Y-m-d', strtotime("next saturday",$d)).'"');

$weeks_orders = $this->db->get("orders")->result();
      
      foreach ($weeks_orders as $orders) {
         $this->db->select('*');
     $this->db->order_by("id","desc");
    
     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    
        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tid))->result();
      
      }

return $items;
}

public function t_order(){

$tid = $this->session->userdata('tid');
  
     $today = date("Y-m-j");
        $this->db->where("odate",$today);
      $todays_orders = $this->db->get("orders")->result();
      
      foreach ($todays_orders as $orders) {
         $this->db->select('*');
     $this->db->order_by("id","desc");
    
     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    
        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tid))->result();
      
      }

return $items;
}
public function all_order(){
 
 $tid = $this->session->userdata('tid');
    $this->db->select('*');
    $this->db->order_by("id","desc");
    $this->db->from('order_items');
     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    

   $this->db->where("tid",$tid);
  $items[]=$this->db->get()->result();

return $items;

}
public function m_order(){
$tid = $this->session->userdata('tid');
  
     $d = date('Y-m-d');
              
                $datestring="$d first day of last month";
$dt=date_create($datestring);
$month = $dt->format('m');
$year = $dt->format('Y');
 $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
 $last_month_first = $year.'-'.$month.'-1';
 $last_month_last = $year.'-'.$month.'-'.$day;

$this->db->where('odate BETWEEN "'.$last_month_first.'" and "'.$last_month_last.'"');


$month_orders = $this->db->get("orders")->result();
      
      foreach ($month_orders as $orders) {
         $this->db->select('*');
     $this->db->order_by("id","desc");
    
     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    
        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tid))->result();
      
      
}
return $items;
}

 	public function ajax_access_uniform()
  {
	  	if($_POST['sid']=="Accessories")
	  	{
	  		$this->load->view('admin/ajax_uniform');
	  	}
  }
  public function excel()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
   $sorting = $this->session->userdata('sorting');
$data=array();  
 

      if($sorting=='w_order')
	  	{
	  		$items = $this->w_order();
		}
		else if($sorting=='t_order')
	  	{
	  		$items = $this->t_order();
	  		
		}
		else if($sorting=='m_order')
	  	{
	  		$items = $this->m_order();
	  		
		}
		else{
			$items = $this->all_order();
		}

			if(!empty($items)){
	  	 $i=1;
						$paid=0;$due=0;
						 foreach($items as $item){
						 	if(!empty($item)){
						 		foreach($item as $item){
						 	if(!empty($item)){
						 		
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
 
$data1 = new stdClass;
$data1->Order_no = $item->oid;
$data1->Date = $order_date->odate;
$data1->Product = $item->pname;
$data1->Price =$item->price;
$data[]=$data1;

}}}}}
        $this->excel->stream('Tailor_report.xls', $data);
  }

  public function download_pdf()
  {
  	$sorting = $this->session->userdata('sorting');
  	$vid = $this->session->userdata('vid');
  	//print_r($sorting);
  	

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetTitle('Tailor Report');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<img src="http://project21.piresearch.in/assets/images/logo2.jpg" style="padding:10px;width:120px">
<center><h2>Tailor Report</h2></center>
<table border="1">
<tr><th><b>Order no</b></th>
<th><b>Date</b></th>
<th><b>Product Name</b></th>
<th><b>Cost</b></th></tr>
';
if($sorting=='w_order')
	  	{
	  		$items = $this->w_order();
		}
		else if($sorting=='t_order')
	  	{
	  		$items = $this->t_order();
	  		
		}
		else if($sorting=='m_order')
	  	{
	  		$items = $this->m_order();
	  		
		}
		else{
			$items = $this->all_order();
		}

			if(!empty($items)){
	  	 $i=1;//print_r($orders
						$paid=0;$due=0;
						 foreach($items as $item){
						 	if(!empty($item)){
						 		foreach($item as $item){
						 			if(!empty($item)){
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                         
                         
$html.="<tr><td>$item->oid</td>

<td>$order_date->odate</td>
<td>$item->pname</td>
<td>$item->price</td>
</tr>
";}}}}}

$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('tailor_report.pdf', 'I');



  }

  public function orders_sorting()
  {
	  	$sorting = $_POST['sid'];
	  	$vid = $this->session->userdata('tid');

	  	if($_POST['sid']=='t_order')
	  	{
	  		$this->session->set_userdata('sorting','t_order');
	  		$items = $this->t_order();
			
	  	}else if($_POST['sid']=='w_order')
	  	{
	  		$this->session->set_userdata('sorting','w_order');
	  		
	  		$items = $this->w_order();

			
	  	}
	  	else if($_POST['sid']=='m_order')
	  	{
	  		$this->session->set_userdata('sorting','m_order');
	  		 $items = $this->m_order();

			
	  	}
else if($_POST['sid']=='y_order')
	  	{
	  		
	  		 $d = date("Y",strtotime("-1 year"));;
                                   $last_year_first = $d.'-1-1';
                                   $last_year_last = $d.'-12-31';
  
$this->db->where('odate BETWEEN "'.$last_year_first.'" and "'.$last_year_last.'"');



$year_orders = $this->db->get("orders")->result();
			foreach ($year_orders as $orders) {
				//print_r($orders);
				$items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'vendor_id'=>$vid))->row();
			}

			
	  	}
else if($_POST['sid']=='all')
	  	{
	  		$items = $this->all_order();			
	  	}
	  	
if(!empty($items)){
	  	 $i=1;//print_r($orders
						$paid=0;$due=0;
						 foreach($items as $item){
						 	if(!empty($item)){
						 		 foreach($item as $item){
						 	if(!empty($item)){
              
                
              
							 if($item->price=="paid"){$paid=$paid+$item->price;}
							  if($item->status==""){$due=$due+$item->price;}
							 ?>
                        <tr class="gradeA">
                          <td>#<?php echo $item->oid;?></td>
                          <td><?php
                          $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo " $order_date->odate </td><td>";
                         
                            echo $item->pname;?></td>
                         
                          <td>Rs. <?php echo $item->price;?>/- <?php if($item->status==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>
                          
                        
                        </tr>
                        <?php $i++;
						} }}}}
  }

 
}