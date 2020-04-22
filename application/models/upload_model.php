<?php
class Upload_model extends CI_Model{
 
    function save_upload($title,$image){
        $data = array(
                'order_id'     => $title,
                'order_img' => $image
            );  
        $result= $this->db->insert('order',$data);
        return $result;
    }
 
     
}