<?php defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model {
    var $table   = 'upload';
    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function set_items($data){
        if(empty($data)){
            return;
        }
        $data = array(
            'name' => $data['file_name'],
            'type' => $data['file_type'],
            'path' => $data['file_path']
        );

        $this->db->insert($this->table, $data);
    }
}
