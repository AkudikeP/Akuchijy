<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('url');                    
}
public function resize_image($imagepath,$upload_url)
{
  $this->load->library('image_lib');
                     $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $imagepath,
            'new_image'       =>  $upload_url.'resize400_600', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  400,
            'height'          =>  600,
            );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $imagepath,
            'new_image'       =>  $upload_url.'resize800_1200', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  800,
            'height'          =>  1200,
          );
          //$this->image_lib->clear();
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();

          $configer =  array(
            'image_library'   => 'gd2',
            'source_image'    =>  $imagepath,
            'new_image'       =>  $upload_url.'small', //path to
            'maintain_ratio'  =>  TRUE,
            'width'           =>  54,
            'height'          =>  74,
          );
          $this->image_lib->initialize($configer);
          $this->image_lib->resize();
          
}

public function import(){
 if(isset($_POST["import"]))
  {
    //print_r($_POST['import']);
      $vid = $this->session->userdata('vid');
      $username = $this->session->userdata('username');
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                  if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;

                       //$this->db->select('id');
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;

                       //$this->db->select('id');
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                        $this->db->where(array('name'=>$importdata[37],'category'=>1));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories=$res->id;


                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);
                            $upload_url = './assets/images/fabrics/resized_fabric/';
                      //1
                      $url = explode('/',$importdata[39]);
                      $name = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/fabrics/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[40]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/fabrics/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[41]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/fabrics/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[42]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[42]);
                      $new = './assets/images/fabrics/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

      
                      $data = array(
                      'title' => $importdata[0],
                      'category' =>$importdata[1],                    
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' => $importdata[4],
                      'quantity' =>$importdata[5],
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                       'min_quan_to_buy' => $importdata[38],
                       'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                      'turl' => $importdata[39],
                      'furl' => $importdata[40],
                      'burl' => $importdata[41],
                      'surl' => $importdata[42],
                      'padddate'=> date('Y-m-d'),
                      'vendor_name'=>$username,
                      'vendor_id'=>$vid,
                      'status'=>'disapprove'
                      );
           $insert = $this->db->insert('fabric',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',1);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('fabric_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Vendor/add_fabric');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Vendor/add_fabric');
    }
  }
}

public function import_data(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                  if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                       $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                      $this->db->where(array('name'=>$importdata[37],'category'=>1));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories=$res->id;


                      $tax_price = (($importdata[4])*($importdata[32]))/100;
                      $tax_price = round(($importdata[4])+$tax_price);
                      $upload_url = './assets/images/fabrics/resized_fabric/';
                      //1
                      $url = explode('/',$importdata[39]);
                      $name = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/fabrics/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[40]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/fabrics/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[41]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/fabrics/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[42]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[42]);
                      $new = './assets/images/fabrics/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);
          $data = array(
                      'title' => $importdata[0],
                      'category' =>$importdata[1],                    
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' => $importdata[4],
                      'quantity' =>$importdata[5],
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                      'min_quan_to_buy' => $importdata[38],
                      'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'turl' => $importdata[39],
                      'furl' => $importdata[40],
                      'burl' => $importdata[41],
                      'surl' => $importdata[42],
                      'sizing_guide' => $name4,
                      'padddate'=> date('Y-m-d')
                      //'Minimum_Quantity' =>$importdata[34],
                      );
           $insert = $this->db->insert('fabric',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',1);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('fabric_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Product/add_fabric');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Product/add_fabric');
    }
  }
}

public function import_uniform(){
 if(isset($_POST["import"]))
  {
      $vid = $this->session->userdata('vid');
      $username = $this->session->userdata('username');
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {

              if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                       $this->db->where(array('name'=>$importdata[37],'category'=>3));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories=$res->id;


                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);

      $upload_url = './assets/images/uniform/resized_uniform/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/uniform/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/uniform/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/uniform/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/uniform/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

                  $data = array(
                      'school_name' =>$importdata[0],
                      'uni_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                     'price' =>$tax_price,
                      'price_without_tax'=> $importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30], 
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                      'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'category_for_filter' => $main_categories,
                      'padddate'=> date('Y-m-d'),                       
                      'vendor_name'=>$username,
                      'vendor_id'=>$vid,
                      'status'=>'disapprove'
                      );
           $insert = $this->db->insert('uniform',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',2);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('uniform_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Vendor/add_uniform');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Vendor/add_uniform');
    }
  }
}

