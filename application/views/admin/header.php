<?php       ini_set('display_errors', 0);             ?>
<!DOCTYPE html>
<html><!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>TailorCommerce | Admin</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, " />
    <meta name="description" content="Responsive Admin Template for e-commerce dashboard">
    <meta name="author" content="Venmond">



<script src="https://use.fontawesome.com/23f4a817c2.js"></script>

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>adminassets/img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>adminassets/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>adminassets/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>adminassets/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo3.png">

    <link href="<?php echo base_url();?>adminassets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="<?php echo base_url();?>adminassets/css/font-entypo.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="<?php echo base_url();?>adminassets/css/fonts.css"  rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>adminassets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">


    <link href="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">

  <!-- Specific CSS -->
  <link href="<?php echo base_url();?>adminassets/plugins/introjs/css/introjs.min.css" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="<?php echo base_url();?>adminassets/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?php echo base_url();?>adminassets/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->

          <link href="<?php echo base_url();?>adminassets/css/theme-responsive.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>adminassets/custom/custom.css" rel="stylesheet" type="text/css">


    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/mobile-detect-modernizr.js"></script>

</head>

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width">
          <div class="vd_panel-header">
            <div class="logo">
              <a href="<?php echo base_url();?>product"><h2><img alt="logo" src="<?php echo base_url();?>assets/images/Mobiledarzilogo.png"></h2></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
                                  <span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium">
                      <i class="fa fa-bars"></i>
                    </span>

                  <span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
                      <i class="fa fa-ellipsis-v"></i>
                    </span>

            </div>
            <div class="vd_panel-menu left-pos visible-sm visible-xs">

                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>


            </div>
            <div class="vd_panel-menu visible-sm visible-xs">
                  <span class="menu visible-xs" data-action="submenu">
                      <i class="fa fa-bars"></i>
                    </span>



            </div>
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->

          </div>
          <div class="vd_container">
            <div class="row">
              <div class="col-sm-3 col-xs-12">


                </div>
                <div class="col-sm-9 col-xs-12">
                  <div class="vd_mega-menu-wrapper">
                      <div class="vd_mega-menu pull-right">
                    <ul class="mega-ul">

    <li id="top-menu-2" class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Users Registrations" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-address-book-o"></i></span>
    <span class="badge vd_bg-red">
        <?php
    $newu=$this->db->get_where("users",array("admin_status"=>'no'));
        echo $newu->num_rows();?>
        </span>
      </a>
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
               New User Registrations
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul class="list-wrapper pd-lr-10">
                 <?php
                  $this->db->limit(2);
                  $nusers=$newu->result();
          foreach($nusers as $nuser){?>
                    <li>

                            <div class="menu-text"><a href="<?php echo base_url();?>product/admin_status/<?php echo $nuser->uid;?>"> New User UMD-<?php echo $nuser->uid;?> registered.
                              <div class="menu-info">
                                    <span class="menu-date pull-right">
             on
                  <?php echo date("D d M",strtotime($nuser->reg_date));?></span>
                              </a></div>
                            </div>
                    </li>
              <?php }?>

               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/users">See All Users <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <li id="top-menu-2" class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Tailor Registrations" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-address-card"></i></span>
    <span class="badge vd_bg-red">
        <?php
        $this->db->order_by("id","desc");
    $newu1=$this->db->get_where("tailors",array("admin_status"=>'no'));
        echo $newu1->num_rows();?>
        </span>
      </a>
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
               New Tailor Registrations
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul class="list-wrapper pd-lr-10">
                  <?php   $this->db->limit(2);
                  $nusers1=$newu1->result();
          foreach($nusers1 as $nuser1){?>
                    <li>
                        <div class="menu-icon"><img alt="example image" src="<?php echo base_url();?>assets/images/default-user-image.png"></div>
                            <div class="menu-text"><a href="<?php echo base_url();?>product/admin_tstatus/<?php echo $nuser1->id;?>"> New Tailor TMD-<?php echo $nuser1->id;?> registered.
                              <div class="menu-info">
                                    <span class="menu-date pull-right">
                   on
                  <?php echo date("D d M",strtotime($nuser1->tdate));?></span>
                              </a></div>
                            </div>
                    </li>
              <?php }?>

               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/tailors">See All Tailors <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <li id="top-menu-2" class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Vendor Registrations" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-address-card-o"></i></span>
    <span class="badge vd_bg-red">
        <?php
    $newu2=$this->db->get_where("vendor",array("admin_status"=>'no',"question5!="=>''));
        echo $newu2->num_rows();?>
        </span>
      </a>
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
               New Vendor Registrations
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list ">
               <div  data-rel="scroll">
               <ul class="list-wrapper pd-lr-10">
                  <?php
                    $this->db->limit(2);
       			  $query = $this->db->order_by('vid', 'DESC')->get_where('vendor',array("admin_status"=>'no',"question5!="=>''));
				  $nusers2=$query->result();

          foreach($nusers2 as $nuser2){?>
                    <li>
                        <div class="menu-text"><a href="<?php echo base_url();?>product/admin_vstatus/<?php echo $nuser2->vid;?>"> New Vendor VMD-<?php echo $nuser2->vid;?> registered.
                              <div class="menu-info">
                                    <span class="menu-date pull-right">
                 on
                  <?php echo date("D d M",strtotime($nuser2->reg_date));?></span>
                              </a></div>
                            </div>
                    </li>
              <?php }?>

               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/vendors">See All Vendors <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="New Order" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-shopping-cart"></i></span>
    <span class="badge vd_bg-red">
        <?php $this->db->select("oid,userid,odate,name,mobile");
              $this->db->from('orders');
            $this->db->join('users', 'orders.userid = users.uid');
            $this->db->where(array("read_status"=>"","ostatus!="=>"Completed","pay_status"=>'success'));
            $this->db->order_by("oid","desc");
            echo $this->db->get()->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              New Order Notifications
               <div class="vd_panel-menu">

<!--                     <span class="text-menu" data-original-title="Settings" data-toggle="tooltip" data-placement="bottom">
                        Settings
                    </span> -->
                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
                   $this->db->limit(2);$this->db->select("oid,userid,odate,name,mobile");
              $this->db->from('orders');
            $this->db->join('users', 'orders.userid = users.uid');
            $this->db->where(array("read_status"=>"","ostatus!="=>"Completed","pay_status"=>'success'));
            $this->db->order_by("oid","desc");
            $nor=$this->db->get()->result();
            foreach($nor as $nor){?>
                    <li> <a href="#">

                            <div class="menu-text"><a href="<?php echo base_url();?>product/order_details/<?php echo $nor->oid; ?>">  UMD-<?php echo $nor->userid;?> has placed a new order.</a>
                              <div class="menu-info "><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor->odate));?></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/pending_orders">See All Orders <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <!--cancelorder-->
    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Cancel Order" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-shopping-cart"></i></span>
    <span class="badge vd_bg-red">
        <?php $this->db->select("oid,userid,odate,name,mobile");
              $this->db->from('orders');
            $this->db->join('users', 'orders.userid = users.uid');
            $this->db->where("ostatus","cancelled by user");
            $this->db->where("cancel_read_status","noread");
            $this->db->order_by("cancel_status_date","desc");
            $nor_o=$this->db->get();
            echo $nor_o->num_rows();
            ?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Cancel Order Notifications
               <div class="vd_panel-menu">

