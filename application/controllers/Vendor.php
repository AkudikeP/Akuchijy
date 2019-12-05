<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Vendor extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("vendor/vendor_login_view");
    }

    public function vendorfaq()
    {
        $data['faq'] = $this->db->get_where("vendorfaq", array('status_enable' => 'enable'))->result();
        $this->template['middle'] = $this->load->view($this->middle = 'faq', $data, true);
        $this->layout();
        //$this->load->view("vendor/vendorfaq",$data);
    }

    public function return_requests()
    {
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("return_requests");
        $fab = $all->result();
        $thisvendor = array();
        foreach ($fab as $value) {
            $order_item = $this->db->get_where('order_items', array('id' => $value->item_id))->row();
//echo $this->db->last_query();
            //print_r($order_item);
            //        print_r($order_item->vendor_id);
            if ($vid == $order_item->vendor_id) {
                $thisvendor[] = $value->id;
            }
        }

        //print_r($thisvendor);

        if (!empty($thisvendor)) {

            $this->db->order_by("id", "desc");
            $this->db->where_in('id', $thisvendor);
            $all = $this->db->get_where("return_requests");

            //$data['totalpro']=$all->num_rows();
            $data['fab'] = $all->result();
            //echo $this->db->last_query();
        } else {
            $data['fab'] = '';
        }
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/return_requests', $data, true);
        $this->vendorlayout();
    }
    public function cancel_requests()
    {
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("cancel_requests");
        $fab = $all->result();
        $thisvendor = array();
        $this->db->where('vendor_id', $this->session->userdata('vid'));
        $this->db->update('cancel_requests', array('vendor_status' => 'yes'));
        foreach ($fab as $value) {
            $order_item = $this->db->get_where('order_items', array('id' => $value->item_id))->row();
//echo $this->db->last_query();
            //print_r($order_item);
            //        print_r($order_item->vendor_id);
            if ($vid == $order_item->vendor_id) {
                $thisvendor[] = $value->id;
            }
        }

        //print_r($thisvendor);

        if (!empty($thisvendor)) {

            $this->db->order_by("id", "desc");
            $this->db->where_in('id', $thisvendor);
            $all = $this->db->get_where("cancel_requests");

            //$data['totalpro']=$all->num_rows();
            $data['fab'] = $all->result();
            //echo $this->db->last_query();
        } else {
            $data['fab'] = '';
        }
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/cancel_requests', $data, true);
        $this->vendorlayout();
    }

    public function return_item_request_reject()
    {

        $data = array(
            "cancel_id" => $this->input->post("cancel_id"),

            "reason" => $this->input->post("reason"),
            "date" => date("d-m-Y"),
            "vendor_id" => $this->input->post("vendor_id"),

        );

        if ($this->db->insert("return_item_request_reject", $data)) {
            $this->db->where("id", $this->input->post("cancel_id"));
            $this->db->update('return_requests', array("approvedornot" => "disapprove"));
        }
        $cancel_data = $this->db->get_where('return_requests', array("id" => $this->input->post("cancel_id")))->row();

        $cancel_data2 = $this->db->get_where("order_items", array('id' => $cancel_data->item_id))->row();
        //echo $this->db->last_query();
        // print_r($cancel_data2);
        $user_info = $this->db->get_where("users", array('uid' => $cancel_data->user_id))->row();

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
<h2>Ansvel.com</h2>
  <div id="inouter">
  <br>


  <p>Dear ' . $user_info->name . ',</p>


  <p>Your request for return product is disapproved by Ansvel.</p>
   <b>Reason:</b>' . $this->input->post("reason") . '<br>


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
      <td ><img src="' . base_url() . 'assets/images/' . $cancel_data2->pimg . '" width="50px"></td>
      <td width="200px">' . $cancel_data2->pname . '</td>
      <td>' . $cancel_data2->size . '</td>
      <td>' . $cancel_data2->qty . '</td>
      <td>Rs. ' . $cancel_data2->price . '</td>
      <td>View item</td>
    </tr>
  </table>



  <br>
  <p>Regards,<br>Team Ansvel</p>
  <br>
  <div class="footer"><center><img src="' . base_url() . '/assets/sociallinks/playstore.png"><img src="' . base_url() . '/assets/sociallinks/apple.png"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: info@ansvel.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of Ansvel</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br>
   <center><a href="#"><img src="' . base_url() . '/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="' . base_url() . '/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="' . base_url() . '/assets/sociallinks/google_circle_black-24.png"></a></center></p>
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
            'wordwrap' => true,
            'crlf' => "\r\n",
            'newline' => "\r\n",
        ));

        $to_email = $user_info->email;

        //$mail_count= count($to_mail);

        $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
        $this->email->to($to_email);
        $this->email->subject('Ansvel Retrun Product');
        $this->email->message($message);
        $this->email->send();
        $this->email->clear();

        $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'ANSVEL';

        $message1 = "Your Return request is disapproved by Ansvel \n ";
        $route = 4;
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $user_info->mobile,
            'message' => $message1,
            'sender' => $senderId,
            'route' => $route,
        );
        $url = 'http://send.onlinesendsms.com/api/sendhttp.php';
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
        ));

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);

        ///

        //echo $this->db->last_query();
        redirect('vendor/return_requests');

    }
    public function return_request_approve()
    {

        $this->db->where("id", $this->input->post("sid"));
        $this->db->update('return_requests', array("approvedornot" => "approve"));

        $cancel_data = $this->db->get_where("return_requests", array('id' => $this->input->post("sid")))->row();
        $this->db->where("id", $cancel_data->item_id);
        $this->db->update('order_items', array("status" => "return"));
        $cancel_data2 = $this->db->get_where("order_items", array('id' => $cancel_data->item_id))->row();
        $cancel_data3 = $this->db->get_where("order_items", array('oid' => $cancel_data2->oid, 'status!=' => 'return'))->result();
        $user_info = $this->db->get_where("users", array('uid' => $cancel_data->user_id))->row();
        $total = 0;
        foreach ($cancel_data3 as $value) {
            $total += $value->price;
        }
        echo $total;
        $this->db->where("oid", $cancel_data2->oid);
        $this->db->update('orders', array("ototal" => $total));
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
<h2>Ansvel.com</h2>
  <div id="inouter">
  <br>


  <p>Dear ' . $user_info->name . ',</p>


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
      <td ><img src="' . base_url() . 'assets/images/' . $cancel_data2->pimg . '" width="50px"></td>
      <td width="200px">' . $cancel_data2->pname . '</td>
      <td>' . $cancel_data2->size . '</td>
      <td>' . $cancel_data2->qty . '</td>
      <td>Rs. ' . $cancel_data2->price . '</td>
      <td>View item</td>
    </tr>
  </table>
  <span class="expecteddate">Expect Delivery by ......</span>

  <p><b>Delivery Address:</b></p>
  <p></p>
  <br>
  <p>Regards,<br>Team Ansvel</p>
  <br>
  <div class="footer"><center><img src="logo2.jpg"><img src="logo2.jpg"></center>
  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: info@ansvel.com</p></center>
  <center><p class="blur">Your received this message because you\'re a member of Ansvel</p></center>
  </div>
  <p class="center small"><u>Unsubscribe</u><br></p>
  <p class="center small">Follow us on: <br></p>
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
            'wordwrap' => true,
            'crlf' => "\r\n",
            'newline' => "\r\n",
        ));

        $to_email = $user_info->email;

        //$mail_count= count($to_mail);

        $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
        $this->email->to($to_email);
        $this->email->subject('Ansvel Retrun Product');
        $this->email->message($message);
        $this->email->send();
        $this->email->clear();

        $authKey = '136895AdMGPnqo6n5875df12';
        $mobileNumber = $vinfo->contact;
        $senderId = 'ANSVEL';

        $message1 = "Your Return request is approved by Ansvel \n ";
        $route = 4;
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $user_info->mobile,
            'message' => $message1,
            'sender' => $senderId,
            'route' => $route,
        );
        $url = 'http://send.onlinesendsms.com/api/sendhttp.php';
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
        ));

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);

        //echo $this->db->last_query();
        //redirect('welcome/orders');

    }
    public function vendor_registration($referred_by = '')
    {
        $this->form_validation->set_data(array('referred_by' => $referred_by));
        $this->form_validation->set_rules('referred_by', 'Referral id', 'max_length[10]|numeric|trim',
            array(
                'max_length' => 'Invalid referral id! Please ensure that your sign-up link is correct.',
                'numeric' => 'Invalid referral id! Please ensure that your sign-up link is correct.'
            )
        );
        $data['referred_by'] = $referred_by != '' ? '/' . $referred_by : '';
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('message', validation_errors());
        }
        $this->load->view("vendor/vendor_registration", $data);
    }

    public function vendor_home()
    {
        $this->load->view("vendor_home_page");
        // $this->load->view("layout/footernew");
    }

    public function dashboard()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        //print_r($this->session->userdata);
        $data = array(); //['attr']=$this->db->get("attributes")->result();
        $data['v_id'] = $this->session->userdata['vid'];
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/dashboard', $data, true);
        $this->vendorlayout();
    }
    public function w_order()
    {
        $vid = $this->session->userdata('vid');
        $items = array();
        $d = strtotime("today");
        $this->db->where('odate BETWEEN "' . date('d-m-Y', strtotime("last sunday midnight-7 weekdays", $d)) . '" and "' . date('d-m-Y', strtotime("next saturday-7 weekdays", $d)) . '"');
//echo $this->db->last_query();
        $weeks_orders = $this->db->get("orders")->result();
        foreach ($weeks_orders as $orders) {

            $items[] = $this->db->get_where("order_items", array('oid' => $orders->oid, 'vendor_id' => $vid))->row();
        }

        return $items;
    }

    public function t_order()
    {
        $items = array();
        $vid = $this->session->userdata('vid');
        $today = date("d-m-Y");
        $this->db->where("odate", $today);
        $todays_orders = $this->db->get("orders")->result();
        //  echo $this->db->last_query();
        //  print_r($todays_orders);
        foreach ($todays_orders as $orders) {

            $items[] = $this->db->get_where("order_items", array('oid' => $orders->oid, 'vendor_id' => $vid))->row();
            //  echo $this->db->last_query();
        }

        return $items;
    }

    public function m_order()
    {
        $items = array();
        $vid = $this->session->userdata('vid');

        $d = date('d-m-Y');

        $datestring = "$d first day of last month";
        $dt = date_create($datestring);
        $month = $dt->format('m');
        $year = $dt->format('Y');
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $last_month_first = '1-' . $month . '-' . $year;
        $last_month_last = $day . '-' . $month . '-' . $year;
        //echo $day;

        $this->db->where('odate BETWEEN "' . $last_month_first . '" and "' . $last_month_last . '"');

        $month_orders = $this->db->get("orders")->result();
        foreach ($month_orders as $orders) {
            //print_r($orders);
            $items[] = $this->db->get_where("order_items", array('oid' => $orders->oid, 'vendor_id' => $vid))->row();
            // echo $this->db->last_query();
        }
        return $items;
    }

    public function all_order()
    {
        $items = array();
        $vid = $this->session->userdata('vid');

        $this->db->select('*');
        $this->db->order_by("id", "desc");
        $this->db->from('order_items');

        $this->db->where("vendor_id", $vid);
        $items = $this->db->get()->result();
        return $items;
    }
    public function all_orders()
    {
        $vid = $this->session->userdata('vid');

        $this->db->select('*');

        $this->db->from('order_items');

        $this->db->where("vendor_id", $vid);
        $this->db->where("(status!='cancel' AND status!='return')");
        $this->db->order_by("oid", "desc");
        //$this->db->or_where("status!=","return");
        $data['items'] = $this->db->get()->result();
//  echo $this->db->last_query();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_orders', $data, true);
        $this->vendorlayout();
    }

    public function ajax_access_uniform()
    {
        if ($_POST['sid'] == "Accessories") {
            $this->load->view('Vendor/ajax_uniform');
        }
    }
    public function excel()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $sorting = $this->session->userdata('sorting');
        $data = array();

        if ($sorting == 'w_order') {
            $items = $this->w_order();
        } else if ($sorting == 't_order') {
            $items = $this->t_order();

        } else if ($sorting == 'm_order') {
            $items = $this->m_order();

        } else {
            $items = $this->all_order();
        }
        $markup = $this->db->get_where('vendor', array('vid' => $this->session->userdata('vid')))->row()->markup;

        if (!empty($items)) {
            $i = 1;
            $paid = 0;
            $due = 0;
            foreach ($items as $item) {
                if (!empty($item)) {
                    $order_date = $this->db->get_where("orders", array("oid" => $item->oid))->row();

                    $data1 = new stdClass;
                    $data1->Order_no = $item->oid;
                    $data1->Date = $order_date->odate;
                    $data1->Product = $item->pname;
                    $tax_price = (($item->subtotal) * ($markup)) / 100;
                    $tax_price = round(($item->subtotal) - $tax_price);

                    $data1->Price = $tax_price;
                    $data[] = $data1;

                }}}
        $this->excel->stream('vendor_report.xls', $data);
    }

    public function all_orders_excel()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();

        $vid = $this->session->userdata('vid');

        $this->db->select('*');

        $this->db->from('order_items');

        $this->db->where("vendor_id", $vid);
        $this->db->where("(status!='cancel' AND status!='return')");
        $this->db->order_by("oid", "desc");
        $user = $this->db->get()->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Order_No = "OMD-" . $user->oid;

            $order_date = $this->db->get_where("orders", array("oid" => $user->oid))->row();
            $data1->Date = $order_date->odate;
            $type = explode('/', $user->pimg);if ($type[0] == 'accessories') {$data1->Product_ID = "PAMD-" . $user->pid;} else if ($type[0] == 'fabrics') {$data1->Product_ID = "PFMD-" . $user->pid;} else if ($type[0] == 'uniform') {$data1->Product_ID = "PUMD-" . $user->pid;} else if ($type[0] == 'online_boutique') {$data1->Product_ID = "POMD-" . $user->pid;}

            $data1->Price = $user->subtotal;

            if ($item->status == "") {
                $data1->Product_ID = 'Due';
            } else {
                $data1->Product_ID = 'Paid';

            }

            $data[] = $data1;
        }
        $this->excel->stream('all_orders_vendor.xls', $data);
    }
    public function all_fabric_approved()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("fabric", array("vendor_id" => $vid, "status" => 'approve'));
        $user = $all->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Title = $user->title;
            $data1->Date = $user->padddate;
            $data1->Product_ID = "PFMD-" . $user->id;
            if ($user->category == 1) {
                $data1->Category = "Women";
            }
            if ($user->category == 2) {
                $data1->Category = "Men";
            }
            if ($user->category == 3) {
                $data1->Category = "Kids";
            }

            $data1->Price = $user->price;
            $data1->Quantity = $user->quantity;

            $data1->SKU = $user->SKU;
            $data[] = $data1;
        }
        $this->excel->stream('approved_fabric_vendor.xls', $data);

    }

    public function all_online_approved()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("online_boutique", array("vendor_id" => $vid, "status" => 'approve'));
        $user = $all->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Title = $user->brand;
            $data1->Date = $user->padddate;
            $data1->Product_ID = "POMD-" . $user->id;
            if ($user->main_category == 1) {
                $data1->Category = "Women";
            }
            if ($user->main_category == 2) {
                $data1->Category = "Men";
            }
            if ($user->main_category == 3) {
                $data1->Category = "Kids";
            }

            $data1->Price = $user->price;
            $data1->Quantity = $user->quantity;

            $data1->SKU = $user->SKU;
            $data[] = $data1;
        }
        $this->excel->stream('approved_online_boutique_vendor.xls', $data);

    }
    public function all_acc_approved()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("accessories", array("vendor_id" => $vid, "status" => 'approve'));
        $user = $all->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Date = $user->padddate;
            $data1->Title = $user->brand;
            $data1->Product_ID = "PAMD-" . $user->acc_id;
            if ($user->main_category == 1) {
                $data1->Category = "Women";
            }
            if ($user->main_category == 2) {
                $data1->Category = "Men";
            }
            if ($user->main_category == 3) {
                $data1->Category = "Kids";
            }

            $data1->Price = $user->price;
            $data1->Quantity = $user->quantity;
            $data1->SKU = $user->SKU;
            $data[] = $data1;
        }
        $this->excel->stream('approved_accesories_vendor.xls', $data);

    }

    public function all_uni_approved()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("accessories", array("vendor_id" => $vid, "status" => 'approve'));
        $user = $all->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Date = $user->padddate;
            $data1->Title = $user->school_name;
            $data1->Product_ID = "PUMD-" . $user->uniform_id;
            $data1->Category = $urer->uni_category;
            $data1->Price = $user->price;
            $data1->Quantity = $user->quantity;
            $data1->SKU = $user->SKU;
            $data[] = $data1;
        }
        $this->excel->stream('approved_uniform_vendor.xls', $data);

    }
    public function all_more_approved()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("more_services", array("vendor_id" => $vid, "status" => 'approve'));
        $user = $all->result();
        foreach ($user as $user) {
            $data1 = new stdClass;
            $data1->Date = $user->padddate;
            $data1->Title = $user->subcategory;
            $data1->Product_ID = "PMMD-" . $user->id;
            // $data1->Category =$urer->uni_category;
            $data1->Price = $user->price;
            //$data1->Quantity = $user->quantity;
            $data1->SKU = $user->SKU;
            $data[] = $data1;
        }
        $this->excel->stream('approved_more_services_vendor.xls', $data);

    }
    public function all_return_excel()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("return_requests");
        $fab = $all->result();
        $thisvendor = array();
        foreach ($fab as $value) {
            $order_item = $this->db->get_where('order_items', array('id' => $value->item_id))->row();
            if ($vid == $order_item->vendor_id) {
                $thisvendor[] = $value->id;
            }
        }

        if (!empty($thisvendor)) {

            $this->db->order_by("id", "desc");
            $this->db->where_in('id', $thisvendor);
            $all = $this->db->get_where("return_requests");

            $user = $all->result();
        } else {
            $user = '';
        }

        foreach ($user as $fab) {
            $data1 = new stdClass;
            //
            $order_item = $this->db->get_where('order_items', array('id' => $fab->item_id))->row();

            $data1->Order_ID = "OMD-" . $order_item->oid . "&nbsp";
            $data1->Date = $fab->date . "&nbsp";
            $data1->Product_Title = $order_item->pname;
            $type = explode('/', $order_item->pimg);
            if ($type[0] == 'accessories') {$data1->Product_ID = "PAMD-" . $order_item->pid;} else if ($type[0] == 'fabrics') {$data1->Product_ID = "PFMD-" . $order_item->pid;} else if ($type[0] == 'uniform') {$data1->Product_ID = "PUMD-" . $order_item->pid;} else if ($type[0] == 'online_boutique') {$data1->Product_ID = "POMD-" . $order_item->pid;}

            $data1->Reason = $this->db->get_where('return_reasons', array('id' => $fab->reason))->row()->reason;
            $data1->Description = $fab->description;
            $data1->Price = $order_item->price;
            if ($fab->approvedornot == 'disapprove') {$data1->Status = "disapproved";} else if ($fab->approvedornot == 'approve') {$data1->Status = "approved";} else { $data1->Status = "pending";}
            //
            $data[] = $data1;
        }
        $this->excel->stream('return_requests.xls', $data);

    }

    public function all_cancel_excel()
    {
        $this->load->library("Excel");
        $this->excel->setActiveSheetIndex(0);
        $data = array();
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("cancel_requests");
        $fab = $all->result();
        $thisvendor = array();
        foreach ($fab as $value) {
            $order_item = $this->db->get_where('order_items', array('id' => $value->item_id))->row();
            if ($vid == $order_item->vendor_id) {
                $thisvendor[] = $value->id;
            }
        }

        if (!empty($thisvendor)) {

            $this->db->order_by("id", "desc");
            $this->db->where_in('id', $thisvendor);
            $all = $this->db->get_where("cancel_requests");

            $user = $all->result();
        } else {
            $user = '';
        }

        foreach ($user as $fab) {
            $data1 = new stdClass;
            //
            $order_item = $this->db->get_where('order_items', array('id' => $fab->item_id))->row();

            $data1->Order_ID = "OMD-" . $order_item->oid . "&nbsp";
            $data1->Date = $fab->date . "&nbsp";
            $data1->Product_Title = $order_item->pname;
            $type = explode('/', $order_item->pimg);
            if ($type[0] == 'accessories') {$data1->Product_ID = "PAMD-" . $order_item->pid;} else if ($type[0] == 'fabrics') {$data1->Product_ID = "PFMD-" . $order_item->pid;} else if ($type[0] == 'uniform') {$data1->Product_ID = "PUMD-" . $order_item->pid;} else if ($type[0] == 'online_boutique') {$data1->Product_ID = "POMD-" . $order_item->pid;}

            $data1->Reason = $this->db->get_where('cancel_reasons', array('id' => $fab->reason))->row()->reason;
            $data1->Description = $fab->description;
            $data1->Price = $order_item->price;
            if ($fab->approvedornot == 'disapprove') {$data1->Status = "disapproved";} else if ($fab->approvedornot == 'approve') {$data1->Status = "approved";} else { $data1->Status = "pending";}
            //
            $data[] = $data1;
        }
        $this->excel->stream('cancel_requests.xls', $data);

    }

    public function download_pdf()
    {
        ob_start();
        $sorting = $this->session->userdata('sorting');
        $vid = $this->session->userdata('vid');
        //print_r($sorting);

        $this->load->library('Pdf');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once dirname(__FILE__) . '/lang/eng.php';
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
<th><b>Product Name</b></th>
<th><b>Cost</b></th></tr>

';
        if ($sorting == 'w_order') {
            $items = $this->w_order();
        } else if ($sorting == 't_order') {
            $items = $this->t_order();

        } else if ($sorting == 'm_order') {
            $items = $this->m_order();

        } else {
            $items = $this->all_order();
        }
        $markup = $this->db->get_where('vendor', array('vid' => $vid))->row()->markup;
        if (!empty($items)) {
            $i = 1; //print_r($orders
            $paid = 0;
            $due = 0;
            foreach ($items as $item) {
                if (!empty($item)) {
                    $order_date = $this->db->get_where("orders", array("oid" => $item->oid))->row();

                    $tax_price = (($item->subtotal) * ($markup)) / 100;
                    $tax_price = round(($item->subtotal) - $tax_price);
                    $html .= "<tr><td>$item->oid</td>

<td>$order_date->odate</td>
<td>$item->pname (";

                    $type = explode('/', $item->pimg);

                    if ($type[0] == 'accessories') {$html .= "PAMD-" . $item->pid;} else if ($type[0] == 'fabrics') {$html .= "PFMD-" . $item->pid;} else if ($type[0] == 'uniform') {$html .= "PUMD-" . $item->pid;} else if ($type[0] == 'online_boutique') {$html .= "POMD-" . $item->pid;}$html .= ") </td>
<td>


      $tax_price</td>
</tr>
";}}}

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

        if ($_POST['sid'] == 't_order') {
            $this->session->set_userdata('sorting', 't_order');

            $items = $this->t_order();
            //print_r($items);

        } else if ($_POST['sid'] == 'w_order') {
            $this->session->set_userdata('sorting', 'w_order');

            $items = $this->w_order();

        } else if ($_POST['sid'] == 'm_order') {
            $this->session->set_userdata('sorting', 'm_order');
            $items = $this->m_order();

        } else if ($_POST['sid'] == 'y_order') {

            $d = date("Y", strtotime("-1 year"));
            $last_year_first = $d . '-1-1';
            $last_year_last = $d . '-12-31';

            $this->db->where('odate BETWEEN "' . $last_year_first . '" and "' . $last_year_last . '"');

            $year_orders = $this->db->get("orders")->result();
            foreach ($year_orders as $orders) {
                //print_r($orders);
                $items[] = $this->db->get_where("order_items", array('oid' => $orders->oid, 'vendor_id' => $vid))->row();
            }

        } else if ($_POST['sid'] == 'all') {
            $items = $this->all_order();
        }
        $markup = $this->db->get_where('vendor', array('vid' => $vid))->row()->markup;

        if (!empty($items)) {
            $i = 1; //print_r($orders
            $paid = 0;
            $due = 0;
            foreach ($items as $item) {
                if (!empty($item)) {

                    if ($item->price == "paid") {$paid = $paid + $item->price;}
                    if ($item->status == "") {$due = $due + $item->price;}
                    ?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $item->oid; ?></td>
                          <td><?php
$order_date = $this->db->get_where("orders", array("oid" => $item->oid))->row();
                    echo " $order_date->odate </td><td>";

                    echo $item->pname . " (";?>
                            <?php $type = explode('/', $item->pimg);

                    if ($type[0] == 'accessories') {echo "PAMD-" . $item->pid;} else if ($type[0] == 'fabrics') {echo "PFMD-" . $item->pid;} else if ($type[0] == 'uniform') {echo "PUMD-" . $item->pid;} else if ($type[0] == 'online_boutique') {echo "POMD-" . $item->pid;}?> ) </td>

                          <td>Rs. <?php
echo $item->subtotal; ?>/- </td>

                          <td>Rs. <?php $tax_price = (($item->subtotal) * ($markup)) / 100;
                    $tax_price = round(($item->subtotal) - $tax_price);

                    echo $tax_price;?>/- <?php if ($item->status == "") {?>
                          <span class="label label-warning">Due</span>
                          <?php } else {?>
                           <span class="label label-success">Paid</span><?php }?></td>
                           <td><a href="<?php echo base_url(); ?>Vendor/product_detail/<?php echo $item->oid; ?>"><button class="btn btn-xs btn-success" id="view_detail"><i class="fa fa-eye"></i></button></a></td>


                        </tr>
                        <?php $i++;
                }}}
    }

    public function vendor_finance()
    {

        $vid = $this->session->userdata('vid');
        $this->session->set_userdata('sorting', '');

        //$vendor=$this->db->get_where("vendor",array("vid"=>$vid))->result();
        //$data['pending']=$this->db->get_where("tailor_assign",array("tid"=>$tid,"sstatus"=>""))->num_rows();
        //$data['completed']=$this->db->get_where("tailor_assign",array("tid"=>$tid,"sstatus"=>"completed"))->num_rows();

        $this->db->select('*');
        $this->db->order_by("id", "desc");
        $this->db->from('order_items');

        $this->db->where("vendor_id", $vid);
        $data['items'] = $this->db->get()->result(); //",array("tid"=>$tid))->result();
        $this->db->update('order_items', array('vendor_notification' => 0));
        //echo "<pre>";print_r($data);exit;

        $this->db->where("vid", $vid);
        $data['markup'] = $this->db->get('vendor')->row()->markup;

        $this->template['middle'] = $this->load->view($this->middle = 'vendor/vendor_orders', $data, true);
        $this->vendorlayout();
    }

    public function order_notification($id)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("oid", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("order_notification" => "yes");
        $this->db->update('order_items', $data);
        redirect('Vendor/order_shipping_status/' . $id);
    }

    public function fabric_notification($id)
    {

        $vid = $this->session->userdata('vid');
        $this->db->where("id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("vendor_notification" => "yes");
        $this->db->update('fabric', $data);
        $this->db->where("p_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("read_status" => 1);
        $this->db->update('disapprove', $data);
        redirect('Vendor/add_fabric/' . $id);
    }

    public function uniform_notification($id)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("uniform_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("vendor_notification" => "yes");
        $this->db->update('uniform', $data);

        $this->db->where("p_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("read_status" => 1);
        $this->db->update('disapprove', $data);

        redirect('Vendor/add_uniform/' . $id);
    }

    public function acc_notification($id)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("acc_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("vendor_notification" => "yes");
        $this->db->update('accessories', $data);

        $this->db->where("p_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("read_status" => 1);
        $this->db->update('disapprove', $data);

        redirect('Vendor/add_accessories/' . $id);
    }

    public function boutique_notification($id)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("vendor_notification" => "yes");
        $this->db->update('online_boutique', $data);

        $this->db->where("p_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("read_status" => 1);
        $this->db->update('disapprove', $data);

        redirect('Vendor/add_online/' . $id);
    }
    public function service_notification($id)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("vendor_notification" => "yes");
        $this->db->update('more_services', $data);

        $this->db->where("p_id", $id);
        $this->db->where("vendor_id", $vid);
        $data = array("read_status" => 1);
        $this->db->update('disapprove', $data);

        redirect('Vendor/more_services/' . $id);
    }

    public function product_detail($oid)
    {
        $vid = $this->session->userdata('vid');
        $this->db->where("oid", $oid);
        $data = array("read_status" => "yes");
        $this->db->update('orders', $data);

        $this->db->select('*');
        $this->db->from('orders');

        $this->db->join('users', 'orders.userid = users.uid');
        $this->db->where(array("oid" => $oid));

        $orders = $this->db->get();
        $data['order'] = $orders->row();
        $data['items'] = $this->db->get_where("order_items", array("oid" => $oid, "vendor_id" => $vid))->result();

        $this->db->where("oid", $oid);
        $this->db->update('order_items', array('vendor_notification' => 0));
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/order_detail', $data, true);
        $this->vendorlayout();
    }

    public function test()
    {
        function gen_random_string($length = 6)
        {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //length:36

            $final_rand = '';

            for ($i = 0; $i < $length; $i++) {
                $final_rand .= $chars[rand(0, strlen($chars) - 1)];
            }
            return $final_rand;
        }
        $activation_code = gen_random_string();

        $mobileNumber = '07034176342';
        $message = 'Test. Please verify your phone number with this pin "' . $activation_code;
        $senderid = 'ANSVEL REG';
        $to = $mobileNumber;
        $token = 'WLFW1sqWoE1nfSaGpAEvpc8WkKztRqKKqHASm1I3w2bG5SRHxX2kdKAhBptn3lMQKyBLwlBVJ2rPC1BvDthX4PLYNM0TzvXa6OTE';
        $baseurl = 'https://smartsmssolutions.com/api/json.php?';

        $sms_array = array
            (
            'sender' => $senderid,
            'to' => $to,
            'message' => $message,
            'type' => '0',
            'routing' => 3,
            'token' => $token,
        );

        $params = http_build_query($sms_array);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $baseurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($ch);

        if (!curl_errno($ch) && substr($response, 29, 13) === '234' . substr($mobileNumber, 1)) {
            echo "Successful<br>";
        } else {
            echo "Failed<br>";
        }

        curl_close($ch);
    }

    public function registration($referred_by = '')
    {
        $contact = $this->input->post('contact');
        $this->form_validation->set_data(array('contact' => $contact, 'referred_by' => $referred_by));
        $this->form_validation->set_rules('contact', 'Contact', 'required|exact_length[11]|numeric|trim');
        $this->form_validation->set_rules('referred_by', 'Referral id', 'max_length[10]|numeric|trim',
            array(
                'max_length' => 'Invalid referral id! Please ensure that your sign-up link is correct.',
                'numeric' => 'Invalid referral id! Please ensure that your sign-up link is correct.'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            redirect("Vendor/vendor_registration/".$referred_by);
        }
        $where = 'contact=' . $contact . ' AND question1!=""';
        $query = $this->db->where($where)->get('vendor');
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('message', 'Sorry this mobile number already exists.');
            redirect("Vendor/vendor_registration/".$referred_by);
        }
        $activation_code = $this->_gen_random_string();

        $mobileNumber = $this->input->post('contact');
        $message = 'Thank you for registrating with ANSVEL. Verify your phone number with this pin ' . $activation_code;
        $senderid = 'ANSVEL AUTH';
        $to = $mobileNumber;
        $token = 'WLFW1sqWoE1nfSaGpAEvpc8WkKztRqKKqHASm1I3w2bG5SRHxX2kdKAhBptn3lMQKyBLwlBVJ2rPC1BvDthX4PLYNM0TzvXa6OTE';
        $baseurl = 'https://smartsmssolutions.com/api/json.php?';

        $sms_array = array
            (
            'sender' => $senderid,
            'to' => $to,
            'message' => $message,
            'type' => '0',
            'routing' => 3,
            'token' => $token,
        );

        $params = http_build_query($sms_array);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $baseurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($ch);

        if (!curl_errno($ch) && substr($response, 29, 13) === '234' . substr($mobileNumber, 1))
        // if(true)
        {
            $this->session->set_flashdata('message', 'Activation code sent to your phone. Please click on next...');
            $contact = $this->input->post('contact');
            $query = $this->db->where(array('contact' => $contact))->get('vendor');
            if ($query->num_rows() > 0) {
                $data = array('token' => $activation_code);
                $this->load->library('session');
                $contactSess = array('contact' => $contact,
                    'token' => $activation_code);
                $this->session->set_userdata($contactSess);
                $this->db->where(array('contact' => $contact, 'referred_by' => $referred_by));
                $this->db->update('vendor', $data);
            } else {
                $data = array('contact' => $mobileNumber,
                    'reg_date' => date('Y-m-d'),
                    'token' => $activation_code,
                    'referred_by' => $referred_by
                );
                $this->load->library('session');
                $contact = array('contact' => $mobileNumber,
                    'token' => $activation_code);
                $this->session->set_userdata($contact);
                $this->db->insert('vendor', $data);
            }
        } else {
            $this->session->set_flashdata('message', 'An error occured. Please try again');
        }
        curl_close($ch);
        redirect("Vendor/vendor_registration");
    }

    private function _gen_random_string($length = 6)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $final_rand = '';

        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public function resend_otp()
    {
        $activation_code = $this->_gen_random_string();

        $mobileNumber = $this->session->userdata('contact');
        $message = 'Thank you for registrating with ANSVEL. Verify your phone number with this pin ' . $activation_code;
        $senderid = 'ANSVEL AUTH';
        $to = $mobileNumber;
        $token = 'WLFW1sqWoE1nfSaGpAEvpc8WkKztRqKKqHASm1I3w2bG5SRHxX2kdKAhBptn3lMQKyBLwlBVJ2rPC1BvDthX4PLYNM0TzvXa6OTE';
        $baseurl = 'https://smartsmssolutions.com/api/json.php?';
        $sms_array = array
            (
            'sender' => $senderid,
            'to' => $to,
            'message' => $message,
            'type' => '0',
            'routing' => 3,
            'token' => $token,
        );

        $params = http_build_query($sms_array);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $baseurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($ch);

        if (!curl_errno($ch) && substr($response, 29, 13) === '234' . substr($mobileNumber, 1)) {
            $data = array('token' => $status);
            $this->db->where('contact', $mobileNumber);
            $info = $this->db->update('vendor', $data);
            $this->load->library('session');
            $contact = array('contact' => $mobileNumber,
                'token' => $status);
            $this->session->set_userdata($contact);
            if ($info) {
                $this->session->set_flashdata('message', 'Activation Code sent to your phone. Please Click on next...');
                echo 'true';
            } else {
                $this->session->set_flashdata('message', 'An error occured. Please try again');
                echo 'false';
            }
        } else {
            $this->session->set_flashdata('message', 'An error occured. Please try again');
        }
        curl_close($ch);
    }

    public function chk_token()
    {
        $this->form_validation->set_rules('token', 'Token', 'required|exact_length[6]|alpha_numeric|trim');
        switch (true) {
            case $this->form_validation->run() === false;
                echo validation_errors();
                break;

            default:
                $contact = $this->session->userdata('contact');
                $details = $this->db->where(array('contact' => $contact))->get('vendor')->row_array();
                $token = $this->input->post('token');
                switch ($details['token']) {
                    case $token:
                        $this->db->where(array('contact' => $contact))->set(array('token' => 1))->update('vendor');
                        echo 'true';
                        break;

                    case 1:
                        echo 'true';
                        break;

                    default:
                        echo 'Invalid OTP';
                }
        }
    }

    public function registration_insert()
    {
        $this->load->library('upload');
        $config['upload_path'] = './assets/images/profile_images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '20480';
        $config['max_filename'] = '200';
        $config['file_ext_tolower'] = true;
        $config['max_filename_increment'] = '10';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
        $this->form_validation->set_rules('vendor_name', 'Vendor name', 'required|min_length[2]|max_length[100]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[1024]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[250]|valid_email|is_unique[vendor.email]|trim',
            array(
                'is_unique' => 'This email already exists.',
            )
        );
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[2]|max_length[1024]|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|min_length[1]|max_length[6]|numeric|trim');
        $this->form_validation->set_rules('city', 'City', 'required|min_length[1]|max_length[6]|numeric|trim');
        $this->form_validation->set_rules('state', 'State', 'required|min_length[1]|max_length[6]|numeric|trim');
        $this->form_validation->set_rules('pincode', 'Pincode', 'min_length[1]|max_length[20]|numeric|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|in_list[Vendor,Service provider]|trim');
        $this->form_validation->set_rules('id_type', 'ID type', 'required|in_list[Passport,Voters Card,Drivers License,NIN Card]|trim');
        $this->form_validation->set_rules('bio', 'Bio', 'required|max_length[6143]|trim');

        $contact = $this->session->userdata('contact');
        switch (TRUE) {
            case empty($_FILES['id_proof']['name']):
                echo 'id proof file not selected';
                break;

            case empty($this->db->where(array('contact' => $contact, 'token' => 1))->get('vendor')->row_array()):
                echo 'Please validate your phone number';
                break;

            case ! $this->upload->do_upload('id_proof'):
                echo $this->upload->display_errors();
                break;

            case $this->form_validation->run() === FALSE:
                echo validation_errors();
                break;

            default:
                $file = $this->upload->data()['file_name'];
                $image = $banner = $referral_link = '';
                if( ! empty($_FILES['image']['name']))
                {
                    $this->upload->do_upload('image');
                    $image = $this->upload->data()['file_name'];
                }
                if( ! empty($_FILES['banner']['name']))
                {
                    $this->upload->do_upload('banner');
                    $banner = $this->upload->data()['file_name'];
                }
                $data = array(
                    'vendor_name' => $this->input->post('vendor_name'),
                    'password' => md5($this->input->post('password')),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'pincode' => $this->input->post('pincode'),
                    'category' => $this->input->post('category'),
                    'id_type' => $this->input->post('id_type'),
                    'id_proof' => $file,
                    'bio' => $this->input->post('bio'),
                    'image' => $image,
                    'banner' => $banner
                );
                $data['option'] = $data['category'] == 'Service provider' ? '' : implode(',', $this->input->post('option'));
                $where = array('contact' => $contact);
                if ($this->db->set($data)->where($where)->update('vendor')) {
                    if($this->input->post('category') == 'Service provider')
                    {
                        $referral_link = '<p>Please find below, your referral links for vendor registration. 
                        Please note that for you to earn commission on vendor sales activity, the vendor has to register with this link.<br>
                        '.base_url() . 'vendor/vendor_registration/' . $this->db->insert_id(). '</p>';
                    }
                
                    $message = '<!DOCTYPE html>
            <html>
            <head>
                <title></title>
            </head>
            <body>
            <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                <div id="inouter" style="border-bottom:2px dashed #444;">
                <br>
                <img src="' . base_url() . 'assets/images/logo2.jpg">
                <br>
                <h2>Welcome to Ansvel!</h2>
                <br>
                <p>Dear ' . $this->input->post("vendor_name") . ',</p>
                <p>Thank you for registering with Ansvel. Please use your e-mail address to log in to your account at <a href="https://ansvel.com/vendor">https://ansvel.com/vendor:</a></p>
                '.$referral_link.'
                <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a href="mailto:support@ansvel.com">support@ansvel.com</a> or call us at 07034176342 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>
                <p>We hope you enjoy our products and services.</p>
                <p>Best Regards,</p>
                <br>
                <p>Team Ansvel</p>
                <br>
                <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +2347034176342 <img src="' . base_url("assets/sociallinks/cod.png") . '" style="float: right;"></p>
                <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                <p align="center"><img width="4%" src="' . base_url("assets/sociallinks/facebook_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/twitter_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/google_square-24.png") . '"> <img src="' . base_url("assets/sociallinks/tumblr.png") . '" width="4%"> <img width="4%" src="' . base_url("assets/sociallinks/instagram_square_color-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/youtube_square_color-24.png") . '"></p>
                </div>
                <p class="small" style="text-align: center;">Copyright  &copy 2017 Ansvel.com.</p>
            </div>
            </body>
            </html>';
                    $to_email = $this->input->post('email');
                    $this->load->library('email');
                    $this->email->initialize(array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_user' => 'absoluteinnovationspl2@gmail.com',
                        'smtp_pass' => 'Abs@2017',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => true,
                        'crlf' => "\r\n",
                        'newline' => "\r\n",
                    ));
                    $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
                    $this->email->to($to_email);
                    $this->email->subject('Ansvel');
                    $this->email->message($message);
                    ENVIRONMENT == 'production' ? $this->email->send() : NULL;

                    $this->session->set_flashdata('message', 'Your Personal information inserted Successfully.Please go to next...');
                    echo 'true';
                } else {
                    echo 'An error occured. Please try again';
                }
        }
    }

    public function insert_question()
    {
        $this->form_validation->set_rules('question1', 'Question 1', 'required|max_length[120]|trim');
        $this->form_validation->set_rules('question2', 'Question 2', 'required|max_length[120]|trim');
        $this->form_validation->set_rules('question3', 'Question 3', 'required|max_length[120]|trim');
        $this->form_validation->set_rules('question4', 'Question 4', 'required|max_length[120]|trim');
        $this->form_validation->set_rules('question5', 'Question 5', 'required|max_length[120]|trim');
        switch (TRUE) {
            case $this->form_validation->run() === FALSE;
                echo validation_errors();
                break;

            default:
                $data = array(
                    'question1' => $this->input->post('question1'),
                    'question2' => $this->input->post('question2'),
                    'question3' => $this->input->post('question3'),
                    'question4' => $this->input->post('question4'),
                    'question5' => $this->input->post('question5'));
                $contact = $this->session->userdata('contact');
                $this->db->where('contact', $contact);
                if ($this->db->update('vendor', $data)) {
                    $this->session->unset_userdata('contact');
                    $this->session->unset_userdata('token');
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('message', 'Your information inserted Successfully.Please go to Login...');
                    echo 'true';
                } else {
                    $this->session->set_flashdata('message', 'Please Enter all information.');
                    echo 'false';
                }
        }
    }

    public function registration_bank()
    {
        $this->form_validation->set_rules('acc_name', 'Account name', 'required|max_length[255]|trim');
        $this->form_validation->set_rules('acc_number', 'Account number', 'required|numeric|exact_length[10]|trim');
        $this->form_validation->set_rules('re_acc_number', 'Re-enter account number', 'required|matches[acc_number]|trim');
        $this->form_validation->set_rules('bank_name', 'Bank name', 'required|in_list[Access Bank Plc,Access (Diamond),Citibank Nigeria Limited,Ecobank Nigeria Plc,Fidelity Bank Plc,FIRST BANK NIGERIA LIMITED,First City Monument Bank Plc,Globus Bank Limited,Guaranty Trust Bank Plc,Heritage Bank Ltd,Key Stone Bank ,Polaris Bank,Providus Bank,Stanbic IBTC Bank Ltd,Standard Chartered Bank Nigeria Ltd,Sterling Bank Plc,SunTrust Bank Nigeria Limited,Titan Trust Bank Ltd,Union Bank of Nigeria Plc,United Bank For Africa Plc,Unity Bank Plc,Wema Bank Plc,Zenith Bank Plc]|trim');
        $this->form_validation->set_rules('sort_code', 'Sort code', 'required|numeric|max_length[20]|trim');
        $this->form_validation->set_rules('tin', 'Tax identification number', 'required|numeric|max_length[50]|trim');
        $this->form_validation->set_rules('acc_type', 'Account type', 'required|in_list[Corporate,Current,Savings]|trim');
        $this->form_validation->set_rules('acc_class', 'Account class', 'required|in_list[Individual,Limited liability]|trim');
        $this->form_validation->set_rules('business_name', 'Business name', 'required|max_length[50]|trim');
        switch (true) {
            case $this->form_validation->run() === FALSE:
                echo validation_errors();
                break;

            default:
                $contact = $this->session->userdata('contact');
                $data = array(
                    "account_name" => $this->input->post('acc_name'),
                    "acc_number" => $this->input->post('acc_number'),
                    "bank_name" => $this->input->post('bank_name'),
                    "sort_code" => $this->input->post('sort_code'),
                    "tin" => $this->input->post('tin'),
                    "acc_type" => $this->input->post('acc_type'),
                    "acc_class" => $this->input->post('acc_class'),
                    "business_name" => $this->input->post('business_name'),
                );
                $this->db->where("contact", $contact);
                if ($this->db->update('vendor', $data)) {
                    echo 'true';
                } else {
                    echo 'false';
                }
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[250]|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[1024]|trim');
        switch(TRUE)
        {
            case $this->form_validation->run() === FALSE:
                $this->session->set_flashdata('msg', validation_errors());
                redirect('Vendor');
            break;

            case empty($vendor = $this->db->where(array('email' => $this->input->post('email'), 'password' => md5($this->input->post("password"))))->get('vendor')->row()):
                $this->session->set_flashdata('msg', 'Invalid email or password.');
                redirect('Vendor');
            break;

            case $vendor->approve_status !== 'yes':
                $this->session->set_flashdata('msg', 'This account has not yet been approved.');
                redirect('Vendor');
            break;

            default:
                $data = array("vendor_loggedin" => "true",
                    "user" => "vendor",
                    "vid" => $vendor->vid,
                    "username" => $vendor->vendor_name,
                );
                $this->session->set_userdata($data);
                redirect("Vendor/dashboard");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Vendor");
    }

    public function profile()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $data['vendor'] = $this->db->get_where("vendor", array("vid" => $vid))->row();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/profile', $data, true);
        $this->vendorlayout();
    }

    public function change_pass()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        //echo md5($_POST['op']
        $vid = $this->session->userdata('vid');
        $chk = $this->db->get_where("vendor", array("vid" => $vid, "password" => md5($_POST['op'])))->row();
        if ($chk) {

            $data = array("password" => md5($_POST['np']));
            $this->db->where("vid", $chk->vid);
            if ($this->db->update("vendor", $data) == true) {
                echo "Password Changed Successfully.";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }

    public function check_email()
    {
        $this->load->library('session');
        $chk2 = $this->db->get_where("vendor", array("email" => $_POST['femail']));
        $chk3 = $chk2->num_rows();
        if ($chk3 > 0) {
            echo 'true';
        }
    }

    public function forget_password()
    {
        $this->load->library('session');
        $chk2 = $this->db->get_where("vendor", array("email" => $_POST['femail']));
        $chk3 = $chk2->num_rows();
        if ($chk3 > 0) {
            $vinfo = $chk2->row();
            $message = '
                <!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                    </head>
                    <body>
                    <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                        <div id="inouter" style="border-bottom:2px dashed #444;">
                        <br>
                        <img src="http://ansvel.com/assets/images/logo2.jpg">
                        <br>
                        <h2>Welcome to Ansvel!</h2>
                        <br>

                        <p>Dear  ' . $vinfo->vendor_name . ',</p>
                        <p>Thank you for registering with Ansvel. Please use your e-mail address to log in to your account at <a href="http://ansvel.com/">http://ansvel.com/:</a></p>

                        <p><b><a href="' . base_url("Vendor/newpassword") . '">Create New Password</a></p>
                        <br>

                        <p>This email can\'t receive replies. If you have any questionsor need help with something regarding our products, please contact our customer support at <a href="#">support@ansvel.com</a> or call us at +2347034176342 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                        <p>We hope you enjoy our products and services.</p>

                        <p>Best Regards,</p>
                        <br>
                        <p>Team Ansvel</p>
                        <br>
                        <p class="footer" style="background-color: #27638e;color:#fff;padding: 2%;font-size: 13px;">Need Help? Call us on +2347034176342 <img src="' . base_url("assets/sociallinks/cod.png") . '" style="float: right;"></p>
                        <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                        <p align="center"><img width="4%" src="' . base_url("assets/sociallinks/facebook_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/twitter_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/google_square-24.png") . '"> <img src="' . base_url("assets/sociallinks/tumblr.png") . '" width="4%"> <img width="4%" src="' . base_url("assets/sociallinks/instagram_square_color-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/youtube_square_color-24.png") . '"></p>
                        </div>
                        <p class="small" style="text-align: center;">Copyright&copy 2017 Ansvel.com Powered by Absolute Innovations</p>
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
                'wordwrap' => true,
                'crlf' => "\r\n",
                'newline' => "\r\n",
            ));

            $to_email = $_POST['femail'];

            //$mail_count= count($to_mail);
            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($to_email);
            $this->email->subject('Ansvel Forgot Password');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear();
            $this->session->set_userdata('vn_id', $to_email);

            echo "true";
        } else {
            echo "This Email Id Incorrect.";
        }
    }

    public function newpassword()
    {
        $this->load->view("vendor/new_password");
    }

    public function changenew_pass()
    {
        $chk = $this->db->get_where("vendor", array("email" => $this->session->userdata("vn_id")));
        if ($chk->num_rows() > 0) {
            $data = array("password" => md5($_POST['np']));
            $this->db->where("email", $this->session->userdata("vn_id"));
            if ($this->db->update("vendor", $data) == true) {
                $this->session->unset_userdata('vn_id');
                echo "true";
            } else {
                echo "Password Could not be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }

    public function profile_update()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        //echo md5($_POST['op']
        $vid = $this->session->userdata('vid');
        // echo "<pre>";print_r($_POST);exit;
        $file = $this->input->post('oldimage');
        if (!empty($_FILES["photo"]["name"])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1000000';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('photo')) {
                echo $this->upload->display_errors();
            } else {
                $pic = $this->upload->data();
                //print_r($pic);exit;
                $file = $pic['file_name'];
                //$type="image";
            }
        }

        if ($this->input->post('deal_type') == 'No') {
            $pan = '';
            $vat = '';
            $tin = '';
            $gst = '';
        } else {
            $pan = $this->input->post('pan_number');
            $vat = $this->input->post('vat_number');
            $tin = $this->input->post('tin_number');
            $gst = $this->input->post('gst_number');
        }

        $data = array("username" => $this->input->post('username'),
            "account_holder" => $this->input->post('account_holder'),
            //"option"=>implode(",",$this->input->post("option")),
            "address" => $this->input->post('address'),
            "country" => $this->input->post('country'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "contact" => $this->input->post('contact'),
            "phone2" => $this->input->post('phone2'),
            "id_proof" => $file,
            "id_type" => $this->input->post('id_type'),
            "acc_number" => $this->input->post('acc_number'),
            "acc_type" => $this->input->post('acc_type'),
            "branch_name" => $this->input->post('branch_name'),
            "bank_ifc" => $this->input->post('bank_ifc'),
            "pan_number" => $pan,
            "vat_number" => $vat,
            "tin_number" => $tin,
            "gst_number" => $gst,
        );

        $this->db->where("vid", $vid);
        if ($this->db->update('vendor', $data)) {

        }
        redirect("Vendor/profile");
    }

    public function add_fabric($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $userName = $this->session->userdata('username');
        $vid = $this->session->userdata('vid');
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("title")) {
                $config['upload_path'] = './assets/images/fabrics/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = $this->input->post("oldt");
                $front = $this->input->post("oldf");
                $back = $this->input->post("oldb");
                $sizing_guide = $this->input->post("olds");
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $front = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $back = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image($pic);
                        }
                    }
                }
                $tax_price = $this->input->post("wholesale_price") * $this->input->post("tax") / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;

                $data = array("title" => $this->input->post("title"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "thumb" => $cover,
                    "front" => $front,
                    "min_quan_to_buy" => $this->input->post("min_quan_to_buy"),
                    "back" => $back,
                    "sizing_guide" => $sizing_guide,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "category" => $this->input->post("category"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "quantity" => $this->input->post("quantity"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "ptype" => $this->input->post("type_product"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove',
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("d-m-Y"));
                $this->db->where('id', $this->uri->segment(3));
                if ($this->db->update('fabric', $data)) {
                    $this->session->set_flashdata('message', 'Product Updated successfully.');
                    $pid = $this->db->get_where("fabric_search", array("product_id" => $this->uri->segment(3)))->row();
                    if (!empty($pid)) {
                        $search_data = array("product_id" => $this->uri->segment(3),
                            "filter_subcategory_fcid" => implode(",", $this->input->post("fabric_search")));
                        $this->db->where("product_id", $this->uri->segment(3));
                        $this->db->update('fabric_search', $search_data);
                        $msg = "Category Updated Successfully.";
                    } else {
                        $insert_id = $this->uri->segment(3);
                        $search_data = array("product_id" => $insert_id,
                            "filter_subcategory_fcid" => implode(",", $this->input->post("fabric_search")));
                        $this->db->insert('fabric_search', $search_data);
                        $msg = "New Category Added Successfully.";

                    }

                } else {
                    $msg = "Category Couldnot be Updated.";
                }
                redirect("Vendor/add_fabric/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("title")) {
                $config['upload_path'] = './assets/images/fabrics/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = "cover.jpg";
                $front = "front.jpg";
                $back = "back.jpg";
                $sizing_guide = "size.jpg";
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $front = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $back = $pic['file_name'];
                        $this->resize_image($pic);
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image($pic);
                        }
                    }
                }
                $tax_price = $this->input->post("wholesale_price") * $this->input->post("tax") / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;

                $data = array("title" => $this->input->post("title"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "thumb" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "min_quan_to_buy" => $this->input->post("min_quan_to_buy"),
                    "category" => $this->input->post("category"),
                    "sizing_guide" => $sizing_guide,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "quantity" => $this->input->post("quantity"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "ptype" => $this->input->post("type_product"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove',
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("d-m-Y"));
                if ($this->db->insert('fabric', $data)) {
                    $this->session->set_flashdata('message', 'Product Saved successfully.');
                    $insert_id = $this->db->insert_id();
                    $search_data = array("product_id" => $insert_id,
                        "filter_subcategory_fcid" => implode(",", $this->input->post("fabric_search")));
                    $this->db->insert('fabric_search', $search_data);
                    $msg = "New Category Added Successfully.";
                } else {
                    $msg = "Category Couldnot be Added.";
                }
                redirect("Vendor/add_fabric/" . $insert_id);

            }

        }
        $this->middle = 'vendor/add_fabric_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_fabric_meta($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            $this->db->where("id", $this->uri->segment(3));
            if ($this->db->update('fabric', $data)) {
                $msg = "Meta Updated Successfully.";
            } else {
                $msg = "Meta Couldnot be Updated.";
            }
            redirect("Vendor/add_fabric/" . $this->uri->segment(3));
        } else {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            if ($this->db->insert('fabric', $data)) {
                $msg = "New Meta Added Successfully.";
            } else {
                $msg = "Meta Couldnot be Added.";
            }
            redirect("Vendor/add_fabric");

        }
        $this->middle = 'vendor/add_fabric_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_fabric_city($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('fabric', $data)) {
                    $msg = "fabric Updated Successfully.";
                } else {
                    $msg = "fabric Couldnot be Updated.";
                }
                redirect("Vendor/add_fabric/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                if ($this->db->insert('fabric', $data)) {
                    $msg = "New fabric Added Successfully.";
                } else {
                    $msg = "fabric Couldnot be Added.";
                }
                redirect("Vendor/add_fabric");

            }

        }

        $this->middle = 'vendor/add_fabric_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_fabric_offer($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('fabric', $data)) {
                    $msg = "fabric Offer Updated Successfully.";
                } else {
                    $msg = "fabric Offer Couldnot be Updated.";
                }
                redirect("Vendor/add_fabric/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');

                if ($this->db->insert('fabric', $data)) {
                    $msg = "New fabric Offer Added Successfully.";
                } else {
                    $msg = "fabric Offer Couldnot be Added.";
                }
                redirect("Vendor/add_fabric");

            }

        }

        $this->middle = 'vendor/add_fabric_vendor';
        $this->vendorlayout();

    }

    public function fabrics()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("fabric", array("status" => 'disapprove', "vendor_id" => $vid));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/vendor_products', $data, true);
        $this->vendorlayout();
    }

    public function fabrics_approve()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("fabric", array("vendor_id" => $vid, "status" => 'approve'));
        $data['totalpro'] = $all->num_rows();
        $data['approve'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/vendor_products_approve', $data, true);
        $this->vendorlayout();
    }
    public function resize_image($pic)
    {
        $this->load->library('image_lib');
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/fabrics/resized_fabric/resize400_600', //path to
            'maintain_ratio' => true,
            'width' => 400,
            'height' => 600,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/fabrics/resized_fabric/resize800_1200', //path to
            'maintain_ratio' => true,
            'width' => 800,
            'height' => 1200,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/fabrics/resized_fabric/small', //path to
            'maintain_ratio' => true,
            'width' => 54,
            'height' => 74,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

    }
    public function resize_image_acc($pic)
    {
        $this->load->library('image_lib');
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/accessories/resized_accessories/resize400_600', //path to
            'maintain_ratio' => true,
            'width' => 400,
            'height' => 600,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/accessories/resized_accessories/resize800_1200', //path to
            'maintain_ratio' => true,
            'width' => 800,
            'height' => 1200,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/accessories/resized_accessories/small', //path to
            'maintain_ratio' => true,
            'width' => 54,
            'height' => 74,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

    }
    public function resize_image_more_services($pic)
    {
        $this->load->library('image_lib');
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/more_services/resized_more_services/resize400_600', //path to
            'maintain_ratio' => true,
            'width' => 400,
            'height' => 600,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/more_services/resized_more_services/resize800_1200', //path to
            'maintain_ratio' => true,
            'width' => 800,
            'height' => 1200,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/more_services/resized_more_services/small', //path to
            'maintain_ratio' => true,
            'width' => 54,
            'height' => 74,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

    }
    public function resize_image_uni($pic)
    {
        $this->load->library('image_lib');
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/uniform/resized_uniform/resize400_600', //path to
            'maintain_ratio' => true,
            'width' => 400,
            'height' => 600,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/uniform/resized_uniform/resize800_1200', //path to
            'maintain_ratio' => true,
            'width' => 800,
            'height' => 1200,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/uniform/resized_uniform/small', //path to
            'maintain_ratio' => true,
            'width' => 54,
            'height' => 74,
        );
        //$this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

    }
    public function resize_image_on($pic)
    {
        $this->load->library('image_lib');
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/online_boutique/resized_online_boutique/resize400_600', //path to
            'maintain_ratio' => true,
            'width' => 400,
            'height' => 600,
        );
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/online_boutique/resized_online_boutique/resize800_1200', //path to
            'maintain_ratio' => true,
            'width' => 800,
            'height' => 1200,
        );
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $pic['full_path'],
            'new_image' => './assets/images/online_boutique/resized_online_boutique/small', //path to
            'maintain_ratio' => true,
            'width' => 54,
            'height' => 74,
        );
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

    }
    public function add_accessories($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $userName = $this->session->userdata('username');
        $vid = $this->session->userdata('vid');
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("main_category")) {
                $config['upload_path'] = './assets/images/accessories/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = $this->input->post("oldt");
                $front = $this->input->post("oldf");
                $back = $this->input->post("oldb");
                $sizing_guide = $this->input->post("olds");
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
                        if ($_POST['fabricc_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $cover = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['front_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $front = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['back_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $back = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                $tax_price = (($this->input->post("wholesale_price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;
                $data = array("main_category" => $this->input->post("main_category"),
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "brand" => $this->input->post("brand"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "thumb" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "sizing_guide" => $sizing_guide,
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                $this->db->where("acc_id", $this->uri->segment(3));
                if ($this->db->update('accessories', $data)) {
                    $this->session->set_flashdata('message', 'Product Updated successfully.');
                    $pid = $this->db->get_where("accessories_search", array("product_id" => $this->uri->segment(3)))->row();
                    if (!empty($pid)) {
                        $search_data = array("product_id" => $this->uri->segment(3),
                            "filter_subcategory_fcid" => implode(",", $this->input->post("accessories_search")));
                        $this->db->where("product_id", $this->uri->segment(3));
                        $this->db->update('accessories_search', $search_data);
                        $msg = "Accessories Updated Successfully.";
                    } else {
                        $insert_id = $this->uri->segment(3);
                        $search_data = array("product_id" => $insert_id,
                            "filter_subcategory_fcid" => implode(",", $this->input->post("accessories_search")));
                        $this->db->insert('accessories_search', $search_data);
                        $msg = "New accessories Added Successfully.";

                    }
                } else {
                    $msg = "Accessories Couldnot be Updated.";
                }
                redirect("Vendor/add_accessories/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("main_category")) {
                $config['upload_path'] = './assets/images/accessories/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = "cover.jpg";
                $front = "front.jpg";
                $back = "back.jpg";
                $sizing_guide = "size.jpg";
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
                        if ($_POST['fabricc_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $cover = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['front_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $front = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['back_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $back = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_acc($pic);
                        }
                    }
                }
                $tax_price = (($this->input->post("wholesale_price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;

                $data = array("main_category" => $this->input->post("main_category"),
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "brand" => $this->input->post("brand"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "thumb" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sizing_guide" => $sizing_guide,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                if ($this->db->insert('accessories', $data)) {
                    $this->session->set_flashdata('message', 'Product Saved successfully.');
                    $insert_id = $this->db->insert_id();
                    $search_data = array("product_id" => $insert_id,
                        "filter_subcategory_fcid" => implode(",", $this->input->post("accessories_search")));
                    $this->db->insert('accessories_search', $search_data);
                    $msg = "New accessories Added Successfully.";
                } else {
                    $msg = "accessories Couldnot be Added.";
                }
                redirect("Vendor/add_accessories/" . $insert_id);

            }

        }

        $this->middle = 'vendor/add_accessories'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_online($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $userName = $this->session->userdata('username');
        $vid = $this->session->userdata('vid');
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("main_category")) {
                $config['upload_path'] = './assets/images/online_boutique/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = $this->input->post("oldt");
                $front = $this->input->post("oldf");
                $back = $this->input->post("oldb");
                $sizing_guide = $this->input->post("olds");
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
                        if ($_POST['fabricc_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $cover = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['front_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $front = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['back_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $back = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                $tax_price = $this->input->post("wholesale_price") * $this->input->post("tax") / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;
                $data = array("main_category" => $this->input->post("main_category"),
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "brand" => $this->input->post("brand"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "thumb" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "sizing_guide" => $sizing_guide,
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "price" => $tax_price,
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('online_boutique', $data)) {
                    $this->session->set_flashdata('message', 'Product Updated successfully.');
                    $pid = $this->db->get_where("online_search", array("product_id" => $this->uri->segment(3)))->row();
                    if (!empty($pid)) {
                        $search_data = array("product_id" => $this->uri->segment(3),
                            "filter_subcategory_fcid" => implode(",", $this->input->post("online_search")));
                        $this->db->where("product_id", $this->uri->segment(3));
                        $this->db->update('online_search', $search_data);
                        $msg = " Updated Successfully.";
                    } else {
                        $insert_id = $this->uri->segment(3);
                        $search_data = array("product_id" => $insert_id,
                            "filter_subcategory_fcid" => implode(",", $this->input->post("online_search")));
                        $this->db->insert('online_search', $search_data);
                        $msg = " Added Successfully.";

                    }
                } else {
                    $msg = " Couldnot be Updated.";
                }
                redirect("Vendor/add_online/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("main_category")) {
                $config['upload_path'] = './assets/images/online_boutique/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = "";
                $front = "";
                $back = "";
                $sizing_guide = "";
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo "<script>alert(".$_POST['fabricc_yes_no'].")</script>";
                        if ($_POST['fabricc_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $cover = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['front_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $front = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['back_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $back = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_on($pic);
                        }
                    }
                }
                $tax_price = $this->input->post("wholesale_price") * $this->input->post("tax") / 100;
                $tax_price = $this->input->post("wholesale_price") + $tax_price;

                $data = array("main_category" => $this->input->post("main_category"),
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "brand" => $this->input->post("brand"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "thumb" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sizing_guide" => $sizing_guide,
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "price_without_tax" => $this->input->post("wholesale_price"),
                    "price" => $tax_price,
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                if ($this->db->insert('online_boutique', $data)) {
                    $this->session->set_flashdata('message', 'Product Saved successfully.');
                    $insert_id = $this->db->insert_id();
                    $search_data = array("product_id" => $insert_id,
                        "filter_subcategory_fcid" => implode(",", $this->input->post("online_search")));
                    $this->db->insert('online_search', $search_data);
                    $msg = " Added Successfully.";
                } else {
                    $msg = " Couldnot be Added.";
                }
                redirect("Vendor/add_online/" . $insert_id);

            }

        }

        $this->middle = 'vendor/online_boutique_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_acc_meta($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            $this->db->where("acc_id", $this->uri->segment(3));
            if ($this->db->update('accessories', $data)) {
                $msg = "Meta Updated Successfully.";
            } else {
                $msg = "Meta Couldnot be Updated.";
            }
            redirect("Vendor/add_accessories/" . $this->uri->segment(3));
        } else {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            if ($this->db->insert('accessories', $data)) {
                $msg = "New Meta Added Successfully.";
            } else {
                $msg = "Meta Couldnot be Added.";
            }
            redirect("Vendor/add_accessories");

        }
        $this->middle = 'vendor/add_accessories'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_online_meta($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            $this->db->where("id", $this->uri->segment(3));
            if ($this->db->update('online_boutique', $data)) {
                $msg = "Meta Updated Successfully.";
            } else {
                $msg = "Meta Couldnot be Updated.";
            }
            redirect("Vendor/add_online/" . $this->uri->segment(3));
        } else {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            if ($this->db->insert('online_boutique', $data)) {
                $msg = "New Meta Added Successfully.";
            } else {
                $msg = "Meta Couldnot be Added.";
            }
            redirect("Vendor/add_online");

        }
        $this->middle = 'vendor/online_boutique_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_online_city($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('online_boutique', $data)) {
                    $msg = " Updated Successfully.";
                } else {
                    $msg = " Couldnot be Updated.";
                }
                redirect("Vendor/add_online/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                if ($this->db->insert('online_boutique', $data)) {
                    $msg = " Added Successfully.";
                } else {
                    $msg = " Couldnot be Added.";
                }
                redirect("Vendor/add_online");

            }

        }

        $this->middle = 'vendor/online_boutique_vendor'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_accessories_city($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                $this->db->where("acc_id", $this->uri->segment(3));
                if ($this->db->update('accessories', $data)) {
                    $msg = "Accessories Updated Successfully.";
                } else {
                    $msg = "Accessories Couldnot be Updated.";
                }
                redirect("Vendor/add_accessories/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                if ($this->db->insert('accessories', $data)) {
                    $msg = "New accessories Added Successfully.";
                } else {
                    $msg = "accessories Couldnot be Added.";
                }
                redirect("Vendor/add_accessories");

            }

        }

        $this->middle = 'vendor/add_accessories'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function clear_offer_online($id)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $data = array("offer_type" => '', "offer_price" => '', "from_date" => '', "to_date" => '', "status" => 'disapprove');
        $this->db->where('id', $id);
        $this->db->update('online_boutique', $data);
        redirect("Vendor/add_online/" . $id);
    }

    public function clear_offer_fabric($id)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $data = array("offer_type" => '', "offer_price" => '', "from_date" => '', "to_date" => '', "status" => 'disapprove');
        $this->db->where('id', $id);
        $this->db->update('fabric', $data);
        redirect("Vendor/add_fabric/" . $id);
    }

    public function clear_offer_acc($id)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $data = array("offer_type" => '', "offer_price" => '', "from_date" => '', "to_date" => '', "status" => 'disapprove');
        $this->db->where('acc_id', $id);
        $this->db->update('accessories', $data);
        redirect("Vendor/add_accessories/" . $id);
    }
    public function clear_offer_uni($id)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $data = array("offer_type" => '', "offer_price" => '', "from_date" => '', "to_date" => '', "status" => 'disapprove');
        $this->db->where('uniform_id', $id);
        $this->db->update('uniform', $data);
        redirect("Vendor/add_uniform/" . $id);
    }

    public function add_acc_offer($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');
                $this->db->where("acc_id", $this->uri->segment(3));
                if ($this->db->update('accessories', $data)) {
                    $msg = "Accessories Offer Updated Successfully.";
                } else {
                    $msg = "Accessories Offer Couldnot be Updated.";
                }
                redirect("Vendor/add_accessories/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');

                if ($this->db->insert('accessories', $data)) {
                    $msg = "New Accessories Offer Added Successfully.";
                } else {
                    $msg = "Accessories Offer Couldnot be Added.";
                }
                redirect("Vendor/add_accessories");

            }

        }

        $this->middle = 'vendor/add_accessories';
        $this->vendorlayout();

    }

    public function add_online_offer($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('online_boutique', $data)) {
                    $msg = " Offer Updated Successfully.";
                } else {
                    $msg = " Offer Couldnot be Updated.";
                }
                redirect("Vendor/add_online/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');

                if ($this->db->insert('online_boutique', $data)) {
                    $msg = " Offer Added Successfully.";
                } else {
                    $msg = " Offer Couldnot be Added.";
                }
                redirect("Vendor/add_online");

            }

        }

        $this->middle = 'vendor/online_boutique_vendor';
        $this->vendorlayout();

    }

    public function more_services($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $userName = $this->session->userdata('username');
        $vid = $this->session->userdata('vid');
        if ($edit == true) {
            //echo "sdf";exit;
            if ($this->input->post("subcategory")) {
                $config['upload_path'] = './assets/images/more_services/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = $this->input->post("oldt");
                //echo $cover;die;
                if (!empty($_FILES["more_services"]["name"])) {

                    if (!$this->upload->do_upload('more_services')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image_more_services($pic);
                    }
                }

                $tax_price = (($this->input->post("price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("price") - $tax_price;
                $data = array(
                    "subcategory" => $this->input->post("subcategory"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("price"),
                    "Tax_Class" => $this->input->post("tax"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "image" => $cover,
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                // echo $data;exit;
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('more_services', $data)) {
                    $this->session->set_flashdata('message', 'Product Updated successfully.');
                    $pid = $this->db->get_where("more_services_search", array("product_id" => $this->uri->segment(3)))->row();
                    if (!empty($pid)) {
                        $search_data = array("product_id" => $this->uri->segment(3),
                            "filter_subcategory_fcid" => implode(",", $this->input->post("more_services_search")));
                        $this->db->where("product_id", $this->uri->segment(3));
                        $this->db->update('more_services_search', $search_data);
                        $msg = "More Services Updated Successfully.";
                    } else {

                        $insert_id = $this->uri->segment(3);
                        $search_data = array("product_id" => $insert_id,
                            "filter_subcategory_fcid" => implode(",", $this->input->post("more_services_search")));
                        $this->db->insert('more_services_search', $search_data);
                        $msg = "New More Services Added Successfully.";

                    }
                } else {
                    $msg = "More Services Couldnot be Updated.";
                }
                redirect("Vendor/more_services/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("subcategory")) {
                $config['upload_path'] = './assets/images/more_services/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = "cover.jpg";
                if (!empty($_FILES["more_services"]["name"])) {

                    if (!$this->upload->do_upload('more_services')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image_more_services($pic);
                    }
                }

                $tax_price = (($this->input->post("price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("price") - $tax_price;
                $data = array(
                    "subcategory" => $this->input->post("subcategory"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("price"),
                    "Tax_Class" => $this->input->post("tax"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "image" => $cover,
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');

                if ($this->db->insert('more_services', $data)) {
                    $this->session->set_flashdata('message', 'Product Saved successfully.');
                    $insert_id = $this->db->insert_id();
                    $search_data = array("product_id" => $insert_id,
                        "filter_subcategory_fcid" => implode(",", $this->input->post("more_services_search")));
                    $this->db->insert('more_services_search', $search_data);
                    $msg = "New More Services Added Successfully.";
                } else {
                    $msg = "More Services Couldnot be Added.";
                }
                redirect("Vendor/more_services/" . $insert_id);

            }

        }

        $this->middle = 'vendor/more_services'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_more_services_offer($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('more_services', $data)) {
                    $msg = "more_services Offer Updated Successfully.";
                } else {
                    $msg = "more_services Offer Couldnot be Updated.";
                }
                redirect("Vendor/more_services/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "status" => 'disapprove');

                if ($this->db->insert('more_services', $data)) {
                    $msg = "New more_services Offer Added Successfully.";
                } else {
                    $msg = "more_services Offer Couldnot be Added.";
                }
                redirect("Vendor/more_services");

            }

        }

        $this->middle = 'vendor/more_services';
        $this->vendorlayout();

    }

    public function add_more_services_city($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                $this->db->where("id", $this->uri->segment(3));
                if ($this->db->update('more_services', $data)) {
                    $msg = "more_services Updated Successfully.";
                } else {
                    $msg = "more_services Couldnot be Updated.";
                }
                redirect("Vendor/more_services/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                if ($this->db->insert('more_services', $data)) {
                    $msg = "New more_services Added Successfully.";
                } else {
                    $msg = "more_services Couldnot be Added.";
                }
                redirect("Vendor/more_services");

            }

        }

        $this->middle = 'vendor/more_services'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_more_services_meta($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            $this->db->where("id", $this->uri->segment(3));
            if ($this->db->update('more_services', $data)) {
                $msg = "Meta Updated Successfully.";
            } else {
                $msg = "Meta Couldnot be Updated.";
            }
            redirect("Vendor/more_services/" . $this->uri->segment(3));
        } else {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            if ($this->db->insert('more_services', $data)) {
                $msg = "New Meta Added Successfully.";
            } else {
                $msg = "Meta Couldnot be Added.";
            }
            redirect("Vendor/more_services");

        }
        $this->middle = 'vendor/more_services'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function all_more_services()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("more_services", array("vendor_id" => $vid, "status" => 'disapprove'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_more_services_view', $data, true);
        $this->vendorlayout();
    }

    public function del_more_service()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $this->db->delete('more_services', array('id' => $_POST['fid']));
    }

    public function more_services_approve()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("more_services", array("vendor_id" => $vid, "status" => 'approve'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_more_services_view', $data, true);
        $this->vendorlayout();
    }

    public function ajax_add_cat_acc()
    {
        //echo $_POST['sid'];exit;
        $data['field_cat'] = $this->db->get_where("accessories_category", array("main_category_id" => $_POST['sid']))->result_array();
        // echo "<pre>";print_r($data);exit;
        $this->load->view('vendor/accessories_ctegory_ajax', $data);
    }
    public function ajax_add_subcat_acc()
    {
        //echo $_POST['sub_id'];exit;
        $data['field_cat'] = $this->db->get_where("accessories_subcategory", array("accessories_category_id" => $_POST['sub_id']))->result_array();
        // echo "<pre>";print_r($data);exit;
        $this->load->view('vendor/sub_category_acc_ajax', $data);
    }

    public function accessories()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("accessories", array("vendor_id" => $vid, "status" => 'disapprove'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_accessories_view', $data, true);
        $this->vendorlayout();
    }

    public function onlines()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("online_boutique", array("vendor_id" => $vid, "status" => 'disapprove'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_online_view', $data, true);
        $this->vendorlayout();
    }

    public function accessories_approve()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("accessories", array("vendor_id" => $vid, "status" => 'approve'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_accessories_view', $data, true);
        $this->vendorlayout();
    }

    public function fetch_type()
    {
        $mid = $this->input->post('mid');
        $mtitle = $this->db
                        ->group_by('mtitle')
                        ->where(array('mid' => $mid, 'status'=>'enable'))
                        ->order_by('cid', 'asc')
                        ->get('category')->result();
        echo json_encode($mtitle);
    }
    
    public function add_designs()
    {
        if ( ! $this->session->userdata('vendor_loggedin'))
        {
            redirect('Vendor');
        }
        $vendor_id = $this->session->userdata('vid');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[100]|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|numeric|in_list[1,2,3]|trim',
            array(
                'numeric' => '%s field is invalid.',
            )
        );
        $this->form_validation->set_rules('type', 'Type', 'required|in_list[Ethnic,Western,Shirts,Trouser,Blazers and Waistcoats,Shirts,Girls,Boys,Traditional]|trim');
        $this->form_validation->set_rules('design-cost', 'Design cost', 'required|is_natural_no_zero|greater_than[10]|less_than[10000000]|trim');
        $this->form_validation->set_rules('material-cost', 'Material cost', 'required|is_natural_no_zero|greater_than[10]|less_than[10000000]|trim');
        $this->form_validation->set_rules('desc', 'Description', 'required|max_length[1024]|trim');
        
        $config['upload_path']              = './assets/images/catalogue/';
        $config['allowed_types']            = 'gif|jpg|png|jpeg';
        $config['max_size']                 = '1000000';
        $config['max_filename']             = '200';
        $config['file_ext_tolower']         = TRUE;
        $config['max_filename_increment']   = '10';
        $config['encrypt_name']             = TRUE;
        $this->upload->initialize($config);
        $data['errors'] = $cover = $right = $left = $sizing_guide = '';
        
        if( ! empty($_FILES['cover']['name']))
        {
            if($this->upload->do_upload('cover'))
            {
                $cover = $this->upload->data()['file_name'];
            } else {
                $data['errors'] = $this->upload->display_errors();
            }
        }
        
        if(empty($data['errors']) && ! empty($_FILES['right']['name']))
        {
            if($this->upload->do_upload('right'))
            {
                $right = $this->upload->data()['file_name'];
            } else {
                $data['errors'] = $this->upload->display_errors();
            }
        }
        
        if(empty($data['errors']) && ! empty($_FILES['left']['name']))
        {
            if($this->upload->do_upload('left'))
            {
                $left = $this->upload->data()['file_name'];
            } else {
                $data['errors'] = $this->upload->display_errors();
            }
        }
        
        if(empty($data['errors']) && ! empty($_FILES['design-sizing-guide']['name']))
        {
            if($this->upload->do_upload('design-sizing-guide'))
            {
                $sizing_guide = $this->upload->data()['file_name'];
            } else {
                $data['errors'] = $this->upload->display_errors();
            }
        }

        switch(TRUE)
        {
            case ! empty($data['errors']):
            
            case $this->form_validation->run() === FALSE:
            break;

            case empty($_FILES['front']):
                $data['errors'] = 'No front view selected.';
            break;
            
            case empty($_FILES['back']):
                $data['errors'] = 'No back view selected.';
            break;

            case ! $this->upload->do_upload('front'):
                $data['errors'] = $this->upload->display_errors();
            break;

            case empty($front = $this->upload->data()['file_name']):
                $data['errors'] = 'An error occured while uploading front view. Please try again.';
            break;

            case ! $this->upload->do_upload('back'):
                $data['errors'] = $this->upload->display_errors();
            break;

            case empty($back = $this->upload->data()['file_name']):
                $data['errors'] = 'An error occured while uploading back view. Please try again.';
            break;

            case empty($set = array(
                'name' => $this->input->post('name'),
                'mid' => $this->input->post('category'),
                'type' => $this->input->post('type'),
                'desc' => $this->input->post('desc'),
                'design_cost' => $this->input->post('design-cost'),
                'material_cost' => $this->input->post('material-cost'),
                'cover' => $cover,
                'front' => $front,
                'back' => $back,
                'right' => $right,
                'left' => $left,
                'sizing_guide' => $sizing_guide,
                'date' => date('Y-m-d'),
                'vendor_id' => $vendor_id
                )):
            break;

            case $this->db->insert('catalog_design_category', $set):
                $data['success'] = 'Catalogue added successfully.';
            break;

            default:
                $data['errors'] = 'An error occured. Please try again.';
        }
        $this->load->view('vendor/header');
        $this->load->view('vendor/add_designs_view', $data);
        $this->load->view('vendor/index');
    }

    public function designs()
    {
        if ( ! $this->session->userdata('vendor_loggedin'))
        {
            redirect('Vendor');
        }
        $vid = $this->session->userdata('vid');
        $data['designs'] = $this->db->get_where('catalog_design_category', array('status' => 'disapprove', 'vendor_id' => $vid))->result();
        $this->load->view('vendor/header', $data);
        $this->load->view('vendor/designs', $data);
        $this->load->view('vendor/index', $data);
    }

    public function designs_approve()
    {
        if (!$this->session->userdata('vendor_loggedin')) {
            redirect('Vendor');
        }
        $vid = $this->session->userdata('vid');
        $data['designs'] = $this->db->get_where('catalog_design_category', array('status' => 'approve', 'vendor_id' => $vid))->result();
        $this->load->view('vendor/header', $data);
        $this->load->view('vendor/designs', $data);
        $this->load->view('vendor/index', $data);
    }

    public function add_uniform($edit = false)
    {
        if ( ! $this->session->userdata('vendor_loggedin')) {
            redirect("Vendor");
        }
        $userName = $this->session->userdata('username');
        $vid = $this->session->userdata('vid');
        if ($edit == true) {
            if ($this->input->post("uni_category")) {
                $config['upload_path'] = './assets/images/uniform/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = $this->input->post("oldt");
                $front = $this->input->post("oldf");
                $back = $this->input->post("oldb");
                $sizing_guide = $this->input->post("olds");
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $front = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $back = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_uni($pic);
                        }
                    }
                }
                $tax_price = (($this->input->post("price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("price") - $tax_price;
                $data = array("uni_category" => $this->input->post("uni_category"),
                    "school_name" => $this->input->post("school_name"),
                    "uniform_image" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sizing_guide" => $sizing_guide,
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "sku" => $this->input->post("sku"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("price"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                $this->db->where("uniform_id", $this->uri->segment(3));
                if ($this->db->update('uniform', $data)) {
                    $this->session->set_flashdata('message', 'Product Updated successfully.');
                    $pid = $this->db->get_where("uniform_search", array("product_id" => $this->uri->segment(3)))->row();
                    if (!empty($pid)) {
                        $search_data = array("product_id" => $this->uri->segment(3),
                            "filter_subcategory_fcid" => implode(",", $this->input->post("uniform_search")));
                        $this->db->where("product_id", $this->uri->segment(3));
                        $this->db->update('uniform_search', $search_data);
                        $msg = "Uniform Update Successfully.";
                    } else {
                        $insert_id = $this->uri->segment(3);
                        $search_data = array("product_id" => $insert_id,
                            "filter_subcategory_fcid" => implode(",", $this->input->post("uniform_search")));
                        $this->db->insert('uniform_search', $search_data);
                        $msg = "New Uniform Added Successfully.";

                    }
                } else {
                    $msg = "Uniform Couldnot be Updated.";
                }
                redirect("Vendor/add_uniform/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("uni_category")) {
                $config['upload_path'] = './assets/images/uniform/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->upload->initialize($config);
                $cover = "";
                $front = "";
                $back = "";
                $sizing_guide = "";
                if (!empty($_FILES["fabricc"]["name"])) {

                    if (!$this->upload->do_upload('fabricc')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $cover = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["front"]["name"])) {

                    if (!$this->upload->do_upload('front')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $front = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["back"]["name"])) {

                    if (!$this->upload->do_upload('back')) {
                        echo $this->upload->display_errors();
                    } else {
                        $pic = $this->upload->data();
                        $back = $pic['file_name'];
                        $this->resize_image_uni($pic);
                    }
                }
                if (!empty($_FILES["sizing_guide"]["name"])) {

                    if (!$this->upload->do_upload('sizing_guide')) {
                        echo $this->upload->display_errors();
                    } else {
                        if ($_POST['sizing_guide_yes_no'] != 'no') {
                            $pic = $this->upload->data();
                            $sizing_guide = $pic['file_name'];
                            $this->resize_image_uni($pic);
                        }
                    }
                }

                $tax_price = (($this->input->post("price")) * ($this->input->post("tax"))) / 100;
                $tax_price = $this->input->post("price") - $tax_price;
                $data = array("uni_category" => $this->input->post("uni_category"),
                    "school_name" => $this->input->post("school_name"),
                    "uniform_image" => $cover,
                    "front" => $front,
                    "back" => $back,
                    "sizing_guide" => $sizing_guide,
                    "quantity" => $this->input->post("quantity"),
                    "sdesc" => strip_tags($this->input->post("sdesc")),
                    "ldesc" => $this->input->post("ldesc"),
                    "category_for_filter" => $this->input->post("fabric_main_cat"),
                    "sku" => $this->input->post("sku"),
                    "Tax_Class" => $this->input->post("tax"),
                    "Minimum_Quantity" => $this->input->post("minimum"),
                    "Subtract_Stock" => $this->input->post("subtractstock"),
                    "featured" => $this->input->post("type_feature"),
                    "special" => $this->input->post("type_special"),
                    "special" => $this->input->post("type_special"),
                    "price" => $tax_price,
                    "price_without_tax" => $this->input->post("price"),
                    "padddate" => date("Y-m-d"),
                    "vendor_name" => $userName,
                    "vendor_id" => $vid,
                    "status" => 'disapprove');
                if ($this->db->insert('uniform', $data)) {
                    $this->session->set_flashdata('message', 'Product Saved successfully.');
                    $insert_id = $this->db->insert_id();
                    $search_data = array("product_id" => $insert_id,
                        "filter_subcategory_fcid" => implode(",", $this->input->post("uniform_search")));
                    $this->db->insert('uniform_search', $search_data);
                    $msg = "New Uniform Added Successfully.";
                } else {
                    $msg = "Uniform Couldnot be Added.";
                }
                redirect("Vendor/add_uniform/" . $insert_id);

            }

        }
        $this->middle = 'vendor/add_uniform_view'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_uniform_meta($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            $this->db->where("uniform_id", $this->uri->segment(3));
            if ($this->db->update('uniform', $data)) {
                $msg = "Meta Updated Successfully.";
            } else {
                $msg = "Meta Couldnot be Updated.";
            }
            redirect("Vendor/add_uniform/" . $this->uri->segment(3));
        } else {
            $data = array("meta_title1" => $this->input->post("meta_title1"),
                "meta_keyword" => $this->input->post("meta_keyword"),
                "meta_description" => $this->input->post("meta_description"),
                "google_analytics" => $this->input->post("google_analytics"),
                "og_title" => $this->input->post("og_title"),
                "og_description" => $this->input->post("og_description"),
                "og_keyword" => $this->input->post("og_keyword"),
                "og_locale" => $this->input->post("og_locale"),
                "og_type" => $this->input->post("og_type"),
                "og_site_name" => $this->input->post("og_site_name"),
                "og_url" => $this->input->post("og_url"),
                "og_image" => $this->input->post("og_image"),
                "dc_source" => $this->input->post("dc_source"),
                "dc_relation" => $this->input->post("dc_relation"),
                "dc_title" => $this->input->post("dc_title"),
                "dc_keywords" => $this->input->post("dc_keywords"),
                "dc_subject" => $this->input->post("dc_subject"),
                "dc_language" => $this->input->post("dc_language"),
                "dc_description" => $this->input->post("dc_description"),
                "status" => 'disapprove');
            if ($this->db->insert('uniform', $data)) {
                $msg = "New Meta Added Successfully.";
            } else {
                $msg = "Meta Couldnot be Added.";
            }
            redirect("Vendor/add_uniform");

        }
        $this->middle = 'vendor/add_uniform_view'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_uniform_city($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                $this->db->where("uniform_id", $this->uri->segment(3));
                if ($this->db->update('uniform', $data)) {
                    $msg = "uniform Updated Successfully.";
                } else {
                    $msg = "uniform Couldnot be Updated.";
                }
                redirect("Vendor/add_uniform/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("country")) {
                $data = array("country" => $this->input->post("country"),
                    "state" => $this->input->post("state"),
                    "city" => implode(",", $this->input->post("city")),
                    "status" => 'disapprove');
                if ($this->db->insert('uniform', $data)) {
                    $msg = "New uniform Added Successfully.";
                } else {
                    $msg = "uniform Couldnot be Added.";
                }
                redirect("Vendor/add_uniform");

            }

        }

        $this->middle = 'vendor/add_uniform_view'; // passing middle to function. change this for different views.
        $this->vendorlayout();

    }

    public function add_uniform_offer($edit = false)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        if ($edit == true) {
            // echo "sdf";exit;
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');
                $this->db->where("uniform_id", $this->uri->segment(3));
                if ($this->db->update('uniform', $data)) {
                    $msg = "uniform Offer Updated Successfully.";
                } else {
                    $msg = "uniform Offer Couldnot be Updated.";
                }
                redirect("Vendor/add_uniform/" . $this->uri->segment(3));

            }

        } else {
            if ($this->input->post("offer_price")) {
                $data = array("offer_type" => $this->input->post("offer_type"),
                    "offer_price" => $this->input->post("offer_price"),
                    "from_date" => $this->input->post("from_date"),
                    "to_date" => $this->input->post("to_date"),
                    "status" => 'disapprove');

                if ($this->db->insert('uniform', $data)) {
                    $msg = "New uniform Offer Added Successfully.";
                } else {
                    $msg = "uniform Offer Couldnot be Added.";
                }
                redirect("Vendor/add_uniform");

            }

        }

        $this->middle = 'vendor/add_uniform_view';
        $this->vendorlayout();

    }

    public function del_design()
    {
        $this->form_validation->set_rules('design_id', 'Design ID', 'required|max_length[5]|numeric|trim');
        switch(TRUE)
        {
            case ! $this->session->userdata('vendor_loggedin'):
                echo 'Session has expired. Please login.';
                redirect('Vendor');
            break;

            case $this->form_validation->run() === FALSE:
                echo 'Invalid request. Please reload the page and try again';
            break;

            case $this->db->delete('catalog_design_category', array('catalog_id' => $this->input->post('design_id'))):
                echo 'Design has been successfully deleted.';
            break;
        }
    }

    public function del_uniform()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $this->db->delete('uniform', array('uniform_id' => $_POST['fid']));
    }

    public function del_accessories()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $this->db->delete('accessories', array('acc_id' => $_POST['fid']));
    }

    public function del_fabric()
    {
        $this->db->delete('fabric', array('id' => $_POST['fid']));
    }

    public function del_online()
    {
        $this->db->delete('online_boutique', array('id' => $_POST['fid']));
    }

    public function all_uniform()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("uniform", array("vendor_id" => $vid, "status" => 'disapprove'));
        $data['totalpro'] = $all->num_rows();
        $data['uni'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_uniform_view', $data, true);
        $this->vendorlayout();
    }

    public function approve_uniform()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $data['heading'] = "Approved Uniforms By Admin";
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("uniform", array("vendor_id" => $vid, "status" => 'approve'));
        $data['totalpro'] = $all->num_rows();
        $data['uni'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_uniform_view', $data, true);
        $this->vendorlayout();
    }

    public function online_approve()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $vid = $this->session->userdata('vid');
        $all = $this->db->get_where("online_boutique", array("vendor_id" => $vid, "status" => 'approve'));
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_online_view', $data, true);
        $this->vendorlayout();
    }

    public function shipping_detail()
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        $this->db->order_by("id", "desc");
        $this->db->group_by('order_items.oid');
        $data['items'][] = $this->db->get_where("order_items", array("vendor_id" => $this->session->userdata("vid")))->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_shipping', $data, true);
        $this->vendorlayout();

    }

/*public function stitching_detail()
{
$this->db->select('*');
$this->db->from('order_items a');
$this->db->join('orders b', 'b.oid=a.oid');
$this->db->where('a.measures !=','');
$this->db->where('a.vendor_id',$this->session->userdata("vid"));
$query = $this->db->get();
$data['orders']=$query->result();
$this->template['middle'] = $this->load->view ($this->middle = 'vendor/all_stitching',$data,true);
$this->vendorlayout();
}*/

    public function order_shipping_status($oid)
    {
        $this->db->select('*');
        $this->db->where('oid', $oid);
        $this->db->where('vendor_id', $this->session->userdata("vid"));
        $data['items'] = $this->db->get("order_items")->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/stitching_shipping_detail', $data, true);
        $this->vendorlayout();
    }

    public function change_status($id)
    {
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }

        $v_info = $this->db->get_where('vendor', array('vid' => $this->session->userdata("vid")))->row();
        $site_address = $this->db->get('footer')->row();
        $pinfo = $this->db->get_where('order_items', array('oid' => $id, 'vendor_id' => $this->session->userdata("vid"), "measures" => ''))->result();
        $total = 0;
        $pinfo2 = $pinfo;
        foreach ($pinfo as $totals) {
            $total += $totals->subtotal;
        }
/*$message="<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td bgcolor='#ffffff' align='center'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
<tr>
<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
<img alt='Logo' src='http://ansvel.com/assets/images/logo2.jpg'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
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
</tr>";
foreach ($pinfo2 as $value) {
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
<td align='right' style='font-family: Arial, sans-serif; color: #7ca230; font-size: 16px; font-weight: bold;'>".$total."</td>
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
<a href='http://ansvel.com' target='_blank' style='color: #666666; text-decoration: none;'>Ansvel</a>
</td>
</tr>
</table>
</td>
</tr>
</table>";*/

        if (!empty($site_address->mobile)) {
            $authKey = "136895AdMGPnqo6n5875df12";
            $mobileNumber = $site_address->mobile;
            $senderId = "ANSVEL";
            $message1 = "Ready To Pickup.";
            $route = 4;
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message1,
                'sender' => $senderId,
                'route' => $route,
            );
            $url = "http://send.onlinesendsms.com/api/sendhttp.php";
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData,
            ));

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
        }
        /*   $from_email = $v_info->email;
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
        $this->email->from($from_email, 'Vendor');
        $this->email->to('info@ansvel.com');
        $this->email->subject('Vendor Message');
        $this->email->message($message);
        $this->email->send();*/
        $data = array("shipping_status" => 'Ready To Pickup',
            "status_datetime" => date("d-m-Y"),
            "status_changed_by" => "vendor",
            'notify_status' => 'no');
        $this->db->where("oid", $id);
        $this->db->where("vendor_id", $this->session->userdata("vid"));

        if ($this->db->update('order_items', $data)) { // echo $this->db->last_query();
            $data2 = array(
                "oid" => $id,
                //"order_item_id"=>$value->id,
                "shipping_status" => 'Ready To Pickup',
                "status_date" => date("d-m-Y"),
                "status_changed_by" => 'vendor',
                "vid" => $this->session->userdata("vid"));
            $this->db->insert('order_status', $data2);

            redirect('Vendor/shipping_detail');
        }

    }

    public function selectcontry()
    {
        $countryid = $this->input->post("country");
        $statetext = $this->db->get_where('states', array('country_id' => $countryid));
        $data['allstate'] = $statetext->result();

        echo '<select id="state" name="state" class="form-control">
						<option value="">Select state</option>';
        foreach ($data['allstate'] as $state) {
            echo '<option value="' . $state->id . '">' . $state->name . '</option>';
        }
        echo '</select>';
        ?>
						<script type="text/javascript">
							$("select#state").change(function(){
								var state = $("#state option:selected").val();
								$.ajax({
									type: "POST",
									url: "<?php echo base_url(); ?>index.php/Vendor/selectstat",
									data: { state : state}
								}).done(function(data){
									$("#cities").html(data);
								});
							});
						</script>
<?php
}
    public function selectstat()
    {
        $statid = $this->input->post("state");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '<select id="city" name="city" class="form-control">
						<option value="">Select City</option>';
        foreach ($data['allcity'] as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        echo '</select>';
    }
    public function selectstat_oncheckout()
    {
        $statid = $this->input->post("state");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '<select id="city" name="city" class="form-control">
						<option value="">Select State</option>';
        foreach ($data['allcity'] as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        echo '</select>';
    }
    public function outofstock()
    {
        error_reporting(0);
        ini_set('display_errors', 0);
        if (!$this->session->userdata("vendor_loggedin")) {
            redirect("Vendor");
        }
        //$this->db->order_by("id","desc");
        if ($_POST) {
            //print_r($_POST);
            $data2 = array();

            $pname = $_POST['pname'];

            $pdate = $_POST['pdate'];
            $price = $_POST['price'];
            $data['title'] = "All Out of Stock";
            $vid = $this->session->userdata('vid');

            $this->db->where("vendor_id", $vid);
            if (!empty($pdate)) {
                $this->db->where("padddate LIKE '%$pdate%'");
            }
            if (!empty($pname)) {
                $this->db->where("title LIKE '%$pname%'");
            }
            if (!empty($price)) {
                $this->db->where("price LIKE '$price'");
            }

            $all_f = $this->db->get_where("fabric", array('Subtract_Stock' => 'Yes'));
            if (!empty($pdate)) {
                $this->db->where("padddate LIKE '%$pdate%'");
            }
            if (!empty($pname)) {
                $this->db->where("brand LIKE '%$pname%'");
            }
            if (!empty($price)) {
                $this->db->where("price LIKE '$price'");
            }

            $this->db->where("vendor_id", $vid);
            $all_a = $this->db->get_where("accessories", array('Subtract_Stock' => 'Yes'));
            if (!empty($pdate)) {
                $this->db->where("padddate LIKE '%$pdate%'");
            }
            if (!empty($pname)) {
                $this->db->where("school_name LIKE '%$pname%'");
            }
            if (!empty($price)) {
                $this->db->where("price LIKE '$price'");
            }
            $this->db->where("vendor_id", $vid);
            $all_u = $this->db->get_where("uniform", array('Subtract_Stock' => 'Yes'));
            if (!empty($pdate)) {
                $this->db->where("padddate LIKE '%$pdate%'");
            }
            if (!empty($pname)) {
                $this->db->where("brand LIKE '%$pname%'");
            }
            if (!empty($price)) {
                $this->db->where("price LIKE '$price'");
            }
            $this->db->where("vendor_id", $vid);
            $all_o = $this->db->get_where("online_boutique", array('Subtract_Stock' => 'Yes'));

            $data['fab'] = $all_f->result();
            if (!empty($data['fab'])) {
                foreach ($data['fab'] as $value) {

                    $num_fab = (($value->quantity)) - $this->count_stock($value->id, $value->title);
                    if ($num_fab < $value->Minimum_Quantity) { //echo $num_fab." ".$value->Minimum_Quantity."<br>";
                        //echo $this->count_stock($value->id,$value->title);
                        // echo "<br>";
                        $data2['fab2'][] = $value->id;
                    }
                }}

            if (!empty($all_a)) {
                $data['acc'] = $all_a->result();

                foreach ($data['acc'] as $value) {
                    $num_acc = (($value->quantity)) - $this->count_stock($value->acc_id, $value->brand);
                    if ($num_acc < $value->Minimum_Quantity) {
                        $data2['acc2'][] = $value->acc_id;
                    }
                }}

            if (!empty($all_u)) {
                $data['uni'] = $all_u->result();

                foreach ($data['uni'] as $value) {
                    $num_uni = (($value->quantity)) - $this->count_stock($value->uniform_id, $value->school_name);
                    if ($num_uni < $value->Minimum_Quantity) {
                        $data2['uni2'][] = $value->uniform_id;
                    }
                }}

            if (!empty($all_o)) {
                $data['onb'] = $all_o->result();

                foreach ($data['onb'] as $value) {
                    $num_onb = (($value->quantity)) - $this->count_stock($value->id, $value->brand);
                    if ($num_onb < $value->Minimum_Quantity) {
                        $data2['onb2'][] = $value->id;
                    }
                }}
//print_r($data2);
            $data['totalpro'] = count($data2['fab2']) + count($data2['acc2']) + count($data2['uni2']) + count($data2['onb2']);
            $data['new'] = $data2;
        } else {

            $data['title'] = "All Out of Stock";
            $vid = $this->session->userdata('vid');

            $this->db->where("vendor_id", $vid);
            $all_f = $this->db->get_where("fabric", array('Subtract_Stock' => 'Yes'));
            $this->db->where("vendor_id", $vid);
            $all_a = $this->db->get_where("accessories", array('Subtract_Stock' => 'Yes'));
            $this->db->where("vendor_id", $vid);
            $all_u = $this->db->get_where("uniform", array('Subtract_Stock' => 'Yes'));
            $this->db->where("vendor_id", $vid);
            $all_o = $this->db->get_where("online_boutique", array('Subtract_Stock' => 'Yes'));
/*  $this->db->where("vendor_id",$vid);
$all_m=$this->db->get_where("more_services");*/
/*  $count1=$all_f->num_rows();
$count2=$all_a->num_rows();
$count3=$all_u->num_rows();
$count4=$all_o->num_rows();
//$count5=$all_m->num_rows();
$data['totalpro']=$count1+$count2+$count3+$count4;*/
            $data['fab'] = $all_f->result();
            foreach ($data['fab'] as $value) {
                $num_fab = (($value->quantity)) - $this->count_stock($value->id, $value->title);
                if ($num_fab <= $value->Minimum_Quantity) { //echo $num_fab." ".$value->Minimum_Quantity."<br>";
                    $data2['fab2'][] = $value->id;
                }
            }
            $data['acc'] = $all_a->result();
            foreach ($data['acc'] as $value) {
                $num_acc = (($value->quantity)) - $this->count_stock($value->acc_id, $value->brand);
                if ($num_acc <= $value->Minimum_Quantity) {
                    $data2['acc2'][] = $value->acc_id;
                }
            }
            $data['uni'] = $all_u->result();
            foreach ($data['uni'] as $value) {
                $num_uni = (($value->quantity)) - $this->count_stock($value->uniform_id, $value->school_name);
                if ($num_uni <= $value->Minimum_Quantity) {
                    $data2['uni2'][] = $value->uniform_id;
                }
            }
            $data['onb'] = $all_o->result();

            foreach ($data['onb'] as $value) {
                $num_onb = (($value->quantity)) - $this->count_stock($value->id, $value->brand);
                if ($num_onb <= $value->Minimum_Quantity) {
                    $data2['onb2'][] = $value->id;
                }
            }
            //print_r($data2);
            $data['totalpro'] = count($data2['fab2']) + count($data2['acc2']) + count($data2['uni2']) + count($data2['onb2']);
            $data['new'] = $data2;}
        //$data['more']=$all_m->result();
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/outofstock', $data, true);
        $this->vendorlayout();
    }
    public function count_stock($id, $name)
    {
        $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`=' . $id . ' and `pname` Like "' . preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($name)) . '"')->row()->qty;

        return $count;
    }
    public function disapprove()
    {
        $vid = $this->session->userdata('vid');
        //$this->db->order_by("id","desc");
        /*$data['title']="All Disapprove";

        $this->db->where("vendor_id",$vid);
        $all_f=$this->db->get_where("fabric",array("status"=>"disapprove"));
        $this->db->where("vendor_id",$vid);
        $all_a=$this->db->get_where("accessories",array("status"=>"disapprove"));
        $this->db->where("vendor_id",$vid);
        $all_u=$this->db->get_where("uniform",array("status"=>"disapprove"));
        $this->db->where("vendor_id",$vid);
        $all_o=$this->db->get_where("online_boutique",array("status"=>"disapprove"));
        $this->db->where("vendor_id",$vid);
        $all_m=$this->db->get_where("more_services",array("status"=>"disapprove"));
        $count1=$all_f->num_rows();
        $count2=$all_a->num_rows();
        $count3=$all_u->num_rows();
        $count4=$all_o->num_rows();
        $count5=$all_m->num_rows();
        $data['totalpro']=$count1+$count2+$count3+$count4+$count5;
        $data['fab']=$all_f->result();
        $data['acc']=$all_a->result();
        $data['uni']=$all_u->result();
        $data['onb']=$all_o->result();
        $data['more']=$all_m->result();*/
        $this->db->update('disapprove', array('read_status' => 1));
        $data['data'] = $this->db->get_where('disapprove', array('vendor_id' => $vid))->result();
        //print_r($data['data']);
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/disapprove', $data, true);
        $this->vendorlayout();
    }

    public function all_approve()
    {
        $data['d'] = '';
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_approved', $data, true);
        $this->vendorlayout();
    }
    public function all_disapprove()
    {
        $data['d'] = '';
        $this->template['middle'] = $this->load->view($this->middle = 'vendor/all_disapproved', $data, true);
        $this->vendorlayout();
    }
}