public function import_uniform_data(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {

              if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;
$main_categories='';
                      $this->db->where(array('name'=>$importdata[37],'category'=>3));
                       $res=$this->db->get('main_categories')->row();
                     if(!empty($res))
                     {
                      $main_categories=$res->id;
}

                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);


      $upload_url = './assets/images/uniform/resized_uniform/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/uniform/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/uniform/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/uniform/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/uniform/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

                  $data = array(
                      'school_name' =>$importdata[0],
                      'uni_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax'=> $importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],   
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                       'uniform_image' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                      'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'category_for_filter' => $main_categories,

                      'padddate'=> date('Y-m-d')                  
                      );
           $insert = $this->db->insert('uniform',$data);
           //echo $this->db->last_query();
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',2);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $data = $this->db->get_where('uniform_search',array('product_id'=>$insert_id))->row();
              if(!empty($data))
              {
                $this->db->where('product_id',$insert_id);
                $this->db->update('uniform_search',array('filter_subcategory_fcid'=>$c));
              }else{
                $this->db->insert('uniform_search',$filter);
              }
              
           }                
         } $i++;$b=array();
           }                   
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Product/add_uniform');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Product/add_uniform');
    }
  }
}

public function import_accessories(){
 if(isset($_POST["import"]))
  {
      $vid = $this->session->userdata('vid');
      $username = $this->session->userdata('username');
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{$this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;

                       //$this->db->select('id');
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;

                       //$this->db->select('id');
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                       $this->db->where(array('name'=>$importdata[37],'category'=>3));
                       $res=$this->db->get('main_categories')->row();
                                           $main_categories='';
                      if(!empty($res)){
                      $main_categories=$res->id;
}


                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);

      $upload_url = './assets/images/accessories/resized_accessories/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/accessories/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/accessories/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/accessories/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/accessories/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

                  $data = array(
                      'brand' =>$importdata[0],
                      'main_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30], 
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                      'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                                            'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'padddate'=> date('Y-m-d'), 
                      'vendor_name'=>$username,
                      'vendor_id'=>$vid,
                      'status'=>'disapprove'                    
                      );
           $insert = $this->db->insert('accessories',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',3);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('accessories_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Vendor/add_accessories');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Vendor/add_accessories');
    }
  }
}


public function import_accessories_data(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                       $this->db->where(array('name'=>$importdata[37],'category'=>3));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories='';
                      if(!empty($res)){
                      $main_categories=$res->id;
}

                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);

$upload_url = './assets/images/accessories/resized_accessories/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/accessories/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/accessories/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/accessories/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/accessories/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

                  $data = array(
                      'brand' =>$importdata[0],
                      'main_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                       'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                      'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'padddate'=> date('Y-m-d')                     
                      );
           $insert = $this->db->insert('accessories',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',3);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('accessories_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Product/add_accessories');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Product/add_accessories');
    }
  }
}


public function import_online_data(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                       $this->db->where(array('name'=>$importdata[37],'category'=>5));
                       $res=$this->db->get('main_categories')->row();
                                          $main_categories='';
                      if(!empty($res)){
                      $main_categories=$res->id;
}


                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);

$upload_url = './assets/images/online_boutique/resized_online_boutique/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/online_boutique/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/online_boutique/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/online_boutique/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/online_boutique/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);



                  $data = array(
                      'brand' =>$importdata[0],
                      'main_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],  
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                      'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                                            'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'padddate'=> date('Y-m-d')                            
                      );
           $insert = $this->db->insert('online_boutique',$data);
          // echo $this->db->last_query();die;
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',5);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('online_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Product/add_online');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Product/add_online');
    }
  }
}