<!--                     <span class="text-menu" data-original-title="Settings" data-toggle="tooltip" data-placement="bottom">
                        Settings
                    </span> -->
                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
                   $this->db->limit(2);$this->db->select("oid,userid,odate,name,mobile");
              $this->db->from('orders');
            $this->db->join('users', 'orders.userid = users.uid');
            $this->db->where("ostatus","cancelled by user");
            $this->db->where("cancel_read_status","noread");
            $this->db->order_by("oid","desc");
            $nor=$this->db->get()->result();
            foreach($nor as $nor){?>
                    <li> <a href="#">

                            <div class="menu-text"><a href="<?php echo base_url();?>product/order_details/<?php echo $nor->oid; ?>">  UMD-<?php echo $nor->userid;?> has canceled OMD-<?php echo $nor->oid; ?>.</a>
                              <div class="menu-info "><span class="menu-date pull-right"><?php echo $nor->cancel_status_date;?></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/pending_orders?cancel=cancel">See All Cancel Orders <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <!--cancelorder-->
    <!---bridalapp--->
    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Appointment Notifications" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-gift" aria-hidden="true"></i>
</span>
    <span class="badge vd_bg-red">
        <?php echo $this->db->get_where("user_appoinment",array("admin_status"=>"no"))->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Appointment Notifications
               <div class="vd_panel-menu">

<!--                     <span class="text-menu" data-original-title="Settings" data-toggle="tooltip" data-placement="bottom">
                        Settings
                    </span> -->
                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
            $this->db->order_by("id","desc");
            $this->db->limit(2);
            $nor2=$this->db->get_where("user_appoinment",array("admin_status"=>"no"))->result();
            //print_r($nor2);
            foreach($nor2 as $nor3){ ?>
                    <li> <a href="#">

                            <div class="menu-text"><a href="<?php echo base_url();?>product/bridal_appoinment_detail/<?php echo $nor3->id; ?>">  <?php echo $nor3->name;?> has made an bridal appointment.</a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor3->date));?></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/bridal_appoiment_info">See All Bridal Appoinment<i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <!---bridalapp--->
    <!---bridalapp--->
    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Notify Me" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-bell"></i></span>
    <span class="badge vd_bg-red">
        <?php echo $this->db->get_where("notifyme",array("admin_status"=>"no"))->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Nofify Me Notifications
               <div class="vd_panel-menu">

