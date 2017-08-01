<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }
    /*Load Default*/
    public function index()
    {
        
        $this->load->helper('form');
        $this->page = "Signup";
        $this->layout();
    }
    /* signup */
    public function signup()
    {
        $this->load->library('form_validation');
        // config vaildation
        $config = array(
            array(
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password Confirmation',
                'rules' => 'required'
            ),
            array(
                'field' => 'phoneormail',
                'label' => 'Phone or Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthday_day',
                'label' => 'Day',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthday_month',
                'label' => 'Month',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthday_year',
                'label' => 'Year',
                'rules' => 'required'
            ),
            array(
                'field' => 'radiogender',
                'label' => 'gender',
                'rules' => 'required'
            ),
        );
       
        $this->form_validation->set_rules($config);
        // check validata
        if ($this->form_validation->run() == false) {
            $this->page = "Signup";
            $this->layout();
        } else {
            // get data fron input
            $dataInput = $this->input->post(array('firstname', 'lastname','phoneormail','password','birthday_day','birthday_month','birthday_year','radiogender'));
            $birthday = $dataInput['birthday_day'].$dataInput['birthday_month'].$dataInput['birthday_year'];
            $data = array(
                'firstname' => $dataInput['firstname'],
                'lastname' => $dataInput['lastname'],
                'email' => $dataInput['phoneormail'],
                'password' => $dataInput['password'],
                'birthday' => date("d/M/y", $birthday),
                'gender' => $dataInput['radiogender'],
                'ip' => $this->input->ip_address()
                
            );
            $this->checkSingup($data);

            // reirect login if singup sussect
            // redirect('login');
        }
    }
   /* check Singup */
    public function checkSingup($data)
    {
        // load curl library
        $this->load->library('curl');
        if (empty($data)) {
            return;
        }

        $url = 'http://125.212.253.128:8080/api-rest-user/service/user/signup';
        
        $this->curl->create($url);
        $this->curl->post($data);
        $result = json_decode($this->curl->execute());
        // check data result
        if (isset($result->status) && $result->status->success == 1) {
            redirect('login');
        } else {
            $this->session->set_flashdata('errorSingup', "signup not success");
        }
    }
}
