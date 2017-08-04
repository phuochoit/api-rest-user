<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');
    }
    // load default code 
    public function index()
    {
        // get data login with facebook
        $dataFB = $this->fbLogin();

        // get data login with google
        $dataGG = $this->ggLogin();

        // Preparing data to view
        $data = array(
            'FBdata' => $dataFB,
            'GGdata' => $dataGG
        );
        
        $this->data = $data;
        $this->load->helper('form');
        $this->page = "User/Login";
        $this->layout();
    }
    
    // login with google
    public function ggLogin(){
       
        $this->load->config('oauth');
        // Include the google api php libraries
        include_once APPPATH."libraries/Google/Google_Client.php";
        include_once APPPATH."libraries/Google/contrib/Google_Oauth2Service.php";

        // Google Project API Credentials
        $clientId = $this->config->item('google_id');
        $clientSecret = $this->config->item('google_secret');
        $redirectUrl = base_url().$this->config->item('google_login_redirect_url');

        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName($this->config->item('google_application_name'));
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        // set data user array
        $userData = array();

        // check request code 
        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('gg_token_login', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        // check token login with google
        $token = $this->session->userdata('gg_token_login');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        // check access token 
        if ($gClient->getAccessToken()) {
            // get profile with google
            $userProfile = $google_oauthV2->userinfo->get();

            // Preparing data
            $userGGData['oauth_provider'] = 'google';
            $userGGData['oauth_uid'] = $userProfile['id'];
            $userGGData['first_name'] = $userProfile['given_name'];
            $userGGData['last_name'] = $userProfile['family_name'];
            $userGGData['email'] = $userProfile['email'];
            $userGGData['gender'] = $userProfile['gender'];
            $userGGData['locale'] = $userProfile['locale'];
            $userGGData['profile_url'] = $userProfile['link'];
            $userGGData['picture_url'] = $userProfile['picture'];
            
            // check data
            if(!empty($userGGData)){
                $ggUserData =  array('gg_data_login' => $userGGData);
                $this->session->set_userdata($ggUserData);
            }
            // get logout url
            $userData['logoutUrl'] = $this->config->item('google_logout_redirect_url');

        } else {
              // get login url
            $userData['authUrl'] = $gClient->createAuthUrl();
        }

        return $userData;
    }

    // login with facebook
    public function fbLogin(){
        // set data user array
        $userData = array();
        $userFBData = array();
        
        // check use authenticated
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data
            $userFBData['oauth_provider'] = 'facebook';
            $userFBData['oauth_uid'] = $userProfile['id'];
            $userFBData['first_name'] = $userProfile['first_name'];
            $userFBData['last_name'] = $userProfile['last_name'];
            $userFBData['email'] = $userProfile['email'];
            $userFBData['gender'] = $userProfile['gender'];
            $userFBData['locale'] = $userProfile['locale'];
            $userFBData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userFBData['picture_url'] = $userProfile['picture']['data']['url'];

            // check facebook data save session
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
    
    // logout with facebook
    public function fbLogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove facebook user data from session
        $this->session->unset_userdata('fb_data_login');
        redirect('/user');
    }
    
    // Logout with google
    public function ggLogout() {
        // Remove google user data from session
		$this->session->unset_userdata('gg_token_login');
		$this->session->unset_userdata('gg_data_login');
		redirect('/user');
    }
}
