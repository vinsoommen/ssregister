<?php
class Dashboardmodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    // function count_new_order(){
    //     $this->db->select("id");
    //     $this->db->from("nwt_mat_order_master");
    //     $this->db->where("pay_status");
    //     $row_count = $this->db->count_all_results(); 
    //     return $row_count;
    // }
    // function count_doctor_cons(){
    //     $this->db->select("id");
    //     $this->db->from("nwt_mat_doctors_consultation");
    //     $this->db->where("status",1);
    //     $row_count = $this->db->count_all_results(); 
    //     return $row_count;
    // }
    // function count_lab_cons(){
    //     $this->db->select("id*");
    //     $this->db->from("nwt_mat_lab_consultation");
    //     $this->db->where("status",1);
    //     $row_count = $this->db->count_all_results(); 
    //     return $row_count;
    // }
    // function count_reg_users(){
    //     $this->db->select("id*");
    //     $this->db->from("nwt_mat_reg");
    //     $this->db->where("del_status",0);
    //     $this->db->where("admnVal",1);
    //     $row_count = $this->db->count_all_results(); 
    //     return $row_count;
    // }
    // function count_users_review(){
    //     $this->db->select("id*");
    //     $this->db->from("nwt_mat_review");
    //     $this->db->where("status",0);
    //     $this->db->where("del_status",0);
    //     $row_count = $this->db->count_all_results(); 
    //     return $row_count;
    // }
}