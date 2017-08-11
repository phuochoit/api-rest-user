<?php defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends MY_Controller{
    public function __construct()  {
        parent::__construct();
        $this->load->helper('form');
    }

     /*Load Default*/
    public function index(){
        $data = array(
            'error' => '',
            'title' => 'Upload Form'
        );
        $this->data = $data;
        $this->page = "upload/index";
        $this->layout();
    }
    /* save file*/
    public function save() {
        
         $this->do_upload();
        
    }

    /* function upload*/
    public function do_upload(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $this->data = $error;
            $this->page = "upload/index";
            $this->layout();
        } else {
            $this->load->model('upload_model');
            $path = "uploads/".$this->upload->data('file_name');
            $items = array(
                'file_name' => $this->upload->data('file_name'),
                'file_type' => $this->upload->data('file_type'),
                'file_path' => $path
            );

            $this->upload_model->set_items($items);
            $data = array(
                'upload_data' => $this->upload->data(),
                'title' => 'Upload Form successfully '
            );
            $this->data = $data;
            $this->page = "upload/index";
            $this->layout();
            
        }
    }
}