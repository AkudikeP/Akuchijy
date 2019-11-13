<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*error_reporting(0);
    ini_set('display_errors', 0);   */
    }

    public function index()
    {
        $this->middle = 'home1'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function recaptcha()
    {
        $this->load->helper('captcha');
        $this->load->helper('string');
        $rand_string = random_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8);
        $vals = array(
            'word' => $rand_string,
            'img_path' => './assets/images/captcha/',
            'img_url' => base_url() . "assets/images/captcha/",
            'font_path' => base_url() . "assets/font/fonts/texb.ttf",
            'img_width' => '150',
            'img_height' => '50',
            'expiration' => 7200,
            'word_length' => 8,
            'font_size' => 50,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 255, 255),
            ),
        );

        $cap = create_captcha($vals);
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word'],
        );

        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        echo $cap['image'] . '___' . $cap['word'];
    }

    public function count_cart()
    {

        return $this->cart->total_items();

    }

    public function delete_shipping_add()
    {
        $this->db->where('oid', $_POST['sid']);
        $this->db->update('orders', array('delete_for_shipping_address' => 1));
    }

    public function payu_order()
    {
        $oid = $this->session->userdata("oid");
        print_r($this->session->userdata);
        print_r($oid);
        $this->cart->destroy();
        $this->db->where('oid', $oid);
        $this->db->update('orders', array('pay_status' => 'success'));
        if (!empty($oid)) {
            $uid = $this->session->userdata("userid");
            $uinfo = $this->db->get_where("users", array("uid" => $uid))->row();
            $site_address = $this->db->get('footer')->row();
            $order_total = $this->db->get_where('orders', array('oid' => $oid))->row();
            $order_pur = $this->db->get_where('order_items', array('oid' => $oid))->result();
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
                <p>Dear ';
            $user = $uinfo->name;
            $message .= $user;
            $message .= ',
                </p>
                <p></p>
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
                </tr>';
            foreach ($order_pur as $value) {
                $message .= '<tr>';
                if ($value->order_type == 'stitch' || $value->order_type == 'stitch with fabric') {
                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'adminassets/' . $value->pimg . '" ';
                } elseif ($value->pimg == 'null') {
                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'assets/images/fabrics/bag.png" ';
                } else {
                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'assets/images/' . $value->pimg . '" ';
                }
                $message .= ' width="50px"></td>
                  <td width="200px">' . $value->pname . '</td>
                  <td>' . $value->size . '</td>
                  <td>' . $value->qty . '</td>
                  <td>Rs. ' . $value->price . '</td>
                  <td>View item</td>
                  </tr>';
            }
            $message .= '</table>
                <span class="expecteddate">Expect Date ' . date('d-m-Y', $date) . '</span>
                <br>
                <p>Regards,<br>Team Ansvel</p>
                <br>
                <div class="footer">
                  <center>
                    <img src="' . base_url() . '/assets/sociallinks/playstore.png"><img src="' . base_url() . '/assets/sociallinks/apple.png">
                  </center>
                  <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: info@ansvel.com</p></center>
                  <center><p class="blur">Your received this message because you\'re a member of Ansvel</p></center>
                </div>
                <p class="center small"><u>Unsubscribe</u><br></p>
                <p class="center small">Follow us on: <br>
                  <center>
                    <a href="#"><img src="' . base_url() . '/assets/sociallinks/facebook_circle_black-24.png"></a>
                    <a href="#"><img src="' . base_url() . '/assets/sociallinks/twitter_circle_black-24.png"></a>
                    <a href="#"><img src="' . base_url() . '/assets/sociallinks/google_circle_black-24.png"></a>
                  </center>
                </p>
              </div>
            </div>
          </body>
        </html>';
            $msg2 = "\n";
            foreach ($order_pur as $value) {
                $msg2 .= $value->pname . " --> " . $value->subtotal . "\n";
            }

            $authKey = '136895AdMGPnqo6n5875df12';
            $mobileNumber = $uinfo->mobile;
            $senderId = 'Ansvel';
            $message1 = "Your order has been placed with ansvel \norder id " . $oid . $msg2 . "\ntotal is" . $order_total->ototal;

            $route = 4;
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
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
                'wordwrap' => true,
                'crlf' => "\r\n",
                'newline' => "\r\n",
            ));
            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($to_email);
            //$this->email->cc('another@another-example.com');
            $this->email->subject('Ansvel');
            $this->email->message($message);
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            $this->cart->destroy();
            $this->db->where('oid', $oid);
            $this->db->update('orders', array('pay_status' => 'success'));

            redirect("orders/" . $oid);

        } else {
            echo "fail";
        }
        ////
        redirect("orders");
    }

    public function page_404()
    {
        $this->load->view('page_404');
    }

    public function payu_fail()
    {
        $this->load->view('fail');
    }

    public function review()
    {
        parse_str($_POST['formdata'], $form);
        $data = array(
            "p_id" => $form["pid"],
            "p_name" => $form["pname"],
            "subject" => $form["subject"],
            "nike_name" => $form["user_name"],
            "review" => $form["review"],
            "userid" => $this->session->userdata("userid"),
            "date" => date("Y-m-d"),
        );
        if ($this->db->insert("review", $data)) {
            $rating = $this->db->get_where('rating', array('p_id' => $form["pid"], 'p_name' => $form["pname"], 'users' => $this->session->userdata("userid")))->row();
            echo "
        <div>
          <span class='label ";
            if ($rating->rating == 5) {echo 'label-success ';} else if ($rating->rating >= 2 && $rating->rating <= 4) {echo 'label-warning  ';} else if ($rating->rating == 1) {echo 'label-danger ';}
            ?>'>
          <?php echo $rating->rating; ?> ★</span> <strong>&nbsp&nbsp<?php echo $form["subject"]; ?></strong>
          <p><?php echo $form["review"]; ?></p>
          <p class="c-name"><span> <?php echo $form["user_name"]; ?> </span> / <span> <?php echo date("Y-m-d"); ?></span></p>
        </div>
        <hr class="reviewline">
        <?php
}
    }

    public function update_review()
    {
        $data = array(

            "subject" => $_POST["subject"],

            "review" => $_POST["review"],
            "status" => '0',
            "seen" => '0',
            "date" => date("Y-m-d"),

        );
        $this->db->where('id', $_POST["id"]);
        if ($this->db->update("review", $data)) {
            //  redirect($_POST['redirect']);
        }
    }

    public function notifyme()
    {
        //print_r($_POST);
        //parse_str($_POST['formdata'],$form);
        //print_r($form);
        //echo print_r($this->session->userdata);
        $data = array(
            "p_id" => $_POST["pid"],
            "p_name" => $_POST["pname"],
            "email" => $_POST["value"],
            "product_type" => $_POST["type"],

            "date" => date("Y-m-d"),

        );
        if ($this->db->insert("notifyme", $data)) {
            // echo $this->db->last_query();
            echo 'done';
        }

    }

    public function send_mail()
    {
        $id = $this->session->userdata("userid");
        $from_email = "nakulrajoriya11@gmail.com";
        $to_email = $this->input->post('email');
        $this->load->library('email'); //load email library
        $subject = "Welcome to MySite!"; //subject
        $message = "Your account has been created.
        Please click this link to activate your account:
        base_url()index.php/welcome/verify_email/$id";
        $this->email->from($from_email, 'Ansvel');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Email sent successfully.");
            echo 'true';
        } else {
            $this->session->set_flashdata("email_sent", "Error in sending Email.");
            echo 'false';
        }
        redirect("welcome/manage_profile");
    }

    public function send_otp_number()
    {
        $contact = $this->input->post('contact');
        function gen_random_string($length = 6)
        {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //length:36

            $final_rand = '';

            for ($i = 0; $i < $length; $i++) {
                $final_rand .= $chars[rand(0, strlen($chars) - 1)];
            }
            return $final_rand;
        }
        $status = gen_random_string();
        $authKey = "136895AdMGPnqo6n5875df12";
        $mobileNumber = $this->input->post('country_code') . $this->input->post('contact');
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "ANSVEL";
        //Your message to send, Add URL encoding here.
        $message = "Thank You For Registration With Ansvel. Your Account Activation Code is " . $status;
        //Define route
        $route = 4;
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
        );

        //API URL
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
        if (curl_errno($ch)) {
            $this->session->set_flashdata('message', 'Sorry some problem! Please enter Mobile Number.');
        } else {
            $this->session->set_flashdata('message', 'Activation Code sent to your phone.');
            $this->load->library('session');
            $this->session->set_userdata('t', $status);
            if ($this->session->userdata('t', $status)) {
                echo 'true';
            } else {
                //$this->session->set_flashdata('message', 'Please Enter all information.');
                echo 'false';
            }
        }
        curl_close($ch);
        //redirect("welcome/manage_profile");
    }

    public function insert_question()
    { //print_r($_POST);
        $data = array(
            'question1' => $this->input->post('question1'),
            'question2' => $this->input->post('question2'),
            'question3' => $this->input->post('question3'),
            'question4' => $this->input->post('question4'),
            'question5' => $this->input->post('question5'));
        $userid = $this->session->userdata('userid');
        $this->db->where('uid', $userid);
        if ($this->db->update('users', $data)) {
            $this->session->set_flashdata('message', 'Your question inserted Successfully.');
            echo "true";
        } else {
            $this->session->set_flashdata('message', 'Please Enter all information.');
            echo "false";
        }
        //redirect("welcome/manage_profile");
    }

    public function verify_otp()
    {
        $otp = $this->input->post('otp');
        $session_otp = $this->session->userdata('t');

        if ($otp == $session_otp) {
            $id = $this->session->userdata("userid");
            $data = array("mobile_verified" => 'yes');
            $this->db->update('users', $data);
            $this->db->where('uid', $id);
            echo 'true';
        } else {
            echo 'false';
        }
        //redirect("welcome/manage_profile");

    }
    public function manage_profile()
    {

        if ($this->session->userdata("userid")) {
            $data['id'] = $this->session->userdata("userid");
            $data['profile_data'] = $this->db->get_where("users", array('uid' => $data['id']))->row();
            // print_r($data);
            $this->template['middle'] = $this->load->view($this->middle = 'myaccount', $data, true);
            $this->layout();

        } else {
            redirect('login');
        }

    }

    public function donate()
    {

        $this->middle = 'donate'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function how_it_works()
    {

        $this->middle = 'how_it_works'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function blog()
    {

        $data['blog_data'] = $this->db->get_where("blog", array('status_enable' => 'enable'))->result_array();
        //print_r($data);die;
        $this->template['middle'] = $this->load->view($this->middle = 'blog', $data, true);
        $this->layout();
    }

    public function blogview($id)
    {
        $data['blog_data'] = $this->db->get_where("blog", array('status_enable' => 'enable', 'id' => $id))->row();
        //print_r($data);die;
        $this->template['middle'] = $this->load->view($this->middle = 'blogview', $data, true);
        $this->layout();
    }
    public function update_profile_image()
    {
        $id = $this->session->userdata("userid");
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000000';
        $this->upload->initialize($config);
        if (!empty($_FILES["profile_image"]["name"])) {

            if (!$this->upload->do_upload('profile_image')) {
                echo $this->upload->display_errors();
            } else {
                $pic = $this->upload->data();
                $cover = $pic['file_name'];
            }
        }
        $data = array("profile_image" => $cover);
        $this->db->where('uid', $id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('item', 'msg');
        redirect("welcome/manage_profile");

    }
    public function manage_pass()
    {

        if ($this->session->userdata("userid")) {
            $data['id'] = $this->session->userdata("userid");
            $data['profile_data'] = $this->db->get_where("users", array('uid' => $data['id']))->row();
            $data['pass'] = 'true';
            $this->template['middle'] = $this->load->view($this->middle = 'manage_profile', $data, true);
            $this->layout();

        }

    }

    public function ajaxstar()
    {
        if ($this->session->userdata("userid") != '') {
            $data = array(
                "p_id" => $this->input->post("pid"),
                "rating" => $this->input->post("value"),
                "p_name" => $this->input->post("pname"),
                "users" => $this->session->userdata("userid"),

            );

            $select = $this->db->get_where('rating', array('p_id' => $this->input->post("pid"), 'p_name' => $this->input->post("pname"), 'users' => $this->session->userdata("userid")))->result();
            if (!empty($select)) {
                $data = array(
                    "p_id" => $this->input->post("pid"),
                    "p_name" => $this->input->post("pname"),
                    "users" => $this->session->userdata("userid"),
                );

                $this->db->where($data);
                if ($this->db->update("rating", array("rating" => $this->input->post("value")))) {
                    echo 'done';
                }
            } else {
                if ($this->db->insert("rating", $data)) {
                    echo 'done';
                }
            }
            // echo $this->db->last_query();
        }
    }
    public function wishlist_delete()
    {
        echo 'kkk';
        $pname = $this->input->post("pname");
        if ($this->session->userdata("userid") != '') {
            echo "in";
            $data = array(
                "p_id" => $this->input->post("pid"),
                "p_name" => "$pname",
                "user_id" => $this->session->userdata("userid"),
                "type" => $this->input->post("type"),
            );

            $select = $this->db->delete('wishlist', array('p_id' => $this->input->post("pid"), 'p_name' => "$pname", 'user_id' => $this->session->userdata("userid"), "type" => $this->input->post("type")));

            echo $this->db->last_query();
        }
    }

    public function cancel_item_request()
    {

        if ($this->session->userdata("userid") != '') {
            $data = array(
                "item_id" => $this->input->post("item_id"),

                "user_id" => $this->session->userdata("userid"),
                "date" => date("d-m-Y"),
                "reason" => $this->input->post("reason"),
                "vendor_id" => $this->input->post("vendor_id"),
                "description" => $this->input->post("description"),
            );

            if ($this->db->insert("cancel_requests", $data)) {
                //echo 'done';
            }

            //echo $this->db->last_query();
            redirect('welcome/orders');
        }
    }
    public function return_item_request()
    {

        if ($this->session->userdata("userid") != '') {
            $data = array(
                "item_id" => $this->input->post("item_id"),

                "user_id" => $this->session->userdata("userid"),
                "date" => date("d-m-Y"),
                "reason" => $this->input->post("reason"),
                "description" => $this->input->post("description"),
                "vendor_id" => $this->input->post("vid"),
            );

            if ($this->db->insert("return_requests", $data)) {
                //echo 'done';
            }

            //echo $this->db->last_query();
            redirect('welcome/orders');
        }
    }

    public function wishlist()
    {
        // echo 'kkk2222';
        $pname = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($this->input->post("pname")));

        if ($this->session->userdata("userid") != '') {
            $data = array(
                "p_id" => $this->input->post("pid"),
                "p_name" => "$pname",
                "user_id" => $this->session->userdata("userid"),
                "date" => date("Y-m-d"),
                "type" => $this->input->post("type"),
            );

            $select = $this->db->get_where('wishlist', array('p_id' => $this->input->post("pid"), 'p_name' => "$pname", 'user_id' => $this->session->userdata("userid"), "type" => $this->input->post("type")))->result();
            if (!empty($select)) {

            } else {
                if ($this->db->insert("wishlist", $data)) {
                    echo 'done';
                }
            }
            echo $this->db->last_query();
        }
    }
    public function wishlist_cancel()
    {
        //echo 'kkk';
        if ($this->session->userdata("userid") != '') {

            $this->db->delete('wishlist', array('id' => $this->input->post("id")));

            echo $this->db->last_query();
        }
    }
    public function search_faq()
    {

        $val = $_POST['val'];
        if ($val != '') {
            $this->db->where("question LIKE '%$val%'");
            $fab = $this->db->get_where("faq", array("status_enable" => 'enable'))->result();
            if (!empty($fab)) {foreach ($fab as $faq) {
                echo "<div class='col-md-8'>
     <div id='accordion-first' class='clearfix'>
                        <div class='accordion' id='accordion3'>
                          <div class='accordion-group' id='div_hide'>
                            <div class='accordion-heading'>
                              <a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#accordion3' href='#f$faq->id'>
                                <i class='fa fa-plus-square'></i> $faq->question
                              </a>
                            </div>
                            <div style='height: 0px;' id='f$faq->id' class='accordion-body collapse'>
                              <div class='accordion-inner'>
                               <p> $faq->answer</p>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                 </div>";

            }
            } else {
                echo "<div class='col-md-9'>
     <div id='accordion-first' class='clearfix'>
                        <div class='accordion' id='accordion3'>
                          <div class='accordion-group' id='div_hide'>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbspNo Result Found

                          </div>
                        </div>

                    </div>
                 </div>";
            }
            ?>



  <?php
} else {
            $fab = $this->db->get_where("faq", array("status_enable" => 'enable'))->result();
            foreach ($fab as $faq) {
                echo "<div class='col-md-8'>
     <div id='accordion-first' class='clearfix'>
                        <div class='accordion' id='accordion3'>
                          <div class='accordion-group' id='div_hide'>
                            <div class='accordion-heading'>
                              <a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#accordion3' href='#f$faq->id'>
                                <i class='fa fa-plus-square'></i> $faq->question
                              </a>
                            </div>
                            <div style='height: 0px;' id='f$faq->id' class='accordion-body collapse'>
                              <div class='accordion-inner'>
                               <p> $faq->answer</p>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                 </div>";
            }
        }

    }

    public function search()
    {
        $i = 0;
        $val = $_POST['val'];
        if ($val != '') {
            ?>
      <datalist id="browsers">
<?php
$keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("title LIKE '$val%'");
            $this->db->limit(5);
            $fab_f = $this->db->get_where("fabric", array("status" => 'approve', "status_enable" => 'enable'))->result_array();
            if (empty($fab_f)) {
                $i++;
            }
            foreach ($fab_f as $value) {
                ?>
   <option value="<?php echo $value['title']; ?> from Fabric">
  <?php
}
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("brand LIKE '$val%'");
            $this->db->limit(5);
            $this->db->order_by('acc_id', 'desc');
            $fab_a = $this->db->get_where("accessories", array("status" => 'approve', "status_enable" => 'enable'))->result_array();
            if (empty($fab_a)) {
                $i++;
            }
            foreach ($fab_a as $value) {
                ?>
   <option value="<?php echo $value['brand']; ?> from Accessories">
  <?php
}
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("school_name LIKE '$val%'");
            $this->db->limit(5);
            $this->db->order_by('uniform_id', 'desc');
            $fab_u = $this->db->get_where("uniform", array("status" => 'approve', "status_enable" => 'enable'))->result_array();
            if (empty($fab_u)) {
                $i++;
            }
            foreach ($fab_u as $value) {
                ?>
   <option value="<?php echo $value['school_name']; ?> from Uniform">
  <?php
}
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("brand LIKE '$val%'");

            $this->db->limit(5);
            $this->db->order_by('id', 'desc');

            $fab_o = $this->db->get_where("online_boutique", array("status" => 'approve', "status_enable" => 'enable'))->result_array();
            if (empty($fab_o)) {
                $i++;
            }
            foreach ($fab_o as $value) {
                ?>
   <option value="<?php echo $value['brand']; ?> from Online Boutique">
  <?php }

            if ($i == 4) {
                echo "\"No Result Found\"";
            }
            echo "</datalist>";
        } else {
        }
    }
    public function altration()
    {
        $id = $this->uri->segment(3);
        $this->db->order_by('alt_id', 'desc');
        $data['alt'] = $this->db->get_where("altration", array("c_id" => $id, "status" => "enable"))->result_array();
        // $this->middle = 'altrationwomans'; // passing middle to function. change this for different views.
        $this->template['middle'] = $this->load->view($this->middle = 'altration', $data, true);
        $this->layout();
    }
    public function altrationman()
    {
        $this->middle = 'altrationman'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function test()
    {
    }

    public function add_city_session()
    {
        $this->load->library('session');
        //error_reporting(1);
        //print_r($_POST);

        $this->session->set_userdata('city_session', $this->input->post("city"));
        //print_r($_SESSION);
        //exit;
        ?><script>window.location.href="<?php echo base_url(); ?>";</script><?php
}

    public function unset_city()
    {
        $this->session->unset_userdata('city_session');
        redirect(base_url());
    }

    public function mcat()
    {

        $data['alt'] = array();

        $this->template['middle'] = $this->load->view($this->middle = 'fabric', $data, true);
        $this->layout();
    }
    public function altr()
    {
        $data['cat'] = $this->db->get_where("mcategory", array('status' => 'enable'))->result();
        $data['mcat'] = $this->db->get_where("our_services", array('type' => 'Alteration'))->row();
        $this->template['middle'] = $this->load->view($this->middle = 'altr', $data, true);
        $this->layout();
    }
    public function unif()
    {

        $data['cat'] = $this->db->get_where("mcategory", array('status' => 'enable'))->result();
        $data['mcat'] = $this->db->get_where("our_services", array('type' => 'Uniform'))->row();
        $this->template['middle'] = $this->load->view($this->middle = 'unif', $data, true);
        $this->layout();
    }
    public function mors()
    {

        $data['alt'] = array();

        $this->template['middle'] = $this->load->view($this->middle = 'mors', $data, true);
        $this->layout();
    }
    public function fabric1()
    {

        redirect("Store");
        // $data['cat']=$this->db->get_where("mcategory",array('status'=>'enable'))->result();
        // $data['mcat']=$this->db->get_where("our_services",array('type'=>'Fabric'))->row();
        // $this->template['middle'] = $this->load->view ($this->middle = 'fabric1',$data,true);
        //$this->layout();
    }
    public function acces()
    {

        $data['cat'] = $this->db->get_where("mcategory", array('status' => 'enable'))->result();
        $data['mcat'] = $this->db->get_where("our_services", array('type' => 'Accessories'))->row();
        $this->template['middle'] = $this->load->view($this->middle = 'acces', $data, true);
        $this->layout();
    }

    public function fabric_with_stitching()
    {
        // print_r($_POST);
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
        }
        $size = '';
        $color = '';
        if (isset($_POST['val_size'])) {
            $size = $_POST['val_size'];

        }
        if (isset($_POST['val_color'])) {

            $color = $_POST['val_color'];
        }

        $data = array(

            'qty' => $form['qty'],
            'size' => $size,
            'color' => $color,
            'sku' => $form['sku'],
            'productlink' => $form['url'],
        );

//print_r($_POST);
        $mcat_id = $form['mcat_id'];
        //$fabric_id = $this->input->post("fabric_id");
        //  print_r($mcat_id);//exit;
        $this->load->library('session');

        $this->session->set_userdata(array(
            'fabric_id' => $form["fabric_id"],
        ));
        $this->session->set_userdata($data);
        /*print_r($this->session->userdata('fabric_id'));
        print_r($this->session->userdata('qty'));
        print_r($this->session->userdata('size'));
        print_r($this->session->userdata('color'));
        print_r($this->session->userdata('sku'));
        print_r($this->session->userdata('productlink'));
         */echo base_url() . "stitching/stitch-with-fabric/$mcat_id";
    }

    public function user_moreservice_appo()
    {
        $data = array(
            "more_services_id" => $this->input->post("more_services_id"),
            "user_id" => $this->input->post("user_id"),
            "user_name" => $this->input->post("user_name"),
            "user_contact" => $this->input->post("user_contact"),
            "user_email" => $this->input->post("user_email"),
            "subcategory" => $this->input->post("subcategory"),
            "price" => $this->input->post("price"),
            "image" => $this->input->post("image"),
            "address" => $this->input->post("address"),
            "landmark" => $this->input->post("landmark"),
            "app_date" => $this->input->post("app_date"),
            "app_time" => $this->input->post("app_time"),
        );
        //print_r($data);die;
        if ($this->db->insert("more_services_appoinment", $data) == true) {
            $this->session->set_flashdata('msg', 'Your Appoinment has been Booked Successfully.');
            redirect('Welcome/more_services');
        } else {
            $this->session->set_flashdata('msg', 'Couldnot be Book.');
        }

    }

    public function moreservice_appoinment()
    {

        if ($this->session->userdata("userid")) {
            $id = $this->uri->segment(3);
            $data['info'] = $this->db->get_where("more_services", array("id" => $id))->row();
            //echo"<pre>";print_r($data);die;
            $this->template['middle'] = $this->load->view($this->middle = 'moreservice_appoinment_view', $data, true);
            $this->layout();

        } else {
            $this->session->set_flashdata('msg', 'Please Login Or Register First.');
            redirect('Welcome/login');
        }

    }

    public function more_services()
    {
        $keyword = $this->session->userdata('city_session');
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get("more_services");
        } else {
            $que = $this->db->get("more_services");
        }
        $data['count'] = $que->num_rows();
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {$this->db->limit(20);
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get("more_services");
        } else {
            $this->db->limit(20);
            $que = $this->db->get("more_services");
        }
        $data['more2'] = $que->result_array();
        //print_r($data['more2']);
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        $this->template['middle'] = $this->load->view($this->middle = 'more_services_view', $data, true);
        $this->layout();

    }

    public function altrationadd()
    {
        $this->middle = 'altrationadd';
        $this->layout();
    }
    public function accessories_shop()
    {
        $id = $this->uri->segment(3);

        $keyword = $this->session->userdata('city_session');
        /*  $this->db->where("city LIKE '%$keyword%'");
        //$this->db->limit($config["per_page"], $page);
        $data['access']=$this->db->get_where("accessories",array("main_category"=>$id,"status"=>'approve',"status_enable"=>'enable'))->result_array();
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        //echo"<pre>";print_r($data);die;
        $this->template['middle'] = $this->load->view ($this->middle = 'accessories_shopnew',$data,true);
        $this->layout();*/

        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {$this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("accessories", array("main_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("accessories", array("main_category" => $id, "status" => 'approve', "status_enable" => 'enable'));
        }

        $data['count'] = $que->num_rows();

        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("accessories", array("main_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("accessories", array("main_category" => $id, "status" => 'approve', "status_enable" => 'enable'));
        }
        $data['access'] = $que->result_array();
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        $this->template['middle'] = $this->load->view($this->middle = 'accessories_shopnew', $data, true);
        $this->layout();

    }

    public function online_boutique_shop()
    {
        $id = $this->uri->segment(3);
        $keyword = $this->session->userdata('city_session');
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {$this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("online_boutique", array("main_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("online_boutique", array("main_category" => $id, "status" => 'approve', "status_enable" => 'enable'));
        }
        $data['count'] = $que->num_rows();
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("online_boutique", array("main_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("online_boutique", array("main_category" => $id, "status" => 'approve', "status_enable" => 'enable'));
        }
        $data['access'] = $que->result_array();
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        $this->template['middle'] = $this->load->view($this->middle = 'online_shopnew', $data, true);
        $this->layout();

        /*$this->load->library('pagination');
    $config = array();
    $config["base_url"] = base_url('welcome/online_boutique_shop/').$id;
    $this->db->where("city LIKE '%$keyword%'");
    $count_info = $this->db->get_where("fabric",array("category"=>$id,"status"=>'approve',"status_enable"=>'enable'))->result_array();
    //print_r($count_info);die;
    $count = count($count_info);
    $config['total_rows'] = $count;//here we will count all the data from the table
    $config['per_page'] = 8;//number of data to be shown on single page
    $config["uri_segment"] = 4;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $this->db->where("city LIKE '%$keyword%'");
    $this->db->limit($config["per_page"], $page);
    $data['access']=$this->db->get_where("online_boutique",array("main_category"=>$id,"status"=>'approve',"status_enable"=>'enable'))->result_array();
    $data["links"] = $this->pagination->create_links();//create the link for pagination
    //echo"<pre>";print_r($data);die;
    $this->template['middle'] = $this->load->view ($this->middle = 'online_shopnew',$data,true);
    $this->layout();*/
    }

    public function uniform_shop()
    {
        $categ = $this->uri->segment(2);
        /*$keyword = $this->session->userdata('city_session');
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url('welcome/uniform_shop/').$categ;
        $this->db->where("city LIKE '%$keyword%'");
        $count_info = $this->db->get_where("uniform",array("uni_category"=>$categ,"status"=>'approve',"status_enable"=>'enable'))->result_array();
        //print_r($count_info);die;
        $count = count($count_info);
        $config['total_rows'] = $count;//here we will count all the data from the table
        $config['per_page'] = 8;//number of data to be shown on single page
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit($config["per_page"], $page);
        $data['uni_access']=$this->db->get_where("uniform",array("uni_category"=>$categ,"status"=>'approve',"status_enable"=>'enable'))->result_array();
        $data["links"] = $this->pagination->create_links();//create the link for pagination

        //echo"<pre>";print_r($data);die;
        $this->template['middle'] = $this->load->view ($this->middle = 'uniform_shopnew',$data,true);
        $this->layout();*/

        $keyword = $this->session->userdata('city_session');
        $this->db->order_by('uniform_id', 'desc');
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("uniform", array("uni_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("uniform", array("uni_category" => $categ, "status" => 'approve', "status_enable" => 'enable'));
        }
        $data['count'] = $que->num_rows();
        $this->db->order_by('uniform_id', 'desc');
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) { //$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("uniform", array("uni_category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            //$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("uniform", array("uni_category" => $categ, "status" => 'approve', "status_enable" => 'enable'));

        }
        $data['uni_access'] = $que->result_array();
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        $this->template['middle'] = $this->load->view($this->middle = 'uniform_shopnew', $data, true);
        $this->layout();

    }

    public function bridal()
    {
        $data['access'] = $this->db->get("accessories")->result_array();
        //echo"<pre>";print_r($data);die;
        $this->template['middle'] = $this->load->view($this->middle = 'bridal_view', $data, true);
        $this->layout();
    }

    public function bridal_appoinment()
    {

        $data['access'] = $this->db->get("accessories")->result_array();
        //echo"<pre>";print_r($data);die;
        $this->template['middle'] = $this->load->view($this->middle = 'bridal_appoinment_view', $data, true);
        $this->layout();

    }

    public function user_appoinment()
    {
        //print_r($_POST);die;
        $data = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "contact" => $this->input->post("contact"),
            "address" => $this->input->post("address"),
            "city" => $this->input->post("city"),
            "date_time" => $this->input->post("date_time"),
            //"app_time"=>$this->input->post("app_time"),
            "query" => $this->input->post("query"),
            "date" => date('d-m-Y'));
        //print_r($data);die;

        if ($this->db->insert("user_appoinment", $data) == true) {
            $this->session->set_flashdata('msg_bridal', 'Your Appoinment has been Booked Successfully.');
            redirect('Welcome/bridal_appoinment');
        } else {
            $this->session->set_flashdata('msg_bridal', 'Couldnot be Book.');
        }

    }

    public function filter_child_more()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $page_no = $_POST['page_no'] * 20;
        $cat = $_POST['cat'];
        //$page_count= 0;
        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val']) && $_POST['val'] != 'none') {
            $val = $_POST['val'];
        } else {
            $val = '';
        }

        if (isset($_POST['new_cat']) && $_POST['new_cat'] != 'none') {

            $cat2 = $_POST['new_cat'];
        } else {
            $cat2 = '';
        }

//print_r($cat2);

        // print_r($form);
        if (!empty($_POST['formdata']) && $_POST['formdata'] != 'none') {

            $unique_kk2 = explode(',', $_POST['formdata']);

            $keyword = $this->session->userdata('city_session');
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }
            $this->db->limit(20, $page_no);
            if ($cat2 != '' && $cat2[0] != '') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }

            $data['pros'] = $var->result();

            $this->load->view("filter_child_more", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }
            $this->db->limit(20, $page_no);
            if ($cat2 != '' && $cat2 != 'none') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {

                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }
            $data['pros'] = $var->result();
            $this->load->view("filter_child_more", $data);
        }
        //print_r($this->db->last_query());
    }

    public function filter_more()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $per_page = 2;

        $page_count = 0;

        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            $data['val'] = $val;
        } else {
            $val = '';
            $data['val'] = 'none';
        }
        if (isset($_POST['new_cat']) && $_POST['new_cat'] != '0') {
            $cat2 = $_POST['new_cat'];

        } else {
            $cat2 = '';

        }
        $kk2_priority = array();
        //echo $cat2;
        $cat2 = explode(',', $cat2);
//print_r($cat2);
        $data['cat'] = $_POST['cat'];
        parse_str($_POST['formdata'], $form);
        //print_r($form);
        if (!empty($form)) {

            foreach ($form as $fabric_search) {
                $this->db->like("filter_subcategory_fcid", $fabric_search);

                $kk = $this->db->get('more_services_search')->result();
                foreach ($kk as $value) {
                    $kk2[] = $value->product_id;
                    if (isset($kk2_priority[$value->product_id]) && $kk2_priority[$value->product_id] >= 1) {
                        $kk2_priority[$value->product_id]++;
                    } else {
                        $kk2_priority[$value->product_id] = 1;

                    }

                }
            }

            $unique_kk2 = array_unique($kk2);
            //print_r($unique_kk2);echo "<br>";

            arsort($kk2_priority);

            foreach ($kk2_priority as $x => $x_value) {
                $priority[] = $x;
            }
            $priorityf = implode(',', $priority);
//print_r($priorityf);
            $keyword = $this->session->userdata('city_session');
            //print_r($unique_kk2);
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }

            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                //$this->db->where_in("Category_for_filter",$cat2);
                //$this->db->order_by('find_in_set(id, "$priorityf")');
                //$this->db->order_by("FIELD('id', $priority)");
                //$this->db->where("FIND_IN_SET('id',$priorityf) !=", 0);
                // $this->db->where(FIND_IN_SET('id',"$priorityf"));
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }
            $data['count'] = $var->num_rows();
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }
            $this->db->limit(20);
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                $data['cat2'] = implode(',', $cat2);
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }
            $data['u'] = $u;
            $data['l'] = $l;

            $data['unique_kk2'] = implode(',', $unique_kk2);

            $data['pros'] = $var->result();
            //print_r($this->db->last_query());
            $this->load->view("filter_more_view", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }

            if ($cat2 != '' && $cat2[0] != '') {

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {

                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }
            $data['count'] = $var->num_rows();
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("subcategory", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            }
            $this->db->limit(20);
            if ($cat2 != '' && $cat2[0] != '') {

                $data['cat2'] = implode(',', $cat2);

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("more_services", array("category" => $_POST['cat'], "status" => 'approve'));
            }
            $data['u'] = $u;
            $data['l'] = $l;
            //print_r($this->db->last_query());
            $data['unique_kk2'] = 'none';

            $data['pros'] = $var->result();
            $this->load->view("filter_more_view", $data);
        }

    }
    /*public function filter_more(){
    parse_str($_POST['formdata'],$form);
    if(!empty($form)){
    foreach($form as $more_services)
    {
    $this->db->like("filter_subcategory_fcid",$more_services);
    $kk = $this->db->get('more_services_search')->result();

    foreach ($kk as $value) {
    $kk2[] = $value->product_id;
    }
    }
    $unique_kk2 = array_unique($kk2);
    foreach ($unique_kk2 as $value2) {
    $data['pros'][]=$this->db->get_where("more_services",array("id"=>$value2,"status"=>'approve'))->result();
    }
    $this->load->view("filter_more_view",$data);}
    else{
    $data['pros'][]=$this->db->get_where("more_services",array("status"=>'approve'))->result();
    $this->load->view("filter_more_view",$data);
    }
    }*/

    public function filter_uniform()
    {
        /* $u = $_POST['u'];
        $l = $_POST['l'];
        if(isset($_POST['val']))
        {
        $val = $_POST['val'];
        }
        else{
        $val = '';
        }
        parse_str($_POST['formdata'],$form);
        if(!empty($form)){
        foreach($form as $accessories_search)
        {
        $this->db->like("filter_subcategory_fcid",$accessories_search);
        $kk = $this->db->get('uniform_search')->result();
        foreach ($kk as $value) {
        $kk2[] = $value->product_id;
        }
        }
        $unique_kk2 = array_unique($kk2);
        //print_r($unique_kk2);

        $keyword = $this->session->userdata('city_session');
        $this->db->where_in("uniform_id",$unique_kk2);
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->where("price BETWEEN $l AND $u");
        if($val=='p_name'){

        $this->db->order_by("school_name", "asc");
        }else if($val=='price_l_to_h'){
        $this->db->order_by("price", "asc");
        }
        else if($val=='price_h_to_l'){
        $this->db->order_by("price", "desc");
        }
        $data['pros'][]=$this->db->get_where("uniform",array("uni_category"=>$_POST['cat'],"status"=>'approve',"status_enable"=>'enable'))->result();
        //print_r($data);

        $this->load->view("uniform_filter_view",$data);
        }
        else{
        $keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->where("price BETWEEN $l AND $u");
        if($val=='p_name'){

        $this->db->order_by("school_name", "asc");
        }else if($val=='price_l_to_h'){
        $this->db->order_by("price", "asc");
        }
        else if($val=='price_h_to_l'){
        $this->db->order_by("price", "desc");
        }
        $data['pros'][]=$this->db->get_where("uniform",array("status"=>'approve',"uni_category"=>$_POST['cat'],"status_enable"=>'enable'))->result();
        $this->load->view("uniform_filter_view",$data);*/

        ///
        // echo "yes dude";
        $keyword = $this->session->userdata('city_session');
        //
        $per_page = 2;

        $page_count = 0;

        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            $data['val'] = $val;
        } else {
            $val = '';
            $data['val'] = 'none';
        }
        if (isset($_POST['new_cat']) && $_POST['new_cat'] != '0') {
            $cat2 = $_POST['new_cat'];

        } else {
            $cat2 = '';

        }
        $kk2_priority = array();
        //echo $cat2;
        $cat2 = explode(',', $cat2);
