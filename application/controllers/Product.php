<?php  error_reporting(0);
       ini_set('display_errors', 0);

             if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends MY_Controller {
 	public function __construct() {
        parent::__construct();
		if(!$this->session->userdata("loggedin")){
			redirect("admin");
		}
    }
    public function correction(){
      $order_items = $this->db->get('order_items')->result();
      foreach ($order_items as $value) {
        $num = $this->db->get_where('tailor_assign',array('stid'=>$value->id))->num_rows();
        if($num>0)
        {

        }else{
          $this->db->where('id',$value->id);
          if($this->db->update('order_items',array('shipping_status'=>'','status_datetime'=>''))){
            echo 'done<br>';
          }
        }
      }
    }
    public function add_homepage_meta(){
      $data= array('meta_title' => $this->input->post('meta_title'),
'meta_keyword' => $this->input->post('meta_keyword'),
'meta_desc' => $this->input->post('meta_desc'),
'classification' => $this->input->post('classification'),
'robots' => $this->input->post('robots'),
'googlebot' => $this->input->post('googlebot'),
'yahooseeker' => $this->input->post('yahooseeker'),
'msnbot' => $this->input->post('msnbot'),
'googlerank' => $this->input->post('googlerank'),
'copyright' => $this->input->post('copyright'),
'author' => $this->input->post('author'),
'expires' => $this->input->post('expires'),
'document_rating' => $this->input->post('document_rating'),
'geography' => $this->input->post('geography'),
'distribution' => $this->input->post('distribution'),
'language' => $this->input->post('language'),
'revisit_after' => $this->input->post('revisit_after'),
'publisher' => $this->input->post('publisher'),
'rating' => $this->input->post('rating'),
'geo_region' => $this->input->post('geo_region'),
'geo_placename' => $this->input->post('geo_placename'),
'geo_position' => $this->input->post('geo_position'),
'jsonld' => $this->input->post('jsonld'),
'og_title' => $this->input->post('og_title'),
'og_description' => $this->input->post('og_description'),
'og_keyword' => $this->input->post('og_keyword'),
'og_type' => $this->input->post('og_type'),
'og_locale' => $this->input->post('og_locale'),
'og_sitename' => $this->input->post('og_sitename'),
'og_url' => $this->input->post('og_url'),
'og_image' => $this->input->post('og_image'),
'twitter_card' => $this->input->post('twitter_card'),
'twitter_creator' => $this->input->post('twitter_creator'),
'twitter_title' => $this->input->post('twitter_title'),
'twitter_description' => $this->input->post('twitter_description'),
'twitter_image' => $this->input->post('twitter_image'),
'dc_source' => $this->input->post('dc_source'),
'dc_relation' => $this->input->post('dc_relation'),
'dc_title' => $this->input->post('dc_title'),
'dc_keyword' => $this->input->post('dc_keyword'),
'dc_subject' => $this->input->post('dc_subject'),
'dc_language' => $this->input->post('dc_language'),
'dc_description' => $this->input->post('dc_description'),
'google_ana'=>$this->input->post('google_ana'));
$this->db->where('id', 1);
$this->db->update('homepage_meta', $data);
redirect("product/homepage");
    }
    public function add_meta(){
      $data= array('meta_title' => $this->input->post('meta_title'),
'meta_keyword' => $this->input->post('meta_keyword'),
'meta_desc' => $this->input->post('meta_desc'),
'robots' => $this->input->post('robots'),
'googlebot' => $this->input->post('googlebot'),
'google_ana' => $this->input->post('google_ana'));
$data2 = $this->input->post('type');
//$this->db->where('type', );
  $this->db->where("type LIKE '$data2'");
$this->db->update('meta', $data);
//echo $this->db->last_query();//
if($this->input->post('type')=='vendor-faq')
{
  redirect("product/vview_faq");
}
if($this->input->post('type')=='faq')
{
  redirect("product/view_faq");
}
if($this->input->post('type')=='careers')
{
  redirect("product/careerpage");
}

redirect("product/".str_replace('-','',$this->input->post('type')));
    }
    public function edit_stitch_heading(){
      //print_r($_POST);
      $data = array(
        'title'=>$_POST['title1'],
        'title2'=>$_POST['title2'],
        'title3'=>$_POST['title3'],
        'title4'=>$_POST['title4'],
        'title5'=>$_POST['title5'],
        'title6'=>$_POST['title6'],
        'title7'=>$_POST['title7'],
          );
      $this->db->where('id', 1);
      $this->db->update('stitching_headings', $data);
      $this->session->set_flashdata('message_stitch_heading', 'Headings Updated Successfully');
      redirect("product/stitiching_headings");
    }

    public function stitiching_headings(){
    $data['attr']=$this->db->get("stitching_headings")->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitiching_headings',$data,true);
    $this->adminlayout();
    }
    public function popupimage(){
      $data['image'] = $this->db->get('city_popup')->row();
     // print_r($data['image']);
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/popup',$data,true);
     // $this->middle = 'admin/popup'; // passing middle to function. change this for different views.
      $this->adminlayout();

    }
    public function popup_upload(){

          $cfile=$this->input->post("old_cfile");
          if(!empty($_FILES["cfile"]["name"]))
        {
            $config['upload_path'] = './adminassets/styles/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1000000';
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
        $data=array(
          'image'=>$cfile
       );
        $this->db->where('id',1);
        $this->db->update('city_popup',$data);
        redirect("product/popupimage");
    }
    public function style_table_ajax(){
//print_r($_GET);
            $data['id'] = $_GET['id'];
        $data['name'] = $_GET['name'];
        $data['segment_data'] = $_GET['segment_data'];
          if(isset($_GET['page_no']))
          {//echo "bhen";
            /*$data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];*/
        $data['page_no'] = $_GET['page_no'];
        /*$this->load->view('admin/ajax_page',$data);*/
          }

//print_r($_GET);
//exit;

          $this->load->view('admin/ajax_page',$data);


  //$this->adminlayout();
}
public function t_w_order(){

   $tailors=$this->db->get("tailors")->result();
    foreach ($tailors as $tailor) {
      $d = strtotime("today");
$this->db->where('odate BETWEEN "'. date('Y-m-d', strtotime("last sunday midnight",$d)). '" and "'. date('Y-m-d', strtotime("next saturday",$d)).'"');

$weeks_orders = $this->db->get("orders")->result();

      foreach ($weeks_orders as $orders) {
         $this->db->select('*');
     $this->db->order_by("id","desc");

     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');

        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tailor->id))->result();

      }
}
return $items;
}

public function send_message()
    {

      $site_address=$this->db->get('footer')->row();
     //print_r($pinfo);
         $message = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="http://mobiledarzi.com/assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to MobileDarzi!</h2>
                            <br>

                            
                            <p>Dear Subscriber,</p>
                            
                            <p>'.$this->input->post('message').'</p>

                            

                          </p>
                            <br>
                            <p>Welcome and Thanks!</p>
                            
                            <p>MobileDarzi Team</p>
                            <br>
                            

                            </div>
                           
                        </div>
                        </body>
                        </html>';



        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

         $to_email = $this->input->post('to_email');
         $to_mail = explode(',', $to_email);
         $mail_count= count($to_mail);
         for($i=0;$i<$mail_count;$i++)
         {
             $mail_id = TRIM($to_mail[$i]);
             $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
             $this->email->to($mail_id);
             $this->email->subject($this->input->post('subject'));
              $this->email->message($message);
             $this->email->send();
             $this->email->clear();
        }
        redirect(base_url() . 'product/manage_newsletter');
    }

public function t_t_order(){
$items=array();
   $tailors=$this->db->get("tailors")->result();
    foreach ($tailors as $tailor) {
     $today = date("Y-m-j");
        $this->db->where("odate",$today);
      $todays_orders = $this->db->get("orders")->result();

      foreach ($todays_orders as $orders) {
         $this->db->select('*');
     $this->db->order_by("id","desc");

     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');

        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tailor->id))->result();

      }
}
return $items;
}

public function t_m_order(){
$items=array();
   $tailors=$this->db->get("tailors")->result();
    foreach ($tailors as $tailor) {
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

        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'tid'=>$tailor->id))->result();

      }
}
return $items;
}

public function t_all_order(){
$items=array();
 $tailors=$this->db->get("tailors")->result();
    foreach ($tailors as $tailor) { $tids[] =$tailor->id; }
    $this->db->select('*');
    $this->db->order_by("oid","desc");
    $this->db->from('order_items');
     $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
   $this->db->where_in("tid",$tids);
  $items[]=$this->db->get()->result();

return $items;

}
    public function w_order(){
      $items=array();
  $vid = $this->session->userdata('vid');
   //echo "<script>alert('invendor')</script>";
  $d = strtotime("today");
$this->db->where('odate BETWEEN "'. date('d-m-Y', strtotime("last sunday midnight",$d)). '" and "'. date('d-m-Y', strtotime("next saturday",$d)).'"');

$weeks_orders = $this->db->get("orders")->result();
      foreach ($weeks_orders as $orders) {

        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'vendor_id!='=>''))->result();
      }
//echo $this->db->last_query();
return $items;
}

public function t_order(){
$items=array();
   $vendors=$this->db->get("vendor")->result();

     $today = date("Y-m-j");
        $this->db->where("odate",$today);
      $todays_orders = $this->db->get("orders")->result();
      //echo $this->db->last_query();
      foreach ($todays_orders as $orders) {
        //echo $orders->oid." | ";
        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'vendor_id!='=>''))->result();
        //print_r($items);
      }

//echo $this->db->last_query();
//echo "<pre>".print_r($items); die;
//print_r($items);
return $items;

}

public function m_order(){
$items=array();
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
        //print_r($orders);
        $items[] = $this->db->get_where("order_items",array('oid'=>$orders->oid,'vendor_id!='=>''))->result();
      }
return $items;
}
public function all_order(){
$items=array();
 $vendors=$this->db->get("vendor")->result();
    foreach ($vendors as $vendor) { $vids[] = $vendor->vid; }
    $this->db->select('*');
    $this->db->order_by("id","desc");
    $this->db->from('order_items');
   $this->db->where_in("vendor_id",$vids);
  $items[]=$this->db->get()->result();

return $items;
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

      if(!empty($items)){
       $i=1;
            $paid=0;$due=0;
             foreach($items as $item){
              if(!empty($item)){
                foreach($item as $item){
              if(!empty($item)){
                      $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
      $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price);
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();

$data1 = new stdClass;
$data1->Order_no = $item->oid;
$data1->Date = $order_date->odate;
$data1->Product = $item->pname;
$data1->Price =$item->price;
$data1->PayAmount =$tax_price;
$data1->User_Name = $order_date->bname;
$data1->User_Address = $order_date->baddress;
$data[]=$data1;

}}}}}

else if($sorting==''){
      $items = $this->all_order();
       if(!empty($items)){
       $i=1;
            $paid=0;$due=0;
             foreach($items as $item){
              if(!empty($item)){
                foreach($item as $item){
              if(!empty($item)){
                $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
      $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price);
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();

$data1 = new stdClass;
$data1->Order_no = $item->oid;
$data1->Date = $order_date->odate;
$data1->Product = $item->pname;
$data1->Price =$item->subtotal;
$data1->PayAmount =$tax_price;
$data1->User_Name = $order_date->bname;
$data1->User_Address = $order_date->baddress;
$data[]=$data1;

}}}}}
    }
        $this->excel->stream('vendor_report.xls', $data);
  }

 /*   public function excel()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
   
$data=array();

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
$data1->User_Name = $order_date->bname;
$data1->User_Address = $order_date->baddress;
$data[]=$data1;

}}}}}

else if($sorting==''){
      $items = $this->all_order();
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
$data1->User_Name = $order_date->bname;
$data1->User_Address = $order_date->baddress;
$data[]=$data1;

}}}}}
    }
        $this->excel->stream('vendor_report.xls', $data);
  }*/



    public function excel_tailor()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
   $sorting = $this->session->userdata('sorting');
$data=array();


      if($sorting=='w_order')
      {
        $items = $this->t_w_order();
    }
    else if($sorting=='t_order')
      {
        $items = $this->t_t_order();

    }
    else if($sorting=='m_order')
      {
        $items = $this->t_m_order();

    }
    else if($sorting==''){
      $items = $this->t_all_order();
    }


      if(!empty($items)){
       $i=1;
            $paid=0;$due=0;
             foreach($items as $item){
              if(!empty($item)){
                foreach($item as $item){
              if(!empty($item)){
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
$tname = $this->db->get_where('tailors',array("id"=>$item->tid))->row()->tname;

$data1 = new stdClass;
$data1->Order_no = "OMD-".$item->oid;
$data1->Date = $order_date->odate;
$data1->Product = $item->pname;
$data1->Tailor_Price =$item->scost;
$data1->User_ID = "UMD-".$order_date->userid;
$data1->Tailor_Name = $tname." ( TMD-".$item->tid." )";
 if($item->pstatus==""){
  $data1->Status = "Payment Due";
}else if($item->pstatus=='Completed'){
  $data1->Status = "Payment Completed";
}
//$data1->User_Address = $order_date->baddress;

$data[]=$data1;

}}}}}

        $this->excel->stream('tailors_report.xls', $data);
  }

  public function all_vendors()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();
        $user = $this->db->get("vendor")->result();
        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Serial_no = "VMD-".$user->vid;
          $data1->User_Name = $user->vendor_name;
          $data1->Contact = $user->contact;
          $data1->Email =$user->email;
          //$data1->Landmark = $user->landmark;
          $data1->Address = $user->address;
          $city = $this->db->get_where('cities',array('id'=>$user->city))->row()->name;
          $data1->City = $city;
          $city = $this->db->get_where('states',array('id'=>$user->state))->row()->name;
          $data1->State = $city;
          //$data1->City = $user->city;
          //$data1->State = $user->state;
          $data1->Pincode = $user->pincode;
          $data1->Pan_Number = $user->pan_number;
          $data1->Vat_Number = $user->vat_number;
          $data1->Tin_Number = $user->tin_number;
          $data1->Acc_Type = $user->acc_type;
          $data1->Deal_Type = $user->deal_type;
          $data1->Id_Type = $user->id_type;
          $data1->Acc_Number = $user->acc_number;
          $data1->Branch_Name = $user->branch_name;
          $data1->Branch_Code = $user->branch_code;
          $data1->Bank_IFC = $user->bank_ifc;
          $data1->Option = $user->option;
          $data1->Account_Holder = $user->account_holder;
          $data1->Gst_Number = $user->gst_number;
          $data1->Registered_date = $user->reg_date;
          $data[]=$data1;
        }
        $this->excel->stream('all_vendors.xls', $data);
  }
    public function all_tailors()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();
        $user = $this->db->get("tailors")->result();

        foreach ($user as $user) {
        $city= $this->db->get_where('cities',array('id'=>$user->tcity))->row();
        $state= $this->db->get_where('states',array('id'=>$user->tstate))->row();
       // echo $this->db->last_query();die;
          $data1 = new stdClass;
          $data1->Serial_no = "TMD-".$user->id;
          $data1->User_Name = $user->tname;
          $data1->Contact = $user->tphone;
          $data1->Email =$user->temail;
          $data1->Address = $user->taddress;
          $data1->City = $city->name;
          $data1->State = $state->name;
          $data1->Pincode = $user->pincode;
          $data1->Gender = $user->gender;
          $data1->Shop_Name = $user->shopname;
          $data1->Shop_Number = $user->tshop_number;
          $data1->Shop_Address = $user->tshop_address;
                    $data1->Speciliazation = $user->speciliazation;
          $data1->Payment_Type = $user->payment_type;
          $data1->Acc_Number = $user->acc_no;
          $data1->Bank_Name = $user->bank_name;
          $data1->Branch_Name = $user->branch_name;
          $data1->Branch_Code = $user->branch_code;
          $data1->Bank_IFSC = $user->ifsc_code;
          $data[]=$data1;
        }
        $this->excel->stream('all_tailors.xls', $data);
  }

      public function all_orders()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();


  $this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->join('users','orders.userid = users.uid');
    $this->db->where(array("ostatus!="=>"Completed","pay_status"=>'success',"delete"=>0));

  $user=$this->db->get("orders")->result();
  
        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Order_No = "OMD-".$user->oid;
          $data1->User_Id = "UMD-".$user->userid;
          $data1->User_Name = $user->bname;
          $city = $this->db->get_where('cities',array('id'=>$user->bcity))->row()->name;
          $data1->City = $city;
          $data1->Quantity = $user->bitems;
          $data1->Pay_Method = $user->pay_method;
           $data1->Status = $user->ostatus;
          $data1->Order_Date = $user->odate;
          $data1->Order_Total = $user->ototal;
          
          $data[]=$data1;
        }
        $this->excel->stream('all_orders.xls', $data);
  }

        public function all_complete_orders()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();


  $this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->join('users','orders.userid = users.uid');
    $this->db->where(array("shipping_status"=>"Delivered","pay_status"=>'success',"delete"=>0));

  $user=$this->db->get("orders")->result();
  
        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Order_No = "OMD-".$user->oid;
          $data1->User_Id = "UMD-".$user->userid;
          $data1->User_Name = $user->bname;
          $city = $this->db->get_where('cities',array('id'=>$user->bcity))->row()->name;
          $data1->City = $city;
          $data1->Quantity = $user->bitems;
          $data1->Pay_Method = $user->pay_method;
           $data1->Status = $user->ostatus;
          $data1->Order_Date = $user->odate;
          $data1->Order_Total = $user->ototal;
          
          $data[]=$data1;
        }
        $this->excel->stream('all_complete_orders.xls', $data);
  }
  /*$this->db->from('order_items');
  $this->db->join('orders', 'orders.oid = order_items.oid');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("order_items.measures!=","");
  $this->db->order_by("order_items.id","desc");
  $result=$this->db->get();*/
      public function all_stitch()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();
        //$user = $this->db->get("orders")->result();

        
   $this->db->from('order_items','orders');
  $this->db->join('orders', 'orders.oid = order_items.oid');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("order_items.measures!=","");
  $this->db->where("order_items.delete",0);
  $this->db->order_by("order_items.id","desc");
  $user=$this->db->get()->result();

        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Order_No = "OMD-".$user->oid;
          $data1->User_Id = "UMD-".$user->userid;
          $data1->User_Name = $user->bname;
          $data1->Title = $user->pname;
           if($user->order_type=='stitch'){$data1->Title = 'Personal'; } elseif($user->order_type=='stitch with fabric'){ $data1->Title = 'Mobile Darzi';}
            $data1->Status = $user->ostatus;
          //$data1->Size = $user->size;
          //$data1->Color =$user->color;
          /* $type = explode('/',$user->pimg);
          if($type[0]=='accessories'){echo "PAMD-".$user->pid; }
          else if($type[0]=='fabrics'){echo "PFMD-".$user->pid; }
          else if($type[0]=='uniform'){echo "PUMD-".$user->pid; }
          else if($type[0]=='online_boutique'){echo "POMD-".$user->pid; }*/

          //$data1->Pid = $user->pid;
          //$data1->City = $user->bcity;
          //$data1->State = $user->bstate;
          //$data1->Pincode = $user->bpin;
          //$data1->Landmark = $user->blandmark;

          $data1->Pay_Method = $user->pay_method;
          
          //$data1->Delivery_Date = $user->delivery_date;
          $data1->Order_Date = $user->odate;
          $data1->Order_Total = $user->ototal;
          


        
          $data[]=$data1;
        }
        $this->excel->stream('all_stitch.xls', $data);
  }


  public function all_alt()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();
  $this->db->from('order_items');
  $this->db->join('orders', 'orders.oid = order_items.oid');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("order_items.order_type","altration");
  $this->db->order_by("id","desc");
  $user=$this->db->get()->result();

        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Order_No = "OMD-".$user->oid;
           $data1->User_Id = "UMD-".$user->userid;
          $data1->User_Name = $user->bname;
          $data1->Title = $user->pname;
          //$data1->Size = $user->size;
          //$data1->Color =$user->color;
          //$data1->Pid = $user->pid;
          //$data1->City = $user->bcity;
          //$data1->State = $user->bstate;
          //$data1->Pincode = $user->bpin;
          //$data1->Landmark = $user->blandmark;
                      $data1->Status = $user->ostatus;
          $data1->Pay_Method = $user->pay_method;
          //$data1->Delivery_Date = $user->delivery_date;
          $data1->Order_Date = $user->odate;
          $data1->Order_Total = $user->ototal;
          $data[]=$data1;
        }
        $this->excel->stream('all_alteration.xls', $data);
  }
    
  public function excel_user()
  {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data=array();
        $user = $this->db->get("users")->result();
        foreach ($user as $user) {
          $data1 = new stdClass;
          $data1->Serial_no = $user->uid;
          $data1->User_Name = $user->name;
          $data1->Contact = $user->mobile;
          $data1->Email =$user->email;
          $data1->Landmark = $user->landmark;
          $data1->Address = $user->address;
          $data1->City = $user->city;
          $data1->State = $user->state;
          $data1->Pincode = $user->pincode;
          $data1->Registered_date = $user->reg_date;
          $data[]=$data1;
        }
        $this->excel->stream('users_report.xls', $data);
  }

    public function excel_fabric()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
  $data2=array();
 $all=$this->db->get_where("fabric",array("status"=>'approve'));
  $data['items']=$all->result();
 if(!empty($data['items'])){
       $i=1;
            $paid=0;$due=0;
             foreach($data['items'] as $item){
              
$data1 = new stdClass;
$data1->Id = 'PFMD-'.$item->id;
$data1->Date = $item->padddate;
$data1->Title = $item->title;
$data1->Price =$item->price;
$data1->Vendor_Name = $item->vendor_name;
$data1->Vendor_Id = $item->vendor_id;
$data1->SKU = $item->SKU;
$data1->Quantity = $item->quantity;
 $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$item->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($item->title)).'"')->row()->qty;

$data1->Quantity_In_Stock= (int)$item->quantity-((int)$count);

//
   $current_date=date('Y-m-d');
           if(($current_date>=$item->from_date) AND ($current_date<=$item->to_date)){
            if($item->offer_type=='Percentage')
              {
                $value = 100 - $item->offer_price;
                $data1->Discount_Price ='Rs '.round(($item->price/100)*$value);
               }
              elseif($item->offer_type=='Amount')
              {
                $value = $item->offer_price;
                 $data1->Discount_Price ='Rs '.round($item->price - $value); }

            }
            else
              {
                 $data1->Discount_Price = "-"; 
              }
//
$data1->Thumb_url = $item->turl;
$data1->Front_url = $item->furl;
$data1->Back_url = $item->burl;
$data1->Sizing_Guide_url = $item->surl;
$data2[]=$data1;
}}$this->excel->stream('fabric.xls', $data2);
  }
    public function excel_online()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
  $data2=array();
 $all=$this->db->get_where("online_boutique",array("status"=>'approve'));
  $data['items']=$all->result();
 if(!empty($data['items'])){
       $i=1;
            $paid=0;$due=0;
             foreach($data['items'] as $item){
              
$data1 = new stdClass;
$data1->Id = 'POMD-'.$item->id;
$data1->Date = $item->padddate;
$data1->Title = $item->brand;
$data1->Price =$item->price;
$data1->Vendor_Name = $item->vendor_name;
$data1->Vendor_Id = $item->vendor_id;
$data1->SKU = $item->SKU;
$data1->Quantity = $item->quantity;
 $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$item->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($item->brand)).'"')->row()->qty;

$data1->Quantity_In_Stock= (int)$item->quantity-((int)$count);

//
   $current_date=date('Y-m-d');
           if(($current_date>=$item->from_date) AND ($current_date<=$item->to_date)){
            if($item->offer_type=='Percentage')
              {
                $value = 100 - $item->offer_price;
                $data1->Discount_Price ='Rs '.round(($item->price/100)*$value);
               }
              elseif($item->offer_type=='Amount')
              {
                $value = $item->offer_price;
                 $data1->Discount_Price ='Rs '.round($item->price - $value); }

            }
            else
              {
                 $data1->Discount_Price = "-"; 
              }
//
              $data1->Thumb_url = $item->turl;
$data1->Front_url = $item->furl;
$data1->Back_url = $item->burl;
$data1->Sizing_Guide_url = $item->surl;
$data2[]=$data1;
}}$this->excel->stream('online_boutique.xls', $data2);
  }
  public function excel_accessories()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
  $data2=array();
 $all=$this->db->get_where("accessories",array("status"=>'approve'));
  $data['items']=$all->result();
 if(!empty($data['items'])){
       $i=1;
            $paid=0;$due=0;
             foreach($data['items'] as $item){
              
$data1 = new stdClass;
$data1->Id = 'PAMD-'.$item->acc_id;
$data1->Date = $item->padddate;
$data1->Title = $item->brand;
$data1->Price =$item->price;
$data1->Vendor_Name = $item->vendor_name;
$data1->Vendor_Id = $item->vendor_id;
$data1->SKU = $item->SKU;
$data1->Quantity = $item->quantity;
 $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$item->acc_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($item->brand)).'"')->row()->qty;

$data1->Quantity_In_Stock= (int)$item->quantity-((int)$count);

//
   $current_date=date('Y-m-d');
           if(($current_date>=$item->from_date) AND ($current_date<=$item->to_date)){
            if($item->offer_type=='Percentage')
              {
                $value = 100 - $item->offer_price;
                $data1->Discount_Price ='Rs '.round(($item->price/100)*$value);
               }
              elseif($item->offer_type=='Amount')
              {
                $value = $item->offer_price;
                 $data1->Discount_Price ='Rs '.round($item->price - $value); }

            }
            else
              {
                 $data1->Discount_Price = "-"; 
              }
//
              $data1->Thumb_url = $item->turl;
$data1->Front_url = $item->furl;
$data1->Back_url = $item->burl;
$data1->Sizing_Guide_url = $item->surl;
$data2[]=$data1;
}}$this->excel->stream('accessories.xls', $data2);
  }
   public function excel_uniform()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
  $data2=array();
 $all=$this->db->get_where("uniform",array("status"=>'approve'));
  $data['items']=$all->result();
 if(!empty($data['items'])){
       $i=1;
            $paid=0;$due=0;
             foreach($data['items'] as $item){
              
$data1 = new stdClass;
$data1->Product_Id = 'PUMD-'.$item->uniform_id;
$data1->Date = $item->padddate;
$data1->Title = $item->school_name;
$data1->Price =$item->price;
$data1->Vendor_Name = $item->vendor_name;
$data1->Vendor_Id = $item->vendor_id;
$data1->SKU = $item->SKU;
$data1->Quantity = $item->quantity;
 $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$item->uniform_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($item->school_name)).'"')->row()->qty;

$data1->Quantity_In_Stock= (int)$item->quantity-((int)$count);

//
   $current_date=date('Y-m-d');
           if(($current_date>=$item->from_date) AND ($current_date<=$item->to_date)){
            if($item->offer_type=='Percentage')
              {
                $value = 100 - $item->offer_price;
                $data1->Discount_Price ='Rs '.round(($item->price/100)*$value);
               }
              elseif($item->offer_type=='Amount')
              {
                $value = $item->offer_price;
                 $data1->Discount_Price ='Rs '.round($item->price - $value); }

            }
            else
              {
                 $data1->Discount_Price = "-"; 
              }
//
              $data1->Thumb_url = $item->turl;
$data1->Front_url = $item->furl;
$data1->Back_url = $item->burl;
$data1->Sizing_Guide_url = $item->surl;

$data2[]=$data1;
}}$this->excel->stream('uniform.xls', $data2);
  }

    public function excel_more()
  {
 $this->load->library("Excel");
  $this->excel->setActiveSheetIndex(0);
  $data2=array();
 $all=$this->db->get_where("more_services",array("status"=>'approve'));
  $data['items']=$all->result();
 if(!empty($data['items'])){
       $i=1;
            $paid=0;$due=0;
             foreach($data['items'] as $item){
              
$data1 = new stdClass;
$data1->Id = $item->id;
$data1->Date = $item->padddate;
$data1->Title = $item->subcategory;
$data1->Price =$item->price;
$data1->Vendor_Name = $item->vendor_name;
$data1->Vendor_Id = $item->vendor_id;

$data2[]=$data1;
$data1->Thumb_url = $item->turl;


}}$this->excel->stream('more.xls', $data2);
  }
////
    public function download_pdf_fabric()
  {ob_start();
   

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('Fabrics');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>Fabrics</h2></center>
<table border="1">
<tr><th><b>Sno</b></th>
<th><b>Date</b></th>
<th><b>Product ID</b></th>


<th><b>SKU</b></th>
<th><b>Title</b></th>
<th><b>Vendorname(ID)</b></th>
<th><b>Main Category</b></th>

<th><b>Quantity</b></th>
<th><b>In Stock Quantity</b></th>
<th><b>Discount Price</b></th>
<th><b>Price</b></th>
</tr>
';


$this->db->order_by("id","desc");

  $all=$this->db->get_where("fabric",array("status"=>'approve'));
  $data['items']=$all->result();

      if(!empty($data['items'])){
       $i=1;//print_r($orders
            
                foreach($data['items'] as $fab){
              if(!empty($fab)){



$html.='<tr class="gradeA">
                          <td class="center" style="padding:1%">'. $i.'</td>
                          <td class="center" style="padding:1%">'.$fab->padddate."".'</td>
                          <td class="center">PFMD-'.$fab->id.'</td>
                          
                          <td style="padding:1%">'.$fab->SKU.'</td>
                          <td style="padding:1%">'.$fab->title.'</td>
                          <td style="padding:1%" class="center">'.$fab->vendor_name."".'<br>';

                           if(!empty($fab->vendor_id)){

                            $html .= "VMD-".$fab->vendor_id;
                            }else{ 
                              $html .= "Admin product";} 

                              $html .='</td><td style="padding:1%">';
                           if($fab->category==1) $html .= "Women";  if($fab->category==2) $html .= "Men"; if($fab->category==3) $html .= "Kids" ; 
                           $html .='</td>
                          <td style="padding:1%">'.$fab->quantity.'</td><td>';
$count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$fab->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->title)).'"')->row()->qty;
$s_qty=0;
                          $sss = $fab->id;
    $bundle = $this->db->get_where('bundle',array('part_ids'=>$sss,'addon_or_not'=>'4'))->result();
foreach ($bundle as $value4) {
          $sbundle = $this->db->get_where('stitching_bundle',array('bundle_no'=>$value4->bundle_no))->row();  
$count_ss = $this->db->query('select oid from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$sbundle->id)->row();
if(!empty($count_ss))
{$s_qty += $value4->qty;}}
$qty = $fab->quantity;
$html.= (int)$qty-((int)$count+$s_qty)."</td><td>";

            $current_date=date('Y-m-d');
           if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round(($fab->price/100)*$value);
               }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round($fab->price - $value); }

            }
            else
              {
                $html .= "-"; 
              }
                          $html .='</td><td style="padding:1%"><i class="fa fa-inr"></i>'.$fab->price.'</td>
                        
                        </tr>'; $i++;}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('products.pdf', 'I');
  }
////

  ////
    public function download_pdf_online()
  {ob_start();
   

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('Online Boutique');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>Online Boutique</h2></center>
<table border="1">
<tr><th><b>Sno</b></th>
<th><b>Date</b></th>
<th><b>Product ID</b></th>


<th><b>SKU</b></th>
<th><b>Title</b></th>
<th><b>Vendorname(ID)</b></th>
<th><b>Main Category</b></th>
<th><b>Quantity</b></th>
<th><b>Quantity In Stock</b></th>
<th><b>Discount Price</b></th>
<th><b>Price</b></th></tr>
';


$this->db->order_by("id","desc");

  $all=$this->db->get_where("online_boutique",array("status"=>'approve'));
  $data['items']=$all->result();

      if(!empty($data['items'])){
       $i=1;//print_r($orders
            
                foreach($data['items'] as $fab){
              if(!empty($fab)){



$html.='<tr class="gradeA">
                          <td class="center" style="padding:1%">'. $i.'</td>
                          <td class="center" style="padding:1%">'.$fab->padddate."".'</td>
                          <td class="center">PFMD-'.$fab->id.'</td>
                          
                          <td style="padding:1%">'.$fab->SKU.'</td>
                          <td style="padding:1%">'.$fab->brand.'</td>
                          <td style="padding:1%" class="center">'.$fab->vendor_name."".'<br>';

                           if(!empty($fab->vendor_id)){

                            $html .= "VMD-".$fab->vendor_id;
                            }else{ 
                              $html .= "Admin product";} 

                              $html .='</td><td style="padding:1%">';
                           if($fab->main_category==1) $html .= "Women";  if($fab->main_category==2) $html .= "Men"; if($fab->main_category==3) $html .= "Kids" ; $html .='</td>
                          <td style="padding:1%">'.$fab->quantity.'</td><td>';
                          $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$fab->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->brand)).'"')->row()->qty;

$html.= ((int)$fab->quantity)-((int)$count)."</td><td>";


            $current_date=date('Y-m-d');
           if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round(($fab->price/100)*$value);
               }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round($fab->price - $value); }

            }
            else
              {
                $html .= "-"; 
              }
            
            
                          $html.='</td><td style="padding:1%"><i class="fa fa-inr"></i>'.$fab->price.'</td>
                        
                        </tr>'; $i++;}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('online_boutique.pdf', 'I');
  }
////
    ////
    public function download_pdf_uniform()
  { ob_start();
   

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('Uniform');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>Uniform</h2></center>
<table border="1">
<tr><th><b>Sno</b></th>
<th><b>Date</b></th>
<th><b>Product ID</b></th>
<th><b>SKU</b></th>
<th><b>Title</b></th>
<th><b>Vendorname(ID)</b></th>
<th><b>Main Category</b></th>
<th><b>Quantity</b></th>
<th><b>Quantity In Stock</b></th>
<th><b>Discount Price</b></th>
<th><b>Price</b></th></tr>
';

$this->db->order_by("uniform_id","desc");

  $all=$this->db->get_where("uniform",array("status"=>'approve'));
  $data['items']=$all->result();

      if(!empty($data['items'])){
       $i=1;//print_r($orders
            
                foreach($data['items'] as $fab){
              if(!empty($fab)){



$html.='<tr class="gradeA">
                          <td class="center" style="padding:1%">'. $i.'</td>
                          <td class="center" style="padding:1%">'.$fab->padddate."".'</td>
                          <td class="center">PFMD-'.$fab->uniform_id.'</td>
                          
                          <td style="padding:1%">'.$fab->SKU.'</td>
                          <td style="padding:1%">'.$fab->school_name.'</td>
                          <td style="padding:1%" class="center">'.$fab->vendor_name."".'<br>';

                           if(!empty($fab->vendor_id)){

                            $html .= "VMD-".$fab->vendor_id;
                            }else{ 
                              $html .= "Admin product";} 

                              $html .='</td><td style="padding:1%">';

                           $html.=$fab->uni_category; $html .='</td><td>'.$fab->quantity.'</td><td>';
                            $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$fab->uniform_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->school_name)).'"')->row()->qty;

$html.= ((int)$fab->quantity)-((int)$count)."</td><td>";

            $current_date=date('Y-m-d');
           if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round(($fab->price/100)*$value);
               }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round($fab->price - $value); }

            }
            else
              {
                $html .= "-"; 
              }
            
            
                          $html.='</td>
                          <td style="padding:1%"><i class="fa fa-inr"></i>'.$fab->price.'</td>
                        
                        </tr>'; $i++;}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('uniform.pdf', 'I');
  }
////
  ////
    public function download_pdf_more()
  { ob_start();
   

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('More Services');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>More Services</h2></center>
<table border="1">
<tr><th><b>Sno</b></th>
<th><b>Date</b></th>
<th><b>Product ID</b></th>



<th><b>Title</b></th>
<th><b>Vendorname(ID)</b></th>

<th><b>Price</b></th></tr>
';


$this->db->order_by("id","desc");

  $all=$this->db->get_where("more_services",array("status"=>'approve'));
  $data['items']=$all->result();

      if(!empty($data['items'])){
       $i=1;//print_r($orders
            
                foreach($data['items'] as $fab){
              if(!empty($fab)){



$html.='<tr class="gradeA">
                          <td class="center" style="padding:1%">'. $i.'</td>
                          <td class="center" style="padding:1%">'.$fab->padddate."".'</td>
                          <td class="center">PFMD-'.$fab->id.'</td>
                          
                         
                          <td style="padding:1%">'.$fab->subcategory.'</td>
                          <td style="padding:1%" class="center">'.$fab->vendor_name."".'<br>';

                           if(!empty($fab->vendor_id)){

                            $html .= "VMD-".$fab->vendor_id;
                            }else{ 
                              $html .= "Admin product";} 

                            

                         
                          $html .='</td><td style="padding:1%"><i class="fa fa-inr"></i>'.$fab->price.'</td>
                        
                        </tr>'; $i++;}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('more.pdf', 'I');
  }
////
    ////
    public function download_pdf_accessories()
  {ob_start();
   

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('Accessories');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>Accessories</h2></center>
<table border="1">
<tr><th><b>Sno</b></th>
<th><b>Date</b></th>
<th><b>Product ID</b></th>


<th><b>SKU</b></th>
<th><b>Title</b></th>
<th><b>Vendorname(ID)</b></th>
<th><b>Main Category</b></th>
<th><b>Price</b></th>
<th><b>Quantity</b></th>
<th><b>Quantity In Stock</b></th>
<th><b>Discount Price</b></th>
</tr>
';


$this->db->order_by("acc_id","desc");

  $all=$this->db->get_where("accessories",array("status"=>'approve'));
  $data['items']=$all->result();

      if(!empty($data['items'])){
       $i=1;//print_r($orders
            
                foreach($data['items'] as $fab){
              if(!empty($fab)){



$html.='<tr class="gradeA">
                          <td class="center" style="padding:1%">'. $i.'</td>
                          <td class="center" style="padding:1%">'.$fab->padddate."".'</td>
                          <td class="center">PFMD-'.$fab->acc_id.'</td>
                          
                          <td style="padding:1%">'.$fab->SKU.'</td>
                          <td style="padding:1%">'.$fab->brand.'</td>
                          <td style="padding:1%" class="center">'.$fab->vendor_name."".'<br>';

                           if(!empty($fab->vendor_id)){

                            $html .= "VMD-".$fab->vendor_id;
                            }else{ 
                              $html .= "Admin product";} 

                              $html .='</td><td style="padding:1%">';

                          if($fab->main_category==1) $html .= "Women";  if($fab->main_category==2) $html .= "Men"; if($fab->main_category==3) $html .= "Kids" ; $html .='</td>
                          <td style="padding:1%"><i class="fa fa-inr"></i>'.$fab->price.'</td><td>'.$fab->quantity.'</td><td>';
                           $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$fab->acc_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->brand)).'"')->row()->qty;

$html.= ((int)$fab->quantity)-((int)$count)."</td><td>";

            $current_date=date('Y-m-d');
           if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round(($fab->price/100)*$value);
               }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                $html .='<i class="fa fa-inr"></i>'.round($fab->price - $value); }

            }
            else
              {
                $html .= "-"; 
              }
            
            
                          $html.='</td>
                        
                        </tr>'; $i++;}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('accessories.pdf', 'I');
  }
////


  public function download_pdf()
  {ob_start();
    $sorting = $this->session->userdata('sorting');

     $this->load->library('Pdf');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetTitle('Vendor Report');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$html = '<html>
<head></head>
<body>
<center><h2>Vendor Report</h2></center>
<table border="1">
<tr><th><b>Order no</b></th>
<th><b>Date</b></th>
<th><b>Vendor ID</b></th>
<th><b>Product Name</b></th>
<th><b>Cost</b></th>
<th><b>PayAmount</b></th>
<th><b>User Name</b></th>
<th><b>Address</b></th></tr>
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
    else if($sorting==''){
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
$vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
$tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price);

$html.="<tr><td>$item->id</td>

<td>$order_date->odate</td>
<td>VMD-$vendor_name->vid</td>
<td>$item->pname</td>
<td>$item->subtotal</td>
<td>$tax_price</td>
<td>$order_date->bname</td>
<td>$order_date->baddress</td>
</tr>
";}}}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('vendor_report.pdf', 'I');
  }
  public function download_pdf_tailor()
  { ob_start();
    $sorting = $this->session->userdata('sorting');

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
<center><h2>Tailor Report</h2></center>
<table border="1">
<tr><th><b>Order no</b></th>
<th><b>Date</b></th>
<th><b>Product Name</b></th>
<th><b>Cost</b></th>
<th><b>User ID</b></th>
<th><b>Tailor name (ID)</b></th>
<th><b>Address</b></th></tr>
';
if($sorting=='w_order')
      {
        $items = $this->t_w_order();
    }
    else if($sorting=='t_order')
      {
        $items = $this->t_t_order();

    }
    else if($sorting=='m_order')
      {
        $items = $this->t_m_order();

    }
    else if($sorting==''){
      $items = $this->t_all_order();

    }



      if(!empty($items)){
       $i=1;//print_r($orders
            $paid=0;$due=0;
             foreach($items as $item){
              if(!empty($item)){
                foreach($item as $item){
              if(!empty($item)){
$order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
$tname = $this->db->get_where('tailors',array("id"=>$item->tid))->row()->tname;

$html.="<tr><td>OMD-$item->oid</td>

<td>$order_date->odate</td>
<td>$item->pname</td>
<td>$item->scost</td>
<td>UMD-$order_date->userid</td>
<td>$tname (TMD-$item->tid)</td>
<td>$order_date->baddress</td>
</tr>
";}}}}}
$html .= "</table>
</body>
</html>";
//echo $html;
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('vendor_report.pdf', 'I');
  }
      public function orders_sorting()
      {
      $sorting = $_POST['sid'];
      $vid = $this->session->userdata('vid');

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
        $this->session->set_userdata('sorting','');
        $items = $this->all_order();

      }
 //print_r($items);

if(!empty($items)){
  ?>
  <table class="table table-striped" id="data-tables1" >
 <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Date</th>
                          <!--th>ProfilePic</th-->
                          <!--th>Name</th-->
                          <th>VendorID</th>
                          <th>ProductID</th>
<th>Cost</th>
                           <th>PayAmount</th>
                          <th>UserID</th>

                          <th>Status</th>
                          <th>Change Status</th>
                        </tr>
                      </thead>
                      <tbody id="orders_sorting_table">
                      <?php
       $i=1;//print_r($orders
            $paid=0;$due=0;
            foreach($items as $item){
              foreach ($item as $item) {
               $item2 = $this->db->get_where("order_items",array("oid"=>$item->oid,"vendor_id"=>$item->vendor_id));
               $item2_result = $item2->result();
               $item2_num = $item2->num_rows();
               //print_r($item2);
               if($item2_num>1 ){
                 $a = array();
                 $total=0;

               foreach ($item2_result as $value) {
$type = explode('/',$value->pimg);
                 //$value->pid;
                if($type[0]=='accessories'){$a[] = "PAMD-".$value->pid; }
                else if($type[0]=='fabrics'){$a[] = "PFMD-".$value->pid; }
                else if($type[0]=='uniform'){$a[] = "PUMD-".$value->pid; }
                else if($type[0]=='online_boutique'){$a[] = "POMD-".$value->pid; }

                $total += $value->subtotal;
               }

               if(!empty($a) && count($a)>1){
              ?>
                       <tr class="gradeA">
                         <td>OMD-<?php echo $item->oid;?></td>
                         <td><?php
                         $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                         echo " $order_date->odate </td><td>";

                          $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
                          //print_r($vendor_name);

                          echo 'VMD-'.$vendor_name->vid."</td><td>";
                           if(!empty($a)){echo implode(' , ', $a);}else{$type = explode('/',$value->pimg);
                                            //$value->pid;
                                           if($type[0]=='accessories'){echo "PAMD-".$value->pid; }
                                           else if($type[0]=='fabrics'){echo "PFMD-".$value->pid; }
                                           else if($type[0]=='uniform'){echo "PUMD-".$value->pid; }
                                           else if($type[0]=='online_boutique'){echo "POMD-".$value->pid; }}?></td>

                         <td>Rs. <?php if($total!=0){echo $total;}else{ echo $item->price;}?>/- <?php if($item->status==""){?>
                         <span class="label label-warning">Due</span>
                         <?php }else{?>
                          <span class="label label-success">Paid</span><?php }?></td>
  <td><?php $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price); echo "Rs. ".$tax_price." /-"; ?></td>

                         <td><?php




                           echo "UMD-".$order_date->userid;?></td><td>
                           <?php

?>
                         <?php if($item->status==""){?>
                         <span class="label label-warning">Pending</span>
                         <?php }else{?>
                          <span class="label label-success">Completed</span><?php }?>
                        </td>
                        <td>

                           <?php if($item->status==''){
                             echo"<button data-toggle='tooltip' title='Payment Due' class='btn btn-xs btn-danger services_disable' href='$item->vendor_id' id='$item->oid'><i class='fa fa-check'></i></button>";
                             }else if($item->status=='completed'){
                               echo "<button data-toggle='tooltip' title='Payment Completed' class='btn btn-xs btn-success' id='$item->oid'><i class='fa fa-check'></i></button>";
                               } ?>
                               <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" href='<?php echo $item->vendor_id;?>' id="<?php echo $item->oid;?>" type="button"><i class="fa fa-trash-o"></i></button>

                        </td>
                       </tr>
                       <?php  $a = array(); $total=0;$i++;//$gt=$gt+$total;
            }$pre_id = $item->oid;
           $total=0;}else{
             ?>
             <tr class="gradeA">
                         <td>OMD-<?php echo $item->oid;?></td>
                         <td><?php
                         $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                         echo " $order_date->odate </td><td>";

                          $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
                          //print_r($vendor_name);

                          echo 'VMD-'.$vendor_name->vid."</td><td>";
                           if(!empty($a)){print_r($a);}else{$type = explode('/',$item->pimg);
                                            //$value->pid;
                                           if($type[0]=='accessories'){echo "PAMD-".$item->pid; }
                                           else if($type[0]=='fabrics'){echo "PFMD-".$item->pid; }
                                           else if($type[0]=='uniform'){echo "PUMD-".$item->pid; }
                                           else if($type[0]=='online_boutique'){echo "POMD-".$item->pid; }}?></td>

                         <td>Rs. <?php  echo $item->subtotal; ?>/- <?php if($item->status==""){?>
                         <span class="label label-warning">Due</span>
                         <?php }else{?>
                          <span class="label label-success">Paid</span><?php }?></td>

                                                     <td><?php $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price); echo "Rs. ".$tax_price." /-"; ?></td>
                         <td><?php

                           echo "UMD-".$order_date->userid;?></td><td>
                           <?php

?>
                         <?php if($item->status==""){?>
                         <span class="label label-warning">Pending</span>
                         <?php }else{?>
                          <span class="label label-success">Completed</span><?php }?>
                        </td>
                        <td>

                           <?php if($item->status==''){
                             echo"<button data-toggle='tooltip' title='Payment Due' class='btn btn-xs btn-danger services_disable' href='$item->vendor_id' id='$item->oid'><i class='fa fa-check'></i></button>";
                             }else if($item->status=='completed'){
                               echo "<button data-toggle='tooltip' title='Payment Completed' class='btn btn-xs btn-success' id='$item->oid'><i class='fa fa-check'></i></button>";
                               } ?>
                               <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" href="<?php echo $item->vendor_id;?>" id="<?php echo $item->oid;?>" type="button"><i class="fa fa-trash-o"></i></button>

                        </td>
                       </tr>
                       <?php
             }}}
            ?>
            </tbody>
                    </table>
                    <?php }


  }

        public function tailor_orders_sorting()
      {

      $sorting = $_POST['sid'];
      //echo $sorting;
      if($_POST['sid']=='t_order')
      {
        $this->session->set_userdata('sorting','t_order');
        $items = $this->t_t_order();


      }else if($_POST['sid']=='w_order')
      {
        $this->session->set_userdata('sorting','w_order');
        $items = $this->t_w_order();


      }
      else if($_POST['sid']=='m_order')
      {
        $this->session->set_userdata('sorting','m_order');
         $items = $this->t_m_order();


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
        //echo "in";
        $this->session->set_userdata('sorting','');
        $items = $this->t_all_order();

      }
// print_r($items);
if(!empty($items)){
  ?>
  <table class="table table-striped" id="data-tables1" >
 <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Date</th>

                          <th>Name</th>

                          <th>ProductName</th>
                          <th>Cost</th>
                          <th>UserName</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>Change Status</th>
                        </tr>
                      </thead>
                      <tbody id="orders_sorting_table">
                      <?php
       $i=1;//print_r($orders
            $paid=0;$due=0;
             foreach($items as $item){

                            if(!empty($item)){
                              foreach($item as $item){

                            if(!empty($item)){

               // print_r($item);

               if($item->price=="paid"){$paid=$paid+$item->price;}
                if($item->status==""){$due=$due+$item->price;}
               ?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $item->oid;?></td>
                          <td><?php
                          $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo " $order_date->odate </td><td>";

                         $vendor_name = $this->db->get_where("tailors",array("id"=>$item->tid))->row();
                           //print_r($vendor_name);

                           echo $vendor_name->tname."</td><td>";

                            echo $item->pname;?></td>

                          <td>Rs. <?php echo $item->price;?>/- <?php if($item->status==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>

                             <td><?php

                            echo $order_date->bname;?></td><td>
                            <?php
                           echo $order_date->baddress."</td><td>";
                           if($item->status==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else{?>
                           <span class="label label-success">Completed</span><?php }?>
                         </td>
                          <td>

                            <?php if($item->status==''){
                              echo"<button class='btn btn-xs btn-success services_disable' id='$item->id'><i class='fa fa-lightbulb-o'></i></button>";
                              }else if($item->status=='completed'){
                                echo "<button class='btn btn-xs btn-danger' id='$item->id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>

                         </td>


                        </tr>
                        <?php $i++;
            } }}}
            ?>
            </tbody>
                    </table>
                    <?php }


  }
    ///
    public function vendor_date_set()
    {
      $data = array(
              'date'=>$_POST['date']);
      $this->db->where('for_v_t', 'vendor');
      if($this->db->update('transaction_date',$data))
      {
        echo "Done";
      }
    }
     public function tailor_date_set()
    {
      $data = array(
              'date'=>$_POST['date']);
      $this->db->where('for_v_t', 'tailor');
      if($this->db->update('transaction_date',$data))
      {
        echo "Done";
      }
    }
    public function get_selected(){
    	//print_r($_POST);
    	 $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>$_POST['type'],"kurti_or_blouse"=>$_POST['kurti_or_blouse']))->result_array();
    	 $q = $this->db->get_where('style',array($_POST['form_title']=>$_POST['form']))->result_array();

    	?> <div style="margin:10px">
                           Select All <input type="checkbox" class="checkAll2">
                          <br>
                            <a class="btn btn-default edit">edit</a>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button><br>
                           </div>

                                   <?php
                                   foreach($styles_type as $styles_type){
                                   	 $i=0;
                                   		foreach($q as $qs){

                                         if($qs['style']==$styles_type['name'] && $qs['sprice']==$styles_type['price'])
                                         	{
                                         		$i++;

                                         		}}
                                        ?>
                                        <div class="container_check">
                                            <img src="<?php echo base_url();?>adminassets/styles/<?php echo $styles_type['image']; ?>" height="60px"/>
                                            <p><?php echo $styles_type['name']." <div>".$styles_type['price']."</div>"; ?></p>
                                            <?php if($i>=1){?>
                                            <input type="hidden" name="old_image[]" value="<?php echo $styles_type['id']; ?>">
                                            <?php } ?>
                                            <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"
                                            <?php if($i>=1){echo "checked";}?>  disabled style="margin:10px;"/>
                                        </div><?php } ?>
<br />
<script type="text/javascript">


 $(".edit").click(function(){
    $('input:checkbox').removeAttr("disabled");
});

  $(".checkAll2").click(function(){
    if($('input:checkbox').is('[disabled=disabled]'))
    {
      //alert('ture');
    }else{
       $('input:checkbox').not(this).prop('checked', this.checked);
    }

});

</script><?php
    }

    public function get_front_nack(){
    	   $front_info=$this->db->get_where("style",array('front_id'=>$_POST['sid']))->result_array();
         ?>
         <select class="form-control front_kurti_style get_selected" name="back_id"  id="2_0_backkurtistyle" required>
          <option value="">Select Front Neck Line</option>
          <?php
          foreach($front_info as $front_info){
           ?>
               <option value="<?php echo $front_info['id'];?>"><?php

            echo $front_info['style'];?></option>

               <?php } ?>
               </select>
              <script>
              $(".front_kurti_style").change(function(){
              					 var thisvari = $(this);
              					 var sid_called=thisvari.val();
              					  var sid=$(this).attr("id");
           var sid2 = sid.split("_");
           var type = sid2[0];
           var kurti_or_blouse = sid2[1];
           var response_id = sid2[2];
           var formdata=$(this).serialize();
           var formdata2 = formdata.split("=");
           var formdata = formdata2[1];
           var formdata_title = formdata2[0];
              					 $.ajax({
              type: "POST",
              url: '<?php echo base_url();?>index.php/Product/get_back_nack',
              data: {sid:sid_called},
              success: function(response){
              $("#back_nack_line").html(response);

              }
              });
              $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_selected',
data: {form_title:formdata_title,form:formdata,type:type,kurti_or_blouse:kurti_or_blouse},
success: function(response){
console.log(response);
$("#"+response_id).html(response);

}
});
              });

              </script>
               <?php

      }
          public function get_front_nack_blouse(){
    	   $front_info=$this->db->get_where("style",array('front_id'=>$_POST['sid']))->result_array();
         ?>
         <select class="form-control front_blouse_style get_selected" name="back_id"  id="2_1_backblousestyle" required>
          <option value="">Select Front Neck Line</option>
          <?php
          foreach($front_info as $front_info){
           ?>
               <option value="<?php echo $front_info['id'];?>"><?php

            echo $front_info['style'];?></option>

               <?php } ?>
               </select>
              <script>
              $(".front_blouse_style").change(function(){
              					 var thisvari = $(this);
              					 var sid_called=thisvari.val();
              					  var sid=$(this).attr("id");
           var sid2 = sid.split("_");
           var type = sid2[0];
           var kurti_or_blouse = sid2[1];
           var response_id = sid2[2];
           var formdata=$(this).serialize();
           var formdata2 = formdata.split("=");
           var formdata = formdata2[1];
           var formdata_title = formdata2[0];
              					 $.ajax({
              type: "POST",
              url: '<?php echo base_url();?>index.php/Product/get_back_nack_blouse',
              data: {sid:sid_called},
              success: function(response){
              $("#back_nack_line").html(response);

              }
              });
              $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_selected',
data: {form_title:formdata_title,form:formdata,type:type,kurti_or_blouse:kurti_or_blouse},
success: function(response){
console.log(response);
$("#"+response_id).html(response);

}
});
              });

              </script>
               <?php

      }


      public function get_back_nack_blouse(){
        //print_r($_POST);
           $front_info=$this->db->get_where("style",array('back_id'=>$_POST['sid']))->result_array();
           //print_r($data['front_nack']);
           ?>
           <select class="form-control get_selected2" name="sleeve_id" id="3_1_sleeveblousestyle" required>
            <option value="">Select Back Neck Line</option>
            <?php
            foreach($front_info as $front_info){
            //  echo $front_info['id'];
            // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
             ?>

                 <option value="<?php echo $front_info['id'];?>"><?php

              echo $front_info['style'];?></option>

                 <?php } ?>
                 </select>
                 <script type="text/javascript">

$(".get_selected2").change(function(){
	//alert('called');
           var sid=$(this).attr("id");
           //var sid_called=thisvari.val();
           //alert(sid);
           var sid2 = sid.split("_");
           var type = sid2[0];
           var kurti_or_blouse = sid2[1];
           var response_id = sid2[2];


           var formdata=$(this).serialize();
           var formdata2 = formdata.split("=");
           var formdata_title = formdata2[0];
           var formdata = formdata2[1];
           //alert(formdata);
           //alert(type+kurti_or_blouse+response_id+formdata);
           //alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_selected',
data: {form_title:formdata_title,form:formdata,type:type,kurti_or_blouse:kurti_or_blouse},
success: function(response){
console.log(response);
$("#"+response_id).html(response);

}
});
});

                 </script>
                 <?php

        }
              public function get_back_nack(){
        //print_r($_POST);
           $front_info=$this->db->get_where("style",array('back_id'=>$_POST['sid']))->result_array();
           //print_r($data['front_nack']);
           ?>
           <select class="form-control get_selected2" name="sleeve_id" id="3_0_sleevekurtistyle" required>
            <option value="">Select Back Neck Line</option>
            <?php
            foreach($front_info as $front_info){
            //  echo $front_info['id'];
            // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
             ?>

                 <option value="<?php echo $front_info['id'];?>"><?php

              echo $front_info['style'];?></option>

                 <?php } ?>
                 </select>
                 <script type="text/javascript">

$(".get_selected2").change(function(){
	//alert('called');
           var sid=$(this).attr("id");
           //var sid_called=thisvari.val();
           //alert(sid);
           var sid2 = sid.split("_");
           var type = sid2[0];
           var kurti_or_blouse = sid2[1];
           var response_id = sid2[2];


           var formdata=$(this).serialize();
           var formdata2 = formdata.split("=");
           var formdata_title = formdata2[0];
           var formdata = formdata2[1];
           //alert(formdata);
           //alert(type+kurti_or_blouse+response_id+formdata);
           //alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_selected',
data: {form_title:formdata_title,form:formdata,type:type,kurti_or_blouse:kurti_or_blouse},
success: function(response){
console.log(response);
$("#"+response_id).html(response);

}
});
});

                 </script>
                 <?php

        }

       public function add_front_nack(){

      $data['all']=$this->db->get_where("front_back_sleeve",array("kurti_or_blouse"=>0))->result();
  	  //$data['subcats']=$this->db->get("category")->result();
        $this->template['middle'] = $this->load->view ($this->middle = 'admin/add_front_nack',$data,true);
          $this->adminlayout();
      }
      public function subcatgories(){

      $data['all']=$this->db->get_where("tailor_subcategory")->result();
      $data['all_cat']=$this->db->get_where("mcategory",array("status"=>'enable'))->result();
      //$data['subcats']=$this->db->get("category")->result();
        $this->template['middle'] = $this->load->view ($this->middle = 'admin/subcatgories',$data,true);
          $this->adminlayout();
      }
       public function add_blouse(){

      $data['all']=$this->db->get_where("front_back_sleeve",array("kurti_or_blouse"=>1))->result();
  	  //$data['subcats']=$this->db->get("category")->result();
        $this->template['middle'] = $this->load->view ($this->middle = 'admin/add_blouse',$data,true);
          $this->adminlayout();
      }
       public function add_subcategories($edit=false){

        if($edit==true)
        {


       $data=array("name"=>$this->input->post("name"),

           "kurti_or_blouse"=>$this->input->post("kurti_or_blouse"));

             $this->db->where("id",$this->uri->segment(3));
             if($this->db->update('front_back_sleeve',$data))
             {
                $data=array("style"=>$this->input->post("name"),
                    "sprice"=>$this->input->post("price"),
             "thumb_front"=>$cfile
             );
              $this->db->where("style_id",$this->uri->segment(3));
              $this->db->update('style',$data);
              $msg="New Design Added Successfully.";
             }
             else
             {
               $msg="Main Design Couldnot be Added.";
             }
        }
        else
        {


        $data=array("category_id"=>$this->input->post("category_id"),

           "sub_cat_name"=>$this->input->post("name"));

       $chk=$this->db->get_where("tailor_subcategory",$data);
       if($chk->num_rows()>0)
       {}else{
             if($this->db->insert('tailor_subcategory',$data))
             {
              $msg="New Subcategory Added Successfully";
             }
             else
             {
               $msg="Subcategory Couldnot be Added";
             }}}
             $redirect = $this->input->post('redirect');redirect("product/subcatgories");}


       public function add_front_nack_input($edit=false){

        if($edit==true)
        {
          $cfile=$this->input->post("old");
          if(!empty($_FILES["cfile"]["name"]))
        {
            $config['upload_path'] = './adminassets/styles/';
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
              $this->resize_image_style($pic);

            }
        }

       $data=array("name"=>$this->input->post("name"),
                    "price"=>$this->input->post("price"),
             "image"=>$cfile,
           "type"=>$this->input->post("type"),
           "kurti_or_blouse"=>$this->input->post("kurti_or_blouse"));

             $this->db->where("id",$this->uri->segment(3));
             if($this->db->update('front_back_sleeve',$data))
             {
                $data=array("style"=>$this->input->post("name"),
                    "sprice"=>$this->input->post("price"),
             "thumb_front"=>$cfile
             );
              $this->db->where("style_id",$this->uri->segment(3));
              $this->db->update('style',$data);
              $msg="New Design Added Successfully.";
             }
             else
             {
               $msg="Main Design Couldnot be Added.";
             }
        }
        else
        {
      //$chk=$this->db->get_where("front_back_sleeve",array("style"=>$this->input->post("category"),"attr_id"=>142));
       //if($chk->num_rows()>0)
       //{
        // $msg="Front Nack Already Exist";
       //}

        $cfile="default.jpg";
        if(!empty($_FILES["cfile"]["name"])){
            $config['upload_path'] = './adminassets/styles/';
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
            $this->resize_image_style($pic);

            }
        }
        $data=array("name"=>$this->input->post("name"),
                    "price"=>$this->input->post("price"),
             "image"=>$cfile,
           "type"=>$this->input->post("type"),
           "kurti_or_blouse"=>$this->input->post("kurti_or_blouse"));

       $data2=array("name"=>$this->input->post("name"),
                    "price"=>$this->input->post("price"),

           "type"=>$this->input->post("type"),
           "kurti_or_blouse"=>$this->input->post("kurti_or_blouse"));
       $chk=$this->db->get_where("front_back_sleeve",$data2);
       if($chk->num_rows()>0)
       {}else{
             if($this->db->insert('front_back_sleeve',$data))
             {
              $msg="New Design Added Successfully.";
             }
             else
             {
               $msg="Design Couldnot be Added.";
             }}}
             $redirect = $this->input->post('redirect');redirect("product/$redirect");}

public function Category(){
	  $data['cats']=$this->db->get("mcategory")->result();
	  $data['subcats']=$this->db->get("category")->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/category',$data,true);
      $this->adminlayout();
  }


public function Make_addon_page(){
	  $data['cats']=$this->db->get("category")->result();

	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/make_addon_page',$data,true);
      $this->adminlayout();
  }
  public function Make_addon_heading(){
	  $data['cats']=$this->db->get("category")->result();

	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/make_addon_heading',$data,true);
      $this->adminlayout();
  }
    public function Make_addon_heading_del(){
	 // $data['cats']=$this->db->get("category")->result();

	  if($this->db->delete('make_addon', array('id' => $_POST['sid']))){
	  		$this->db->delete('addons', array('add_on_parent' => $_POST['sid']));
	  }

  }
  public function Make_addon_del(){

	  if($this->db->delete('addons', array('id' => $_POST['sid']))){

	  }

  }
    public function subcat_del(){

    if($this->db->delete('tailor_subcategory', array('id' => $_POST['sid']))){

    }

  }

  public function manage_newsletter(){
    $data['cats']=array();

    $this->template['middle'] = $this->load->view ($this->middle = 'admin/manage_newsletter',$data,true);
      $this->adminlayout();
  }
    public function design_del(){
	 // $data['cats']=$this->db->get("category")->result();
    	//echo $_POST['sid'];
    	//echo "kkk";
	  if($this->db->delete('front_back_sleeve', array('id' => $_POST['sid']))){

	  }

  }
  public function update_addon(){
  	$id = $this->uri->segment(3);
  	$data['cats']=$this->db->get("make_addon")->result();
	$data['addon']=$this->db->get_where("addons",array("id"=>$id))->row();
	//print_r($data);die;
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/update_addon',$data,true);
    $this->adminlayout();
  }
  public function update_addon_id(){
  	$id = $this->uri->segment(3);
  		 if(!empty($_FILES["cfile"]["name"])){
				$config['upload_path'] = './adminassets/styles/';
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
         $this->resize_image_style($pic);
				}

				$data=array(
		  "add_on_parent"=>$this->input->post("parent_id"),
   		"add_on_name"=>$this->input->post("name"),
   		"add_on_price"=>$this->input->post("price"),
   		"add_on_image"=>$cfile
   		);
       // print_r($data);
        //echo $id;die;
				$this->db->where('id', $id);

				if($this->db->update("addons",$data))
				{
				echo "<script>
    window.location = 'product/Make_addons';
</script>";
				}
		}else{


        $data=array(
      "add_on_parent"=>$this->input->post("parent_id"),
      "add_on_name"=>$this->input->post("name"),
      "add_on_price"=>$this->input->post("price")
      );
        //print_r($data);
        //echo $id;die;
        $this->db->where('id', $id);
        if($this->db->update("addons",$data))
        {$url = base_url()."product/Make_addons";
        echo "<script>
    window.location = '$url';
</script>";
        }
    }



   	//print_r($data);die;
		  /*if($this->db->insert("addons",$data)){
		  echo "<script>
    window.location = 'Make_addons';
</script>";
		  }*/
  }


public function add_accessories_city($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					$this->db->where("acc_id",$this->uri->segment(3));
					 if($this->db->update('accessories',$data))
					 {
						$msg="Accessories Updated Successfully.";
					 }
					 else
					 {
						 $msg="Accessories Couldnot be Updated.";
					 }
					 redirect ("Product/add_accessories/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					 if($this->db->insert('accessories',$data))
					 {
						$msg="New accessories Added Successfully.";
					 }
					 else
					 {
						 $msg="accessories Couldnot be Added.";
					 }
					 redirect ("Product/add_accessories");

		  }

	  }


		  $this->middle = 'admin/add_accessories'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }


  public function add_online_city($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("country")){
     $data=array("country"=>$this->input->post("country"),
          "state"=>$this->input->post("state"),
          "city"=>implode(",",$this->input->post("city")));
          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('online_boutique',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_online/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("country")){
     $data=array("country"=>$this->input->post("country"),
          "state"=>$this->input->post("state"),
          "city"=>implode(",",$this->input->post("city")));
           if($this->db->insert('online_boutique',$data))
           {
            $msg=" Added Successfully.";
           }
           else
           {
             $msg=" Couldnot be Added.";
           }
           redirect ("Product/add_online");

      }

    }


      $this->middle = 'admin/online_boutique'; // passing middle to function. change this for different views.
      $this->adminlayout();

  }




public function add_uniform_city($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					$this->db->where("uniform_id",$this->uri->segment(3));
					 if($this->db->update('uniform',$data))
					 {
						$msg="uniform Updated Successfully.";
					 }
					 else
					 {
						 $msg="uniform Couldnot be Updated.";
					 }
					 redirect ("Product/add_uniform/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					 if($this->db->insert('uniform',$data))
					 {
						$msg="New uniform Added Successfully.";
					 }
					 else
					 {
						 $msg="uniform Couldnot be Added.";
					 }
					 redirect ("Product/add_uniform");

		  }

	  }


		  $this->middle = 'admin/add_uniform_view'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

public function add_fabric_city($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('fabric',$data))
					 {
						$msg="fabric Updated Successfully.";
					 }
					 else
					 {
						 $msg="fabric Couldnot be Updated.";
					 }
					 redirect ("Product/add_fabric/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					 if($this->db->insert('fabric',$data))
					 {
						$msg="New fabric Added Successfully.";
					 }
					 else
					 {
						 $msg="fabric Couldnot be Added.";
					 }
					 redirect ("Product/add_fabric");

		  }

	  }


		  $this->middle = 'admin/add_fabric'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

  public function Make_addons(){
    $this->db->order_by("id", "asc");
	  $data['cats']=$this->db->get("make_addon")->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/make_addons',$data,true);
    $this->adminlayout();
  }

  public function add_addon_to_attribut(){
	//print_r($_POST);
	$attr = $this->db->get_where("attributes",array("cat"=>$_POST['category_id'],"attr_name"=>"Add Ons"))->row();
	if(empty($attr))
	{
			$data=array(
   		"attr_name"=>"Add Ons",
   		"cat"=>$this->input->post("category_id"),

   		);
   	//print_r($data);die;
		  if($this->db->insert("attributes",$data));
	}
	else{
		echo "<script>alert('You already have addon in this category')</script>";
	}
	echo "<script>
    window.location = 'Make_addon_heading';
</script>";

  }
  public function add_addon_to_heading(){
	//print_r($_POST);
	$attr = $this->db->get_where("attributes",array("cat"=>$_POST['category_id'],"attr_name"=>"Add Ons"))->row();
	$aid = $attr->aid;
	$data=array(
		"addon_page_id"=>$aid,
   		"add_on_name"=>$this->input->post("heading"),


   		);

   	//print_r($data);die;
		  if($this->db->insert("make_addon",$data)){
		  	echo "<script>
    window.location = 'Make_addons';
</script>";
		  }

  }

  public function update_addon_to_heading($id){
  //print_r($_POST);
  $attr = $this->db->get_where("attributes",array("cat"=>$_POST['category_id'],"attr_name"=>"Add Ons"))->row();
  $aid = $attr->aid;
  $data=array(
    "addon_page_id"=>$aid,
      "add_on_name"=>$this->input->post("heading"),


      );
        $this->db->where("id",$id);
      $this->db->update("make_addon",$data);
      redirect("product/Make_addon_heading");

  }

  public function add_addons(){
	//print_r($_POST);
$cfile="";
	 if(!empty($_FILES["cfile"]["name"])){
				$config['upload_path'] = './adminassets/styles/';
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
        $this->resize_image_style($pic);
				}
		}

	$data=array(
		"add_on_parent"=>$this->input->post("parent_id"),
   		"add_on_name"=>$this->input->post("name"),
   		"add_on_price"=>$this->input->post("price"),
   		"add_on_image"=>$cfile


   		);

   	//print_r($data);die;
		  if($this->db->insert("addons",$data)){
		  echo "<script>
    window.location = 'Make_addons';
</script>";
		  }
  }


   public function Add_category($edit=false){
	  if($edit==true)
	  {
		  $cfile=$this->input->post("old");
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
				 $this->db->where("mid",$this->uri->segment(3));
				 if($this->db->update('mcategory',$data))
				 {
					$msg="New Main Category Added Successfully.";
				 }
				 else
				 {
					 $msg="Main Category Couldnot be Added.";
				 }
	  }
	  else
	  {
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
	}

	}
	   redirect("product/category");

  }



  public function profile(){
	  $data['admin']=$this->db->get_where("admin",array("id"=>1))->row();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/profile',$data,true);
     $this->adminlayout();
  }

   public function change_pass(){
  $chk=$this->db->get("admin",array("password"=>md5($_POST['op'])));
    if($chk->num_rows()>0)
    {

      $data=array("password"=>md5($_POST['np']));
      if($this->db->update("admin",$data)==true)
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

 public function image_update()
  {
    if(!empty($_FILES["photo"]["name"])){
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('photo'))
        {
        echo $this->upload->display_errors();
        }
        else
        {
        $pic = $this->upload->data();
        $cfile=$pic['file_name'];
        }
    }
    else
    {
      $cfile='testi-img-3.png';
    }
    $data=array('image'=>$cfile);
    $this->db->update('admin',$data);
    redirect ("Product/profile/");

  }

 public function logo_update()
  {
    if(!empty($_FILES["photo"]["name"])){
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('photo'))
        {
        echo $this->upload->display_errors();
        }
        else
        {
        $pic = $this->upload->data();
        $cfile=$pic['file_name'];
        }
    }
    else
    {
      $cfile='logo2.png';
    }
    $data=array('img'=>$cfile);
    $this->db->update('homepage_meta',$data);
    redirect ("Product/homepage/");

  }



  public function profile_update()
  {
     $data=array("username"=>$this->input->post("username"),
          "email"=>$this->input->post("email"),
          "phone1"=>$this->input->post("phone1"),
          "phone2"=>$this->input->post("phone2"),
          "address"=>$this->input->post("address"),
          "city"=>$this->input->post("city"),
          "fburl"=>$this->input->post("fburl"));
           if($this->db->update('admin',$data))
           {
              $msg="Updated.";
           }
           else
           {
             $msg="Category Couldnot be Updated.";
           }
           redirect ("Product/profile/");

      }








  public function all_moreservices(){
	$all=$this->db->get_where("more_services_appoinment");
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_more_view',$data,true);
    $this->adminlayout();
  }

  public function bridal_appoiment_info(){
  $where = "date_time!=''";
  $this->db->order_by("id","desc");
  $this->db->where($where);
  $all=$this->db->get("user_appoinment");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_bridal_view',$data,true);
    $this->adminlayout();
  }
  public function notifyme(){

  //$this->db->where(array('admin_'=>'noread','oid'=>$order->oid));
  $this->db->update('notifyme',array('admin_status'=>1));

  $this->db->order_by("id","desc");

  $all=$this->db->get("notifyme");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/notifyme',$data,true);
    $this->adminlayout();
  }
  public function donate_notification(){
$this->db->update('dontate_users',array('admin_status'=>'yes'));
  $this->db->order_by("id","desc");

  $all=$this->db->get("dontate_users");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/donate_noti',$data,true);
    $this->adminlayout();
  }
  public function users_info(){
 // $where = "app_time!=''";
  //$this->db->where($where);
    $this->db->order_by('uid','desc');
  $all=$this->db->get("users");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();

  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_users_view',$data,true);
    $this->adminlayout();
  }

  public function moreservices_addby_vendor(){
      if($_POST){
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];

      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }


    if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid3 = $vid2[1];
    $this->db->where("vendor_id", $vid3);
  }

  $all=$this->db->get_where("more_services",array("status"=>'disapprove'));

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  //echo $this->db->last_query();
}else{

	$all=$this->db->get_where("more_services",array("status"=>'disapprove'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result(); }
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/disapprove_moreservices',$data,true);
    $this->adminlayout();
  }

  public function moreservices_status_change(){
  	$this->db->where("id",$this->uri->segment(3));
  	$data = array("status"=>'approve');
	$this->db->update('more_services',$data);
    $this->db->delete('disapprove',array('p_id'=>$this->uri->segment(3),'type'=>'more_services'));
	redirect('product/moreservices_addby_vendor');
  }

  public function more_services_status_change(){
  	$data = array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/approve_moreservices_status',$data,true);
    $this->adminlayout();
  }

   public function stitching_accounts(){
  $this->db->group_by("oid");
  $this->db->where("measures!=","");
  $this->db->where("shipping_status","Delivered");
  $order_items=$this->db->get("order_items");
  $data['totalpro']=$order_items->num_rows();

  $data['orders']=$order_items->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_accounts',$data,true);
    $this->adminlayout();
  }


  public function fabric_end()
  {
    $this->db->select('*');
    $this->db->from('order_items a');
    $this->db->join('orders b', 'b.oid=a.oid');

    $this->db->order_by("a.id","desc");
    $query = $this->db->get();
    $data['orders']=$query->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_shipping',$data,true);
    $this->adminlayout();
  }

  public function stitching_end()
  {
    $this->db->select('*');
    $this->db->from('order_items a');
    $this->db->join('orders b', 'b.oid=a.oid');
    $this->db->where('a.measures !=','');
    $query = $this->db->get();
    $data['orders']=$query->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_stitching',$data,true);
    $this->adminlayout();
  }


///
public function send_notify_mail(){
  $data = $this->db->get_where('notifyme',array('id'=>$this->uri->segment(3)))->row();
  $message = '<!DOCTYPE html>
                <html>
                <head>
                    <title></title>
                </head>
                <body>
                <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                    <div id="inouter" style="border-bottom:2px dashed #444;">
                    <br>
                    <img src="http://mobiledarzi.com/assets/images/logo2.jpg">
                    <br>
                    <h2>Welcome to MobileDarzi!</h2>
                    <br>

                    <p>Dear  Customer,</p>
                    <p>You made request for notification for a product when it is in stock... we are mobiledarzi </p>


                    <br>

                    <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a >support@mobiledarzi.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                    <p>We hope you enjoy our products and services.</p>

                    <p>Best Regards,</p>
                    <br>
                    <p>Team MobileDarzi</p>
                    <br>
                    <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="'.base_url("assets/sociallinks/cod.png").'" style="float: right;"></p>
                    <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                    <p align="center"><img width="4%" src="'.base_url("assets/sociallinks/facebook_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/twitter_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/google_square-24.png").'"> <img src="'.base_url("assets/sociallinks/tumblr.png").'" width="4%"> <img width="4%" src="'.base_url("assets/sociallinks/instagram_square_color-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/youtube_square_color-24.png").'"></p>

                    </div>
                    <p class="small" style="text-align: center;">Copyright  &copy 2017 MobileDarzi.com Powered by Absolute Innovations</p>
                </div>
                </body>
                </html>';

  $to_email = $data->email;
$this->load->library('email');
$this->email->initialize(array(
  'protocol' => 'smtp',
   'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));
$this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
$this->email->to($to_email);
//$this->email->cc('another@another-example.com');
$this->email->subject('Mobile Darzi Notification');
$this->email->message($message);
  $this->email->send();
redirect(base_url().'product/notifyme');
}
  public function update_shipping_status_return(){
    print_r($_POST);
    $id=$_POST['pid'];
    //exit;
    //$order_total=$this->db->get_where('orders',array('oid'=>$_POST['pid']))->row();

     $cancel_data2=$this->db->get_where('order_items',array('id'=>$_POST['item']))->row();
     $site_address=$this->db->get('footer')->row();
     $user_info = $this->db->get_where('users',array('uid'=>$_POST['uid']))->row();
     //print_r($pinfo);
    if(isset($_POST['vid']) && $_POST['vid'])
    {
      $vinfo=$this->db->get_where('vendor',array('vid'=>$_POST['vid']))->row();
    }
    $message='<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #outer{
      width: 80%;
      margin:auto;
      padding:1%;
    }
    #inouter{
      border-top:5px solid #009ad2;
      border-radius: 2px;
      border-bottom:2px solid #009bc8;
    }
    .footer{

      border-top:1px solid #ccc;
      padding: 1%;
      font-size: 13px;
    }
    .footer img{
      margin:1%;
      width: 20%;

          }
    .small{
      font-size: 12px;
    }
    .center{
      text-align: center;
    }
    .logo{
      float:right;
    }
    .footeremail{
      font-size: 18px
    }
    .blur{
      color:#777;
    }
    .lightblur{
      color:#444;
    }
    .expecteddate{
      color:green;
      font-size: 14px;
    }
    table{
      border-top:2px solid #000;
      width: 100%;
    }
    td{
      padding:1.5%;
      border-bottom:1px solid #ccc;
    }
    img{margin:2%;}

  </style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
  <div id="inouter">
  <br>


  <p>Dear ';
  if($_POST['shipping_status']=='Delivered to vendor')
    {
      $user = $vinfo->vendor_name;
    }else{
      $user = $user_info->name;}
$message.=$user;
      $message.=',</p>



  <p>'.$this->input->post("shipping_status").'</p>


  <br>
  Following are the item(s) in this package:
  <table>
    <tr>
      <td ></td>
      <td></td>
      <td>Size</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>
    <tr>
      <td ><img src="'.base_url().'assets/images/'.$cancel_data2->pimg.'" width="50px"></td>
      <td width="200px">'.$cancel_data2->pname.'</td>
      <td>'.$cancel_data2->size.'</td>
      <td>'.$cancel_data2->qty.'</td>
      <td>Rs. '.$cancel_data2->price.'</td>
      <td>View item</td>
    </tr>
  </table>
  <span class="expecteddate">Expect Date '.$_POST['date'].'</span>

  <br>
  <p>Regards,<br>Team MobileDarzi</p>
  <br>
  <div class="footer"><center><img src="'.base_url().'/assets/sociallinks/playstore.png"><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
   <center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
  </div>

</div>
</body>
</html>';
//$msg2="\n";

    $uid=$_POST['uid'];

    if($_POST['uid'])
    {
      $uinfo=$this->db->get_where('users',array('uid'=>$_POST['uid']))->row();
    }


     if($_POST['shipping_status']=='Delivered to vendor')
    {

      if(!empty($vinfo->contact))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $vinfo->contact;
        $senderId = "MDARZI";
        $message1 = "Your returned product will come to you on".$_POST['date'];
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         echo $to_email = $vinfo->email;

        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();


              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$_POST['item']);
     if($this->db->update('order_items',$data2))
     {
      redirect('product/return_order_items/');
     }


   }else
     if($_POST['shipping_status']=='Pickup From User')
    {

      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
       // $message1 = "We will come to you to pickup product that your requested to return on ".$_POST['date'];

        $message1 = "Dear ".$uinfo->name.", Your return request has approved. We will come to you to pick up the returnable product on ".$_POST['date'].".Please ensure your availability.";

        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         echo $to_email = $uinfo->email;

        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi Pickup From User');
        $this->email->message($message);
        $this->email->send();


              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$_POST['item']);
     if($this->db->update('order_items',$data2))
     {
      redirect('product/return_order_items/');
     }


   }

 }
///
  public function order_text(){
    print_r($_POST);
    $order_text=$_POST['order_text'];
    //exit;
    $this->db->where('oid',$_POST['pid']);
    $this->db->update('orders',array('order_text'=>$_POST['order_text']));
    redirect('product/order_shipping_status/'.$_POST['pid']);
  }
  public function update_shipping_status(){
  	print_r($_POST);
    $id=$_POST['pid'];
    $order_total=$this->db->get_where('orders',array('oid'=>$_POST['pid']))->row();
     $pinfo=$this->db->get_where('order_items',array('oid'=>$_POST['pid']))->result();
     $site_address=$this->db->get('footer')->row();

$uid=$_POST['uid'];
if(isset($_POST['vid']) && $_POST['vid'])
{
  $vinfo=$this->db->get_where('vendor',array('vid'=>$_POST['vid']))->row();
}
if($_POST['uid'])
{
  $uinfo=$this->db->get_where('users',array('uid'=>$_POST['uid']))->row();
}
$message='<!DOCTYPE html>
<html>
<head>
<title></title>
<style type="text/css">
#outer{
  width: 80%;
  margin:auto;
  padding:1%;
}
#inouter{
  border-top:5px solid #009ad2;
  border-radius: 2px;
  border-bottom:2px solid #009bc8;
}
.footer{

  border-top:1px solid #ccc;
  padding: 1%;
  font-size: 13px;
}
.footer img{
  margin:1%;
  width: 20%;

      }
.small{
  font-size: 12px;
}
.center{
  text-align: center;
}
.logo{
  float:right;
}
.footeremail{
  font-size: 18px
}
.blur{
  color:#777;
}
.lightblur{
  color:#444;
}
.expecteddate{
  color:#444;
  font-size: 14px;
}
table{
  border-top:2px solid #000;
  width: 100%;
}
.a{
  padding:1.5%;
  border-bottom:1px solid #ccc;
}
img{margin:2%;}

</style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
<div id="inouter">
<br>


<p>Dear ';

  $user = $uinfo->name;
$message.=$user;
if($_POST['shipping_status']=='Ready To Dispatch')
    {
  $message.=',</p>



<p>Your order OMD '.$pinfo[0]->oid.' from MobileDarzi has been dispatched. You will receive your shipment on '.date("d-M-Y",strtotime($_POST['date'])).' by the end of the day.
</p>
<p><b>Note:</b> Please note that a signature is required for the delivery of the package. If no one will be available to sign for the package , you may wish to make alternate delivery arrangement with the shipping department.</p>'; }
elseif($_POST['shipping_status']=='Delivered')
    {
        $message.=',</p>



<p>We are pleased to inform you the following order OMD '.$pinfo[0]->oid.' has been delivered</p>';
    }
$message .='<br>
Following are the item(s) in this package:
<table>
<tr>
  
  <td class="a"></td>
  <td class="a">Size</td>
  <td class="a">Quantity</td>
  <td class="a">Price</td>
  <td class="a"></td>
</tr>';
$total_p=0;
  foreach ($pinfo as $value) {
$total_p += $value->subtotal;
          $message.= '<tr>';

  $message.=' 
  <td class="a" width="200px">'.$value->pname.'</td>
  <td class="a">'.$value->size.'</td>
  <td class="a">'.$value->qty.'</td>
  <td class="a">Rs. '.$value->subtotal.'</td>
   <td class="a">';
            if($value->productlink!='' && $value->productlink!='null'){
            $message .='<a href="'.$value->productlink.'" target="_balnk">View item</a>';
}
           $message .= '</td>
</tr>'; }
$ship = $this->db->get_where('shipping_methods',array('id'=>$order_total->shipping_method))->row();

$message.= '<tr>
      <td colspan="2"><span class="expecteddate">Expect Delivery by '.date("D d M",strtotime($order_total->delivery_date)).'</span></td>
      <td><b>Item Subtotal: </b></td>
      <td>Rs. '.$total_p.'</td>
    </tr>
    <tr>
      <td colspan="2"></td>
      <td><b>Shipping and Handling : </b></td>
      <td>Rs. '.$ship->price." (".$ship->reason.")".'</td>
    </tr>
    <tr>
      <td colspan="2"></td>
      <td><b>Order Total: </b></td>
      <td>Rs. '.$order_total->ototal.'</td>
    </tr>';

$message .= '</table>

<p>This email can\'t receive replies. If you have any questions or need help with something regarding our services or our products, Please contact our customer support at support@mobiledarzi.com or call us at +91 9644409191 or 0731-2557166 (Working hours 10:30am to 7pm, Monday-Saturday)
</p>
          <p>We hope you\'ll enjoy our products and services.
</p>
          <br>
<p>Regards,<br>Team MobileDarzi</p>
<br>
<div class="footer"><center><a href="https://play.google.com/store/apps/details?id=com.hsup.hello&hl=en"><img src="'.base_url().'/assets/sociallinks/playstore.png"></a><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
<center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
<center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
</div>
<p class="center small"><u>Unsubscribe</u><br></p>
<p class="center small">Follow us on: <br>
<center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
</div>

</div>
</body>
</html>';

$msg2="\n";
foreach ($pinfo as $value) {
          $msg2 .= $value->pname." --> ".$value->subtotal."\n";
         }


    if($_POST['shipping_status']=='Pickup From Vendor')
    {
        $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';

        $message1 = "Your order is ready to dispatch \norder id ".$_POST['pid'].$msg2."\ntotal is".$order_total->ototal;
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

    $data = array('shipping_status'=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where('id',$id);
     if($this->db->update('order_items',$data))
     {
      redirect('product/order_shipping_status/'.$id);
     }

   }
   elseif($_POST['shipping_status']=='Ready To Dispatch')
    {
      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $order_total->bphone;
         if($order_total->bphone!=$uinfo->mobile){
        $mobileNumber = $uinfo->mobile.",".$order_total->bphone;
      }
        $senderId = "MDARZI";

        //$message1 = "Your order is ready to dispatch \norder id ".$_POST['pid'].$msg2."\ntotal is".$order_total->ototal;
        if($order_total->pay_method=='COD'){
        $message1 = "Your order from MobileDarzi is dispatched. It will be delivered ".date("d-M-Y",strtotime($_POST['date']))." by the end of the day. Amount payable is Rs ".$order_total->ototal.". Please ensure your availability. ";
      }else if($order_total->pay_method=='PAYU')
      {
         $message1 = "Dear ".$uinfo->name.", Your order from MobileDarzi is dispatched.It will be delivered ".date("d-M-Y",strtotime($_POST['date']))." by end of the day. Please ensure your availability.";
      }
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
                     $this->email->initialize(array(
          'protocol' => 'smtp',
          //'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');

      /*  $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'admin@111',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');*/
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();


    $data = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {echo $this->db->last_query();
     	foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
    $this->db->update('order_items',$data2);

     $data2 = array(
    "oid" => $id,
    "order_item_id"=>$value->id,
    "shipping_status"=>$_POST['shipping_status'],
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);

         }
      redirect('product/order_shipping_status/'.$id);
     }

   }
   elseif($_POST['shipping_status']=='Delivered')
    {

      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $order_total->bphone;
         if($order_total->bphone!=$uinfo->mobile){
        $mobileNumber = $uinfo->mobile.",".$order_total->bphone;
      }
        $senderId = "MDARZI";
        $message1 = "We are pleased to inform you the order OMD".$order_total->oid." has been delivered. For more detail please check your mail.";
        //$message1 = "Thankyou for shoping with us. Your order is delivered on".$_POST['date']." \norder id ".$_POST['pid'].$msg2."\ntotal is".$order_total->ototal;
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
        /*$this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'admin@111',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');*/
                     $this->email->initialize(array(
          'protocol' => 'smtp',
          //'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
      "ostatus"=>'Completed',
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
     $this->db->update('order_items',$data2);

      $data2 = array(
    "oid" => $id,
    "order_item_id"=>$value->id,
    "shipping_status"=>$_POST['shipping_status'],
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);


         }
      redirect('product/order_shipping_status/'.$id);
     }

   }
      elseif($_POST['shipping_status']=='Delivered to vendor')
    {

      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
        $message1 = "Your returned product will come to you on".$_POST['date']." \norder id ".$_POST['pid'].$msg2;
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
     $this->db->update('order_items',$data2);

      $data2 = array(
    "oid" => $id,
    "order_item_id"=>$value->id,
    "shipping_status"=>$_POST['shipping_status'],
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);
         }
      redirect('product/order_shipping_status/'.$id);
     }

   }

   elseif($_POST['shipping_status']=='Dispatch To Tailor')
    {
      $this->db->select("*");
      $this->db->from('tailors');
      $this->db->join('tailor_assign', 'tailor_assign.tid = tailors.id');
      $this->db->where('stid',$id);
      $this->db->where('sstatus','accepted');
      $query = $this->db->get()->row();
      if(!empty($query->tphone))
      {
        echo $query->tphone.'ll';die;
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $query->tphone;
        $senderId = "MDARZI";
         $message1 = "Oeder no ".$_POST['pid']."is dispatch from admin on".$_POST['date']." \n ".$msg2."\ntotal is".$order_total->ototal;
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }


    $data = array("shipping_status"=>$_POST['shipping_status'],
    	"status_datetime"=>$_POST['date'],
      'notify_status'=>'no');
    $this->db->where("id",$id);
     if($this->db->update('order_items',$data))
     {
     	foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
     $this->db->update('order_items',$data2);
         }
      redirect('product/order_shipping_status/'.$id);
     }

   }
      elseif($_POST['shipping_status']=='Pickup From Vendor')
    { //echo "in user"; exit;
      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
        $message1 = "Dear ".$uinfo->name.", You have stitching pickup appointment with MobileDarzi on ".$_POST['date'].". Please ensure your availability.";
         /*$message1 = "We will pickup cloth from vendor on".$_POST['date']." \norder id ".$_POST['pid'].$msg2."\ntotal is".$order_total->ototal;*/
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('order_items',$data))
     {
      foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
     $this->db->update('order_items',$data2);

      $data2 = array(
    "oid" => $id,
    "order_item_id"=>$value->id,
    "shipping_status"=>$_POST['shipping_status'],
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);
         }
      redirect('product/order_shipping_status/'.$id);
     }

   }
     elseif($_POST['shipping_status']=='Pickup From User')
    { //echo "in user"; exit;
      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
        $message1 = "Dear ".$uinfo->name.", You have stitching pickup appointment with MobileDarzi on ".$_POST['date'].". Please ensure your availability.";
         /*$message1 = "We will pickup cloth from user on".$_POST['date']." \norder id ".$_POST['pid'].$msg2."\ntotal is".$order_total->ototal;*/
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {
     	foreach ($pinfo as $value) {

              $data2 = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    "status_changed_by"=>'admin',
    'notify_status'=>'no');
    $this->db->where("id",$value->id);
     $this->db->update('order_items',$data2);

      $data2 = array(
    "oid" => $id,
    "order_item_id"=>$value->id,
    "shipping_status"=>$_POST['shipping_status'],
     "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);
         }
      redirect('product/order_shipping_status/'.$id);
     }

   }

   elseif($_POST['shipping_status']=='Picked From Tailor')
    {
      $this->db->select("*");
      $this->db->from('tailors');
      $this->db->join('tailor_assign', 'tailor_assign.tid = tailors.id');
      $this->db->where('stid',$id);
      $this->db->where('sstatus','accepted');
      $query = $this->db->get()->row();
      if(!empty($query->tphone))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $query->tphone;
        $senderId = "MDARZI";
        $message1 = "Picked From Tailor.";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }

    $data = array("shipping_status"=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {
      redirect('product/order_shipping_status/'.$id);
     }

   }

}

public function update_shipping_status_order_item(){
  	print_r($_POST);
    $id=$_POST['pid'];
    //exit;
    $order_total=$this->db->get_where('orders',array('oid'=>$_POST['pid']))->row();
     $pinfo=$this->db->get_where('order_items',array('oid'=>$_POST['pid']))->result();
     $site_address=$this->db->get('footer')->row();
     //print_r($pinfo);
    $message="<table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
        <td bgcolor='#ffffff' align='center'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
                <tr>
                    <td align='center' valign='top' style='padding: 15px 0;' class='logo'>
                            <img alt='Logo' src='http://mobiledarzi.com/assets/images/logo2.jpg'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 15px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'>Your order is on its way!</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'>Happy Shopping!</td>
                            </tr>
                            <tr>
                                <td align='left' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 15px;' class='padding'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td style='padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;'>
                        <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                            <tr>
                                <td valign='top' class='mobile-wrapper'>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                        <tr>
                                            <td style='padding: 0 0 10px 0;'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>Purchased Item Name </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                        <tr>
                                            <td style='padding: 0 0 10px 0;'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='right' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>Price</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td>".$_POST['shipping_status']."</td></tr>";

                foreach ($pinfo as $value) {
                $message .= "
                <tr>
                    <td>
                        <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                            <tr>
                                <td valign='top' style='padding: 0;' class='mobile-wrapper'>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                        <tr>
                                            <td style='padding: 0 0 10px 0;'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>".$value->pname."</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                        <tr>
                                            <td style='padding: 0 0 10px 0;'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='right' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>".$value->subtotal."</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>";}
                $message.="
                <tr>
                    <td style='padding: 10px 0 0px 0; border-top: 1px solid #eaeaea; border-bottom: 1px dashed #aaaaaa;'>
                        <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                            <tr>
                                <td valign='top' class='mobile-wrapper'>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                        <tr>
                                            <td style='padding: 0 0 10px 0;'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;'>Total</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                        <tr>
                                            <td>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                    <tr>
                                                        <td align='right' style='font-family: Arial, sans-serif; color: #7ca230; font-size: 16px; font-weight: bold;'>".$order_total->ototal."</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 15px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
                        ".$site_address->office_add."
                        <br>
                        <span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <a href='http://mobiledarzi.com' target='_blank' style='color: #666666; text-decoration: none;'>Mobile Darzi</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>";
    $uid=$_POST['uid'];
    if(isset($_POST['vid']) && $_POST['vid'])
    {
      $vinfo=$this->db->get_where('vendor',array('vid'=>$_POST['vid']))->row();
    }
    if($_POST['uid'])
    {
      $uinfo=$this->db->get_where('users',array('uid'=>$_POST['uid']))->row();
    }

    if($_POST['shipping_status']=='Picked From Vendor')
    {
        $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';
        $message = 'Product picked Successfully.';
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

    $data = array('shipping_status'=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where('id',$id);
     $data2 = array(
    "oid" => $_POST['pid'],
    "order_item_id"=>$id,
    "shipping_status"=>$_POST['shipping_status'],
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);

     if($this->db->update('order_items',$data))
     {

      redirect('product/order_shipping_status/'.$id);
     }

   }
   elseif($_POST['shipping_status']=='Ready To Dispatch')
    {
      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
        $message1 = "Your Product is on the way.";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
      /*  $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'admin@111',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');*/

                     $this->email->initialize(array(
          'protocol' => 'smtp',
          //'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');

        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();


    $data = array("shipping_status"=>$_POST['shipping_status'],
    "status_datetime"=>$_POST['date'],
    'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {echo $this->db->last_query();
      redirect('product/order_shipping_status/'.$id);
     }

   }
   elseif($_POST['shipping_status']=='Delivered')
    {

      if(!empty($uinfo->mobile))
      {
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $uinfo->mobile;
        $senderId = "MDARZI";
        $message1 = "Thank You For Shopping.";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
         $to_email = $uinfo->email;
        $this->load->library('email');
       /* $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'admin@111',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');*/
                     $this->email->initialize(array(
          'protocol' => 'smtp',
          //'smtp_host' => 'mail.mobiledarzi.com',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
      'notify_status'=>'no');
    $this->db->where("oid",$id);
     if($this->db->update('orders',$data))
     {
      redirect('product/order_shipping_status/'.$id);
     }

   }

   elseif($_POST['shipping_status']=='Dispatch To Tailor')
    {
    	
      $this->db->select("*");
      $this->db->from('tailors');
      $this->db->join('tailor_assign', 'tailor_assign.tid = tailors.id');
      $this->db->where('stid',$_POST['o_i_id']);
      $this->db->where('sstatus','accepted');
      $query = $this->db->get()->row();
      //echo $this->db->last_query();
     // print_r($query);
      //echo $query->tphone."in tailor dis"; exit;
      if(!empty($query->tphone))
      {
        //working
        //echo $query->tphone;die;
       $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $query->tphone;
        $senderId = "MDARZI";
        $message1 = "Dispatch To Tailor.";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $mobileNumber,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url="http://send.onlinesendsms.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
      }
      echo $this->db->last_query();
//print_r($query); exit;
 $to_email = $query->temail;
        $this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
        $this->email->to($to_email);
        //$this->email->cc('another@another-example.com');
        $this->email->subject('Mobile Darzi');
        $this->email->message($message);
        $this->email->send();

    $data = array("shipping_status"=>$_POST['shipping_status'],
    	"status_datetime"=>$_POST['date'],
      'notify_status'=>'no');
    $this->db->where("id",$_POST['o_i_id']);
     $data2 = array(
    "oid" => $_POST['pid'],
    "order_item_id"=>$_POST['o_i_id'],
    "shipping_status"=>$_POST['shipping_status'],
    
    "status_date"=>$_POST['date'],
    "status_changed_by"=>'admin');
     $this->db->insert('order_status',$data2);

     if($this->db->update('order_items',$data))
     {
      redirect('product/order_shipping_status/'.$id);
     }



   }



}


  public function order_shipping_status($oid){
    $this->db->where("oid",$oid);
    $data = array("read_status"=>"yes",
    			"notify_status"=>"yes");
    $this->db->update('orders',$data);

    $this->db->where("oid",$oid);
    $data = array(
    			"notify_status"=>"yes",
          );
    $this->db->update('order_items',$data);

  $this->db->select('*');
  $this->db->from('orders');

  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("oid",$oid);

  $orders=$this->db->get();
  $data['order']=$orders->row();
  $data['items']=$this->db->get_where("order_items",array("oid"=>$oid,"status!="=>"cancel"))->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_detail_shipping',$data,true);
    $this->adminlayout();
  }

   public function order_details($oid){
   	$this->db->where("oid",$oid);
   	$data = array("read_status"=>"yes","admin_status"=>"yes");
    $this->db->update('orders',$data);

	$this->db->select('*');
	$this->db->from('orders');

	$this->db->join('users', 'orders.userid = users.uid');
	$this->db->where("oid",$oid);

	$orders=$this->db->get();
	$data['order']=$orders->row();
	$data['items']=$this->db->get_where("order_items",array("oid"=>$oid,"status!="=>'cancel'))->result();
  if(!empty($data['items'])){
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/order_detail',$data,true);
    $this->adminlayout();
  }else{
    $url = base_url().'product/pending_orders';
    redirect($url);
  }
  }

   public function all_testimonial(){
	$all=$this->db->get("testimonial");
	$data['totaltest']=$all->num_rows();
	$data['testi']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_testimonial',$data,true);
    $this->adminlayout();
  }

  public function tailor_assign(){
	  //parse_str($_POST['formdata'],$form);
	 // print_r($form);
    $i=0;
	 /* $to=$this->db->get_where("tailor_assign",array("stid"=>$_POST['oid']));
	  if($to->num_rows()>0)
	  {
		$top=$to->row();
		//echo $top->soid;
		//print_r($top);exit;
		  $this->db->where("soid",$top->soid);
		  if($this->db->update("tailor_assign",array("scost"=>$form['stcost'],"tid"=>$form['tid'],"stid"=>$_POST['oid'],"adate"=>date("Y-m-d"))))
		  {
			  echo "Order Updated Successfully.";
		  }
	  }
	  else
	  {*/
	  	//$this->db->select('*');
		//$this->db->from('notification');
		//$this->db->join('tailors', 'notification.tid = tailors.temail');
		//foreach ($form['tid'] as $value) {
//print_r($_POST);die;
		$this->db->where("id",$this->input->post("tid"));
		$data=$this->db->get('tailors')->row();

		$this->db->where("tid",$data->temail);
		$reg_key=$this->db->get('notification')->row();
		$key = $reg_key->reg_key;
		$body = $_POST['oid'];
		//echo $body;die;
		 $this->db->delete('tailor_assign',array("tid"=>$this->input->post("tid"),"stid"=>$_POST['oid']));
//if($tailor_assign<=0)
//{
		$base_url = base_url('app/push_notify.php?id=');
		$hit_url = $base_url.$key.'&title=New%20Order&body='.$body;
    echo $base_url.$hit_url;
		$json = file_get_contents($hit_url);
    $date = strtotime(date('Y-m-d'));
$date = strtotime("+3 day", $date);
$date = date('Y-m-d', $date);
		//print_r($json);exit;

		  if($this->db->insert("tailor_assign",array("scost"=>$this->input->post("price"),"tid"=>$this->input->post("tid"),"stid"=>$_POST['oid'],"adate"=>date("Y-m-d"),"delivery_date"=>$date)))
		  {
			  $i++;

		  } /*}else{
		  	echo'already assign';
		  }*/
		  //}
      if($i>0)
      {
        echo $this->db->last_query();
        echo "Order Assigned Successfully";
      }
      echo $this->db->last_query();
	 // }
  }

  public function get_response_stitching_orders(){ if($this->db->get_where('tailor_assign',array("stid"=>$_POST['oid'],"sstatus"=>'accepted'))->num_rows() > 0){ echo '1'; }}

  public function add_coupon($edit=false){
      if($edit==true)
      {
       //print_r($_POST);
    $cfile=$this->input->post("oldt");
    if(!empty($_FILES["cfile"]["name"])){
        $config['upload_path'] = './assets/tailors/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
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

     $data=array("code"=>$this->input->post("code"),
         "title"=>$this->input->post("title"),
         "desc"=>$this->input->post("desc"),
         "from_date"=>$this->input->post("from_date"),
         "to_date"=>$this->input->post("to_date"),
         "distype"=>$this->input->post("type"),
         "disvalue"=>$this->input->post("value"),
         "image"=>$cfile,
         "valid"=>date("Y-m-d"));
         $this->db->where("id",$edit);
         if($this->db->update('coupons',$data))
         {
          $msg="Coupon Updated Successfully.";
         }
         else
         {
           $msg="Coupon Couldnot be Updated.";
         }

      }
     else
      {

    $cfile="coupon.jpg";
    if(!empty($_FILES["cfile"]["name"])){
        $config['upload_path'] = './assets/tailors/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
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

   $data=array("code"=>$this->input->post("code"),
         "title"=>$this->input->post("title"),
         "desc"=>$this->input->post("desc"),
         "from_date"=>$this->input->post("from_date"),
         "to_date"=>$this->input->post("to_date"),
         "distype"=>$this->input->post("type"),
         "disvalue"=>$this->input->post("value"),
         "image"=>$cfile,
         "valid"=>date("Y-m-d"));
         if($this->db->insert('coupons',$data))
         {
          $msg="New Coupon Added Successfully.";
         }
         else
         {
           $msg="Coupon Couldnot be Added.";
         }



      }
    redirect("product/manage_coupons");
  }

  public function addsliderimg(){

  //  print_r($_POST);    print_r($_FILES);
	if(!empty($_FILES["testimonial"]["name"])){
  //  echo "in";
    $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('testimonial'))
        {
           //echo "error".count;
        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];
              $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $image_data['full_path'],
              //  'new_image'       =>  './assets/images/testimonialimage/resize/', //path to
                'maintain_ratio'  =>  TRUE,
                'width'           =>  100,
                'height'          =>  100,
              );
              //$this->image_lib->clear();
              $this->image_lib->initialize($configer);
              $this->image_lib->resize();
            }
      $data=array("banner_image"=>$cover);

					 if($this->db->insert('brand_slider',$data))
					 {
						$msg="New Image Added Successfully.";
					 }
					 else
					 {
						 $msg="Image Couldnot be Added.";
					 }
					 redirect ("Product/brands");

		  }

  }

  public function vendoraddsliderimg(){

  //  print_r($_POST);    print_r($_FILES);
  if(!empty($_FILES["testimonial"]["name"])){
  //  echo "in";
    $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('testimonial'))
        {
           //echo "error".count;
        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];

            }
      $data=array("banner_image"=>$cover);

           if($this->db->insert('vendor_home_slider',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/vendorhome");

      }

  }

  public function vendoraddfact($id){

  //  print_r($_POST);    print_r($_FILES);
  if(!empty($_FILES["testimonial"]["name"])){
  //  echo "in";
    $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('testimonial'))
        {
           //echo "error".count;
        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];

            }

      $data=array("banner_image"=>$cover,"line1"=>$this->input->post('line1'),"line2"=>$this->input->post('line2'));
          $this->db->where('id',$id);
           if($this->db->update('vendor_home_facts',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/vendorhome");

      }

  }

  public function update_banner_howitworks(){

  //  print_r($_POST);    print_r($_FILES);
  if(!empty($_FILES["testimonial"]["name"])){
  //  echo "in";
    $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('testimonial'))
        {
           //echo "error".count;
        }
        else
        {

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];

            }
      $data=array("banner_image"=>$cover);
      $this->db->where('id',1);
           if($this->db->update('banner_howitworks',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/howitworks");

      }

  }
  public function update_banner_aboutus(){

  //  print_r($_POST);    print_r($_FILES);
  if(!empty($_FILES["testimonial"]["name"])){
  //  echo "in";
    $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('testimonial'))
        {
           //echo "error".count;
        }
        else
        {

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];

            }
      $data=array("banner_image"=>$cover);
      $this->db->where('id',1);
           if($this->db->update('banner_aboutus',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/aboutus");

      }

  }

  public function aboutus_pagecontant(){
    $data=array("page_desc"=>$this->input->post('page_desc'),
      "some_other_text"=>$this->input->post('some_other_text'),
      "heading1"=>$this->input->post('heading1'),
      "heading2"=>$this->input->post('heading2'),
      "heading3"=>$this->input->post('heading3'),
      "con1"=>$this->input->post('con1'),
      "con2"=>$this->input->post('con2'),
      "con3"=>$this->input->post('con3'),
      );
      $this->db->where('page_title Like','%About Us%');
           if($this->db->update('tbl_pages',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/aboutus");

  }

    public function bridal_text(){
    $data=array("page_desc"=>$this->input->post('bridal_text'));
      $this->db->where('page_title Like','%bridal%');
           if($this->db->update('tbl_pages',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/bridal_appoiment_info");

  }


  public function vendorhome_pagecontant(){
    $data=array("page_desc"=>$this->input->post('page_desc'));
      $this->db->where('page_title Like','%vendorhome%');
           if($this->db->update('tbl_pages',$data))
           {
            $msg="New Image Added Successfully.";
           }
           else
           {
             $msg="Image Couldnot be Added.";
           }
           redirect ("Product/vendorhome");



  }

  ///
  public function trackordercontant(){
    $data=array("contant"=>$this->input->post("contant"));
$this->db->where("id",1);
 if($this->db->update('trackorder',$data))
   {
    $msg=" Updated Successfully.";
   }
   else
   {
     $msg=" Couldnot be Updated.";
   }
   redirect ("Product/trackorder");
  }
  public function measurementguidecontant(){
    $data=array("contant"=>$this->input->post("contant"));
$this->db->where("id",1);
 if($this->db->update('measurementguide',$data))
   {
    $msg=" Updated Successfully.";
   }
   else
   {
     $msg=" Couldnot be Updated.";
   }
   redirect ("Product/measurementguide");
  }
  public function addteamcontant($edit=false){
   if($edit==true)
    {

     if($this->input->post("heading")){
       echo "k";
      $cover=$this->input->post('image');
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {
        $data=array(

             "contant"=>$this->input->post("content"),
             "heading"=>$this->input->post("heading"),
               "post"=>$this->input->post("post"),
             "inlink"=>$this->input->post("inlink"),
             "facelink"=>$this->input->post("facelink"),
             "twilink"=>$this->input->post("twilink"),
           );

      $this->db->where("id",$this->uri->segment(3));

       if($this->db->update('team',$data))
       {
        $msg=" Updated Successfully.";
       }
       else
       {
         $msg=" Couldnot be Updated.";
       }
       redirect ("Product/aboutus");
      }
      else
      {
        $this->load->library('image_lib');
            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  411,
              'height'          =>  411,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            $data=array(
                 "image"=>$cover,
                 "contant"=>$this->input->post("content"),
                 "heading"=>$this->input->post("heading"),
                   "post"=>$this->input->post("post"),
                 "inlink"=>$this->input->post("inlink"),
                 "facelink"=>$this->input->post("facelink"),
                 "twilink"=>$this->input->post("twilink"),
               );

          $this->db->where("id",$this->uri->segment(3));

           if($this->db->update('team',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/aboutus");

      }

    }
  }
    else
    {
      if($this->input->post("heading")){

      if(!empty($_FILES["image"]["name"])){


        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image'))
        {
           //echo "error".count;
        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];
              $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $image_data['full_path'],
              //  'new_image'       =>  './assets/images/testimonialimage/resize/', //path to
                'maintain_ratio'  =>  TRUE,
                'width'           =>  411,
                'height'          =>  411,
              );
              //$this->image_lib->clear();
              $this->image_lib->initialize($configer);
              $this->image_lib->resize();

      }



     $data=array(
          "image"=>$cover,
          "contant"=>$this->input->post("content"),
          "heading"=>$this->input->post("heading"),
          "post"=>$this->input->post("post"),
          "inlink"=>$this->input->post("inlink"),
          "facelink"=>$this->input->post("facelink"),
          "twilink"=>$this->input->post("twilink"),
        );

           if($this->db->insert('team',$data))
           {
            $msg="brand contant Added Successfully.";
           }
           else
           {
             $msg="brand contant Couldnot be Added.";
           }
           redirect ("Product/aboutus");

      }

    }}
  }
  public function addvendorpostcontant($edit=false){
   if($edit==true)
    {

     if($this->input->post("content")){
       echo "k";
      $cover=$this->input->post('image');
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {
        $data=array(

             "contant"=>$this->input->post("content"),

           );

      $this->db->where("id",$this->uri->segment(3));

       if($this->db->update('vendorposttop',$data))
       {
        $msg=" Updated Successfully.";
       }
       else
       {
         $msg=" Couldnot be Updated.";
       }
       redirect ("Product/vendorhome");
      }
      else
      {
        $this->load->library('image_lib');
            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  411,
              'height'          =>  411,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            $data=array(
                 "image"=>$cover,
                 "contant"=>$this->input->post("content")

               );

          $this->db->where("id",$this->uri->segment(3));

           if($this->db->update('vendorposttop',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/vendorhome");

      }

    }
  }
    else
    {
      if($this->input->post("content")){




     $data=array(

          "contant"=>$this->input->post("content"),
          "heading1"=>$this->input->post("heading1"),
          "heading2"=>$this->input->post("heading2"),
          "menu_heading1"=>$this->input->post("menu_heading1"),
          "menu_heading2"=>$this->input->post("menu_heading2")

        );
        $this->db->where('id',4);
           if($this->db->update('vendorposttop',$data))
           {
            $msg="brand contant Added Successfully.";
           }
           else
           {
             $msg="brand contant Couldnot be Added.";
           }
           redirect ("Product/vendorhome");



    }}
  }

  public function addbrandcontant($edit=false){
   if($edit==true)
    {

     if($this->input->post("heading")){
       echo "k";
      $cover=$this->input->post('image');
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {
        $data=array(

             "contant"=>$this->input->post("content"),
             "heading"=>$this->input->post("heading"),
             "url"=>$this->input->post("url"),
             "facelink"=>$this->input->post("facelink"),
             "twilink"=>$this->input->post("twilink"),
           );

      $this->db->where("id",$this->uri->segment(3));

       if($this->db->update('brand_contant',$data))
       {
        $msg=" Updated Successfully.";
       }
       else
       {
         $msg=" Couldnot be Updated.";
       }
       redirect ("Product/brands");
      }
      else
      {
        $this->load->library('image_lib');
            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  150,
              'height'          =>  200,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            $data=array(
                 "image"=>$cover,
                 "contant"=>$this->input->post("content"),
                 "heading"=>$this->input->post("heading"),
                 "url"=>$this->input->post("url"),
                 "facelink"=>$this->input->post("facelink"),
                 "twilink"=>$this->input->post("twilink"),
               );

          $this->db->where("id",$this->uri->segment(3));

           if($this->db->update('brand_contant',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/brands");

      }

    }
  }
    else
    {
      if($this->input->post("heading")){

      if(!empty($_FILES["image"]["name"])){


        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image'))
        {
           //echo "error".count;
        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];
              $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $image_data['full_path'],
              //  'new_image'       =>  './assets/images/testimonialimage/resize/', //path to
                'maintain_ratio'  =>  TRUE,
                'width'           =>  150,
                'height'          =>  200,
              );
              //$this->image_lib->clear();
              $this->image_lib->initialize($configer);
              $this->image_lib->resize();

      }



     $data=array(
          "image"=>$cover,
          "contant"=>$this->input->post("content"),
          "heading"=>$this->input->post("heading"),
          "url"=>$this->input->post("url"),
          "facelink"=>$this->input->post("facelink"),
          "twilink"=>$this->input->post("twilink"),
        );

           if($this->db->insert('brand_contant',$data))
           {
            $msg="brand contant Added Successfully.";
           }
           else
           {
             $msg="brand contant Couldnot be Added.";
           }
           redirect ("Product/brands");

      }

    }}/*$data['admin']=array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/addtestimonial',$data,true);
     $this->adminlayout();*/
  //$this->db->delete('orders', array('userid' => $_POST['uid']));
  //$this->db->delete('order_items', array('userid' => $_POST['uid']));
  }
  ///
  public function addhowitworkscontant($edit=false){
   if($edit==true)
    {

     if($this->input->post("heading")){

      $cover=$this->input->post('image');
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {
        $data=array(

             "contant"=>strip_tags($this->input->post("content")),
             "heading"=>strip_tags($this->input->post("heading")),
             "number"=>$this->input->post("number"),
             "type"=>$this->input->post("type")
             );

      $this->db->where("id",$this->uri->segment(3));

       if($this->db->update('howitworks',$data))
       {
        $msg=" Updated Successfully.";
       }
       else
       {
         $msg=" Couldnot be Updated.";
       }
       redirect ("Product/".$this->input->post('type'));
      }
      else
      {
        $this->load->library('image_lib');
            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  150,
              'height'          =>  200,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            $data=array(
                 "image"=>$cover,
                 "contant"=>strip_tags($this->input->post("content")),
                 "heading"=>strip_tags($this->input->post("heading")),
                "number"=>$this->input->post("number"),
                 "type"=>$this->input->post("type")
               );

          $this->db->where("id",$this->uri->segment(3));

           if($this->db->update('howitworks',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/".$this->input->post('type'));
  }}}
    else
    {
      if($this->input->post("heading")){

      if(!empty($_FILES["image"]["name"])){


        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image'))
        {

        }
        else
        {
          $this->load->library('image_lib');

              $image_data =   $this->upload->data();
              $cover=$image_data['file_name'];
              //$cover_resize=$image_data['file_name'];
              $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $image_data['full_path'],
                'maintain_ratio'  =>  TRUE,
                'width'           =>  150,
                'height'          =>  150,
              );
              $this->image_lib->initialize($configer);
              $this->image_lib->resize();

      }



     $data=array(
          "image"=>$cover,
          "contant"=>strip_tags($this->input->post("content")),
          "heading"=>strip_tags($this->input->post("heading")),
        "number"=>$this->input->post("number"),
         "type"=>$this->input->post("type")
        );

           if($this->db->insert('howitworks',$data))
           {
            $msg="brand contant Added Successfully.";
           }
           else
           {
             $msg="brand contant Couldnot be Added.";
           }

           redirect ("Product/".$this->input->post('type'));

      }

    }}
  }
///
public function addminfoimage($edit=false){
 
    if($this->input->post("category_id")){
       //$cover=$this->input->post('image');
    $config['upload_path'] = './assets/images/measurementinfo_image/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('image'))
    {
    }
    else{
       $this->load->library('image_lib');
          $image_data =   $this->upload->data();
          $cover=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            //'width'           =>  150,
            'height'          =>  400,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $count = $this->db->get_where('measurementinfo_image',array('cat_id'=>$this->input->post("category_id")))->num_rows();
          if($count<=0)
          {
                $data=array(
                     "cat_id"=>$this->input->post("category_id"),
                     "image"=>$cover
                    );
            if($this->db->insert('measurementinfo_image',$data))
               {
                $msg=" Updated Successfully.";
               }
               else
               {
                 $msg=" Couldnot be Updated.";
               }
             }else{
               $data=array(
                     
                     "image"=>$cover
                    );
              $this->db->where('cat_id',$this->input->post("category_id"));
              $this->db->update('measurementinfo_image',$data);
             }
         redirect ("Product/measurementinfo");
    }
}
}

///
public function addminfocontant($edit=false){
 if($edit==true)
  {
    if($this->input->post("category_id")){

    $cover=$this->input->post('image');
    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('image'))
    {
      $data=array(
           "contant"=>$this->input->post("content"),
           "heading"=>$this->input->post("heading"),
           "number"=>$this->input->post("number"),
           "type"=>$this->input->post("type")
           );

    $this->db->where("id",$this->uri->segment(3));

     if($this->db->update('howitworks',$data))
     {
      $msg=" Updated Successfully.";
     }
     else
     {
       $msg=" Couldnot be Updated.";
     }
     redirect ("Product/howitworks");
    }
    else
    {
      $this->load->library('image_lib');
          $image_data =   $this->upload->data();
          $cover=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            'width'           =>  150,
            'height'          =>  200,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $data=array(
               "image"=>$cover,
               "contant"=>$this->input->post("content"),
               "heading"=>$this->input->post("heading"),
              "number"=>$this->input->post("number"),
               "type"=>$this->input->post("type")
             );

        $this->db->where("id",$this->uri->segment(3));

         if($this->db->update('howitworks',$data))
         {
          $msg=" Updated Successfully.";
         }
         else
         {
           $msg=" Couldnot be Updated.";
         }
         redirect ("Product/howitworks");
}}}
  else
  {
    if($this->input->post("category_id")){
  $data=array(

        "how_to_measure"=>$this->input->post("howto"),
        "name"=>$this->input->post("Measurement"),
      "cid"=>$this->input->post("category_id"),
        "number"=>$this->input->post("number")

      );

         if($this->db->insert('measurment_table',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/measurementinfo");



  }}
}
///
///
public function addfriendcontant($edit=false){
 if($edit==true)
  {

   if($this->input->post("heading")){

    $cover=$this->input->post('image');
    $cover2=$this->input->post('image2');
    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('image') && $this->upload->do_upload('image2'))
    {
      $data=array(

           "contant"=>$this->input->post("content"),
           "heading"=>$this->input->post("heading"),
             );

    $this->db->where("id",$this->uri->segment(3));

     if($this->db->update('vendorhome',$data))
     {
      $msg=" Updated Successfully.";
     }
     else
     {
       $msg=" Couldnot be Updated.";
     }
     redirect ("Product/vendorhome");
    }
    else
    {
      $this->load->library('image_lib');
          $image_data =   $this->upload->data();

          $cover=$image_data['file_name'];
          $cover2=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
        /*  $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            'width'           =>  150,
            'height'          =>  200,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();*/

          $data=array(
               "image"=>$cover,
               "small_image"=>$cover2,
               "contant"=>$this->input->post("content"),
               "heading"=>$this->input->post("heading")

             );

        $this->db->where("id",$this->uri->segment(3));

         if($this->db->update('vendorhome',$data))
         {
          $msg=" Updated Successfully.";
         }
         else
         {
           $msg=" Couldnot be Updated.";
         }
         redirect ("Product/vendorhome");
}}}
  else
  {
  	
  
    if($this->input->post("h1")){
    //if(!empty($_FILES["image"]["name"])){

      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPEG|JPG';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {
        $cover=$this->input->post('image_hidden');
      }
      else
      {
        $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
          /*  $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  440,
              'height'          =>  250,
            );
            $this->image_lib->initialize($configer);
          $this->image_lib->resize();*/}




   $data=array(
        "image"=>$cover,
        "h1"=>$this->input->post("h1"),
        "h2"=>$this->input->post("h2"),
        "h3"=>$this->input->post("h3"),
        "coupon_code_for_friend"=>$this->input->post("coupon_code_for_friend"),
        "coupon_code_for_own"=>$this->input->post("coupon_code_for_own")
      );
$this->db->where('id',1);
         if($this->db->update('tellyourfriend',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/tellyourfriend");

    

  }}
}
public function addvendorcontant($edit=false){
 if($edit==true)
  {

   if($this->input->post("heading")){

    $cover=$this->input->post('image');
    $cover2=$this->input->post('image2');
    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('image') && !$this->upload->do_upload('image2'))
    {
      $data=array(

           "contant"=>$this->input->post("content"),
           "heading"=>$this->input->post("heading"),
             );

    $this->db->where("id",$this->uri->segment(3));

     if($this->db->update('vendorhome',$data))
     {
      $msg=" Updated Successfully.";
     }
     else
     {
       $msg=" Couldnot be Updated.";
     }
     redirect ("Product/vendorhome");
    }
    else if($this->upload->do_upload('image') && $this->upload->do_upload('image2'))
    {

      ///
          if(!empty($_FILES["image"]["name"])){


      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {

      }
      else
      {
            $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  440,
              'height'          =>  250,
            );
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();}
            if (!$this->upload->do_upload('image2'))
            {

            }
            else
            {
              $this->load->library('image_lib');

                  $image_data =   $this->upload->data();
                  $cover2=$image_data['file_name'];
                  //$cover_resize=$image_data['file_name'];
                  $configer2 =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  85,
                    'height'          =>  83,
                  );
                  $this->image_lib->initialize($configer2);
                  $this->image_lib->resize();}



   $data=array(
        "image"=>$cover,
        "small_image"=>$cover2,
        "contant"=>$this->input->post("content"),
        "heading"=>$this->input->post("heading")

      );$this->db->where("id",$this->uri->segment(3));

         if($this->db->update('vendorhome',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/vendorhome");

    }}else if(!$this->upload->do_upload('image') && $this->upload->do_upload('image2'))
    {
          ///
          if(!empty($_FILES["image2"]["name"])){


      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
     
            if (!$this->upload->do_upload('image2'))
            {

            }
            else
            {
              $this->load->library('image_lib');

                  $image_data =   $this->upload->data();
                  $cover2=$image_data['file_name'];
                  //$cover_resize=$image_data['file_name'];
                  $configer2 =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  85,
                    'height'          =>  83,
                  );
                  $this->image_lib->initialize($configer2);
                  $this->image_lib->resize();}



   $data=array(
        "image"=>$cover,
        "small_image"=>$cover2,
        "contant"=>$this->input->post("content"),
        "heading"=>$this->input->post("heading")

      );
   $this->db->where("id",$this->uri->segment(3));

         if($this->db->update('vendorhome',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/vendorhome");
       }
}else if($this->upload->do_upload('image') && !$this->upload->do_upload('image2'))
    {
          ///
          if(!empty($_FILES["image"]["name"])){


      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
     
            if (!$this->upload->do_upload('image'))
            {

            }
            else
            {
              $this->load->library('image_lib');

                  $image_data =   $this->upload->data();
                  $cover=$image_data['file_name'];
                  //$cover_resize=$image_data['file_name'];
                  $configer2 =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           => 440,
                    'height'          =>  250,
                  );
                  $this->image_lib->initialize($configer2);
                  $this->image_lib->resize();}



   $data=array(
        "image"=>$cover,
        "small_image"=>$cover2,
        "contant"=>$this->input->post("content"),
        "heading"=>$this->input->post("heading")

      );
$this->db->where("id",$this->uri->segment(3));
         if($this->db->update('vendorhome',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/vendorhome");
       }

      ///
         /* $this->load->library('image_lib');
          $image_data =   $this->upload->data();

          $cover=$image_data['file_name'];
          $cover2=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
        /*  $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            'width'           =>  150,
            'height'          =>  200,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();*/

          /*$data=array(
               "image"=>$cover,
               "small_image"=>$cover2,
               "contant"=>$this->input->post("content"),
               "heading"=>$this->input->post("heading")

             );

        $this->db->where("id",$this->uri->segment(3));

         if($this->db->update('vendorhome',$data))
         {
          $msg=" Updated Successfully.";
         }
         else
         {
           $msg=" Couldnot be Updated.";
         }
         redirect ("Product/vendorhome");*/
}}}
  else
  {
    if($this->input->post("heading")){

    if(!empty($_FILES["image"]["name"])){


      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image'))
      {

      }
      else
      {
        $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  440,
              'height'          =>  250,
            );
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();}
            if (!$this->upload->do_upload('image2'))
            {

            }
            else
            {
              $this->load->library('image_lib');

                  $image_data =   $this->upload->data();
                  $cover2=$image_data['file_name'];
                  //$cover_resize=$image_data['file_name'];
                  $configer2 =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  85,
                    'height'          =>  83,
                  );
                  $this->image_lib->initialize($configer2);
                  $this->image_lib->resize();}



   $data=array(
        "image"=>$cover,
        "small_image"=>$cover2,
        "contant"=>$this->input->post("content"),
        "heading"=>$this->input->post("heading")

      );

         if($this->db->insert('vendorhome',$data))
         {
          $msg="brand contant Added Successfully.";
         }
         else
         {
           $msg="brand contant Couldnot be Added.";
         }
         redirect ("Product/vendorhome");

    }

  }}
}
///
public function addtestimonial($edit=false){
 if($edit==true)
  {
   // exit;
   // echo "sdf";exit;
   /*
   $this->load->library('image_lib');
while($i<=$counter) /*conter have value of total number for images just ignore
{
    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload($userfileName))
    {
       echo "error".count;
    }
    else
    {
          $image_data =   $this->upload->data();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            'width'           =>  250,
            'height'          =>  250,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
    }
}
*/
   if($this->input->post("name")){
    $cover=$this->input->post("testimonial");
    // exit;
    /*$config['upload_path'] = './assets/images/testimonialimage/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '1000000';

     $this->upload->initialize($config);
    $cover=$this->input->post("testimonial");
    if(!empty($_FILES["testimonial"]["name"])){


        if (!$this->upload->do_upload('testimonial'))
        {
        echo $this->upload->display_errors();
        }
        else
        {
        $pic = $this->upload->data();
        $cover=$pic['file_name'];
        }
    }*/

    $config['upload_path'] = './assets/images/testimonialimage/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('testimonial'))
    {
       //echo "error".count;
    }
    else
    {
      $this->load->library('image_lib');
          $image_data =   $this->upload->data();
          $cover=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'maintain_ratio'  =>  TRUE,
            'width'           =>  100,
            'height'          =>  100,
          );
          $this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

   

    }
    $data=array("content"=>$this->input->post("content"),

        "name"=>$this->input->post("name"),
        "image"=>$cover);

        $this->db->where("t_id",$this->uri->segment(3));

         if($this->db->update('testimonial',$data))
         {
          $msg=" Updated Successfully.";
         }
         else
         {
           $msg=" Couldnot be Updated.";
         }
         redirect ("Product/all_testimonial");

  }
}
  else
  {
    if($this->input->post("name")){

    /*$config['upload_path'] = './assets/images/testimonialimage/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '1000000';
     $this->upload->initialize($config);
    $cover="cover.jpg";$front="front.jpg";$back="back.jpg";*/
    if(!empty($_FILES["testimonial"]["name"])){


      $config['upload_path'] = './assets/images/testimonialimage/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('testimonial'))
      {
         //echo "error".count;
      }
      else
      {
        $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
            //  'new_image'       =>  './assets/images/testimonialimage/resize/', //path to
              'maintain_ratio'  =>  TRUE,
              'width'           =>  100,
              'height'          =>  100,
            );
            //$this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

    }



   $data=array(
        "image"=>$cover,

        "content"=>$this->input->post("content"),

        "name"=>$this->input->post("name"));

         if($this->db->insert('testimonial',$data))
         {
          $msg="New Testimonial Added Successfully.";
         }
         else
         {
           $msg="testimonial Couldnot be Added.";
         }
         redirect ("Product/all_testimonial");

    }

  }}$data['admin']=array();
$this->template['middle'] = $this->load->view ($this->middle = 'admin/addtestimonial',$data,true);
   $this->adminlayout();
//$this->db->delete('orders', array('userid' => $_POST['uid']));
//$this->db->delete('order_items', array('userid' => $_POST['uid']));
}
///
   public function tailors_account($tid){
	$data['tailor']=$this->db->get_where("tailors",array("id"=>$tid))->row();
  $where = "(sstatus='Accpted' OR sstatus='Started')";
                          $this->db->where($where);
	$data['pending']=$this->db->get_where("tailor_assign",array("tid"=>$tid))->num_rows();
	$data['completed']=$this->db->get_where("tailor_assign",array("tid"=>$tid,"sstatus"=>"completed"))->num_rows();
		$this->db->select('*');
		$this->db->order_by("id","desc");
		$this->db->from('order_items');
		$this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
		$this->db->where("tid",$tid);
     $where = "(sstatus='Accpted' OR sstatus='Started' OR sstatus='Completed')";
                          $this->db->where($where);
	$data['items']=$this->db->get()->result();//",array("tid"=>$tid))->result();
	//echo "<pre>";print_r($data);exit;
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/tailors_accounts',$data,true);
    $this->adminlayout();
  }

     public function tailor_orders(){
  $tailors=$this->db->get_where("tailors")->result();

  foreach ($tailors as $tailor) {
    $this->db->select('*');
    $this->db->order_by("id","desc");
    $this->db->from('order_items');
    $this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
    $this->db->where("tid",$tailor->id);
    $data['items'][]=$this->db->get()->result();
  }

  $this->template['middle'] = $this->load->view ($this->middle = 'admin/tailor_orders',$data,true);
    $this->adminlayout();
  }

  public function vendors_account($tid){
	$data['vendor']=$this->db->get_where("vendor",array("vid"=>$tid))->row();
	$data['pending']=$this->db->get_where("order_items",array("vendor_id"=>$tid,"status"=>""))->num_rows();
	$data['completed']=$this->db->get_where("order_items",array("vendor_id"=>$tid,"status"=>"completed"))->num_rows();
		$this->db->select('*');
		$this->db->order_by("id","desc");
		$this->db->from('order_items');
		//$this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
		$this->db->where("vendor_id",$tid);
	$data['items']=$this->db->get()->result();//",array("tid"=>$tid))->result();
	//echo "<pre>";print_r($data);exit;
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/vendors_accounts',$data,true);
    $this->adminlayout();
  }
  public function update_vendor_options($id){
    $this->db->where('vid',$id);
     $this->db->update('vendor',array("option"=>implode(",",$this->input->post("option")),'markup'=>$this->input->post('markup')));
     redirect('product/vendors_account_details/'.$id);
  }
     public function vendors_account_details($tid){
  $data['vendor']=$this->db->get_where("vendor",array("vid"=>$tid))->row();
  $data['pending']=$this->db->get_where("order_items",array("vendor_id"=>$tid,"status"=>""))->num_rows();
  $data['completed']=$this->db->get_where("order_items",array("vendor_id"=>$tid,"status"=>"completed"))->num_rows();
   // $this->db->select('*');
  //  $this->db->order_by("id","desc");
   // $this->db->from('order_items');
    //$this->db->join('tailor_assign', 'order_items.id = tailor_assign.stid');
   // $this->db->where("vendor_id",$tid);
 // $data['items']=$this->db->get()->result();//",array("tid"=>$tid))->result();
  //echo "<pre>";print_r($data);exit;
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/vendors_accounts',$data,true);
    $this->adminlayout();
  }
  public function user_account_details($tid){
$data['vendor']=$this->db->get_where("users",array("uid"=>$tid))->row();
$this->template['middle'] = $this->load->view ($this->middle = 'admin/users_account',$data,true);
 $this->adminlayout();
}
       public function vendor_orders(){
  $vendors=$this->db->get("vendor")->result();
  ///$data['pending']=0;
  //$data['completed']=0;
    foreach ($vendors as $vendor) {
    $this->db->select('*');
    $this->db->order_by("id","desc");
    $this->db->from('order_items');

    //$data['pending']+=$this->db->get_where("order_items",array("vendor_id"=>$vendor,"status"=>""))->num_rows();
  //$data['completed']+=$this->db->get_where("order_items",array("vendor_id"=>$vendor,"status"=>"completed"))->num_rows();

    $this->db->where("vendor_id",$vendor->vid);
    $this->db->group_by('order_items.oid');
  $data['items'][]=$this->db->get()->result();//",array("tid"=>$tid))->result();
}
/*$unique_order_ids=array();
  foreach($data as $data1){
    foreach ($data1 as $data2) {
        $unique_order_ids=$data2->oid;
    }

  }*/

    //echo "<pre>";print_r($unique_order_ids);exit;
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/vendor_orders',$data,true);
    $this->adminlayout();
  }

public function tailors(){
  $this->db->order_by("id","desc");
	 $tails=$this->db->get_where("tailors",array('otp_status'=>'Active'));
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/tailors',$data,true);
     $this->adminlayout();
  }
  public function vendors(){
    $this->db->order_by('vid','desc');
	 $tails=$this->db->get_where("vendor",array('question5!='=>''));
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
   //echo $this->db->last_query();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/vendors',$data,true);
     $this->adminlayout();
  }
  public function accessoriesvendors(){
	 $tails=$this->db->get_where("vendor","option LIKE '%Accessories%'");
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/accessoriesvendors',$data,true);
     $this->adminlayout();
  }
  public function fabricvendors(){
	 $tails=$this->db->get_where("vendor","option LIKE '%Fabric%'");
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/fabricvendors',$data,true);
     $this->adminlayout();
  }
  public function moreservicevendors(){
	 $tails=$this->db->get_where("vendor","option LIKE '%More Service%'");
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/moreservicevendors',$data,true);
     $this->adminlayout();
  }
  public function boutiquevendors(){
	 $tails=$this->db->get_where("vendor","option LIKE '%Online Boutique%'");
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/boutiquevendors',$data,true);
     $this->adminlayout();
  }
  public function uniformvendors(){
	 $tails=$this->db->get_where("vendor","option LIKE '%Uniform%'");
	 $data['totalu']=$tails->num_rows();
	 $data['tailors']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/uniformvendors',$data,true);
     $this->adminlayout();
  }
  public function contactenquiry(){
	 $tails1=$this->db->get("tailors");
	 $data['totalu']=$tails1->num_rows();

	 $tails=$this->db->get("tbl_enquiry");
	 $data['enquiry']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/contactenquiry',$data,true);
     $this->adminlayout();
  }

  public function stitching_orders()
  {

  $this->db->from('order_items');
  $this->db->join('orders', 'orders.oid = order_items.oid');
  $this->db->join('users', 'orders.userid = users.uid');
	$this->db->where("order_items.measures!=","");
    $this->db->where("order_items.delete",0);
	$this->db->order_by("order_items.id","desc");
  $result=$this->db->get();
  $data['redirect_page']= 'stitching_order_detail';
	$data['totalpro']=$result->num_rows();
	$data['stitch']=$result->result_array();
  //echo $this->db->last_query();
//print_r($data['stitch']); die;
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_orders',$data,true);
     $this->adminlayout();

  }
  public function altration_orders()
  {

  $this->db->from('order_items');
  $this->db->join('orders', 'orders.oid = order_items.oid');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("order_items.order_type","altration");
  $this->db->order_by("id","desc");
  $result=$this->db->get();
  $data['redirect_page']= 'order_details';
  $data['excel'] = 'excel';
  $data['totalpro']=$result->num_rows();
  $data['stitch']=$result->result_array();
  $data['title'] = "All Orders";
//print_r($data['stitch']);
   $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_orders',$data,true);
     $this->adminlayout();

  }

   public function user_detail($id)
  {
  $this->db->where("uid",$id);
    $result=$this->db->get("users");
  $data['vendor']=$result->row();
   $this->template['middle'] = $this->load->view ($this->middle = 'admin/user_detail',$data,true);
     $this->adminlayout();
  }

  public function stitching_order_detail($oid){
	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('users', 'orders.userid = users.uid');
	$this->db->where("oid",$oid);
	$orders=$this->db->get();
	$data['order']=$orders->row();
  //print_r($this->db->last_query());
	$this->db->where('measures!=','');
	$this->db->where('oid',$oid);
	$data['items']=$this->db->get("order_items")->result();
 //print_r($data['order']);
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_order_detail',$data,true);
    $this->adminlayout();
  }
 public function tailor_invoice(){
      //print_r($_GET);
    $data=array();
      $data['tailor_infok']=$this->db->get_where("tailors",array('id'=>$_GET['tid']))->row();
      //print_r($data['items']);
      $this->db->where("(sstatus='accepted' OR sstatus='Completed' OR sstatus='Started')", NULL, FALSE);
      $query = $this->db->get_where('tailor_assign',array('tid'=>$_GET['tid'],'stid'=>$_GET['oidd']));
      $data['tailortruek'] = $query->num_rows();


      $data['datak'] = $query->row();

      $this->db->where('id',$_GET['oidd']);
      $data['itemsk']=$this->db->get("order_items")->result();
      $data['itemorderid']=$this->db->get_where("order_items",array('id'=>$_GET['oidd']))->row()->oid;
      //print_r($data['items_t_5']);
      //print_r($data['data']);
     // echo $this->db->last_query();

      $this->template['middle'] = $this->load->view($this->middle = 'admin/stitching_tailor_detail',$data,true);
    $this->adminlayout();
    }
  public function order_stitching_status($oid){
  $this->db->select('*');
  $this->db->from('orders');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where("oid",$oid);
  $orders=$this->db->get();
  $data['order']=$orders->row();
  $this->db->where('measures!=','');
  $this->db->where('oid',$oid);
  $data['items']=$this->db->get("order_items")->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_shipping_detail',$data,true);
    $this->adminlayout();
  }


  public function stit_status($id){
  $admin_status=array("admin_status"=>'yes');
  $this->db->where("stid",$id);
  $this->db->update("tailor_assign",$admin_status);
  redirect('product/stitching_order_detail/'.$id);
}

public function notify_status($id){
  $admin_status=array("notify_status"=>'yes');
  $this->db->where("id",$id);
  $this->db->update("order_items",$admin_status);
  redirect('product');
}

  public function admin_status($id){
  $admin_status=array("admin_status"=>'yes');
  $this->db->where("uid",$id);
  $this->db->update("users",$admin_status);
  redirect('product/user_detail/'.$id);
}
public function admin_vstatus($id){
  $admin_vstatus=array("admin_status"=>'yes');
  $this->db->where("vid",$id);
  $this->db->update("vendor",$admin_vstatus);
  redirect('product/vendors_account_details/'.$id);
}
public function admin_tstatus($id){
  $admin_tstatus=array("admin_status"=>'yes');
  $this->db->where("id",$id);
  $this->db->update("tailors",$admin_tstatus);
  redirect('product/tailors_account/'.$id);
}

  public function pending_orders($user=false){
    $this->db->update('orders',array("read_status"=>"yes"));
   
	 if($user==true)
	  {
      $this->db->order_by("oid","desc");
	$all=$this->db->get_where("orders",array("userid"=>$user));
	$data['totalpro']=$all->num_rows();
	$this->db->select('*');
  $this->db->order_by("oid","desc");
	$this->db->from('orders');
	$this->db->join('users', 'orders.userid = users.uid');
	$this->db->where("ostatus!=","Completed");
	$this->db->where("userid",$user);
	  }
	  else
	  {

		  $this->db->order_by("oid","desc");

	$all=$this->db->get("orders");
	$data['totalpro']=$all->num_rows();
  if($_POST || $_GET){
   // print_r($_GET);
   // print_r($_POST);

    
    if($_GET['cancel']=='cancel')
{

  $status = 'cancelled by user';
}else{
  $oid = $_POST['oid'];
    $uid = $_POST['uid'];
   $status = $_POST['status'];
    $pquan = $_POST['pquan'];
    $pdate = $_POST['pdate'];
    $paym = $_POST['paym'];
}

   
   

    if(!empty($pdate)){
  $this->db->where("odate LIKE '%$pdate%'");
  }

 if(!empty($uid)){
    $uid2 = explode('-', $uid);
    $uid = $uid2[1];
  $this->db->where("userid", $uid);
}
if(!empty($oid)){
   $oid2 = explode('-', $oid);
   $oid = $oid2[1];
 $this->db->where("oid", $oid);
}
   if(!empty($status)){
  $this->db->where("ostatus LIKE '%$status%'");
  }
  if(!empty($paym)){
 $this->db->where("pay_method LIKE '%$paym%'");
 }
   if(!empty($pquan)){
  $this->db->where("bitems",$pquan);
}

}
	$this->db->select('*');
	$this->db->order_by("oid","desc");
	$this->db->from('orders');
	$this->db->join('users', 'orders.userid = users.uid');
	$this->db->where(array("ostatus!="=>"Completed","pay_status"=>'success',"delete"=>0));
	  }
	$orders=$this->db->get();
	$data['orders']=$orders->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/orders',$data,true);
    $this->adminlayout();
  }

//
    public function completed_orders($user=false){
    //$this->db->update('orders',array("read_status"=>"yes"));
   
 
  $this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->from('orders');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where(array("shipping_status"=>"Delivered","pay_status"=>'success',"delete"=>0));
    
  $orders=$this->db->get();
  $data['orders']=$orders->result();
  $data['complete'] ='complete';
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/orders',$data,true);
    $this->adminlayout();
  }
  //
    public function deleted_orders($user=false){
    $this->db->update('orders',array("read_status"=>"yes"));
   
   if($user==true)
    {
      $this->db->order_by("oid","desc");
  $all=$this->db->get_where("orders",array("userid"=>$user));
  $data['totalpro']=$all->num_rows();
  $this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->from('orders');
  $this->db->join('users', 'orders.userid = users.uid');
 // $this->db->where("ostatus!=","Completed");
  $this->db->where("userid",$user);
    }
    else
    {

      $this->db->order_by("oid","desc");

  $all=$this->db->get("orders");
  $data['totalpro']=$all->num_rows();
  if($_POST || $_GET){
   // print_r($_GET);
   // print_r($_POST);

    
    if($_GET['cancel']=='cancel')
{

  $status = 'cancelled by user';
}else{
  $oid = $_POST['oid'];
    $uid = $_POST['uid'];
   $status = $_POST['status'];
    $pquan = $_POST['pquan'];
    $pdate = $_POST['pdate'];
    $paym = $_POST['paym'];
}

   
   

    if(!empty($pdate)){
  $this->db->where("odate LIKE '%$pdate%'");
  }

 if(!empty($uid)){
    $uid2 = explode('-', $uid);
    $uid = $uid2[1];
  $this->db->where("userid", $uid);
}
if(!empty($oid)){
   $oid2 = explode('-', $oid);
   $oid = $oid2[1];
 $this->db->where("oid", $oid);
}
   if(!empty($status)){
  $this->db->where("ostatus LIKE '%$status%'");
  }
  if(!empty($paym)){
 $this->db->where("pay_method LIKE '%$paym%'");
 }
   if(!empty($pquan)){
  $this->db->where("bitems",$pquan);
}

}
  $this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->from('orders');
  $this->db->join('users', 'orders.userid = users.uid');
  $this->db->where(array("ostatus!="=>"Completed","pay_status"=>'success',"delete"=>1));
    }
  $orders=$this->db->get();
  $data['orders']=$orders->result();
  $data['delete']='true';
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/orders',$data,true);
    $this->adminlayout();
  }


  public function fabrics(){
    if($_POST){
     // print_r($_POST);
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("title LIKE '%$pname%'");
    }
     if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid = $vid2[1];
    $this->db->where("vendor_id", $vid);
  }
     if(!empty($pcate)){
    $this->db->where("category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("fabric",array("status"=>'approve'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result();
}else{
   $this->db->order_by("id","desc");

  $all=$this->db->get_where("fabric",array("status"=>'approve'));

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/products',$data,true);
    $this->adminlayout();
  }

    public function alljobsenquiry(){
   $this->db->order_by("id","desc");
  $all=$this->db->get_where("applyforjob");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_job_enq',$data,true);
    $this->adminlayout();
  }
    public function cancel_item_request_reject(){


      $data=array(
            "cancel_id"=>$this->input->post("cancel_id"),

            "reason"=>$this->input->post("reason"),
            "date"=>date("d-m-Y")

          );


              if($this->db->insert("cancel_item_request_reject",$data))
            {
                $this->db->where("id",$this->input->post("cancel_id"));
                $this->db->update('cancel_requests',array("approvedornot"=>"disapprove"));
            }

            $cancel_data = $this->db->get_where('cancel_requests',array("id"=>$this->input->post("cancel_id")))->row();

             $cancel_data2 = $this->db->get_where("order_items",array('id'=>$cancel_data->item_id))->row();
             //echo $this->db->last_query();
            // print_r($cancel_data2);
             $user_info = $this->db->get_where("users",array('uid'=>$cancel_data->user_id))->row();


            $message = '<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #outer{
      width: 80%;
      margin:auto;
      padding:1%;
    }
    #inouter{
      border-top:5px solid #009ad2;
      border-radius: 2px;
      border-bottom:2px solid #009bc8;
    }
    .footer{

      border-top:1px solid #ccc;
      padding: 1%;
      font-size: 13px;
    }
    .footer img{
      margin:1%;
      width: 20%;

          }
    .small{
      font-size: 12px;
    }
    .center{
      text-align: center;
    }
    .logo{
      float:right;
    }
    .footeremail{
      font-size: 18px
    }
    .blur{
      color:#777;
    }
    .lightblur{
      color:#444;
    }

    table{
      border-top:2px solid #000;
      width: 100%;
    }
    td{
      padding:1.5%;
      border-bottom:1px solid #ccc;
    }
    img{margin:2%;}
    img{margin:2%;}

  </style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
  <div id="inouter">
  <br>


  <p>Dear '.$user_info->name.',</p>


  <p>Your request for cancel product is disapproved by MobileDarzi. </p>
  <b>Reason:</b>'.$this->input->post("reason").'<br>

  <br>
  Following are the item(s) in this package:
  <table>
    <tr>
      <td ></td>
      <td></td>
      <td>Size</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>
    <tr>
      <td ><img src="'.base_url().'assets/images/'.$cancel_data2->pimg.'" width="50px"></td>
      <td width="200px">'.$cancel_data2->pname.'</td>
      <td>'.$cancel_data2->size.'</td>
      <td>'.$cancel_data2->qty.'</td>
      <td>Rs. '.$cancel_data2->price.'</td>
      <td>View item</td>
    </tr>
  </table>


  <br>
  <p>Regards,<br>Team MobileDarzi</p>
  <br>
  <div class="footer"><center><img src="'.base_url().'/assets/sociallinks/playstore.png"><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
  <center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
  </div>

</div>
</body>
</html>';
$this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

         $to_email = $user_info->email;

         //$mail_count= count($to_mail);


             $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
             $this->email->to($to_email);
             $this->email->subject('Mobile Darzi Retrun Product');
             $this->email->message($message);
             $this->email->send();
             $this->email->clear();

             $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';

        $message1 = "Your Cancel request is disapproved by mobiledarzi \n ";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $user_info->mobile,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

            ///


            echo $this->db->last_query();

            echo $this->db->last_query();
            redirect('product/cancel_order_items');

  }

  public function return_item_request_reject(){


      $data=array(
            "cancel_id"=>$this->input->post("cancel_id"),

            "reason"=>$this->input->post("reason"),
            "date"=>date("d-m-Y")

          );


              if($this->db->insert("return_item_request_reject",$data))
            {
                $this->db->where("id",$this->input->post("cancel_id"));
                $this->db->update('return_requests',array("approvedornot"=>"disapprove"));
            }

            ///
            $cancel_data = $this->db->get_where('return_requests',array("id"=>$this->input->post("cancel_id")))->row();

             $cancel_data2 = $this->db->get_where("order_items",array('id'=>$cancel_data->item_id))->row();
             //echo $this->db->last_query();
            // print_r($cancel_data2);
             $user_info = $this->db->get_where("users",array('uid'=>$cancel_data->user_id))->row();


            $message = '<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #outer{
      width: 80%;
      margin:auto;
      padding:1%;
    }
    #inouter{
      border-top:5px solid #009ad2;
      border-radius: 2px;
      border-bottom:2px solid #009bc8;
    }
    .footer{

      border-top:1px solid #ccc;
      padding: 1%;
      font-size: 13px;
    }
    .footer img{
      margin:1%;
      width: 20%;

          }
    .small{
      font-size: 12px;
    }
    .center{
      text-align: center;
    }
    .logo{
      float:right;
    }
    .footeremail{
      font-size: 18px
    }
    .blur{
      color:#777;
    }
    .lightblur{
      color:#444;
    }
    .expecteddate{
      color:green;
      font-size: 14px;
    }
    table{
      border-top:2px solid #000;
      width: 100%;
    }
    td{
      padding:1.5%;
      border-bottom:1px solid #ccc;
    }
    img{margin:2%;}

  </style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
  <div id="inouter">
  <br>


  <p>Dear '.$user_info->name.',</p>


  <p>Your request for return product is disapproved by MobileDarzi.</p>
  <b>Reason:</b>'.$this->input->post("reason").'<br>

  <br>
  Following are the item(s) in this package:
  <table>
    <tr>
      <td ></td>
      <td></td>
      <td>Size</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>
    <tr>
      <td ><img src="'.base_url().'assets/images/'.$cancel_data2->pimg.'" width="50px"></td>
      <td width="200px">'.$cancel_data2->pname.'</td>
      <td>'.$cancel_data2->size.'</td>
      <td>'.$cancel_data2->qty.'</td>
      <td>Rs. '.$cancel_data2->price.'</td>
      <td>View item</td>
    </tr>
  </table>


  <br>
  <p>Regards,<br>Team MobileDarzi</p>
  <br>
  <div class="footer"><center><img src="'.base_url().'/assets/sociallinks/playstore.png"><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
   <center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
  </div>

</div>
</body>
</html>';
$this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

         $to_email = $user_info->email;

         //$mail_count= count($to_mail);


             $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
             $this->email->to($to_email);
             $this->email->subject('Mobile Darzi Retrun Product');
             $this->email->message($message);
             $this->email->send();
             $this->email->clear();

             $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';

        $message1 = "Your Return request is disapproved by mobiledarzi \n ";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $user_info->mobile,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

            ///


            echo $this->db->last_query();
            redirect('product/return_order_items');

  }

      public function cancel_request_approve(){

             $this->db->where("id",$this->input->post("sid"));
             $this->db->update('cancel_requests',array("approvedornot"=>"approve"));

             $cancel_data = $this->db->get_where("cancel_requests",array('id'=>$this->input->post("sid")))->row();
             $this->db->where("id",$cancel_data->item_id);
             $this->db->update('order_items',array("status"=>"cancel"));
             $cancel_data2 = $this->db->get_where("order_items",array('id'=>$cancel_data->item_id))->row();
             $cancel_data3 = $this->db->get_where("order_items",array('oid'=>$cancel_data2->oid,'status!='=>'cancel'))->result();
             $user_info = $this->db->get_where("users",array('uid'=>$cancel_data->user_id))->row();
             $total = 0;
             foreach ($cancel_data3 as $value) {
               $total+=$value->price;
             }
echo $total;
             $this->db->where("oid",$cancel_data2->oid);
            $this->db->update('orders',array("ototal"=>$total));
             $message = '<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #outer{
      width: 80%;
      margin:auto;
      padding:1%;
    }
    #inouter{
      border-top:5px solid #009ad2;
      border-radius: 2px;
      border-bottom:2px solid #009bc8;
    }
    .footer{

      border-top:1px solid #ccc;
      padding: 1%;
      font-size: 13px;
    }
    .footer img{
      margin:1%;
      width: 20%;

          }
    .small{
      font-size: 12px;
    }
    .center{
      text-align: center;
    }
    .logo{
      float:right;
    }
    .footeremail{
      font-size: 18px
    }
    .blur{
      color:#777;
    }
    .lightblur{
      color:#444;
    }
    .expecteddate{
      color:green;
      font-size: 14px;
    }
    table{
      border-top:2px solid #000;
      width: 100%;
    }
    td{
      padding:1.5%;
      border-bottom:1px solid #ccc;
    }
    img{margin:2%;}

  </style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
  <div id="inouter">
  <br>


  <p>Dear '.$user_info->name.',</p>


  <p>Your order is approved to cancel.</p>


  <br>
  Following are the item(s) in this package:
  <table>
    <tr>
      <td ></td>
      <td></td>
      <td>Size</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>
    <tr>
      <td ><img src="'.base_url().'assets/images/'.$cancel_data2->pimg.'" width="50px"></td>
      <td width="200px">'.$cancel_data2->pname.'</td>
      <td>'.$cancel_data2->size.'</td>
      <td>'.$cancel_data2->qty.'</td>
      <td>Rs. '.$cancel_data2->price.'</td>
      <td>View item</td>
    </tr>
  </table>


  <br>
  <p>Regards,<br>Team MobileDarzi</p>
  <br>
  <div class="footer"><center><img src="'.base_url().'/assets/sociallinks/playstore.png"><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
   <center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
  </div>

</div>
</body>
</html>';
$this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

         $to_email = $user_info->email;

         //$mail_count= count($to_mail);


             $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
             $this->email->to($to_email);
             $this->email->subject('Mobile Darzi Retrun Product');
             $this->email->message($message);
             $this->email->send();
             $this->email->clear();

             $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';

        $message1 = "Your Cancel request is approved by mobiledarzi \n ";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $user_info->mobile,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

            //echo $this->db->last_query();
            //redirect('welcome/orders');

  }
        public function return_request_approve(){

             $this->db->where("id",$this->input->post("sid"));
             $this->db->update('return_requests',array("approvedornot"=>"approve"));

             $cancel_data = $this->db->get_where("return_requests",array('id'=>$this->input->post("sid")))->row();
             $this->db->where("id",$cancel_data->item_id);
             $this->db->update('order_items',array("status"=>"return"));
             $cancel_data2 = $this->db->get_where("order_items",array('id'=>$cancel_data->item_id))->row();
             $cancel_data3 = $this->db->get_where("order_items",array('oid'=>$cancel_data2->oid,'status!='=>'return'))->result();
             $user_info = $this->db->get_where("users",array('uid'=>$cancel_data->user_id))->row();
             $total = 0;
             foreach ($cancel_data3 as $value) {
               $total+=$value->price;
             }
echo $total;
             $this->db->where("oid",$cancel_data2->oid);
            $this->db->update('orders',array("ototal"=>$total));
            $message = '<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #outer{
      width: 80%;
      margin:auto;
      padding:1%;
    }
    #inouter{
      border-top:5px solid #009ad2;
      border-radius: 2px;
      border-bottom:2px solid #009bc8;
    }
    .footer{

      border-top:1px solid #ccc;
      padding: 1%;
      font-size: 13px;
    }
    .footer img{
      margin:1%;
      width: 20%;

          }
    .small{
      font-size: 12px;
    }
    .center{
      text-align: center;
    }
    .logo{
      float:right;
    }
    .footeremail{
      font-size: 18px
    }
    .blur{
      color:#777;
    }
    .lightblur{
      color:#444;
    }
    .expecteddate{
      color:green;
      font-size: 14px;
    }
    table{
      border-top:2px solid #000;
      width: 100%;
    }
    td{
      padding:1.5%;
      border-bottom:1px solid #ccc;
    }
    img{margin:2%;}

  </style>
</head>
<body>
<div id="outer">
<h2>MobileDarzi.com</h2>
  <div id="inouter">
  <br>


  <p>Dear '.$user_info->name.',</p>


  <p>Your order is approved to return.</p>


  <br>
  Following are the item(s) in this package:
  <table>
    <tr>
      <td ></td>
      <td></td>
      <td>Size</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>
    <tr>
      <td ><img src="'.base_url().'assets/images/'.$cancel_data2->pimg.'" width="50px"></td>
      <td width="200px">'.$cancel_data2->pname.'</td>
      <td>'.$cancel_data2->size.'</td>
      <td>'.$cancel_data2->qty.'</td>
      <td>Rs. '.$cancel_data2->price.'</td>
      <td>View item</td>
    </tr>
  </table>


  <br>
  <p>Regards,<br>Team MobileDarzi</p>
  <br>
  <div class="footer"><center><img src="'.base_url().'/assets/sociallinks/playstore.png"><img src="'.base_url().'/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: absoluteinnovationspl2@gmail.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of MobileDarzi</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
   <center><a href="#"><img src="'.base_url().'/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="'.base_url().'/assets/sociallinks/google_circle_black-24.png"></a></center></p>
  </div>

</div>
</body>
</html>';
$this->load->library('email');
        $this->email->initialize(array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

         $to_email = $user_info->email;

         //$mail_count= count($to_mail);


             $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi');
             $this->email->to($to_email);
             $this->email->subject('Mobile Darzi Retrun Product');
             $this->email->message($message);
             $this->email->send();
             $this->email->clear();

             $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'MDARZI';

        $message1 = "Your Return request is approved by mobiledarzi \n ";
        $route = 4;
        $postData = array(
          'authkey' => $authKey,
          'mobiles' => $user_info->mobile,
          'message' => $message1,
          'sender' => $senderId,
          'route' => $route
        );
    $url='http://send.onlinesendsms.com/api/sendhttp.php';
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);





        //redirect(base_url() . 'product/manage_newsletter');

            //echo $this->db->last_query();
            //redirect('welcome/orders');

  }

  public function cancel_request_status(){
    $sid = $this->uri->segment(3);
  $this->db->where("id",$sid);
  $this->db->update('cancel_requests',array("admin_status"=>"yes"));
  redirect('product/cancel_order_items');
              }
  public function return_request_status(){
    $sid = $this->uri->segment(3);
  $this->db->where("id",$sid);
  $this->db->update('return_requests',array("admin_status"=>"yes"));
  redirect('product/return_order_items');
              }
  public function cancel_order_items(){
    $this->db->update('cancel_requests',array('admin_status'=>'yes'));
     $this->db->order_by("id","desc");
  $all=$this->db->get_where("cancel_requests");
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/cancel_requests',$data,true);
    $this->adminlayout();
  }
  public function all_product_vendor_items(){
$this->db->update('fabric',array('admin_status'=>'yes'));
$this->db->update('uniform',array('admin_status'=>'yes'));
$this->db->update('accessories',array('admin_status'=>'yes'));
$this->db->update('online_boutique',array('admin_status'=>'yes'));
$this->db->update('more_services',array('admin_status'=>'yes'));
     $this->db->order_by("id","desc");
  $all=$this->db->get_where("cancel_requests");
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/vendor_products',$data,true);
    $this->adminlayout();
  }

  public function shipping_notifications(){
$this->db->where("notify_status",'no');
            $this->db->order_by("id","desc");
            $this->db->limit(2);
            $nor9=$this->db->get('order_items')->result();

/*$this->db->update('fabric',array('admin_status'=>'yes'));
$this->db->update('uniform',array('admin_status'=>'yes'));
$this->db->update('accessories',array('admin_status'=>'yes'));
$this->db->update('online_boutique',array('admin_status'=>'yes'));
$this->db->update('more_services',array('admin_status'=>'yes'));
     $this->db->order_by("id","desc");
  $all=$this->db->get_where("cancel_requests");*/
  $data['fab']=$nor9;
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/shipping_noti',$data,true);
    $this->adminlayout();
  }

    public function all_stitching_notification(){
      $this->db->update('tailor_assign',array('admin_status'=>'yes'));
    $data=array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/stitching_notification',$data,true);
    $this->adminlayout();
  }

  public function return_order_items(){
     $this->db->order_by("id","desc");
  $all=$this->db->get_where("return_requests");
$this->db->update('return_requests',array('admin_status'=>'yes'));
$this->db->update('return_item_request_reject',array('admin_status'=>'yes'));
  //$data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/return_requests',$data,true);
    $this->adminlayout();
  }
  public function cancel_reasons(){
    $data['title']='Cancel Reason';
     $data['add_action']='add_cancel_reasons';
     $data['update_action']='update_cancel_reasons';
     $data['delete_function']='cancel_reason_del';
     $this->db->order_by("id","desc");
  $all=$this->db->get("cancel_reasons");

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/cancel_reasons',$data,true);
    $this->adminlayout();
  }
    public function shipping_methods(){
    $data['title']='Add and Update Shipping Method';
     $data['add_action']='add_shipping_method';
     $this->db->order_by("id","desc");
  $all=$this->db->get("shipping_methods");

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/shipping_method',$data,true);
    $this->adminlayout();
  }
  public function return_reasons(){
    $data['title']='Return Reason';
    $data['add_action']='add_return_reasons';
    $data['update_action']='update_return_reasons';
    $data['delete_function']='return_reason_del';
     $this->db->order_by("id","desc");
  $all=$this->db->get("return_reasons");

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/cancel_reasons',$data,true);
    $this->adminlayout();
  }

public function add_shipping_method(){

     $data=array(
          "reason"=>$this->input->post("reason"),
          "price"=>$this->input->post("price"),
          "days"=>$this->input->post("days"),
         "date"=>date('d-m-Y')
          );
        $num = $this->db->get_where('shipping_methods',$data)->num_rows();
           if($num==0)
           {
            if($this->db->insert('shipping_methods',$data))
            {
              //echo "done";
               $this->session->set_flashdata('message_stitch_heading', 'Method Added Successfully');
               redirect('product/shipping_methods');
            }

           }
  }
  public function edit_shipping_method(){

    print_r($_POST['title1']);
    echo count($_POST['title1']);
    for ($i=0;$i<count($_POST['title1']);$i++) {
      $this->db->where('id',$_POST['id'][$i]);
$this->db->update('shipping_methods',array('reason'=>$_POST['title1'][$i],'price'=>$_POST['price'][$i],'days'=>$_POST['days'][$i]));
     }
redirect('product/shipping_methods');
      /*$data=array(
          "reason"=>$this->input->post("reason"),
          "price"=>$this->input->post("price"),
         "date"=>date('d-m-Y')
          );
        $num = $this->db->get_where('shipping_methods',$data)->num_rows();
           if($num==0)
           {
            if($this->db->insert('shipping_methods',$data))
            {
              //echo "done";
               $this->session->set_flashdata('message_stitch_heading', 'Method Added Successfully');

            }

           }*/
  }
  public function add_cancel_reasons(){

     $data=array(
          "reason"=>$this->input->post("reason"),
         "date"=>date('d-m-Y')
          );
        $num = $this->db->get_where('cancel_reasons',$data)->num_rows();
           if($num==0)
           {
            if($this->db->insert('cancel_reasons',$data))
            {
              //echo "done";
               $this->session->set_flashdata('message_stitch_heading', 'Reason Added Successfully');
               redirect('product/cancel_reasons');
            }

           }
  }

    public function update_cancel_reasons(){
    $i=1;  foreach ($_POST['reason'] as $value) {
    //  print_r($_POST);
    //echo $value;
        $data=array(
           "reason"=>$value,
          "date"=>date('d-m-Y')
           );
        $this->db->where('id',$i);
        $this->db->update('cancel_reasons',$data);
        $i++;
      }
     redirect('product/cancel_reasons');
    }
    public function update_return_reasons(){
    $i=1;  foreach ($_POST['reason'] as $value) {
    //  print_r($_POST);
    //echo $value;
        $data=array(
           "reason"=>$value,
          "date"=>date('d-m-Y')
           );
        $this->db->where('id',$i);
        $this->db->update('return_reasons',$data);
        $i++;
      }
     redirect('product/return_reasons');
    }
  public function add_return_reasons(){

     $data=array(
          "reason"=>$this->input->post("reason"),
         "date"=>date('d-m-Y')
          );
        $num = $this->db->get_where('return_reasons',$data)->num_rows();
           if($num==0)
           {
            if($this->db->insert('return_reasons',$data))
            {
              //echo "done";
               $this->session->set_flashdata('message_stitch_heading', 'Reason Added Successfully');
               redirect('product/return_reasons');
            }

           }
  }

  public function all_disabled(){
  //$this->db->order_by("id","desc");
  $all_f=$this->db->get_where("fabric",array("status"=>'disapprove'));
  $all_a=$this->db->get_where("accessories",array("status"=>'disapprove'));
  $all_u=$this->db->get_where("uniform",array("status"=>'disapprove'));
  $all_o=$this->db->get_where("online_boutique",array("status"=>'disapprove'));

  $count1=$all_f->num_rows();
  $count2=$all_a->num_rows();
  $count3=$all_u->num_rows();
  $count4=$all_o->num_rows();
  $data['totalpro']=$count1+$count2+$count3+$count4;
  $data['fab']=$all_f->result();
  $data['acc']=$all_a->result();
  $data['uni']=$all_u->result();
  $data['onb']=$all_o->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_disabled',$data,true);
    $this->adminlayout();
  }
/*    public function out_of_stock(){
  //$this->db->order_by("id","desc");
  $all_f=$this->db->get_where("fabric",array("quantity"=>'0'));
  $all_a=$this->db->get_where("accessories",array("quantity"=>'0'));
  $all_u=$this->db->get_where("uniform",array("quantity"=>'0'));
  $all_o=$this->db->get_where("online_boutique",array("quantity"=>'0'));

  $count1=$all_f->num_rows();
  $count2=$all_a->num_rows();
  $count3=$all_u->num_rows();
  $count4=$all_o->num_rows();
  $data['totalpro']=$count1+$count2+$count3+$count4;
  $data['fab']=$all_f->result();
  $data['acc']=$all_a->result();
  $data['uni']=$all_u->result();
  $data['onb']=$all_o->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/outofstock',$data,true);
    $this->adminlayout();
  }*/
  public function out_of_stock(){
    error_reporting(0);
          ini_set('display_errors', 0);
$s_qty=0;
//$this->db->order_by("id","desc");
   //$data['title']="All Out of Stock";

 if($_POST){
      //print_r($_POST);
      $data2=array();
     
      $pname = $_POST['pname'];
      
      $pdate = $_POST['pdate'];
      $price = $_POST['price'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }
      if(!empty($pname)){
    $this->db->where("title LIKE '%$pname%'");
    }
     if(!empty($price)){
    $this->db->where("price LIKE '$price'");
    }
     if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
    }
     if(!empty($vid)){
       $vid2 = explode('-', $vid);
      $vid2 = $vid2[1];
    $this->db->where("vendor_id LIKE '$vid2'");
    }
    



$all_f=$this->db->get_where("fabric",array('Subtract_Stock'=>'Yes'));
//echo $this->db->last_query();
 if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }
      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
     if(!empty($price)){
    $this->db->where("price LIKE '$price'");
    }
     if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
    }
     if(!empty($vid)){
       $vid2 = explode('-', $vid);
      $vid2 = $vid2[1];
    $this->db->where("vendor_id LIKE '$vid2'");
    }
  

$all_a=$this->db->get_where("accessories",array('Subtract_Stock'=>'Yes'));
 if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }
      if(!empty($pname)){
    $this->db->where("school_name LIKE '%$pname%'");
    }
     if(!empty($price)){
    $this->db->where("price LIKE '$price'");
    }
     if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
    }
     if(!empty($vid)){
       $vid2 = explode('-', $vid);
      $vid2 = $vid2[1];
    $this->db->where("vendor_id LIKE '$vid2'");
    }
   
$all_u=$this->db->get_where("uniform",array('Subtract_Stock'=>'Yes'));
//echo $this->db->last_query();
 if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }
      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
     if(!empty($price)){
    $this->db->where("price LIKE '$price'");
    }
     if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
    }
     if(!empty($vid)){
       $vid2 = explode('-', $vid);
      $vid2 = $vid2[1];
    $this->db->where("vendor_id LIKE '$vid2'");
    }
     
$all_o=$this->db->get_where("online_boutique",array('Subtract_Stock'=>'Yes'));

$data['fab']=$all_f->result();
if(!empty($data['fab'])){
foreach ($data['fab'] as $value) {
$sss = $value->id;
    $bundle = $this->db->get_where('bundle',array('part_ids'=>$sss,'addon_or_not'=>'4'))->result();
foreach ($bundle as $value4) {
          $sbundle = $this->db->get_where('stitching_bundle',array('bundle_no'=>$value4->bundle_no))->row();  
$count_ss = $this->db->query('select oid from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$sbundle->id)->row();
if(!empty($count_ss))
{
  $s_qty += $value4->qty;
}}

 $num_fab = (($value->quantity))-($this->count_stock($value->id,$value->title)+$s_qty);
 if($num_fab<$value->Minimum_Quantity)
 {//echo $num_fab." ".$value->Minimum_Quantity."<br>";
     //echo $this->count_stock($value->id,$value->title);
    // echo "<br>";
     $data2['fab2'][] = $value->id;
 }
}}

if(!empty($all_a)){
$data['acc']=$all_a->result();

foreach ($data['acc'] as $value) {
 $num_acc = (($value->quantity))-$this->count_stock($value->acc_id,$value->brand);
 if($num_acc<$value->Minimum_Quantity){
   $data2['acc2'][] = $value->acc_id;
 }
}}

if(!empty($all_u)){
$data['uni']=$all_u->result();

foreach ($data['uni'] as $value) {
 $num_uni = (($value->quantity))-$this->count_stock($value->uniform_id,$value->school_name);
 if($num_uni<$value->Minimum_Quantity)
 {
   $data2['uni2'][] = $value->uniform_id;
 }
}}

if(!empty($all_o)){
$data['onb']=$all_o->result();

foreach ($data['onb'] as $value) {
 $num_onb = (($value->quantity))-$this->count_stock($value->id,$value->brand);
 if($num_onb<$value->Minimum_Quantity)
 {
   $data2['onb2'][] = $value->id;
 }
}}
//print_r($data2);
$data['totalpro']=count($data2['fab2'])+count($data2['acc2'])+count($data2['uni2'])+count($data2['onb2']);
$data['new']=$data2;
}else{

$all_f=$this->db->get_where("fabric",array('Subtract_Stock'=>'Yes'));
$all_a=$this->db->get_where("accessories",array('Subtract_Stock'=>'Yes'));
$all_u=$this->db->get_where("uniform",array('Subtract_Stock'=>'Yes'));
$all_o=$this->db->get_where("online_boutique",array('Subtract_Stock'=>'Yes'));
/*  $this->db->where("vendor_id",$vid);
$all_m=$this->db->get_where("more_services");*/
/*  $count1=$all_f->num_rows();
$count2=$all_a->num_rows();
$count3=$all_u->num_rows();
$count4=$all_o->num_rows();
//$count5=$all_m->num_rows();
$data['totalpro']=$count1+$count2+$count3+$count4;*/
$data['fab']=$all_f->result();
foreach ($data['fab'] as $value) {

 $num_fab = (($value->quantity))-$this->count_stock($value->id,$value->title);
 //echo $this->db->last_query();
 if($num_fab<=$value->Minimum_Quantity)
 {//echo $num_fab." ".$value->Minimum_Quantity."<br>";
     //echo $this->count_stock($value->id,$value->title);
    // echo "<br>";
     $data2['fab2'][] = $value->id;
 }
}
$data['acc']=$all_a->result();
foreach ($data['acc'] as $value) {
 $num_acc = (($value->quantity))-$this->count_stock($value->acc_id,$value->brand);
 if($num_acc<=$value->Minimum_Quantity){
   $data2['acc2'][] = $value->acc_id;
 }
}
$data['uni']=$all_u->result();
foreach ($data['uni'] as $value) {
 $num_uni = (($value->quantity))-$this->count_stock($value->uniform_id,$value->school_name);
 if($num_uni<=$value->Minimum_Quantity)
 {
   $data2['uni2'][] = $value->uniform_id;
 }
}
$data['onb']=$all_o->result();

foreach ($data['onb'] as $value) {
 $num_onb = (($value->quantity))-$this->count_stock($value->id,$value->brand);
 if($num_onb<=$value->Minimum_Quantity)
 {
   $data2['onb2'][] = $value->id;
 }
}
//print_r($data2);
 $data['totalpro']=count($data2['fab2'])+count($data2['acc2'])+count($data2['uni2'])+count($data2['onb2']);
$data['new']=$data2;
//echo count($data['new']);
}
//$data['more']=$all_m->result();
$this->template['middle'] = $this->load->view ($this->middle = 'admin/outofstock',$data,true);
 $this->adminlayout();
}
public function count_stock($id,$name){
  // $title = preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($name));

    //$count = $this->db->get_where('order_items',array('status!='=>'cancel','status!='=>'return','pid'=>$id,'pname'=>$title))->num_rows();
  /*  $this->db->select_sum('qty');
$this->db->from('order_items');
$this->db->where(array('status!='=>'cancel','status!='=>'return','pid'=>$id,'pname'=>$title));
$count = $this->db->get()->row()->qty;*/
//print_r($count);
$count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($name)).'"')->row()->qty;

    return $count;
}
  public function view_blog(){
  $all=$this->db->get("blog");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/blogs',$data,true);
    $this->adminlayout();
  }

  public function view_service_link(){
  $all=$this->db->get("service_link");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_service_link',$data,true);
    $this->adminlayout();
  }

  public function view_customer_support_link(){
  $all=$this->db->get("customer_support_link");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_customer_support_link',$data,true);
    $this->adminlayout();
  }

  public function view_info_link(){
  $all=$this->db->get("information_link");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_info_link',$data,true);
    $this->adminlayout();
  }

  public function view_footer(){
  $all=$this->db->get("footer");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/footers',$data,true);
    $this->adminlayout();
  }
  public function view_faq(){
  $all=$this->db->get("faq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_faq',$data,true);
    $this->adminlayout();
  }
  public function vview_faq(){
  $all=$this->db->get("vendorfaq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/vview_faq',$data,true);
    $this->adminlayout();
  }

  public function payment($edit=false){
    if($edit==true)
    {
     if($this->input->post("question")){
     $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('paymentfaq',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/payment");
      }
    }
    else
    {
      if($this->input->post("question")){
       $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
           if($this->db->insert('paymentfaq',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/payment");
      }
    }
  $all=$this->db->get("paymentfaq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/payment',$data,true);
  $this->adminlayout();
  }

    public function cancelreturn($edit=false){
    if($edit==true)
    {
     if($this->input->post("question")){
     $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"),
        "type"=>$this->input->post("type"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('cancelfaq',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/cancelreturn");
      }
    }
    else
    {
      if($this->input->post("question")){
       $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"),
        "type"=>$this->input->post("type"));
           if($this->db->insert('cancelfaq',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/cancelreturn");
      }
    }
  $all=$this->db->get("cancelfaq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/cancel_return',$data,true);
  $this->adminlayout();
  }

      public function shipping($edit=false){
    if($edit==true)
    {
     if($this->input->post("question")){
     $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"),
        "type"=>$this->input->post("type"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('cancelfaq',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/shipping");
      }
    }
    else
    {
      if($this->input->post("question")){
       $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"),
        "type"=>$this->input->post("type"));
           if($this->db->insert('cancelfaq',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/shipping");
      }
    }
  $all=$this->db->get("cancelfaq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/shipping',$data,true);
  $this->adminlayout();
  }

        public function table1($edit=false){
    if($edit==true)
    {
     if($this->input->post("item")){
     $data=array("items"=>$this->input->post("item"),
        "shipping"=>$this->input->post("shipping")
        );
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('shippingpage_table1',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/shipping");
      }
    }
    else
    {
      if($this->input->post("item")){
       $data=array("items"=>$this->input->post("item"),
        "shipping"=>$this->input->post("shipping"));
           if($this->db->insert('shippingpage_table1',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/shipping");
      }
    }
  }
  public function table2($edit=false){
    if($edit==true)
    {

     if($this->input->post("product")){
     $data=array("product"=>$this->input->post("product"),
            "estimated"=>$this->input->post("estimated"),
        "urgent"=>$this->input->post("urgent")
        );
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('shippingpage_table2',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/shipping");
      }
    }
    else
    {
      if($this->input->post("product")){
       $data=array("product"=>$this->input->post("product"),
            "estimated"=>$this->input->post("estimated"),
        "urgent"=>$this->input->post("urgent"));
           if($this->db->insert('shippingpage_table2',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/shipping");
      }
    }
  }


    public function cancel_return_update(){
    
     if($this->input->post("canceltext") && $this->input->post("returntext")){
     $data=array("canceltext"=>$this->input->post("canceltext"),
        "returntext"=>$this->input->post("returntext"),
        );
            $this->db->where("id",1);
           if($this->db->update('cancel_return_text',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/cancelreturn");
      }
    
  $all=$this->db->get("cancelfaq");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/cancel_return',$data,true);
  $this->adminlayout();
  }


    public function shipping_h_update(){
    $data=array("h1"=>$this->input->post("h1"),
      "h2"=>$this->input->post("h2"),
      "h3"=>$this->input->post("h3"),
      "h4"=>$this->input->post("h4"),
      "t1"=>$this->input->post("t1"),
      "t2"=>$this->input->post("t2"),
      "t3"=>$this->input->post("t3"),
      "t4"=>$this->input->post("t4"),
      "tt1"=>$this->input->post("tt1"),
      "tt2"=>$this->input->post("tt2"),
      "tt3"=>$this->input->post("tt3"),
      "tt4"=>$this->input->post("tt4"),
      "tt5"=>$this->input->post("tt5")
      );
            $this->db->where("id",1);
           if($this->db->update('shippingpage',$data))
           {
            //echo $this->db->last_query();
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/shipping");
  } 



  public function view_mobiledarzi(){
  $all=$this->db->get("mobiledarzi");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_links',$data,true);
    $this->adminlayout();
  }

  public function view_link_menu(){
  $all=$this->db->get("add_link_menu");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/link_menu',$data,true);
    $this->adminlayout();
  }
  public function view_social(){
  $all=$this->db->get("social");
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/socials',$data,true);
    $this->adminlayout();
  }

   public function fabrics_addby_vendor(){
        if($_POST){
     // print_r($_POST);
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("title LIKE '%$pname%'");
    }
     if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid = $vid2[1];
    $this->db->where("vendor_id", $vid);
  }
     if(!empty($pcate)){
    $this->db->where("category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("fabric",array("status"=>'disapprove'));
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{


	$all=$this->db->get_where("fabric",array("status"=>'disapprove'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result(); }
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/disapprove_products',$data,true);
    $this->adminlayout();
  }

  public function accessories_addby_vendor(){

    if($_POST){
     // print_r($_POST);
      $this->db->order_by("acc_id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
     if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("acc_id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid = $vid2[1];
    $this->db->where("vendor_id", $vid);
  }
     if(!empty($pcate)){
    $this->db->where("main_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("accessories",array("status"=>'disapprove'));
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{

	$all=$this->db->get_where("accessories",array("status"=>'disapprove'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result();}
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/disapprove_accessories',$data,true);
    $this->adminlayout();
  }

   public function online_addby_vendor(){
    if($_POST){
     // print_r($_POST);
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
     if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid = $vid2[1];
    $this->db->where("vendor_id", $vid);
  }
     if(!empty($pcate)){
    $this->db->where("main_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }




  $all=$this->db->get_where("online_boutique",array("status"=>'disapprove'));
     // die;


  //echo $this->db->last_query();

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{

  $all=$this->db->get_where("online_boutique",array("status"=>'disapprove'));
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();}
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/disapprove_online',$data,true);
    $this->adminlayout();
  }




  public function uniform_addby_vendor(){
      if($_POST){
     // print_r($_POST);
      $this->db->order_by("uniform_id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("school_name LIKE '%$pname%'");
    }
     if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("uniform_id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid = $vid2[1];
    $this->db->where("vendor_id", $vid);
  }
     if(!empty($pcate)){
    $this->db->where("uni_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("uniform",array("status"=>'disapprove'));
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{

	$all=$this->db->get_where("uniform",array("status"=>'disapprove'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result(); }
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/disapprove_uniform',$data,true);
    $this->adminlayout();
  }



  public function change_sta($id,$tid,$stid){
  	   //echo $stid;die;

  	    $this->db->where("id",$tid);
		$data=$this->db->get('tailors')->row();

		$this->db->where("tid",$data->temail);
		$reg_key=$this->db->get('notification')->row();
		$key = $reg_key->reg_key;
		//$body = $_POST['oid'];
		//echo $body;die;
		$base_url = base_url('app/push_notify.php?id=');
		$hit_url = $base_url.$key.'&title=Order%20Confirmed&body='.$stid;
		$json = file_get_contents($hit_url);

  	$this->db->where("soid",$id);
  	$data = array("sstatus"=>'assined');
	$this->db->update('tailor_assign',$data);
	redirect('product/stitching_orders');
  }


  public function uniform_status_change(){
  	$this->db->where("uniform_id",$this->uri->segment(3));
  	$data = array("status"=>'approve');
	$this->db->update('uniform',$data);
    $this->db->delete('disapprove',array('p_id'=>$this->uri->segment(3),'type'=>'uniform'));
	redirect('product/uniform_addby_vendor');
  }
  public function uniform_approve(){
  $this->db->where("uniform_id",$_POST['sid']);
  $data = array("status"=>'approve');
  $this->db->update('uniform',$data);
  redirect('product/all_disabled');
  }
  public function fabrics_approve(){
    $this->db->where("id",$_POST['sid']);
    $data = array("status"=>'approve');
  $this->db->update('fabric',$data);
  redirect('product/all_disabled');
  }
    public function accessories_approve(){
    $this->db->where("acc_id",$_POST['sid']);
    $data = array("status"=>'approve');
  $this->db->update('accessories',$data);

  redirect('product/all_disabled');
  }
      public function online_approve(){
    $this->db->where("id",$_POST['sid']);
    $data = array("status"=>'approve');
  $this->db->update('online_boutique',$data);
  redirect('product/all_disabled');
  }

  public function Add_tailor($id){
    if(isset($id))
    {
      $sp = implode(',',$_POST['sp']);
      $data = array("tname"=>$this->input->post("tname"),
        "temail"=>$this->input->post("temail"),
          "otp_status"=>'Active',
          "admin_status"=>'yes',
          "tphone"=>$this->input->post("tphone"),
        "gender"=>$this->input->post("gender"),
        "shopname"=>$this->input->post("shopname"),
        "taddress"=>$this->input->post("taddress"),
        "tstate"=>$this->input->post("tstate"),
        "tcity"=>$this->input->post("tcity"),
        "tshop_number"=>$this->input->post("shopnumber"),
        "landmark"=>$this->input->post("shopland"),
        "pincode"=>$this->input->post("pin"),
        //
        "acc_no"=>$this->input->post("acc_no"),
        "acc_holder_name"=>$this->input->post("acc_holder_name"),
        "bank_name"=>$this->input->post("bank_name"),
        "branch_name"=>$this->input->post("branch_name"),
        "ifsc_code"=>$this->input->post("ifsc_code"),
        "branch_code"=>$this->input->post("branch_code"),
         "payment_type"=>$this->input->post("payment_type"),
        //

        "tshop_address"=>$this->input->post("shopaddress"),
      "speciliazation"=>$sp,
      "tpass"=>md5($this->input->post("password")),
    "tdate"=>date('d-m-Y'));
      $this->db->where('id',$id);
    $this->db->update('tailors',$data);
    echo $this->db->last_query();
    }else{
//print_r($_POST);
$sp = implode(',',$_POST['sp']);
      $data = array("tname"=>$this->input->post("tname"),
        "temail"=>$this->input->post("temail"),
          "otp_status"=>'Active',
          "admin_status"=>'yes',
          "tphone"=>$this->input->post("tphone"),
        "gender"=>$this->input->post("gender"),
        "shopname"=>$this->input->post("shopname"),
        "taddress"=>$this->input->post("taddress"),
        "tstate"=>$this->input->post("tstate"),
        "tcity"=>$this->input->post("tcity"),
        "tshop_number"=>$this->input->post("shopnumber"),
        "landmark"=>$this->input->post("shopland"),
        "pincode"=>$this->input->post("pin"),
        //
        "acc_no"=>$this->input->post("acc_no"),
        "acc_holder_name"=>$this->input->post("acc_holder_name"),
        "bank_name"=>$this->input->post("bank_name"),
        "branch_name"=>$this->input->post("branch_name"),
        "ifsc_code"=>$this->input->post("ifsc_code"),
        "branch_code"=>$this->input->post("branch_code"),
        "payment_type"=>$this->input->post("payment_type"),
        //

        "tshop_address"=>$this->input->post("shopaddress"),
      "speciliazation"=>$sp,
      "tpass"=>md5($this->input->post("password")),
    "tdate"=>date('d-m-Y'));
    $this->db->insert('tailors',$data);
    echo $this->db->last_query();}
    redirect('product/tailors');
    }
    public function selectstat_oncheckout()
        {
        $statid = $this->input->post("sid");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '
        <label class="col-sm-3 control-label">City</label>
        <div class="col-sm-9 controls">


                  <select class="input--wd input--wd--full" name="tcity" required>

                    <option value=""></option>';


                          foreach($data['allcity'] as $city)
                {
                  echo '<option value="'.$city->id.'">'.$city->name.'</option>';
                }
                   echo '</select></div  >';
      }

public function update_tailor_account(){
  $sp = implode(',',$_POST['sp']);
    $this->db->where("id",$this->input->post("tid"));
    $data = array("tname"=>$this->input->post("tname"),
      "gender"=>$this->input->post("gender"),
      "shopname"=>$this->input->post("shopname"),
      "taddress"=>$this->input->post("address"),
      "tshop_number"=>$this->input->post("shopnumber"),
      "landmark"=>$this->input->post("shopland"),
      "speciliazation"=>$sp,
       //
        "acc_no"=>$this->input->post("acc_no"),
        "acc_holder_name"=>$this->input->post("acc_holder_name"),
        "bank_name"=>$this->input->post("bank_name"),
        "branch_name"=>$this->input->post("branch_name"),
        "ifsc_code"=>$this->input->post("ifsc_code"),
        "branch_code"=>$this->input->post("branch_code"),
        "pincode"=>$this->input->post("pincode"),
        "payment_type"=>$this->input->post("payment_type"),
        //
      "tshop_address"=>$this->input->post("shopaddress"));
  $this->db->update('tailors',$data);
  redirect('product/tailors_account/'.$this->input->post("tid"));
  }

  public function uniform_status(){
  	$data = array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/approve_uniform_status',$data,true);
    $this->adminlayout();
  }


public function fabrics_status_change(){
  	$this->db->where("id",$this->uri->segment(3));
  	$data = array("status"=>'approve');
	$this->db->update('fabric',$data);
  $this->db->delete('disapprove',array('p_id'=>$this->uri->segment(3),'type'=>'fabrics'));
	redirect('product/fabrics_addby_vendor');
  }

  public function fabrics_status(){
  	$data = array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/approve_products_status',$data,true);
    $this->adminlayout();
  }

  public function accessories_status(){
  	$data = array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/approve_accessories_status',$data,true);
    $this->adminlayout();
  }

  public function moreservice_appoinment(){
    $data = array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_appoinment',$data,true);
    $this->adminlayout();
  }
  public function homepage(){
    $all=$this->db->get("homepage");
    $data['totalpro']=$all->num_rows();
    $data['fab']=$all->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/homepage',$data,true);
      $this->adminlayout();

  }
  public function bridal_appoinment_detail(){
    $data = array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/view_bridal_appoinment',$data,true);
    $this->adminlayout();
  }
  public function change_and_submit_bridal()
   {
    $data=array(
      "contact"=>$this->input->post("contact"),
      "address"=>$this->input->post("address"),
      "city"=>$this->input->post("city"),
      "date_time"=>$this->input->post("date_time"),
      //"app_time"=>$this->input->post("app_time"),
      "query"=>$this->input->post("query"),
      "m_date"=>date('d-m-Y'),
      "status"=>'Approve');
    //print_r($data);die;
        $this->db->where('id',$this->input->post("id"));
      if($this->db->update("user_appoinment",$data)==true)
      {
        //echo $this->db->last_query();die;
        $site_address=$this->db->get('footer')->row();
         $userdata = $this->db->get_where('user_appoinment',array('id'=>$this->input->post("id")))->row();

        $email = $_POST['email'];
                $hash = $data['hash'];
                $url = base_url().'index.php/welcome/verify?email='.$email.'&hash='.$hash;
                $message = '<!DOCTYPE html>
                              <html>
                              <head>
                                  <title></title>
                              </head>
                              <body>
                              <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                                  <div id="inouter" style="border-bottom:2px dashed #444;">
                                  <br>
                                  <img src="http://mobiledarzi.com/assets/images/logo2.jpg">
                                  <br>

                                  <br>

                                  <p>Dear '.$userdata->name.',</p>
                                  <p>Thank you for making an bridal appointment with MobileDarzi, Your appointment is confirmed with following details:. </p>
                                  <table>
                                  <tr><td>Contact</td><td>:</td><td>'.$userdata->contact.'</td></tr>
                                  <tr><td>Address</td><td>:</td><td>'.$userdata->address.'</td></tr>
                                  <tr><td>City</td><td>:</td><td>'.$userdata->city.'</td></tr>
                                  <tr><td>Appointment Date-Time </td><td>:</td><td>'.$userdata->date_time.'</td></tr>
                                 
                                  <tr><td>Query</td><td>:</td><td>'.$userdata->query.'</td></tr>

                                  </table>


                                  <br>

                                  <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a >support@mobiledarzi.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                                  <p>We hope you enjoy our products and services.</p>

                                  <p>Best Regards,</p>
                                  <br>
                                  <p>Team MobileDarzi</p>
                                  <br>
                                  <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="'.base_url("assets/sociallinks/cod.png").'" style="float: right;"></p>
                                  <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                                  <p align="center"><img width="4%" src="'.base_url("assets/sociallinks/facebook_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/twitter_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/google_square-24.png").'"> <img src="'.base_url("assets/sociallinks/tumblr.png").'" width="4%"> <img width="4%" src="'.base_url("assets/sociallinks/instagram_square_color-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/youtube_square_color-24.png").'"></p>

                                  </div>
                                  <p class="small" style="text-align: center;">Copyright  &copy 2017 MobileDarzi.com Powered by Absolute Innovations</p>
                              </div>
                              </body>
                              </html>';

                $to_email = $userdata->email;
              $this->load->library('email');
              $this->email->initialize(array(
                'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
                'crlf' => "\r\n",
                'newline' => "\r\n"
              ));
              $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi Bridal Appointment');
              $this->email->to($to_email);
              //$this->email->cc('another@another-example.com');
              $this->email->subject('Mobile Darzi');
              $this->email->message($message);
                $this->email->send();

                /**/
                $authKey = '136895AdMGPnqo6n5875df12';
                $mobileNumber = $userdata->contact;
                $senderId = 'MDARZI';
                $message1 = "Dear ".$userdata->name."\n Your Appointment for bridal on mobile darzi has been confirmed with following detail\nContact:".$userdata->contact."\nAddress:".$userdata->address."\nCity:".$userdata->city."\nAppointment Date:".$userdata->app_date."\nAppointment Time:".$userdata->app_time."\nQuery:".$userdata->query;

                $route = 4;
                $postData = array(
                  'authkey' => $authKey,
                  'mobiles' => $mobileNumber,
                  'message' => $message1,
                  'sender' => $senderId,
                  'route' => $route
                );
            $url='http://send.onlinesendsms.com/api/sendhttp.php';
            $ch = curl_init();
            curl_setopt_array($ch, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_POST => true,
              CURLOPT_POSTFIELDS => $postData
            ));

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            curl_close($ch);

        redirect('product/bridal_appoiment_info');
      }
      else
      {

      }

   }
   public function change_and_submit_more()
   {
    $data=array(
      
      //"address"=>$this->input->post("address"),
      //"city"=>$this->input->post("city"),
      //"date_time"=>$this->input->post("date_time"),
      //"app_time"=>$this->input->post("app_time"),
      //"query"=>$this->input->post("query"),
      //"m_date"=>date('d-m-Y'),
      "status"=>'view');
    //print_r($data);die;
        $this->db->where('app_id',$this->input->post("id"));
      if($this->db->update("more_services_appoinment",$data)==true)
      {
        echo $this->db->last_query();//die;
        $site_address=$this->db->get('footer')->row();
         $userdata = $this->db->get_where('more_services_appoinment',array('app_id'=>$this->input->post("id")))->row();

        //$email = $_POST['email'];
               // $hash = $data['hash'];
                //$url = base_url().'index.php/welcome/verify?email='.$email.'&hash='.$hash;
                $message = '<!DOCTYPE html>
                              <html>
                              <head>
                                  <title></title>
                              </head>
                              <body>
                              <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                                  <div id="inouter" style="border-bottom:2px dashed #444;">
                                  <br>
                                  <img src="http://mobiledarzi.com/assets/images/logo2.jpg">
                                  <br>

                                  <br>

                                  <p>Dear '.$userdata->user_name.',</p>
                                  <p>Thank you for booking more-service appointment with MobileDarzi. We are looking forward to meet you and discuss your design needs. Following are your appointment details. </p>
                                  <p>Please ensure your availability on given date and place.</p><br><br>

                                  <table>
                                  
                                  <tr><td>Address</td><td>:</td><td>'.$userdata->address.'</td></tr>
                                  <tr><td>Landmark</td><td>:</td><td>'.$userdata->landmark.'</td></tr>
                                  <tr><td>Appointment Date </td><td>:</td><td>'.$userdata->app_date.'</td></tr>
                                  <tr><td>Appointment Time </td><td>:</td><td>'.$userdata->app_time.'</td></tr>


                                  </table>


                                  <br>

                                  <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a >support@mobiledarzi.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                                  <p>We hope you enjoy our products and services.</p>

                                  <p>Best Regards,</p>
                                  <br>
                                  <p>Team MobileDarzi</p>
                                  <br>
                                  <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="'.base_url("assets/sociallinks/cod.png").'" style="float: right;"></p>
                                  <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                                  <p align="center"><img width="4%" src="'.base_url("assets/sociallinks/facebook_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/twitter_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/google_square-24.png").'"> <img src="'.base_url("assets/sociallinks/tumblr.png").'" width="4%"> <img width="4%" src="'.base_url("assets/sociallinks/instagram_square_color-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/youtube_square_color-24.png").'"></p>

                                  </div>
                                  <p class="small" style="text-align: center;">Copyright  &copy 2017 MobileDarzi.com Powered by Absolute Innovations</p>
                              </div>
                              </body>
                              </html>';

                $to_email = $userdata->user_email;
              $this->load->library('email');
              $this->email->initialize(array(
                'protocol' => 'smtp',
               'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
                'crlf' => "\r\n",
                'newline' => "\r\n"
              ));
              $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi More Services');
              $this->email->to($to_email);
              //$this->email->cc('another@another-example.com');
              $this->email->subject('Mobile Darzi');
              $this->email->message($message);
                $this->email->send();

                /**/
               /* $authKey = '136895AdMGPnqo6n5875df12';
                $mobileNumber = $userdata->contact;
                $senderId = 'MDARZI';
                $message1 = "Dear ".$userdata->name."\n Your Appointment for bridal on mobile darzi has been confirmed with following detail\nContact:".$userdata->contact."\nAddress:".$userdata->address."\nCity:".$userdata->city."\nAppointment Date:".$userdata->app_date."\nAppointment Time:".$userdata->app_time."\nQuery:".$userdata->query;

                $route = 4;
                $postData = array(
                  'authkey' => $authKey,
                  'mobiles' => $mobileNumber,
                  'message' => $message1,
                  'sender' => $senderId,
                  'route' => $route
                );
            $url='http://send.onlinesendsms.com/api/sendhttp.php';
            $ch = curl_init();
            curl_setopt_array($ch, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_POST => true,
              CURLOPT_POSTFIELDS => $postData
            ));

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            curl_close($ch);*/

        redirect('product/all_moreservices');
      }
      else
      {

      }

   }
   public function bridal_cancel()
    {
     $data=array(
     "m_date"=>date('d-m-Y'),
     "status"=>'Cancel');
     //print_r($data);die;
         $this->db->where('id',$this->uri->segment(3));
       if($this->db->update("user_appoinment",$data)==true)
       { ////
         $site_address=$this->db->get('footer')->row();
          $userdata = $this->db->get_where('user_appoinment',array('id'=>$this->uri->segment(3)))->row();

         $email = $_POST['email'];
                 $hash = $data['hash'];
                 $url = base_url().'index.php/welcome/verify?email='.$email.'&hash='.$hash;
                 $message = '<!DOCTYPE html>
                               <html>
                               <head>
                                   <title></title>
                               </head>
                               <body>
                               <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                                   <div id="inouter" style="border-bottom:2px dashed #444;">
                                   <br>
                                   <img src="http://mobiledarzi.com/assets/images/logo2.jpg">
                                   <br>

                                   <br>

                                   <p>Dear '.$userdata->name.',</p>
                                   <p>Thank you for making an bridal appointment with MobileDarzi, but due to some reasons your appointment is canceled. </p>


                                   <br>

                                   <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a >support@mobiledarzi.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                                   <p>We hope you enjoy our products and services.</p>

                                   <p>Best Regards,</p>
                                   <br>
                                   <p>Team MobileDarzi</p>
                                   <br>
                                   <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="'.base_url("assets/sociallinks/cod.png").'" style="float: right;"></p>
                                   <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                                   <p align="center"><img width="4%" src="'.base_url("assets/sociallinks/facebook_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/twitter_square-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/google_square-24.png").'"> <img src="'.base_url("assets/sociallinks/tumblr.png").'" width="4%"> <img width="4%" src="'.base_url("assets/sociallinks/instagram_square_color-24.png").'"> <img width="4%" src="'.base_url("assets/sociallinks/youtube_square_color-24.png").'"></p>

                                   </div>
                                   <p class="small" style="text-align: center;">Copyright  &copy 2017 MobileDarzi.com Powered by Absolute Innovations</p>
                               </div>
                               </body>
                               </html>';

                 $to_email = $userdata->email;
               $this->load->library('email');
               $this->email->initialize(array(
                 'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'absoluteinnovationspl2@gmail.com',
          'smtp_pass' => 'Abs@2017',
          'smtp_port' => 465,
                 'mailtype' => 'html',
                 'charset' => 'iso-8859-1',
                 'wordwrap' => TRUE,
                 'crlf' => "\r\n",
                 'newline' => "\r\n"
               ));
               $this->email->from('absoluteinnovationspl2@gmail.com', 'Mobile Darzi Bridal Appointment');
               $this->email->to($to_email);
               //$this->email->cc('another@another-example.com');
               $this->email->subject('Mobile Darzi');
               $this->email->message($message);
                 $this->email->send();

                 /**/
                 $authKey = '136895AdMGPnqo6n5875df12';
                 $mobileNumber = $userdata->contact;
                 $senderId = 'MDARZI';
                 $message1 = "Dear ".$userdata->name."\n Your Appointment for bridal on mobile darzi has been cancel due to some reasons.";

                 $route = 4;
                 $postData = array(
                   'authkey' => $authKey,
                   'mobiles' => $mobileNumber,
                   'message' => $message1,
                   'sender' => $senderId,
                   'route' => $route
                 );
             $url='http://send.onlinesendsms.com/api/sendhttp.php';
             $ch = curl_init();
             curl_setopt_array($ch, array(
               CURLOPT_URL => $url,
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_POST => true,
               CURLOPT_POSTFIELDS => $postData
             ));

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
             $output = curl_exec($ch);
             curl_close($ch);
                 /**/




         ////

         redirect('product/bridal_appoiment_info');
       }
       else
       {

       }

    }

  public function online_status(){
    $data = array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/approve_online_status',$data,true);
    $this->adminlayout();
  }
  public function update_subcat(){

     $data=array("tid"=>$this->input->post("tid"),
          "sucat_id"=>$this->input->post("subid"),
         "price"=>$this->input->post("price")
          );
      $data2=array("tid"=>$this->input->post("tid"),
          "sucat_id"=>$this->input->post("subid")

          );
      $query = $this->db->get_where('subcategory_search',$data2);
        $num = $query->num_rows();
           if($num==0)
           {
            if($this->db->insert('subcategory_search',$data))
            {
              echo "done";
            }

           }
           else{
            $query_data = $query->row();
            $this->db->where(array('id'=>$query_data->id));
            $this->db->update('subcategory_search',array("price"=>$this->input->post('price')));
           }
  }
    public function filter(){
     // print_r($_POST);
     // die;
      $order_city = $this->input->post("order_city");
      $oid = $this->input->post("oid");
      $mcat = $this->input->post("main_cat");
      //print_r($mcat);
      ?>
      <td >
    
      <label>SubCategory</label>
                    <select class="subcat" multiple>
                      <option value="">Default</option>
                      <?php $subcatdata = $this->db->get_where('tailor_subcategory',array('category_id'=>$mcat))->result();
                      //echo $this->db->last_query();
                      foreach ($subcatdata as $value22) {
                        echo "<option value='".$value22->id."'>$value22->sub_cat_name</option>";
                      }
                      ?>
                    </select>
                  </td>

                   <td colspan="2">
                   <label>Rating</label>
                    <select class="stars" multiple>
                      <option value="">Default</option>
                      <option value="1">1 Star</option>
                      <option value="2">2 Star</option>
                      <option value="3">3 Star</option>
                      <option value="4">4 Star</option>
                      <option value="5">5 Star</option>
                    </select>
                  </td>

                  <td>

                  <span id="tailor_table<?php echo $oid; ?>">

                  </span>
                  </td>

                  <script type="text/javascript">
                    $(".subcat").change(filter2);
                    $(".stars").change(filter2);
                        function filter2(){
                          //alert('k');
  var formdata=$('.subcat').val();
  var formdata2=$('.stars').val();
  //alert(formdata+' '+formdata2);

    $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/tailor_filter',
               data: {gender:<?php echo $mcat ?>,main_cat:formdata,stars:formdata2,order_city:<?php echo $order_city; ?>,oid:<?php echo $oid; ?>},
               success: function(response){
                $("#tailor_table<?php echo $oid; ?>").html(response);
                console.log(response);
               },
               error: function(response){
                console.log(response);
               }
               });
  }
                  </script>

                  <?php
    }


    public function tailor_filter(){
      ?>
            <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
    <?php
      //print_r($_POST);
      $this->db->select('tid');
$notification = $this->db->get('notification')->result();
//print_r($notification);
foreach ($notification as $value) {
  $online[]=$value->tid;
}
      $order_city = $this->input->post("order_city");
      $oid = $this->input->post("oid");
      $mcat = $this->input->post("main_cat");
     // print_r($mcat);
      $stars = $this->input->post("stars");
      $this->db->select("tid");
      if(isset($_POST['main_cat'][0]) && $_POST['main_cat'][0]!=''){
          $this->db->where_in('sucat_id',$mcat);
      }

      $star_filter = $this->db->get('subcategory_search')->result();
      foreach ($star_filter as $value) {
       $arr[] = $value->tid;
      }
      //echo $this->db->last_query();
      /*foreach ($star_filter as  $value) {
        $sting = $value->tid.',';
      }*/
      //print_r($star_filter);

if(!empty($arr)){
      $this->db->where_in('id',$arr);
   if(isset($_POST['stars'][0]) && $_POST['stars'][0]!=''){
      $this->db->where_in('overall_rating',$stars);
}}
   $this->db->where_in('temail',$online);
   if($_POST['gender']==1)
   {
    $this->db->where("speciliazation LIKE '%Ladies%'");
   }
   if($_POST['gender']==2)
   {
    $this->db->where("speciliazation LIKE '%Gents%'");
   }
   if($_POST['gender']==3)
   {
    $this->db->where("speciliazation LIKE '%Kids%'");
   }
      $result = $this->db->get_where('tailors',array('tcity'=>$order_city))->result();
      //echo $this->db->last_query();
      ?>
      <table class="tailor_search" style="display: block;height:150px;overflow-y: auto;">

        <?php
          $i=1;

        if(!empty($result)){
          echo " <tr><th></th><th>Name</th><th>SubCategory</th><th>Rating</th><th>Price</th></tr>";
        foreach ($result as $value) {
           $this->db->where('tid',$value->id);
           if(isset($_POST['main_cat'][0]) && $_POST['main_cat'][0]!=''){
          $this->db->where_in('sucat_id',$mcat);
        }
      $result_search = $this->db->get('subcategory_search')->result();

if(!empty($result_search)){
        foreach ($result_search as $value2) {
         $subname = $this->db->get_where('tailor_subcategory',array('id'=>$value2->sucat_id))->row();
if(!empty($value2->tid) && !empty($value->tname) && !empty($subname->sub_cat_name)){
         echo "<tr><td><input type='checkbox' id='".$value2->tid."_".$i."'></td><td>$value->tname</td><td>$subname->sub_cat_name</td><td>";
         ?><span class="rating3" id="s<?php echo $i; ?>">

<?php $k=5; $star=""; for($j=1;$j<=$value->overall_rating;$j++){


  $star .= '<span class="test">&#x2605</span>';
$k--;
}
for($l=1;$l<=$k;$l++){
  $star .= '<span class="test">&#x2606</span>';
}
echo $star; $star="";?>

</span>

<?php echo "</td><td>

         <input type='number' href='".$value->id."' id='price".$value2->tid."_".$i."' value='".$value2->price."'>

         </td></tr>";


         $i++;

        }}
}

      }echo "<tr><td></td><td></td><td></td><td></td><td><button class='btn btn-primary' id='assign'>Assign</button></td></tr>";}else{echo "<br><br><br><span class='noresult'>No Result Found</span>"; }
       ?>

      </table>
      <script type="text/javascript">
       $("#assign").click(function(){
        //e.preventDefault();
        //alert('ok');
        var id=[];
        var check=[];
        var k=0;
        var l=0;
        $('input:checkbox:checked').each(function () {
                   // alert('ok');
                   //alert(id.length);

                   for(var i=0;i<id.length;i++)
                   {
                   // console.log('inloop'+id[i]);
                    if($(this).attr('id')==id[i])
                    {
                      //alert('dublicate');
                      $.confirm({
                           title: 'Alert',
                            content: 'You can not select one tailor multiple times.',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //return false();
                                        }
                                },

                               }

                        });
                      l=1;
                      return false;
                    }
                   }
                     id.push($(this).attr('id'));

                  });


        //console.log(id);
        //console.log(price);
        if(l!=1){
       $('input:checkbox:checked').each(function () {
  tid = $(this).attr('id');
                k++;
                     price = $("#price" + tid).val();
                     var tailor_id = tid.split('_');
                     tid = tailor_id[0];
                     //alert(price);
   //var tid = $("#price" + id).attr('href');
                    var oid=<?php echo $oid; ?>;
                     //alert(id+' '+price+' '+' '+tid+' '+oid);
            $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/tailor_assign',
               data: {oid:oid,tid:tid,price:price},
               success: function(response){

                //console.log(response);
                check.push(response);
  //              alert(check.length);
//alert(k);

if(check.length==k)
{
  $.confirm({
                           title: 'Alert',
                            content: 'All tailor assigned successfully.',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';
                                      //jq("#input1").val('');
                                      // console.log(sid);
                                        }
                                },

                               }

                        });
}
                //$("#msgs"+oid).html(response);
               },
               error:function(response){
                console.log(response);
               }
               });
                    //console.log(price);



}); }



});
  //var formdata=$(this).serialize();

               </script>
      <?php


     // print_r($result);


      //echo $this->db->last_query();
    }
  public function ajaxstar_tailor(){
  //print_r($_POST);
     $data=array("tid"=>$this->input->post("tid"),
          "order_no"=>$this->input->post("oid"),
         "rating"=>$this->input->post("value")
          );
      $data2=array("tid"=>$this->input->post("tid"),
          "order_no"=>$this->input->post("oid")

          );
        $num = $this->db->get_where('tailor_rating',$data2)->num_rows();
           if($num==0)
           {
            if($this->db->insert('tailor_rating',$data))
            {
              echo "done";
               $total_rat=0;
      $rating = $this->db->get_where('tailor_rating',array('tid'=>$this->input->post("tid")));
      $rat_num =$rating->num_rows();
      $rat_data =$rating->result();
 if(!empty($rat_data) and $rat_num>0)
      {
      foreach ($rat_data as $value) {
        $total_rat += $value->rating;
      }
      //echo "abc";
      $rating = $total_rat/$rat_num;
      //echo $rating;
    }
     else{
      $rating =0;
    }
    $this->db->where(array('id'=>$this->input->post("tid")));
    $this->db->update('tailors',array('overall_rating'=>$rating));


            }

           }else{
            $this->db->where(array('tid'=>$this->input->post("tid"),'order_no'=>$this->input->post("oid")));
            $this->db->update('tailor_rating',array('rating'=>$this->input->post("value")));
            $total_rat=0;
      $rating = $this->db->get_where('tailor_rating',array('tid'=>$this->input->post("tid")));
      $rat_num =$rating->num_rows();
      $rat_data =$rating->result();
 if(!empty($rat_data) and $rat_num>0)
      {
      foreach ($rat_data as $value) {
        $total_rat += $value->rating;
      }
      //echo "abc";
      $rating = $total_rat/$rat_num;
      //echo $rating;
    }
     else{
      $rating =0;
    }
    $this->db->where(array('id'=>$this->input->post("tid")));
    $this->db->update('tailors',array('overall_rating'=>$rating));
           }
  }


public function view_status_change(){
    $this->db->where("app_id",$this->uri->segment(3));
    $data = array("status"=>'view');
  $this->db->update('more_services_appoinment',$data);
  redirect('product/all_moreservices');
  }

  public function accessories_status_change(){
  	$this->db->where("acc_id",$this->uri->segment(3));
  	$data = array("status"=>'approve');
	$this->db->update('accessories',$data);
    $this->db->delete('disapprove',array('p_id'=>$this->uri->segment(3),'type'=>'accessories'));
	redirect('product/accessories_addby_vendor');
  }

  public function online_status_change(){
    $this->db->where("id",$this->uri->segment(3));
    $data = array("status"=>'approve');
  $this->db->update('online_boutique',$data);
    $this->db->delete('disapprove',array('p_id'=>$this->uri->segment(3),'type'=>'online_boutique'));
  redirect('product/online_addby_vendor');
  }



  public function fabric_accounts(){

      /*$this->db->select('*');
  $this->db->order_by("oid","desc");
  $this->db->from('orders');
  $this->db->join('users', 'orders.userid = users.uid');*/
  //$this->db->where("ostatus","Completed");
  //$this->db->where("userid",$user);


	$this->db->group_by("oid");
	$this->db->where("measures=","");
    $this->db->where("shipping_status","Delivered");

	$order_items=$this->db->get("order_items");
	$data['totalpro']=$order_items->num_rows();

	$data['orders']=$order_items->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/fabric_accounts',$data,true);
    $this->adminlayout();
  }

  public function all_services(){
	  $this->db->order_by("service_id", "ASC");
	$all=$this->db->get("services");
	$data['totalser']=$all->num_rows();
	$data['ser']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_services',$data,true);
    $this->adminlayout();
  }
    public function all_altration(){
	$this->db->order_by("alt_id", "ASC");
	$all=$this->db->get("altration");
	$data['totalser']=$all->num_rows();
	$data['ser']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_altration',$data,true);
    $this->adminlayout();
  }

   public function all_banner(){
	$all=$this->db->get("banner");
	$data['ban']=$all->num_rows();
	$data['ban']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_banner',$data,true);
    $this->adminlayout();
  }

   public function all_bridal_banner(){
  $all=$this->db->get("bridal_banner");
  $data['ban']=$all->num_rows();
  $data['ban']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_bridal_banner',$data,true);
    $this->adminlayout();
  }





  public function index() {
  	//pi
  	$this->db->select_sum("ototal ");
  	$this->db->from('orders');
  	$total_order_cost=$this->db->get();
  	$total_order_cost = $total_order_cost->result();
  	$this->db->select_sum("scost ");
  	$this->db->from('tailor_assign');
  	$tailor_cost=$this->db->get();
  	$tailor_cost = $tailor_cost->result();
  	$data=array();
  	$tailor_cost = $tailor_cost[0]->scost;
  	$total_order_cost = $total_order_cost[0]->ototal;
  	$total_cost = $total_order_cost-$tailor_cost;
  	$tailor_percentage = ($tailor_cost*100)/$total_cost;
    $data['tailor_cost_per'] = $tailor_percentage;//['attr']=$this->db->get("attributes")->result();
    //pi
$today = date("Y-m-j");
$this->db->where("odate",$today);
$todays_orders = $this->db->get("orders")->num_rows();
//print_r($todays_orders);

	$this->template['middle'] = $this->load->view ($this->middle = 'admin/dashboard',$data,true);
    $this->adminlayout();
  }
public function resize_image($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio'  =>  TRUE,
           'width'           =>  100,
            'height'          =>  137,
          );
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}
public function resize_image_acc($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/accessories/resized_accessories/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/accessories/resized_accessories/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/accessories/resized_accessories/small', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}
public function resize_image_uni($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/uniform/resized_uniform/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/uniform/resized_uniform/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/uniform/resized_uniform/small', //path to
            'maintain_ratio'  =>  TRUE,
           'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}
public function resize_image_more_services($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/more_services/resized_more_services/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/more_services/resized_more_services/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/more_services/resized_more_services/small', //path to
            'maintain_ratio'  =>  TRUE,
           'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}
public function resize_image_on($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/online_boutique/resized_online_boutique/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/online_boutique/resized_online_boutique/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/online_boutique/resized_online_boutique/small', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  100,
            'height'          =>  137,
          );
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}
public function add_fabric($edit=false)
  {
   

	  if($edit==true)
	  {
      if($this->input->post("fabric_main_cat")!='')
      {
        $data=array("category_for_filter"=>$this->input->post("fabric_main_cat"));
        $this->db->where("id",$this->uri->segment(3));
        $this->db->update('fabric',$data);
      }

		 if($this->input->post("title")){

			$config['upload_path'] = './assets/images/fabrics/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover=$this->input->post("oldt");$front=$this->input->post("oldf");$back=$this->input->post("oldb");
      $sizing_guide=$this->input->post("olds");
			if(!empty($_FILES["fabricc"]["name"])){


					if (!$this->upload->do_upload('fabricc'))
					{
					echo $this->upload->display_errors();
					}
					else
					{ $this->load->library('image_lib');
            $image_data =   $this->upload->data();
          $cover=$image_data['file_name'];
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio'  =>  TRUE,
           'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();



           /*             $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  400,
              'height'          =>  600,
            );
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();*/

            echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
        }
					}
			}
			if(!empty($_FILES["front"]["name"])){

					if (!$this->upload->do_upload('front'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
              if($_POST['front_yes_no']!='no'){
					$pic = $this->upload->data();
					$front=$pic['file_name'];
          $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

        }
					}
			}
			if(!empty($_FILES["back"]["name"])){

					if (!$this->upload->do_upload('back'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
             if($_POST['back_yes_no']!='no'){
					$pic = $this->upload->data();
					$back=$pic['file_name'];

                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio'  =>  TRUE,
           'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
        }
					}
			}
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio'  =>  TRUE,
        'width'           =>  100,
            'height'          =>  137,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          }
          }
      }
      $tax_price = (($this->input->post("wholesale_price"))*($this->input->post("tax")))/100;
      $tax_price = round($this->input->post("wholesale_price")+$tax_price);
		 $data=array("title"=>$this->input->post("title"),
          "url"=>$this->input->post("url"),
					"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "min_quan_to_buy"=>$this->input->post("min_quan_to_buy"),
					"thumb"=>$cover,
					"front"=>$front,
					"back"=>$back,
          "sizing_guide"=>$sizing_guide,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
					"category"=>$this->input->post("category"),
					"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
					"quantity"=>$this->input->post("quantity"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
					//"ptype"=>$this->input->post("type_product"),
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
          "padddate"=>date("d-m-Y"));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('fabric',$data))
					 {
             $this->session->set_flashdata('message', 'Product Updated successfully.');

					 	$pid=$this->db->get_where("fabric_search",array("product_id"=>$this->uri->segment(3)))->row();
					 	if(!empty($pid))
					 	{
					 		$search_data=array("product_id"=>$this->uri->segment(3),
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("fabric_search")));
					 	$this->db->where("product_id",$this->uri->segment(3));
					 	$this->db->update('fabric_search',$search_data);
						$msg="Category Updated Successfully.";
					 	}
					 	else
					 	{
					 	$insert_id = $this->uri->segment(3);
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("fabric_search")));
					 	$this->db->insert('fabric_search',$search_data);
						$msg="New Category Added Successfully.";

					 	}

					 }
					 else
					 {
						 $msg="Category Couldnot be Updated.";
					 }
					 redirect ("Product/add_fabric/".$this->uri->segment(3));

		  }

	  }
	  else
	  {


		  if($this->input->post("title")){


        $tax_price = $this->input->post("wholesale_price")*$this->input->post("tax")/100;
        $tax_price = round($this->input->post("wholesale_price")+$tax_price);

			$config['upload_path'] = './assets/images/fabrics/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="";$front="";$back="";$sizing_guide="";
			if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             $this->load->library('image_lib');

            $image_data =   $this->upload->data();
            $cover=$image_data['file_name'];
            //$cover_resize=$image_data['file_name'];
            $this->resize_image($image_data);


            //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
        }
          }
      }
      if(!empty($_FILES["front"]["name"])){

          if (!$this->upload->do_upload('front'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
              if($_POST['front_yes_no']!='no'){
          $pic = $this->upload->data();
          $front=$pic['file_name'];

           $this->resize_image($pic);

        }
          }
      }
      if(!empty($_FILES["back"]["name"])){

          if (!$this->upload->do_upload('back'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             if($_POST['back_yes_no']!='no'){
          $pic = $this->upload->data();
          $back=$pic['file_name'];
          $this->resize_image($pic);
        }
          }
      }
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
          $this->resize_image($pic);
          }
          }
      }
		   $data=array();
        $this->db->where("id",$this->uri->segment(3));

		 $data=array("title"=>$this->input->post("title"),
					"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "min_quan_to_buy"=>$this->input->post("min_quan_to_buy"),
					"thumb"=>$cover,
					"front"=>$front,
					"back"=>$back,
          "sizing_guide"=>$sizing_guide,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
					"category"=>$this->input->post("category"),
					"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
					"quantity"=>$this->input->post("quantity"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
					//"ptype"=>$this->input->post("type_product"),
     "category_for_filter"=>$this->input->post("fabric_main_cat"),
     "padddate"=>date("d-m-Y"));
					 if($this->db->insert('fabric',$data))
					 {
            $this->session->set_flashdata('message', 'Product Saved successfully.');

					 	$insert_id = $this->db->insert_id();
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("fabric_search")));
					 	$this->db->insert('fabric_search',$search_data);
						$msg="New Category Added Successfully.";
					 }
					 else
					 {
						 $msg="Category Couldnot be Added.";
					 }
					 redirect ("Product/add_fabric/".$insert_id);

		  }

	  }
		  $this->middle = 'admin/add_fabric'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }



  public function add_fabric_meta($edit=false)
  {
	  if($edit==true)
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('fabric',$data))
					 {
						$msg="Meta Updated Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Updated.";
					 }
					 redirect ("Product/add_fabric/".$this->uri->segment(3));
	  }
	  else
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					 if($this->db->insert('fabric',$data))
					 {
						$msg="New Meta Added Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Added.";
					 }
					 redirect ("Product/add_fabric");

	  }
		  $this->middle = 'admin/add_fabric'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

  public function add_uniform_meta($edit=false)
  {
	  if($edit==true)
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					$this->db->where("uniform_id",$this->uri->segment(3));
					 if($this->db->update('uniform',$data))
					 {
						$msg="Meta Updated Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Updated.";
					 }
					 redirect ("Product/add_uniform/".$this->uri->segment(3));
	  }
	  else
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					 if($this->db->insert('uniform',$data))
					 {
						$msg="New Meta Added Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Added.";
					 }
					 redirect ("Product/add_uniform");

	  }
		  $this->middle = 'admin/add_uniform_view'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }


public function add_acc_meta($edit=false)
  {
	  if($edit==true)
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					$this->db->where("acc_id",$this->uri->segment(3));
					 if($this->db->update('accessories',$data))
					 {
						$msg="Meta Updated Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Updated.";
					 }
					 redirect ("Product/add_accessories/".$this->uri->segment(3));
	  }
	  else
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					 if($this->db->insert('accessories',$data))
					 {
						$msg="New Meta Added Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Added.";
					 }
					 redirect ("Product/add_accessories");

	  }
		  $this->middle = 'admin/add_accessories'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

public function add_online_meta($edit=false)
  {
    if($edit==true)
    {
     $data=array("meta_title1"=>$this->input->post("meta_title1"),
          "meta_keyword"=>$this->input->post("meta_keyword"),
          "meta_description"=>$this->input->post("meta_description"),
          "google_analytics"=>$this->input->post("google_analytics"),
          "og_title"=>$this->input->post("og_title"),
          "og_description"=>$this->input->post("og_description"),
          "og_keyword"=>$this->input->post("og_keyword"),
          "og_locale"=>$this->input->post("og_locale"),
          "og_type"=>$this->input->post("og_type"),
          "og_site_name"=>$this->input->post("og_site_name"),
          "og_url"=>$this->input->post("og_url"),
          "og_image"=>$this->input->post("og_image"),
          "dc_source"=>$this->input->post("dc_source"),
          "dc_relation"=>$this->input->post("dc_relation"),
          "dc_title"=>$this->input->post("dc_title"),
          "dc_keywords"=>$this->input->post("dc_keywords"),
          "dc_subject"=>$this->input->post("dc_subject"),
          "dc_language"=>$this->input->post("dc_language"),
          "dc_description"=>$this->input->post("dc_description"));
          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('online_boutique',$data))
           {
            $msg="Meta Updated Successfully.";
           }
           else
           {
             $msg="Meta Couldnot be Updated.";
           }
           redirect ("Product/add_online/".$this->uri->segment(3));
    }
    else
    {
     $data=array("meta_title1"=>$this->input->post("meta_title1"),
          "meta_keyword"=>$this->input->post("meta_keyword"),
          "meta_description"=>$this->input->post("meta_description"),
          "google_analytics"=>$this->input->post("google_analytics"),
          "og_title"=>$this->input->post("og_title"),
          "og_description"=>$this->input->post("og_description"),
          "og_keyword"=>$this->input->post("og_keyword"),
          "og_locale"=>$this->input->post("og_locale"),
          "og_type"=>$this->input->post("og_type"),
          "og_site_name"=>$this->input->post("og_site_name"),
          "og_url"=>$this->input->post("og_url"),
          "og_image"=>$this->input->post("og_image"),
          "dc_source"=>$this->input->post("dc_source"),
          "dc_relation"=>$this->input->post("dc_relation"),
          "dc_title"=>$this->input->post("dc_title"),
          "dc_keywords"=>$this->input->post("dc_keywords"),
          "dc_subject"=>$this->input->post("dc_subject"),
          "dc_language"=>$this->input->post("dc_language"),
          "dc_description"=>$this->input->post("dc_description"));
           if($this->db->insert('online_boutique',$data))
           {
            $msg="New Meta Added Successfully.";
           }
           else
           {
             $msg="Meta Couldnot be Added.";
           }
           redirect ("Product/add_online");

    }
      $this->middle = 'admin/online_boutique'; // passing middle to function. change this for different views.
      $this->adminlayout();

  }


  public function ajax_compose_email()
  {
      $data['field_cat']=array();
      $this->load->view('admin/email',$data);
  }
   public function ajax_add_subcat_acc()
  {
      //echo $_POST['sub_id'];exit;
      $data['field_cat']=$this->db->get_where("accessories_subcategory",array("accessories_category_id"=>$_POST['sub_id']))->result_array();
     // echo "<pre>";print_r($data);exit;
      $this->load->view('admin/sub_category_acc_ajax',$data);
  }

  public function altration($edit=false){
	 if($edit==true)
	  {
		 // echo "sdf";exit;
	  	//print_r($_POST);
		 if($this->input->post("submit")){
		 	//echo "in";
			$config['upload_path'] = './assets/images/altration/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover=$this->input->post("altration");
			if(!empty($_FILES["altration"]["name"])){


					if (!$this->upload->do_upload('altration'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}
      else
      {
        $cover=$this->input->post("oldalt");
      }


		 $data=array(


					"image"=>$cover,

					"c_id"=>$this->input->post("category"),

					"subcategory"=>$this->input->post("subcategory"),

					"price"=>$this->input->post("price"));

					$this->db->where("alt_id",$this->uri->segment(3));

					 if($this->db->update('altration',$data))
					 {
						$msg=" Updated Successfully.";
					 }
					 else
					 {
						 $msg=" Couldnot be Updated.";
					 }
					 //redirect ("Product/altration/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("price")){

			$config['upload_path'] = './assets/images/altration/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="cover.jpg";$front="front.jpg";$back="back.jpg";
			if(!empty($_FILES["altration"]["name"])){


					if (!$this->upload->do_upload('altration'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}



		 $data=array(
					"image"=>$cover,


					"c_id"=>$this->input->post("category"),

					"subcategory"=>$this->input->post("subcategory"),

					"price"=>$this->input->post("price"));

					 if($this->db->insert('altration',$data))
					 {
						$msg="New Category Added Successfully.";
					 }
					 else
					 {
						 $msg="Category Couldnot be Added.";
					 }
					 redirect ("Product/altration");

		  }

	  }$data['admin']=array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/altration',$data,true);
     $this->adminlayout();
	//$this->db->delete('orders', array('userid' => $_POST['uid']));
	//$this->db->delete('order_items', array('userid' => $_POST['uid']));
  }


 public function manage_heading(){
   $tails=$this->db->get("main_heading");
   $data['totalu']=$tails->num_rows();
   $data['head']=$tails->result();
   $this->template['middle'] = $this->load->view ($this->middle = 'admin/manage_heading',$data,true);
     $this->adminlayout();
  }
   public function allreview(){
     $this->db->order_by('id','desc');
   $tails=$this->db->get("review");
   $data['totalu']=$tails->num_rows();
   $data['head']=$tails->result();
   $this->template['middle'] = $this->load->view ($this->middle = 'admin/review',$data,true);
     $this->adminlayout();
  }

  public function approve_vendor($id){
  $this->db->where('vid', $id);
  $this->db->update('vendor', array('approve_status' => 'yes'));
  redirect ("Product/vendors");
  }
  public function disapprove_vendor($id){
  $this->db->where('vid', $id);
  $this->db->update('vendor', array('approve_status' => 'no'));
  redirect ("Product/vendors");
  }


  public function heading_disable(){
//echo $_POST['sid'];
  $this->db->where('id', $_POST['sid']);
  $this->db->update('main_heading', array('status' => 'disable'));
  }
    public function review_disable(){
  $this->db->where('id', $_POST['sid']);
  if($this->db->update('review', array('status' => '0','seen'=>'1')))
  {
    echo "done";
  }

  }
      public function review_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('review', array('status' => '1','seen'=>'1'));
  }
  public function heading_enable(){
//echo $_POST['sid'];
  $this->db->where('id', $_POST['sid']);
  $this->db->update('main_heading', array('status' => 'enable'));
  }
  public function menu_enable(){
//echo $_POST['sid'];
  $this->db->where('id', $_POST['sid']);
  $this->db->update('add_link_menu', array('status_enable' => 'enable'));
  }
  public function menu_disable(){
//echo $_POST['sid'];
  $this->db->where('id', $_POST['sid']);
  $this->db->update('add_link_menu', array('status_enable' => 'disable'));
  }
   public function order_item_completed(){
  echo $_POST['oid'].$_POST['vid'];
  $this->db->where(array('oid'=>$_POST['oid'],'vendor_id'=>$_POST['vid']));
  $this->db->update('order_items', array('status' => 'completed','vendor_notification'=>1,'vendor_noti_date'=>date('Y-m-d')));
  }

     public function order_item_completed_tailor(){
  echo $_POST['sid'];
  $this->db->where('soid', $_POST['sid']);
  $this->db->update('tailor_assign', array('pstatus' => 'Completed'));
  $item = $this->db->get_where('tailor_assign', array('soid' => $_POST['sid']))->row();
  $this->db->where('id', $item->stid);
  $this->db->update('order_items', array('status' => 'Completed'));

  }

  public function clear_offer_fabric($id){
    $data = array("offer_type"=>'',"offer_price"=>'',"from_date"=>'',"to_date"=>'');
    $this->db->where('id', $id);
    $this->db->update('fabric', $data);
    redirect ("Product/add_fabric/".$id);
  }

  public function clear_offer_acc($id){
    $data = array("offer_type"=>'',"offer_price"=>'',"from_date"=>'',"to_date"=>'');
    $this->db->where('acc_id', $id);
    $this->db->update('accessories', $data);
    redirect ("Product/add_accessories/".$id);
  }

  public function clear_offer_online($id){
    $data = array("offer_type"=>'',"offer_price"=>'',"from_date"=>'',"to_date"=>'');
    $this->db->where('id', $id);
    $this->db->update('online_boutique', $data);
    redirect ("Product/add_online/".$id);
  }
  public function clear_offer_uni($id){
    $data = array("offer_type"=>'',"offer_price"=>'',"from_date"=>'',"to_date"=>'');
    $this->db->where('uniform_id', $id);
    $this->db->update('uniform', $data);
    redirect ("Product/add_uniform/".$id);
  }


public function add_accessories($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
      

      if($this->input->post("fabric_main_cat")!='')
      {
        $data=array("category_for_filter"=>$this->input->post("fabric_main_cat"));
        $this->db->where("acc_id",$this->uri->segment(3));
           $this->db->update('accessories',$data);
      }
		 if($this->input->post("main_category")){
			$config['upload_path'] = './assets/images/accessories/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover=$this->input->post("oldt");
			$front=$this->input->post("oldf");
			$back=$this->input->post("oldb");
      $sizing_guide=$this->input->post("olds");
			if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["front"]["name"])){

          if (!$this->upload->do_upload('front'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
              if($_POST['front_yes_no']!='no'){
          $pic = $this->upload->data();
          $front=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["back"]["name"])){

          if (!$this->upload->do_upload('back'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             if($_POST['back_yes_no']!='no'){
          $pic = $this->upload->data();
          $back=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
          $this->resize_image_acc($pic);
          }
          }
      }
       $tax_price = (($this->input->post("wholesale_price"))*($this->input->post("tax")))/100;
      $tax_price = round($this->input->post("wholesale_price")+$tax_price);
		 $data=array("main_category"=>$this->input->post("main_category"),
		 			"quantity"=>$this->input->post("quantity"),
		 			"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
					"brand"=>$this->input->post("brand"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
					"thumb"=>$cover,
					"front"=>$front,
					"back"=>$back,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
          "sizing_guide"=>$sizing_guide,
					"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "padddate"=>date("Y-m-d"));
					$this->db->where("acc_id",$this->uri->segment(3));
					 if($this->db->update('accessories',$data))
					 {
             $this->session->set_flashdata('message', 'Product Updated successfully.');
					 	$pid=$this->db->get_where("accessories_search",array("product_id"=>$this->uri->segment(3)))->row();
					 	if(!empty($pid))
					 	{
					 	$search_data=array("product_id"=>$this->uri->segment(3),
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("accessories_search")));
					 	$this->db->where("product_id",$this->uri->segment(3));
					 	$this->db->update('accessories_search',$search_data);
						$msg="Accessories Updated Successfully.";
						}
						else
						{
						$insert_id = $this->uri->segment(3);
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("accessories_search")));
					 	$this->db->insert('accessories_search',$search_data);
						$msg="New accessories Added Successfully.";

						}
					 }
					 else
					 {
						 $msg="Accessories Couldnot be Updated.";
					 }
					if($this->input->post('pagename')!=''){
            redirect ("Product/".$this->input->post('pagename')."/".$this->uri->segment(3));
          }
           redirect ("Product/add_accessories/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("main_category")){
         

			$config['upload_path'] = './assets/images/accessories/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="";$front="";$back="";$sizing_guide="";
			if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["front"]["name"])){

          if (!$this->upload->do_upload('front'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
              if($_POST['front_yes_no']!='no'){
          $pic = $this->upload->data();
          $front=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["back"]["name"])){

          if (!$this->upload->do_upload('back'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             if($_POST['back_yes_no']!='no'){
          $pic = $this->upload->data();
          $back=$pic['file_name'];
          $this->resize_image_acc($pic);
        }
          }
      }
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
          $this->resize_image_acc($pic);
          }
          }
      }
       $tax_price = (($this->input->post("wholesale_price"))*($this->input->post("tax")))/100;
      $tax_price = round($this->input->post("wholesale_price")+$tax_price);
		 $data=array("main_category"=>$this->input->post("main_category"),
		 			"quantity"=>$this->input->post("quantity"),
		 			"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
					"brand"=>$this->input->post("brand"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
					"thumb"=>$cover,
					"front"=>$front,
					"back"=>$back,
          "sizing_guide"=>$sizing_guide,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
					"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
          "padddate"=>date("Y-m-d"));
					 if($this->db->insert('accessories',$data))
					 {$this->session->set_flashdata('message', 'Product Saved successfully.');
					 	$insert_id = $this->db->insert_id();
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("accessories_search")));
					 	$this->db->insert('accessories_search',$search_data);
						$msg="New accessories Added Successfully.";
					 }
					 else
					 {
						 $msg="accessories Couldnot be Added.";
					 }
           /*if(isset($this->input->post('pagename'))){
             redirect ("Product/".$this->input->post('pagename')."/".$insert_id);
           }*/
					 redirect ("Product/add_accessories/".$insert_id);

		  }

	  }

		  $this->middle = 'admin/add_accessories'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }


  public function add_online($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("main_category")){
      $config['upload_path'] = './assets/images/online_boutique/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover=$this->input->post("oldt");
      $front=$this->input->post("oldf");
      $back=$this->input->post("oldb");
      $sizing_guide=$this->input->post("olds");
      if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["front"]["name"])){

          if (!$this->upload->do_upload('front'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
              if($_POST['front_yes_no']!='no'){
          $pic = $this->upload->data();
          $front=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["back"]["name"])){

          if (!$this->upload->do_upload('back'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             if($_POST['back_yes_no']!='no'){
          $pic = $this->upload->data();
          $back=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
           $this->resize_image_on($pic);
          }
          }
      }
      $tax_price = $this->input->post("wholesale_price")*$this->input->post("tax")/100;
       $tax_price = round($this->input->post("wholesale_price")+$tax_price);
     $data=array("main_category"=>$this->input->post("main_category"),
          "quantity"=>$this->input->post("quantity"),
          "sdesc"=>strip_tags($this->input->post("sdesc")),
          "ldesc"=>$this->input->post("ldesc"),
          "brand"=>$this->input->post("brand"),
          "url"=>$this->input->post("url"),
            "featured"=>$this->input->post("type_feature"),
          "special"=>$this->input->post("type_special"),
          "thumb"=>$cover,
          "front"=>$front,
          "back"=>$back,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
          "sizing_guide"=>$sizing_guide,
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "price"=>$tax_price,
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
          "padddate"=>date("Y-m-d")
          );
          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('online_boutique',$data))
           {
             $this->session->set_flashdata('message', 'Product Updated successfully.');
            $pid=$this->db->get_where("online_search",array("product_id"=>$this->uri->segment(3)))->row();
            if(!empty($pid))
            {
            $search_data=array("product_id"=>$this->uri->segment(3),
            "filter_subcategory_fcid"=>implode(",",$this->input->post("online_search")));
            $this->db->where("product_id",$this->uri->segment(3));
            $this->db->update('online_search',$search_data);
            $msg=" Updated Successfully.";
            }
            else
            {
            $insert_id = $this->uri->segment(3);
            $search_data=array("product_id"=>$insert_id,
            "filter_subcategory_fcid"=>implode(",",$this->input->post("online_search")));
            $this->db->insert('online_search',$search_data);
            $msg=" Added Successfully.";

            }
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           if($this->input->post('pagename')!='')
           {
             redirect ("Product/".$this->input->post('pagename')."/".$this->uri->segment(3));
           }
           redirect ("Product/add_online/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("main_category")){
      $config['upload_path'] = './assets/images/online_boutique/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover="";$front="";$back="";$sizing_guide="";
      if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
              if($_POST['fabricc_yes_no']!='no'){
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["front"]["name"])){

          if (!$this->upload->do_upload('front'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
              if($_POST['front_yes_no']!='no'){
          $pic = $this->upload->data();
          $front=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["back"]["name"])){

          if (!$this->upload->do_upload('back'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
             if($_POST['back_yes_no']!='no'){
          $pic = $this->upload->data();
          $back=$pic['file_name'];
           $this->resize_image_on($pic);
        }
          }
      }
      if(!empty($_FILES["sizing_guide"]["name"])){

          if (!$this->upload->do_upload('sizing_guide'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
            if($_POST['sizing_guide_yes_no']!='no'){
          $pic = $this->upload->data();
          $sizing_guide=$pic['file_name'];
           $this->resize_image_on($pic);
          }
          }
      }
      $tax_price = $this->input->post("wholesale_price")*$this->input->post("tax")/100;
       $tax_price = round($this->input->post("wholesale_price")+$tax_price);
     $data=array("main_category"=>$this->input->post("main_category"),
          "quantity"=>$this->input->post("quantity"),
          "sdesc"=>strip_tags($this->input->post("sdesc")),
          "ldesc"=>$this->input->post("ldesc"),
          "brand"=>$this->input->post("brand"),
          "featured"=>$this->input->post("type_feature"),
          "special"=>$this->input->post("type_special"),
          "thumb"=>$cover,
          "front"=>$front,
          "back"=>$back,
          "sizing_guide"=>$sizing_guide,
          "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
          "price_without_tax"=>$this->input->post("wholesale_price"),
          "price"=>$tax_price,
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
          "padddate"=>date("Y-m-d"));
           if($this->db->insert('online_boutique',$data))
           {
             $this->session->set_flashdata('message', 'Product Saved successfully.');
            $insert_id = $this->db->insert_id();
            $search_data=array("product_id"=>$insert_id,
            "filter_subcategory_fcid"=>implode(",",$this->input->post("online_search")));
            $this->db->insert('online_search',$search_data);
            $msg=" Added Successfully.";
           }
           else
           {
             $msg=" Couldnot be Added.";
           }
           redirect ("Product/add_online/".$insert_id);

      }

    }

      $this->middle = 'admin/online_boutique'; // passing middle to function. change this for different views.
      $this->adminlayout();

  }

   public function manage_footer($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("mobile")){
     $data=array("mobile"=>$this->input->post("mobile"),
          "coptwrite"=>$this->input->post("coptwrite"),
          "mailus_add"=>$this->input->post("mailus_add"),
          "about"=>$this->input->post("about"),
          "office_add"=>$this->input->post("office_add"));
          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('footer',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/manage_footer/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("mobile")){
       $data=array("mobile"=>$this->input->post("mobile"),
          "coptwrite"=>$this->input->post("coptwrite"),
          "mailus_add"=>$this->input->post("mailus_add"),
          "about"=>$this->input->post("about"),
          "office_add"=>$this->input->post("office_add"));
           if($this->db->insert('footer',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/manage_footer");

      }

    }

      $this->middle = 'admin/add_footer';
      $this->adminlayout();

  }

  public function manage_social($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("social_link")){
     $data=array("social_link"=>$this->input->post("social_link"),
        "category"=>$this->input->post("category"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('social',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/manage_social/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("social_link")){
       $data=array("social_link"=>$this->input->post("social_link"),
        "category"=>$this->input->post("category"));
           if($this->db->insert('social',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/manage_social");

      }

    }

      $this->middle = 'admin/add_social';
      $this->adminlayout();

  }


  public function add_mobiledarzi($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("heading")){
     $data=array("heading"=>$this->input->post("heading"),
        "link"=>$this->input->post("link"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('mobiledarzi',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_mobiledarzi/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("heading")){
       $data=array("heading"=>$this->input->post("heading"),
        "link"=>$this->input->post("link"));
           if($this->db->insert('mobiledarzi',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/add_mobiledarzi");

      }

    }

      $this->middle = 'admin/add_mobiledarzi';
      $this->adminlayout();

  }


   public function add_service_link($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("service_link_name")){
     $data=array("service_link_name"=>$this->input->post("service_link_name"),
        "service_link_address"=>$this->input->post("service_link_address"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('service_link',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_service_link/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("service_link_name")){
       $data=array("service_link_name"=>$this->input->post("service_link_name"),
        "service_link_address"=>$this->input->post("service_link_address"));
           if($this->db->insert('service_link',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/add_service_link");

      }

    }

      $this->middle = 'admin/add_service_link';
      $this->adminlayout();

  }

  public function add_customer_support_link($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("link_name")){
     $data=array("link_name"=>$this->input->post("link_name"),
        "link_address"=>$this->input->post("link_address"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('customer_support_link',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_customer_support_link/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("link_name")){
     $data=array("link_name"=>$this->input->post("link_name"),
        "link_address"=>$this->input->post("link_address"));
           if($this->db->insert('customer_support_link',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/add_customer_support_link");

      }

    }

      $this->middle = 'admin/add_customer_support_link';
      $this->adminlayout();

  }


   public function add_info_link($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("info_link_name")){
     $data=array("info_link_name"=>$this->input->post("info_link_name"),
        "info_link_address"=>$this->input->post("info_link_address"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('information_link',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_info_link/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("info_link_name")){
       $data=array("info_link_name"=>$this->input->post("info_link_name"),
        "info_link_address"=>$this->input->post("info_link_address"));
           if($this->db->insert('information_link',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/add_info_link");

      }

    }

      $this->middle = 'admin/add_info_link';
      $this->adminlayout();

  }


  public function add_link_menu($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("link_menu_name")){
     $data=array("link_menu_name"=>$this->input->post("link_menu_name"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('add_link_menu',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_link_menu/".$this->uri->segment(3));

      }

    }

      $this->middle = 'admin/add_link_menu';
      $this->adminlayout();

  }


  public function add_faq($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("question")){
     $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('faq',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/add_faq/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("question")){
       $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
           if($this->db->insert('faq',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/add_faq");

      }

    }

      $this->middle = 'admin/add_faq';
      $this->adminlayout();

  }

  public function vadd_faq($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("question")){
     $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
            $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('vendorfaq',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           redirect ("Product/vadd_faq/".$this->uri->segment(3));

      }

    }
    else
    {
      if($this->input->post("question")){
       $data=array("question"=>$this->input->post("question"),
        "answer"=>$this->input->post("answer"));
           if($this->db->insert('vendorfaq',$data))
           {
            $msg="Added Successfully.";
           }
           else
           {
             $msg="Couldnot be Added.";
           }
           redirect ("Product/vadd_faq");

      }

    }

      $this->middle = 'admin/vadd_faq';
      $this->adminlayout();

  }


   public function add_fabric_offer($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
          "from_date"=>$this->input->post("from_date"),
          "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('fabric',$data))
					 {
						$msg="fabric Offer Updated Successfully.";
					 }
					 else
					 {
						 $msg="fabric Offer Couldnot be Updated.";
					 }
					 redirect ("Product/add_fabric/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		   if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
            "from_date"=>$this->input->post("from_date"),
          "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));

					 if($this->db->insert('fabric',$data))
					 {
						$msg="New fabric Offer Added Successfully.";
					 }
					 else
					 {
						 $msg="fabric Offer Couldnot be Added.";
					 }
					 redirect ("Product/add_fabric");

		  }

	  }


		  $this->middle = 'admin/add_fabric';
		  $this->adminlayout();

  }


  public function add_acc_offer($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));
					$this->db->where("acc_id",$this->uri->segment(3));
					 if($this->db->update('accessories',$data))
					 {
						$msg="Accessories Offer Updated Successfully.";
					 }
					 else
					 {
						 $msg="Accessories Offer Couldnot be Updated.";
					 }
					 redirect ("Product/add_accessories/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		   if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));

					 if($this->db->insert('accessories',$data))
					 {
						$msg="New Accessories Offer Added Successfully.";
					 }
					 else
					 {
						 $msg="Accessories Offer Couldnot be Added.";
					 }
					 redirect ("Product/add_accessories");

		  }

	  }


		  $this->middle = 'admin/add_accessories';
		  $this->adminlayout();

  }

  public function add_online_offer($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("offer_price")){
     $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
          "offer_price"=>$this->input->post("offer_price"));
          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('online_boutique',$data))
           {
            $msg=" Offer Updated Successfully.";
           }
           else
           {
             $msg=" Offer Couldnot be Updated.";
           }
           redirect ("Product/add_online/".$this->uri->segment(3));

      }

    }
    else
    {
       if($this->input->post("offer_price")){
     $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
          "offer_price"=>$this->input->post("offer_price"));

           if($this->db->insert('online_boutique',$data))
           {
            $msg=" Offer Added Successfully.";
           }
           else
           {
             $msg=" Offer Couldnot be Added.";
           }
           redirect ("Product/add_online");

      }

    }


      $this->middle = 'admin/online_boutique';
      $this->adminlayout();

  }




   public function add_uniform_offer($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));
					$this->db->where("uniform_id",$this->uri->segment(3));
					 if($this->db->update('uniform',$data))
					 {
						$msg="uniform Offer Updated Successfully.";
					 }
					 else
					 {
						 $msg="uniform Offer Couldnot be Updated.";
					 }
					 redirect ("Product/add_uniform/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		   if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
      "from_date"=>$this->input->post("from_date"),
      "to_date"=>$this->input->post("to_date"),
		 			"offer_price"=>$this->input->post("offer_price"));

					 if($this->db->insert('uniform',$data))
					 {
						$msg="New uniform Offer Added Successfully.";
					 }
					 else
					 {
						 $msg="uniform Offer Couldnot be Added.";
					 }
					 redirect ("Product/add_uniform");

		  }

	  }


		  $this->middle = 'admin/add_uniform_view';
		  $this->adminlayout();

  }

    public function measurements(){
	$data['attr']=$this->db->get("measures")->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/measurements',$data,true);
    $this->adminlayout();
  }
    public function measurements_image(){
    $data['attr']=$this->db->get("measurement_image")->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/measurements_image',$data,true);
    $this->adminlayout();
  }

   public function add_measure($id=false)
  {


	 if($id==true)
	 {
		 $this->db->where("mid",$this->uri->segment(3));
		 $this->db->update("measures",array("measure"=>$this->input->post("attr_name"),"message"=>$this->input->post("message"),"cat"=>$this->input->post("cat")));
	 }
	 else
	 {
		// print_r($_POST);exit;

	  $chk=$this->db->get_where("measures",array("measure"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Measurement Already Exist for the category.";
	 }
	else{
	$this->db->insert("measures",array("measure"=>$this->input->post("attr_name"),"message"=>$this->input->post("message"),"cat"=>$this->input->post("cat")));

	}
	 }
	 redirect ("Product/measurements");

  }

     public function add_measure_image($id=false)
  {

    if($id==true)
    {

     if(!empty($_FILES["attr_image"]["name"])){
      $config['upload_path'] = './assets/images/measure_image/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover=$this->input->post("oldt");
      //echo $cover;
      if(!empty($_FILES["attr_image"]["name"])){
          echo "in name";

          if (!$this->upload->do_upload('attr_image'))
          {
          echo $this->upload->display_errors();
          }
        else
          {
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          }
      }

  $this->db->where("mid",$this->uri->segment(3));
     $this->db->update("measurement_image",array("measure_image"=>$cover,"cat"=>$this->input->post("cat")));


      }

    }
    else
    {//echo "in tffrue";
  //echo $_FILES["attr_image"];
      if(!empty($_FILES["attr_image"]["name"])){
//
//echo "in tffrue img";
      $config['upload_path'] = './assets/images/measure_image/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover="cover.jpg";
      if(!empty($_FILES["attr_image"]["name"])){
          echo "in name";

          if (!$this->upload->do_upload('attr_image'))
        {
          echo "fail";
          echo $this->upload->display_errors();
          }
          else
          {
            echo "pass";
        $pic = $this->upload->data();
        $cover=$pic['file_name'];
          }
    }
    else{

    }
      $chk=$this->db->get_where("measurement_image",array("cat"=>$this->input->post("cat")));

   if($chk->num_rows()>0)
   {
     $msg="Measurement Image Already Exist for the category.";
   }
  else{
  $this->db->insert("measurement_image",array("measure_image"=>$cover,"cat"=>$this->input->post("cat")));

      }
       }

    }

//    echo $this->db->last_query();

   /*if($id==true)
   {
     $this->db->where("mid",$this->uri->segment(3));
     $this->db->update("measurement_image",array("measure_image"=>$this->input->post("attr_image"),"cat"=>$this->input->post("cat")));
   }
   else
   {
    // print_r($_POST);exit;

    $chk=$this->db->get_where("measurement_image",array("measure_image"=>$this->input->post("attr_image"),"cat"=>$this->input->post("cat")));
   if($chk->num_rows()>0)
   {
     $msg="Measurement Already Exist for the category.";
   }
  else{
  $this->db->insert("measurement_image",array("measure_image"=>$this->input->post("attr_image"),"cat"=>$this->input->post("cat")));

  }
   }*/
   redirect ("Product/measurements_image");

  }


  public function more_services($edit=false)
  {
  	if($edit==true)
	  {
		 //echo "sdf";exit;
		 if($this->input->post("subcategory")){
			$config['upload_path'] = './assets/images/more_services/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover=$this->input->post("oldt");
			//echo $cover;die;
			if(!empty($_FILES["more_services"]["name"])){


					if (!$this->upload->do_upload('more_services'))
					{
					echo $this->upload->display_errors();
					}
				else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
          $this->resize_image_more_services($pic);
					}
			}
      $tax_price = (($this->input->post("price"))*($this->input->post("tax")))/100;
      $tax_price = $this->input->post("price")+$tax_price;
		  $data=array(
		 			"subcategory"=>$this->input->post("subcategory"),
		 			"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("price"),
          "Tax_Class"=>$this->input->post("tax"),
		 			"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
					"image"=>$cover);
		 // echo $data;exit;
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('more_services',$data))
					 {
            $this->session->set_flashdata('message', 'Product Updated successfully.');

					 	$pid=$this->db->get_where("more_services_search",array("product_id"=>$this->uri->segment(3)))->row();
					 	if(!empty($pid))
					 	{
						 	$search_data=array("product_id"=>$this->uri->segment(3),
						 	"filter_subcategory_fcid"=>implode(",",$this->input->post("more_services_search")));
						 	$this->db->where("product_id",$this->uri->segment(3));
						 	$this->db->update('more_services_search',$search_data);
							$msg="More Services Updated Successfully.";
						}
						else
						{

							$insert_id = $this->uri->segment(3);
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("more_services_search")));
					 	$this->db->insert('more_services_search',$search_data);
						$msg="New More Services Added Successfully.";

						}
					 }
					 else
					 {
						 $msg="More Services Couldnot be Updated.";
					 }
           if($this->input->post('pagename')!='')
           {
              redirect ("Product/".$this->input->post('pagename')."/".$this->uri->segment(3));
           }
					 redirect ("Product/more_services/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("subcategory")){
			$config['upload_path'] = './assets/images/more_services/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="cover.jpg";
			if(!empty($_FILES["more_services"]["name"])){

					if (!$this->upload->do_upload('more_services'))
				{
					echo $this->upload->display_errors();
					}
					else
					{
				$pic = $this->upload->data();
				$cover=$pic['file_name'];
        $this->resize_image_more_services($pic);
					}
		}
    $tax_price = (($this->input->post("price"))*($this->input->post("tax")))/100;
    $tax_price = $this->input->post("price")+$tax_price;
		 $data=array(
		 			"subcategory"=>$this->input->post("subcategory"),
          "price"=>$tax_price,
          "price_without_tax"=>$this->input->post("price"),
          "Tax_Class"=>$this->input->post("tax"),
		 			"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
					"image"=>$cover);

					 if($this->db->insert('more_services',$data))
					 {
            $this->session->set_flashdata('message', 'Product Saved successfully.');
					 	$insert_id = $this->db->insert_id();
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("more_services_search")));
					 	$this->db->insert('more_services_search',$search_data);
						$msg="New More Services Added Successfully.";
					 }
					 else
					 {
						 $msg="More Services Couldnot be Added.";
					 }
					 redirect ("Product/more_services/".$insert_id);

		  }

	  }


		  $this->middle = 'admin/more_services'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

   public function add_more_services_offer($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
		 			"offer_price"=>$this->input->post("offer_price"));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('more_services',$data))
					 {
						$msg="more_services Offer Updated Successfully.";
					 }
					 else
					 {
						 $msg="more_services Offer Couldnot be Updated.";
					 }
					 redirect ("Product/more_services/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		   if($this->input->post("offer_price")){
		 $data=array("offer_type"=>$this->input->post("offer_type"),
		 			"offer_price"=>$this->input->post("offer_price"));

					 if($this->db->insert('more_services',$data))
					 {
						$msg="New more_services Offer Added Successfully.";
					 }
					 else
					 {
						 $msg="more_services Offer Couldnot be Added.";
					 }
					 redirect ("Product/more_services");

		  }

	  }


		  $this->middle = 'admin/more_services';
		  $this->adminlayout();

  }

  public function add_more_services_city($edit=false)
  {
  	if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('more_services',$data))
					 {
						$msg="more_services Updated Successfully.";
					 }
					 else
					 {
						 $msg="more_services Couldnot be Updated.";
					 }
					 redirect ("Product/more_services/".$this->uri->segment(3));

		  }

	  }
	  else
	  {
		  if($this->input->post("country")){
		 $data=array("country"=>$this->input->post("country"),
		 			"state"=>$this->input->post("state"),
		 			"city"=>implode(",",$this->input->post("city")));
					 if($this->db->insert('more_services',$data))
					 {
						$msg="New more_services Added Successfully.";
					 }
					 else
					 {
						 $msg="more_services Couldnot be Added.";
					 }
					 redirect ("Product/more_services");

		  }

	  }


		  $this->middle = 'admin/more_services'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

  public function add_more_services_meta($edit=false)
  {
	  if($edit==true)
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('more_services',$data))
					 {
						$msg="Meta Updated Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Updated.";
					 }
					 redirect ("Product/more_services/".$this->uri->segment(3));
	  }
	  else
	  {
		 $data=array("meta_title1"=>$this->input->post("meta_title1"),
		 			"meta_keyword"=>$this->input->post("meta_keyword"),
					"meta_description"=>$this->input->post("meta_description"),
					"google_analytics"=>$this->input->post("google_analytics"),
					"og_title"=>$this->input->post("og_title"),
					"og_description"=>$this->input->post("og_description"),
					"og_keyword"=>$this->input->post("og_keyword"),
					"og_locale"=>$this->input->post("og_locale"),
					"og_type"=>$this->input->post("og_type"),
					"og_site_name"=>$this->input->post("og_site_name"),
					"og_url"=>$this->input->post("og_url"),
					"og_image"=>$this->input->post("og_image"),
					"dc_source"=>$this->input->post("dc_source"),
					"dc_relation"=>$this->input->post("dc_relation"),
					"dc_title"=>$this->input->post("dc_title"),
					"dc_keywords"=>$this->input->post("dc_keywords"),
					"dc_subject"=>$this->input->post("dc_subject"),
					"dc_language"=>$this->input->post("dc_language"),
					"dc_description"=>$this->input->post("dc_description"));
					 if($this->db->insert('more_services',$data))
					 {
						$msg="New Meta Added Successfully.";
					 }
					 else
					 {
						 $msg="Meta Couldnot be Added.";
					 }
					 redirect ("Product/more_services");

	  }
		  $this->middle = 'admin/more_services'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }


     public function Add_mcategory($edit=false){
		  if($edit==true)
		  {
			 //print_r($_POST);
		$cfile=$this->input->post("old");
    $config['upload_path'] = './assets/category/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('cfile'))
    {
       //echo "error".count;
    }
    else
    {
      $this->load->library('image_lib');

          $image_data =   $this->upload->data();
          $cfile=$image_data['file_name'];
          //$cover_resize=$image_data['file_name'];
          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/category/resize214_321', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  214,
            'height'          =>  321,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/category/resize261_391', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  261,
            'height'          =>  391,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $image_data['full_path'],
            'new_image'       =>  './assets/category/resize300_440', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  300,
            'height'          =>  500,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

  }

		/*if(!empty($_FILES["cfile"]["name"])){
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
		}*/

		 $data=array("mid"=>$this->input->post("mcat"),
	 			 "cat_name"=>$this->input->post("category"),
	 			 "cat_image"=>$cfile,
				 "stcost"=>$this->input->post("stcost"),
				 "short_des"=>$this->input->post("short_des"),
				 "mtitle"=>$this->input->post("tcategory"));
				 $this->db->where("cid",$this->uri->segment(4));
				 $this->db->where("mid",$this->uri->segment(3));
				 if($this->db->update('category',$data))
				 {
					// echo "yes";
					$msg="New Category Added Successfully.";
				 }
				 else
				 {
					// echo "no";
					 $msg="Category Couldnot be Added.";
				 }
				//exit;

		  }
	   else
	    {

	$chk=$this->db->get_where("category",array("mid"=>$this->input->post("mcat"),"cat_name"=>$this->input->post("category")));
		 if($chk->num_rows()>0)
		 {
			 $msg="Sub Category Already Exist";
		 }
		else
		{
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
	 			 "cat_image"=>$cfile,
				 "stcost"=>$this->input->post("stcost"),
				 "short_des"=>$this->input->post("short_des"),
				 "mtitle"=>$this->input->post("tcategory"));

				//print_r($data);
				// exit;

				 if($this->db->insert('category',$data))
				 {
					$msg="New Category Added Successfully.";
				 }
				 else
				 {
					 $msg="Category Couldnot be Added.";
				 }

	}

	    }
	  redirect("product/category");
  }


  public function add_more_services_category($edit=false)
  {
  	if($edit==true)
	  {
	  }
	  else
	  {
		  if($this->input->post("category")){
		 $data=array(
		 			"category"=>$this->input->post("category"));

					 if($this->db->insert('more_services_category',$data))
					 {
						$msg="New More Services Added Successfully.";
					 }
					 else
					 {
						 $msg="More Services Couldnot be Added.";
					 }
					 redirect ("Product/add_more_services_category");

		  }

	  }


		  $this->middle = 'admin/add_more_services_category'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }


  public function del_more_service(){

	$this->db->delete('more_services', array('id' => $_POST['sid']));
  }
  public function del_review(){

	$this->db->delete('review', array('id' => $_POST['sid']));
  }
  public function review_edit(){
if($_POST && isset($_POST['review'])){
  $data=array(
       "review"=>$this->input->post("review"),
     "subject"=>$this->input->post("heading"));
     $this->db->where('id',$this->input->post("id"));
     if($this->db->update('review',$data)){
     redirect(base_url().'/product/allreview');}
}else{
  $data['user'] = $this->db->get_where('review', array('id' => $this->uri->segment(3)))->row();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/review_edit',$data,true);
    $this->adminlayout();
}

  }
  public function del_birdal_appo(){

  $this->db->delete('user_appoinment', array('id' => $_POST['fid']));
  }

  public function del_order(){
    $this->db->where('oid',$_POST['fid']);
$this->db->update('orders', array('delete' => 1,'ostatus'=>'deleted'));
    $this->db->where('oid',$_POST['fid']);
$this->db->update('order_items', array('delete' => 1));
}
public function del_users(){

$this->db->delete('users', array('uid' => $_POST['fid']));
}
public function delete_order(){
$this->db->delete('orders', array('oid' => $this->uri->segment(3)));
$this->db->delete('order_items', array('oid' => $this->uri->segment(3)));
redirect(base_url().'product/pending_orders');
}
public function del_order_items(){

  $this->db->delete('order_items', array('oid' => $_POST['oid'],'vendor_id' => $_POST['vid']));
  }
  public function del_tailor_assign(){

  $this->db->delete('tailor_assign', array('soid' => $_POST['sid']));
  }
  public function del_order_items_admin(){

    $this->db->delete('order_items', array('oid' => $_POST['oid']));
    $num = $this->db->get_where('order_items', array('oid' => $_POST['oid']))->num_rows();
    if($num>0){

    }else{
      $this->db->delete('orders', array('oid' => $_POST['oid']));
    }
    }
   public function del_testi(){

	if($this->db->delete('testimonial', array('t_id' => $_POST['sid'])))
  {
    //echo "done";
  }
  }
   public function del_uniform(){
	$this->db->delete('uniform', array('uniform_id' => $_POST['fid']));
  }
  public function del_banner(){
$this->db->delete('banner', array('id' => $_POST['sid']));
  }
   public function del_bridal_banner(){
   //	echo "yes";
$this->db->delete('bridal_banner', array('bridal_banner_id' => $_POST['sid']));
  }
  public function del_notifyme(){
$this->db->delete('notifyme', array('id' => $_POST['sid']));

 }
  public function del_service(){
$this->db->delete('services', array('service_id' => $_POST['sid']));
  }
  public function del_uniformbanner()
  {
$this->db->delete('uniformbanner', array('id' => $_POST['uid']));
  }

   public function delshopbanner()
  {
$this->db->delete('shopbanner', array('id' => $_POST['sid']));
  }

   public function delonlinebanner()
  {
$this->db->delete('onlinebanner', array('id' => $_POST['sid']));
  }


  public function ajax_access_uniform()
  {
	  	if($_POST['sid']=="Accessories")
	  	{
	  		$this->load->view('admin/ajax_uniform');
	  	}
  }

  public function del_accessories(){
	$this->db->delete('accessories', array('acc_id' => $_POST['fid']));
  }

  public function del_online(){
  $this->db->delete('online_boutique', array('id' => $_POST['fid']));
  }

  public function del_fabric(){
	$this->db->delete('fabric', array('id' => $_POST['fid']));
  }


   public function del_blog(){
  $this->db->delete('blog', array('id' => $_POST['fid']));
  }
  public function brand_contant(){
  $this->db->delete('brand_contant', array('id' => $_POST['fid']));
  }
    public function about_brand_contant(){
  $this->db->delete('howitworks', array('id' => $_POST['fid']));
  }
   public function about_us_post(){
  $this->db->delete('team', array('id' => $_POST['fid']));
  echo $this->db->last_query();
  }
  public function howitworks_del(){
  $this->db->delete('howitworks', array('id' => $_POST['fid']));
  }

    public function table1_del(){
  $this->db->delete('shippingpage_table1', array('id' => $_POST['fid']));
  }
   public function cancel_return_del(){
  $this->db->delete('cancelfaq', array('id' => $_POST['fid']));
  }
     public function cancel_reason_del(){
  $this->db->delete('cancel_reasons', array('id' => $_POST['mid']));
  }
    public function return_reason_del(){
  $this->db->delete('return_reasons', array('id' => $_POST['mid']));
  }

     public function pay_del(){
  $this->db->delete('paymentfaq', array('id' => $_POST['fid']));
  }
    public function table2_del(){
  $this->db->delete('shippingpage_table2', array('id' => $_POST['fid']));
  }


  public function vendor_contant(){
  $this->db->delete('vendorhome', array('id' => $_POST['fid']));
  }
  public function measurment_table(){
  $this->db->delete('measurment_table', array('id' => $_POST['fid']));
  }
  public function del_brand_slide_image(){
  $this->db->delete('brand_slider', array('id' => $_POST['fid']));
  }
  public function del_vendor_slide_image(){
  $this->db->delete('vendor_home_slider', array('id' => $_POST['fid']));
  }
  public function del_social(){
  $this->db->delete('social', array('id' => $_POST['fid']));
  }

  public function del_faq(){
  $this->db->delete('faq', array('id' => $_POST['fid']));
  }
  public function vdel_faq(){
  $this->db->delete('vendorfaq', array('id' => $_POST['fid']));
  }





public function add_uniform($edit=false)
  {
	  if($edit==true)
	  {
		 // echo "sdf";exit;
		 if($this->input->post("uni_category")){
			$config['upload_path'] = './assets/images/uniform/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
       $cover=$this->input->post("oldt");$front=$this->input->post("oldf");$back=$this->input->post("oldb");
       $sizing_guide=$this->input->post("olds");
      if(!empty($_FILES["fabricc"]["name"])){


          if (!$this->upload->do_upload('fabricc'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          $this->resize_image_uni($pic);
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
           $this->resize_image_uni($pic);
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
           $this->resize_image_uni($pic);
          }
      }
       if(!empty($_FILES["sizing_guide"]["name"])){

           if (!$this->upload->do_upload('sizing_guide'))
           {
           echo $this->upload->display_errors();
           }
           else
           {
             if($_POST['sizing_guide_yes_no']!='no'){
           $pic = $this->upload->data();
           $sizing_guide=$pic['file_name'];
            $this->resize_image_uni($pic);
           }
           }
       }
      $tax_price = (($this->input->post("price"))*($this->input->post("tax")))/100;
      $tax_price = $this->input->post("price")+$tax_price;
		 $data=array("uni_category"=>$this->input->post("uni_category"),
					"school_name"=>$this->input->post("school_name"),
					"uniform_image"=>$cover,
          "front"=>$front,
          "back"=>$back,
          "sizing_guide"=>$sizing_guide,
					"quantity"=>$this->input->post("quantity"),
					"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
           "sku"=>$this->input->post("sku"),
            "category_for_filter"=>$this->input->post("fabric_main_cat"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
					"price"=>$tax_price,
          "price_without_tax"=>$this->input->post("price"),
          "padddate"=>date("Y-m-d"));
					 $this->db->where("uniform_id",$this->uri->segment(3));

					 if($this->db->update('uniform',$data))
					 {
             $this->session->set_flashdata('message', 'Product Updated successfully.');
					 	$pid=$this->db->get_where("uniform_search",array("product_id"=>$this->uri->segment(3)))->row();
					 	if(!empty($pid))
					 	{
						 	$search_data=array("product_id"=>$this->uri->segment(3),
						 	"filter_subcategory_fcid"=>implode(",",$this->input->post("uniform_search")));
						 	$this->db->where("product_id",$this->uri->segment(3));
						 	$this->db->update('uniform_search',$search_data);
							$msg="Uniform Update Successfully.";
						}
						else
						{
							$insert_id = $this->uri->segment(3);
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("uniform_search")));
					 	$this->db->insert('uniform_search',$search_data);
						$msg="New Uniform Added Successfully.";

						}
					 }
					 else
					 {
						 $msg="Uniform Couldnot be Updated.";
					 }
           if($this->input->post('pagename')!='')
           {
             redirect ("Product/".$this->input->post('pagename')."/".$this->uri->segment(3));
           }else{
					 redirect ("Product/add_uniform/".$this->uri->segment(3));
           }

		  }

	  }
	  else
	  {
		  if($this->input->post("uni_category")){
			$config['upload_path'] = './assets/images/uniform/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
       $cover="";$front="";$back="";$sizing_guide="";
 			if(!empty($_FILES["fabricc"]["name"])){


 					if (!$this->upload->do_upload('fabricc'))
 					{
 					echo $this->upload->display_errors();
 					}
 					else
 					{
 					$pic = $this->upload->data();
 					$cover=$pic['file_name'];
          $this->resize_image_uni($pic);
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
          $this->resize_image_uni($pic);
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
          $this->resize_image_uni($pic);
 					}
 			}
       if(!empty($_FILES["sizing_guide"]["name"])){

           if (!$this->upload->do_upload('sizing_guide'))
           {
           echo $this->upload->display_errors();
           }
           else
           {
             if($_POST['sizing_guide_yes_no']!='no'){
           $pic = $this->upload->data();
           $sizing_guide=$pic['file_name'];
           $this->resize_image_uni($pic);
           }
           }
       }
      $tax_price = (($this->input->post("price"))*($this->input->post("tax")))/100;
      $tax_price = $this->input->post("price")+$tax_price;
		 $data=array("uni_category"=>$this->input->post("uni_category"),
					"school_name"=>$this->input->post("school_name"),
					"uniform_image"=>$cover,
          "front"=>$front,
          "back"=>$back,
          "sizing_guide"=>$sizing_guide,
					"quantity"=>$this->input->post("quantity"),
					"sdesc"=>strip_tags($this->input->post("sdesc")),
					"ldesc"=>$this->input->post("ldesc"),
          "category_for_filter"=>$this->input->post("fabric_main_cat"),
           "sku"=>$this->input->post("sku"),
          "Tax_Class"=>$this->input->post("tax"),
          "Minimum_Quantity"=>$this->input->post("minimum"),
          "Subtract_Stock"=>$this->input->post("subtractstock"),
					"featured"=>$this->input->post("type_feature"),
					"special"=>$this->input->post("type_special"),
          "price_without_tax"=>$this->input->post("price"),
					"price"=>$tax_price,
          "padddate"=>date("Y-m-d"));
					 if($this->db->insert('uniform',$data))
					 {
             $this->session->set_flashdata('message', 'Product Saved successfully.');
					 	$insert_id = $this->db->insert_id();
					 	$search_data=array("product_id"=>$insert_id,
					 	"filter_subcategory_fcid"=>implode(",",$this->input->post("uniform_search")));
					 	$this->db->insert('uniform_search',$search_data);
						$msg="New Uniform Added Successfully.";
					 }
					 else
					 {
						 $msg="Uniform Couldnot be Added.";
					 }
					 redirect ("Product/add_uniform/".$insert_id);

		  }

	  }
		  $this->middle = 'admin/add_uniform_view'; // passing middle to function. change this for different views.
		  $this->adminlayout();

  }

    public function disapprove(){
    //echo 'kkk2222';
      //print_r($_POST);
    $pname = $this->input->post("pname");

    if($this->input->post("type")=='online_boutique'){
$redirect = base_url()."product/online_status/".$this->input->post("pid");
}else if($this->input->post("type")=='more_services'){
$redirect = base_url()."product/more_services_status_change/".$this->input->post("pid");
}else{
 $redirect = base_url()."product/".$this->input->post("type")."_status/".$this->input->post("pid");
}

      $data=array(
            "p_id"=>$this->input->post("pid"),
            "p_name"=>"$pname",
            "vendor_id"=>$this->input->post("vendorid"),
            "date"=>date("d-m-Y"),
            "type"=>$this->input->post("type"),
            "reason"=>$this->input->post("reason")
          );

    //  $select = $this->db->get_where('wishlist',array('p_id'=>$this->input->post("pid"),'p_name'=>"$pname",'user_id'=>$this->session->userdata("userid"),"type"=>$this->input->post("type")))->result();

              if($this->db->insert("disapprove",$data))
            {
              //echo $this->db->last_query();
if($this->input->post("type")=='fabrics'){
$this->db->where($this->input->post("id"), $this->input->post("pid"));
$this->db->update('fabric', array('status'=>'disapprovebyadmin'));
}else{
  $this->db->where($this->input->post("id"), $this->input->post("pid"));
$this->db->update($this->input->post("type"), array('status'=>'disapprovebyadmin'));
}


              $this->session->set_flashdata('disapprove', 'This Product is Disapproved');
              redirect ($redirect);
            }

            //echo $this->db->last_query();

  }


  public function main_category_del(){
  $this->db->delete('main_categories', array('id' => $_POST['fid']));

  }
  public function ship_del(){
  $this->db->delete('shipping_methods', array('id' => $_POST['mid']));

  }

  public function fcategory_del(){
	$this->db->delete('filter', array('fid' => $_POST['fid']));
	$this->db->delete('filter_subcategory', array('sub_category_id'=>$_POST['fid']));

  }
   public function tailor_del(){
	$this->db->delete('tailors', array('id' => $_POST['sid']));
  }
     public function vendor_del(){
	$this->db->delete('vendor', array('vid' => $_POST['sid']));
  }

  public function add_filter_cat(){
	  $data['filter']=$this->db->get("filter")->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/filter',$data,true);
      $this->adminlayout();
  }
  public function add_filter_maincategory(){
    $data['filter']=$this->db->get("main_categories")->result();
    $this->template['middle'] = $this->load->view ($this->middle = 'admin/filter_main_category',$data,true);
      $this->adminlayout();
  }

  public function Add_main_filter_category($edit=false){
    if($edit==true)
    {
    $data=array("name"=>$this->input->post("name"),
         "category"=>$this->input->post("category"));
         $this->db->where("id",$this->uri->segment(3));
         if($this->db->update('main_categories',$data))
         {
          $msg="Filter Added Successfully.";
         }
         else
         {
           $msg="Filter Couldnot be Added.";
         }
    }
    else
    {
   $data=array("name"=>$this->input->post("name"),
         "category"=>$this->input->post("category"));
         if($this->db->insert('main_categories',$data))
         {
          $msg="Filter Added Successfully.";
         }
         else
         {
           $msg="Filter Couldnot be Added.";
         }
  }
     redirect("product/add_filter_maincategory");

  }

  public function Add_filter_category($edit=false){
	  if($edit==true)
	  {
	 	$data=array("filter_main_category"=>$this->input->post("filter_main_category"),
	 			 "filter_category"=>$this->input->post("filter_category"));
				 $this->db->where("fid",$this->uri->segment(3));
				 if($this->db->update('filter',$data))
				 {
					$msg="Filter Added Successfully.";
				 }
				 else
				 {
					 $msg="Filter Couldnot be Added.";
				 }
	  }
	  else
	  {
	 $data=array("filter_main_category"=>$this->input->post("filter_main_category"),
	 			 "filter_category"=>$this->input->post("filter_category"));
				 if($this->db->insert('filter',$data))
				 {
					$msg="Filter Added Successfully.";
				 }
				 else
				 {
					 $msg="Filter Couldnot be Added.";
				 }
	}
	   redirect("product/add_filter_cat");

  }

  public function add_filter_subcat(){
	  $data['filter_sub']=$this->db->get("filter_subcategory")->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/filter_subcategory',$data,true);
      $this->adminlayout();
  }
  public function fsubcatdel_del(){
	$this->db->delete('filter_subcategory', array('fcid' => $_POST['fcid']));
  }

 public function Add_filter_subcategory($edit=false){
	  if($edit==true)
	  {
	 	$data=array("main_category_id"=>$this->input->post("main_category_id"),
	 			 "sub_category_id"=>$this->input->post("sub_category_id"),
	 			 "filter_name"=>$this->input->post("filter_name"));
				 $this->db->where("fcid",$this->uri->segment(3));
				 if($this->db->update('filter_subcategory',$data))
				 {
					$msg=" Update Successfully.";
				 }
				 else
				 {
					 $msg=" Couldnot be Added.";
				 }
	  }
	  else
	  {
	  		$main_category_id = $this->input->post("main_category_id");
	  		$sub_category_id = $this->input->post("sub_category_id");
	  		$filter_name = $this->input->post("filter_name");
	 			$data=array("main_category_id"=>$main_category_id,
			 			 "sub_category_id"=>$sub_category_id,
			 			 "filter_name"=>$filter_name);

	 			$check = $this->db->get_where("filter_subcategory",array("main_category_id"=>$main_category_id,"sub_category_id"=>$sub_category_id,"filter_name"=>$filter_name));

	 				$count_row = $check->num_rows();
	 				if ($count_row === 0)
	 					{
					        $this->db->insert('filter_subcategory',$data);
					    }
					    else
					    {
					    	$this->session->set_flashdata('message', 'This Filter Namr Already Exit !');
					       redirect("product/add_filter_subcat");
					    }

	}
	   redirect("product/add_filter_subcat");

  }


public function ajax_add_subcat_filter()
  {
      //echo $_POST['sub_id'];exit;
      $data['field_cat']=$this->db->get_where("filter",array("filter_main_category"=>$_POST['sub_id']))->result_array();
     //echo "<pre>";print_r($data);exit;
      $this->load->view('admin/sub_category_filter_ajax',$data);
  }


  public function add_city(){
	  $data['city']=$this->db->get("country_state_city")->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/city',$data,true);
      $this->adminlayout();
  }

  public function Add_city_insert($edit=false){
	  if($edit==true)
	  {
	 	$data=array("country_name"=>$this->input->post("country_name"),
	 			"state_name"=>$this->input->post("state_name"),
	 			"city_name"=>$this->input->post("city_name"));

				 $this->db->where("csc_id",$this->uri->segment(3));
				 if($this->db->update('country_state_city',$data))
				 {
					$msg="Country State City Added Successfully.";
				 }
				 else
				 {
					 $msg="Country State City Couldnot be Added.";
				 }
	  }
	  else
	  {
	 $data=array("country_name"=>$this->input->post("country_name"),
	 			"state_name"=>$this->input->post("state_name"),
	 			"city_name"=>$this->input->post("city_name"));
          $exist = $this->db->get_where('country_state_city',$data)->row();
				 if(empty($exist))
				 {
          $this->db->insert('country_state_city',$data);

           $this->session->set_flashdata('message', 'Country State City Added Successfully.');
				 }
				 else
				 {

           $this->session->set_flashdata('message', 'Country State City Already Exist.');
				 }
	}
	   redirect("product/add_city");

  }

  public function city_del(){
	$this->db->delete('country_state_city', array('csc_id' => $_POST['city_id']));
  }
  public function more_app_del(){
  $this->db->delete('more_services_appoinment', array('app_id' => $_POST['m_id']));
  }

   public function ajax_state()
  {
      //echo $_POST['sub_id'];exit;
      $data['field_cat']=$this->db->get_where("states",array("country_id"=>$_POST['sub_id']))->result_array();
     //echo "<pre>";print_r($data);exit;
      $this->load->view('admin/ajax_state_view',$data);
  }

  public function ajax_city()
  {
      //echo $_POST['sub_id'];exit;
      $data['city']=$this->db->get_where("cities",array("state_id"=>$_POST['city_id']))->result_array();
     //echo "<pre>";print_r($data);exit;
      $this->load->view('admin/city_ajax_view',$data);
  }

  public function all_uniform(){
    if($_POST){
      $this->db->order_by("uniform_id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("school_name LIKE '%$pname%'");
    }
    if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("uniform_id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid3 = $vid2[1];
    $this->db->where("vendor_id", $vid3);
  }
     if(!empty($pcate)){
    $this->db->where("uni_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("uniform",array("status"=>'approve'));

  $data['totalpro']=$all->num_rows();
  $data['uni']=$all->result();
  //echo $this->db->last_query();
}else{
  $this->db->order_by("uniform_id","desc");
	$all=$this->db->get_where("uniform",array('status'=>'approve'));
	$data['totalpro']=$all->num_rows();
	$data['uni']=$all->result();}
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_uniform_view',$data,true);
    $this->adminlayout();
  }

  public function all_accessories(){
     if($_POST){
      $this->db->order_by("acc_id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
    if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("acc_id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid3 = $vid2[1];
    $this->db->where("vendor_id", $vid3);
  }
     if(!empty($pcate)){
    $this->db->where("main_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }
  $all=$this->db->get_where("accessories",array("status"=>'approve'));

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{
     $this->db->order_by("acc_id","desc");
	$all=$this->db->get_where("accessories",array('status'=>'approve'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result();}
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_accessories_view',$data,true);
    $this->adminlayout();
  }

  public function onlines(){
    if($_POST){
     // print_r($_POST);
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];
      $pcate = $_POST['pcate'];
      $pquan = $_POST['pquan'];
      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }

      if(!empty($pname)){
    $this->db->where("brand LIKE '%$pname%'");
    }
    if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid3 = $vid2[1];
    $this->db->where("vendor_id", $vid3);
  }
     if(!empty($pcate)){
    $this->db->where("main_category LIKE '%$pcate%'");
    }
     if(!empty($pquan)){
    $this->db->where("quantity",$pquan);
  }




  $all=$this->db->get_where("online_boutique",array("status"=>'approve'));
     // die;


  //echo $this->db->last_query();

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}else{

     $this->db->order_by("id","desc");
  $all=$this->db->get_where("online_boutique",array("status"=>'approve'));
  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
}
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/all_online',$data,true);
    $this->adminlayout();
  }

  public function all_more_services(){
    if($_POST){
      $this->db->order_by("id","desc");
      $pname = $_POST['pname'];
      $pid = $_POST['pid'];
      $vname = $_POST['vname'];
      $vid = $_POST['vid'];

      $pdate = $_POST['pdate'];

      if(!empty($pdate)){
    $this->db->where("padddate LIKE '%$pdate%'");
    }


    if(!empty($pid)){
      $pid2 = explode('-', $pid);
      $pid = $pid2[1];
    $this->db->where("id LIKE '%$pid%'");
  }
   if(!empty($vname)){
    $this->db->where("vendor_name LIKE '%$vname%'");
  }
   if(!empty($vid)){
      $vid2 = explode('-', $vid);
      $vid3 = $vid2[1];
    $this->db->where("vendor_id", $vid3);
  }
  $this->db->order_by('id','desc');
  $all=$this->db->get_where("more_services",array("status"=>'approve'));

  $data['totalpro']=$all->num_rows();
  $data['fab']=$all->result();
  //echo $this->db->last_query();
}else{
$this->db->order_by('id','desc');
	$all=$this->db->get_where("more_services",array("status"=>'approve'));
	$data['totalpro']=$all->num_rows();
	$data['fab']=$all->result(); }
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_more_services_view',$data,true);
    $this->adminlayout();
  }

   public function manage_banner($edit=false)
  {
	   if($edit==true)
	  {
		 if($this->input->post("update")){
			$config['upload_path'] = './assets/images/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['overwrite']	= TRUE;
			 $this->upload->initialize($config);

			if(!empty($_FILES["banner_image"]["name"])){

					if (!$this->upload->do_upload('banner_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 			$data=array("banner_image"=>$cover);

					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('banner',$data))
					 {
						$msg="banner Updated Successfully.";
					 }
					 else
					 {
						 $msg="banner Couldnot be Updated.";
					 }
					 redirect ("Product/manage_banner/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("submit")){
			 // exit;
			$config['upload_path'] = './assets/images/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			if(!empty($_FILES["banner_image"]["name"])){

					if (!$this->upload->do_upload('banner_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array("banner_image"=>$cover);

					 if($this->db->insert('banner',$data))
					 {
						$msg="New banner image Added Successfully.";
					 }
					 else
					 {
						 $msg="banner image Couldnot be Added.";
					 }
					 redirect ("Product/manage_banner");

		  }


	  }
	  $this->middle = 'admin/manage_banner';
		  $this->adminlayout();
  }


  public function uniform_banner($edit=false)
  {
	   if($edit==true)
	  {
		 if($this->input->post("update")){
			$config['upload_path'] = './assets/images/uniformbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['overwrite']	= TRUE;
			 $this->upload->initialize($config);

			if(!empty($_FILES["banner_image"]["name"])){

					if (!$this->upload->do_upload('banner_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 			$data=array("banner_image"=>$cover);

					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('uniformbanner',$data))
					 {
						$msg="banner Updated Successfully.";
					 }
					 else
					 {
						 $msg="banner Couldnot be Updated.";
					 }
					 redirect ("Product/uniform_banner/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("submit")){
			 // exit;
			$config['upload_path'] = './assets/images/uniformbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 $this->upload->initialize($config);
			if(!empty($_FILES["banner_image"]["name"])){

					if (!$this->upload->do_upload('banner_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array("banner_image"=>$cover);

					 if($this->db->insert('uniformbanner',$data))
					 {
						$msg="New banner image Added Successfully.";
					 }
					 else
					 {
						 $msg="banner image Couldnot be Added.";
					 }
					redirect ("Product/uniform_banner");

		  }


	  }
	  $this->middle = 'admin/uniform_banner';
		  $this->adminlayout();
  }
 public function shopbanner($edit=false)
  {
	   if($edit==true)
	  {
		 if($this->input->post("update")){
			$config['upload_path'] = './assets/images/shopbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['overwrite']	= TRUE;
			 $this->upload->initialize($config);

			if(!empty($_FILES["shopbanner"]["name"])){

					if (!$this->upload->do_upload('shopbanner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 			$data=array("shopbanner"=>$cover);

					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('shopbanner',$data))
					 {
						$msg="banner Updated Successfully.";
					 }
					 else
					 {
						 $msg="banner Couldnot be Updated.";
					 }
					 redirect ("Product/shopbanner/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("submit")){
			 // exit;
			$config['upload_path'] = './assets/images/shopbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 $this->upload->initialize($config);
			if(!empty($_FILES["shopbanner"]["name"])){

					if (!$this->upload->do_upload('shopbanner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array("shopbanner"=>$cover);

					 if($this->db->insert('shopbanner',$data))
					 {
						$msg="New banner image Added Successfully.";
					 }
					 else
					 {
						 $msg="banner image Couldnot be Added.";
					 }
					redirect ("Product/shopbanner");

		  }


	  }
	  $this->middle = 'admin/shopbanner';
		  $this->adminlayout();
  }
//
   public function onlinebanner($edit=false)
  {
     if($edit==true)
    {
     if($this->input->post("update")){
      $config['upload_path'] = './assets/images/shopbanner/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
      $config['overwrite']  = TRUE;
       $this->upload->initialize($config);

      if(!empty($_FILES["shopbanner"]["name"])){

          if (!$this->upload->do_upload('shopbanner'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          }
      }


          $data=array("shopbanner"=>$cover);

          $this->db->where("id",$this->uri->segment(3));
           if($this->db->update('shopbanner',$data))
           {
            $msg="banner Updated Successfully.";
           }
           else
           {
             $msg="banner Couldnot be Updated.";
           }
           redirect ("Product/shopbanner/".$this->uri->segment(3));

      }

    }
    else
    {

      if($this->input->post("submit")){
       // exit;
      $config['upload_path'] = './assets/images/shopbanner/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
       $this->upload->initialize($config);
      if(!empty($_FILES["shopbanner"]["name"])){

          if (!$this->upload->do_upload('shopbanner'))
          {
          echo $this->upload->display_errors();
          }
          else
          {
          $pic = $this->upload->data();
          $cover=$pic['file_name'];
          }
      }


     $data=array("accessoriesbanner"=>$cover);

           if($this->db->insert('onlinebanner',$data))
           {
            $msg="New banner image Added Successfully.";
           }
           else
           {
             $msg="banner image Couldnot be Added.";
           }
          redirect ("Product/onlinebanner");

      }


    }
    $this->middle = 'admin/onlinebanner';
      $this->adminlayout();
  }
  //
  public function accessoriesbanner($edit=false)
  {
	   if($edit==true)
	  {
		 if($this->input->post("update")){
			$config['upload_path'] = './assets/images/accessoriesbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['overwrite']	= TRUE;
			 $this->upload->initialize($config);

			if(!empty($_FILES["accessoriesbanner"]["name"])){

					if (!$this->upload->do_upload('accessoriesbanner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 			$data=array("accessoriesbanner"=>$cover);

					$this->db->where("id",$this->uri->segment(3));
					 if($this->db->update('accessoriesbanner',$data))
					 {
						$msg="banner Updated Successfully.";
					 }
					 else
					 {
						 $msg="banner Couldnot be Updated.";
					 }
					 redirect ("Product/accessoriesbanner/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("submit")){
			 // exit;
			$config['upload_path'] = './assets/images/accessoriesbanner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 $this->upload->initialize($config);
			if(!empty($_FILES["accessoriesbanner"]["name"])){

					if (!$this->upload->do_upload('accessoriesbanner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array("accessoriesbanner"=>$cover);

					 if($this->db->insert('accessoriesbanner',$data))
					 {
						$msg="New banner image Added Successfully.";
					 }
					 else
					 {
						 $msg="banner image Couldnot be Added.";
					 }
					redirect ("Product/accessoriesbanner");

		  }


	  }
	  $this->middle = 'admin/accessoriesbanner';
		  $this->adminlayout();
  }

   public function all_uniform_image(){
	$all=$this->db->get("uniformbanner");
	$data['ban']=$all->num_rows();
	$data['ban']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_uniform_image',$data,true);
    $this->adminlayout();
  }

   public function allaccessoriesbanner(){
	$all=$this->db->get("accessoriesbanner");
	$data['ban']=$all->num_rows();
	$data['ban']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/allaccessoriesbanner',$data,true);
    $this->adminlayout();
  }
   public function allshopbanner(){
	$all=$this->db->get("shopbanner");
	$data['ban']=$all->num_rows();
	$data['ban']=$all->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/allshopbanner',$data,true);
    $this->adminlayout();
  }
  public function allonlinebanner(){
  $all=$this->db->get("onlinebanner");
  $data['ban']=$all->num_rows();
  $data['ban']=$all->result();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/allonlinebanner',$data,true);
    $this->adminlayout();
  }
   public function bridal_banner($edit=false)
  {
	   if($edit==true)
	  {
		 // echo $_POST;
		 if($this->input->post("update")){
			$config['upload_path'] = './assets/images/bridal-banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);

			if(!empty($_FILES["bridal_banner"]["name"])){
					if (!$this->upload->do_upload('bridal_banner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		      $data = array('bridal_banner'=>$cover);
					$this->db->where("bridal_banner_id",$this->uri->segment(3));
					 if($this->db->update('bridal_banner',$data))
					 {
						$msg="banner Updated Successfully.";
					 }
					 else
					 {
						 $msg="banner Couldnot be Updated.";
					 }
					 redirect ("Product/bridal_banner/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("submit")){
			 // exit;
			$config['upload_path'] = './assets/images/bridal-banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="cover.jpg";
			if(!empty($_FILES["bridal_banner"]["name"])){

					if (!$this->upload->do_upload('bridal_banner'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array("bridal_banner"=>$this->input->post("bridal_banner"),

					"bridal_banner"=>$cover);
					//print_r($data);
				//exit;

					 if($this->db->insert('bridal_banner',$data))
					 {
						$msg="New banner image Added Successfully.";
					 }
					 else
					 {
						 $msg="banner image Couldnot be Added.";
					 }
					 redirect ("Product/bridal_banner");

		  }


	  }
	  $data['admin']=array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/bridal_banner',$data,true);
    $this->adminlayout();
  }

    public function services($edit=false)
  {


	   if($edit==true)
	  {

		 // echo "sdf";exit;
		 if($this->input->post("title")){
//$cover=$this->input->post('service_image1');
			$config['upload_path'] = './assets/images/services/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover=$this->input->post("service_image1");
			if(!empty($_FILES["service_image"]["name"])){


					if (!$this->upload->do_upload('service_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}


		 $data=array(

					"service_image"=>$cover,

					"service_title"=>$this->input->post("title"),

					"service_description"=>$this->input->post("service_description"));



					$this->db->where("service_id",$this->uri->segment(3));

					 if($this->db->update('services',$data))
					 {
						$msg=" Updated Successfully.";
					 }
					 else
					 {
						 $msg=" Couldnot be Updated.";
					 }
					 redirect ("Product/services/".$this->uri->segment(3));

		  }

	  }
	  else
	  {

		  if($this->input->post("title")){


			$config['upload_path'] = './assets/images/services/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			 $this->upload->initialize($config);
			$cover="cover.jpg";;
			if(!empty($_FILES["service_image"]["name"])){


					if (!$this->upload->do_upload('service_image'))
					{
					echo $this->upload->display_errors();
					}
					else
					{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
					}
			}



		 $data=array(
					"service_image"=>$cover,

					"service_title"=>$this->input->post("title"),

					"service_description"=>$this->input->post("service_description"));

					 if($this->db->insert('services',$data))
					 {
						$msg="New Category Added Successfully.";
					 }
					 else
					 {
						 $msg="Category Couldnot be Added.";
					 }
					 redirect ("Product/services");

		  }
	  }

	  $data['admin']=array();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/services',$data,true);
    $this->adminlayout();
  }
    public function o_s_stitch($edit=false)
  {


     if($edit==true)
    {
      //print_r($_POST);
      //echo "sdf";exit;
     if($this->input->post("title")){
        $data=array(
          "title"=>$this->input->post("title"),
          "description"=>$this->input->post("description"),
          );

      $config['upload_path'] = './assets/images/services/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover=$this->input->post("service_image");
            $count = $this->db->get('mcategory')->result();
      foreach ($count as $value) {
        $cover[$value->mid]= $this->input->post("old_service_".$value->mcat_name);
        //echo " beforeupload".$cover[$value->mid]."kkk ";
      if(!empty($_FILES["service_".$value->mcat_name]["name"])){


          if (!$this->upload->do_upload('service_'.$value->mcat_name))
          {
          echo $this->upload->display_errors();
          }
          else
          {
          $pic = $this->upload->data();
          $cover[$value->mid]=$pic['file_name'];
          }
      }
      //echo "over";
       $data["$value->mcat_name"] = $cover[$value->mid];
}





          $this->db->where("service_id",$this->uri->segment(3));

           if($this->db->update('our_services',$data))
           {
            $msg=" Updated Successfully.";
           }
           else
           {
             $msg=" Couldnot be Updated.";
           }
           //redirect ("Product/o_s_stitch/".$this->uri->segment(3));

      }

    }
    else
    {

      if($this->input->post("title")){
          $data=array(
          "title"=>$this->input->post("title"),
          "description"=>$this->input->post("service_description"),
          "type"=>$this->input->post("type"));

      $config['upload_path'] = './assets/images/services/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);

      $count = $this->db->get('mcategory')->result();
      foreach ($count as $value) {
        $cover[$value->id]="cover.jpg";
      if(!empty($_FILES["service_".$value->mcat_name]["name"])){


          if (!$this->upload->do_upload('service_'.$value->mcat_name))
          {
          echo $this->upload->display_errors();
          }
          else
          {
          $pic = $this->upload->data();
          $cover[$value->id]=$pic['file_name'];
          }
      }
      $data["$value->mcat_name"] = $cover[$value->id];
}




     //print_r($data);


           if($this->db->insert('our_services',$data))
           {
            $msg="New Category Added Successfully.";
           }
           else
           {
             $msg="Category Couldnot be Added.";
           }
           echo $this->db->last_query();
           //redirect ("Product/o_s_stitch");

      }
    }
    $data['title']="Our Services Content";
    $data['data2'] = $this->db->get('our_services')->result();
    $data['admin']=array();
  $this->template['middle'] = $this->load->view ($this->middle = 'admin/our_services',$data,true);
    $this->adminlayout();
  }
  public function attributes()
  {

	$data['attr']=$this->db->get("attributes")->result();
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/attributes',$data,true);
    $this->adminlayout();
  }
   public function genrate_qr()
  {

	$data['prod_list']=$this->db->get("tailor_assign")->result_array();
	//print_r($data['prod_list']);exit;
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/genrateqr',$data,true);
    $this->adminlayout();
  }

  public function add_attr($id=false)
  {
	 if($id==true)
	 {
		 $this->db->where("aid",$this->uri->segment(3));
		 $this->db->update("attributes",array("attr_name"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	 }
	 else
	 {
	  $chk=$this->db->get_where("attributes",array("attr_name"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));
	 if($chk->num_rows()>0)
	 {
		 $msg="Category Already Exist";
	 }
	else{
	$this->db->insert("attributes",array("attr_name"=>$this->input->post("attr_name"),"cat"=>$this->input->post("cat")));

	}
	 }
	 redirect ("Product/attributes");
  }

  public function users_status_read($uid){
		$data=array('r_status' =>'yes');
		$this->db->where("uid",$uid);
        $this->db->update("users",$data);
       redirect(base_url('product/users'));
  }
   public function users(){
      $this->db->order_by('uid','desc');
	  $tu=$this->db->get("users");
	  $data['totalu']=$tu->num_rows();
	  $data['users']=$tu->result();
	  $this->template['middle'] = $this->load->view ($this->middle = 'admin/users',$data,true);
      $this->adminlayout();
  }
  public function styles($cat=false){
	  if($cat==true){
		   $fcat=$this->db->get_where("category",array("cid"=>$cat))->row();
	  }else{
	  $fcat=$this->db->get("category")->row();
	  }
	$data['attr']=$this->db->get_where("attributes",array("cat"=>$fcat->cid))->result();
  //print_r($data);
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/styles',$data,true);
    $this->adminlayout();
  }

   public function manage_coupons(){
	 $tails=$this->db->get("coupons");
	 //$data['totalu']=$tails->num_rows();
	 $data['coupons']=$tails->result();
	 $this->template['middle'] = $this->load->view ($this->middle = 'admin/coupons',$data,true);
     $this->adminlayout();
  }

  public function update_styles(){
  	$id = $this->uri->segment(3);
	$data['style_update']=$this->db->get_where("style",array("id"=>$id))->row_array();
	//print_r($data);die;
	$this->template['middle'] = $this->load->view ($this->middle = 'admin/update_styles',$data,true);
    $this->adminlayout();
  }

  public function update_style_id()
  {

          $this->load->library('form_validation');
          $this->form_validation->set_rules('style', 'style', 'trim');
          $this->form_validation->set_rules('sprice', 'sprice', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('msg', 'Please enter all information.');
          redirect(base_url('product/update_styles'));
        }
        $id = $this->input->post('hidden_id');
        if (!empty($_FILES['thumb_front']['name']))
        {
         	 $config['upload_path'] = './adminassets/styles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$this->upload->initialize($config);

            if ( ! $this->upload->do_upload('thumb_front'))
            {
                $this->session->set_flashdata('msg', 'Please upload correct image.');
                redirect(base_url('product/update_styles'));
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $datafoto=$this->upload->data();
                $thumb_front = $datafoto['file_name'];
                $this->resize_image_style($datafoto);
                $data = array(
                'style' => $this->input->post('style'),
                'sprice' => $this->input->post('sprice'),
                "description"=>$this->input->post('description'),
                'thumb_front' => $thumb_front
                );
            }
        }
        else
        {
          $thumb_front= $this->input->post('hidden_photo');
          $data = array(
                'style' => $this->input->post('style'),
                'sprice' => $this->input->post('sprice'),
                "description"=>$this->input->post('description'),
                'thumb_front' => $thumb_front
                );
        }
        $this->db->where("id",$id);
        $this->db->update("style",$data);

      redirect(base_url('product/styles/'.$this->uri->segment(3)));
  }

public function resize_image_style($pic)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './adminassets/styles/resized/large', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  800,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $pic['full_path'],
            'new_image'       =>  './adminassets/styles/resized/small', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  54,
            'height'          =>  74,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}

  public function add_style(){//
 // echo $_FILES["photo"]["name"];exit;
if(!isset($_POST['images_data']) && !empty($_FILES["photo"]["name"])){

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
  $this->resize_image_style($pic);
  //$type="image";
  }
  }
   $data=array("attr_id"=>$this->input->post('aid'),
	 			 "style"=>$this->input->post('stylename'),
				 "thumb_front"=>$file,
				 "sprice"=>$this->input->post('styleprice'),
         "description"=>$this->input->post('description'),
				 "front_id"=>$this->input->post('front_id'),
				 "sleeve_id"=>$this->input->post('sleeve_id'),

				"back_id"=>$this->input->post('back_id'));

				// print_r($data);//exit;
				 if($this->db->insert('style',$data))
				 {
					 ?><tr><td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $file;?>" />
                     </td><td><?php

                     	if($this->input->post('front_id')!=''){
                     		 $id = $this->input->post('front_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}else if($this->input->post('sleeve_id')!=''){
                     		 $id = $this->input->post('sleeve_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}else if($this->input->post('addon_id')!=''){
                     		 $id = $this->input->post('addon_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;

                     	}else if($this->input->post('back_id')!=''){
                     		 $id = $this->input->post('back_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}
                     ?></td><td><?php echo $this->input->post('stylename');?></td><td><?php echo $this->input->post('styleprice');?></td><td></td></tr><?php
					$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					$this->load->view('recent_post',$data);
				 }
				 else
				 {
					 //$this->load->view("signup");
				 }}
         else if(isset($_POST['back_id']) && isset($_POST['sleeve_id']) && isset($_POST['kurti_style'])){

          if(isset($_POST['old_image']))
          {
            foreach ($_POST['old_image'] as $value) {
              if(isset($_POST['images_data'])){
                $k=0;
              foreach ($_POST['images_data'] as $value2) {
                if($value==$value2)
                {
                  $k++;
                }else
                {

                }

                if($k==0)
                  {
                    $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>3,"id"=>$value))->row();
                  $data=array("attr_id"=>$this->input->post('aid'),

                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "sleeve_id"=>$this->input->post('sleeve_id')

               );
                  $q = $this->db->get_where('style',$data)->num_rows();
                if($q!=0)
                 {
                  $this->db->delete('style', $data);
                    }
                  }

              }
            }
              else{
                  $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>3,"id"=>$value))->row();
                  $data=array("attr_id"=>$this->input->post('aid'),

                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "sleeve_id"=>$this->input->post('sleeve_id')

               );
                  $q = $this->db->get_where('style',$data)->num_rows();
           if($q!=0)
           {
                  $this->db->delete('style', $data);
                    }
              }
            }
          }
          if(isset($_POST['images_data']))
          {
           foreach($_POST['images_data'] as $image_data)
           {
           $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>3,"id"=>$image_data))->row();
           ////


           ////
           //$data = array($styles_type);

           //print_r($styles_type);
           $data=array("attr_id"=>$this->input->post('aid'),
                  "style_id"=>$image_data,
                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "sleeve_id"=>$this->input->post('sleeve_id')

               );
           $q = $this->db->get_where('style',$data)->num_rows();
           if($q==0)
           {
                if($this->db->insert('style',$data))
				 {
					 ?><tr><td>


           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $styles_type->image;?>" />
                     </td><td><?php

                     	if($this->input->post('sleeve_id')!=''){
                     		 $id = $this->input->post('sleeve_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}
                     ?></td><td><?php echo $styles_type->name; ?></td>
                     <td><?php echo $styles_type->price;?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }}
         }}

       }else if(isset($_POST['back_id']) && isset($_POST['kurti_style'])){

         if(isset($_POST['old_image']))
          {
            foreach ($_POST['old_image'] as $value) {
              if(isset($_POST['images_data'])){
              $k=0;

              foreach ($_POST['images_data'] as $value2) {

                if($value==$value2)
                {
                    $k++;
                }
              }

              if($k==0){
                $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>2,"id"=>$value))->row();
                $data=array("attr_id"=>$this->input->post('aid'),
                  //"style_id"=>$value,
                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "back_id"=>$this->input->post('back_id')

               );
                 $q = $this->db->get_where('style',$data)->num_rows();
           if($q!=0)
           {
                  $this->db->delete('style', $data);
                }
                  }
            }else{

                  $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>2,"id"=>$value))->row();
                  $data=array("attr_id"=>$this->input->post('aid'),

                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "back_id"=>$this->input->post('back_id')

               );
                  $q = $this->db->get_where('style',$data)->num_rows();
           if($q!=0)
           {
                  $this->db->delete('style', $data);
                    }

            }}
          }
             if(isset($_POST['images_data'])){
           foreach($_POST['images_data'] as $image_data)
           {
           $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>2,"id"=>$image_data))->row();
           //$data = array($styles_type);
           //print_r($styles_type);
           $data=array("attr_id"=>$this->input->post('aid'),
            "style_id"=>$image_data,
                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "back_id"=>$this->input->post('back_id')
               );
            $q = $this->db->get_where('style',$data)->num_rows();
           if($q==0)
           {
               if($this->db->insert('style',$data))
				 {
					 ?><tr><td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $styles_type->image;?>" />
                     </td><td><?php

                     	if($this->input->post('back_id')!=''){
                     		 $id = $this->input->post('back_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();

                     		echo $styles_info[0]->style;
                     	}
                     ?></td><td><?php echo $styles_type->name;?></td><td><?php echo $styles_type->price;?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }
				}
         }}
         }
           else{
            if(isset($_POST['old_image']))
          {
            foreach ($_POST['old_image'] as $value) {
              if(isset($_POST['images_data'])){
              $k=0;
              foreach ($_POST['images_data'] as $value2) {

                if($value==$value2)
                {
                    $k++;
                }
              }
              if($k==0){
                                $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>1,"id"=>$value))->row();
                  $data=array("attr_id"=>$this->input->post('aid'),
                  //"style_id"=>$value,
                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "front_id"=>$this->input->post('kurti_style')

               );
            $q = $this->db->get_where('style',$data)->num_rows();
           if($q!=0)
           {
            echo "delete";
                  $this->db->delete('style', $data);
                  }
                  }
            }else{
                  $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>1,"id"=>$value))->row();
                  $data=array("attr_id"=>$this->input->post('aid'),

                "style"=>$styles_type->name,
                "thumb_front"=>$styles_type->image,
                "sprice"=>$styles_type->price,
                "front_id"=>$this->input->post('kurti_style')

               );
                  $q = $this->db->get_where('style',$data)->num_rows();
           if($q!=0)
           {
                  $this->db->delete('style', $data);
                    }
              }
            }
          }

          // print_r($_POST);
          if(isset($_POST['images_data'])){
           foreach($_POST['images_data'] as $image_data)
           {
           $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>1,"id"=>$image_data))->row();
           //$data = array($styles_type);
          // print_r($styles_type);
           $data=array("attr_id"=>$this->input->post('aid'),
                 "style_id"=>$image_data,
        	 			 "style"=>$styles_type->name,
        				 "thumb_front"=>$styles_type->image,
        				 "sprice"=>$styles_type->price,
        				 "front_id"=>$this->input->post('kurti_style')
               );
           $q = $this->db->get_where('style',$data)->num_rows();
           if($q==0)
           {
                if($this->db->insert('style',$data))
				 {
					 ?><tr><td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $styles_type->image;?>" />
                     </td><td><?php

                     	if($this->input->post('kurti_style')!=''){
                     		 $id = $this->input->post('kurti_style');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();

                     		echo $styles_info[0]->style;
                     	}
                     ?></td><td><?php echo $styles_type->name; ?></td><td><?php echo $styles_type->price;?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }
				}
         }}
}


  }

 /* public function add_style(){//
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
				 "sprice"=>$this->input->post('styleprice'),

				 "front_id"=>$this->input->post('front_id'),
				 "sleeve_id"=>$this->input->post('sleeve_id'),
				 "addon_id"=>$this->input->post('addon_id'),
				"back_id"=>$this->input->post('back_id'));

				 print_r($data);//exit;
				 if($this->db->insert('style',$data))
				 {
					 ?><tr><td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $file;?>" />
                     </td><td><?php

                     	if($this->input->post('front_id')!=''){
                     		 $id = $this->input->post('front_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}else if($this->input->post('sleeve_id')!=''){
                     		 $id = $this->input->post('sleeve_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}else if($this->input->post('addon_id')!=''){
                     		 $id = $this->input->post('addon_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;

                     	}else if($this->input->post('back_id')!=''){
                     		 $id = $this->input->post('back_id');
                     		$styles_info = $this->db->get_where("style",array("id"=>$id))->result();
                     		//print_r($styles_info);
                     		echo $styles_info[0]->style;
                     	}
                     ?></td><td><?php echo $this->input->post('stylename');?></td><td><?php echo $this->input->post('styleprice');?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }
				 else
				 {
					 //$this->load->view("signup");
				 }


  }*/
   public function mcategory_del(){
	$this->db->delete('mcategory', array('mid' => $_POST['mid']));
  }
  public function user_del(){
	$this->db->delete('users', array('uid' => $_POST['uid']));
  $user_orders = $this->db->get_where('orders', array('userid' => $_POST['uid']))->result();
  foreach ($user_orders as $value) {
    $this->db->delete('order_items', array('oid' => $value->oid));
  }
  $this->db->delete('orders', array('userid' => $_POST['uid']));
  }
  public function category_del(){
	$this->db->delete('category', array('cid' => $_POST['cid']));
  }
  public function attribute_del(){
	$this->db->delete('attributes', array('aid' => $_POST['aid']));
  }
  public function style_del(){

	$this->db->delete('style', array('id' => $_POST['sid']));
  }
    public function altration_del(){

	$this->db->delete('altration', array('alt_id' => $_POST['sid']));
  }
      public function allaccessoriesbanner_del(){

	$this->db->delete('accessoriesbanner', array('id' => $_POST['sid']));
  }
  public function style_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('style', array('status' => 'disable'));
  }
  public function style_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('style', array('status' => 'enable'));
  }
  public function service_link_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('service_link', array('status_enable' => 'enable'));
  }
  public function service_link_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('service_link', array('status_enable' => 'disable'));
  }


  public function customer_link_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('customer_support_link', array('status_enable' => 'enable'));
  }
  public function customer_link_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('customer_support_link', array('status_enable' => 'disable'));
  }

  public function info_link_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('information_link', array('status_enable' => 'enable'));
  }
  public function info_link_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('information_link', array('status_enable' => 'disable'));
  }
    public function services_disable(){
	$this->db->where('service_id', $_POST['sid']);
	$this->db->update('services', array('status' => 'disable'));
  }
  public function services_enable(){
	$this->db->where('service_id', $_POST['sid']);
	$this->db->update('services', array('status' => 'enable'));
  }
      public function more_services_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('more_services', array('status_enable' => 'disable'));
  }
  public function more_services_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('more_services', array('status_enable' => 'enable'));
  }
      public function addons_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('addons', array('status' => 'disable'));
  }
  public function addons_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('addons', array('status' => 'enable'));
  }
        public function uniformbanner_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('uniformbanner', array('status' => 'disable'));
  }
  public function uniformbanner_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('uniformbanner', array('status' => 'enable'));
  }
public function banner_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('banner', array('status' => 'disable'));
  }
  public function banner_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('banner', array('status' => 'enable'));
  }
  public function shopbanner_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('shopbanner', array('status' => 'disable'));
  }
  public function shopbanner_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('shopbanner', array('status' => 'enable'));
  }
    public function accessoriesbanner_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('accessoriesbanner', array('status' => 'disable'));
  }
  public function accessoriesbanner_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('accessoriesbanner', array('status' => 'enable'));
  }
      public function bridal_banner_disable(){
	$this->db->where('bridal_banner_id', $_POST['sid']);
	$this->db->update('bridal_banner', array('status' => 'disable'));
  }
  public function bridal_banner_enable(){
	$this->db->where('bridal_banner_id', $_POST['sid']);
	$this->db->update('bridal_banner', array('status' => 'enable'));
  }
        public function mcategory_disable(){
	$this->db->where('mid', $_POST['sid']);
	$this->db->update('mcategory', array('status' => 'disable'));
  }
  public function mcategory_enable(){
	$this->db->where('mid', $_POST['sid']);
	$this->db->update('mcategory', array('status' => 'enable'));
  }
          public function category_disable(){
	$this->db->where('cid', $_POST['sid']);
	$this->db->update('category', array('status' => 'disable'));
  }
  public function category_enable(){
	$this->db->where('cid', $_POST['sid']);
	$this->db->update('category', array('status' => 'enable'));
  }
            public function attribute_disable(){
	$this->db->where('aid', $_POST['sid']);
	$this->db->update('attributes', array('status' => 'disable'));
  }
  public function attribute_enable(){
	$this->db->where('aid', $_POST['sid']);
	$this->db->update('attributes', array('status' => 'enable'));
  }
              public function measure_disable(){
	$this->db->where('mid', $_POST['sid']);
	$this->db->update('measures', array('status' => 'disable'));
  }
  public function measure_enable(){
	$this->db->where('mid', $_POST['sid']);
	$this->db->update('measures', array('status' => 'enable'));
  }
     public function tailor_disable(){

	$this->db->where('id', $_POST['sid']);
	$this->db->update('tailors', array('status' => 'disable'));
  }
  public function tailor_enable(){

	$this->db->where('id', $_POST['sid']);
	$this->db->update('tailors', array('status' => 'enable'));
  }
     public function acc_disable(){

  $this->db->where('acc_id', $_POST['sid']);
  $this->db->update('accessories', array('status_enable' => 'disable'));
  }
  public function acc_enable(){

  $this->db->where('acc_id', $_POST['sid']);
  $this->db->update('accessories', array('status_enable' => 'enable'));
  }

  public function online_disable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('online_boutique', array('status_enable' => 'disable'));
  }
  public function online_enable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('online_boutique', array('status_enable' => 'enable'));
  }

   public function fabric_disable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('fabric', array('status_enable' => 'disable'));
  }
  public function blog_disable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('blog', array('status_enable' => 'disable'));
  }
  public function blog_enable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('blog', array('status_enable' => 'enable'));
  }

  public function fabric_enable(){

  $this->db->where('id', $_POST['sid']);
  $this->db->update('fabric', array('status_enable' => 'enable'));
  }
   public function uniform_enable(){

  $this->db->where('uniform_id', $_POST['sid']);
  $this->db->update('uniform', array('status_enable' => 'enable'));
  }
     public function uniform_disable(){

  $this->db->where('uniform_id', $_POST['sid']);
  $this->db->update('uniform', array('status_enable' => 'disable'));
  }
       public function vendor_disable(){
	$this->db->where('vid', $_POST['sid']);
	$this->db->update('vendor', array('status' => 'disable'));
  }
  public function vendor_enable(){
	$this->db->where('vid', $_POST['sid']);
	$this->db->update('vendor', array('status' => 'enable'));
  }
       public function user_detail_update(){
$data = array('name'=>$_POST['name'],
'DOB'=>$_POST['dob'],
'mobile'=>$_POST['mobile'],
'address'=>$_POST['address'],
'landmark'=>$_POST['land'],
'pincode'=>$_POST['pin'],
'r_contact'=>$_POST['r_contact'],
'r_email'=>$_POST['r_email'],
'question1'=>$_POST['q1'],
'question2'=>$_POST['q2'],
'question3'=>$_POST['q3'],
'question4'=>$_POST['q4'],
'question5'=>$_POST['q5'],
);
	$this->db->where('uid', $_POST['uid']);
	$this->db->update('users', $data);
  $this->session->set_flashdata('message', 'Sucessfully updated.');
  redirect(base_url().'product/user_account_details/'.$_POST['uid']);
  }
  public function user_disable(){

$this->db->where('uid', $_POST['sid']);
$this->db->update('users', array('status' => 'disable'));
}

  public function user_enable(){

	$this->db->where('uid', $_POST['sid']);
	$this->db->update('users', array('status' => 'enable'));
  }
         public function altration_disable(){
	$this->db->where('alt_id', $_POST['sid']);
	$this->db->update('altration', array('status' => 'disable'));
  }
  public function altration_enable(){
	$this->db->where('alt_id', $_POST['sid']);
	$this->db->update('altration', array('status' => 'enable'));
  }

           public function testimonial_disable(){
	$this->db->where('t_id', $_POST['sid']);
	$this->db->update('testimonial', array('status' => 'disable'));
  }
  public function testimonial_enable(){
	$this->db->where('t_id', $_POST['sid']);
	$this->db->update('testimonial', array('status' => 'enable'));
  }
  public function coupons_disable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('coupons', array('status' => 'disable'));
  }
  public function coupons_enable(){
	$this->db->where('id', $_POST['sid']);
	$this->db->update('coupons', array('status' => 'enable'));
  }
  public function footer_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('footer', array('status_enable' => 'enable'));
  }
  public function social_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('social', array('status_enable' => 'enable'));
  }

  public function link_menu_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('mobiledarzi', array('status_enable' => 'enable'));
  }



  public function faq_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('faq', array('status_enable' => 'enable'));
  }
  public function vfaq_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('vendorfaq', array('status_enable' => 'enable'));
  }

  public function footer_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('footer', array('status_enable' => 'disable'));
  }
  public function home_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('homepage', array('status' => 'disable'));
  }
  public function home_enable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('homepage', array('status' => 'enable'));
  }

  public function faq_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('faq', array('status_enable' => 'disable'));
  }
  public function vfaq_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('vendorfaq', array('status_enable' => 'disable'));
  }
  public function social_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('social', array('status_enable' => 'disable'));
  }
  public function link_menu_disable(){
  $this->db->where('id', $_POST['sid']);
  $this->db->update('mobiledarzi', array('status_enable' => 'disable'));
  }
  public function update_heading($id){
    $data = array("heading_name"=>$this->input->post('heading_name'));
  $this->db->where('id', $id);
  $this->db->update('main_heading', $data);
  redirect ("Product/manage_heading");
  }
   public function style_del_img(){

   	$data = array(
               'thumb_front' => ''

            );

$this->db->where('id', $_POST['sid']);
$this->db->update('style', $data);


	//$this->db->delete('style', array('id' => $_POST['sid']));
  }
   public function prestyle_del(){
	$this->db->delete('predesign', array('id' => $_POST['sid']));
  }
  public function measure_del(){
  	//echo $_POST['mid'];
	$this->db->delete('measures', array('mid' => $_POST['mid']));
  }
  public function measure_img_del(){
    //echo $_POST['mid'];
  $this->db->delete('measurement_image', array('mid' => $_POST['mid']));
  }
    public function coupon_del(){
  	//echo $_POST['mid'];
	$this->db->delete('coupons', array('id' => $_POST['sid']));
  }

  public function ostatus_change(){

  $this->db->where('oid', $_POST['qr_code']);
  $this->db->update('orders', array('ostatus' => $_POST['ostatus']));
  redirect ("Product/stitching_order_detail/".$_POST['qr_code']);
  }

   public function add_predefined(){//
  // print_r($_POST);exit;
 // echo $_FILES["photo"]["name"];exit;

	 	$file="";$file1="";
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
		$file=$pic['file_name'];
    $this->resize_image_style($pic);
		}
		/*if (!$this->upload->do_upload('photo1'))
		{
		echo $this->upload->display_errors();
		}
		else
		{
		$pic = $this->upload->data();
		$file1=$pic['file_name'];
		    $this->resize_image_style($pic);
    }*/
		}


	 $data=array("catid"=>$this->input->post('aid'),
	 			 "dname"=>$this->input->post('stylename'),
				 "dfront"=>$file,//"dback"=>$file1,
				 "dprice"=>$this->input->post('styleprice'));

				// print_r($data);//exit;
				 if($this->db->insert('predesign',$data))
				 {
					 ?><tr><td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $file;?>" />
                     </td>
                     <!--td>
           <img class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/"<?php echo $file1;?> />
                     </td-->
                     <td><?php echo $this->input->post('stylename');?></td><td><?php echo $this->input->post('styleprice');?></td><td></td></tr><?php
					//$data['post']=$this->db->get_where("timeline",array("postid"=>$this->db->insert_id()))->row();
					//$this->load->view('recent_post',$data);
				 }
				 else
				 {
					 //$this->load->view("signup");
				 }


  }
  public function add_blog_content($edit=false)
  {
    
     // echo "sdf";exit;
     if($this->input->post("blog_heading")){
   
     $data=array("heading1"=>$this->input->post("blog_heading"),
          "page_desc"=>$this->input->post("page_desc")
        );
          $this->db->where("page_title",'blog');
           $this->db->update('tbl_pages',$data);
           redirect ("Product/view_blog/");
      }

    
  }
  public function add_blog($edit=false)
  {
    if($edit==true)
    {
     // echo "sdf";exit;
     if($this->input->post("heading")){
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover=$this->input->post("oldt");
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
     $data=array("heading"=>$this->input->post("heading"),
          "pdate"=>$this->input->post("pdate"),
          "thumb"=>$cover,
          "pby"=>$this->input->post("pby"),
          "ldesc"=>$this->input->post("ldesc"));
          $this->db->where("id",$this->uri->segment(3));
           $this->db->update('blog',$data);
           redirect ("Product/add_blog/".$this->uri->segment(3));
      }

    }
    else
    {
      if($this->input->post("heading")){
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '1000000';
       $this->upload->initialize($config);
      $cover="cover.jpg";
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

          $data=array("heading"=>$this->input->post("heading"),
          "pdate"=>$this->input->post("pdate"),
          "thumb"=>$cover,
          "pby"=>$this->input->post("pby"),
          "ldesc"=>$this->input->post("ldesc"));
           $this->db->insert('blog',$data);
           redirect ("Product/add_blog/");

      }

    }
      $this->middle = 'admin/add_blog'; // passing middle to function. change this for different views.
      $this->adminlayout();

  }


  // Job Career
		public function addjobcat()
		{
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/addjobcat');
		}
		public function  addjcat()
		{
			$data=array(
						"cat_name"=>$this->input->post("cat_name"));
			$this->db->insert("tbl_careercategory",$data);

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/addjobcat');
		}
		public function  editjcat()
		{
			$data =  $this->uri->segment(3);

			$data1 = array("cat_name"=> $this->input->post("cat_name"));
			$this->db->where('cat_id', $data);
			$this->db->update('tbl_careercategory', $data1);

			redirect("product/all_category");
		}
	    public function del_jcat()
	    {
			if($this->db->delete('tbl_careercategory', array('cat_id' => $_POST['sid'])))
	  		{
				//echo "done";
	  		}
	    }
		public function all_category()
		{
			$allcats = $this->db->get_where("tbl_careercategory");
			$data['cats'] = $allcats->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/all_category',$data);
		}

		public function addjobs()
		{
			$allcats = $this->db->get_where("tbl_careercategory");
			$data['cats'] = $allcats->result();

			$allstates = $this->db->get_where("states where country_id =  '101'");
			$data['states'] = $allstates->result();

			

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/addjobs',$data);
		}
		public function  addvacancy()
		{
			$data=array(
						"job_title"=>$this->input->post("job_title"),
						'cat_id' => $this->input->post("cat_id"),
						'job_desc' => $this->input->post("job_desc"),
						'job_type' => $this->input->post("job_type"),
						'state_id' =>$this->input->post("state_id"),
						'city_id' =>$this->input->post("city_name"),
						'expire_date' =>$this->input->post("expire_date"));
			$this->db->insert("tbl_vacancy",$data);

			redirect("product/addjobs");
		}
		public function editvacancy()
		{
			$data =  $this->uri->segment(3);

			$data1 = array("job_title"=> $this->input->post("job_title"),
										"job_desc" => $this->input->post("job_desc"),
										'job_type' => $this->input->post("job_type"),
										"cat_id" => $this->input->post("cat_id"),
										"state_id" => $this->input->post("state_id"),
										"city_id" => $this->input->post("city_name"),
										'expire_date' =>$this->input->post("expire_date"));
			$this->db->where('vac_id', $data);
			$this->db->update('tbl_vacancy', $data1);

			redirect("product/alljobs");
		}

    public function contactupdate()
		{
      //print_r($_POST);die;
			//$data =  $this->uri->segment(3);
			$data1 = array("phone"=> $this->input->post("phone"),
										"ca" => $this->input->post("ca"),
										'cr' => $this->input->post("cr"),
										"coacc" => $this->input->post("coacc")
										);
			$this->db->where('id', 1);
			$this->db->update('contactus', $data1);

		redirect("product/contact");
		}


	    public function del_jobs()
	    {
			if($this->db->delete('tbl_vacancy', array('vac_id' => $_POST['sid'])))
	  		{
				//echo "done";
	  		}
	    }

		public function alljobs()
	    {
			$this->db->join('tbl_careercategory', 'tbl_vacancy.cat_id = tbl_careercategory.cat_id');
			$this->db->join('states', 'tbl_vacancy.state_id = states.id');
			$this->db->join('cities', 'tbl_vacancy.city_id = cities.id');

			$allvac = $this->db->get_where("tbl_vacancy");
			$data['vacancy'] = $allvac->result();

			$allstates = $this->db->get_where("states where country_id =  '101'");
			$data['states'] = $allstates->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/alljobs',$data);
		}

// Manage CMS
		public function aboutus()
	    {
			/*$abouttext = $this->db->get_where("tbl_pages where page_id =  '1'");
			$data['abttext'] = $abouttext->result();*/

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/aboutus',$data);
		}
    public function contact()
	    {
			$abouttext = $this->db->get_where("contact");
			$data['abttext'] = $abouttext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/contact',$data);
		}
    public function brands()
	    {

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/brands');
		}
    public function measurementinfo()
      {
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/measurementinfo');
    }
    public function tellyourfriend()
      {
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/tellyourfriend');
    }
    public function vendorhome()
      {

      $this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/vendorhome');
    }
    public function howitworks()
	    {

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/howitworks');
		}
    public function trackorder()
      {
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/track');
    }
    public function measurementguide()
      {
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
      $this->template['middle'] = $this->load->view ($this->middle = 'admin/measurementguide');
    }
		public function aboutusupdate()
	    {
			$data1 = array("page_title"=> $this->input->post("page_title"),
										"page_desc" =>  $this->input->post("page_desc"));
			$this->db->where('page_id', "1");
			$this->db->update('tbl_pages', $data1);

			redirect("product/aboutus");
		}

		public function termsandcondition()
	    {
			$abouttext = $this->db->get_where("tbl_pages where page_id =  '2'");
			$data['termstext'] = $abouttext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/termsandcondition',$data);
		}
		public function termsupdate()
	    {
			$data1 = array("page_title"=> $this->input->post("page_title"),
										"page_desc" =>  $this->input->post("page_desc"));
			$this->db->where('page_id', "2");
			$this->db->update('tbl_pages', $data1);

			redirect("product/termsandcondition");
		}
    public function tailor_termsupdate()
      {

      $data1 = array("content" =>  $this->input->post("page_desc"));
      $this->db->where('id', "3");
      $this->db->update('tailor_terms_condition', $data1);

      redirect("product/termsandcondition");
    }

		public function privacypolicy()
	    {
			$abouttext = $this->db->get_where("tbl_pages where page_id =  '3'");
			$data['privacytext'] = $abouttext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/privacypolicy',$data);
		}
		public function privacyupdate()
	    {
			$data1 = array("page_title"=> $this->input->post("page_title"),
										"page_desc" =>  $this->input->post("page_desc"));
			$this->db->where('page_id', "3");
			$this->db->update('tbl_pages', $data1);

			redirect("product/privacypolicy");
		}

		public function donate()
	    {
			$abouttext = $this->db->get_where("tbl_donate");
			$data['donatetext'] = $abouttext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/donate',$data);
		}
		public function donateupdate()
	    {
			// Banner Image
			$extimg = $this->input->post("userimage");
			$img = $this->input->post("userfile");
			if($img == ''){ $cover = $extimg;}else{$cover = $img;}
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000000';
			$this->upload->initialize($config);
			if(!empty($_FILES["userfile"]["name"]))
			{
				if (!$this->upload->do_upload('userfile'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic = $this->upload->data();
					$cover=$pic['file_name'];
				}
			}

$extimg_b = $this->input->post("userimage_b");
			$img_b = $this->input->post("userfile_b");
			if($img_b == ''){ $cover_b = $extimg_b;}else{$cover_b = $img_b;}
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000000';
			$this->upload->initialize($config);
			if(!empty($_FILES["userfile_b"]["name"]))
			{
				if (!$this->upload->do_upload('userfile_b'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic_b = $this->upload->data();
					$cover_b=$pic_b['file_name'];
				}
			}

			// Charity Logo
			$extimg1 = $this->input->post("userimage1");
			$img1 = $this->input->post("userfile1");
			if($img1 == ''){ $cover1 = $extimg1;}else{$cover1 = $img1;}
			$config1['upload_path'] = './assets/images/';
			$config1['allowed_types'] = 'gif|jpg|png|jpeg';
			$config1['max_size'] = '1000000';
			$this->upload->initialize($config1);
			if(!empty($_FILES["userfile1"]["name"]))
			{
				if (!$this->upload->do_upload('userfile1'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic1 = $this->upload->data();
					$cover1=$pic1['file_name'];
				}
			}

			$extimg2 = $this->input->post("userimage2");
			$img2 = $this->input->post("userfile2");
			if($img2 == ''){ $cover2 = $extimg2;}else{$cover2 = $img2;}
			$config2['upload_path'] = './assets/images/';
			$config2['allowed_types'] = 'gif|jpg|png|jpeg';
			$config2['max_size'] = '1000000';
			$this->upload->initialize($config2);
			if(!empty($_FILES["userfile2"]["name"]))
			{
				if (!$this->upload->do_upload('userfile2'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic2 = $this->upload->data();
					$cover2=$pic2['file_name'];
				}
			}

			$extimg3 = $this->input->post("userimage3");
			$img3 = $this->input->post("userfile3");
			if($img3 == ''){ $cover3 = $extimg3;}else{$cover3 = $img3;}
			$config3['upload_path'] = './assets/images/';
			$config3['allowed_types'] = 'gif|jpg|png|jpeg';
			$config3['max_size'] = '1000000';
			$this->upload->initialize($config3);
			if(!empty($_FILES["userfile3"]["name"]))
			{
				if (!$this->upload->do_upload('userfile3'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic3 = $this->upload->data();
					$cover3=$pic3['file_name'];
				}
			}

			$extimg4 = $this->input->post("userimage4");
			$img4 = $this->input->post("userfile4");
			if($img4 == ''){ $cover4 = $extimg4;}else{$cover4 = $img4;}
			$config4['upload_path'] = './assets/images/';
			$config4['allowed_types'] = 'gif|jpg|png|jpeg';
			$config4['max_size'] = '1000000';
			$this->upload->initialize($config4);
			if(!empty($_FILES["userfile4"]["name"]))
			{
				if (!$this->upload->do_upload('userfile4'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic4 = $this->upload->data();
					$cover4=$pic4['file_name'];
				}
			}


			$extimg5 = $this->input->post("userimage5");
			$img5 = $this->input->post("userfile5");
			if($img5 == ''){ $cover5 = $extimg5;}else{$cover5 = $img5;}
			$config5['upload_path'] = './assets/images/';
			$config5['allowed_types'] = 'gif|jpg|png|jpeg';
			$config5['max_size'] = '1000000';
			$this->upload->initialize($config5);
			if(!empty($_FILES["userfile5"]["name"]))
			{
				if (!$this->upload->do_upload('userfile5'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic5 = $this->upload->data();
					$cover5=$pic5['file_name'];
				}
			}

			$extimg6 = $this->input->post("userimage6");
			$img6 = $this->input->post("userfile6");
			if($img6 == ''){ $cover6 = $extimg6;}else{$cover6 = $img6;}
			$config6['upload_path'] = './assets/images/';
			$config6['allowed_types'] = 'gif|jpg|png|jpeg';
			$config6['max_size'] = '1000000';
			$this->upload->initialize($config6);
			if(!empty($_FILES["userfile6"]["name"]))
			{
				if (!$this->upload->do_upload('userfile6'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic6 = $this->upload->data();
					$cover6=$pic6['file_name'];
				}
			}

			$extimg7 = $this->input->post("userimage7");
			$img7 = $this->input->post("userfile7");
			if($img7 == ''){ $cover7 = $extimg7;}else{$cover7 = $img7;}
			$config7['upload_path'] = './assets/images/';
			$config7['allowed_types'] = 'gif|jpg|png|jpeg';
			$config7['max_size'] = '1000000';
			$this->upload->initialize($config7);
			if(!empty($_FILES["userfile7"]["name"]))
			{
				if (!$this->upload->do_upload('userfile7'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic7 = $this->upload->data();
					$cover7=$pic7['file_name'];
				}
			}

			$extimg8 = $this->input->post("userimage8");
			$img8 = $this->input->post("userfile8");
			if($img8 == ''){ $cover8 = $extimg8;}else{$cover8 = $img8;}
			$config8['upload_path'] = './assets/images/';
			$config8['allowed_types'] = 'gif|jpg|png|jpeg';
			$config8['max_size'] = '1000000';
			$this->upload->initialize($config8);
			if(!empty($_FILES["userfile8"]["name"]))
			{
				if (!$this->upload->do_upload('userfile8'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$pic8 = $this->upload->data();
					$cover8=$pic8['file_name'];
				}
			}

			$data = array("banner_img"=> $cover,
						  "banner2"=> $cover_b,
									"donate_desc" =>  $this->input->post("donate_desc"),
									"extra_img"=> $cover4,
									"img1" => $cover1,
									"img2" => $cover2,
									"img3" => $cover3,
                  "img_title1"   => $this->input->post("img_title1"),
                  "img_title2"   => $this->input->post("img_title2"),
                  "img_title3"   => $this->input->post("img_title3"),
									"otherimg1" 	=> $cover5,
									"othertitle1" 	=> $this->input->post("othertitle1"),
									"othertext1" 	=> $this->input->post("othertext1"),
									"otherimg2"   => $cover6,
									"othertitle2" 	=> $this->input->post("othertitle2"),
									"othertext2"    => $this->input->post("othertext2"),
									"otherimg3" 	=> $cover7,
									"othertitle3" 	=> $this->input->post("othertitle3"),
									"othertext3"    => $this->input->post("othertext3"),
									"otherimg4"   => $cover8,
									"othertitle4"  	=> $this->input->post("othertitle4"),
									"othertext4"  	=> $this->input->post("othertext4"));
			$this->db->where('donate_id', "1");
			$this->db->update('tbl_donate', $data);

			redirect("product/donate");
		}

		public function careerpage()
	    {
			$abouttext = $this->db->get_where("tbl_careerspage");
			$data['careertext'] = $abouttext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/careerpage',$data);
		}
		public function careersupdate()
	    {
		// Banner Image
        $cover=$this->input->post('cp_bannerimg_hidden');
        $cover2=$this->input->post('other_image_hidden');
		$cover3=$this->input->post('other_image_hidden3');
		
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000000';
				$this->upload->initialize($config);
				
				if(!empty($_FILES["cp_bannerimg"]["name"]))
				{
					if (!$this->upload->do_upload('cp_bannerimg'))
					{
						echo $this->upload->display_errors();
					}
					else
					{
				  		$pic = $this->upload->data();
				  		$cover=$pic['file_name'];
					}
				}

				if(!empty($_FILES["cp_detailbanner"]["name"]))
				{
					if (!$this->upload->do_upload('cp_detailbanner'))
					{
						echo $this->upload->display_errors();
					}
					else
					{
				  		$pic = $this->upload->data();
				  		$cover3=$pic['file_name'];
					}
				}			

				//
				if(!empty($_FILES["other_image"]["name"]))
				{
					if (!$this->upload->do_upload('other_image'))
					{
						echo $this->upload->display_errors();
					}
					else
					{
				  		$pic = $this->upload->data();
				  		$cover2=$pic['file_name'];
				  		$this->load->library('image_lib');
							 $configer =  array(
							'image_library'   => 'gd2',
							'source_image'    =>  $pic['full_path'],
							//'new_image'       =>  './assets/images/uniform/resized_uniform/resize400_600', //path to
							'maintain_ratio'  =>  TRUE,
							'width'           =>  570,
							'height'          =>  420,
					);
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
					}
				}
				

			  
          //
			$data = array(
			"cp_heading" =>  $this->input->post("cp_heading"),
			"cp_heading2" =>  $this->input->post("cp_heading2"),
			"cp_bannerimg"=> $cover,
			"other_image"=> $cover2,
			"cp_detailbanner"=> $cover3,
									"cp_imgtitle" =>  $this->input->post("cp_imgtitle"),
									"cp_desc1" =>  $this->input->post("cp_desc1"),
									"cp_desc2"=> $this->input->post("cp_desc2"));
			$this->db->where('cp_id', "1");
			$this->db->update('tbl_careerspage', $data);

			redirect("product/careerpage");
		}
		public function enquiry_details()
	    {
			$enqid = $this->uri->segment(3);
			$enqtext = $this->db->get_where("tbl_enquiry ",array('enq_id' => $enqid));
			$data['msgtext'] = $enqtext->result();

			$this->template['middle'] = $this->load->view ($this->middle = 'admin/header');
			$this->template['middle'] = $this->load->view ($this->middle = 'admin/enqirydetails',$data);
		}
		public function enquiry_delete()
	    {
			$enqid = $this->uri->segment(3);
			$enqtext = $this->db->delete("tbl_enquiry ",array('enq_id' => $enqid));

			 $tails1=$this->db->get("tailors");
	 		 $data['totalu']=$tails1->num_rows();
			 $tails=$this->db->get("tbl_enquiry");
			 $data['enquiry']=$tails->result();
			 $this->template['middle'] = $this->load->view ($this->middle = 'admin/contactenquiry',$data,true);
			 redirect("product/contactenquiry");
		}

}