<!--                     <span class="text-menu" data-original-title="Settings" data-toggle="tooltip" data-placement="bottom">
                        Settings
                    </span> -->
                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
            $this->db->order_by("id","desc");
            $this->db->limit(2);
            $nor2=$this->db->get_where("notifyme",array("admin_status"=>"0"))->result();
            foreach($nor2 as $nor3){ ?>
                    <li> <a href="#">

                            <div class="menu-text"><a href="<?php echo base_url();?>product/notifyme">  <?php echo $nor3->email;?> for <?php if($nor3->product_type=='accessories'){echo "PAMD-".$nor3->p_id; }
                            else if($nor3->product_type=='fabrics'){echo "PFMD-".$nor3->p_id; }
                            else if($nor3->product_type=='uniform'){echo "PUMD-".$nor3->p_id; }
                            else if($nor3->product_type=='online_boutique'){echo "POMD-".$nor3->p_id; }?></a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor3->date));?></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/notifyme">See All Notifyme Requests <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>

    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Shipping Notifications" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-truck"></i></span>
    <span class="badge vd_bg-red">
        <?php echo $this->db->get_where("order_items",array("notify_status"=>'no'))->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Shipping Notifications
               <div class="vd_panel-menu">

           </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
            $this->db->where("notify_status",'no');
            $this->db->order_by("id","desc");
            $this->db->limit(2);
            $nor9=$this->db->get('order_items')->result();
          //  echo $this->db->last_query();
            foreach($nor9 as $nor9){ ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"></div>
                            <div class="menu-text"><a href="<?php echo base_url();?>product/order_shipping_status/<?php echo $nor9->oid; ?>">  <?php echo 'OMD-'.$nor9->oid;?>  <?php /* echo $nor9->pname;*/?> is <?php echo $nor9->shipping_status;?>.</a>
                                <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor9->status_datetime));?></span></div>
                            </div>
                    </a> </li>    <?php } ?>

               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/shipping_notifications">See All <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>

    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Stitching Notification" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-scissors"></i></span>
    <span class="badge vd_bg-red">

        <?php $this->db->select("*");
              $this->db->from('tailor_assign');
            $this->db->order_by("adate","desc");
            $this->db->join('tailors', 'tailor_assign.tid = tailors.id');
            $this->db->join('order_items', 'order_items.id = tailor_assign.stid');
            $this->db->where("tailor_assign.admin_status",'no');
            echo $this->db->get()->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Stitching Order Notifications
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php $this->db->select("*");
              $this->db->from('tailor_assign');
            $this->db->order_by("adate","desc");
            $this->db->join('tailors', 'tailor_assign.tid = tailors.id');
            $this->db->join('order_items', 'order_items.id = tailor_assign.stid');
            $this->db->where("tailor_assign.admin_status",'no');
            $this->db->limit(2);
            $nor5=$this->db->get()->result();
           // print_r($nor5);
            foreach($nor5 as $nor5){
              if(!empty($nor5->sstatus)){ ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"></div>
                            <div class="menu-text"><a href="<?php echo base_url();?>product/stit_status/<?php echo $nor5->oid; ?>">  <?php echo $nor5->pname;?> (OMD-<?php echo $nor5->oid; ?>) is <?php echo $nor5->sstatus;?> by TMD-<?php echo $nor5->tid;?>.</a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor5->adate));?></span></div>
                            </div>
                    </a> </li>    <?php }} ?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/all_stitching_notification">See All Stitching Orders <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>

    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Out of Stock" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-database"></i></span>
    <span class="badge vd_bg-red">
        <?php
        //$vid = $this->session->userdata('vid');
        /*public function count_stock($id,$name){

          return $count;
        }*/

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
      /*$count = $this->db->get_where('order_items',array('status!='=>'cancel','pid'=>$value->id,'pname'=>preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->title))))->num_rows();*/
      $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$value->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->title)).'"')->row()->qty;
     // echo $this->db->last_query();
      $num_fab = (($value->quantity))-$count;
      if($num_fab<=$value->Minimum_Quantity)
      {//echo $num_fab." ".$value->Minimum_Quantity."<br>";
          $data2['fab2'][] = $value->id;
      }
    }
    $data['acc']=$all_a->result();
    foreach ($data['acc'] as $value) {
      /*$count = $this->db->get_where('order_items',array('status!='=>'cancel','pid'=>$value->acc_id,'pname'=>preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->brand))))->num_rows();*/

$count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$value->acc_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->brand)).'"')->row()->qty;
      $num_acc = (($value->quantity))-$count;
      if($num_acc<=$value->Minimum_Quantity){
        $data2['acc2'][] = $value->acc_id;
      }
    }
    $data['uni']=$all_u->result();
    foreach ($data['uni'] as $value) {
      /*$count = $this->db->get_where('order_items',array('status!='=>'cancel','pid'=>$value->uniform_id,'pname'=>preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->school_name))))->num_rows();*/

$count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$value->uniform_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->school_name)).'"')->row()->qty;
      $num_uni = (($value->quantity))-$count;
      if($num_uni<=$value->Minimum_Quantity)
      {
        $data2['uni2'][] = $value->uniform_id;
      }
    }
    $data['onb']=$all_o->result();

    foreach ($data['onb'] as $value) {


$count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$value->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($value->brand)).'"')->row()->qty;
      $num_onb = (($value->quantity))-$count;
      if($num_onb<=$value->Minimum_Quantity)
      {
        $data2['onb2'][] = $value->id;
      }
    }
    error_reporting(0);
          ini_set('display_errors', 0);
    echo $data['totalpro']=count($data2['fab2'])+count($data2['acc2'])+count($data2['uni2'])+count($data2['onb2']);
        ?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
             Out of Stock Products
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php
                   $i=0;
                   
            foreach($data2['fab2'] as $nor){
              $fab2 =$this->db->get_where("fabric",array('id'=>$nor))->row();
?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_fabric/<?php echo $fab2->id; ?>"><!--img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab2->thumb;?>"--></div>
                            <div class="menu-text"> PFMD-<?php echo $fab2->id;?> is out of stock.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php
                  $i++;
                if($i>=2)
              {
                break;
              } } ?>

                    <?php
                     
            foreach($data2['uni2'] as $nor1){
               if($i>=2)
                  {
                    break;
                  }  
              $unif=$this->db->get_where("uniform",array('uniform_id'=>$nor1))->row();
 ?>

                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_uniform/<?php echo $unif->uniform_id; ?>"><!--img src="<?php echo base_url();?>assets/images/uniform/<?php echo $unif->uniform_image;?>"--></div>
                            <div class="menu-text"> PUMD-<?php echo $unif->uniform_id;?> is out of stock.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php  $i++;
                   }?>

                    <?php
                  
            foreach($data2['acc2'] as $nor2){
               if($i>=2)
                  {
                    break;
                  }

              $accs=$this->db->get_where("accessories",array('acc_id'=>$nor2))->row();
?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_accessories/<?php echo $accs->acc_id; ?>"><!--img src="<?php echo base_url();?>assets/images/accessories/<?php echo $accs->thumb;?>"--></div>
                            <div class="menu-text"> PAMD-<?php echo $accs->acc_id;?> is out of stock.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php   $i++;
                    }?>

                    <?php
                   
            foreach($data2['onb2'] as $nor3){
              if($i>=2)
                  {
                    break;
                  } 
              $onbo=$this->db->get_where("online_boutique",array('id'=>$nor3))->row();
?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_online/<?php echo $onbo->id; ?>"><!--img src="<?php echo base_url();?>assets/images/online_boutique/<?php echo $onbo->thumb;?>"--></div>
                            <div class="menu-text"> POMD-<?php echo $onbo->id;?> is out of stock.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php   $i++;
                    }?>


                    </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/out_of_stock">See All Out of Stock Items <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>

    <!--li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Out Of Stock" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-database"></i></span>
    <span class="badge vd_bg-red">
        <?php $fabric = $this->db->get_where("fabric",array("quantity"=>0))->num_rows();
        $uniform = $this->db->get_where("uniform",array("quantity"=>0))->num_rows();
        $accessories = $this->db->get_where("accessories",array("quantity"=>0))->num_rows();
        $online_boutique = $this->db->get_where("online_boutique",array("quantity"=>0))->num_rows();
        echo $fabric+$uniform+$accessories+$online_boutique;
        ?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Out Of Stock Products
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php $this->db->select("*");
              $this->db->from('fabric');
            $this->db->where("quantity",0);
            $this->db->limit(1);
            $nor=$this->db->get()->result();
            foreach($nor as $nor){?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_fabric/<?php echo $nor->id; ?>"></div>
                            <div class="menu-text"> PFMD-<?php echo $nor->id;?> has 0 quantity.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php }?>

                    <?php $this->db->select("*");
              $this->db->from('uniform');
            $this->db->where("quantity",0);
            $this->db->limit(1);
            $nor1=$this->db->get()->result();
            foreach($nor1 as $nor1){?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_uniform/<?php echo $nor1->uniform_id; ?>"></div>
                            <div class="menu-text"> PUMD-<?php echo $nor1->uniform_id;?> has 0 quantity.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php }?>

                    <?php $this->db->select("*");
              $this->db->from('accessories');
            $this->db->where("quantity",0);
            $this->db->limit(1);
            $nor2=$this->db->get()->result();
            foreach($nor2 as $nor2){?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_accessories/<?php echo $nor2->acc_id; ?>"></div>
                            <div class="menu-text"> PAMD-<?php echo $nor2->acc_id;?> has 0 quantity.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php }?>

                    <?php $this->db->select("*");
              $this->db->from('online_boutique');
            $this->db->where("quantity",0);
            $this->db->limit(1);
            $nor3=$this->db->get()->result();
            foreach($nor3 as $nor3){?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/add_online/<?php echo $nor3->id; ?>"></div>
                            <div class="menu-text"> POMD-<?php echo $nor3->id;?> has 0 quantity.</a>
                              <div class="menu-info"><span class="menu-date"></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
           </div>
        </div> <!-- child-menu -->
      <!--/div>   <!-- vd_mega-menu-content -->
    <!--/li-->

<!--outofstock-->

<!--outofstock-->

    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Vendor Product" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-recycle"></i></span>
    <span class="badge vd_bg-red">
        <?php $fabric = $this->db->get_where("fabric",array("status"=>'disapprove','admin_status'=>'no'))->num_rows();
        $uniform = $this->db->get_where("uniform",array("status"=>'disapprove','admin_status'=>'no'))->num_rows();
        $accessories = $this->db->get_where("accessories",array("status"=>'disapprove','admin_status'=>'no'))->num_rows();
        $online_boutique = $this->db->get_where("online_boutique",array("status"=>'disapprove','admin_status'=>'no'))->num_rows();
        $more_services = $this->db->get_where("more_services",array("status"=>'disapprove','admin_status'=>'no'))->num_rows();
        echo $fabric+$uniform+$accessories+$online_boutique+$more_services;
        ?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
            Products Added By Vendor
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php $this->db->select("*");
              $this->db->from('fabric');

            $this->db->where(array("status"=>'disapprove','admin_status'=>'no'));
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $nor=$this->db->get()->result();
            $i=0;
            foreach($nor as $nor){
             ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/fabrics_status/<?php echo $nor->id; ?>"></div>
                            <div class="menu-text"> VMD-<?php echo $nor->vendor_id;?> has added PFMD-<?php echo $nor->id; ?>.</a>
                                <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor->padddate));?></span></div>
                            </div>
                    </a> </li>    <?php $i++; if($i>=2)
                  {
                    break;
                  }  } ?>

                    <?php $this->db->select("*");
              $this->db->from('uniform');
            $this->db->where(array("status"=>'disapprove','admin_status'=>'no'));
            $this->db->order_by('uniform_id','desc');
            $this->db->limit(1);
            $nor1=$this->db->get()->result();
            foreach($nor1 as $nor1){ if($i>=2)
                  {
                    break;
                  } ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/uniform_status/<?php echo $nor1->uniform_id; ?>"></div>
                            <div class="menu-text"> VMD-<?php echo $nor1->vendor_id;?> has added a PUMD-<?php echo $nor1->uniform_id; ?></a>
                            <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor1->padddate));?></span></div>
                            </div>
                    </a> </li>    <?php $i++; } ?>

                    <?php $this->db->select("*");
              $this->db->from('accessories');
            $this->db->where(array("status"=>'disapprove','admin_status'=>'no'));
            $this->db->order_by('acc_id','desc');
            $this->db->limit(1);
            $nor2=$this->db->get()->result();
            foreach($nor2 as $nor2){ if($i>=2)
                  {
                    break;
                  } 
               ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/accessories_status/<?php echo $nor2->acc_id; ?>"></div>
                            <div class="menu-text"> VMD-<?php echo $nor2->vendor_id;?> has added a PAMD-<?php echo $nor2->acc_id; ?>.</a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor2->padddate));?></span></div>
                            </div>
                    </a> </li>    <?php $i++; } ?>

                    <?php $this->db->select("*");
              $this->db->from('online_boutique');
            $this->db->where(array("status"=>'disapprove','admin_status'=>'no'));
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $nor3=$this->db->get()->result();
            foreach($nor3 as $nor3){ if($i>=2)
                  {
                    break;
                  } 
              ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/online_status/<?php echo $nor3->id; ?>"></div>
                            <div class="menu-text"> VMD-<?php echo $nor3->vendor_id;?> has added a POMD-<?php echo $nor3->id; ?>.</a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor3->padddate));?></span></div>
                            </div>
                    </a> </li>    <?php $i++; } ?>
                     <?php $this->db->select("*");
              $this->db->from('more_services');
            $this->db->where(array("status"=>'disapprove','admin_status'=>'no'));
            $this->db->limit(1);
            $nor4=$this->db->get()->result();
            foreach($nor4 as $nor4){if($i>=2)
                  {
                    break;
                  } 
?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/more_services_status_change/<?php echo $nor4->id; ?>"></div>
                            <div class="menu-text">VMD-<?php echo $nor4->vendor_id;?> has added a PMMD-<?php echo $nor4->id; ?>.</a>
                                <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor4->padddate));?></span></div>
                            </div>
                    </a> </li>    <?php  $i++; } ?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/all_product_vendor_items">See All Items <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div>
      </div>
    </li>

    <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Cancel Notification" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-times"></i></span>
    <span class="badge vd_bg-red">
        <?php $cancel_num = $this->db->get_where("orders",array("ostatus"=>'cancelled by user',"admin_status"=>'no'));
        echo $this->db->get_where("cancel_requests",array("admin_status"=>'no'))->num_rows()+$cancel_num->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Cancel Item Requests
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php  $this->db->limit(2);
                   $nor5 = $this->db->get_where("cancel_requests",array("admin_status"=>'no'))->result();

           $cancel_order_data = $cancel_num->result();
           foreach($cancel_order_data as $cancel_order_data){?>
             <li> <a href="#">
                 <div class="menu-icon vd_blue"></div>
                     <div class="menu-text"><a href="<?php echo base_url();?>product/order_details/<?php echo $cancel_order_data->oid; ?>">

                       UMD-<?php echo $cancel_order_data->userid; ?> has  Cancel OMD-<?php echo $cancel_order_data->oid; ?></a>
                         <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor5->date));?></span></div>
                     </div>
             </a> </li>
             <? }
                       foreach($nor5 as $nor5){?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"></div>
                            <div class="menu-text"><a href="<?php echo base_url();?>product/cancel_request_status/<?php echo $nor5->id; ?>">
                             <?php $order_item = $this->db->get_where('order_items',array('id'=>$nor5->item_id))->row();
                               $type = explode('/',$order_item->pimg);
                               //print_r($type); ?>
                              UMD-<?php echo $nor5->user_id; ?> Requested for Cancel in OMD-<?php echo $order_item->oid; ?> for <?php if($type[0]=='accessories'){echo "PAMD-".$order_item->pid; }
                              else if($type[0]=='fabrics'){echo "PFMD-".$order_item->pid; }
                              else if($type[0]=='uniform'){echo "PUMD-".$order_item->pid; }
                              else if($type[0]=='online_boutique'){echo "POMD-".$order_item->pid; } ?></a>
                               <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor5->date));?></span></div>
                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/cancel_order_items">See All Cancel Items <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
        <li id="top-menu-3"  class="one-icon mega-li">
      <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Return Notification" data-toggle="tooltip" data-placement="bottom">
      <span class="mega-icon"><i class="fa fa-exchange"></i></span>
    <span class="badge vd_bg-red">
        <?php echo $this->db->get_where("return_requests",array("admin_status"=>'no'))->num_rows();?></span>
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">
           <div class="title">
              Return Item Requests
               <div class="vd_panel-menu">

                </div>
           </div>
       <div class="content-list">
               <div  data-rel="scroll">
               <ul  class="list-wrapper pd-lr-10">
                   <?php $nor5 = $this->db->get_where("return_requests",array("admin_status"=>'no'))->result();
           // print_r($nor5);
          // $vendor_arr=array();
            foreach($nor5 as $nor5){
              //$vendor_arr[] = $nor5->vendor_id; ?>
                    <li> <a href="#">
                        <div class="menu-icon vd_blue"></div>
                            <div class="menu-text"><a href="<?php echo base_url();?>product/return_request_status/<?php echo $nor5->id; ?>">
                             <?php $order_item = $this->db->get_where('order_items',array('id'=>$nor5->item_id))->row();
                               $type = explode('/',$order_item->pimg);
                               //print_r($type); ?>
                              UMD-<?php echo $nor5->user_id; ?> Requested for Return in OMD-<?php echo $order_item->oid; ?> for <?php if($type[0]=='accessories'){echo "PAMD-".$order_item->pid; }
                              else if($type[0]=='fabrics'){echo "PFMD-".$order_item->pid; }
                              else if($type[0]=='uniform'){echo "PUMD-".$order_item->pid; }
                              else if($type[0]=='online_boutique'){echo "POMD-".$order_item->pid; } ?>.</a>
                              <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor5->date));?></span></div>

                            </div>
                    </a> </li>    <?php }?>


               </ul>
               </div>
               <div class="closing text-center" style="">
                  <a href="<?php echo base_url();?>product/return_order_items">See All Return Items <i class="fa fa-angle-double-right"></i></a>
               </div>
           </div>
        </div> <!-- child-menu -->
      </div>   <!-- vd_mega-menu-content -->
    </li>
    <!---->
    <li id="top-menu-3"  class="one-icon mega-li">
  <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Donate Notification" data-toggle="tooltip" data-placement="bottom">
  <span class="mega-icon"><i class="fa fa-money"></i></span>