//print_r($cat2);
        $data['cat'] = $_POST['cat'];
        parse_str($_POST['formdata'], $form);
        //print_r($form);
        if (!empty($form)) {

            foreach ($form as $fabric_search) {
                $this->db->like("filter_subcategory_fcid", $fabric_search);

                $kk = $this->db->get('uniform_search')->result();
                foreach ($kk as $value) {
                    $kk2[] = $value->product_id;
                    if (isset($kk2_priority[$value->product_id]) && $kk2_priority[$value->product_id] >= 1) {
                        $kk2_priority[$value->product_id]++;
                    } else {
                        $kk2_priority[$value->product_id] = 1;

                    }

                }
            }

            $unique_kk2 = array_unique($kk2);
            //print_r($unique_kk2);echo "<br>";

            arsort($kk2_priority);

            foreach ($kk2_priority as $x => $x_value) {
                $priority[] = $x;
            }
            $priorityf = implode(',', $priority);
//print_r($priorityf);
            $keyword = $this->session->userdata('city_session');
            //print_r($unique_kk2);
            $this->db->where_in("uniform_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                //$this->db->where_in("Category_for_filter",$cat2);
                //$this->db->order_by('find_in_set(id, "$priorityf")');
                //$this->db->order_by("FIELD('id', $priority)");
                //$this->db->where("FIND_IN_SET('id',$priorityf) !=", 0);
                // $this->db->where(FIND_IN_SET('id',"$priorityf"));
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $this->db->where_in("uniform_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                $data['cat2'] = implode(',', $cat2);
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $data['u'] = $u;
            $data['l'] = $l;

            $data['unique_kk2'] = implode(',', $unique_kk2);

            $data['pros'] = $var->result();
            //print_r($this->db->last_query());
            $this->load->view("uniform_filter_view", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $data['cat2'] = implode(',', $cat2);

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            //$data['count'] =$var->num_rows();
            $data['u'] = $u;
            $data['l'] = $l;
            //print_r($this->db->last_query());
            $data['unique_kk2'] = 'none';

            $data['pros'] = $var->result();
            $this->load->view("uniform_filter_view", $data);
        }
    }

    public function filter_search()
    {

        ///
        // echo "yes dude";
        $keyword = $this->session->userdata('city_session');
        //
        $per_page = 2;

        $page_count = 0;

        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            $data['val'] = $val;
        } else {
            $val = '';
            $data['val'] = 'none';
        }
        if (isset($_POST['new_cat']) && $_POST['new_cat'] != '0') {
            $cat2 = $_POST['new_cat'];

        } else {
            $cat2 = '';

        }
        $kk2_priority = array();
        //echo $cat2;
        $cat2 = explode(',', $cat2);
//print_r($cat2);
        $data['cat'] = $_POST['cat'];
        parse_str($_POST['formdata'], $form);
        //print_r($form);
        if (!empty($form)) {

            foreach ($form as $fabric_search) {
                $this->db->like("filter_subcategory_fcid", $fabric_search);

                $kk = $this->db->get('accessories_search')->result();
                foreach ($kk as $value) {
                    $kk2[] = $value->product_id;
                    if (isset($kk2_priority[$value->product_id]) && $kk2_priority[$value->product_id] >= 1) {
                        $kk2_priority[$value->product_id]++;
                    } else {
                        $kk2_priority[$value->product_id] = 1;

                    }

                }
            }

            $unique_kk2 = array_unique($kk2);
            //print_r($unique_kk2);echo "<br>";

            arsort($kk2_priority);

            foreach ($kk2_priority as $x => $x_value) {
                $priority[] = $x;
            }
            $priorityf = implode(',', $priority);
//print_r($priorityf);
            $keyword = $this->session->userdata('city_session');
            //print_r($unique_kk2);
            $this->db->where_in("acc_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('acc_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                //$this->db->where_in("Category_for_filter",$cat2);
                //$this->db->order_by('find_in_set(id, "$priorityf")');
                //$this->db->order_by("FIELD('id', $priority)");
                //$this->db->where("FIND_IN_SET('id',$priorityf) !=", 0);
                // $this->db->where(FIND_IN_SET('id',"$priorityf"));
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $this->db->where_in("acc_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('acc_id', 'desc');
            $this->db->limit(20);
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                $data['cat2'] = implode(',', $cat2);
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $data['u'] = $u;
            $data['l'] = $l;

            $data['unique_kk2'] = implode(',', $unique_kk2);

            $data['pros'] = $var->result();
            //print_r($this->db->last_query());
            $this->load->view("filter_search_view", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('acc_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            $this->db->order_by('acc_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $data['cat2'] = implode(',', $cat2);

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            //$data['count'] =$var->num_rows();
            $data['u'] = $u;
            $data['l'] = $l;
            //print_r($this->db->last_query());
            $data['unique_kk2'] = 'none';

            $data['pros'] = $var->result();
            $this->load->view("filter_search_view", $data);
        }
    }

    public function filter_child_online()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $page_no = $_POST['page_no'] * 20;
        $cat = $_POST['cat'];
        //$page_count= 0;
        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val']) && $_POST['val'] != 'none') {
            $val = $_POST['val'];
        } else {
            $val = '';
        }

        if (isset($_POST['new_cat']) && $_POST['new_cat'] != 'none') {

            $cat2 = $_POST['new_cat'];
        } else {
            $cat2 = '';
        }

//print_r($cat2);

        // print_r($form);
        if (!empty($_POST['formdata']) && $_POST['formdata'] != 'none') {

            $unique_kk2 = explode(',', $_POST['formdata']);

            $keyword = $this->session->userdata('city_session');
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('id', 'desc');
            $this->db->limit(20, $page_no);
            if ($cat2 != '' && $cat2[0] != '') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }

            $data['pros'] = $var->result();

            $this->load->view("filter_child_online", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2 != 'none') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['pros'] = $var->result();
            $this->load->view("filter_child_online", $data);
        }
        //print_r($this->db->last_query());
    }

    public function online_search()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $per_page = 2;

        $page_count = 0;

        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            $data['val'] = $val;
        } else {
            $val = '';
            $data['val'] = 'none';
        }
        if (isset($_POST['new_cat']) && $_POST['new_cat'] != '0') {
            $cat2 = $_POST['new_cat'];

        } else {
            $cat2 = '';

        }
        $kk2_priority = array();
        //echo $cat2;
        $cat2 = explode(',', $cat2);
//print_r($cat2);
        $data['cat'] = $_POST['cat'];
        parse_str($_POST['formdata'], $form);
        //print_r($form);
        if (!empty($form)) {

            foreach ($form as $fabric_search) {
                $this->db->like("filter_subcategory_fcid", $fabric_search);

                $kk = $this->db->get('online_search')->result();
                foreach ($kk as $value) {
                    $kk2[] = $value->product_id;
                    if (isset($kk2_priority[$value->product_id]) && $kk2_priority[$value->product_id] >= 1) {
                        $kk2_priority[$value->product_id]++;
                    } else {
                        $kk2_priority[$value->product_id] = 1;

                    }

                }
            }

            $unique_kk2 = array_unique($kk2);
            //print_r($unique_kk2);echo "<br>";

            arsort($kk2_priority);

            foreach ($kk2_priority as $x => $x_value) {
                $priority[] = $x;
            }
            $priorityf = implode(',', $priority);
//print_r($priorityf);
            $keyword = $this->session->userdata('city_session');
            //print_r($unique_kk2);
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                //$this->db->where_in("Category_for_filter",$cat2);
                //$this->db->order_by('find_in_set(id, "$priorityf")');
                //$this->db->order_by("FIELD('id', $priority)");
                //$this->db->where("FIND_IN_SET('id',$priorityf) !=", 0);
                // $this->db->where(FIND_IN_SET('id',"$priorityf"));
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                $data['cat2'] = implode(',', $cat2);
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['u'] = $u;
            $data['l'] = $l;
            $data['count'] = $var->num_rows();

            $data['unique_kk2'] = implode(',', $unique_kk2);

            $data['pros'] = $var->result();
            //print_r($this->db->last_query());
            $this->load->view("online_search_view", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {

                $data['cat2'] = implode(',', $cat2);

                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $var = $this->db->get_where("online_boutique", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['u'] = $u;
            $data['l'] = $l;
            //print_r($this->db->last_query());
            $data['unique_kk2'] = 'none';

            $data['pros'] = $var->result();
            $this->load->view("online_search_view", $data);
        }

    }

    /* public function online_search(){

    parse_str($_POST['formdata'],$form);
    if(!empty($form)){
    foreach($form as $online_search)
    {
    $this->db->like("filter_subcategory_fcid",$online_search);
    $kk = $this->db->get('online_search')->result();
    foreach ($kk as $value) {
    $kk2[] = $value->product_id;
    }
    }
    $unique_kk2 = array_unique($kk2);
    //print_r($unique_kk2);

    foreach ($unique_kk2 as $value2) {
    $keyword = $this->session->userdata('city_session');
    $this->db->where("city LIKE '%$keyword%'");

    $data['pros'][]=$this->db->get_where("online_boutique",array("id"=>$value2,"main_category"=>$_POST['cat'],"status_enable"=>'enable'))->result();
    //print_r($data);
    }
    $this->load->view("online_search_view",$data);
    }
    else{
    $keyword = $this->session->userdata('city_session');
    $this->db->where("city LIKE '%$keyword%'");
    $data['pros'][]=$this->db->get_where("online_boutique",array("status"=>'approve',"main_category"=>$_POST['cat'],"status_enable"=>'enable'))->result();
    $this->load->view("online_search_view",$data);
    }
    }*/

    public function acc_product()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            $id = $this->uri->segment(4);
        }

        $catname = $this->db->get_where('mcategory', array('mcat_name' => $this->uri->segment(2)))->row();
        $cid = $catname->mid;

        $data['cid'] = $cid;
        $data['pro'] = $this->db->get_where("accessories", array("acc_id" => $id))->row();
        // print_r($data);die;
        $data['pre'] = $this->db->get_where("accessories", array("acc_id" => $id - 1))->row();
        $data['next'] = $this->db->get_where("accessories", array("acc_id" => $id + 1))->row();
        if ($data['pro']->Subtract_Stock == 'yes' || $data['pro']->Subtract_Stock == 'Yes') {
            //  echo "Kkkkkkkkkkkkkkkkkk";
            //  echo $this->count_stock($id,$data['pro']->brand);
            $data['count_stock_remain'] = (($data['pro']->quantity)) - $this->count_stock($id, $data['pro']->brand);
        } else {
            $data['count_stock_remain'] = 1000;
        }
        $this->template['middle'] = $this->load->view($this->middle = 'acce_product_view', $data, true);
        $this->layout();
    }

    public function boutique_product()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            $id = $this->uri->segment(4);
        }

        $catname = $this->db->get_where('mcategory', array('mcat_name' => $this->uri->segment(2)))->row();
        $cid = $catname->mid;

        $data['cid'] = $cid;

        $data['pro'] = $this->db->get_where("online_boutique", array("id" => $id))->row();
        // print_r($data);die;
        $data['pre'] = $this->db->get_where("online_boutique", array("id" => $id - 1))->row();
        $data['next'] = $this->db->get_where("online_boutique", array("id" => $id + 1))->row();
        if ($data['pro']->Subtract_Stock == 'yes' || $data['pro']->Subtract_Stock == 'Yes') {
            $data['count_stock_remain'] = (($data['pro']->quantity)) - $this->count_stock($id, $data['pro']->brand);
        } else {
            $data['count_stock_remain'] = 1000;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'online_product_view', $data, true);
        $this->layout();
    }

    public function special_product()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'special_product', $data, true);
        $this->layout();

    }

    public function featured_product()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'featured_product', $data, true);
        $this->layout();

    }
    public function get_featured_product()
    {
        //$data=array();

        $keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $fab1 = $this->db->get_where("fabric", array("featured" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($fab1 as $fab) {
            $catname = $this->db->get_where('mcategory', array('mid' => $fab['category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $fab['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            } else {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            }?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $fab['thumb']; ?>"  alt=""  style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">

          <h2><a href="#"><?php echo substr($fab['title'], 0, 35);
            if (strlen($fab['title']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $fab['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $acc1 = $this->db->get_where("accessories", array("featured" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($acc1 as $acc) {
            $catname = $this->db->get_where('mcategory', array('mid' => $acc['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $acc['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            } else {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            }?>

                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/accessories/<?php echo $acc['thumb']; ?>"  alt="" style="max-height: 330px; width: 220px; left:0;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($acc['brand'], 0, 35);
            if (strlen($acc['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $acc['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $on1 = $this->db->get_where("online_boutique", array("featured" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($on1 as $on) {
            $catname = $this->db->get_where('mcategory', array('mid' => $on['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $on['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            } else {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/online_boutique/<?php echo $on['thumb']; ?>"  alt="" style="max-height: 330px; width: 220px; left:0;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($on['brand'], 0, 35);
            if (strlen($on['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $on['price']; ?></div>

      </div>

  </div>

  <?php }

    }
    public function get_spacial_product()
    {
        //$data=array();

        $keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $fab1 = $this->db->get_where("fabric", array("special" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($fab1 as $fab) {
            $catname = $this->db->get_where('mcategory', array('mid' => $fab['category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $fab['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            } else {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $fab['thumb']; ?>"  alt=""  style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">

          <h2><a href="#"><?php echo substr($fab['title'], 0, 35);
            if (strlen($fab['title']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $fab['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $acc1 = $this->db->get_where("accessories", array("special" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($acc1 as $acc) {
            $catname = $this->db->get_where('mcategory', array('mid' => $acc['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $acc['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            } else {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/accessories/<?php echo $acc['thumb']; ?>"  alt="" style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($acc['brand'], 0, 35);
            if (strlen($acc['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $acc['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where("city LIKE '%$keyword%'");
        $on1 = $this->db->get_where("online_boutique", array("special" => 'yes'))->result_array();
        //echo $this->db->last_query();
        foreach ($on1 as $on) {
            $catname = $this->db->get_where('mcategory', array('mid' => $on['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $on['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            } else {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/online_boutique/<?php echo $on['thumb']; ?>"  alt="" style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($on['brand'], 0, 35);
            if (strlen($on['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $on['price']; ?></div>

      </div>

  </div>

  <?php }

    }
    public function recently_viewed_products()
    {

        $keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        $fab1 = $this->db->get("fabric")->result_array();
        foreach ($fab1 as $fab) {
            $catname = $this->db->get_where('mcategory', array('mid' => $fab['category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $fab['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            } else {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            }?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $fab['thumb']; ?>"  alt="" style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($fab['title'], 0, 35);
            if (strlen($fab['title']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $fab['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        $acc1 = $this->db->get("accessories")->result_array();
        foreach ($acc1 as $acc) {
            $catname = $this->db->get_where('mcategory', array('mid' => $acc['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $acc['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            } else {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;">
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/accessories/<?php echo $acc['thumb']; ?>"  alt="" style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($acc['brand'], 0, 35);
            if (strlen($acc['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $acc['price']; ?></div>

      </div>

  </div>

  <?php }?>

  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        $on1 = $this->db->get("online_boutique")->result_array();
        foreach ($on1 as $on) {
            $catname = $this->db->get_where('mcategory', array('mid' => $on['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $on['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            } else {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" style="overflow: hidden;position: relative;">
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/online_boutique/<?php echo $on['thumb']; ?>"  alt="" style="position: absolute; width: auto; height: 350px; top: 0px; left: -19.8932px;"/></a>
                        </div>


      <div class="product-preview__info">
        <div class="product-preview__info__title">
          <h2><a href="#"><?php echo substr($on['brand'], 0, 35);
            if (strlen($on['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $on['price']; ?></div>

      </div>

  </div>

  <?php }
    }
    public function ajax_state()
    {
        //echo $_POST['sub_id'];exit;
        $data['field_cat'] = $this->db->get_where("states", array("country_id" => $_POST['sub_id']))->result_array();
        //echo "<pre>";print_r($data);exit;
        $this->load->view('ajax_state_view', $data);
    }

    public function ajax_city()
    {
        //echo $_POST['sub_id'];exit;
        $data['city'] = $this->db->get_where("cities", array("state_id" => $_POST['city_id']))->result_array();
        //echo "<pre>";print_r($data);exit;
        $this->load->view('city_ajax_view', $data);
    }

    public function get_newarrival_product()
    {
        $keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $d = strtotime("today");
        $this->db->where('padddate BETWEEN "' . date('Y-m-d', strtotime("-30 days", $d)) . '" and "' . date('Y-m-d', $d) . '"');
        $fab1 = $this->db->get("fabric")->result_array();
        //echo $this->db->last_query();

        foreach ($fab1 as $fab) {$catname = $this->db->get_where('mcategory', array('mid' => $fab['category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $fab['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            } else {
                $url = base_url() . 'fabric/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $fab['title']))) . '/' . $fab['id'];
            }
            ?>

                  <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $fab['thumb']; ?>"  alt="" style="max-height: 330px; width: 220px; left:0px;"/></a>
                        </div>


      <div class="product-preview__info " style="margin-top: 10px;">

<div class="product-preview__info__title">
        <h2><a href="#"><?php echo substr($fab['title'], 0, 35);
            if (strlen($fab['title']) > 35) {echo '...';} ?></a></h2>
</div>
        <div class="price-box">&#8358; <?php echo $fab['price']; ?></div>

      </div>

  </div>

  <?php }?>
                    <?php
$keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $d = strtotime("today");
        $this->db->where('padddate BETWEEN "' . date('Y-m-d', strtotime("-30 days", $d)) . '" and "' . date('Y-m-d', $d) . '"');
        $acc1 = $this->db->get("accessories")->result_array();
        foreach ($acc1 as $acc) {
            $catname = $this->db->get_where('mcategory', array('mid' => $acc['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $acc['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            } else {
                $url = base_url() . 'accessories/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $acc['brand']))) . '/' . $acc['acc_id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/accessories/<?php echo $acc['thumb']; ?>"  alt=""  style="max-height: 330px; width: 220px; left:0px;"/></a>
                        </div>


      <div class="product-preview__info ">
        <div class="product-preview__info__title">

        <h2><a href="#"><?php echo substr($acc['brand'], 0, 35);
            if (strlen($acc['brand']) > 35) {echo '...';} ?></a></h2>

        </div>
        <div class="price-box">&#8358; <?php echo $acc['price']; ?></div>

      </div>

  </div>

  <?php }?>
  <?php
$keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->limit(5, $_POST['getresult']);
        $d = strtotime("today");
        $this->db->where('padddate BETWEEN "' . date('Y-m-d', strtotime("-30 days", $d)) . '" and "' . date('Y-m-d', $d) . '"');
        $on1 = $this->db->get("online_boutique")->result_array();
        foreach ($on1 as $on) {
            $catname = $this->db->get_where('mcategory', array('mid' => $on['main_category']))->row();
            $mcatname = $this->db->get_where('main_categories', array('id' => $on['category_for_filter']))->row();
            if (!empty($mcatname)) {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . str_replace(" ", "-", $mcatname->name) . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            } else {
                $url = base_url() . 'online-boutique/' . $catname->mcat_name . '/' . preg_replace('/[^A-Za-z0-9 -]/u', '', strip_tags(str_replace(" ", "-", $on['brand']))) . '/' . $on['id'];
            }
            ?>
                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                <div class="sizes-example sizes-example1" >
                            <a href="<?php echo $url; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/online_boutique/<?php echo $on['thumb']; ?>"  alt=""  style="max-height: 330px; width: 220px; left:0px;"/></a>
                        </div>

                          <div>
          <div class="product-preview__info ">
        <div class="product-preview__info__title">

            <h2><a href="#"><?php echo substr($on['brand'], 0, 35);
            if (strlen($on['brand']) > 35) {echo '...';} ?></a></h2>
        </div>
        <div class="price-box">&#8358; <?php echo $on['price']; ?></div>


      </div>
    </div>

  </div>

  <?php }
    }
    public function newarrival_product()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'newarrival_product', $data, true);
        $this->layout();

    }

    public function recently_viewed()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'recently_product', $data, true);
        $this->layout();

    }

    public function shop($id)
    {
        $keyword = $this->session->userdata('city_session');

        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) {
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("fabric", array("category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("fabric", array("category" => $id, "status" => 'approve', "status_enable" => 'enable'));
        }
        $data['count'] = $que->num_rows();
        if ($_POST && isset($_POST['new_cat']) && !empty($_POST['new_cat'])) { //$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where_in("category_for_filter", $_POST['new_cat']);
            $que = $this->db->get_where("fabric", array("category" => $_POST['type'], "status" => 'approve', "status_enable" => 'enable'));
        } else {
            //$this->db->limit(20);
            $this->db->where("city LIKE '%$keyword%'");
            $que = $this->db->get_where("fabric", array("category" => $id, "status" => 'approve', "status_enable" => 'enable'));

        }
        $data['fab'] = $que->result_array();
        //$data["links"] = $this->pagination->create_links();//create the link for pagination
        $this->template['middle'] = $this->load->view($this->middle = 'shopnew', $data, true);
        $this->layout();
    }

    public function fimage()
    {
        $this->db->select("id,thumb,brand,price");
        $this->db->where("id", $_POST['fid']);
        $ims = $this->db->get("fabric")->row();
        ?><h4 class="text-warning">Choosen Fabric</h4>
    <div class="products-widget__item col-md-3" style="width:250px;"><div class="products-widget__item__image pull-left" style="border: 1px solid #e4dbdb;">
          <a href="#"><img src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $ims->thumb; ?>" /></a></div>
          <div class="products-widget__item__info" style="text-align: left; padding-left: 16px;">
            <div class="products-widget__item__info__title">
              <h2 class="text-uppercase"><a href="#"><?php echo $ims->title; ?></a></h2>
            </div>

            <div class="price-box"><span class="price-box__new">Rs. <?php echo $ims->price; ?>/-</span> </div>
          </div></div>
    <?php
}
    public function bimage()
    {
        $this->db->select("id,back");
        $this->db->where("id", $_POST['fid']);
        $ims = $this->db->get("fabric")->row();
        ?>
    <img style="max-height:200px;" src="<?php echo base_url(); ?>assets/images/fabrics/<?php echo $ims->back; ?>" alt="" />
    <?php
}
    public function access_for_addons()
    {
        //echo $_POST['sid'];
        $st = $this->db->get_where("addons", array("id" => $_POST['sid']))->row();
        $att = $this->db->get_where("make_addon", array("id" => $st->add_on_parent))->row();
        ?><div class="products-widget__item col-md-12" style="width:100%;"><div class="products-widget__item__image pull-left" style="border: 1px solid #e4dbdb;" >
          <a href="#"><img src="<?php echo base_url(); ?>adminassets/styles/resized/small/<?php echo $st->add_on_image; ?>" />
          <span class="sty_name"><b><?php echo $att->add_on_name; ?></b></span></a></div>
          <div class="products-widget__item__info" style="text-align: left; padding-left: 16px;">
            <div class="products-widget__item__info__title">
              <h2 class="text-uppercase"><a href="#"><?php echo $st->add_on_name; ?></a></h2>
            </div>

            <div class="price-box"><span class="price-box__new" style="font-size:14px;padding:1%;">&#8358; <?php echo $st->add_on_price; ?>/-</span> </div>
          </div></div><?php
}

    public function access()
    {
        $st = $this->db->get_where("style", array("id" => $_POST['sid']))->row();
        if (!empty($st)) {
            $att = $this->db->get_where("attributes", array("aid" => $st->attr_id))->row();
            ?><div class="products-widget__item col-md-12" style="width:100%;"><div class="products-widget__item__image pull-left" style="border: 1px solid #e4dbdb;">
          <a href="#"><img src="<?php echo base_url(); ?>adminassets/styles/resized/small/<?php echo $st->thumb_front; ?>" />
          <span class="sty_name"><b><?php echo $att->attr_name; ?></b></span></a></div>
          <div class="products-widget__item__info" style="text-align: left; padding-left: 16px;">
            <div class="products-widget__item__info__title">
              <h2 class="text-uppercase"><a href="#"><?php echo $st->style; ?></a></h2>
            </div>

            <div class="price-box"><span class="price-box__new" style="font-size:14px;padding:1%;">&#8358; <?php echo $st->sprice; ?>/-</span> </div>
          </div></div><?php
}}
    public function session_addon()
    {
        $this->load->library('session');

        $_SESSION['addon'][] = $_POST['m_id'];
        print_r($_SESSION['addon']);
    }

    public function custom($id)
    {

        $this->middle = 'customnew'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function custom1($id)
    {

        $this->middle = 'customnewlastupdate'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function emptycart()
    {
        $this->session->unset_userdata('dis');
        $this->cart->destroy();

    }
    public function mycart()
    {
        echo "<pre>";
        print_r($_SESSION); //exit;
    }

    public function book_predesign()
    {
        $this->db->select("id,dfront,dname,dprice");
        $this->db->where("id", $_POST['fid']);
        $ims = $this->db->get("predesign")->row();
        ?>
  <input type="hidden" name="predesign" id="sttt1050_predesign" value="<?php echo $ims->id; ?>" />

                      <div class="col-md-12 addons"  id="st1050_predesign">
    <center><div class="products-widget__item"><div class="products-widget__item__image" style="width:200px !important; height:auto; !important;">
          <img src="<?php echo base_url(); ?>adminassets/styles/<?php echo $ims->dfront; ?> "/></div></div></center>
          <div class="products-widget__item__info">
            <div class="products-widget__item__info__title">
              <h2 class="text-uppercase"><a href="#"><?php echo $ims->dname; ?></a></h2>
            </div>

            <div class="price-box"><span class="price-box__new">&#8358; <?php echo $ims->dprice; ?></span> </div>
          </div>
          </div><?php
}

    public function addtocart_accessories()
    {
        // print_r($mdata);
        $size = '';
        $color = '';
        if (isset($_POST['val_size']) && isset($_POST['val_color'])) {
            $size = $_POST['val_size'];
            $color = $_POST['val_color'];
        }

        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
            print_r($mdata);
        } else { $mdata = array();}
        $md = $mdata;
        //print_r($md);
        $c = "";
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";

            }
        } else {
            $c = "From Catelogue";
        }
        $total = $x = 0;
        $this->db->select("acc_id,main_category,SKU,price,brand,thumb,vendor_id,to_date,from_date,offer_type,offer_price");

        $this->db->where("acc_id", $form['fabric']);
        $fp = $this->db->get("accessories")->row();
        //print_r($fp);
        $x = $fp->price;
        $current_date = date('Y-m-d');
        if (($current_date >= $fp->from_date) and ($current_date <= $fp->to_date)) {

            if ($fp->offer_type == 'Percentage') {
                $value = 100 - $fp->offer_price;
                $x = ($fp->price / 100) * $value;

            } elseif ($fp->offer_type == 'Amount') {
                $value = $fp->offer_price;
                $x = $fp->price - $value;
            }
        }

        $total = $total + $x;
        //print_r($form);
        foreach ($form as $key => $value) {
            if ($value != "") {
                if ($key != 'fabric' && $key != 'custom' && $key != 'qty' && $key != 'r2' && $key != 'r' && $key != 'vendor_id' && $key != 'url') {
                    //echo $key;
                    $this->db->select("id,sprice");
                    $this->db->where("id", $value);
                    $fph = $this->db->get("style")->row();
                    echo $total = $total + $fph->sprice;
                }}
        }
        $title = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($fp->brand));
//echo $title;
        $data = array(
            'rowid' => $form['fabric'],
            'id' => $form['fabric'],
            'qty' => $form['qty'],
            'img' => 'accessories/resized_accessories/small/' . $fp->thumb,
            'price' => $total,
            'custom' => $c,
            'name' => "$title",
            'vendor_id' => $fp->vendor_id,
            'measures' => array($mdata),
            'options' => array($form),
            'size' => $size,
            'color' => $color,
            'main_cat' => $fp->main_category,
            'sku' => $fp->SKU,
            'productlink' => $form['url'],

        );
//print_r($data);
        if ($this->cart->insert($data)) {

            $this->load->view("ajax_cart");

        } else {
            echo "Couldnot added to cart";
        }

    }

    public function addtocart_boutique()
    {
        // print_r($mdata);
        $size = '';
        $color = '';
        if (isset($_POST['val_size']) && isset($_POST['val_color'])) {
            $size = $_POST['val_size'];
            $color = $_POST['val_color'];
        }
        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
        } else { $mdata = array();}
        $md = $mdata;

        $c = "";
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";
            }
        } else {
            $c = "From Catelogue";
        }
        $total = $x = 0;
        $this->db->select("id,price,SKU,main_category,brand,thumb,vendor_id,to_date,from_date,offer_type,offer_price");

        $this->db->where("id", $form['fabrics']);
        $fp = $this->db->get("online_boutique")->row();
        //print_r($fp);
        $x = $fp->price;
        $current_date = date('Y-m-d');
        if (($current_date >= $fp->from_date) and ($current_date <= $fp->to_date)) {

            if ($fp->offer_type == 'Percentage') {
                $value = 100 - $fp->offer_price;
                $x = ($fp->price / 100) * $value;

            } elseif ($fp->offer_type == 'Amount') {
                $value = $fp->offer_price;
                $x = $fp->price - $value;
            }
        }

        $total = $total + $x;

        $title = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($fp->brand));
        $data = array(
            'rowid' => $form['fabrics'],
            'id' => $form['fabrics'],
            'qty' => $form['qty'],
            'img' => 'online_boutique/resized_online_boutique/small/' . $fp->thumb,
            'price' => round($total),
            'custom' => $c,
            'name' => $title,
            'vendor_id' => $fp->vendor_id,
            'measures' => array($mdata),
            'options' => array($form),
            'size' => $size,
            'color' => $color,
            'main_cat' => $fp->main_category,
            'sku' => $fp->SKU,
            'productlink' => $form['url'],
        );

        if ($this->cart->insert($data)) {

            $this->load->view("ajax_cart");

        } else {
            echo "Couldnot added to cart";
        }

    }

    public function addtocart_uniform()
    {

        $size = '';
        $color = '';
        if (isset($_POST['val_size']) && isset($_POST['val_color'])) {
            $size = $_POST['val_size'];
            $color = $_POST['val_color'];
        }
        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
        } else { $mdata = array();}
        $md = $mdata;

        $c = "";
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";
            }
        } else {
            $c = "From Catelogue";
        }
        $total = $x = 0;
        //$this->db->select("uniform_id,price,school_name,uniform_image,vendor_id");

        $this->db->where("uniform_id", $form['fabric']);
        $fp = $this->db->get("uniform")->row();
        //print_r($fp);
        $x = $fp->price;
        $current_date = date('Y-m-d');
        if (($current_date >= $fp->from_date) and ($current_date <= $fp->to_date)) {

            if ($fp->offer_type == 'Percentage') {
                $value = 100 - $fp->offer_price;
                $x = ($fp->price / 100) * $value;

            } elseif ($fp->offer_type == 'Amount') {
                $value = $fp->offer_price;
                $x = $fp->price - $value;
            }
        }

        $total = $total + $x;
        foreach ($form as $key => $value) {
            if ($value != "") {
                if ($key != 'fabric' && $key != 'custom' && $key != 'qty' && $key != 'r2' && $key != 'r' && $key != 'vendor_id' && $key != 'url') {
                    $this->db->select("id,sprice");
                    $this->db->where("id", $value);
                    $fph = $this->db->get("style")->row();
                    echo $total = $total + $fph->sprice;
                }}
        }
        $title = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($fp->school_name));
        $data = array(
            'rowid' => $form['fabric'],
            'id' => $form['fabric'],
            'qty' => $form['qty'],
            'img' => 'uniform/resized_uniform/small/' . $fp->uniform_image,
            'price' => round($total),
            'custom' => $c,
            'name' => $title,
            'vendor_id' => $fp->vendor_id,
            'measures' => array($mdata),
            'options' => array($form),
            'size' => $size,
            'color' => $color,
            'main_cat' => $fp->uni_category,
            'sku' => $fp->SKU,
            'productlink' => $form['url'],

        );

        if ($this->cart->insert($data)) {

            $this->load->view("ajax_cart");

        } else {
            echo "Couldnot added to cart";
        }

    }
    public function addtocart_bundle()
    {
        $this->load->library('session');
        $total = 0;
        $vendor_id = '';
        $fabric_name = '';
        $stitch = 'stitch';
        $last_row = $this->db->select('id,bundle_no')->order_by('id', "desc")->limit(1)->get('stitching_bundle')->row();
        $bundle_no = $last_row->bundle_no + 1;

        if ($this->session->userdata('fabric_id')) {

            $fabric_id = $this->session->userdata('fabric_id');
            $this->db->select('*');
            $this->db->where('id', $fabric_id);
            $data = $this->db->get('fabric')->row();

            echo $fabric_name = 'with ' . preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($data->title));
            $vendor_id = $data->vendor_id;
            $stitch = "stitch with fabric";
            $current_date = date('Y-m-d');
            if (($current_date >= $data->from_date) and ($current_date <= $data->to_date)) {
                if ($data->offer_type == 'Percentage') {$value = 100 - $data->offer_price;
                    $x = round(($data->price / 100) * $value);
                } elseif ($data->offer_type == 'Amount') {
                    $value = $data->offer_price;
                    $x = round($data->price - $value);}
            } else {
                $x = round($data->price);
            }

            $data = array(
                'part_ids' => $fabric_id,
                'bundle_no' => $bundle_no,
                'addon_or_not' => 4,
                'fabric_price' => $x * $this->session->userdata('qty'),
                'qty' => $this->session->userdata('qty'),
                'size' => $this->session->userdata('size'),
                'color' => $this->session->userdata('color'),
                'sku' => $this->session->userdata('sku'),
                'productlink' => $this->session->userdata('productlink'),
            );
            $this->db->insert('bundle', $data);
            $total = $data['fabric_price'];
        }
        $this->load->library('upload');
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '20480';
        $config['max_filename'] = '200';
        $config['file_ext_tolower'] = true;
        $config['max_filename_increment'] = '10';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);

        if ( ! empty($_FILES['right_view']['name'])  && $this->upload->do_upload('right_view')) {
            $file = $this->upload->data()['file_name'];
            $data = array(
                'image' => $file,
                'desc' => $_POST['upload_desc'],
            );
            $this->db->insert('upload_designs', $data);
            $insert_id = $this->db->insert_id();
            $data = array(
                'part_ids' => $insert_id,
                'bundle_no' => $bundle_no,
                'addon_or_not' => 3,
            );
            $this->db->insert('bundle', $data);
        }
        if ( ! empty($_FILES['right_view']['name'])  && $this->upload->do_upload('right_view')) {
            $file = $this->upload->data()['file_name'];
            $data = array(
                'image' => $file,
                'desc' => 'Right view'
            );
            $this->db->insert('upload_designs', $data);
            $insert_id = $this->db->insert_id();
            $data = array(
                'part_ids' => $insert_id,
                'bundle_no' => $bundle_no,
                'addon_or_not' => 3,
            );
            $this->db->insert('bundle', $data);
        }
        if ( ! empty($_FILES['left_view']['name'])  && $this->upload->do_upload('left_view')) {
            $file = $this->upload->data()['file_name'];
            $data = array(
                'image' => $file,
                'desc' => 'Left view'
            );
            $this->db->insert('upload_designs', $data);
            $insert_id = $this->db->insert_id();
            $data = array(
                'part_ids' => $insert_id,
                'bundle_no' => $bundle_no,
                'addon_or_not' => 3
            );
            $this->db->insert('bundle', $data);
        }
        if ( ! empty($_FILES['back_view']['name'])  && $this->upload->do_upload('back_view')) {
            $file = $this->upload->data()['file_name'];
            $data = array(
                'image' => $file,
                'desc' => 'Back view',
            );
            $this->db->insert('upload_designs', $data);
            $insert_id = $this->db->insert_id();
            $data = array(
                'part_ids' => $insert_id,
                'bundle_no' => $bundle_no,
                'addon_or_not' => 3,
            );
            $this->db->insert('bundle', $data);
        }

        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
        } else {
            $mdata = array();
        }

        $md = $mdata;
        //print_r($mdata);

        $c = "";

        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";

                foreach ($form as $key => $value) {
                    if ($value != "") {
                        if ($key != 'fabric' && $key != 'custom' && $key != 'qty') {
                            if ($key == 'predesign') {
                                $this->db->select("id,dfront,dprice");
                                $this->db->where("id", $value);

                                $fph = $this->db->get("predesign")->row();
                                $image_to_show[0] = $fph->dfront;
                                $total = $total + $fph->dprice;
                            } else if (gettype($value) == 'array') {
                                foreach ($value as $key2 => $value2) {
                                    //print_r($value2);
                                    if ($value2 != '') {
                                        $this->db->select("id,add_on_price");
                                        $this->db->where("id", $value2);

                                        $fph = $this->db->get("addons")->row();
                                        $total = $total + $fph->add_on_price;
                                    }

                                }

                            } else {
                                $this->db->select("id,sprice,thumb_front");
                                $this->db->where("id", $value);

                                $fph = $this->db->get("style")->row();
                                $image_to_show[] = $fph->thumb_front;
                                $total = $total + $fph->sprice;
                            }

                        }}}

                foreach ($form as $key => $value) {
                    if ($value != "") {

                        if ($key != 'fabric' && $key != 'custom' && $key != 'qty') { //echo "in";
                            if ($key == 'predesign') {
                                $data = array(
                                    'part_ids' => $value,
                                    'bundle_no' => $bundle_no,
                                    'addon_or_not' => 2,
                                );

                                $this->db->insert('bundle', $data);

                            } else if (gettype($value) == 'array') {
                                foreach ($value as $key2 => $value2) {
                                    if ($value2 != '') {
                                        $data = array(
                                            'part_ids' => $value2,
                                            'bundle_no' => $bundle_no,
                                            'addon_or_not' => 1,
                                        );

                                        $this->db->insert('bundle', $data);

                                    }}
                            } else {
                                $data = array(
                                    'part_ids' => $value,
                                    'bundle_no' => $bundle_no,
                                    'addon_or_not' => 0,
                                );

                                $this->db->insert('bundle', $data);
                            }
                        }}

                }
                if (!empty($mdata)) {
                    //print_r($mdata);die;
                    foreach ($mdata as $key => $value) {
                        if ($value != "") {
                            $data = array(

                                'bundle_no' => $bundle_no,
                                'name' => $key,
                                'value' => $value,
                            );

                            $this->db->insert('measurements', $data);

                        }

                    }
                }
                ////
                $new_form = array("fabric" => $form['fabric'], "custom" => $form['custom'], "qty" => $form['qty']);
                foreach ($form as $key => $value) {
                    if ($key != 'fabric' && $key != 'custom' && $key != 'qty') {
                        if ($key != "") {

                            if (gettype($value) == 'array') {
                                foreach ($value as $key2 => $value2) {
                                    $new_form[$key2] = $value2;
                                }
                            } else {
                                $new_form[$key] = $value;
                            }
                        }

                    }}
                ////

                $data2 = array(
                    'bundle_no' => $bundle_no,
                    'total_price' => $total,
                );

                $this->db->insert('stitching_bundle', $data2);

                //select last from stitching_bundle table
                $last_row = $this->db->select('id', 'bundle_no')->order_by('id', "desc")->limit(1)->get('stitching_bundle')->row();
                $bundle_no = $last_row->id;

//print_r($form);
                //print_r($new_form);
                $allKeys = array_keys($new_form);
//echo $allKeys[0];
                //print_r($image_to_show);
                //die;
                $title = explode('_', $allKeys[3]);
                //print_r($title);die;
                $data = array(
                    'rowid' => $bundle_no,
                    'id' => $bundle_no,
                    'qty' => 1,
                    'img' => 'styles/resized/large/' . $image_to_show[0], //'fabrics/'.$fp->thumb,
                    'order_type' => $stitch,
                    'price' => round($total),
                    'custom' => $c,
                    'name' => $title[0] . ' Stitching ' . $fabric_name,
                    'vendor_id' => $vendor_id,
                    'measures' => array($mdata),
                    'options' => array($new_form),
                );

                if ($this->cart->insert($data)) {

                    $this->load->view("ajax_cart");

                } else {
                    echo "Couldnot added to cart";
                }
            }
        }

        //$this->db->select("id,price,title,thumb,vendor_id");
        //print_r($form['fabric']);
        //$this->db->where("id",$form['fabric']);
        //$fp=$this->db->get("fabric")->row();
        //$total=$total+$fp->price;
        if ($this->session->userdata('fabric_id')) {
            unset($_SESSION['fabric_id']);
        }
    }

    public function addtocart()
    {
        // print_r($_POST);
        $size = '';
        $color = '';
        if (isset($_POST['val_size'])) {
            $size = $_POST['val_size'];

        }
        if (isset($_POST['val_color'])) {

            $color = $_POST['val_color'];
        }
        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
        } else { $mdata = array();}
        $md = $mdata;

        $c = "";
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";
            }
        } else {
            $c = "From Catelogue";
        }
        $total = $x = 0;
        $this->db->select("id,price,category,SKU,title,thumb,vendor_id,from_date,to_date,offer_type,offer_price");
        //print_r($form['fabric']);
        $this->db->where("id", $form['fabric']);
        $fp = $this->db->get("fabric")->row();
        ///
        $x = round($fp->price);
        $current_date = date('Y-m-d');
        if (($current_date >= $fp->from_date) and ($current_date <= $fp->to_date)) {

            if ($fp->offer_type == 'Percentage') {
                $value = 100 - $fp->offer_price;
                $x = round(($fp->price / 100) * $value);

            } elseif ($fp->offer_type == 'Amount') {
                $value = $fp->offer_price;
                $x = round($fp->price - $value);
            }
        }

        ///
        $total = $total + $x;
        foreach ($form as $key => $value) {
            if ($value != "") {
                if ($key != 'vendor_id' && $key != 'fabric' && $key != 'custom' && $key != 'qty' && $key != 'r2' && $key != 'r' && $key != 'url' && $key != 'sku' && $key != 'fabric_id' && $key != 'mcat_id') {
                    $this->db->select("id,sprice");
                    $this->db->where("id", $value);
                    $fph = $this->db->get("style")->row();
                    echo $total = $total + $fph->sprice;
                }}
        }
        if (isset($form['vendor_id'])) {

        } else {
            $form['vendor_id'] = 0;
        }
        $title = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($fp->title));
        //echo $title;
        //  print_r($form);
        // echo $total;die;
        $data = array(
            'rowid' => $form['fabric'],
            'id' => $form['fabric'],
            'qty' => $form['qty'],
            'img' => 'fabrics/resized_fabric/small/' . $fp->thumb,
            'price' => ceil($total),
            'custom' => $c,
            'name' => "$title",
            'vendor_id' => $form['vendor_id'],
            'measures' => array($mdata),
            'options' => array($form),
            'size' => $size,
            'color' => $color,
            'main_cat' => $fp->category,
            'sku' => $fp->SKU,
            'productlink' => $form['url'],
        );
//print_r($data);
        if ($this->cart->insert($data)) {

            $this->load->view("ajax_cart");

        } else {
            echo "Couldnot added to cart";
        }

    }

    public function addtocart_altration()
    {
        // print_r($mdata);
        if (isset($_POST['mdata'])) {
            parse_str($_POST['mdata'], $mdata);
        } else {
            $mdata = array();
        }
        $md = $mdata;

        $c = "";
        if (isset($_POST['formdata'])) {
            parse_str($_POST['formdata'], $form);
            if (isset($form['custom'])) {
                $c = "Custom";
            }
        } else {
            $c = "From Catelogue";
        }
        $total = 0;
        $this->db->select("alt_id,c_id,price,subcategory,image");

        $this->db->where("alt_id", $form['fabric']);
        $fp = $this->db->get("altration")->row();
        //print_r($fp);
        $total = $total + $fp->price;
        $title = preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($fp->subcategory));
        $data = array(
            'rowid' => $form['fabric'],
            'id' => $form['fabric'],
            'qty' => $form['qty'],
            'date_time' => $form['date_time'],
            'alt_desc' => $form['alt_desc'],
            'order_type' => 'altration',
            'img' => 'altration/' . $fp->image,
            'price' => round($total),
            'custom' => $c,
            'name' => $title . " altration",
            'measures' => array($mdata),
            'main_cat' => $fp->c_id,
            'options' => array($form),
        );

        if ($this->cart->insert($data)) {

            $this->load->view("ajax_cart");

        } else {
            echo "Couldnot added to cart";
        }

    }

    public function removecart()
    {

        $data = array(
            'rowid' => $_POST['rid'],
            'qty' => 0,
        );

        $count = $this->cart->total_items();
        if ($count == 0) {
            $data = "<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>";
        }
        $this->cart->update($data);
        $this->load->view("ajax_cart");

    }

    public function discount()
    {
        $current_date = date('Y-m-d');
        //echo $current_date;die;

        $chk = $this->db->get_where("coupons", array("code" => $_POST['code'], "from_date<=" => $current_date, "to_date>=" => $current_date));
        $num = $chk->num_rows();
//echo $this->db->last_query();
        if ($num > 0) {
            if ($this->session->userdata("dis")) {echo "<span class='alert alert-danger'>You have Already used a code</span>"; //exit;
            } else {
                $c = $chk->row();
                if ($c->distype == "Percent") {
                    $this->load->library('session');
                    $coupondata = $this->db->get('tellyourfriend')->row();
                    if ($coupondata->coupon_code_for_friend == $_POST['code']) {

                        $email = $this->session->userdata('user_profile')['email'];
                        $tellyourfriend = $this->db->get_where('tellyourfriend_data', (array('friend' => "$email", 'friend_use' => 0)))->num_rows();
                        if ($tellyourfriend > 0) {
                            $tellyourfriend = $this->db->get_where('tellyourfriend_data', (array('friend' => "$email", 'friend_use' => 0)))->row();
//echo $this->db->last_query();
                            $this->db->where(array('friend' => "$email", 'friend_use' => ''));
                            $this->db->update('tellyourfriend_data', array('friend_use' => 1));
                            //
                            $message2 = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="<?=base_url();?>assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to ansvel</h2>
                            <br>

                            <p>Dear  ' . $this->session->userdata('name') . ',</p>
                            <p>Your friend that you have sent request has buy something from our website so..............</p>


                            <br>
                            <p> Enjoy 10% discount for your first order by simply entering the following code upon checkout.</p><br>
                            <h4>10%  DISCOUNT CODE:  ' . $coupondata->coupon_code_for_own . '</h4><br>
                            <p>We look forward to produce your tailor-made garments, alteration and serve you further.</p>



                            <p>Your Sincerely,</p>
                            <br>
                            <p>ansvel Team</p>
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
                                'wordwrap' => true,
                                'crlf' => "\r\n",
                                'newline' => "\r\n",
                            ));
                            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
                            $this->email->to($tellyourfriend->own);
                            $this->email->subject('Ansvel');
                            $this->email->message($message2);
                            $this->email->send();} else {
                            return "Invalid Coupon code";
                            //
                        }

                    } else if ($coupondata->coupon_code_for_own == $_POST['code']) {
                        // $value = $this->db->query("select id from tellyourfriend_data where own=".$this->session->userdata('user_profile')["email"]." and own_use=0 limit 1")->row();
                        $this->db->limit(1);
                        $value = $this->db->get_where('tellyourfriend_data', array('own' => $this->session->userdata('user_profile')["email"], 'own_use' => 0))->row()->id;
                        if (!empty($value)) {
                            //echo $this->db->last_query();
                            $this->db->query("Update tellyourfriend_data set own_use=1
where id = $value");
//echo $this->db->last_query();
                            //$this->db->where(array('own'=>$this->session->userdata('user_profile')["email"],'own_use'=>0));
                            //$this->db->update('tellyourfriend_data',array('own_use'=>1));
                        } else {
                            return "Invalid Coupon code";
                        }
                    }
                    $dis = $this->cart->total() * $c->disvalue / 100;
                    $data = array("dis" => $dis, "code" => $_POST['code']);
                    $this->session->set_userdata($data);
                    //echo $this->session->userdata("dis");
                    echo "<span class='alert alert-success'> " . $c->disvalue . "% Discount Applied Successfully</span>";
                }
                if ($c->distype == "Amount") {
                    $dis = $c->disvalue; //exit;
                    $data = array("dis" => $dis, "code" => $_POST['code']);
                    $this->session->set_userdata($data);
                    echo "<span class='alert alert-success'><i class='fa fa-inr'></i> " . $c->disvalue . " Discount Applied Successfully</span>";
                }}
        } else {
            echo "Invalid Coupon Code";
        }
    }

    public function cart_total()
    {
        if ($this->session->userdata("dis")) {
            echo $this->cart->total() - $this->session->userdata("dis");
        } else {
            echo $this->cart->total();}
    }
    public function contact()
    {
        $this->middle = 'contact'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function aboutus()
    {
        $this->middle = 'about'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function measurement_guide()
    {
        $this->middle = 'measurement_guide'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function measurement_info()
    {
        $this->middle = 'measurement_info'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function tellyourfriend()
    {
        $this->load->library('session');
        if ($this->session->userdata("userid") == '') {redirect(base_url() . "login?url=" . base_url() . "tell-your-friend");}

        // print_r($this->session->userdata());
        $data['user_email'] = $this->db->get_where('users', array('uid' => $this->session->userdata("userid")))->row()->email;

        // echo $data['user_email'] = $this->session->userdata('user_profile')["email"];
        // $this->middle = 'tellyourfriend'; // passing middle to function. change this for different views.
        $this->template['middle'] = $this->load->view($this->middle = 'tellyourfriend', $data, true);
        $this->layout();
    }
    public function tellyourfriendform()
    {
        //print_r($_POST);
        $data = array(

            "friend" => $this->input->post("emailFriend"),
            "own" => $this->input->post("emailOwn"),

        );
        if (!($this->db->get_where("tellyourfriend_data", $data)->row())) {
            $this->db->insert("tellyourfriend_data", $data);
            //
            $coupondata = $this->db->get('tellyourfriend')->row();

            $message = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="<?=base_url();?>assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to ansvel</h2>
                            <br>

                            <p>Dear  ' . $this->session->userdata('name') . ',</p>
                            <p>We have sent the special 10% discount code to your friend ( ' . $this->input->post("emailFriend") . ' ). Once your friend uses the discount code. We’ll be sending you with a very special 20% discount coupon for your next stitching order.</p>


                            <br>
                            <p>We look forward to send* you the discount coupon and serve* you further</p><br>




                            <p>Your Sincerely,</p>
                            <br>
                            <p>ansvel Team</p>
                            <br>


                            </div>

                        </div>
                        </body>
                        </html>';

            $message2 = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="<?=base_url();?>assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to ansvel</h2>
                            <br>

                            <p>Dear  ' . $this->input->post("emailFriend") . ',</p>
                            <p>Your friend ( ' . $this->session->userdata('name') . ' ) has sent you a special 10% stitching discount for <a href="' . base_url() . '">www.ansvel.com</a>. ansvel is the first online custom made tailoring store and provides the highest quality garments and alteration for the lowest price.</p>


                            <br>

                            <p> Enjoy 10% discount for your first order by simply entering the following code upon checkout.</p><br>
                            <h4> <a href="' . base_url() . 'login">Registration Link </h4>
                            <h4>10%  DISCOUNT CODE:  ' . $coupondata->coupon_code_for_friend . '</h4><br>
                            <p>We look forward to produce your tailor-made garments, alteration and serve you further.</p>



                            <p>Your Sincerely,</p>
                            <br>
                            <p>ansvel Team</p>
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
                'wordwrap' => true,
                'crlf' => "\r\n",
                'newline' => "\r\n",
            ));
            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($this->input->post("emailOwn"));
            $this->email->subject('Ansvel');
            $this->email->message($message);
            $this->email->send();

            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($this->input->post("emailFriend"));
            $this->email->subject('Ansvel');
            $this->email->message($message2);
            $this->email->send();

            //$this->session->set_flashdata('msg', 'An email has been sent on your email id for verification');
            //
        }

        redirect('tell-your-friend');

    }

    public function track_order()
    {
        $this->middle = 'track_order'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function brands()
    {
        $this->middle = 'brands'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function payment()
    {
        $all = $this->db->get("paymentfaq");
        $data['totalpro'] = $all->num_rows();
        $data['fab'] = $all->result();
        $this->template['middle'] = $this->load->view($this->middle = 'payment', $data, true);

        // $this->middle = 'payment'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function return_page()
    {
        $all = $this->db->get_where("cancelfaq", array('type' => 'cancel'));

        $data['cancel'] = $all->result();

        $all = $this->db->get_where("cancelfaq", array('type' => 'return'));

        $data['return'] = $all->result();

        $this->template['middle'] = $this->load->view($this->middle = 'return_page', $data, true);

        $this->layout();
    }
    public function shipping()
    {
        $this->middle = 'shipping'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function faq()
    {
        $data['faq'] = $this->db->get_where("faq", array('status_enable' => 'enable'))->result();
        $this->template['middle'] = $this->load->view($this->middle = 'faq', $data, true);
        $this->layout();
    }
    //  public function career() {
    //   $this->middle = 'career'; // passing middle to function. change this for different views.
    //   $this->layout();
    // }
    public function termsandcondition()
    {
        $this->middle = 'termsandcondition'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function privacypolicy()
    {
        $this->middle = 'privacypolicy'; // passing middle to function. change this for different views.
        $this->layout();
    }
    public function career_details()
    {
        $this->middle = 'career_details'; // passing middle to function. change this for different views.
        $this->layout();
    }

    public function showcart()
    {
        //echo $_POST['stid'];echo "<br/>";echo $_POST['atid'];exit;
        $data['cart'] = $this->db->get_where("style", array("id" => $_POST['atid'], "attr_id" => $_POST['stid']))->row();
        //print_r($data);exit;
        ?><img style="height:25%; width:25%;" class="img img-responsive" src="<?php echo base_url(); ?>adminassets/styles/<?php echo $data['cart']->thumb_front; ?>" /><?php
}
    public function count_stock($id, $name)
    {
        $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`=' . $id . ' and `pname` Like "' . preg_replace('/[^A-Za-z0-9 ]/u', '', strip_tags($name)) . '"')->row()->qty;
        return $count;
    }
    public function product()
    {
        error_reporting(0);
        $id = $this->uri->segment(5);
        if (empty($id)) {
            $id = $this->uri->segment(4);
        }

        $catname = $this->db->get_where('mcategory', array('mcat_name' => $this->uri->segment(2)))->row();
        $cid = $catname->mid;
//$mcatname = $this->db->get_where('main_categories',array('name'=>$this->uri->segment(3)))->row();

        $data['cid'] = $cid;
        $data['id'] = $id;
        $s_qty = 0;
        $data['pro'] = $this->db->get_where("fabric", array("id" => $id, "category" => $cid))->row();
        if ($data['pro']->Subtract_Stock == 'yes' || $data['pro']->Subtract_Stock == 'Yes') {$sss = $data['pro']->id;

            $bundle = $this->db->get_where('bundle', array('part_ids' => $sss, 'addon_or_not' => '4'))->result();

            foreach ($bundle as $value4) {
                $sbundle = $this->db->get_where('stitching_bundle', array('bundle_no' => $value4->bundle_no))->row();

                $count_ss = $this->db->query('select oid from `order_items` where `status` != "cancel" and `status` !="return" and `pid`=' . $sbundle->id)->row();
                if (!empty($count_ss)) {
                    $s_qty += $value4->qty;
                }
            }
            $data['count_stock_remain'] = (($data['pro']->quantity)) - ($this->count_stock($id, $data['pro']->title) + $s_qty);
        } else {
            $data['count_stock_remain'] = 1000;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'product', $data, true);
        $this->layout();
    }
    public function uniform_product()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            $id = $this->uri->segment(4);
        }

        //$catname = $this->db->get_where('mcategory',array('mcat_name'=>$this->uri->segment(2)))->row();
        $cid = $this->uri->segment(2);

        $data['cid'] = $cid;
        $data['pro'] = $this->db->get_where("uniform", array("uniform_id" => $id, "uni_category" => $cid))->row();
        //echo $this->db->last_query();
        //print_r($data);
        $data['pre'] = $this->db->get_where("uniform", array("uniform_id" => $id - 1, "uni_category" => $cid))->row();
        $data['next'] = $this->db->get_where("uniform", array("uniform_id" => $id + 1, "uni_category" => $cid))->row();
        if ($data['pro']->Subtract_Stock == 'yes' || $data['pro']->Subtract_Stock == 'Yes') {
            $data['count_stock_remain'] = (($data['pro']->quantity)) - $this->count_stock($id, $data['pro']->school_name);
        } else {
            $data['count_stock_remain'] = 1000;
        }$data['cat'] = $this->db->get_where("mcategory", array('status' => 'enable'))->result();
        $this->template['middle'] = $this->load->view($this->middle = 'uniform_product', $data, true);
        $this->layout();
    }

    public function stitchcats()
    {
        $data['cat'] = $this->db->get_where("mcategory", array('status' => 'enable'))->result();
        $data['mcat'] = $this->db->get_where("our_services", array('type' => 'Stitching'))->row();
        $this->template['middle'] = $this->load->view($this->middle = 'stitchcats', $data, true);
        $this->layout();
    }

    public function qrcode()
    {
        $this->load->library('ciqrcode');
        header("Content-Type: image/png");
        $params['data'] = 'This is a text to encode become QR Code';
        $this->ciqrcode->generate($params);
    }
    public function cart()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'cart', $data, true);
        $this->layout();
    }
    public function cart1()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'cart1', $data, true);
        $this->layout();
    }

    public function login()
    {
        error_reporting(0);
        if ($this->session->userdata("userid")) {redirect("welcome/checkout");}
        $data = array();
        if ($this->session->userdata('login') == true) {
            redirect('welcome/user_signup_google');
        }

        if (isset($_GET['code'])) {

            $this->googleplus->getAuthenticate();
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('user_profile', $this->googleplus->getUserInfo());
            redirect('welcome/user_signup_google');

        }
        $this->load->library('session');
        require_once APPPATH . 'third_party/src/Facebook/autoload.php';

//require_once 'php-graph-sdk-5.0.0/src/Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => '1633057040334141', // Replace {app-id} with your app id
            'app_secret' => '021aa163004133dc8554422f493db24b',
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('<?=base_url();?>welcome/facebook', $permissions);

//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
        $data['fb_login_url'] = htmlspecialchars($loginUrl);
//print_r($_SESSION['FBRLH_state']);
        //exit();
        $data['login_url'] = $this->googleplus->loginURL();

        $this->template['middle'] = $this->load->view($this->middle = 'login', $data, true);
        $this->layout();
    }

    public function payu()
    {
        if ($this->session->userdata("userid")) {
            //print_r($this->session->userdata);exit;
            $data['user'] = $this->session->userdata;
        }
        $data['user_data'] = $this->db->get_where("users", array("uid" => $this->session->userdata("userid")))->row();
        // print_r($data);exit;
        //$data=array();$this->load->view('blogview');
        $this->load->view('payu', $data);
        //$this->cart->destroy();
        //$this->layout();
    }

    public function add_news_letter()
    {
        $chk = $this->db->get_where("news_letter", array("email" => $_POST['email']));
        if ($chk->num_rows() > 0) {
            echo 'The Email is already registered.';
        } else {
            echo 'The Email is registered successfully.  To Confirm please check your email.';
            $hash = md5(rand(0, 1000));
            $data = array("email" => $this->input->post("email"),
                "hash" => $hash);
            $this->db->insert("news_letter", $data);
            //
            $email = $_POST['email'];

            $url = base_url() . 'index.php/welcome/verify_sub?email=' . $email . '&hash=' . $hash;
            $message = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="<?=base_url();?>assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to ansvel</h2>
                            <br>


                            <p>Thank you for joining ansvel. To finish subscription, you just need to confirm that we got your email right.</p>

                            <p><b><a href="' . $url . '">To confirm your email, please click on this link</a>

                          </p>
                            <br>
                            <p>Thanks and Regards</p>
                            <br>
                            <p>ansvel Team</p>
                            <br>


                            </div>

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
            //$this->email->cc('another@another-example.com');
            $this->email->subject('Ansvel');
            $this->email->message($message);
            $this->email->send();
            //
        }
        //redirect(base_url());

    }

    public function email_chk()
    {
        $chk = $this->db->get_where("users", array("email" => $_POST['email'], "is_verified" => "yes"));
        if ($chk->num_rows() > 0) {

            echo "The Email is already registered";

        } else {
            $this->db->delete("users", array("email" => $_POST['email'], "is_verified" => "no"));
        }

    }

    public function mobile_chk()
    {

        $chk = $this->db->get_where("users", array("mobile" => $_POST['mobile'], "is_verified" => "yes"));
        if ($chk->num_rows() > 0) {

            echo "The Mobile Number is already registered";
            // echo $this->db->last_query();
        } else {
            $this->db->delete("users", array("mobile" => $_POST['mobile'], "is_verified" => "no"));
        }

    }

    public function login_fb()
    {
        $this->load->view('login_fb');

    }
    public function facebook()
    {
//$this->load->library('session');
        //print_r($_SESSION);
        require_once APPPATH . 'third_party/src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
            'app_id' => '1633057040334141', // Replace {app-id} with your app id
            'app_secret' => '021aa163004133dc8554422f493db24b',
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
        //echo '<h3>Access Token</h3>';
        $accessToken->getValue();

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
        //print_r($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId('1633057040334141'); // Replace {app-id} with your app id
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }
            $accessToken->getValue();
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;

        $fb->setDefaultAccessToken($accessToken);

        try {
            $response = $fb->get('/me?locale=en_US&fields=name,email,gender,picture,age_range');
            $userNode = $response->getGraphUser();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
//print_r($userNode);

        //print_r($_GET);
        //print_r($userNode);
        //echo "\n";
        //print_r($userNode);

        //die;
        if ($userNode['gender'] == 'male' || $userNode['gender'] == 'Male') {$g = 'm';} else if ($userNode['gender'] == 'female' || $userNode['gender'] == 'Female') {$g = 'f';} else { $g = '';}
        $data = array("name" => $userNode['name'],
            "email" => $userNode['email'],
            "reg_date" => date("Y-m-d"),
            "gender" => $g,
            "profile_image" => $userNode['picture']['url'],
            "login_with" => 'facebook',
        );

        $data2 = array(
            "email" => $userNode['email'],
        );

        if ($name = $this->db->get_where("users", $data2)->row()) {
            $this->session->set_userdata("userid", $name->uid);
            $this->session->set_userdata("name", $name->name);
            if (isset($_SESSION['wish_url'])) {$url = $_SESSION['wish_url'];
                redirect("$url");
            } else {
                redirect("welcome/checkout");
            }

        } else {
            if ($this->db->insert("users", $data)) {
                $insert_id = $this->db->insert_id();
                $this->session->set_userdata("userid", $insert_id);
                $this->session->set_userdata("name", $userNode['name']);
                if (isset($_SESSION['wish_url'])) {$url = $_SESSION['wish_url'];
                    redirect("$url");
                } else {
                    redirect("welcome/checkout");
                }
            } else {
                redirect("welcome/login");
            }}
        //echo $this->db->last_query();
    }
    public function user_signup_google()
    {
        if ($this->session->userdata('login') != true) {
            redirect('');
        }

        $user_profile = $this->session->userdata('user_profile');
        //print_r($user_profile);die;
        $data = array("name" => $user_profile['name'],
            "email" => $user_profile['email'],
            "reg_date" => date("Y-m-d"),
            "profile_image" => $user_profile['picture'],
            "login_with" => 'google',
        );

        $data2 = array(
            "email" => $user_profile['email'],
        );

        if ($name = $this->db->get_where("users", $data2)->row()) {
            $this->session->set_userdata("userid", $name->uid);
            $this->session->set_userdata("name", $name->name);
            if (isset($_SESSION['wish_url'])) {$url = $_SESSION['wish_url'];
                redirect("$url");
            } else {
                redirect("welcome/checkout");
            }

        } else {
            if ($this->db->insert("users", $data)) {
                $insert_id = $this->db->insert_id();
                $this->session->set_userdata("userid", $insert_id);
                $this->session->set_userdata("name", $user_profile['name']);
                if (isset($_SESSION['wish_url'])) {$url = $_SESSION['wish_url'];
                    redirect("$url");
                } else {
                    redirect("welcome/checkout");
                }
            } else {
                redirect("welcome/login");
            }}
    }
    public function update_profile()
    {
        //print_r($_POST);die;
        $id = $_POST['id'];
        $data = array("name" => $this->input->post("name"),

            "mobile" => $this->input->post("contact"),
            "dob" => $this->input->post("dob"),
            "address" => $this->input->post("address"),
            "landmark" => $this->input->post("landmark"),
            "city" => $this->input->post("city"),
            "state" => $this->input->post("state"),
            "country" => $this->input->post("country"),
            "pincode" => $this->input->post("pincode"),
            "gender" => $this->input->post("gender"),
        );
        $this->db->where('uid', $id);
        $this->db->update('users', $data);
//echo $this->db->last_query();die;
        redirect("welcome/manage_profile");

    }
    public function update_pass()
    {
        $id = $_POST['id'];

        $pass = $this->db->get_where('users', array('uid' => $id))->row();
        if ($pass->password == md5($this->input->post("old"))) {
            $data = array("password" => md5($this->input->post("new")),
            );
            $this->db->where('uid', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('message', 'Password Updated Successfully');
            redirect("welcome/manage_profile");
        } else {
            $this->session->set_flashdata('message', 'Your old password was wrong');
            redirect("welcome/manage_profile");
        }

    }

    public function careers()
    {
        $allcats = $this->db->get_where("tbl_careercategory");
        $data['cats'] = $allcats->result();

        $allstates = $this->db->get_where("states where country_id =  '101'");
        $data['states'] = $allstates->result();
        $this->db->limit(50);
        $allcities = $this->db->get_where("cities");
        $data['cities'] = $allcities->result();

        $this->db->join('tbl_careercategory', 'tbl_vacancy.cat_id = tbl_careercategory.cat_id');
        $this->db->join('cities', 'tbl_vacancy.city_id = cities.id');

        $allvac = $this->db->get_where("tbl_vacancy");
        $data['vacancy'] = $allvac->result();

        $this->load->view("layout/headernew");
        $this->load->view("layout/careers", $data);
        $this->load->view("layout/footernew");
    }
    public function careerdetails()
    {
        $q = $this->db->get_where('tbl_vacancy', array('vac_id' => $this->uri->segment(2)));
        $data['jobdetails'] = $q->result();

        $this->load->view("layout/headernew");
        $this->load->view("layout/careerdetails", $data);
        $this->load->view("layout/footernew");
    }

    public function donate_login()
    {
        $site_address = $this->db->get('footer')->row();
        $data = array(
            "uid" => $this->session->userdata("userid"),
            "name" => $this->input->post("name"),
            "gender" => $this->input->post("gender"),
            "mobile" => $this->input->post("mobile"),
            "address" => $this->input->post("baddress"),
            "landmark" => $this->input->post("landmark"),
            "state" => $this->input->post("bstate"),
            "city" => $this->input->post("city22"),
            "pincode" => $this->input->post("bpin"),
            "app_time" => $this->input->post("date_time"),
            "email" => $this->input->post("email"));
        if ($this->db->insert("dontate_users", $data)) {
            //echo $this->db->last_query();
            redirect(base_url() . 'donate');
        }

    }
    public function applyjob()
    {
//print_r($_POST);
        $config['upload_path'] = './assets/doc/job/';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = '1000000';
        $this->upload->initialize($config);
        if (!empty($_FILES["resume"]["name"])) {
            //echo "in";
            if (!$this->upload->do_upload('resume')) {
                $this->upload->display_errors();
            } else {
                $image_data = $this->upload->data();
                $cover = $image_data['file_name'];
            }
        }
        $data = array(
            // "uid"=>$this->session->userdata("userid"),
            "name" => $this->input->post("name"),

            "mobile" => $this->input->post("mobile"),
            "jobtitle" => $this->input->post("jobtitle"),
            "email" => $this->input->post("email"),
            "resume" => $cover);

        /*$this->db->insert("applyforjob",$data);
        echo $this->db->last_query();*/
        if ($this->db->insert("applyforjob", $data)) {
            echo $this->db->last_query();
            redirect(base_url() . 'welcome/careerdetails/' . $this->input->post("jobid"));
        }

    }
    public function user_signup()
    {
        $site_address = $this->db->get('footer')->row();
        $data = array("name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "mobile" => $this->input->post("contact"),
            "reg_date" => date("Y-m-d"),
            "password" => md5($this->input->post("password")),
            'hash' => md5(rand(0, 1000)));
        $data2 = array(
            "email" => $this->input->post("email"),
        );
        $res = $this->db->get_where('users', $data2)->row();
        if (!empty($res)) {
            echo "Already Registered";
        } else {
            if ($this->db->insert("users", $data)) {$email = $_POST['email'];
                $hash = $data['hash'];
                $url = base_url() . 'index.php/welcome/verify?email=' . $email . '&hash=' . $hash;
                $message = '<!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                        <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                            <div id="inouter" style="border-bottom:2px dashed #444;">
                            <br>
                            <img src="<?=base_url();?>assets/images/logo2.jpg">
                            <br>
                            <h2>Welcome to ansvel</h2>
                            <br>

                            <p>Dear  ' . $this->input->post("name") . ',</p>
                            <p>Welcome and Thank you for registering on ansvel. Your account has been created, use your e-mail address for login to your account at <a href="<?=base_url();?>"><?=base_url();?>:</a></p>

                            <p><b><a href="' . $url . '">Please click on this link to verify your account</a>

                          </p>
                            <br>
                            <p>As a ansvel customer, you will surely experience the convenience and peace of mind that comes with having your customized garment and other tailoring products like alteration and fabric securely delivered right to your doorstep. At ansvel.com, we like to give you the BEST experience possible when you shop online for all your tailoring needs.</p><br>
                            <p>This email can\'t receive replies. If you have any questions or need help with something regarding our products, please contact our customer support at <a >support@ansvel.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                            <p>We hope you\'ll enjoy our products and services.</p>

                            <p>Best Regards,</p>
                            <br>
                            <p>Team ansvel</p>
                            <br>
                            <p class="footer" style="background-color: #27638e;color:white;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="' . base_url("assets/sociallinks/cod.png") . '" style="float: right;"></p>
                            <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                            <p align="center"><img width="4%" src="' . base_url("assets/sociallinks/facebook_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/twitter_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/google_square-24.png") . '"> <img src="' . base_url("assets/sociallinks/tumblr.png") . '" width="4%"> <img width="4%" src="' . base_url("assets/sociallinks/instagram_square_color-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/youtube_square_color-24.png") . '"></p>

                            </div>
                            <p class="small" style="text-align: center;">Copyright  &copy 2017 ansvel.com Powered by Absolute Innovations</p>
                        </div>
                        </body>
                        </html>';

                $to_email = $this->input->post('email');
                $this->load->library('email');
                /* $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.ansvel.com',
                'smtp_user' => 'info@ansvel.com',
                'smtp_pass' => 'admin@111',
                'smtp_port' => 587,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
                'crlf' => "\r\n",
                'newline' => "\r\n"
                ));
                $this->email->from('info@ansvel.com', 'Ansvel');*/
                $this->email->initialize(array(
                    'protocol' => 'smtp',
                    //'smtp_host' => 'mail.ansvel.com',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'absoluteinnovationspl2@gmail.com',
                    'smtp_pass' => 'Abs@2017',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'wordwrap' => true,
                    'crlf' => "\r\n",
                    'newline' => "\r\n",
                ));
                $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');

                $this->email->to($to_email);
                //$this->email->cc('another@another-example.com');
                $this->email->subject('Ansvel');
                $this->email->message($message);
                $this->email->send();
                $this->session->set_flashdata('msg', 'A verification link has been sent to your email.');

                if ($this->input->post('mobile') != '') {
                    echo "success";
                } else {
                    redirect("welcome/login");
                }
            }}
        /*else
    {
    if($this->input->post('mobile')!=''){

    }else{
    redirect("welcome/login");
    }
    }*/
    }
    public function verify()
    {
        //print_r($_GET);
        $result = $this->db->get_where('users', array('email' => $_GET['email']))->row(); //get the hash value which belongs to given email from database
        //print_r($result);
        if ($result) {
            if ($result->hash == $_GET['hash']) { //check whether the input hash value matches the hash value retrieved from the database
                $data = array('is_verified' => 'yes');
                $this->db->where('email', $_GET['email']);
                $this->db->update('users', $data);
                $this->session->set_userdata("userid", $result->uid);
                $this->session->set_userdata("name", $result->name);
                redirect("welcome/checkout");
            }
        }
    }
    public function verify_sub()
    {
        //print_r($_GET);
        $result = $this->db->get_where('news_letter', array('email' => $_GET['email']))->row(); //get the hash value which belongs to given email from database
        //print_r($result);
        if ($result) {
            if ($result->hash == $_GET['hash']) { //check whether the input hash value matches the hash value retrieved from the database
                $data = array('is_verified' => 'yes');
                $this->db->where('email', $_GET['email']);
                $this->db->update('news_letter', $data);
                //$this->session->set_userdata("userid",$result->uid);
                //$this->session->set_userdata("name",$result->name);
                redirect("welcome");
            } else {
                redirect("welcome");
            }
        }
    }

    public function mobilelogincheck($email, $pass)
    {
        $chk = $this->db->get_where("users", array("email" => $_GET['email'], "password" => md5($_GET['pass']), "is_verified" => 'yes', "status" => "enable"));
        if ($chk->num_rows() > 0) {
            $user = $chk->row();
            $data = array(
                'userid' => $user->uid,
                'email' => $user->email,
                'name' => $user->name,
            );

            $this->session->set_userdata($data);
            redirect("login");
        } else {
            redirect("login");
        }

    }
    public function user_login()
    {

        $chk = $this->db->get_where("users", array("email" => $_POST['email'], "password" => md5($_POST['password']), "is_verified" => 'yes', "status" => "enable"));
        if ($chk->num_rows() > 0) {
            $this->load->library('session');
            $user = $chk->row();
            $data = array("userid" => $user->uid,
                "user_email" => $_POST['email'],
                "name" => $user->name);

            if (isset($_POST['rememberme'])) {
                $cookie_name = $_POST['email'];
                $cookie_value = $_POST['password'];
                setcookie('uname', $cookie_name, time() + (86400 * 30), "/");
                setcookie('upass', $cookie_value, time() + (86400 * 30), "/");
            }

            $this->session->set_userdata($data);
            //print_r($this->session->userdata());
            if ($this->cart->contents()) {
                $this->checkout();
            } else if (isset($_POST['redirect']) && !empty($_POST['redirect'])) {
                $url = $_POST['redirect'];
                redirect("$url");
            } else {
                redirect("welcome/login");
            }
        } else {
            $chk2 = $this->db->get_where("users", array("email" => $_POST['email'], "password" => md5($_POST['password']), "is_verified" => 'no', "status" => "enable"));
            if ($chk2->num_rows() > 0) {
                $this->session->set_flashdata('invalid', 'Your email id is not verified please check your mail');
            } else {
                $this->session->set_flashdata('invalid', 'Invalid Username Or Password');
            }
            redirect("welcome/login");
        }
    }

    public function delete_order($oid)
    {
        if ($this->db->delete('orders', array('oid' => $oid))) {
            redirect("product/pending_orders");
        } else {
            redirect("product/order_details/" . $oid);
        }
    }

    public function payum()
    {
        $userid = $this->ion_auth->get_user_id();

        if (is_numeric($userid)) {

            $this->data['title'] = 'payU Money cash Deposit';
            $this->data['records'] = $this->base_model->run_query("select *   FROM    users where uid=" . $userid
            );
            $this->data['content'] = 'user/payum';
            $this->_render_page('user/payum', $this->data);
        } else {
            $this->prepare_flashmessage('Session Expired!', 2);
            redirect('auth/login', 'refresh');
        }
    }

    public function checkout()
    {

        if (!$this->session->userdata("userid")) {redirect("welcome/login");}
        if (!$this->cart->contents()) {redirect("welcome");}
        ///captcha///
        /* $this->load->helper('captcha');
        $vals = array(
        'word'          => 'Random word',
        'img_path'      => './assets/images/captcha/',
        'img_url'       => base_url()."assets/images/captcha/",
        'font_path'     => base_url()."assets/font/fonts/texb.ttf",
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
        'background' => array(255, 255, 255),
        'border' => array(255, 255, 255),
        'text' => array(0, 0, 0),
        'grid' => array(255, 40, 40)
        )
        );

        $cap = create_captcha($vals);*/
//print_r($cap);
        //echo $cap['image'];
        ///captch///
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'checkout', $data, true);
        $this->layout();
    }
    public function selectstat_oncheckout()
    {
        $statid = $this->input->post("sid");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '<label class="lb">City</label>

                <select class="input--wd input--wd--full" name="bcity" required>

                  <option value=""></option>';

        foreach ($data['allcity'] as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        ?>


              <?php echo '</select>';

    }

    public function selectstat_oncarrer()
    {
        $statid = $this->input->post("sid");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '<select class="select3 form-control" data-style="select--wd select--wd--sm" data-width="130"  name="city_id">
                    <option value="">Select City</option>

                  <option value=""></option>';

        foreach ($data['allcity'] as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        ?>


              <?php echo '</select>';

    }

    public function selectstat_donate()
    {
        $statid = $this->input->post("sid");
        $statetext = $this->db->get_where('cities', array('state_id' => $statid));
        $data['allcity'] = $statetext->result();
        echo '<div class="form-group">
          <label class="control-label col-sm-3" for="email">City:</label>
<div class="col-sm-9">
                  <select class="form-control" name="city22" required>

                    <option value=""></option>';

        foreach ($data['allcity'] as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        ?>


                <?php echo '</select></div></div>';

    }

    public function place_order()
    {
        //print_r($this->session->userdata);
        //print_r($_POST);die;
        $code = '';
        if ($this->session->userdata("dis")) {
            $ctot = $this->cart->total() - $this->session->userdata("dis");
            $dis = $this->session->userdata("dis");
            $code = $this->session->userdata("code");

        } else {
            $ctot = $this->cart->total();
            $dis = 0;} //exit;
        $delivery_date = $this->db->get_where('shipping_methods', array('id' => $this->input->post("ship")))->row();
        $price = $delivery_date->price;
        $ctot += $price;
        $days = $delivery_date->days;
        $date = strtotime("+$days day");
//echo date('M d, Y', $date);
        if (isset($_POST['oid'])) {
            $od = $this->db->get_where("orders", array("oid" => $_POST['oid']))->row();
            $data2 = array("userid" => $this->session->userdata("userid"),
                "bname" => $od->bname,
                "odis" => $dis,
                "ototal" => $ctot,
                "bitems" => $this->cart->total_items(),
                "baddress" => $od->baddress,
                "blandmark" => $od->blandmark,
                "bphone" => $od->bphone,
                "bcity" => $od->bcity,
                "bstate" => $od->bstate,
                "bpin" => $od->bpin,
                "pay_status" => '',
                "pay_method" => $this->input->post("pay"),
                "shipping_method" => $this->input->post("ship"),
                "ip" => $this->input->post("ip"),
                "delivery_date" => date('d-m-Y', $date),

                //"trans_id"=>'123456',
                "odate" => date("d-m-Y"),
                "ostatus" => "In Process",

                "order_city" => $keyword = $this->session->userdata('city_session'));
        } else {
            // echo "<pre>";print_r($_POST);exit;
            $data2 = array("userid" => $this->session->userdata("userid"),
                "bname" => $this->input->post("bname"),
                "odis" => $dis,
                "code" => $code,
                "ototal" => $ctot,
                "bitems" => $this->cart->total_items(),
                "baddress" => $this->input->post("baddress"),
                "blandmark" => $this->input->post("blandmark"),
                "bphone" => $this->input->post("bcontact"),
                "bcity" => $this->input->post("bcity"),
                "bstate" => $this->input->post("bstate"),
                "bpin" => $this->input->post("bpin"),
                "pay_status" => '',
                "pay_method" => $this->input->post("pay"),
                "shipping_method" => $this->input->post("ship"),
                "ip" => $this->input->post("ip"),
                "delivery_date" => date('d-m-Y', $date),

                //"trans_id"=>'123456',
                "odate" => date("d-m-Y"),
                "order_date" => date("Y-m-d"),
                "ostatus" => "In Process",
                "order_city" => $keyword = $this->session->userdata('city_session'),
            );
        }
        if ($this->db->insert("orders", $data2) == true) {
            $oid = $this->db->insert_id();
            foreach ($this->cart->contents() as $cart) {
                $opt = "";
                $mea = "";
                foreach ($cart['options'][0] as $key => $value) {
                    $opt .= $key . " : " . $value . ",";
                }
                foreach ($cart['measures'][0] as $key => $value) {
                    $mea .= $key . " : " . $value . ",";
                }
                $opt = rtrim($opt, ',');
                $mea = rtrim($mea, ',');

                if (!isset($cart['img'])) {
                    $cart['img'] = 'null';
                }
                if (!isset($cart['date_time'])) {
                    $cart['date_time'] = 'null';
                    // $cart['order_type']='altration';
                }
                if (!isset($cart['alt_desc'])) {
                    $cart['alt_desc'] = 'null';
                }
                if (!isset($cart['color'])) {
                    $cart['color'] = 'null';
                }
                if (!isset($cart['size'])) {
                    $cart['size'] = 'null';
                }
                if (!isset($cart['main_cat'])) {
                    $cart['main_cat'] = 'null';
                }
                if (!isset($cart['sku'])) {
                    $cart['sku'] = 'null';
                }
                if (!isset($cart['order_type'])) {
                    $cart['order_type'] = 'null';
                }
                if (!isset($cart['productlink'])) {
                    $cart['productlink'] = 'null';
                }

                //print_r($cart);
                $data = array(
                    "oid" => $oid,
                    "pid" => $cart['id'],
                    "pimg" => $cart['img'],
                    "pname" => $cart['name'],
                    "qty" => $cart['qty'],
                    "price" => round($cart['price']),
                    "subtotal" => round($cart['subtotal']),
                    "order_type" => $cart['order_type'],
                    "options" => $opt,
                    "measures" => $mea,
                    "altration_desc" => $cart['alt_desc'],
                    "altration_datetime" => $cart['date_time'],
                    "city" => $keyword = $this->session->userdata('city_session'),
                    "color" => $cart['color'],
                    "size" => $cart['size'],
                    "main_cat" => $cart['main_cat'],
                    "productlink" => $cart['productlink'],
                    "sku" => $cart['sku']);
                if (!empty($cart['vendor_id'])) {
                    $data['vendor_id'] = $cart['vendor_id'];
                } else {
                    $data['vendor_id'] = null;
                }

                $placed = $this->db->insert("order_items", $data);
            }
        } else {
            echo "fail at first";
        }
        if ($data2['pay_method'] == 'PAYU') {
            if ($this->session->userdata("userid")) {
                $_SESSION['oid'] = $oid;
                //print_r($_SESSION);
                //exit;
                redirect("welcome/payu");}
        }

        if ($placed == true) {

            $uid = $this->session->userdata("userid");
            $uinfo = $this->db->get_where("users", array("uid" => $uid))->row();
            $site_address = $this->db->get('footer')->row();
            $order_total = $this->db->get_where('orders', array('oid' => $oid))->row();
            $order_pur = $this->db->get_where('order_items', array('oid' => $oid))->result();

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
          <h2>ansvel.com</h2>
          <div id="inouter">
          <br>


          <p>Dear ';

            $user = $uinfo->name;
            $message .= $user;
            $message .= ',</p>



          <p>Thank you for confirming your order OMD-' . $oid . '. We are getting your order ready to be shipped. We\'ll notify you when it\'ll be dispatch for delivery.
</p>


          <br>
          Following are the item(s) in this package:
          <table>
          <tr>
            <td class="a" ></td>
            <td class="a"></td>
            <td class="a">Size</td>
            <td class="a">Quantity</td>
            <td class="a">Price</td>
            <td class="a"></td>
          </tr>';
            $total_p = 0;
            foreach ($order_pur as $value) {
                $total_p += $value->subtotal;
                $message .= '<tr>';
                if ($value->order_type == 'stitch' || $value->order_type == 'stitch with fabric') {

                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'adminassets/' . $value->pimg . '" ';

                } elseif ($value->pimg == 'null') {
                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'assets/images/fabrics/bag.png" ';
                } else {
                    $message .= '<img style="max-height:100px;" class="img img-responsive" src="' . base_url() . 'assets/images/' . $value->pimg . '" ';
                }
                $message .= ' width="50px"></td>
            <td class="a" width="200px">' . $value->pname . '</td>
            <td class="a">' . $value->size . '</td>
            <td class="a">' . $value->qty . '</td>
            <td class="a">Rs. ' . $value->subtotal . '</td>
            <td class="a">';
                if ($value->productlink != '' && $value->productlink != 'null') {
                    $message .= '<a href="' . $value->productlink . '" target="_balnk">View item</a>';
                }
                $message .= '</td>
          </tr>';}
            $ship = $this->db->get_where('shipping_methods', array('id' => $order_total->shipping_method))->row();

            $message .= '<tr>
      <td colspan="3"><span class="expecteddate">Expect Delivery by ' . date("D d M", strtotime($order_total->delivery_date)) . '</span></td>
      <td><b>Item Subtotal: </b></td>
      <td>Rs. ' . $total_p . '</td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td><b>Shipping and Handling : </b></td>
      <td>Rs. ' . $ship->price . " (" . $ship->reason . ")" . '</td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td><b>Order Total: </b></td>
      <td>Rs. ' . $order_total->ototal . '</td>
    </tr>';

            $message .= '</table>


          <p>This email can\'t receive replies. If you have any questions or need help with something regarding our services or our products, Please contact our customer support at support@ansvel.com or call us at +91 9644409191 or 0731-2557166 (Working hours 10:30am to 7pm, Monday-Saturday)
</p>
          <p>We hope you\'ll enjoy our products and services.
</p>
          <br>
          <p>Regards,<br>Team ansvel</p>
          <br>
          <div class="footer"><center><img src="' . base_url() . '/assets/sociallinks/playstore.png"><img src="' . base_url() . '/assets/sociallinks/apple.png"></center>
          <center><p class="footeremail"><span class="lightblur">Contact Us at Email</span>: info@ansvel.com</p></center>
          <center><p class="blur">Your received this message because you\'re a member of ansvel</p></center>
          </div>
          <p class="center small"><u>Unsubscribe</u><br></p>
          <p class="center small">Follow us on: <br>
          <center><a href="#"><img src="' . base_url() . '/assets/sociallinks/facebook_circle_black-24.png"></a><a href="#"><img src="' . base_url() . '/assets/sociallinks/twitter_circle_black-24.png"></a><a href="#"><img src="' . base_url() . '/assets/sociallinks/google_circle_black-24.png"></a></center></p>
          </div>

          </div>
          </body>
          </html>';

            $msg2 = "\n";
            foreach ($order_pur as $value) {
                $msg2 .= $value->pname . " --> " . $value->subtotal . "\n";
            }

            $authKey = '136895AdMGPnqo6n5875df12';

            if ($order_total->bphone != $uinfo->mobile) {
                $mobileNumber = $uinfo->mobile . "," . $order_total->bphone;
            } else {
                $mobileNumber = $uinfo->mobile;
            }
            $senderId = 'ANSVEL';
            // $message1 = "Your order has been placed with ansvel \norder id ".$oid.$msg2."\ntotal is".$order_total->ototal;
            $message1 = "Your order has been successfully placed. Thanks for shopping at ansvel. We are getting your order ready to be shipped. For detail please check your e-mail.";
            $route = 4;
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
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

            $to_email = $uinfo->email;
            /*print_r($to_email);
            exit;*/
            $this->load->library('email');
            $this->email->initialize(array(
                'protocol' => 'smtp',
                //'smtp_host' => 'mail.ansvel.com',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'absoluteinnovationspl2@gmail.com',
                'smtp_pass' => 'Abs@2017',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => true,
                'crlf' => "\r\n",
                'newline' => "\r\n",
            ));
            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($to_email);
            //$this->email->cc('another@another-example.com');
            $this->email->subject('Ansvel');
            $this->email->message($message);
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";

            }

            $this->cart->destroy();
            $this->db->where('oid', $oid);
            $this->db->update('orders', array('pay_status' => 'success'));

            redirect("orders/" . $oid);

        } else {
            echo "fail";
        }
    }
    public function updatemycart()
    {
        $data = array(
            'rowid' => $_POST['id'],
            'qty' => $_POST['qty'],
        );
        $this->cart->update($data);
        foreach ($this->cart->contents() as $cart) {
            if ($cart['rowid'] == $_POST['id']) {echo $cart['subtotal'];}
        }
    }

    public function print_invoice($oid)
    {
        $this->db->where("oid", $oid);
        $data = array("read_status" => "yes");
        $this->db->update('orders', $data);

        $this->db->select('*');
        $this->db->from('orders');

        $this->db->join('users', 'orders.userid = users.uid');
        $this->db->where("oid", $oid);

        $orders = $this->db->get();
        $data['order'] = $orders->row();
        $data['items'] = $this->db->get_where("order_items", array("oid" => $oid))->result();
        $this->template['middle'] = $this->load->view($this->middle = 'print_invoice', $data, true);
        $this->layout();
    }

    public function orders($oid = 0)
    {
        $data['neworder'] = $oid;
        $this->db->order_by("oid", "desc");
        if ($_POST) {
            $this->db->where('oid', $_POST['id']);
            $data['notfound'] = 1;
        }
        $data['orders'] = $this->db->get_where("orders", array("userid" => $this->session->userdata("userid"), "ostatus!=" => "cancelled by user", "pay_status" => "success", "delete" => 0))->result_array();
        $data['footer'] = $this->db->get("footer")->row();

        $this->template['middle'] = $this->load->view($this->middle = 'orders', $data, true);
        $this->layout();
    }

    public function cancel_orders($oid = 0)
    {
        $data['neworder'] = $oid;
        $this->db->order_by("oid", "desc");
        $data['orders'] = $this->db->get_where("orders", array("userid" => $this->session->userdata("userid"), "ostatus" => "cancelled by user", "pay_status" => "success"))->result_array();
        $data['cancel'] = 'true';
        $this->template['middle'] = $this->load->view($this->middle = 'orders', $data, true);

        $this->layout();
    }

    public function profile()
    {
        $data = array(); //['orders']=$this->db->get_where("orders",array("userid"=>$this->session->userdata("userid")))->result_array();
        $this->template['middle'] = $this->load->view($this->middle = 'profile', $data, true);
        $this->layout();
    }

    public function change_pass()
    {
        $chk = $this->db->get_where("users", array("uid" => $this->session->userdata("userid"), "password" => md5($_POST['op'])));
        if ($chk->num_rows() > 0) {

            $data = array("password" => md5($_POST['np']));
            $this->db->where("uid", $this->session->userdata("userid"));
            if ($this->db->update("users", $data) == true) {
                echo "Password Changed Successfully.";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }
    public function change_pass2()
    {
        $chk = $this->db->get_where("users", array("uid" => $this->session->userdata("userid"), "password" => md5($_POST['old'])));
        if ($chk->num_rows() > 0) {

            $data = array("password" => md5($_POST['new1']));
            $this->db->where("uid", $this->session->userdata("userid"));
            if ($this->db->update("users", $data) == true) {
                echo "Password Changed Successfully.";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }
    public function change_r_mail()
    {
        $chk = $this->db->get_where("users", array("uid" => $this->session->userdata("userid")));
        if ($chk->num_rows() > 0) {

            $data = array("r_email" => $_POST['email']);
            $this->db->where("uid", $this->session->userdata("userid"));
            if ($this->db->update("users", $data) == true) {
                echo "Password Changed Successfully.";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }
    public function change_r_contact()
    {
        $chk = $this->db->get_where("users", array("uid" => $this->session->userdata("userid")));
        if ($chk->num_rows() > 0) {

            $data = array("r_contact" => $_POST['contact']);
            $this->db->where("uid", $this->session->userdata("userid"));
            if ($this->db->update("users", $data) == true) {
                echo "Password Changed Successfully.";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }

    public function cancel_order($oid)
    {
        $data = array("ostatus" => "cancelled by user",
            "cancel_status_date" => date('Y-m-d'),
            "cancel_read_status" => "noread");

        $this->db->where("oid", $oid);
        if ($update = $this->db->update("orders", $data)) {
            $this->session->set_flashdata('msg', 'Order No ' . $oid . ' Was Cancelled Successfully');
            redirect("orders");
        }
    }

    public function filter_child_acc()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $page_no = $_POST['page_no'] * 20;
        $cat = $_POST['cat'];
        //$page_count= 0;
        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val']) && $_POST['val'] != 'none') {
            $val = $_POST['val'];
        } else {
            $val = '';
        }

        if (isset($_POST['new_cat']) && $_POST['new_cat'] != 'none') {

            $cat2 = $_POST['new_cat'];
        } else {
            $cat2 = '';
        }

//print_r($cat2);

        // print_r($form);
        if (!empty($_POST['formdata']) && $_POST['formdata'] != 'none') {

            $unique_kk2 = explode(',', $_POST['formdata']);

            $keyword = $this->session->userdata('city_session');
            $this->db->where_in("acc_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }

            $data['pros'] = $var->result();

            $this->load->view("filter_child_acc", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("brand", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2 != 'none') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("accessories", array("main_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['pros'] = $var->result();
            $this->load->view("filter_child_acc", $data);
        }
        //print_r($this->db->last_query());
    }

    public function filter_child_uniform()
    {
        print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $page_no = $_POST['page_no'] * 20;
        $cat = $_POST['cat'];
//$page_count= 0;
        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val']) && $_POST['val'] != 'none') {
            $val = $_POST['val'];
        } else {
            $val = '';
        }

        if (isset($_POST['new_cat']) && $_POST['new_cat'] != 'none') {

            $cat2 = $_POST['new_cat'];
        } else {
            $cat2 = '';
        }

//print_r($cat2);

// print_r($form);
        if (!empty($_POST['formdata']) && $_POST['formdata'] != 'none') {

            $unique_kk2 = explode(',', $_POST['formdata']);

            $keyword = $this->session->userdata('city_session');
            $this->db->where_in("uniform_id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            $this->db->order_by('uniform_id', 'desc');

            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }

            $data['pros'] = $var->result();

            $this->load->view("filter_child_uniform", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {

                $this->db->order_by("school_name", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('uniform_id', 'desc');
            if ($cat2 != '' && $cat2 != 'none') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {

                $var = $this->db->get_where("uniform", array("uni_category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['pros'] = $var->result();
            $this->load->view("filter_child_uniform", $data);
        }
//print_r($this->db->last_query());
    }
    public function filter_child()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $page_no = $_POST['page_no'] * 20;
        $cat = $_POST['cat'];
        //$page_count= 0;
        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val']) && $_POST['val'] != 'none') {
            $val = $_POST['val'];
        } else {
            $val = '';
        }

        if (isset($_POST['new_cat']) && $_POST['new_cat'] != 'none') {

            $cat2 = $_POST['new_cat'];
        } else {
            $cat2 = '';
        }

//print_r($cat2);

        // print_r($form);
        if (!empty($_POST['formdata']) && $_POST['formdata'] != 'none') {

            $unique_kk2 = explode(',', $_POST['formdata']);

            $keyword = $this->session->userdata('city_session');
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            $this->db->order_by('id', 'desc');
            if ($cat2 != '' && $cat2[0] != '') {
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }

            $data['pros'] = $var->result();

            $this->load->view("filter_child", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {
                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20, $page_no);
            if ($cat2 != '' && $cat2 != 'none') {
                $this->db->where_in("Category_for_filter", $cat2);
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['pros'] = $var->result();
            $this->load->view("filter_child", $data);
        }
        //print_r($this->db->last_query());
    }

    public function filter()
    {
//print_r($_POST);
        ///
        $keyword = $this->session->userdata('city_session');
        //
        $per_page = 2;

        $page_count = 0;

        $u = $_POST['u'];
        $l = $_POST['l'];
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            $data['val'] = $val;
        } else {
            $val = '';
            $data['val'] = 'none';
        }
        if (isset($_POST['new_cat']) && $_POST['new_cat'] != '0') {
            $cat2 = $_POST['new_cat'];

        } else {
            $cat2 = '';

        }
        $kk2_priority = array();
        //echo $cat2;
        $cat2 = explode(',', $cat2);
//print_r($cat2);
        $data['cat'] = $_POST['cat'];
        parse_str($_POST['formdata'], $form);
        //print_r($form);
        if (!empty($form)) {

            foreach ($form as $fabric_search) {
                $this->db->like("filter_subcategory_fcid", $fabric_search);

                $kk = $this->db->get('fabric_search')->result();
                foreach ($kk as $value) {
                    $kk2[] = $value->product_id;
                    if (isset($kk2_priority[$value->product_id]) && $kk2_priority[$value->product_id] >= 1) {
                        $kk2_priority[$value->product_id]++;
                    } else {
                        $kk2_priority[$value->product_id] = 1;

                    }

                }
            }
            if (isset($kk2) and !empty($kk2)) {
                $unique_kk2 = array_unique($kk2);}
            //print_r($unique_kk2);echo "<br>";

            arsort($kk2_priority);

            foreach ($kk2_priority as $x => $x_value) {
                $priority[] = $x;
            }
            $priorityf = implode(',', $priority);
//print_r($priorityf);
            $keyword = $this->session->userdata('city_session');
            //print_r($unique_kk2);
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

//echo $val;
            if ($val == 'p_name') {

                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                //echo $cat2;
                //$this->db->where_in("Category_for_filter",$cat2);
                //$this->db->order_by('find_in_set(id, "$priorityf")');
                //$this->db->order_by("FIELD('id', $priority)");
                //$this->db->where("FIND_IN_SET('id',$priorityf) !=", 0);
                // $this->db->where(FIND_IN_SET('id',"$priorityf"));
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $cat2;
                $data['cat2'] = 'none';
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $this->db->where_in("id", $unique_kk2);
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");

            if ($val == 'p_name') {

                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            if ($cat2 != '' && $cat2[0] != '') {
                $data['cat2'] = $cat2;
                $data['cat2'] = implode(',', $cat2);
                $this->db->where_in("Category_for_filter", $cat2);
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['u'] = $u;
            $data['l'] = $l;
            $data['count'] = $var->num_rows();

            $data['unique_kk2'] = implode(',', $unique_kk2);

            $data['pros'] = $var->result();
            //print_r($this->db->last_query());
            $this->load->view("filter", $data);
        } else {
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {
                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }

            if ($cat2 != '' && $cat2[0] != '') {

                $this->db->where_in("Category_for_filter", $cat2);
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['count'] = $var->num_rows();
            $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->where("price BETWEEN $l AND $u");
            if ($val == 'p_name') {
                $this->db->order_by("title", "asc");
            } else if ($val == 'n_name') {
                $this->db->order_by("padddate", "asc");
            } else if ($val == 'price_l_to_h') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "asc");
            } else if ($val == 'price_h_to_l') {
                $this->db->order_by("CAST(price AS UNSIGNED )", "desc");
            } else if ($val == 'r_low') {
                $this->db->order_by("overall_rating", "asc");
            } else if ($val == 'r_high') {
                $this->db->order_by("overall_rating", "desc");
            }
            $this->db->limit(20);
            if ($cat2 != '' && $cat2[0] != '') {

                $data['cat2'] = implode(',', $cat2);
                $this->db->order_by('id', 'desc');
                $this->db->where_in("Category_for_filter", $cat2);
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            } else {
                $data['cat2'] = 'none';
                $this->db->order_by('id', 'desc');
                $var = $this->db->get_where("fabric", array("category" => $_POST['cat'], "status" => 'approve', "status_enable" => 'enable'));
            }
            $data['u'] = $u;
            $data['l'] = $l;
//print_r($this->db->last_query());
            $data['unique_kk2'] = 'none';

            $data['pros'] = $var->result();
            $this->load->view("filter", $data);
        }

    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect("welcome");
    }

    //All Delete Functions
    public function setsession()
    {
        $this->load->library('session');
        print_r($_POST);
        if (isset($_POST)) {$aid = 'stitch' . $_POST['a_id'];
            //$id = $_POST['id'];
            echo $_SESSION["$aid"] = $_POST['id'];
        }
    }
    public function setsession_addon()
    {
        $this->load->library('session');
        print_r($_POST);
        if (isset($_POST)) {$aid = 'addon' . $_POST['a_id'];
            //$id = $_POST['id'];
            echo $_SESSION["$aid"] = $_POST['id'];
        }
    }

    public function show_fabric()
    {
        //echo $_POST['step'];exit;

        $this->load->library('session');
        if (isset($_POST['m_id'])) {
            echo $_SESSION['m_id'] = $_POST['m_id'];
        } else if (isset($_POST['m_id1'])) {
            echo $_SESSION['m_id1'] = $_POST['m_id1'];
        } else if (isset($_POST['m_id2'])) {
            echo $_SESSION['m_id2'] = $_POST['m_id2'];
        } else if (isset($_POST['m_id3'])) {
            echo $_SESSION['m_id3'] = $_POST['m_id3'];
        }
        if ($_POST['step'] >= 1) {
            $this->db->limit(1, $_POST['step'] - 1);
            $this->db->order_by("aid", "asc");
            $data['attr'] = $this->db->get_where("attributes", array("cat" => $_POST['cid']))->row();

            // $_SESSION['category_id'] = $_POST['cid'];

//echo "<script>alert(".$_SESSION['category_id'].");</script>";
            $this->load->view("show_attr", $data);
        } else {
            $data['fab'] = $this->db->get_where("fabric", array("category" => $_POST['cid']))->result();
            $this->load->view("show_fabric", $data);
        }

    }
    public function dynamic_fields()
    {
        ?>     <script type="text/javascript">
      var jqk = $.noConflict();


        //alert('kkk');

                jqk("#total_price_style").html('0');
jqk("#total_price_addons").html('0');
jqk("#total_price").html('0');
setInterval(calculation , 1000);
/*  jqk("a").hover(calculation);
jqk("div").hover(calculation);
jqk("a").click(calculation);
jqk("div").click(calculation);
jqk("#nextstep").click(calculation);
jqk("#nextstep").hover(calculation);
jqk("#backbutton").click(calculation);
jqk("#backbutton").hover(calculation);
jqk("#nextbuttn").click(calculation);
jqk("#nextbuttn").hover(calculation);
jqk("img").click(calculation);
jqk("img").hover(calculation);*/

function calculation(){
//console.log('aclled');
var total= 0;
var total_style=0;

var kk = jqk(".price-box__new").text();

jqk("#style .price-box__new").each(function() {
var kk_for_each = jqk(this).text();
//  console.log(kk_for_each);
var index = kk_for_each.indexOf("/");
//alert(index);
var str = kk_for_each.substring(1, index);
//alert(str);
if(str!=''){
total_style = total_style+parseInt(str);
//alert(total_style);
if(total_style=='')
{
jqk("#total_price_style").html('0');
jqk("#total_price_addons").html('0');
jqk("#total_price").html('0');
}else{
jqk("#total_price_style").html(total_style);
jqk("#total_price_addons").html('0');
jqk("#total_price").html(total_style);
}

}
});

jqk("#addons .price-box__new").each(function() {

var kk_for_each = jqk(this).text();
//console.log(kk_for_each);
var index = kk_for_each.indexOf("/");
var str = kk_for_each.substring(1, index);
if(str!=''){
//alert(str);
total = total+parseInt(str);

if(total=='')
{
jqk("#total_price_addons").html('0');
jqk("#total_price").html(total_style+total);
}else{
jqk("#total_price_addons").html(total);
jqk("#total_price").html(total_style+total);
}

}
});

}

     </script><?php
$collar1 = $this->db->get_where("attributes", array("cat" => $_POST['fid']))->result();
        //echo $this->db->last_query();
        //print_r($collar1);
        $i = 1;

        $total = 0;
        ?>
<div class="row">
<div id="style" class="col-md-4" style="
    border-right: 1px solid #ececec;
">


<center><h4 style=" background-color: #000; color:#fff;
    margin-bottom: 10px;margin-top: 10px; padding:12px;">Style</h4></center><?php
foreach ($collar1 as $coll1) {
            //$total = $total+
            if ($coll1->aid == 221) {
                ?>

                                          <?php

            } else {

                ?>
                <input type="hidden" name="<?php echo $coll1->attr_name; ?>" id="sttt<?php echo $coll1->aid; ?>" value="" />

                      <div class="col-md-12 addons"  id="st<?php echo $coll1->aid; ?>"></div>
                      <?php
}
        }

        ?>
                     </div>
                     <div  id="addons" class="col-md-4" style="
    border-right: 1px solid #ececec;
">
                     <center><h4 style=" background-color: #000; color:#fff;
    margin-bottom: 10px;margin-top: 10px; padding:12px;">AddOns</h4></center>


                    <?php if ($coll1->attr_name == "Add Ons") {?>

            <?php
$i = 1;
            //echo $coll1->aid;
            $sty1 = $this->db->get_where("make_addon", array("addon_page_id" => $coll1->aid))->result();

            foreach ($sty1 as $sty1) {
                //echo $sty1->id;

                //print_r($sty1);
                ?>
          <input type="hidden" name="addon[<?php echo $sty1->add_on_name; ?>]" id="sttt1050<?php echo $i; ?>" value="" />

                      <div class="col-md-12 addons"  id="st1050<?php echo $i; ?>"></div>
                <?php
$i++;
            }} else if ($coll1->aid == 229) {
            //echo "i am in 229";
            ?>
                                        <input type="hidden" name="<?php echo $coll1->attr_name; ?>" id="sttt10223" value="" />

                      <div class="col-md-6 addons"  id="st10223"></div>

<input type="hidden" name="<?php echo $coll1->attr_name; ?>1" id="sttt10224" value="" />

                      <div class="col-md-6 addons"  id="st10224"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>2" id="sttt10225" value="" />

                      <div class="col-md-6 addons"  id="st10225"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>3" id="sttt10226" value="" />

                      <div class="col-md-6 addons"  id="st10226"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>4" id="sttt10227" value="" />

                      <div class="col-md-6 addons"  id="st10227"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>5" id="sttt10228" value="" />

                      <div class="col-md-6 addons"  id="st10228"></div>



                                          <?php

        } else if ($coll1->aid == 230) {
            //echo "i am in 230";
            ?>
                                        <input type="hidden" name="<?php echo $coll1->attr_name; ?>" id="sttt10223" value="" />

                      <div class="col-md-6 addons"  id="st10223"></div>

<input type="hidden" name="<?php echo $coll1->attr_name; ?>1" id="sttt10224" value="" />

                      <div class="col-md-6 addons"  id="st10224"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>2" id="sttt10225" value="" />

                      <div class="col-md-6 addons"  id="st10225"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>3" id="sttt10226" value="" />

                      <div class="col-md-6 addons"  id="st10226"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>4" id="sttt10227" value="" />

                      <div class="col-md-6 addons"  id="st10227"></div>

                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>5" id="sttt10228" value="" />

                      <div class="col-md-6 addons"  id="st10228"></div>


                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>6" id="sttt10229" value="" />

                      <div class="col-md-6 addons"  id="st10229"></div>


                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>7" id="sttt10230" value="" />

                      <div class="col-md-6 addons"  id="st10230"></div>


                      <input type="hidden" name="<?php echo $coll1->attr_name; ?>8" id="sttt10231" value="" />

                      <div class="col-md-6 addons"  id="st10231"></div>



                                          <?php

        }
        //echo $j++;

        ?></div><div id="total" class="col-md-4">
                     <center><h4 style=" background-color: #000;
    margin-bottom: 10px;margin-top: 10px; color:#fff; padding:12px;">Total Price</h4></center>
                      <style type="text/css">
                        #total h3,#total h2{text-align: left; font-size:20px;}
            .tt1
            {
              margin-left:8px;
            }
            .tt2
            {
              margin-left:7px;
            }
            .tt3
            {
              margin-left:5px;
            }
            .tt4
            {
              margin-left:93px;
            }
            .tt5
            {
              margin-left:82px;
            }
            .tt6
            {
              margin-left:107px;
            }
                      </style>
                     <h3>Styles : <span class="tt4">&#8358;</span><span id="total_price_style" class="tt1"></span> </h3><br>
                     <h3>Addons : <span class="tt5">&#8358;</span><span id="total_price_addons" class="tt2"></span> </h3><br><hr>
                     <h3><b>Total :</b><b><span class="tt6">&#8358;</span><span id="total_price" class="tt3"></span></b></h3>

</h2>
                     </div></div><?php
}

    public function predesigns()
    {
        $data['pre'] = $this->db->get_where("predesign", array("catid" => $_POST['fid']))->result();
        $this->load->view("predesigns", $data);
    }

    public function get_measures()
    {
        $mea = $this->db->get_where("measures", array("cat" => $_POST['fid'], "status" => "enable"))->result();
        $mea_img = $this->db->get_where("measurement_image", array("cat" => $_POST['fid']))->row();
        $i = 1;
        echo '<div class="col-md-6">';
        foreach ($mea as $mea) {?>
    <div class="col-md-6">
                <label class="lb"> <?php echo $i . ". &nbsp" . $mea->measure; ?>* &nbsp&nbsp&nbsp <span data-toggle="tooltip" data-placement="bottom" title="<?php echo $mea->message; ?>"><i class="fa fa-question-circle" aria-hidden="true"></i></span> </label>
     <input type="number" min="1" max="999" pattern="[0-9]" onkeydown="return FilterInput(event)" title="number allowed only" maxlength="10" placeholder="inches" name="<?php echo $mea->measure; ?>" class="col-md-3 form-control num" required>
                </div>

                <?php $i++;}?>

</div>
<div class="col-md-6">
<?php if (!empty($mea_img->measure_image)) {?>
         <img class="sizes-example1" src="<?php echo base_url(); ?>assets/images/measure_image/<?php echo $mea_img->measure_image; ?>" />

           <?php } else {?>
            <img class="sizes-example1" src="<?php echo base_url(); ?>assets/images/kurtimeasurement.jpg" >

            <?php }?>

            </div>

  <script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/jquery.js"></script>
            <script type="text/javascript">
            function FilterInput(event) {
    var keyCode = ('which' in event) ? event.which : event.keyCode;

    isNotWanted = (keyCode == 69 || keyCode == 101);
    return !isNotWanted;
};

              $(document).ready(function(){


                $('[data-toggle="tooltip"]').tooltip();
});
            </script>
                <?php }
    public function contact_mail()
    {

        $data = array(
            'enq_interest' => $this->input->post('area'),
            'enq_order' => $this->input->post('order'),
            'enq_feedback' => $this->input->post('feedback'),
            'enq_product' => $this->input->post('product'),
            'enq_resource' => $this->input->post('resource'),
            'enq_fullname' => $this->input->post('fname') . ' ' . $this->input->post('lname'),
            'enq_email' => $this->input->post('email'),
            'enq_phone' => $this->input->post('phone'),
            'enq_address' => $this->input->post('address'),
            'enq_city' => $this->input->post('city'),
            'enq_state' => $this->input->post('state'),
            'enq_pincode' => $this->input->post('pincode'),
            'enq_subject' => $this->input->post('subject'),
            'enq_message' => $this->input->post('message'),
            'enq_postdate' => date("Y-m-d"));
        $info = $this->db->insert('tbl_enquiry', $data);
        // echo $this->db->last_query();

        $site_address = $this->db->get('footer')->row();
        $message = "<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge' />
<style type='text/css'>
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
    img{-ms-interpolation-mode: bicubic;}
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    @media screen and (max-width: 525px) {
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }
        .logo img {
          margin: 0 auto !important;
        }
        .mobile-hide {
          display: none !important;
        }
        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }
        .responsive-table {
          width: 100% !important;
        }
        .padding {
          padding: 10px 5% 15px 5% !important;
        }
        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }
        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }
        .no-padding {
          padding: 0 !important;
        }
        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }
        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }
    }
    div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>
</head>
<body style='margin: 0 !important; padding: 0 !important;'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
        <td bgcolor='#ffffff' align='center'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
                <tr>
                    <td align='center' valign='top' style='padding: 15px 0;' class='logo'>
                        <a href='http://litmus.com' target='_blank'>
                            <img alt='Logo' src='<?=base_url();?>assets/images/logo2.png'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr align='left'>
        <td bgcolor='#ffffff' align='center' style='padding: 15px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Select Your Area Of Interest :: " . $this->input->post('area') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Choose Your Topic</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Your Order ::" . $this->input->post('order') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Your Feedback ::" . $this->input->post('feedback') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Products  ::" . $this->input->post('product') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Resources ::" . $this->input->post('resource') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> First name ::" . $this->input->post('fname') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Last name ::" . $this->input->post('lname') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Email ::" . $this->input->post('email') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Phone ::" . $this->input->post('phone') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Address ::" . $this->input->post('address') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> City ::" . $this->input->post('city') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> State ::" . $this->input->post('state') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Zip code ::" . $this->input->post('pincode') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Subject ::" . $this->input->post('subject') . "</td>
                            </tr>
                            <tr>
                                <td align='center' style='font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;' class='padding-copy'> Message ::" . $this->input->post('message') . "</td>
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
        <td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
                        " . $site_address->office_add . "
                        <br>
                        <span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <a href='http://ansvel.com' target='_blank' style='color: #666666; text-decoration: none;'>Ansvel</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>";
        $from_email = $this->input->post('email');
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
            'crlf' => '\r\n',
            'newline' => '\r\n',
        ));
        $this->email->from($from_email);
        $this->email->to('info@ansvel.com');
        $this->email->subject('Contact Message');
        $this->email->message($message);
        if ($this->email->send()) {
            // echo 'in';
            $this->session->set_flashdata('contact', 'Your information send successfully.');
        } else {
            //echo 'else';
            $this->session->set_flashdata('contact', 'Sorry Some Error!');
        }
        redirect('Welcome/contact');
    }

    public function forget_password()
    {
        $email = $_POST['femail'];
        $chk2 = $this->db->get_where("users", array("email" => $email));
        $chk3 = $chk2->num_rows();
//  print_r($chk3);
        if (isset($chk3) && $chk3 > 0) {
            $chk4 = $chk2->row();
            $this->load->library('session');
            $message = '<!DOCTYPE html>
                          <html>
                          <head>
                              <title></title>
                          </head>
                          <body>
                          <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                              <div id="inouter" style="border-bottom:2px dashed #444;">
                              <br>
                              <img src="<?=base_url();?>assets/images/logo2.jpg">
                              <br>
                              <h2>Welcome to ansvel</h2>
                              <br>

                              <p>Dear  ' . $chk4->name . ',</p>
                              <p>Thank you for registering with ansvel. Please use your e-mail address to log in to your account at <a href="<?=base_url();?>"><?=base_url();?>:</a></p>

                              <p><b><a href="' . base_url("welcome/fpassword?email=$email

                                ") . '">Create New Password</a></p>
                              <br>

                              <p>This email can\'t receive replies. If you have any questionsor need help with something regarding our products, please contact our customer support at <a href="#">support@ansvel.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                              <p>We hope you enjoy our products and services.</p>

                              <p>Best Regards,</p>
                              <br>
                              <p>Team ansvel</p>
                              <br>
                              <p class="footer" style="background-color: #27638e;color:#fff;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="' . base_url("assets/sociallinks/cod.png") . '" style="float: right;"></p>
                              <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                              <p align="center"><img width="4%" src="' . base_url("assets/sociallinks/facebook_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/twitter_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/google_square-24.png") . '"> <img src="' . base_url("assets/sociallinks/tumblr.png") . '" width="4%"> <img width="4%" src="' . base_url("assets/sociallinks/instagram_square_color-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/youtube_square_color-24.png") . '"></p>

                              </div>
                              <p class="small" style="text-align: center;">Copyright&copy 2017 ansvel.com Powered by Absolute Innovations</p>
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

            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');
            $this->email->to($email);
            $this->email->subject('Ansvel Forgot Password');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear();
            $this->session->set_userdata('user_id', $email);
            echo "true";

        } else {
            echo "This Email Id Incorrect.";
        }
    }
    public function fpassword()
    {
        $data = array();
        $this->template['middle'] = $this->load->view($this->middle = 'forgot_password', $data, true);
        $this->layout();
    }

    public function changenew_pass()
    {
        $chk = $this->db->get_where("users", array("email" => $this->session->userdata("user_id")));
        if ($chk->num_rows() > 0) {
            $data = array("password" => md5($_POST['np']));
            $this->db->where("email", $this->session->userdata("user_id"));
            if ($this->db->update("users", $data) == true) {
                $this->session->unset_userdata('user_id');
                echo "true";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }

    public function forget_password2()
    {
        $this->load->library('session');
        $chk2 = $this->db->get_where("admin", array("email" => $_POST['femail']));
        $chk3 = $chk2->num_rows();
        if ($chk3 > 0) {
            $ainfo = $chk2->row();
            $message = '<!DOCTYPE html>
                  <html>
                  <head>
                      <title></title>
                  </head>
                  <body>
                  <div id="outer" style="border:1px solid #ddd; width: 80%;margin:auto;padding:1%;">
                      <div id="inouter" style="border-bottom:2px dashed #444;">
                      <br>
                      <img src="<?=base_url();?>assets/images/logo2.jpg">
                      <br>
                      <h2>Welcome to ansvel</h2>
                      <br>

                      <p>Dear  ' . $ainfo->username . ',</p>
                      <p>Thank you for registering with ansvel. Please use your e-mail address to log in to your account at <a href="<?=base_url();?>"><?=base_url();?>:</a></p>

                      <p><b><a href="' . base_url("Welcome/newpassword2") . '">Create New Password</a></p>
                      <br>

                      <p>This email can\'t receive replies. If you have any questionsor need help with something regarding our products, please contact our customer support at <a href="#">support@ansvel.com</a> or call us at +91 9644409191 or 0731-4213190 (Working hour: 10:30am to 7pm, Monday - Saturday).</p>

                      <p>We hope you enjoy our products and services.</p>

                      <p>Best Regards,</p>
                      <br>
                      <p>Team ansvel</p>
                      <br>
                      <p class="footer" style="background-color: #27638e;color:#fff;padding: 2%;font-size: 13px;">Need Help? Call us on +919644409191 / 0731-4213190 <img src="' . base_url("assets/sociallinks/cod.png") . '" style="float: right;"></p>
                      <p class="center small" style="color:#555;font-size: 12px;text-align: center;">CONNECT WITH US <br></p>
                      <p align="center"><img width="4%" src="' . base_url("assets/sociallinks/facebook_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/twitter_square-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/google_square-24.png") . '"> <img src="' . base_url("assets/sociallinks/tumblr.png") . '" width="4%"> <img width="4%" src="' . base_url("assets/sociallinks/instagram_square_color-24.png") . '"> <img width="4%" src="' . base_url("assets/sociallinks/youtube_square_color-24.png") . '"></p>

                      </div>
                      <p class="small" style="text-align: center;">Copyright&copy 2017 ansvel.com Powered by Absolute Innovations</p>
                  </div>
                  </body>
                  </html>';
            $this->load->library('email');
            /*$this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.ansvel.com',
            'smtp_user' => 'info@ansvel.com',
            'smtp_pass' => 'admin@111',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'crlf' => "\r\n",
            'newline' => "\r\n"
            ));*/

            $to_email = $_POST['femail'];

            //$mail_count= count($to_mail);
            /* $this->email->from('info@ansvel.com', 'Ansvel');*/

            $this->email->initialize(array(
                'protocol' => 'smtp',
                //'smtp_host' => 'mail.ansvel.com',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'absoluteinnovationspl2@gmail.com',
                'smtp_pass' => 'Abs@2017',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => true,
                'crlf' => "\r\n",
                'newline' => "\r\n",
            ));
            $this->email->from('absoluteinnovationspl2@gmail.com', 'Ansvel');

            $this->email->to($to_email);
            $this->email->subject('Ansvel Forgot Password');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear();
            $this->session->set_userdata('a_id', $to_email);

            echo "true";
        } else {
            echo "This Email Id Incorrect.";
        }
    }

    public function newpassword2()
    {
        $this->load->view("admin/new_password");
    }

    public function changenew_pass2()
    {
        $chk = $this->db->get_where("admin", array("email" => $this->session->userdata("a_id")));
        if ($chk->num_rows() > 0) {
            $data = array("password" => md5($_POST['np']));
            $this->db->where("email", $this->session->userdata("a_id"));
            if ($this->db->update("admin", $data) == true) {
                $this->session->unset_userdata('a_id');
                echo "true";
            } else {
                echo "Password Couldnot be Changed.";
            }
        } else {
            echo "Incorrect Password.";
        }
    }

}?>
