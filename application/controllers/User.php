<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'libraries/Facebook/autoload.php'; 
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');
        
    }
    public function index()
    {
        $dataFB = $this->fbLogin();
        $data = array(
            'FBdata' => $dataFB,
        );
        
        print '<pre>';
        print_r($this->session->all_userdata());
        print '</pre>';
        var_dump($data);

        $this->data = $data;
        $this->load->helper('form');
        $this->page = "User/Login";
        $this->layout();
    }

    function fbLogin(){
        $userData = array();
        $userFBData = array();
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userFBData['oauth_provider'] = 'facebook';
            $userFBData['oauth_uid'] = $userProfile['id'];
            $userFBData['first_name'] = $userProfile['first_name'];
            $userFBData['last_name'] = $userProfile['last_name'];
            $userFBData['email'] = $userProfile['email'];
            $userFBData['gender'] = $userProfile['gender'];
            $userFBData['locale'] = $userProfile['locale'];
            $userFBData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userFBData['picture_url'] = $userProfile['picture']['data']['url'];

            if(!empty($userFBData)){
                $fbUserData =  array('fb_data_login' => $userFBData);
                $this->session->set_userdata($fbUserData);
            }
            // Get logout URL
            $userData['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $userData['authUrl'] =  $this->facebook->login_url();
        }

        return $userData;
    }
    
    public function fbLogout() {
        
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('fb_data_login');
        

        // Redirect to login page
        redirect('/user');
    }
}