public function import_online(){
 if(isset($_POST["import"]))
  {
    $vid = $this->session->userdata('vid');
      $username = $this->session->userdata('username');
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[8]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[9]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[10]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                       $this->db->where(array('name'=>$importdata[37],'category'=>5));
                       $res=$this->db->get('main_categories')->row();
                                           $main_categories='';
                      if(!empty($res)){
                      $main_categories=$res->id;
}

                      $tax_price = (($importdata[4])*($importdata[32]))/100;
      $tax_price = round(($importdata[4])+$tax_price);
$upload_url = './assets/images/online_boutique/resized_online_boutique/';
                      //1
                      $url = explode('/',$importdata[38]);
                      $name = end($url);
                      $data = file_get_contents($importdata[38]);
                      $new = './assets/images/online_boutique/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //2
                      $url = explode('/',$importdata[39]);
                      $name2 = end($url);
                      $data = file_get_contents($importdata[39]);
                      $new = './assets/images/online_boutique/'.$name2;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //3
                      $url = explode('/',$importdata[40]);
                      $name3 = end($url);
                      $data = file_get_contents($importdata[40]);
                      $new = './assets/images/online_boutique/'.$name3;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);                      //4
                      $url = explode('/',$importdata[41]);
                      $name4 = end($url);
                      $data = file_get_contents($importdata[41]);
                      $new = './assets/images/online_boutique/'.$name4;
                      file_put_contents($new, $data);//exit;
                      $this->resize_image($new,$upload_url);

                  $data = array(
                      'brand' =>$importdata[0],
                      'main_category' => $importdata[1],                      
                      'sdesc' =>$importdata[2],
                      'ldesc' =>$importdata[3],
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[4],
                      'quantity' =>$importdata[5], 
                      'offer_type' =>$importdata[6],
                      'offer_price' =>$importdata[7],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[12],
                      'meta_keyword' =>$importdata[13],
                      'meta_description' =>$importdata[14],
                      'google_analytics' =>$importdata[15],
                      'og_title' =>$importdata[16],
                      'og_description' =>$importdata[17],
                      'og_keyword' =>$importdata[18],
                      'og_locale' =>$importdata[19],
                      'og_type' =>$importdata[20],
                      'og_site_name' =>$importdata[21],
                      'og_url' =>$importdata[22],
                      'og_image' =>$importdata[23],
                      'dc_source' =>$importdata[24],
                      'dc_relation' =>$importdata[25],
                      'dc_title' =>$importdata[26],
                      'dc_keywords' =>$importdata[27],
                      'dc_subject' =>$importdata[28],
                      'dc_language' =>$importdata[29],
                      'dc_description' =>$importdata[30],
                      'SKU' =>$importdata[31],
                      'Tax_Class' =>$importdata[32],
                      'Subtract_Stock' =>$importdata[33],
                      'Minimum_Quantity' =>$importdata[34],
                      'from_date' =>$importdata[35],
                      'to_date' =>$importdata[36],
                      'category_for_filter' => $main_categories,
                      'thumb' => $name,
                      'front' => $name2,
                      'back' => $name3,
                      'sizing_guide' => $name4,
                                            'turl' => $importdata[38],
                      'furl' => $importdata[39],
                      'burl' => $importdata[40],
                      'surl' => $importdata[41],
                      'padddate'=> date('Y-m-d'),  
                      'vendor_name'=>$username,
                      'vendor_id'=>$vid,
                      'status'=>'disapprove'                     
                      );
           $insert = $this->db->insert('online_boutique',$data);
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[11]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',5);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('online_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Vendor/add_online');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Vendor/add_online');
    }
  }
}



public function moreservice(){
 if(isset($_POST["import"]))
  {
      $vid = $this->session->userdata('vid');
      $username = $this->session->userdata('username');
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{
                      $this->db->where('name',$importdata[2]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[3]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[4]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;

                      $this->db->where(array('name'=>$importdata[25],'category'=>4));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories=$res->id;


                      $tax_price = (($importdata[1])*($importdata[1]))/100;
      $tax_price = round(($importdata[1])+$tax_price);
      $upload_url = './assets/images/more_services/resized_more_services/';
                      //1
                      $url = explode('/',$importdata[26]);
                      $name = end($url);
                      $data = file_get_contents($importdata[26]);
                      $new = './assets/images/more_services/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);


                  $data = array(
                      'subcategory' =>$importdata[0],                      
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[1],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[5],
                      'meta_keyword' =>$importdata[6],
                      'meta_description' =>$importdata[7],
                      'google_analytics' =>$importdata[8],
                      'og_title' =>$importdata[8],
                      'og_description' =>$importdata[10],
                      'og_keyword' =>$importdata[11],
                      'og_locale' =>$importdata[12],
                      'og_type' =>$importdata[13],
                      'og_site_name' =>$importdata[14],
                      'og_url' =>$importdata[15],
                      'og_image' =>$importdata[16],
                      'dc_source' =>$importdata[17],
                      'dc_relation' =>$importdata[18],
                      'dc_title' =>$importdata[19],
                      'dc_keywords' =>$importdata[20],
                      'dc_subject' =>$importdata[21],
                      'dc_language' =>$importdata[22],
                      'dc_description' =>$importdata[23],

                      'Tax_Class' =>$importdata[24],
                      'category_for_filter' => $main_categories,
                      'image'=>$name,
                      'turl' => $importdata[26],
                      'padddate'=> date('Y-m-d'),                      
                      'vendor_name'=>$username,
                      'vendor_id'=>$vid,
                      'status'=>'disapprove'
                      );
           $insert = $this->db->insert('more_services',$data);
            if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[5]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',4);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('more_services_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Vendor/more_services');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Vendor/more_services');
    }
  }
}

