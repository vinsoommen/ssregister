<?php
class Changepasswordmodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
     function changepassword($c_pass)
     {
        
        // $c_pass  old password

       $cpass = $this->input->post('cpass');  // current password
       $npass = $this->input->post('npass');  // new password
       $id=$this->session->userdata('admin_id');
       $curr_pass=md5($cpass);
       if($c_pass==$curr_pass)
       {
         $new_pass=md5($npass);
         // echo $new_pass;exit();
        $this->tab_groups['admin_pass']  = $new_pass;
        $this->db->where('admin_Id', $id);
        $this->db->update('nwt_str_admin', $this->tab_groups);
        // echo $this->db->last_query();exit;
        return 1;
       }
       else
       {
         return 0;
      }

    }
     function get_admin_details($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        $this->db->where("admin_id",$id);
        
         
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }

}