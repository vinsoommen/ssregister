<?php
class Staffmodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_row(){
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        //  echo $this->db->last_query();
        // exit();
        return $query;
    }
    function get_all_staff($limit='', $start=''){
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
       
         $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
         $d_ist=$admin_det->dis_id;
         $l_oc=$admin_det->loc_id;
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
       
 
        $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_admin.zon_id','left');
        $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_admin.dis_id','left');
        $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_admin.loc_id','left');
        // $this->db->where($where);
        $this->db->where("nwt_str_admin.del_status",0);
        if($lev==5 )
        {
             $where = '(nwt_str_admin.admin_level="2" or nwt_str_admin.admin_level = "3" or nwt_str_admin.admin_level = "4")';
            $this->db->where($where);
           
        }
        elseif($lev==2)
        {

            $where = '( nwt_str_admin.admin_level = "3" or nwt_str_admin.admin_level = "4")';
            $this->db->where($where);
        }
        elseif($lev==3)
        {
           
            $this->db->where("nwt_str_admin.admin_level",4 );
        }


        // $this->db->where("admin_Active",1);
        $this->db->limit($limit, $start);
        $this->db->order_by('nwt_str_admin.admin_id','DESC');
        
        $query      =   $this->db->get();
        //  echo $this->db->last_query();
        // exit();
        $result     =   $query->result();
        return $result;
    }
     function get_admin_details($admn_id)
    {
        $this->db->select('*');
        $this->db->from('nwt_str_admin');
        $this->db->where('admin_id',$admn_id);
        $query      =   $this->db->get();
          // echo $this->db->last_query();
        // exit();
         $row     =   $query->row();
        return $row;
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
    function insert_staff(){

        // echo "dgd";exit();
        $this->tab_groups['name'] = $this->input->post('stf_name');
        // $this->tab_groups['staff_type'] = $this->input->post('stf_type');
        $this->tab_groups['designation'] = $this->input->post('stf_desg');
        $desig=  $this->input->post('stf_desg');
        // echo $desig;exit;
        if($desig=='Zone Admin')
        {
            $this->tab_groups['admin_level']=2;
        }
        elseif ($desig=='District Admin') 
        {
           $this->tab_groups['admin_level']=3; 
        }
        elseif($desig=='District Admin')
        {
            $this->tab_groups['admin_level']=4;
        }
        else
        {
            $this->tab_groups['admin_level']=5;
        }
        // echo $this->tab_groups['admin_level']=3; exit;
        $this->tab_groups['admin_name'] = $this->input->post('email');
        $pass= $this->input->post('password');
        $paswd=md5($pass);
        $this->tab_groups['admin_pass'] =$paswd;
  
        $this->tab_groups['admin_active']=1;
        $this->tab_groups['entry_by']=$this->session->userdata('admin_id');
        $this->tab_groups['zon_id'] = $this->input->post('zone');
        $this->tab_groups['dis_id'] = $this->input->post('district');
        $this->tab_groups['loc_id'] = $this->input->post('local');
        $this->tab_groups['start_date'] = $this->input->post('start_date');
        $this->tab_groups['end_date'] = $this->input->post('end_date');

        $this->db->insert(' nwt_str_admin', $this->tab_groups);
         // echo $this->db->last_query();exit();
        $id = $this->db->insert_id();
       
        $config['upload_path']   =  $this->config->item('image_path').'staff';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']                 = '20000';
        @$config['file_name']               =   $id.$config['file_ext'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (  $this->upload->do_upload('image'))
        {       
                $data = array('upload_data' => $this->upload->data());
                $this->process_uploaded_image($data['upload_data']['file_name']);
                $img_data['image']              =   $data['upload_data']['file_name'];
                $this->db->update('nwt_str_admin', $img_data,array('admin_id'=>$id));
        }   
        else
        {
            $error = $this->upload->display_errors();   
        }
        return $id;

       
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        // $this->db->where("stf_status",1);
        $this->db->where("admin_active",1);
        
        $this->db->where("admin_Id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
     function get_local($s_loc=''){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        $this->db->where("center_id",$s_loc);
       
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
     function get_dist($s_di=''){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->where("dist_id",$s_di);
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function update_staff($id=''){
        $this->tab_groups['name'] = $this->input->post('stf_name');
        // $this->tab_groups['staff_type'] = $this->input->post('stf_type');
        $this->tab_groups['designation'] = $this->input->post('stf_desg');
        // $this->tab_groups['admin_Name'] = $this->input->post('uname');

        $this->tab_groups['zon_id'] = $this->input->post('zone');
        $this->tab_groups['dis_id'] = $this->input->post('district');
        $this->tab_groups['loc_id'] = $this->input->post('local');
        // $this->tab_groups['admin_Pass'] = $this->input->post('password');

        $this->db->where('admin_Id', $id);
        $this->db->update('nwt_str_admin', $this->tab_groups);
        // echo $this->db->last_query();exit;
        return $id;
    }
    function del_staff($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('admin_id', $id);
        $this->db->update('nwt_str_admin', $this->tab_groups);
        return $id;
    }
    function active_inactive($id='',$status=''){
        // echo $id;exit();
        $this->tab_groups['admin_active']           = $status;
        $this->db->where('admin_id', $id);
        $this->db->update('nwt_str_admin', $this->tab_groups);
         // echo $this->db->last_query();exit();
        return $id;    
    }
    function process_uploaded_image($filename){
    
    $large_path = $this->config->item('image_path').'staff/'.$filename;
    $thumb_path = $this->config->item('image_path').'staff/small/'.$filename;

    $thumb_config['image_library'] = 'gd2';
    $thumb_config['source_image'] = $large_path;
    $thumb_config['new_image'] = $thumb_path;
    $thumb_config['maintain_ratio'] = TRUE;
    $thumb_config['overwrite'] = TRUE;
    $thumb_config['width'] = 100;
    $thumb_config['height'] = 100;
    $this->load->library('image_lib', $thumb_config);
    $this->image_lib->initialize($thumb_config);
    
    if (!$this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
        return false;
    }
     
    return true;    
    
    }
     function get_local_center_by_id($distr_id){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        // $this->db->join("nwt_str_district","nwt_str_district.dist_id = nwt_str_local_center.d_id");
        $this->db->where("local_status",1);
        $this->db->where("del_status",0);
        $this->db->where("d_id",$distr_id);
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
   
    function checkuser($uname){
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        $this->db->where("admin_name",$uname);
        $query = $this->db->count_all_results(); 
        //  echo $this->db->last_query();
        // exit();
        return $query;
    }

}