<span class="badge vd_bg-red">
    <?php echo $this->db->get_where("dontate_users",array("admin_status"=>'no'))->num_rows();?></span>
  </a>
  <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
    <div class="child-menu">
       <div class="title">
          Donate
           <div class="vd_panel-menu">

            </div>
       </div>
   <div class="content-list">
           <div  data-rel="scroll">
           <ul  class="list-wrapper pd-lr-10">
               <?php $nor5 = $this->db->get_where("dontate_users",array("admin_status"=>'no'))->result();
       // print_r($nor5);
      // $vendor_arr=array();
        foreach($nor5 as $nor5){
          //$vendor_arr[] = $nor5->vendor_id; ?>
                <li> <a href="#">
                    <div class="menu-icon vd_blue"></div>
                        <div class="menu-text"><a href="<?php echo base_url();?>product/donate_notification/<?php echo $nor5->id; ?>">
                          UMD-<?php echo $nor5->uid; ?> want to donate.
                        </a>
                          <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor5->datetime));?></span></div>

                        </div>
                </a> </li>    <?php }?>


           </ul>
           </div>
           <div class="closing text-center" style="">
              <a href="<?php echo base_url();?>product/donate_notification">See All Donate Offers <i class="fa fa-angle-double-right"></i></a>
           </div>
       </div>
    </div> <!-- child-menu -->
  </div>   <!-- vd_mega-menu-content -->
