<?php defined('BASEPATH') or exit('No direct script access allowed');
class Combobox extends MY_Controller{
/*Load Default*/
    public function index()
    {
        $content = file_get_contents(base_url('data.json'));
        // set data to view
        $data = array(
            'title'         => 'Autocomplete',
            'content'       => json_encode($content),
            'js_to_load'    => array(
                base_url("assets/js/jquery-ui.js"),
                base_url("assets/js/custom_combobox.js"),
            ),
            'css_to_load'   => array(
                'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
            ),
        );
        $this->data = $data;
        
        // load view
        $this->page = "combobox/index";
        $this->layout();
    }

    public function ajax_content()
    {
       $content = file_get_contents(base_url('data.json'));
       echo json_encode($content);
    }
}
?>