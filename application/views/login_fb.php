<?php 
$this->load->library('session');
require_once APPPATH.'third_party/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1045518682243789', // Replace {app-id} with your app id
  'app_secret' => '4401bf51fc26b88f096905e4caabc1ce',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://tailor.piresearch.in/index.php/welcome/facebook', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
 ?>