</li>
<!---->

    <?php $count_r= 0; $this->db->distinct();

$this->db->select('id,item_id,vendor_id,approvedornot,admin_status');
$query = $this->db->get('return_requests')->result();
foreach($query as $q){
//  print_r($q);
if($q->approvedornot=='approve' && $q->admin_status!='yes'){
 $count_r++;
}else{


$data = $this->db->get_where('return_item_request_reject',array('vendor_id'=>$q->vendor_id,'admin_status'=>'no'))->row();
//echo $this->db->last_query();
if(!empty($data) && $data->vendor_id!=0){
$count_r++;  }}}
 ?>
    <!--li id="top-menu-3"  class="one-icon mega-li">
  <a href="#" class="mega-link" data-action="click-trigger" data-original-title="Return Notification" data-toggle="tooltip" data-placement="bottom">
  <span class="mega-icon"><i class="fa fa-reply-all"></i></span>
<span class="badge vd_bg-red">
    <?php echo $count_r; ?></span>
  </a>
  <!--div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
    <div class="child-menu">
       <div class="title">
          Vendor Reply For Return Requests
           <div class="vd_panel-menu">

            </div>
       </div>
   <div class="content-list">
           <div  data-rel="scroll">
           <ul  class="list-wrapper pd-lr-10">
               <?php

               $nor5 = $this->db->get_where("return_item_request_reject",array("admin_status"=>'no',"vendor_id!="=>'0'))->result();
       // print_r($nor5);
       $this->db->distinct();
$this->db->select('id,item_id,vendor_id,approvedornot,admin_status');
$query = $this->db->get('return_requests')->result();
foreach($query as $q){
//  print_r($q);
  if($q->approvedornot=='approve' && $q->admin_status!='yes'){
    ?>
    <li> <a href="#">
       <div class="menu-icon vd_blue"></div>
       <div class="menu-text"><a href="<?php echo base_url();?>product/return_request_status/<?php echo $q->id; ?>">
        <?php $order_item = $this->db->get_where('order_items',array('id'=>$q->item_id))->row();
          $type = explode('/',$order_item->pimg);
          //print_r($type);
          echo 'VMD-'.$q->vendor_id.' reply as <b>Approved</b> '; ?>
        For Return Request in OMD-<?php echo $order_item->oid; ?> for <?php if($type[0]=='accessories'){echo "PAMD-".$order_item->pid; }
         else if($type[0]=='fabrics'){echo "PFMD-".$order_item->pid; }
         else if($type[0]=='uniform'){echo "PUMD-".$order_item->pid; }
         else if($type[0]=='online_boutique'){echo "POMD-".$order_item->pid; } ?>.</a>
         <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($q->date));?></span></div>

       </div>
    </a> </li>
    <?php
  }else{


$data = $this->db->get_where('return_item_request_reject',array('vendor_id'=>$q->vendor_id,'admin_status'=>'no'))->row();
//echo $this->db->last_query();
if(!empty($data) && $data->vendor_id!=0){
    ?>
<li> <a href="#">
   <div class="menu-icon vd_blue"></div>
   <div class="menu-text"><a href="<?php echo base_url();?>product/return_request_status/<?php echo $data->cancel_id; ?>">
    <?php $order_item = $this->db->get_where('order_items',array('id'=>$q->item_id))->row();
      $type = explode('/',$order_item->pimg);
      //print_r($type);
      echo 'VMD-'.$data->vendor_id.' reply "'.$data->reason.'" '; ?>
    For Return Request in OMD-<?php echo $order_item->oid; ?> for <?php if($type[0]=='accessories'){echo "PAMD-".$order_item->pid; }
     else if($type[0]=='fabrics'){echo "PFMD-".$order_item->pid; }
     else if($type[0]=='uniform'){echo "PUMD-".$order_item->pid; }
     else if($type[0]=='online_boutique'){echo "POMD-".$order_item->pid; } ?>.</a>

   </div>
</a> </li>
<?php }}
}
//print_r($query);
        foreach($nor5 as $nor5){?>
                <li> <a href="#">
                    <div class="menu-icon vd_blue"></div>
                        <div class="menu-text"><a href="<?php echo base_url();?>product/return_request_status/<?php echo $nor5->cancel_id; ?>">
                         <?php
                         print_r($vendor_arr);
                        $order_item = $this->db->get_where('return_item_request_reject',array('cancel_id'=>$nor5->id,"admin_status"=>'no'))->row();
                        $type = explode('/',$order_item->pimg);
                           //print_r($type); ?>
                          </a>
                        </div>
                </a> </li>    <?php }?>


           </ul>
           </div>
           <div class="closing text-center" style="">
              <a href="<?php echo base_url();?>product/return_order_items">See All Return Items <i class="fa fa-angle-double-right"></i></a>
           </div>
       </div>
    </div> 
  </div>  
</li-->
    <!---->

    <li id="top-menu-profile" class="profile mega-li">
        <a href="#" class="mega-link"  data-action="click-trigger">
            <span  class="mega-image">
            <?php $ainfo=$this->db->get('admin')->row();?>
                <img src="<?php echo base_url();?>assets/images/<?php echo $ainfo->image;?>" alt="example image" />
            </span>
            <span class="mega-name">
                <?php echo $ainfo->username;?><i class="fa fa-caret-down fa-fw"></i>
            </span>
        </a>
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu">
          <div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                    <!--<li> <a href="#"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-trophy"></i></div> <div class="menu-text">My Achievements</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Messages</div><div class="menu-badge"><div class="badge vd_bg-red">10</div></div> </a>  </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-tasks
