<?php
class Districtmodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_row(){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        // echo $this->db->last_query();exit();
        return $query;
    }
    function get_all_district($limit='', $start=''){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id = nwt_str_district.zoneId');
        // $this->db->where("dist_status",1);
        $this->db->where("nwt_str_district.del_status",0);
        $this->db->limit($limit, $start);
        $this->db->order_by('nwt_str_district.dist_id','DESC'); 
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
    function insert_district(){

        // echo "dgd";exit();
        $this->tab_groups['dist_name'] = $this->input->post('district');
        $this->tab_groups['zoneId'] = $this->input->post('zone_id');
        $this->tab_groups['dist_status']=1;
        $this->tab_groups['del_status']=0;
        $this->tab_groups['dist_pre_name'] = $this->input->post('pre_name');
        $this->tab_groups['dist_pre_phone'] = $this->input->post('pre_phone');
        $this->tab_groups['dist_sec_name'] = $this->input->post('sec_name');
        $this->tab_groups['dist_sec_phone'] = $this->input->post('sec_phone');

        $this->db->insert('nwt_str_district', $this->tab_groups);
         // echo $this->db->last_query();
        // exit();
        $id = $this->db->insert_id();
     
        return $id;

    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['dist_status']           = $status;
        $this->db->where('dist_id', $id);
        $this->db->update('nwt_str_district', $this->tab_groups);
        return $id;    
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->where("del_status",0);
        $this->db->where("dist_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function update_district($id=''){
        $this->tab_groups['dist_name'] = $this->input->post('district');
        $this->tab_groups['zoneId'] = $this->input->post('zone_id');
        $this->tab_groups['dist_pre_name'] = $this->input->post('pre_name');
        $this->tab_groups['dist_pre_phone'] = $this->input->post('pre_phone');
        $this->tab_groups['dist_sec_name'] = $this->input->post('sec_name');
        $this->tab_groups['dist_sec_phone'] = $this->input->post('sec_phone');
        
        $this->db->where('dist_id', $id);
        $this->db->update('nwt_str_district', $this->tab_groups);
        return $id;
    }
    function del_district($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('dist_id', $id);
        $this->db->update('nwt_str_district', $this->tab_groups);
        // echo $this->db->last_query();exit();
        return $id;
    }
     function count_search_row(){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        // echo $this->db->last_query();exit();
        return $query;
    }
     function get_search_results()
    {
        
        
      
        $d_zon = $this->input->post('zone');
        $d_dis=$this->input->post('district');
      
       if(($d_zon != null) && ($d_dis != null)) 
        {
            $this->db->select("*");
            $this->db->from("nwt_str_district");
           
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_district.zoneId');
          
            
            
            $this->db->like("nwt_str_district.dist_name",$d_dis);
            $this->db->where("nwt_str_zone.zone_id",$d_zon); 
            $this->db->where("nwt_str_district.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;

        }
        if($d_zon != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_district");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_district.zoneId');
           
           
            $this->db->where("nwt_str_district.zoneId",$d_zon);
           
            $this->db->where("nwt_str_district.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if($d_dis != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_district");
            
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_district.zoneId');
           
            
             $this->db->like('nwt_str_district.dist_name', $d_dis);
            
           
            $this->db->where("nwt_str_district.del_status",0);
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        
    }
    
}