<?php
class Loginmodel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function login_valid($username, $password) {

        $password = md5($password);
        $q = $this->db->where(['admin_name' => $username, 'admin_pass' => $password,'admin_active'=>1])->get('nwt_str_admin');
        // echo $this->db->last_query();exit();
        if ($q->num_rows()) {
                
            return $q->row()->admin_id;
            //return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_admin_details($login_id)
    {
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        // $this->db->where("stf_status",1);
        $this->db->where("admin_Id",$login_id);
        
        // $this->db->where("std_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }

}