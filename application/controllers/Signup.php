<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
                'field' => 'birthday',
                'label' => 'Birthday',
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
            $dataInput = $this->input->post(array('firstname', 'lastname','phoneormail','password','birthday','radiogender'));
            $data = array(
                'firstname' => $dataInput['firstname'],
                'lastname' => $dataInput['lastname'],
                'email' => $dataInput['phoneormail'],
                'password' => $dataInput['password'],
                'birthday' => $dataInput['birthday'],
                'gender' => $dataInput['radiogender'],
                'ip' => $this->input->ip_address()
                
            );
            // reirect login if singup sussect
            redirect('login');
        }
    }
}
