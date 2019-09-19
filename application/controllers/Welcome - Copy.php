<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

  public function index() {

    $this->middle = 'home1'; // passing middle to function. change this for different views.

    $this->layout();

  }

  

   public function about() {

    $this->middle = 'about'; // passing middle to function. change this for different views.

    $this->layout();

  }

   public function checkout(){

	  $data=array();

	  $this->template['middle'] = $this->load->view ($this->middle = 'checkout',$data,true);

  	  $this->layout(); 

  }

    public function place_order(){

	//  echo "<pre>";print_r($_POST);exit;

	$data=array("userid"=>$this->session->userdata("userid"),

				"bname"=>$this->input->post("bname"),

				"ototal"=>$this->cart->total(),

				"bitems"=>$this->cart->total_items(),

				"baddress"=>$this->input->post("baddress"),

				"blandmark"=>'landmark',

				"bcity"=>$this->input->post("bcity"),

				"bstate"=>$this->input->post("bstate"),

				"bpin"=>$this->input->post("bpin"),

				"pay_status"=>'success',

				"pay_method"=>$this->input->post("pay"),

				"trans_id"=>'123456');

				if($this->db->insert("orders",$data)==true){

					 $oid=$this->db->insert_id();

					 foreach($this->cart->contents() as $cart){

						 $opt=implode(",",$cart['options'][0]);

						//echo $opt;exit;

						echo $mea=implode(",",$cart['measures']);

						exit;

						$data=array("oid"=>$oid,

									"pid"=>$cart['id'],

									"pname"=>$cart['name'],

									"qty"=>$cart['qty'],

									"price"=>$cart['price'],

									"subtotal"=>$cart['subtotal'],

									"options"=>$cart['options'],

									"measures"=>$cart['measures']);

						

						$placed=$this->db->insert("order_items",$data);	

					}

				}else

				{

					echo "fail at first";

				}

				if($placed==true)

				{

					echo "Successs";

				}

				else

				{

					echo "fail";

				}

  }

  public function cart()

  {

	  $data = array();

	  $this->template['middle'] = $this->load->view ($this->middle = 'cart',$data,true);

    $this->layout();

	  }

	   public function login()

  {

	  $data = array();

	  $this->template['middle'] = $this->load->view ($this->middle = 'login',$data,true);

    $this->layout();

	  }

   public function shop($id) {

	$data['fab']=$this->db->get_where("fabric",array("category"=>$id))->result();

	$this->template['middle'] = $this->load->view ($this->middle = 'shopnew',$data,true);

    $this->layout();

  }

  public function fimage(){

	$this->db->select("id,front");

	$this->db->where("id",$_POST['fid']);

	$ims=$this->db->get("fabric")->row();

	?>

    <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $ims->front;?>" alt="" />

    <?php  

  }

    public function bimage(){

	$this->db->select("id,back");

	$this->db->where("id",$_POST['fid']);

	$ims=$this->db->get("fabric")->row();

	?>

    <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $ims->back;?>" alt="" />

    <?php  

  }

  public function access(){

	$st=$this->db->get_where("style",array("id"=>$_POST['sid']))->row();

	?> <div class="products-widget__item__image pull-left">

          <a href="#"><img src="<?php echo base_url();?>adminassets/styles/<?php echo $st->thumb_front;?>" /></a></div>

          <div class="products-widget__item__info">

            <div class="products-widget__item__info__title">

              <h2 class="text-uppercase"><a href="#"><?php echo $st->style;?></a></h2>

            </div>

            

            <div class="price-box"><span class="price-box__new">Rs. <?php echo $st->sprice;?>/-</span> </div>

          </div><?php  

  }

  

  public function custom($id) {

	

    $this->middle = 'customnew'; // passing middle to function. change this for different views.

    $this->layout();

  }

  public function emptycart(){

	  $this->cart->destroy();

  }

   public function mycart(){

	   echo "<pre>";print_r($_SESSION);//exit;

  }

  

  public function addtocart(){

	parse_str($_POST['formdata'],$form);

	if(isset($form['custom']))

	{

		$c="Custom";

	}

	else{

	$c="";

	}

	$total=0;

	$this->db->select("id,price,title,thumb");

	$this->db->where("id",$form['fabric']);

	$fp=$this->db->get("fabric")->row();

	$total=$total+$fp->price;

	foreach($form as $key=>$value)

	{

		//echo $key."<br/>".$value;

		if($key!='fabric' && $key!='custom' && $key!='qty')

		{

			$this->db->select("id,sprice");

			$this->db->where("id",$value);

			$fph=$this->db->get("style")->row();

			echo $total=$total+$fph->sprice;

		}

	}

	$data = array(

               'rowid' => $form['fabric'],

			   'id'      => $form['fabric'],

               'qty'     => $form['qty'],

			   'img'     => $fp->thumb,

               'price'   => $total,

			   'custom'   => $c,

               'name'    => $fp->title,

               'options' => array($form)

            );



		if($this->cart->insert($data)){

			

			//echo "added";

			$this->load->view("ajax_cart");

		}else

		{

			echo "Couldnot added to cart";

		}

		

  }

  

  public function removecart(){

  	

	$data = array(

               'rowid' => $_POST['rid'],

               'qty'   => 0

            );



$this->cart->update($data); 

$this->load->view("ajax_cart");

  	

  }

   public function contact() {

    $this->middle = 'contact'; // passing middle to function. change this for different views.

    $this->layout();

  }

   public function aboutus() {

    $this->middle = 'aboutus'; // passing middle to function. change this for different views.

    $this->layout();

  }

   public function faq() {

    $this->middle = 'faq'; // passing middle to function. change this for different views.

    $this->layout();

  }

  

  public function showcart(){

	  //echo $_POST['stid'];echo "<br/>";echo $_POST['atid'];exit;

	$data['cart']=$this->db->get_where("style",array("id"=>$_POST['atid'],"attr_id"=>$_POST['stid']))->row();  

	//print_r($data);exit;

	?><img style="height:25%; width:25%;" class="img img-responsive" src="<?php echo base_url();?>adminassets/styles/<?php echo $data['cart']->thumb_front;?>" /> <?php

  }

  

  public function product($cid,$id){

	

    $data['pro']=$this->db->get_where("fabric",array("id"=>$id,"category"=>$cid))->row();

	$data['pre']=$this->db->get_where("fabric",array("id"=>$id-1,"category"=>$cid))->row();

	$data['next']=$this->db->get_where("fabric",array("id"=>$id+1,"category"=>$cid))->row();

	$this->template['middle'] = $this->load->view ($this->middle = 'product',$data,true);

    $this->layout();

  }

  

}

?>