"></i></div> <div class="menu-text"> Tasks</div><div class="menu-badge"><div class="badge vd_bg-red">5</div></div> </a> </li>
                    <li class="line"></li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-lock
"></i></div> <div class="menu-text">Privacy</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-cogs"></i></div> <div class="menu-text">Settings</div> </a> </li>-->
       <li> <a href="<?php echo base_url();?>product/profile"> <div class="menu-icon"><i class="  fa fa-user"></i></div> <div class="menu-text">Profile</div> </a> </li>

                    <li> <a href="<?php echo base_url();?>/admin/logout"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                 <!--   <li class="line"></li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-question-circle"></i></div> <div class="menu-text">Help</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" glyphicon glyphicon-bullhorn"></i></div> <div class="menu-text">Report a Problem</div> </a> </li>      -->
                </ul>
            </div>
        </div>
      </div>

    </li>


  </ul>
<!-- Head menu search form ends -->
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container -->
      </div>
      <!-- vd_primary-menu-wrapper -->

  </header>
  <!-- Header Ends -->
<div class="content">
  <div class="container">
    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">

  <div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>
        </div>
      <h3 class="menu-title hide-nav-medium hide-nav-small">Manage Store</h3>
        <div class="vd_menu">
           <ul>
    <!--<li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
            <span class="menu-text">Dashboard</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product">
                        <span class="menu-text">Default Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>-->
     <li class="active1">
      <a href="<?php echo base_url();?>product">
          <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
            <span class="menu-text">Dashboard</span>

        </a>
    </li>
        <li class="active132">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-map-marker"> </i></span>
            <span class="menu-text">Manage Cities</span>
           <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
        <div class="child-menu"  data-action="click-target">
            <ul>

              <li>
                    <a href="<?php echo base_url();?>product/add_city">
                        <span class="menu-text">Add City</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="active32">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="icon-bookmark"> </i></span>
            <span class="menu-text">Manage Our Services</span>
           <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
        <div class="child-menu"  data-action="click-target">
            <ul>

              <!--li>
                    <a href="<?php echo base_url();?>product/services">
                        <span class="menu-text">Add services</span>
                    </a>
                </li-->
                <li>
                    <a href="<?php echo base_url();?>product/all_services">
                        <span class="menu-text">All services</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/o_s_stitch">
                        <span class="menu-text">Manage Services Content</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
     <li class="active2">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-plus"> </i></span>
            <span class="menu-text">Manage Add Ons</span>
           <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
        <div class="child-menu"  data-action="click-target">
            <ul>

              <li>
                    <a href="<?php echo base_url();?>product/Make_addon_page">
                        <span class="menu-text">Make Addon Page</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/Make_addon_heading">
                        <span class="menu-text">Addon heading</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/Make_addons">
                        <span class="menu-text">Make Add Ons</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
        <li class="active3">
      <a href="javascript:void(0);" data-action="click-trigger">
         <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
            <span class="menu-text">Manage Filter</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/add_filter_maincategory">
                        <span class="menu-text">Add Filter Main Category</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_filter_cat">
                        <span class="menu-text">Add Filter Title</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_filter_subcat">
                       <span class="menu-text">Add Filter Attribute</span>
                    </a>
                </li>


            </ul>
        </div>
    </li>


    <li class="active5">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-file-image-o"> </i></span>
            <span class="menu-text">Manage banner</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>

        </a>
          <div class="child-menu"  data-action="click-target">
            <ul>
          <li>
                    <a href="<?php echo base_url();?>product/manage_banner">
                        <span class="menu-text">Add front banner</span>
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/all_banner">
                        <span class="menu-text">All front Banner</span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo base_url();?>product/accessoriesbanner">
                        <span class="menu-text">Add accessories Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/allaccessoriesbanner">
                        <span class="menu-text">All accessories Banner</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/bridal_banner">
                        <span class="menu-text">Add Bridal Banner</span>
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/all_bridal_banner">
                        <span class="menu-text">All Bridal Banner</span>
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/uniform_banner">
                        <span class="menu-text">Add Uniform Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_uniform_image">
                        <span class="menu-text">All Uniform Banner</span>
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/shopbanner">
                        <span class="menu-text">Add Fabric Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/allshopbanner">
                        <span class="menu-text">All  Fabric Banner</span>
                    </a>
                </li>
                            <li>
                    <a href="<?php echo base_url();?>product/onlinebanner">
                        <span class="menu-text">Add Online Boutique Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/allonlinebanner">
                        <span class="menu-text">All Online Boutique Banner</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>product/popupimage">
                        <span class="menu-text">City Popup Image</span>
                    </a>
                </li>
                </ul></div>
    </li>
    <li class="active6">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
            <span class="menu-text">Manage Designs</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/add_front_nack">
                        <span class="menu-text">Kurti</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_blouse">
                        <span class="menu-text">Blouse</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>

  <!--<li>
      <a href="email.html">
          <span class="menu-icon"><i class="fa fa-envelope"></i></span>
            <span class="menu-text">Email</span>
            <span class="menu-badge"><span class="badge vd_bg-red">78</span></span>
        </a>
    </li> -->
    <li class="active7">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
            <span class="menu-text">Manage Category</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/Category">
                        <span class="menu-text">Manage Categories</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>

    <li class="active8">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-scissors"> </i></span>
            <span class="menu-text">Manage Stitching</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/attributes">
                        <span class="menu-text">Manage Attributes</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/styles/3">
                        <span class="menu-text">Manage Styles</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/measurements">
                        <span class="menu-text">Manage Measurements</span>

                    </a>
                    <a href="<?php echo base_url();?>Product/measurements_image">
                        <span class="menu-text">Manage Measurements Image</span>

                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/stitiching_headings">
                        <span class="menu-text">Manage Headings</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>
            </ul>
        </div>
    </li>
     <li class="active9">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-database"> </i></span>
            <span class="menu-text">Manage Products</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/add_fabric">
                        <span class="menu-text">Add New fabric</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>product/fabrics">
                        <span class="menu-text">View All Fabrics</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/add_online">
                        <span class="menu-text">Add New Online Boutique</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/onlines">
                        <span class="menu-text">View All Online Boutique</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>product/add_accessories">
                        <span class="menu-text">Add New Accessories</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_accessories">
                        <span class="menu-text">View All Accessories</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>

                            <li>
                    <a href="<?php echo base_url();?>product/add_uniform">
                        <span class="menu-text">Add New Uniform</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_uniform">
                        <span class="menu-text">View All Uniform</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/more_services">
                        <span class="menu-text">Add More services</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>product/all_more_services">
                        <span class="menu-text">All More services</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/out_of_stock">
                        <span class="menu-text">Out Of Stock</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_disabled">
                        <span class="menu-text">Disabled</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>



    <li class="active22">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-database"> </i></span>
            <span class="menu-text">Vendors Products</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li>
                    <a href="<?php echo base_url();?>product/online_addby_vendor">
                        <span class="menu-text">View All Boutique Add By Vendor</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/accessories_addby_vendor">
                        <span class="menu-text">View All Accessories Add By Vendor</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/fabrics_addby_vendor">
                        <span class="menu-text">View All Fabrics Add By Vendor</span>
                    </a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>product/uniform_addby_vendor">
                        <span class="menu-text">View All Uniform Add By Vendor</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/moreservices_addby_vendor">
                        <span class="menu-text">View All More Services Add By Vendor</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>







    <li class="active11">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="icon-bookmark"> </i></span>
            <span class="menu-text">Manage Altration</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/altration">
                        <span class="menu-text">Add Subcategory</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>product/all_altration">
                        <span class="menu-text">All Altration</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li class="active12">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-cart-plus"> </i></span>
            <span class="menu-text">Manage Orders</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/pending_orders">
                        <span class="menu-text">View All Pending Orders</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>product/stitching_orders">
                        <span class="menu-text">Stitching Orders</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/altration_orders">
                        <span class="menu-text">Altration Orders</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>

                  <li>
                    <a href="<?php echo base_url();?>product/all_moreservices">
                        <span class="menu-text">More Services Enquiry</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/bridal_appoiment_info">
                        <span class="menu-text">Bridal Appoinment</span>
                    </a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>product/notifyme">
                      <span class="menu-text">Nofity Me Requests</span>
                  </a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>product/deleted_orders">
                      <span class="menu-text">Order Archive</span>
                  </a>
              </li>
              <li>
                    <a href="<?php echo base_url();?>product/completed_orders">
                        <span class="menu-text">View All Completed Orders</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>


      <li class="active14">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-user-plus"> </i></span>
            <span class="menu-text">Manage Accounts</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/fabric_accounts">
                        <span class="menu-text">All Products Orders</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/stitching_accounts">
                        <span class="menu-text">Stitching Orders</span>
                    </a>
                </li>

                <li>
                  <a href="<?php echo base_url();?>product/users">

            <span class="menu-text">Manage Users</span>
           <span class="menu-badge"><span class="badge vd_bg-black-30"></span></span>
        </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/users_info">
                        <span class="menu-text">All Users</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/vendors">
                        <span class="menu-text">All Vendors</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/accessoriesvendors">
                        <span class="menu-text">Accessories Vendors</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/fabricvendors">
                        <span class="menu-text">Fabric Vendors</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/moreservicevendors">
                        <span class="menu-text">More Services Vendors</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/boutiquevendors">
                        <span class="menu-text">Online Boutique Vendors</span>
                    </a>
                </li>
                  <li>
                    <a href="<?php echo base_url();?>product/uniformvendors">
                        <span class="menu-text">Uniform Vendors</span>
                    </a>
                </li>


            </ul>
        </div>
    </li>
          <li class="active100">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-user-plus"> </i></span>
            <span class="menu-text">Manage Tailors</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li>
                    <a href="<?php echo base_url();?>product/tailors">
                        <span class="menu-text">Account & Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/subcatgories">
                        <span class="menu-text">Subcatgories</span>
                    </a>
                </li>




            </ul>
        </div>
    </li>

    <li class="active15">

    </li>


  <!--   <li class="active16">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="icon-bookmark"> </i></span>
            <span class="menu-text">Manage Tailoring</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/tailors">
                        <span class="menu-text">All Tailors</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>-->

    <li class="active18">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-inr"> </i></span>
            <span class="menu-text">Manage Finance</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/tailor_orders">
                        <span class="menu-text">Manage Tailor</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>product/vendor_orders">
                        <span class="menu-text">Manage Vendor</span>
            <!--<span class="menu-badge"><span class="badge vd_bg-red">Hot</span></span>        -->
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="active19">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-text-width"> </i></span>
            <span class="menu-text">Manage Testimonial</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li>
                    <a href="<?php echo base_url();?>product/addtestimonial">
                        <span class="menu-text">Add Testimonial</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_testimonial">
                        <span class="menu-text">All Testimonial</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>


    <li class="active20">
      <a href="<?php echo base_url();?>product/manage_heading">
          <span class="menu-icon"><i class="fa fa-bars"></i></span>
            <span class="menu-text">Manage Main Menu</span>
        </a>
    </li>
     <li class="active101">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-text-width"> </i></span>
            <span class="menu-text">Manage Cancel & return</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li class="active">
      <a href="<?php echo base_url();?>product/cancel_reasons">
          <span class="menu-icon"><i class="fa fa-bars"></i></span>
            <span class="menu-text">Manage Cancel Reasons</span>
        </a>
    </li>
    <li class="active">
      <a href="<?php echo base_url();?>product/return_reasons">
          <span class="menu-icon"><i class="fa fa-bars"></i></span>
            <span class="menu-text">Manage Return Reasons</span>
        </a>
    </li>

     <li class="active">
      <a href="<?php echo base_url();?>product/cancel_order_items">
          <span class="menu-icon"><i class="fa fa-bullhorn"></i></span>
            <span class="menu-text">Cancel Requests</span>
        </a>
    </li>
    <li class="active">
      <a href="<?php echo base_url();?>product/return_order_items">
          <span class="menu-icon"><i class="fa fa-bullhorn"></i></span>
            <span class="menu-text">Return Requests</span>
        </a>
    </li>

            </ul>
        </div>
    </li>




    <?php $count = $this->db->get_where('review',array('seen'=>0))->num_rows(); ?>
    <li class="active31">
      <a href="<?php echo base_url();?>product/allreview">
          <span class="menu-icon"><i class="fa fa-bullhorn"></i></span>
            <span class="menu-text">Manage Reviews <?php echo "<span class='badge vd_bg-yellow'>pending $count</span>"; ?></span>
        </a>
    </li>



    <li class="active21">
      <a href="<?php echo base_url();?>product/manage_coupons">
          <span class="menu-icon"><i class="fa fa-percent"></i></span>
            <span class="menu-text">Manage Coupons</span>
            <span class="menu-badge"><span class="badge vd_bg-yellow"> % Off</span></span>
        </a>
    </li>

    <li class="active23">
      <a href="<?php echo base_url();?>product/manage_newsletter">
          <span class="menu-icon"><i class="fa fa-envelope"></i></span>
            <span class="menu-text">Manage News Letter</span>
        </a>
    </li>

    <li class="active26">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-rss"> </i></span>
            <span class="menu-text">Manage Blog</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li>
                    <a href="<?php echo base_url();?>product/add_blog">
                        <span class="menu-text">Add Blog</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_blog">
                        <span class="menu-text">View Blog</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