public function moreservice_data(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $i=0;
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($i<1)
                    {
                      //echo $i."<br>";
                    }
                    else{

                      $this->db->where('name',$importdata[2]);
                       $countries=$this->db->get('countries')->row();
                       $countries_id=$countries->id;
                       $this->db->where('name',$importdata[3]);
                       $states=$this->db->get('states')->row();
                        $states_id=$states->id;
                       $this->db->where('name',$importdata[4]);
                       $res=$this->db->get('cities')->row();
                      $city_id=$res->id;


                       $this->db->where(array('name'=>$importdata[25],'category'=>4));
                       $res=$this->db->get('main_categories')->row();
                      $main_categories=$res->id;


                      $tax_price = (($importdata[1])*($importdata[1]))/100;
      $tax_price = round(($importdata[1])+$tax_price);
            $upload_url = './assets/images/more_services/resized_more_services/';
                      //1
                      $url = explode('/',$importdata[26]);
                      $name = end($url);
                      $data = file_get_contents($importdata[26]);
                      $new = './assets/images/more_services/'.$name;
                      file_put_contents($new, $data);//exit;
$this->resize_image($new,$upload_url);

                  $data = array(
                      'subcategory' =>$importdata[0],                      
                      'price' =>$tax_price,
                      'price_without_tax' =>$importdata[1],
                      'country'=>$countries_id,
                      'state'=>$states_id,
                      'city'=>$city_id,
                      'meta_title1' =>$importdata[5],
                      'meta_keyword' =>$importdata[6],
                      'meta_description' =>$importdata[7],
                      'google_analytics' =>$importdata[8],
                      'og_title' =>$importdata[9],
                      'og_description' =>$importdata[10],
                      'og_keyword' =>$importdata[11],
                      'og_locale' =>$importdata[12],
                      'og_type' =>$importdata[13],
                      'og_site_name' =>$importdata[14],
                      'og_url' =>$importdata[15],
                      'og_image' =>$importdata[16],
                      'dc_source' =>$importdata[17],
                      'dc_relation' =>$importdata[18],
                      'dc_title' =>$importdata[19],
                      'dc_keywords' =>$importdata[20],
                      'dc_subject' =>$importdata[21],
                      'dc_language' =>$importdata[22],
                      'dc_description' =>$importdata[23], 
                      'Tax_Class' =>$importdata[24],
                      'image'=>$name,
                      'turl' => $importdata[26],
                      'category_for_filter' => $main_categories,
                      'padddate'=> date('Y-m-d')                      
                      );
           $insert = $this->db->insert('more_services',$data);
           //echo $this->db->last_query(); die;
           if($insert)
           {
            $insert_id = $this->db->insert_id();
             $a=explode(',', $importdata[5]) ;
             foreach($a as $a)
              {
                 $this->db->select('fcid');
                 $this->db->where('main_category_id',4);
                 $this->db->where('filter_name',$a);
                 $res=$this->db->get('filter_subcategory')->row();
                 $b[]=$res->fcid;
              }             
             $c=implode(',', $b);
             //print_r($c);die;
              $filter=array('product_id'=>$insert_id,
                            'filter_subcategory_fcid'=>$c);
              $this->db->insert('more_services_search',$filter);
           }                
         } $i++;$b=array();
           }                    
          fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('Product/more_services');
        }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('Product/more_services');
    }
  }
}

}