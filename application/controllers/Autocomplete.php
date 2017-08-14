<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autocomplete extends MY_Controller
{
    /*Load Default*/
    public function index()
    {

        $files = file_get_contents(base_url('data.json'));

        // set data to view
        $data = array(
            'title'         => 'Autocomplete',
            'datajs'        => $files,
            'js_to_load'    => array(
                base_url("assets/js/jquery-ui.js"),
            ),
            'css_to_load'   => array(
                'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
            ),
        );
        $this->data = $data;
        
        // load view
        $this->page = "Autocomplete/index";
        $this->layout();
    }
}
