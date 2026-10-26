<?php
class Zonemodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_zone(){
        $this->db->select("*");
        $this->db->from("nwt_str_zone");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        // echo $this->db->last_query();exit();
        return $query;
    }
    function get_all_zone($limit='', $start=''){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_zone");
        // $this->db->where("edu_status",1);
        $this->db->where("del_status",0);
        $this->db->limit($limit, $start);
        $this->db->order_by('zone_id','DESC');
        
        $query      =   $this->db->get();
         // echo $this->db->last_query();
        // exit();
        $result     =   $query->result();
        return $result;
    }
    function insert_zone(){

        // echo "dgd";exit();
        $this->tab_groups['zone_name'] = $this->input->post('zone');
        $this->tab_groups['zone_status']=1;
        $this->tab_groups['del_status']=0;
        $this->tab_groups['zon_pre_name']=$this->input->post('pre_name');
        $this->tab_groups['zon_pre_phone']=$this->input->post('pre_phone');
        $this->tab_groups['zon_sce_name']=$this->input->post('sec_name');
        $this->tab_groups['zon_sec_phone']=$this->input->post('sec_phone');
        $this->tab_groups['zon_jsce_name']=$this->input->post('jsec_name');
        $this->tab_groups['zon_jsec_phone']=$this->input->post('jsec_phone');
        $this->tab_groups['zon_tre_name']=$this->input->post('tre_name');
        $this->tab_groups['zon_tre_phone']=$this->input->post('tre_phone');
        // $this->tab_groups['slug']           = url_title($this->input->post('education'),"dash",True);
        $this->db->insert('nwt_str_zone', $this->tab_groups);
         // echo $this->db->last_query();
        // exit();
        $id = $this->db->insert_id();
     
        return $id;

    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['zone_status']           = $status;
        $this->db->where('zone_id', $id);
        $this->db->update('nwt_str_zone', $this->tab_groups);
        return $id;    
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_zone");
        $this->db->where("del_status",0);
        $this->db->where("zone_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function update_zone($id=''){
        $this->tab_groups['zone_name'] = $this->input->post('zone');
        $this->tab_groups['zon_pre_name']=$this->input->post('pre_name');
        $this->tab_groups['zon_pre_phone']=$this->input->post('pre_phone');
        $this->tab_groups['zon_sce_name']=$this->input->post('sec_name');
        $this->tab_groups['zon_sec_phone']=$this->input->post('sec_phone');
        $this->tab_groups['zon_jsce_name']=$this->input->post('jsec_name');
        $this->tab_groups['zon_jsec_phone']=$this->input->post('jsec_phone');
        $this->tab_groups['zon_tre_name']=$this->input->post('tre_name');
        $this->tab_groups['zon_tre_phone']=$this->input->post('tre_phone'); 
        $this->db->where('zone_id', $id);
        $this->db->update('nwt_str_zone', $this->tab_groups);
        return $id;
    }
    function del_zone($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('zone_id', $id);
        $this->db->update('nwt_str_zone', $this->tab_groups);
        return $id;
    }
    
}