<li class="active50">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-address-card-o"> </i></span>
            <span class="menu-text">Manage Jobs</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

                <li>
                    <a href="<?php echo base_url();?>product/addjobcat">
                        <span class="menu-text">Add Job Category</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/all_category">
                        <span class="menu-text">All Category</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/addjobs">
                        <span class="menu-text">Add Jobs</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/alljobs">
                        <span class="menu-text">All Jobs</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/alljobsenquiry">
                        <span class="menu-text">All Jobs Enquiry</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
<li class="active40">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-envelope-open-o"> </i></span>
            <span class="menu-text">Manage Enquiries</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                  <li>
                    <a href="<?php echo base_url();?>product/contactenquiry">
                        <span class="menu-text">All Enquiry</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="active27">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-angle-double-down"> </i></span>
            <span class="menu-text">Manage Footer</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
        <li>
                    <a href="<?php echo base_url();?>product/view_footer">
                        <span class="menu-text">View Footer Detail</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/manage_social">
                        <span class="menu-text">Add Social link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_social">
                        <span class="menu-text">View Social link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_mobiledarzi">
                        <span class="menu-text">Add Mobile darzi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_mobiledarzi">
                        <span class="menu-text">View Mobile darzi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_link_menu">
                        <span class="menu-text">Footer Menu's Headings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_service_link">
                        <span class="menu-text">Add Service Link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_service_link">
                        <span class="menu-text">View Service Link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_info_link">
                        <span class="menu-text">Add Information Link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_info_link">
                        <span class="menu-text">View Information Link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/add_customer_support_link">
                        <span class="menu-text">Add Customer Support Link</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_customer_support_link">
                        <span class="menu-text">View Customer Support Link</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="active30">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-truck"> </i></span>
            <span class="menu-text">Manage Delivery End</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>product/fabric_end">
                        <span class="menu-text">All Product</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/shipping_methods">
                        <span class="menu-text">Shipping Methods</span>
                    </a>
                </li>
                <!--li>
                    <a href="<?php echo base_url();?>product/stitching_end">
                        <span class="menu-text">Stitching + Fabric</span>
                    </a>
                </li-->

                <!-- <li>
                    <a href="<?php echo base_url();?>product/stit_fabric_end">
                        <span class="menu-text">Stitching + Fabric</span>
                    </a>
                </li> -->


            </ul>
        </div>
    </li>
    <li class="active29">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-question-circle"> </i></span>
            <span class="menu-text">Manage Faq</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
        <li>
                    <a href="<?php echo base_url();?>product/add_faq">
                        <span class="menu-text">Add Faq Question</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>product/view_faq">
                        <span class="menu-text">View Faq Question</span>
                    </a>
                </li>
                <li>
                            <a href="<?php echo base_url();?>product/vadd_faq">
                                <span class="menu-text">Add Vendor Faq Question</span>
                            </a>
                        </li>
                <li>
                    <a href="<?php echo base_url();?>product/vview_faq">
                        <span class="menu-text">View Vendor Faq Question</span>
                    </a>
                </li>


            </ul>
        </div>
    </li>

