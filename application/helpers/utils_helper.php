<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function  existe($tabla, $campos)
{
    
    $ci=& get_instance();
    $ci->load->database(); 
    $sql = "select * from usuarios"; 
    $query = $ci->db->query($sql);
    $row = $query->result();
    echo "<pre>"; print_r($row);
}