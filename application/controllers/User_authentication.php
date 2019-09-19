<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		//$this->load->model('user');
    }
    
    public function index(){
		// Include the facebook api php libraries
		//required "../";
		require_once(APPPATH.'libraries/facebook-api-php-codexworld/facebook.php');
		//$this->load->library('facebook-api-php-codexworld/facebook.php');
		
		// Facebook API Configuration
		$appId = '1045518682243789';
		$appSecret = '4401bf51fc26b88f096905e4caabc1ce';
		$redirectUrl = base_url() . 'user_authentication/';
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		print_r($fbuser);echo "<br>";
        if ($fbuser) {
        	echo "in";
			$userProfile = $facebook->api('/me?locale=en_US&fields=name,email');
			print_r($userProfile);
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
		$this->load->view('user_authentication/index',$data);
    }
	
	public function logout() {
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/user_authentication');
    }
}