<li class="active51">
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-file-text"> </i></span>
            <span class="menu-text">Manage CMS</span>
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>
              <li>
                      <a href="<?php echo base_url();?>product/homepage">
                          <span class="menu-text">Home</span>
                      </a>
                  </li>
            <li>
                    <a href="<?php echo base_url();?>product/careerpage">
                        <span class="menu-text">Careers</span>
                    </a>
                </li>
        		<li>
                    <a href="<?php echo base_url();?>product/aboutus">
                        <span class="menu-text">About Us</span>
                    </a>
                </li>
				<!--li>
                    <a href="<?php echo base_url();?>product/termsandcondition">
                        <span class="menu-text">Terms and Condition</span>
                    </a>
                </li-->
				<li>
                    <a href="<?php echo base_url();?>product/privacypolicy">
                        <span class="menu-text">Privacy Policy</span>
                    </a>
                </li>
				<li>
                    <a href="<?php echo base_url();?>product/donate">
                        <span class="menu-text">Donate</span>
                    </a>
                </li>
                <li><a href="<?php echo base_url();?>product/brands">
                                <span class="menu-text">Brands</span>
                            </a>
                        </li>
                <li><a href="<?php echo base_url();?>product/trackorder">
                                        <span class="menu-text">Track Order</span>
                                    </a>
                                </li>
              <li><a href="<?php echo base_url();?>product/measurementguide">
                                                        <span class="menu-text">Measurement Guide</span>
                                                    </a>
                                                </li>
              <li><a href="<?php echo base_url();?>product/termsandcondition">
                                              <span class="menu-text">Terms And Condition</span>
                                        </a>
                    </li>
                    <li><a href="<?php echo base_url();?>product/howitworks">
                                                    <span class="menu-text">How It Works</span>
                                              </a>
                          </li>
                          <!--li><a href="<?php echo base_url();?>product/aboutus">
                                                          <span class="menu-text">About Us</span>
                                                    </a>
                                </li-->
                                <li><a href="<?php echo base_url();?>product/vendorhome">
                                                                <span class="menu-text">Vendor Home</span>
                                                          </a>
                                      </li>
                                      <li><a href="<?php echo base_url();?>product/measurementinfo">
                                                                      <span class="menu-text">Measurement Info</span>
                                                                </a>
                                            </li>
                                            <li><a href="<?php echo base_url();?>product/tellyourfriend">
                                                                            <span class="menu-text">Tell Your Friend</span>
                                                                      </a>
                                                  </li>
                <li><a href="<?php echo base_url();?>product/contact">
                                        <span class="menu-text">Contact Us</span>
                                    </a>
                                </li>
                                <li><a href="<?php echo base_url();?>product/payment">
                                        <span class="menu-text">Payment</span>
                                    </a>
                                </li>
                                 <li><a href="<?php echo base_url();?>product/cancelreturn">
                                        <span class="menu-text">Cancel & Return Policy</span>
                                    </a>
                                </li>
                                 <li><a href="<?php echo base_url();?>product/shipping">
                                        <span class="menu-text">Shipping</span>
                                    </a>
                                </li>
            </ul>
        </div>
    </li>
</ul>
<!-- Head menu search form ends -->         </div>
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="<?php echo base_url();?>admin/logout">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>
                    <span class="menu-text">Logout</span>
                </a>

            </li>
        </ul>
    </div>
</div>


    <!-- Middle Content Start -->

    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">

              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>

</div>

            </div>
          </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<script>





          $(document).ready(function(){
/*$('img').each(
        function(){
            var variable = $(this).attr('src');
          //console.log(variable);
            if(variable!='#' && variable!=''){
            variable = variable.split('.');
            //console.log(variable[2]);
if(variable[2]!='com/-Biz7tWEakHM/AAAAAAAAAAI/AAAAAAAAAEE/mV4_Um9s5GY/photo' && variable[2]!='googleusercontent'  && variable[2]!='fbcdn' && variable[2]!='' && variable[2]!='JPG' && variable[2]!='jpg' && variable[2]!='jpg ' && variable[2]!='png' && variable[2]!='PNG' && variable[2]!='GIF' && variable[2]!='jpeg' && variable[2]!='jpeg ' && variable[2]!='JPEG' && variable[2]!='gif')
            {
                // alert(variable[2]);
                 //console.log(variable[2]);
              $(this).attr('src','http://mobiledarzi.com/assets/images/online_boutique/cover.jpg');
            }else{

            }}

        });
});*/
</script>
