<?php
class Local_centermodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_row(){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        // echo $this->db->last_query();exit();
        return $query;
    }
    function get_all_local_centers($limit='', $start=''){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id = nwt_str_local_center.z_id');
        $this->db->join("nwt_str_district",'nwt_str_district.dist_id = nwt_str_local_center.d_id');
        // $this->db->where("dist_status",1);
        $this->db->where("nwt_str_local_center.del_status",0);
        $this->db->limit($limit, $start);
        $this->db->order_by('nwt_str_local_center.center_id','DESC'); 
        $query      =   $this->db->get();
         // echo $this->db->last_query();
        // exit();
        $result     =   $query->result();
        return $result;
    }
    function get_active_zones(){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_zone");
        // $this->db->where("edu_status",1);
        $this->db->where("del_status",0);
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
    function insert_local_center(){

        // echo "dgd";exit();
        $this->tab_groups['d_id'] = $this->input->post('district');
        $this->tab_groups['z_id'] = $this->input->post('zone');
        $this->tab_groups['center_name'] = $this->input->post('local_center');
        $this->tab_groups['local_status']=1;
        $this->tab_groups['del_status']=0;
        $this->tab_groups['head_of_institution'] = $this->input->post('head_of_institution');
        $this->tab_groups['head_phone'] = $this->input->post('head_phone');
        $this->tab_groups['head_location_add'] = $this->input->post('head_location_add');
        $this->tab_groups['head_pincode'] = $this->input->post('head_pincode');
        $this->tab_groups['master_name'] = $this->input->post('master_name');
        $this->tab_groups['master_phone'] = $this->input->post('master_phone');
        $this->tab_groups['master_add'] = $this->input->post('master_add');
        $this->tab_groups['master_pincode'] = $this->input->post('master_pincode');

        $this->db->insert('nwt_str_local_center', $this->tab_groups);
         // echo $this->db->last_query();
        // exit();
        $id = $this->db->insert_id();
     
        return $id;

    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['local_status']           = $status;
        $this->db->where('center_id', $id);
        $this->db->update('nwt_str_local_center', $this->tab_groups);
        return $id;    
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        $this->db->where("del_status",0);
        $this->db->where("center_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function get_dist($loc_id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        // $this->db->where("stf_status",1);
        // $this->db->where("std_status",1);
         $this->db->where("dist_id",$loc_id);
        // $this->db->where("center_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function update_local_center($id=''){
        $this->tab_groups['d_id'] = $this->input->post('district');
        $this->tab_groups['z_id'] = $this->input->post('zone');
        $this->tab_groups['center_name'] = $this->input->post('local_center');

        $this->tab_groups['head_of_institution'] = $this->input->post('head_of_institution');
        $this->tab_groups['head_phone'] = $this->input->post('head_phone');
        $this->tab_groups['head_location_add'] = $this->input->post('head_location_add');
        $this->tab_groups['head_pincode'] = $this->input->post('head_pincode');
        $this->tab_groups['master_name'] = $this->input->post('master_name');
        $this->tab_groups['master_phone'] = $this->input->post('master_phone');
        $this->tab_groups['master_add'] = $this->input->post('master_add');
        $this->tab_groups['master_pincode'] = $this->input->post('master_pincode');
        $this->db->where('center_id', $id);
        $this->db->update('nwt_str_local_center', $this->tab_groups);
        return $id;
    }
    function del_localcenter($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('center_id', $id);
        $this->db->update('nwt_str_local_center', $this->tab_groups);
        return $id;
    }
     function get_district_by_id($z_id){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->join("nwt_str_zone","nwt_str_zone.zone_id = nwt_str_district.zoneId");
        $this->db->where("nwt_str_district.dist_status",1);
        $this->db->where("nwt_str_district.del_status",0);
        $this->db->where("nwt_str_district.zoneId",$z_id);
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
     function get_search_results()
    {
        
        $l_name=$this->input->post('local_name');
      
        $l_zon = $this->input->post('zone');
        $l_dis=$this->input->post('district');
        if(($l_name != null) && ($l_zon != null) )
        {
            $this->db->select("*");
            $this->db->from("nwt_str_local_center");
           
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_local_center.z_id');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_local_center.d_id');
            
            
            $this->db->where("nwt_str_local_center.z_id",$l_zon);
            $this->db->like("nwt_str_local_center.center_name",$l_name); 
            $this->db->where("nwt_str_local_center.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
       
       
       if(($l_zon != null) && ($l_dis != null)) 
        {
            $this->db->select("*");
            $this->db->from("nwt_str_local_center");
           
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_local_center.z_id');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_local_center.d_id');
            
            
            $this->db->where("nwt_str_local_center.z_id",$l_zon);
            $this->db->where("nwt_str_local_center.d_id",$l_dis); 
            $this->db->where("nwt_str_local_center.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;

        }
        if($l_zon != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_local_center");
            
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_local_center.z_id');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_local_center.d_id');
           
            $this->db->where("nwt_str_local_center.z_id",$l_zon);
           
            $this->db->where("nwt_str_local_center.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if($l_name != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_local_center");
            
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_local_center.z_id');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_local_center.d_id');
            
             $this->db->like('nwt_str_local_center.center_name', $l_name);
            // $this->db->where("nwt_str_students.std_name",$std_name);
           
            $this->db->where("nwt_str_local_center.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        
    }
}